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

    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-white">
    <!-- Navbar -->
    <header class="sticky top-0 z-50">
        <div class="navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <div class="megamenu megamenu-wide p-2" id="my-megamenu-2" popover>
                    <span class="megamenu-active"></span>
                    <button popovertarget="b1">Servicios</button>
                    <div id="b1" popover>
                        <ul class="menu menu-horizontal">
                            <li><a>Enterprise</a></li>
                            <li><a>CRM software</a></li>
                            <li><a>Security</a></li>
                            <li><a>Consulting</a></li>
                        </ul>
                    </div>
                    <button popovertarget="b2" class="after:content-none">Departamentos</button>
                    <button popovertarget="b3" class="after:content-none">Nosotros</button>
                </div>
            </div>
            <div class="navbar-end">
                <a class="btn btn-primary" href="./login.php">Acceder</a>
            </div>
        </div>
    </header>

    <!-- Lista de inquilinos -->
    <main class="mx-auto max-w-5xl px-6 py-8">

        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-3xl font-semibold">Inquilinos</h1>
                <p class="text-sm text-base-content/60"><?= count($inquilinos) ?> registrados</p>
            </div>
            <button class="btn btn-primary">+ Nuevo inquilino</button>
        </div>

        <!-- Filtros -->
        <form class="mb-4 flex flex-wrap items-center gap-2" method="get">
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

            <button type="submit" class="btn btn-neutral">Buscar</button>
        </form>

        <!-- Tabla -->
        <div class="overflow-x-auto rounded-box border border-base-300">
            <table class="table">
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
                                    <span class="badge badge-secondary">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-outline">Inactivo</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <a href="./detalle_inquilino.php?id=<?= (int) $u['id'] ?>"
                                    class="btn btn-ghost btn-sm">Ver</a>
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
                <button class="btn btn-sm join-item" disabled>‹</button>
                <button class="btn btn-sm btn-neutral join-item" aria-current="page">1</button>
                <button class="btn btn-sm join-item" disabled>›</button>
            </nav>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer footer-horizontal footer-center bg-base-200 text-base-content rounded p-10">
        <nav class="grid grid-flow-col gap-4">
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
        </nav>
        <aside>
            <p>Copyright © <?= date('Y') ?> - All right reserved by ACME Industries Ltd</p>
        </aside>
    </footer>
</body>

</html>