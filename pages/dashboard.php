<?php

$resumen = [
    'departamentos' => ['total' => 12, 'rentados' => 9],
    'inquilinos'    => ['activos' => 9, 'inactivos' => 2],
    'rentas'        => ['activas' => 9, 'ingreso_mensual' => 162500],
    'pagos'         => ['cobrado_mes' => 125000, 'pendiente_mes' => 37500],
    'mantenimiento' => ['abiertos' => 4, 'urgentes' => 1],
    'contratos'     => ['vigentes' => 9, 'por_vencer' => 2],
];

$ocupacion = round($resumen['departamentos']['rentados'] / $resumen['departamentos']['total'] * 100);

$pagos = [
    ['inquilino' => 'María López',    'departamento' => 'Olmo · 302',       'monto' => 18500, 'fecha' => '2026-11-03', 'estado' => 'pagado'],
    ['inquilino' => 'Carlos Ramírez', 'departamento' => 'Del Parque · 204', 'monto' => 21000, 'fecha' => '2026-11-02', 'estado' => 'pagado'],
    ['inquilino' => 'Luis Fernández', 'departamento' => 'Alameda · 105',    'monto' => 12500, 'fecha' => '2026-11-05', 'estado' => 'pendiente'],
    ['inquilino' => 'Ana Torres',     'departamento' => 'Londres · 102',    'monto' => 15500, 'fecha' => '2026-10-05', 'estado' => 'atrasado'],
];

$mantenimiento = [
    ['departamento' => 'Olmo · 302',       'asunto' => 'Fuga en el lavabo del baño', 'prioridad' => 'alta',  'estado' => 'abierto'],
    ['departamento' => 'Brisa · 303',      'asunto' => 'Foco quemado en pasillo',    'prioridad' => 'baja',  'estado' => 'abierto'],
    ['departamento' => 'Del Parque · 204', 'asunto' => 'Falla en aire acondicionado', 'prioridad' => 'media', 'estado' => 'en proceso'],
    ['departamento' => 'Londres · 102',    'asunto' => 'Cerradura atorada',          'prioridad' => 'media', 'estado' => 'abierto'],
];

$contratos = [
    ['inquilino' => 'Ana Torres',     'departamento' => 'Londres · 102',    'vence' => '2026-11-30'],
    ['inquilino' => 'Luis Fernández', 'departamento' => 'Alameda · 105',    'vence' => '2026-12-15'],
    ['inquilino' => 'Carlos Ramírez', 'departamento' => 'Del Parque · 204', 'vence' => '2027-01-20'],
];

function dinero($n) { return '$' . number_format($n); }

function badgePago($estado) {
    $clase = ['pagado' => 'badge-success', 'pendiente' => 'badge-warning', 'atrasado' => 'badge-error'][$estado] ?? 'badge-outline';
    return '<span class="badge ' . $clase . '">' . ucfirst($estado) . '</span>';
}

function badgePrioridad($p) {
    $clase = ['alta' => 'badge-error', 'media' => 'badge-warning', 'baja' => 'badge-outline'][$p] ?? 'badge-outline';
    return '<span class="badge ' . $clase . '">' . ucfirst($p) . '</span>';
}
?>
<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - DepartamentosGPT</title>

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

    <main class="mx-auto max-w-6xl px-6 py-8">

        <div class="mb-6">
            <h1 class="text-3xl font-semibold">Dashboard</h1>
            <p class="text-sm text-base-content/60">Resumen de <?= date('m/Y') ?></p>
        </div>

        <!-- Resumen -->
        <section class="mb-8 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3" aria-label="Resumen">

            <div class="stats border border-base-300">
                <div class="stat">
                    <div class="stat-title">Departamentos</div>
                    <div class="stat-value"><?= $resumen['departamentos']['total'] ?></div>
                    <div class="stat-desc"><?= $resumen['departamentos']['rentados'] ?> rentados · <?= $ocupacion ?>% de ocupación</div>
                </div>
            </div>

            <div class="stats border border-base-300">
                <div class="stat">
                    <div class="stat-title">Inquilinos</div>
                    <div class="stat-value"><?= $resumen['inquilinos']['activos'] ?></div>
                    <div class="stat-desc"><?= $resumen['inquilinos']['inactivos'] ?> inactivos</div>
                </div>
            </div>

            <div class="stats border border-base-300">
                <div class="stat">
                    <div class="stat-title">Rentas activas</div>
                    <div class="stat-value"><?= $resumen['rentas']['activas'] ?></div>
                    <div class="stat-desc"><?= dinero($resumen['rentas']['ingreso_mensual']) ?> MXN / mes</div>
                </div>
            </div>

            <div class="stats border border-base-300">
                <div class="stat">
                    <div class="stat-title">Pagos del mes</div>
                    <div class="stat-value"><?= dinero($resumen['pagos']['cobrado_mes']) ?></div>
                    <div class="stat-desc"><?= dinero($resumen['pagos']['pendiente_mes']) ?> pendientes</div>
                </div>
            </div>

            <div class="stats border border-base-300">
                <div class="stat">
                    <div class="stat-title">Mantenimiento</div>
                    <div class="stat-value"><?= $resumen['mantenimiento']['abiertos'] ?></div>
                    <div class="stat-desc"><?= $resumen['mantenimiento']['urgentes'] ?> urgente</div>
                </div>
            </div>

            <div class="stats border border-base-300">
                <div class="stat">
                    <div class="stat-title">Contratos</div>
                    <div class="stat-value"><?= $resumen['contratos']['vigentes'] ?></div>
                    <div class="stat-desc"><?= $resumen['contratos']['por_vencer'] ?> por vencer</div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 lg:grid-cols-2">

            <!-- Pagos recientes -->
            <section class="lg:col-span-2">
                <div class="mb-2 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Pagos recientes</h2>
                    <a href="#" class="btn btn-ghost btn-sm">Ver todos</a>
                </div>
                <div class="overflow-x-auto rounded-box border border-base-300">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Inquilino</th>
                                <th>Departamento</th>
                                <th>Fecha</th>
                                <th class="text-right">Monto</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pagos as $p): ?>
                                <tr class="hover:bg-base-200">
                                    <td class="font-medium"><?= htmlspecialchars($p['inquilino']) ?></td>
                                    <td><?= htmlspecialchars($p['departamento']) ?></td>
                                    <td class="text-base-content/70"><?= date('d/m/Y', strtotime($p['fecha'])) ?></td>
                                    <td class="text-right"><?= dinero($p['monto']) ?></td>
                                    <td><?= badgePago($p['estado']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Mantenimiento -->
            <section>
                <div class="mb-2 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Reportes de mantenimiento</h2>
                    <a href="#" class="btn btn-ghost btn-sm">Ver todos</a>
                </div>
                <div class="overflow-x-auto rounded-box border border-base-300">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Departamento</th>
                                <th>Asunto</th>
                                <th>Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mantenimiento as $m): ?>
                                <tr class="hover:bg-base-200">
                                    <td class="font-medium"><?= htmlspecialchars($m['departamento']) ?></td>
                                    <td>
                                        <div><?= htmlspecialchars($m['asunto']) ?></div>
                                        <div class="text-xs text-base-content/60"><?= htmlspecialchars(ucfirst($m['estado'])) ?></div>
                                    </td>
                                    <td><?= badgePrioridad($m['prioridad']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Contratos por vencer -->
            <section>
                <div class="mb-2 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Contratos por vencer</h2>
                    <a href="#" class="btn btn-ghost btn-sm">Ver todos</a>
                </div>
                <div class="overflow-x-auto rounded-box border border-base-300">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Inquilino</th>
                                <th>Departamento</th>
                                <th class="text-right">Vence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contratos as $c):
                                $dias = (int) ((strtotime($c['vence']) - strtotime('today')) / 86400);
                            ?>
                                <tr class="hover:bg-base-200">
                                    <td class="font-medium"><?= htmlspecialchars($c['inquilino']) ?></td>
                                    <td><?= htmlspecialchars($c['departamento']) ?></td>
                                    <td class="text-right">
                                        <div><?= date('d/m/Y', strtotime($c['vence'])) ?></div>
                                        <div class="text-xs text-base-content/60">
                                            <?= $dias >= 0 ? "en {$dias} días" : 'vencido' ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
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