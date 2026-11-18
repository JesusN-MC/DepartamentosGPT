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
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <div class="app-navbar navbar bg-base-100">
        <div class="navbar-start">
            <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
        </div>
        <div class="navbar-end">
            <a href="./detalle_contrato.php" class="btn btn-ghost">Volver al contrato</a>
        </div>
    </div>

    <main class="flex min-h-[calc(100vh-4.5rem)] flex-col bg-base-200">
        <div class="mx-auto flex w-full max-w-5xl flex-1 flex-col px-6 pb-8">
            <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                <div class="space-y-4">
                    <a href="./detalle_contrato.php" class="link link-hover text-sm">← Detalle del contrato</a>
                    <div class="pt-2">
                        <span class="badge badge-ghost mb-4">Pago por transferencia</span>
                        <h1 class="text-4xl tracking-tight sm:text-5xl">Registrar nuevo pago</h1>
                    </div>
                    <p class="text-base leading-7 text-base-content/60">
                        El pago anterior fue rechazado. Registra un pago nuevo por el importe completo de la renta.
                    </p>
                </div>

                <div class="rounded-box border border-base-300 bg-base-100 p-4">
                    <div class="text-sm text-base-content/60">Importe total de la renta</div>
                    <div class="mt-1 text-2xl font-semibold">$18,500.00 <span class="text-sm font-normal text-base-content/60">MXN</span></div>
                </div>

                <form class="flex flex-1 flex-col">
                    <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                        <section id="pago-paso-1" class="carousel-item w-full shrink-0">
                            <div class="mx-auto flex w-full max-w-[460px] flex-col justify-center gap-8 py-8">
                                <div class="space-y-4">
                                    <h2 class="text-3xl tracking-tight sm:text-4xl">¿Qué día realizaste la transferencia?</h2>
                                    <p class="text-base leading-7 text-base-content/60">Selecciona la fecha del nuevo pago.</p>
                                </div>
                                <fieldset class="fieldset w-full max-w-xl gap-2">
                                    <label class="label" for="payment-date">Fecha de pago</label>
                                    <input id="payment-date" class="input input-lg w-full" type="date">
                                </fieldset>
                                <div class="flex w-full max-w-xl flex-col gap-3">
                                    <div class="aura aura-silver"><a href="#pago-paso-2" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                    <div class="divider my-1 text-sm text-base-content/50">O</div>
                                    <a href="./detalle_contrato.php" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                                </div>
                            </div>
                        </section>
                        <section id="pago-paso-2" class="carousel-item w-full shrink-0">
                            <div class="mx-auto flex w-full max-w-[460px] flex-col justify-center gap-8 py-8">
                                <div class="space-y-4">
                                    <h2 class="text-3xl tracking-tight sm:text-4xl">¿Cuál es la referencia?</h2>
                                    <p class="text-base leading-7 text-base-content/60">El pago se registra únicamente por transferencia.</p>
                                </div>
                                <fieldset class="fieldset w-full max-w-xl gap-2">
                                    <label class="label" for="payment-reference">Referencia de transferencia</label>
                                    <input id="payment-reference" class="input input-lg w-full" placeholder="Ingresa la referencia">
                                </fieldset>
                                <div class="flex w-full max-w-xl flex-col gap-3">
                                    <div class="aura aura-silver"><a href="#pago-paso-3" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                    <div class="divider my-1 text-sm text-base-content/50">O</div>
                                    <a href="#pago-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                                </div>
                            </div>
                        </section>
                        <section id="pago-paso-3" class="carousel-item w-full shrink-0">
                            <div class="mx-auto flex w-full max-w-[460px] flex-col justify-center gap-8 py-8">
                                <div class="space-y-4">
                                    <h2 class="text-3xl tracking-tight sm:text-4xl">Adjunta el comprobante</h2>
                                    <p class="text-base leading-7 text-base-content/60">El pago debe cubrir la renta completa de $18,500.00 MXN.</p>
                                </div>
                                <fieldset class="fieldset w-full max-w-xl gap-2">
                                    <label class="label" for="payment-proof">Comprobante de transferencia</label>
                                    <input id="payment-proof" class="file-input file-input-lg w-full" type="file" accept=".pdf,.jpg,.jpeg,.png">
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
                                    <a href="#pago-paso-2" class="btn btn-secondary btn-lg w-full">Regresar</a>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
