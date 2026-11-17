<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Resumen de la administración de departamentos, contratos, rentas y mantenimiento.">

    <title>Dashboard - DepartamentosGPT</title>

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

    <main class="mx-auto w-full max-w-7xl flex-1 space-y-6 p-4 sm:space-y-8 sm:p-6 lg:p-8">
        <section class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight sm:text-3xl">Resumen general</h1>
                <p class="mt-1 text-base-content/60">Actividad de inmuebles, rentas y operación.</p>
            </div>
            <a href="./nuevo_depa.php" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true">
                    <path d="M12 5v14M5 12h14"></path>
                </svg>
                Nuevo departamento
            </a>
        </section>

        <section class="grid items-start gap-5 xl:grid-cols-3">
            <article class="card border border-base-300 bg-base-100 shadow-sm xl:col-span-2">
                <div class="card-body gap-5 p-5 sm:p-6">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <h2 class="card-title">Ocupación de inmuebles</h2>
                            <p class="text-sm text-base-content/60">Distribución por estado del departamento</p>
                        </div>
                        <a href="./departamentos.php" class="btn btn-ghost btn-sm">Ver departamentos</a>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-box border border-base-300 bg-base-200/30 p-4">
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <span class="font-medium">En renta</span>
                                <span class="text-sm text-base-content/70">17 de 24 · 71%</span>
                            </div>
                            <progress class="progress progress-primary w-full" value="17" max="24"
                                aria-label="17 de 24 departamentos en renta"></progress>
                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <div class="rounded-box border border-base-300 bg-base-100 p-3">
                                    <div class="text-xs text-base-content/60">Disponibles</div>
                                    <div class="mt-1 text-xl font-semibold">5</div>
                                </div>
                                <div class="rounded-box border border-base-300 bg-base-100 p-3">
                                    <div class="text-xs text-base-content/60">En mantenimiento</div>
                                    <div class="mt-1 text-xl font-semibold">2</div>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-box border border-base-300 bg-base-200/30 p-4">
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <span class="font-medium">Rentas aprobadas este mes</span>
                                <span class="text-sm text-base-content/70">14 de 17</span>
                            </div>
                            <progress class="progress progress-primary w-full" value="14" max="17"
                                aria-label="14 de 17 rentas aprobadas"></progress>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                <div class="tooltip" data-tip="Aprobadas">
                                    <span class="badge badge-soft badge-success" aria-label="14 aprobadas"><svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>14</span>
                                </div>
                                <div class="tooltip" data-tip="Pendientes">
                                    <span class="badge badge-soft badge-warning" aria-label="2 pendientes"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                        <path d="M12 8v4" />
                                        <path d="M12 16h.01" />
                                    </svg>2</span>
                                </div>
                                <div class="tooltip" data-tip="Rechazadas">
                                    <span class="badge badge-soft badge-error" aria-label="1 rechazada"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 9v4" />
                                        <path
                                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0" />
                                        <path d="M12 16h.01" />
                                    </svg>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card border border-base-300 bg-base-100 shadow-sm">
                <div class="card-body gap-5 p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h2 class="card-title">Próximos vencimientos</h2>
                            <p class="text-sm text-base-content/60">Contratos con fecha de salida cercana</p>
                        </div>
                        <span class="badge badge-soft badge-warning">2 este mes</span>
                    </div>

                    <ul class="list">
                        <li class="list-row items-center px-0">
                            <div class="avatar avatar-placeholder">
                                <div class="w-10 rounded-full bg-base-200 text-base-content">
                                    <span>AT</span>
                                </div>
                            </div>
                            <div class="list-col-grow">
                                <div class="font-medium">Ana Torres</div>
                                <div class="text-sm text-base-content/60">Londres · 102</div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium">30 nov</div>
                                <div class="text-xs text-base-content/60">2026</div>
                            </div>
                        </li>
                        <li class="list-row items-center px-0">
                            <div class="avatar avatar-placeholder">
                                <div class="w-10 rounded-full bg-base-200 text-base-content">
                                    <span>LF</span>
                                </div>
                            </div>
                            <div class="list-col-grow">
                                <div class="font-medium">Luis Fernández</div>
                                <div class="text-sm text-base-content/60">Alameda · 105</div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium">15 dic</div>
                                <div class="text-xs text-base-content/60">2026</div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-actions justify-end">
                        <a href="#contratos" class="btn btn-ghost btn-sm">Ver contratos</a>
                    </div>
                </div>
            </article>
        </section>

        <section id="pagos" class="card border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body p-0">
                <div class="flex flex-wrap items-center justify-between gap-3 p-5 sm:px-6 sm:pt-6">
                    <div>
                        <h2 class="card-title">Pagos recientes</h2>
                        <p class="text-sm text-base-content/60">Movimientos de renta del periodo actual</p>
                    </div>
                    <a href="#pagos" class="btn btn-ghost btn-sm">Ver todos</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>Inquilino</th>
                                <th>Departamento</th>
                                <th>Periodo</th>
                                <th>Monto</th>
                                <th>Estado del pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-medium">María López</td>
                                <td>Olmo · 302</td>
                                <td>Nov 2026</td>
                                <td>$18,500 MXN</td>
                                <td><span class="badge badge-soft badge-success">Aprobado</span></td>
                            </tr>
                            <tr>
                                <td class="font-medium">Carlos Ramírez</td>
                                <td>Del Parque · 204</td>
                                <td>Nov 2026</td>
                                <td>$21,000 MXN</td>
                                <td><span class="badge badge-soft badge-success">Aprobado</span></td>
                            </tr>
                            <tr>
                                <td class="font-medium">Luis Fernández</td>
                                <td>Alameda · 105</td>
                                <td>Nov 2026</td>
                                <td>$12,500 MXN</td>
                                <td><span class="badge badge-soft badge-warning">Pendiente</span></td>
                            </tr>
                            <tr>
                                <td class="font-medium">Ana Torres</td>
                                <td>Londres · 102</td>
                                <td>Nov 2026</td>
                                <td>$15,500 MXN</td>
                                <td><span class="badge badge-soft badge-error">Rechazado</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="mantenimiento" class="grid gap-6 lg:grid-cols-2">
            <article class="card border border-base-300 bg-base-100 shadow-sm">
                <div class="card-body gap-4 p-5 sm:p-6">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h2 class="card-title">Mantenimiento</h2>
                            <p class="text-sm text-base-content/60">Reportes que requieren seguimiento</p>
                        </div>
                        <a href="#mantenimiento" class="btn btn-ghost btn-sm">Ver reportes</a>
                    </div>

                    <ul class="list">
                        <li class="list-row items-center px-0">
                            <div class="list-col-grow">
                                <div class="font-medium">Fuga bajo el lavabo</div>
                                <div class="text-sm text-base-content/60">Olmo · 302</div>
                            </div>
                            <span class="badge badge-soft badge-warning">Pendiente</span>
                        </li>
                        <li class="list-row items-center px-0">
                            <div class="list-col-grow">
                                <div class="font-medium">Revisión de aire acondicionado</div>
                                <div class="text-sm text-base-content/60">Del Parque · 204</div>
                            </div>
                            <span class="badge badge-soft badge-info">En proceso</span>
                        </li>
                        <li class="list-row items-center px-0">
                            <div class="list-col-grow">
                                <div class="font-medium">Cerradura de acceso</div>
                                <div class="text-sm text-base-content/60">Londres · 102</div>
                            </div>
                            <span class="badge badge-soft badge-warning">Pendiente</span>
                        </li>
                    </ul>
                </div>
            </article>

            <article id="contratos" class="card border border-base-300 bg-base-100 shadow-sm">
                <div class="card-body gap-4 p-5 sm:p-6">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h2 class="card-title">Actividad de contratos</h2>
                            <p class="text-sm text-base-content/60">Resumen por estado</p>
                        </div>
                    </div>

                    <div class="divide-y divide-base-300">
                        <div class="flex items-center justify-between gap-3 py-3">
                            <div>
                                <div class="font-medium">Vigentes</div>
                                <div class="text-sm text-base-content/60">Contratos activos de renta</div>
                            </div>
                            <span class="badge badge-soft badge-success">17</span>
                        </div>
                        <div class="flex items-center justify-between gap-3 py-3">
                            <div>
                                <div class="font-medium">Pendientes de firma</div>
                                <div class="text-sm text-base-content/60">Requieren completar el proceso</div>
                            </div>
                            <span class="badge badge-soft badge-warning">2</span>
                        </div>
                        <div class="flex items-center justify-between gap-3 py-3">
                            <div>
                                <div class="font-medium">Borradores</div>
                                <div class="text-sm text-base-content/60">Aún no formalizados</div>
                            </div>
                            <span class="badge badge-soft">1</span>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>

    <footer class="app-footer footer footer-center p-4 text-sm">
        <aside>
            <p>DepartamentosGPT · Panel de administración · Datos de demostración</p>
        </aside>
    </footer>
</body>

</html>