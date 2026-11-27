<?php
// ---------------------------------------------------------------
// Gestión de usuarios - DepartamentosGPT
// Todo este bloque va ANTES de cualquier HTML (por el header Location)
// ---------------------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../clases/Conexion.php';
$pdo = (new Conexion())->conectar();

$miId  = (int) ($_SESSION['id'] ?? 0);
$miRol = (int) ($_SESSION['rol'] ?? 0);

// Solo administradores (rol 3) pueden usar esta pantalla ni enviar POST
if ($miRol !== 3) {
    http_response_code(403);
    exit('Acceso denegado.');
}

$nombresRol = [1 => 'Arrendatario', 2 => 'Arrendador', 3 => 'Administrador'];

// Token CSRF
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// ---------------------------------------------------------------
// Procesar acciones (POST -> Redirect -> GET)
// ---------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $id     = (int) ($_POST['id'] ?? 0);

    if (!hash_equals($_SESSION['csrf'], (string) ($_POST['csrf'] ?? ''))) {
        $_SESSION['flash'] = ['error', 'Solicitud no válida. Recarga la página e inténtalo de nuevo.'];
    } elseif ($id <= 0) {
        $_SESSION['flash'] = ['error', 'Usuario no válido.'];
    } elseif ($id === $miId) {
        $_SESSION['flash'] = ['error', 'No puedes modificar ni eliminar tu propia cuenta.'];
    } else {
        try {
            switch ($accion) {
                case 'ascender':
                case 'descender':
                    // Se lee el rol actual en el servidor; nunca se confía en el que envía el navegador
                    $st = $pdo->prepare('SELECT rol FROM usuarios WHERE id = :id');
                    $st->execute([':id' => $id]);
                    $fila = $st->fetch(PDO::FETCH_ASSOC);

                    if (!$fila) {
                        $_SESSION['flash'] = ['error', 'El usuario no existe.'];
                        break;
                    }

                    $rolActual = (int) $fila['rol'];
                    $rolNuevo  = $accion === 'ascender' ? $rolActual + 1 : $rolActual - 1;

                    if ($rolNuevo < 1 || $rolNuevo > 3) {
                        $_SESSION['flash'] = ['error', $accion === 'ascender'
                            ? 'El usuario ya tiene el rol más alto.'
                            : 'El usuario ya tiene el rol más bajo.'];
                        break;
                    }

                    // "AND rol = :actual" evita pisar un cambio hecho al mismo tiempo por otro admin
                    $st = $pdo->prepare('UPDATE usuarios SET rol = :nuevo WHERE id = :id AND rol = :actual');
                    $st->execute([':nuevo' => $rolNuevo, ':id' => $id, ':actual' => $rolActual]);

                    $_SESSION['flash'] = $st->rowCount()
                        ? ['success', 'Rol actualizado a ' . $nombresRol[$rolNuevo] . '.']
                        : ['error', 'El rol cambió mientras tanto. Recarga la página e inténtalo de nuevo.'];
                    break;

                case 'desactivar':
                    $st = $pdo->prepare('UPDATE usuarios SET estado = 0 WHERE id = :id');
                    $st->execute([':id' => $id]);
                    $_SESSION['flash'] = ['success', 'Acceso desactivado.'];
                    break;

                case 'reactivar':
                    $st = $pdo->prepare('UPDATE usuarios SET estado = 1 WHERE id = :id');
                    $st->execute([':id' => $id]);
                    $_SESSION['flash'] = ['success', 'Acceso reactivado.'];
                    break;

                case 'eliminar':
                    $st = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
                    $st->execute([':id' => $id]);
                    $_SESSION['flash'] = $st->rowCount()
                        ? ['success', 'Usuario eliminado.']
                        : ['error', 'El usuario no existe.'];
                    break;

                default:
                    $_SESSION['flash'] = ['error', 'Acción desconocida.'];
            }
        } catch (PDOException $e) {
            // 23000 = violación de llave foránea (tiene departamentos, reservas, etc.)
            $_SESSION['flash'] = ($e->getCode() === '23000')
                ? ['error', 'No se puede eliminar: el usuario tiene registros relacionados. Desactiva su acceso en su lugar.']
                : ['error', 'Ocurrió un error al procesar la acción.'];
            error_log($e->getMessage());
        }
    }

    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '#'));
    exit;
}

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

// ---------------------------------------------------------------
// Consulta de usuarios con filtros
// ---------------------------------------------------------------
$q      = trim($_GET['q'] ?? '');
$estado = $_GET['estado'] ?? '';

$sql    = 'SELECT id, nombre, correo, rol, estado, fecha_registro FROM usuarios WHERE 1=1';
$params = [];

if ($q !== '') {
    $sql .= ' AND (nombre LIKE :q1 OR correo LIKE :q2)';
    $params[':q1'] = "%$q%";
    $params[':q2'] = "%$q%";
}
if ($estado === '0' || $estado === '1') {
    $sql .= ' AND estado = :estado';
    $params[':estado'] = (int) $estado;
}
$sql .= ' ORDER BY fecha_registro DESC';

$st = $pdo->prepare($sql);
$st->execute($params);
$usuarios = $st->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php
    include '../components/navbar.php';
    layout('r-2');
    ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <h1 class="page-title">Gestión de usuarios</h1>
                <p class="page-description">Consulta las cuentas y administra su acceso.</p>
            </div>
        </section>

        <?php if ($flash): ?>
            <div role="alert" class="alert alert-soft <?= $flash[0] === 'success' ? 'alert-success' : 'alert-error' ?>">
                <span><?= htmlspecialchars($flash[1]) ?></span>
            </div>
        <?php endif; ?>

        <form class="surface-card filter-bar" method="get">
            <label class="input min-w-56 flex-1 items-center gap-2">
                <span class="sr-only">Buscar usuario</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <input type="search" name="q" class="grow" placeholder="Nombre o correo" value="<?= htmlspecialchars($q) ?>">
            </label>
            <select name="estado" class="select w-44" aria-label="Filtrar por estado de cuenta">
                <option value="">Todos los estados</option>
                <option value="1" <?= $estado === '1' ? 'selected' : '' ?>>Activos</option>
                <option value="0" <?= $estado === '0' ? 'selected' : '' ?>>Desactivados</option>
            </select>
            <button type="submit" class="btn btn-neutral">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 5h16l-6.5 7.5V19l-3 1v-7.5L4 5Z" />
                </svg>
                Filtrar
            </button>
        </form>

        <div class="surface-card data-table-wrap">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Registro</th>
                        <th>Acceso</th>
                        <th class="text-right">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$usuarios): ?>
                        <tr>
                            <td colspan="5" class="text-center text-base-content/60">No se encontraron usuarios.</td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($usuarios as $usuario): ?>
                        <?php
                        $rolActual         = (int) $usuario['rol'];
                        $estadoUsuario     = (int) $usuario['estado'];
                        $esMiCuenta        = (int) $usuario['id'] === $miId;
                        $nombreRolSuperior = $nombresRol[$rolActual + 1] ?? 'Rol ' . ($rolActual + 1);
                        $nombreRolInferior = $nombresRol[$rolActual - 1] ?? 'Rol ' . ($rolActual - 1);
                        $nombreRol         = $nombresRol[$rolActual] ?? 'Rol ' . $rolActual;
                        ?>
                        <tr>
                            <td>
                                <div class="font-semibold"><?= htmlspecialchars($usuario['nombre'] ?? '') ?></div>
                                <div class="text-sm text-base-content/60"><?= htmlspecialchars($usuario['correo']) ?></div>
                            </td>
                            <td>
                                <span class="badge badge-soft"><?= htmlspecialchars($nombreRol) ?></span>
                            </td>
                            <td><?= date('d/m/Y', strtotime($usuario['fecha_registro'])) ?></td>
                            <td>
                                <?php if ($estadoUsuario === 1): ?>
                                    <span class="badge badge-soft badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-soft">Desactivado</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="flex flex-wrap justify-end gap-2">
                                    <?php if (!$esMiCuenta): ?>
                                        <?php if ($rolActual < 3): ?>
                                            <div class="tooltip tooltip-left" data-tip="Ascender a <?= htmlspecialchars($nombreRolSuperior) ?>">
                                                <form method="post">
                                                    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
                                                    <input type="hidden" name="id" value="<?= (int) $usuario['id'] ?>">
                                                    <input type="hidden" name="accion" value="ascender">
                                                    <button type="submit" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Ascender a <?= htmlspecialchars($nombreRolSuperior) ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                            <path d="M12 19V5" />
                                                            <path d="m5 12 7-7 7 7" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($rolActual > 1): ?>
                                            <div class="tooltip tooltip-left" data-tip="Descender a <?= htmlspecialchars($nombreRolInferior) ?>">
                                                <form method="post">
                                                    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
                                                    <input type="hidden" name="id" value="<?= (int) $usuario['id'] ?>">
                                                    <input type="hidden" name="accion" value="descender">
                                                    <button type="submit" class="inline-flex size-10 items-center justify-center text-base-content transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Descender a <?= htmlspecialchars($nombreRolInferior) ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                            <path d="M12 5v14" />
                                                            <path d="m19 12-7 7-7-7" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($estadoUsuario === 1): ?>
                                            <div class="tooltip tooltip-left" data-tip="Desactivar acceso">
                                                <form method="post">
                                                    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
                                                    <input type="hidden" name="id" value="<?= (int) $usuario['id'] ?>">
                                                    <input type="hidden" name="accion" value="desactivar">
                                                    <button type="submit" class="inline-flex size-10 items-center justify-center text-warning transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-warning" aria-label="Desactivar acceso">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <path d="m15 9-6 6" />
                                                            <path d="m9 9 6 6" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="tooltip tooltip-left" data-tip="Reactivar acceso">
                                                <form method="post">
                                                    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
                                                    <input type="hidden" name="id" value="<?= (int) $usuario['id'] ?>">
                                                    <input type="hidden" name="accion" value="reactivar">
                                                    <button type="submit" class="inline-flex size-10 items-center justify-center text-success transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-success" aria-label="Reactivar acceso">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                            <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                                            <circle cx="10" cy="7" r="4" />
                                                            <path d="m16 11 2 2 4-4" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                        <div class="tooltip tooltip-left" data-tip="Eliminar usuario">
                                            <button type="button"
                                                class="inline-flex size-10 items-center justify-center text-error transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-error"
                                                aria-label="Eliminar usuario"
                                                data-eliminar
                                                data-id="<?= (int) $usuario['id'] ?>"
                                                data-nombre="<?= htmlspecialchars($usuario['nombre'] ?? $usuario['correo']) ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M3 6h18" />
                                                    <path d="M8 6V4h8v2" />
                                                    <path d="m19 6-1 14H6L5 6" />
                                                    <path d="M10 11v5" />
                                                    <path d="M14 11v5" />
                                                </svg>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-sm text-base-content/50">Tu cuenta</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal de confirmación para eliminar -->
    <dialog id="modal-eliminar" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Eliminar usuario</h3>
            <p class="py-4">
                ¿Seguro que quieres eliminar a <strong id="eliminar-nombre"></strong>?
                Esta acción no se puede deshacer.
            </p>
            <form method="post" class="modal-action">
                <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" id="eliminar-id">
                <button type="button" class="btn" onclick="this.closest('dialog').close()">Cancelar</button>
                <button type="submit" class="btn btn-error">Eliminar</button>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop"><button>cerrar</button></form>
    </dialog>

    <script>
        const modal = document.getElementById('modal-eliminar');
        document.querySelectorAll('[data-eliminar]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('eliminar-id').value = btn.dataset.id;
                document.getElementById('eliminar-nombre').textContent = btn.dataset.nombre;
                modal.showModal();
            });
        });
    </script>
</body>

</html>