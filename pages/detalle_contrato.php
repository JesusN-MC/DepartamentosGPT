<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato DEP-2026-001 - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261117-static">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <div class="app-navbar navbar bg-base-100">
        <div class="navbar-start">
            <a class="btn btn-ghost text-xl" href="./departamentos.php">DepartamentosGPT</a>
        </div>
        <div class="hidden sm:block">
            <nav class="app-nav" aria-label="Navegación principal">
                <a href="./departamentos.php" class="app-nav-link">Departamentos</a>
                <a href="./contratos.php" class="app-nav-link is-active" aria-current="page">Mis contratos</a>
            </nav>
        </div>
        <div class="navbar-end gap-2">
            <div class="dropdown dropdown-end sm:hidden">
                <button type="button" tabindex="0" class="btn btn-ghost">Menú</button>
                <ul tabindex="0" class="menu dropdown-content z-20 mt-2 w-52 rounded-box border border-base-300 bg-base-100 p-2 shadow">
                    <li><a href="./departamentos.php">Departamentos</a></li>
                    <li><a href="./contratos.php" aria-current="page">Mis contratos</a></li>
                </ul>
            </div>
            <button type="button" class="tooltip tooltip-left btn btn-ghost btn-square" data-tip="Cerrar sesión" aria-label="Cerrar sesión" title="Cerrar sesión">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 17l5-5-5-5" />
                    <path d="M15 12H3" />
                    <path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6" />
                </svg>
            </button>
        </div>
    </div>

    <main class="app-page">
        <div class="mb-5">
            <a href="./contratos.php" class="btn btn-ghost btn-sm">← Mis contratos</a>
        </div>

        <header class="page-heading">
            <div>
                <div class="mb-3 flex flex-wrap items-center gap-2">
                    <span class="badge badge-outline">DEP-2026-001</span>
                    <span class="badge badge-soft badge-success">Vigente</span>
                </div>
                <h1 class="page-title">Departamento 302</h1>
                <p class="page-description">Edificio Olmo · Contrato de Ana Torres · 2026</p>
            </div>
        </header>

        <section class="stats stats-vertical mb-6 w-full border border-base-300 bg-base-100 shadow-sm sm:stats-horizontal" aria-label="Resumen del contrato">
            <div class="stat">
                <div class="stat-title">Renta mensual</div>
                <div class="stat-value text-2xl">$18,500</div>
                <div class="stat-desc">MXN · vence el día 5</div>
            </div>
            <div class="stat">
                <div class="stat-title">Duración</div>
                <div class="stat-value text-2xl">12 meses</div>
                <div class="stat-desc">1 ene — 31 dic 2026</div>
            </div>
            <div class="stat">
                <div class="stat-title">Rentas pendientes</div>
                <div class="stat-value text-2xl">11</div>
                <div class="stat-desc">12 periodos en total</div>
            </div>
            <div class="stat">
                <div class="stat-title">Depósito</div>
                <div class="stat-value text-2xl">$18,500</div>
                <div class="stat-desc">MXN</div>
            </div>
        </section>

        <div class="grid grid-cols-1 items-start gap-6 xl:grid-cols-[minmax(0,1.55fr)_minmax(20rem,0.85fr)]">
            <section class="card border border-base-300 bg-base-100 shadow-sm">
                <div class="card-body gap-4 p-4 sm:p-6">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <h2 class="card-title text-lg">Calendario de rentas</h2>
                            <p class="mt-1 text-sm text-base-content/60">Una renta por mes. Cada pago debe cubrir el importe completo.</p>
                        </div>
                        <span class="badge badge-ghost">2026</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra">
                            <thead>
                                <tr>
                                    <th>Periodo</th>
                                    <th>Importe</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="font-medium">Enero</span><span class="ml-2 text-xs text-base-content/50">#1</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=1" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de enero"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Febrero</span><span class="ml-2 text-xs text-base-content/50">#2</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=2" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de febrero"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Marzo</span><span class="ml-2 text-xs text-base-content/50">#3</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=3" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de marzo"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Abril</span><span class="ml-2 text-xs text-base-content/50">#4</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=4" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de abril"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Mayo</span><span class="ml-2 text-xs text-base-content/50">#5</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=5" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de mayo"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Junio</span><span class="ml-2 text-xs text-base-content/50">#6</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=6" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de junio"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Julio</span><span class="ml-2 text-xs text-base-content/50">#7</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=7" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de julio"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Agosto</span><span class="ml-2 text-xs text-base-content/50">#8</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=8" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de agosto"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Septiembre</span><span class="ml-2 text-xs text-base-content/50">#9</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-success">Completada</span></td>
                                    <td class="text-right text-sm text-base-content/50">—</td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Octubre</span><span class="ml-2 text-xs text-base-content/50">#10</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Rechazada</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Volver a intentar pago"><a href="./pago_renta.php?id_renta=10" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Volver a intentar pago"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 0 1 15-6.7L21 8" /><path d="M21 3v5h-5" /><path d="M21 12a9 9 0 0 1-15 6.7L3 16" /><path d="M3 21v-5h5" /></svg></a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Noviembre</span><span class="ml-2 text-xs text-base-content/50">#11</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-warning">En revisión</span></td>
                                    <td class="text-right text-sm text-base-content/50">—</td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Diciembre</span><span class="ml-2 text-xs text-base-content/50">#12</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-ghost">Pendiente</span></td>
                                    <td class="text-right"><div class="tooltip tooltip-left" data-tip="Pagar renta"><a href="./pago_renta.php?id_renta=12" class="inline-flex size-10 items-center justify-center text-primary transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Pagar renta de diciembre"><svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg></a></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <div class="grid gap-6">
                <section class="card border border-base-300 bg-base-100 shadow-sm">
                    <div class="card-body gap-4 p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h2 class="card-title text-lg">Datos del contrato</h2>
                                <p class="text-sm text-base-content/60">Información del acuerdo vigente</p>
                            </div>
                            <div class="avatar placeholder">
                                <div class="w-10 rounded-full bg-base-200 text-base-content"><span>AT</span></div>
                            </div>
                        </div>
                        <div class="divide-y divide-base-300">
                            <div class="flex justify-between gap-4 py-3">
                                <span class="text-sm text-base-content/60">Inquilina</span>
                                <span class="text-right text-sm font-medium">Ana Torres</span>
                            </div>
                            <div class="flex justify-between gap-4 py-3">
                                <span class="text-sm text-base-content/60">Departamento</span>
                                <span class="text-right text-sm font-medium">Edificio Olmo · 302</span>
                            </div>
                            <div class="flex justify-between gap-4 py-3">
                                <span class="text-sm text-base-content/60">Inicio</span>
                                <span class="text-right text-sm font-medium">1 de enero de 2026</span>
                            </div>
                            <div class="flex justify-between gap-4 py-3">
                                <span class="text-sm text-base-content/60">Término</span>
                                <span class="text-right text-sm font-medium">31 de diciembre de 2026</span>
                            </div>
                            <div class="flex justify-between gap-4 py-3">
                                <span class="text-sm text-base-content/60">Fecha de firma</span>
                                <span class="text-right text-sm font-medium">20 de diciembre de 2025</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline btn-sm w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <path d="M14 2v6h6" />
                                <path d="M8 13h8M8 17h8" />
                            </svg>
                            Ver documento del contrato
                        </a>
                    </div>
                </section>

            </div>
        </div>

        <section class="card mt-6 border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body gap-5 p-4 sm:p-6">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h2 class="card-title text-lg">Mantenimientos del departamento</h2>
                        <p class="text-sm text-base-content/60">Consulta los reportes registrados durante tu estancia.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr><th>Reporte</th><th>Fecha</th><th>Estado</th><th>Responsable</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="font-medium">Fuga bajo el lavabo</div>
                                    <div class="text-sm text-base-content/60">Revisar conexión de agua del baño.</div>
                                </td>
                                <td class="whitespace-nowrap">10 nov 2026</td>
                                <td><span class="badge badge-soft badge-info">En proceso</span></td>
                                <td>Técnico de mantenimiento</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-medium">Revisión eléctrica</div>
                                    <div class="text-sm text-base-content/60">Inspeccionar contacto de cocina.</div>
                                </td>
                                <td class="whitespace-nowrap">14 nov 2026</td>
                                <td><span class="badge badge-soft badge-warning">Pendiente</span></td>
                                <td class="text-base-content/60">Sin asignar</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-medium">Ajuste de cerradura</div>
                                    <div class="text-sm text-base-content/60">Ajuste de puerta de acceso principal.</div>
                                </td>
                                <td class="whitespace-nowrap">2 ago 2026</td>
                                <td><span class="badge badge-soft badge-success">Finalizado</span></td>
                                <td>Cerrajería Roma</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
