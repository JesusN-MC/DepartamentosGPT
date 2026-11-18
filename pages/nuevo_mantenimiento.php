<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar mantenimiento - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php include '../components/navbar.php'; layout('r-2'); ?>

    <main class="flex min-h-[90vh] flex-col bg-base-200">
        <form class="flex flex-1 flex-col">
            <input type="hidden" name="id_departamento" value="1">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="mantenimiento-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <a href="./detalle_depa_gestion.php?id=1" class="link link-hover text-sm">← Detalle del departamento</a>
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Qué trabajo se necesita?</h1>
                                <p class="text-base leading-7 text-base-content/60">Edificio Olmo · Departamento 302. El reporte quedará asociado a tu usuario actual.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="titulo">Título</label>
                                <input id="titulo" class="input input-lg w-full" name="titulo" maxlength="150" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-2" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="./detalle_depa_gestion.php?id=1" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuándo se reportó?</h1>
                                <p class="text-base leading-7 text-base-content/60">Indica la fecha del reporte.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="fecha_reporte">Fecha del reporte</label>
                                <input id="fecha_reporte" class="input input-lg w-full" type="datetime-local" name="fecha_reporte" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-3" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-3" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Quién es el responsable?</h1>
                                <p class="text-base leading-7 text-base-content/60">Este dato es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="responsable">Responsable (opcional)</label>
                                <input id="responsable" class="input input-lg w-full" name="responsable" maxlength="150">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-4" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-2" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-4" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuándo comenzó el trabajo?</h1>
                                <p class="text-base leading-7 text-base-content/60">La fecha de inicio es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="fecha_inicio">Fecha de inicio</label>
                                <input id="fecha_inicio" class="input input-lg w-full" type="datetime-local" name="fecha_inicio">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-5" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-3" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-5" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuándo terminó el trabajo?</h1>
                                <p class="text-base leading-7 text-base-content/60">La fecha de finalización es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="fecha_finalizacion">Fecha de finalización</label>
                                <input id="fecha_finalizacion" class="input input-lg w-full" type="datetime-local" name="fecha_finalizacion">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-6" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-4" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-6" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál fue el costo?</h1>
                                <p class="text-base leading-7 text-base-content/60">Este dato es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="costo">Costo (opcional)</label>
                                <input id="costo" class="input input-lg w-full" type="number" name="costo" min="0" step="0.01">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-7" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-5" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-7" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">Describe el mantenimiento</h1>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="descripcion">Descripción</label>
                                <textarea id="descripcion" class="textarea textarea-lg w-full" name="descripcion" rows="4" required></textarea>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#mantenimiento-paso-8" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-6" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mantenimiento-paso-8" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Deseas agregar observaciones?</h1>
                                <p class="text-base leading-7 text-base-content/60">Este campo es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="observaciones">Observaciones</label>
                                <textarea id="observaciones" class="textarea textarea-lg w-full" name="observaciones" rows="4"></textarea>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><button type="button" class="btn btn-primary btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12l4 4L19 6" />
                                    </svg>
                                    Guardar mantenimiento
                                </button></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#mantenimiento-paso-7" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
