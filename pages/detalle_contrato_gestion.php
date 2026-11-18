<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión del contrato DEP-2026-001 - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261117-static">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php include '../components/navbar.php'; layout('r-2'); ?>

    <main class="app-page">
        <div class="mb-5">
            <a href="./gestion_contratos.php" class="btn btn-ghost btn-sm">← Gestión de contratos</a>
        </div>

        <header class="page-heading">
            <div>
                <div class="mb-3 flex flex-wrap items-center gap-2">
                    <span class="badge badge-outline">DEP-2026-001</span>
                    <span class="badge badge-soft badge-success">Vigente</span>
                </div>
                <h1 class="page-title">Contrato · Departamento 302</h1>
                <p class="page-description">Edificio Olmo · Ana Torres · 1 ene — 31 dic 2026</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="./editar_contrato.php?id_contrato=1" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m16 4 4 4L8 20H4v-4L16 4Z" />
                        <path d="m14 6 4 4" />
                    </svg>
                    Actualizar contrato
                </a>
                <a href="./nuevo_mantenimiento.php?id_departamento=1" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Registrar mantenimiento
                </a>
                <a href="./cancelar_contrato.php?id_contrato=1" class="btn btn-outline btn-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m15 9-6 6M9 9l6 6" />
                    </svg>
                    Cancelar contrato
                </a>
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
                            <p class="mt-1 text-sm text-base-content/60">Cada periodo se cubre en un solo pago por el total de la renta.</p>
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
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=1" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Febrero</span><span class="ml-2 text-xs text-base-content/50">#2</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=2" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Marzo</span><span class="ml-2 text-xs text-base-content/50">#3</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=3" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Abril</span><span class="ml-2 text-xs text-base-content/50">#4</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=4" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Mayo</span><span class="ml-2 text-xs text-base-content/50">#5</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=5" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Junio</span><span class="ml-2 text-xs text-base-content/50">#6</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=6" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Julio</span><span class="ml-2 text-xs text-base-content/50">#7</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=7" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Agosto</span><span class="ml-2 text-xs text-base-content/50">#8</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-error">Vencida</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=8" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
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
                                    <td>
                                        <span class="badge badge-soft badge-error">Rechazada</span>
                                        <div class="mt-1 max-w-56 text-xs text-base-content/60">Observación: no se pudo validar el comprobante.</div>
                                    </td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=10" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Noviembre</span><span class="ml-2 text-xs text-base-content/50">#11</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-soft badge-warning">En revisión</span></td>
                                    <td class="text-right">
                                        <div class="tooltip tooltip-left" data-tip="Revisar pago">
                                            <a href="./revision_pago.php?id_renta=11" class="inline-flex size-10 items-center justify-center rounded-md text-primary transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Revisar pago">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="font-medium">Diciembre</span><span class="ml-2 text-xs text-base-content/50">#12</span></td>
                                    <td class="whitespace-nowrap">$18,500</td>
                                    <td><span class="badge badge-ghost">Pendiente</span></td>
                                    <td class="text-right"><a href="./pago_renta_gestion.php?id_renta=12" class="btn btn-ghost btn-sm whitespace-nowrap"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2" /><path d="M2 10h20" /></svg>Registrar pago</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

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
                    <a href="#" class="btn btn-outline btn-sm w-full">Ver documento del contrato</a>
                </div>
            </section>
        </div>

        <section class="card mt-6 border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body gap-5 p-4 sm:p-6">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h2 class="card-title text-lg">Mantenimientos del departamento</h2>
                        <p class="text-sm text-base-content/60">Administra los reportes asociados a esta estancia.</p>
                    </div>
                    <a href="./nuevo_mantenimiento.php?id_departamento=1" class="btn btn-primary btn-sm">Registrar mantenimiento</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr><th>Reporte</th><th>Fecha</th><th>Estado</th><th>Responsable</th><th></th></tr>
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
                                <td class="text-right">
                                    <div class="tooltip tooltip-left" data-tip="Actualizar mantenimiento">
                                        <a href="./actualizar_mantenimiento.php?id=1&amp;id_departamento=1" class="inline-flex size-10 items-center justify-center rounded-md text-base-content transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Actualizar mantenimiento">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="m16 4 4 4L8 20H4v-4L16 4Z" />
                                                <path d="m14 6 4 4" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-medium">Revisión eléctrica</div>
                                    <div class="text-sm text-base-content/60">Inspeccionar contacto de cocina.</div>
                                </td>
                                <td class="whitespace-nowrap">14 nov 2026</td>
                                <td><span class="badge badge-soft badge-warning">Pendiente</span></td>
                                <td class="text-base-content/60">Sin asignar</td>
                                <td class="text-right">
                                    <div class="tooltip tooltip-left" data-tip="Actualizar mantenimiento">
                                        <a href="./actualizar_mantenimiento.php?id=2&amp;id_departamento=1" class="inline-flex size-10 items-center justify-center rounded-md text-base-content transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Actualizar mantenimiento">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="m16 4 4 4L8 20H4v-4L16 4Z" />
                                                <path d="m14 6 4 4" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-medium">Ajuste de cerradura</div>
                                    <div class="text-sm text-base-content/60">Ajuste de puerta de acceso principal.</div>
                                </td>
                                <td class="whitespace-nowrap">2 ago 2026</td>
                                <td><span class="badge badge-soft badge-success">Finalizado</span></td>
                                <td>Cerrajería Roma</td>
                                <td class="text-right">
                                    <div class="tooltip tooltip-left" data-tip="Actualizar mantenimiento">
                                        <a href="./actualizar_mantenimiento.php?id=3&amp;id_departamento=1" class="inline-flex size-10 items-center justify-center rounded-md text-base-content transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Actualizar mantenimiento">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="m16 4 4 4L8 20H4v-4L16 4Z" />
                                                <path d="m14 6 4 4" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
