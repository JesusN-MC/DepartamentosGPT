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

    $usuarios = [
        ['id' => 1, 'nombre' => 'Ana Torres', 'correo' => 'ana.torres@correo.com', 'rol' => 2, 'estado' => 1, 'fecha_registro' => '2026-09-12'],
        ['id' => 2, 'nombre' => 'Luis Fernández', 'correo' => 'luis.fernandez@correo.com', 'rol' => 3, 'estado' => 1, 'fecha_registro' => '2026-09-20'],
        ['id' => 3, 'nombre' => 'María López', 'correo' => 'maria.lopez@correo.com', 'rol' => 3, 'estado' => 0, 'fecha_registro' => '2026-10-02'],
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
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 opacity-60" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true"><circle cx="11" cy="11" r="8" /><path d="m21 21-4.3-4.3" /></svg>
                <input type="search" name="q" class="grow" placeholder="Nombre o correo">
            </label>
            <select name="estado" class="select w-44" aria-label="Filtrar por estado de cuenta">
                <option value="">Todos los estados</option>
                <option value="1">Activos</option>
                <option value="0">Desactivados</option>
            </select>
            <button type="submit" class="btn btn-neutral">Filtrar</button>
        </form>

        <div class="surface-card data-table-wrap">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Registro</th>
                        <th>Acceso</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td>
                                <div class="font-semibold"><?= htmlspecialchars($usuario['nombre']) ?></div>
                                <div class="text-sm text-base-content/60"><?= htmlspecialchars($usuario['correo']) ?></div>
                            </td>
                            <td><span class="badge badge-soft">Rol <?= (int) $usuario['rol'] ?></span></td>
                            <td><?= date('d/m/Y', strtotime($usuario['fecha_registro'])) ?></td>
                            <td>
                                <?php if ($usuario['estado'] === 1): ?>
                                    <span class="badge badge-soft badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-soft">Desactivado</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="flex justify-end gap-2">
                                    <?php if ($usuario['estado'] === 1): ?>
                                        <button type="button" class="btn btn-outline btn-sm">Desactivar acceso</button>
                                    <?php else: ?>
                                        <span class="btn btn-ghost btn-sm btn-disabled">Acceso desactivado</span>
                                    <?php endif; ?>
                                    <button type="button" class="btn btn-ghost btn-sm text-error">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="page-note">Los roles se muestran con el valor almacenado (1, 2 o 3); la base no define sus nombres.</p>
    </main>
</body>

</html>
