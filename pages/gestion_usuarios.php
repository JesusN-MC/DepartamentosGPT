<?php
require_once "../clases/Conexion.php";

$conexion = new Conexion();
$conn = $conexion->conectar();

$sql_ListaUsuarios = "CALL consultar_lista_usuarios()";
$stmtUsuarios = $conn->prepare($sql_ListaUsuarios);
$stmtUsuarios->execute();
$users = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);
$stmtUsuarios->closeCursor();

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

    $nombresRol = [1 => 'Arrendatario', 2 => 'Arrendador'];
    $usuarios = [
        ['id' => 1, 'nombre' => 'Ana Torres', 'correo' => 'ana.torres@correo.com', 'rol' => 2, 'estado' => 1, 'fecha_registro' => '2026-09-12'],
        ['id' => 2, 'nombre' => 'Luis Fernández', 'correo' => 'luis.fernandez@correo.com', 'rol' => 3, 'estado' => 1, 'fecha_registro' => '2026-09-20'],
        ['id' => 3, 'nombre' => 'María López', 'correo' => 'maria.lopez@correo.com', 'rol' => 3, 'estado' => 0, 'fecha_registro' => '2026-10-02'],
        ['id' => 4, 'nombre' => 'Carlos Ramírez', 'correo' => 'carlos.ramirez@correo.com', 'rol' => 1, 'estado' => 1, 'fecha_registro' => '2026-10-11'],
    ];
    ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <h1 class="page-title">Gestión de usuarios</h1>
                <p class="page-description">Consulta las cuentas y administra su acceso.</p>
            </div>
        </section>

        <form class="surface-card filter-bar" method="get">
            <label class="input min-w-56 flex-1 items-center gap-2">
                <span class="sr-only">Buscar usuario</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <input type="search" name="q" class="grow" placeholder="Nombre o correo">
            </label>
            <select name="estado" class="select w-44" aria-label="Filtrar por estado de cuenta">
                <option value="">Todos los estados</option>
                <option value="1">Activos</option>
                <option value="0">Desactivados</option>
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
                    <?php foreach ($users as $usuario): ?>
                        <tr>
                            <td>
                                <div class="font-semibold"><?= htmlspecialchars($usuario['nombre']) ?></div>
                                <div class="text-sm text-base-content/60"><?= htmlspecialchars($usuario['correo']) ?></div>
                            </td>
                            <td>
                                <?php 
                                    if ($usuario['rol'] == 1){
                                        echo '<span class="badge badge-soft">Cliente</span>';
                                    } else if ($usuario['rol'] == 2) {
                                        echo '<span class="badge badge-soft">Arrendador</span>';
                                    } else {
                                        echo '<span class="badge badge-soft">Administrador</span>';
                                    }
                                ?>
                            </td>
                            <td><?= date('d/m/Y', strtotime($usuario['fecha_registro'])) ?></td>
                            <td>
                                <?php if ($usuario['estado'] === 1): ?>
                                    <span class="badge badge-soft badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-soft">Desactivado</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="flex flex-wrap justify-end gap-2">
                                    <div class="tooltip tooltip-left" data-tip="Ascender rol">
                                        <button type="button" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Ascender rol">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 19V5" />
                                                <path d="m5 12 7-7 7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="tooltip tooltip-left" data-tip="Descender rol">
                                        <button type="button" class="inline-flex size-10 items-center justify-center text-base-content transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Descender rol">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 5v14" />
                                                <path d="m19 12-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <?php if ($usuario['estado'] === 1): ?>
                                        <div class="tooltip tooltip-left" data-tip="Desactivar acceso">
                                            <button type="button" class="inline-flex size-10 items-center justify-center text-warning transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-warning" aria-label="Desactivar acceso">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="m15 9-6 6" />
                                                    <path d="m9 9 6 6" />
                                                </svg>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <div class="tooltip tooltip-left" data-tip="Reactivar acceso">
                                            <button type="button" class="inline-flex size-10 items-center justify-center text-success transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-success" aria-label="Reactivar acceso">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                                    <circle cx="10" cy="7" r="4" />
                                                    <path d="m16 11 2 2 4-4" />
                                                </svg>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <div class="tooltip tooltip-left" data-tip="Eliminar usuario">
                                        <button type="button" class="inline-flex size-10 items-center justify-center text-error transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-error" aria-label="Eliminar usuario">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M3 6h18" />
                                                <path d="M8 6V4h8v2" />
                                                <path d="m19 6-1 14H6L5 6" />
                                                <path d="M10 11v5" />
                                                <path d="M14 11v5" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
