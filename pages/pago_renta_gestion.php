<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar pago de renta - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261117-static">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php include '../components/navbar.php'; layout('r-2'); ?>

    <main class="flex h-[90vh] flex-col bg-base-200">
        <form class="flex flex-1 flex-col">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="pago-gestion-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <a href="./detalle_contrato_gestion.php" class="link link-hover text-sm">← Detalle del contrato</a>
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Qué renta vas a registrar?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Contrato DEP-2026-001. Registra el pago total de $18,500 MXN; no se permiten pagos parciales.</p>
                            </div>
                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="periodo">Periodo de renta</label>
                                <select id="periodo" class="select select-lg w-full" name="id_renta" required>
                                    <option value="">Selecciona un periodo</option>
                                    <option value="1">Enero 2026 · Vencida</option>
                                    <option value="2">Febrero 2026 · Vencida</option>
                                    <option value="3">Marzo 2026 · Vencida</option>
                                    <option value="4">Abril 2026 · Vencida</option>
                                    <option value="5">Mayo 2026 · Vencida</option>
                                    <option value="6">Junio 2026 · Vencida</option>
                                    <option value="7">Julio 2026 · Vencida</option>
                                    <option value="8">Agosto 2026 · Vencida</option>
                                    <option value="10">Octubre 2026 · Rechazada</option>
                                    <option value="12">Diciembre 2026 · Pendiente</option>
                                </select>
                            </fieldset>
                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver"><a href="#pago-gestion-paso-2" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="./detalle_contrato_gestion.php" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="pago-gestion-paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuándo se recibió el pago?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Indica la fecha en que se recibió el importe completo.</p>
                            </div>
                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="fecha-pago">Fecha de pago</label>
                                <input id="fecha-pago" class="input input-lg w-full" type="date" name="fecha_pago" required>
                            </fieldset>
                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver"><a href="#pago-gestion-paso-3" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#pago-gestion-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="pago-gestion-paso-3" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cómo se recibió el pago?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Selecciona efectivo o transferencia.</p>
                            </div>
                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="metodo-pago">Método de pago</label>
                                <select id="metodo-pago" class="select select-lg w-full" name="metodo_pago" required>
                                    <option value="">Selecciona un método</option>
                                    <option value="efectivo">Efectivo</option>
                                    <option value="transferencia">Transferencia</option>
                                </select>
                            </fieldset>
                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver"><a href="#pago-gestion-paso-4" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#pago-gestion-paso-2" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="pago-gestion-paso-4" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es la referencia?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Es opcional y solo se usa para pagos por transferencia.</p>
                            </div>
                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="referencia">Referencia (opcional)</label>
                                <input id="referencia" class="input input-lg w-full" name="referencia" maxlength="100" placeholder="Ingresa la referencia">
                            </fieldset>
                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver"><a href="#pago-gestion-paso-5" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#pago-gestion-paso-3" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="pago-gestion-paso-5" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">Adjunta el comprobante</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Es opcional para efectivo y debe adjuntarse si el pago fue por transferencia.</p>
                            </div>
                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="comprobante">Comprobante (opcional)</label>
                                <input id="comprobante" class="file-input file-input-lg w-full" type="file" name="comprobante" accept=".pdf,.jpg,.jpeg,.png">
                            </fieldset>
                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver"><button type="button" class="btn btn-primary btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect width="20" height="14" x="2" y="5" rx="2" />
                                        <path d="M2 10h20" />
                                    </svg>
                                    Registrar pago
                                </button></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#pago-gestion-paso-4" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
