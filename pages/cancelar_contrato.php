<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar contrato DEP-2026-001 - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261117-static">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php include '../components/navbar.php'; layout('r-2'); ?>

    <main class="bg-base-200">
        <form class="flex flex-1 flex-col">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="cancelar-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto w-full max-w-5xl px-6 py-6 sm:py-10">
                        <div class="mx-auto w-full max-w-[460px] space-y-5">
                            <div class="space-y-3">
                                <a href="./detalle_contrato_gestion.php" class="link link-hover text-sm">← Detalle del contrato</a>
                                <span class="badge badge-soft badge-error">Acción administrativa</span>
                                <h1 class="text-3xl tracking-tight sm:text-4xl">¿Por qué se cancela el contrato?</h1>
                                <p class="text-sm leading-6 text-base-content/60">DEP-2026-001 · Ana Torres · Departamento 302.</p>
                            </div>
                            <div class="alert alert-warning">
                                <span>Al cancelar, el estado del contrato cambiará a “cancelado”. Esta acción no elimina el historial de rentas ni pagos.</span>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="motivo">Motivo u observaciones</label>
                                <textarea id="motivo" class="textarea textarea-lg w-full" name="observaciones" rows="3" placeholder="Describe el motivo de la cancelación" required></textarea>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#cancelar-paso-2" class="btn btn-error btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="./detalle_contrato_gestion.php" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="cancelar-paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto w-full max-w-5xl px-6 py-6 sm:py-10">
                        <div class="mx-auto w-full max-w-[460px] space-y-5">
                            <div class="space-y-3">
                                <span class="badge badge-ghost">Confirmación</span>
                                <h2 class="text-3xl tracking-tight sm:text-4xl">Confirma la cancelación</h2>
                                <p class="text-sm leading-6 text-base-content/60">El contrato DEP-2026-001 pasará a estado cancelado. El motivo se conservará en las observaciones del contrato.</p>
                            </div>
                            <div class="rounded-box border border-base-300 bg-base-100 p-5">
                                <div class="flex justify-between gap-4 py-2"><span class="text-sm text-base-content/60">Inquilina</span><span class="font-medium">Ana Torres</span></div>
                                <div class="flex justify-between gap-4 py-2"><span class="text-sm text-base-content/60">Departamento</span><span class="font-medium">Edificio Olmo · 302</span></div>
                                <div class="flex justify-between gap-4 py-2"><span class="text-sm text-base-content/60">Estado actual</span><span class="badge badge-soft badge-success">Vigente</span></div>
                            </div>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><button type="button" class="btn btn-error btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m15 9-6 6M9 9l6 6" />
                                    </svg>
                                    Confirmar cancelación
                                </button></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#cancelar-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
