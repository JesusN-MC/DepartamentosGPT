<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisar pago - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <div class="app-navbar navbar bg-base-100">
        <div class="navbar-start"><a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a></div>
        <div class="navbar-end"><a href="./detalle_contrato_gestion.php" class="btn btn-ghost">Volver al contrato</a></div>
    </div>

    <main class="flex min-h-[90vh] flex-col bg-base-200">
        <form class="flex flex-1 flex-col">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="revision-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <a href="./detalle_contrato_gestion.php" class="link link-hover text-sm">← Detalle del contrato</a>
                                <span class="badge badge-ghost">Paso 1 de 2</span>
                                <h1 class="text-4xl tracking-tight sm:text-6xl">Revisar pago de noviembre</h1>
                                <p class="text-base leading-7 text-base-content/60">Contrato DEP-2026-001 · Transferencia de Ana Torres.</p>
                            </div>
                            <div class="rounded-box border border-base-300 bg-base-100 p-5">
                                <div class="flex justify-between gap-4 py-2"><span class="text-sm text-base-content/60">Referencia</span><span class="font-medium">TRX-011</span></div>
                                <div class="flex justify-between gap-4 py-2"><span class="text-sm text-base-content/60">Importe total</span><span class="font-medium">$18,500.00 MXN</span></div>
                                <a href="#" class="btn btn-outline btn-lg mt-4 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <path d="M14 2v6h6" />
                                    </svg>
                                    Ver comprobante adjunto
                                </a>
                            </div>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#revision-paso-2" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="./detalle_contrato_gestion.php" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="revision-paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <span class="badge badge-ghost">Paso 2 de 2</span>
                                <h2 class="text-4xl tracking-tight sm:text-6xl">¿Deseas dejar una observación?</h2>
                                <p class="text-base leading-7 text-base-content/60">Si rechazas el pago, explica qué debe corregir el inquilino. Puedes dejarlo vacío para aprobarlo.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="observaciones">Observaciones</label>
                                <textarea id="observaciones" class="textarea textarea-lg w-full" rows="4" placeholder="Describe el problema del comprobante"></textarea>
                            </fieldset>
                            <div class="grid gap-3">
                                <button type="button" class="btn btn-primary btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12l4 4L19 6" />
                                    </svg>
                                    Aprobar pago
                                </button>
                                <button type="button" class="btn btn-outline btn-lg w-full text-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="m18 6-12 12M6 6l12 12" />
                                    </svg>
                                    Rechazar pago
                                </button>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#revision-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
