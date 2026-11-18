<?php
$inquilinos = [
    ['id' => 1, 'nombre' => 'María',  'apellidos' => 'López Hernández', 'telefono' => '55 1234 5678', 'correo' => 'maria.lopez@correo.com',   'fecha_registro' => '2026-09-12 10:30:00', 'estado' => 1],
    ['id' => 2, 'nombre' => 'Carlos', 'apellidos' => 'Ramírez Soto',    'telefono' => '55 8765 4321', 'correo' => 'carlos.ramirez@correo.com', 'fecha_registro' => '2026-09-20 16:05:00', 'estado' => 1],
    ['id' => 3, 'nombre' => 'Ana',    'apellidos' => 'Torres Vega',     'telefono' => null,           'correo' => 'ana.torres@correo.com',     'fecha_registro' => '2026-10-02 09:12:00', 'estado' => 0],
    ['id' => 4, 'nombre' => null,     'apellidos' => null,              'telefono' => '33 4455 6677', 'correo' => 'invitado@correo.com',       'fecha_registro' => '2026-10-18 20:45:00', 'estado' => 1],
    ['id' => 5, 'nombre' => 'Luis',   'apellidos' => 'Fernández Cruz',  'telefono' => '81 2233 4455', 'correo' => 'luis.fernandez@correo.com', 'fecha_registro' => '2026-11-01 12:00:00', 'estado' => 1],
];
?>
<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inquilinos - DepartamentosGPT</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <!-- Navbar -->
    <header class="sticky top-0 z-50">
        <div class="app-navbar navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <nav class="navbar-center hidden items-center gap-1 lg:flex" aria-label="Navegación principal">
                <a class="btn btn-ghost btn-sm" href="../index.php">Inicio</a>
                <a class="btn btn-ghost btn-sm" href="./departamentos.php">Departamentos</a>
            </nav>
            <div class="navbar-end">
                <a class="btn btn-primary" href="./login.php">Acceder</a>
            </div>
        </div>
    </header>

    <!-- Lista de inquilinos -->
    <main class="app-page">

        <div class="page-heading">
            <div>
                <h1 class="page-title">Inquilinos</h1>
                <p class="page-description"><?= count($inquilinos) ?> registrados</p>
            </div>
            <button class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Nuevo inquilino
            </button>
        </div>

        <!-- Filtros -->
        <form class="surface-card mb-4 flex flex-wrap items-center gap-3 p-4" method="get">
            <label class="input flex min-w-48 flex-1 items-center gap-2">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                        stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </g>
                </svg>
                <input type="search" name="q" class="grow" placeholder="Nombre, correo o teléfono"
                    aria-label="Buscar inquilino" />
            </label>

            <select name="estado" class="select w-36" aria-label="Filtrar por estado">
                <option value="">Todos</option>
                <option value="1">Activos</option>
                <option value="0">Inactivos</option>
            </select>

            <button type="submit" class="btn btn-neutral">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7" />
                    <path d="m20 20-4-4" />
                </svg>
                Buscar
            </button>
        </form>

        <!-- Tabla -->
        <div class="surface-card overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Inquilino</th>
                        <th>Teléfono</th>
                        <th class="hidden md:table-cell">Registro</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inquilinos as $u):
                        $nombreCompleto = trim(($u['nombre'] ?? '') . ' ' . ($u['apellidos'] ?? ''));
                        $mostrar = $nombreCompleto !== '' ? $nombreCompleto : 'Sin nombre';
                        $inicial = mb_strtoupper(mb_substr($nombreCompleto !== '' ? $nombreCompleto : $u['correo'], 0, 1));
                    ?>
                        <tr class="hover:bg-base-200">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar avatar-placeholder">
                                        <div class="w-10 rounded-full bg-neutral text-neutral-content">
                                            <span><?= htmlspecialchars($inicial) ?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium"><?= htmlspecialchars($mostrar) ?></div>
                                        <div class="text-sm text-base-content/60"><?= htmlspecialchars($u['correo']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $u['telefono'] ? htmlspecialchars($u['telefono']) : '<span class="text-base-content/40">—</span>' ?></td>
                            <td class="hidden md:table-cell text-base-content/70">
                                <?= date('d/m/Y', strtotime($u['fecha_registro'])) ?>
                            </td>
                            <td>
                                <?php if ((int) $u['estado'] === 1): ?>
                                    <span class="badge badge-soft badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-soft">Inactivo</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <div class="tooltip tooltip-left" data-tip="Ver inquilino">
                                    <a href="./detalle_inquilino.php?id=<?= (int) $u['id'] ?>"
                                        class="inline-flex size-10 items-center justify-center text-base-content transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Ver inquilino">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
            <p class="text-sm text-base-content/60">Mostrando 1–<?= count($inquilinos) ?> de <?= count($inquilinos) ?></p>
            <nav class="join" aria-label="Paginación de inquilinos">
                <button class="tooltip btn btn-sm btn-square join-item" data-tip="Página anterior" aria-label="Página anterior" disabled>‹</button>
                <button class="btn btn-sm btn-neutral join-item" aria-current="page">1</button>
                <button class="tooltip btn btn-sm btn-square join-item" data-tip="Página siguiente" aria-label="Página siguiente" disabled>›</button>
            </nav>
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer footer footer-horizontal footer-center p-8">
        <nav class="grid grid-flow-col gap-4">
            <a class="link link-hover" href="../index.php">Inicio</a>
            <a class="link link-hover" href="./login.php">Acceder</a>
        </nav>
        <aside>
            <p>DepartamentosGPT · <?= date('Y') ?></p>
        </aside>
    </footer>
</body>

</html>