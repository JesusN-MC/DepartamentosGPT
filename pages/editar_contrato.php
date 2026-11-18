<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contrato - DepartamentosGPT</title>
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
        <form class="flex flex-1 flex-col" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_contrato" value="1">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="edita-contrato-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <a href="./detalle_contrato_gestion.php" class="link link-hover text-sm">← Detalle del contrato</a>
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el folio del contrato?</h1>
                                <p class="text-base leading-7 text-base-content/60">Actualiza el identificador del acuerdo.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="folio">Folio</label>
                                <input id="folio" class="input input-lg w-full" name="folio" maxlength="30" value="DEP-2026-001" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-2" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="./detalle_contrato_gestion.php" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Qué departamento se rentará?</h1>
                                <p class="text-base leading-7 text-base-content/60">Selecciona el inmueble asociado al contrato.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="id_departamento">Departamento</label>
                                <select id="id_departamento" class="select select-lg w-full" name="id_departamento" required>
                                    <option value="1" selected>Edificio Olmo · 302</option>
                                    <option value="2">Edificio del Parque · 204</option>
                                    <option value="3">Edificio Alameda · 105</option>
                                </select>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-3" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-3" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Quién será el inquilino?</h1>
                                <p class="text-base leading-7 text-base-content/60">Selecciona al usuario que firmará el contrato.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="id_inquilino">Inquilino</label>
                                <select id="id_inquilino" class="select select-lg w-full" name="id_inquilino" required>
                                    <option value="2" selected>Ana Torres</option>
                                    <option value="3">Luis Fernández</option>
                                </select>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-4" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-2" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-4" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuándo inicia el contrato?</h1>
                                <p class="text-base leading-7 text-base-content/60">Indica la fecha de inicio acordada.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="fecha_inicio">Fecha de inicio</label>
                                <input id="fecha_inicio" class="input input-lg w-full" type="date" name="fecha_inicio" value="2026-01-01" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-5" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-3" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-5" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuántos meses durará?</h1>
                                <p class="text-base leading-7 text-base-content/60">Indica la duración total acordada.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="cantidad_meses">Duración (meses)</label>
                                <input id="cantidad_meses" class="input input-lg w-full" type="number" name="cantidad_meses" min="1" value="12" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-6" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-4" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-6" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es la fecha de salida?</h1>
                                <p class="text-base leading-7 text-base-content/60">Este dato es opcional si aún no se define.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="fecha_salida">Fecha de salida (opcional)</label>
                                <input id="fecha_salida" class="input input-lg w-full" type="date" name="fecha_salida" value="2026-12-31">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-7" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-5" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-7" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál será la renta mensual?</h1>
                                <p class="text-base leading-7 text-base-content/60">El monto corresponde a una renta completa.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="renta_mensual">Renta mensual</label>
                                <input id="renta_mensual" class="input input-lg w-full" type="number" name="renta_mensual" min="0" step="0.01" value="18500" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-8" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-6" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-8" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Qué día vence la renta?</h1>
                                <p class="text-base leading-7 text-base-content/60">Elige el día del mes para realizar el pago.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="dia_pago">Día de pago</label>
                                <input id="dia_pago" class="input input-lg w-full" type="number" name="dia_pago" min="1" max="31" value="5" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-9" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-7" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-9" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál será el depósito?</h1>
                                <p class="text-base leading-7 text-base-content/60">Indica el monto acordado para el depósito.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="deposito">Depósito</label>
                                <input id="deposito" class="input input-lg w-full" type="number" name="deposito" min="0" step="0.01" value="18500" required>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-10" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-8" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-10" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuándo se firmó el contrato?</h1>
                                <p class="text-base leading-7 text-base-content/60">La fecha de firma es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="fecha_firma">Fecha de firma (opcional)</label>
                                <input id="fecha_firma" class="input input-lg w-full" type="date" name="fecha_firma" value="2025-12-20">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-11" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-9" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-11" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el estado del contrato?</h1>
                                <p class="text-base leading-7 text-base-content/60">Selecciona el estado actual del registro.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="estado">Estado</label>
                                <select id="estado" class="select select-lg w-full" name="estado" required>
                                    <option value="borrador">Borrador</option>
                                    <option value="pendiente_firma">Pendiente de firma</option>
                                    <option value="vigente" selected>Vigente</option>
                                    <option value="vencido">Vencido</option>
                                    <option value="terminado">Terminado</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-12" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-10" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-12" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Deseas reemplazar el documento?</h1>
                                <p class="text-base leading-7 text-base-content/60">Puedes conservar el documento actual o adjuntar uno nuevo.</p>
                            </div>
                            <div class="flex items-center gap-3 rounded-box border border-base-300 bg-base-100 p-4">
                                <span class="badge badge-neutral">PDF</span>
                                <span class="text-sm font-medium">contrato-DEP-2026-001.pdf</span>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="archivo_contrato">Nuevo documento (opcional)</label>
                                <input id="archivo_contrato" class="file-input file-input-lg w-full" type="file" name="archivo_contrato" accept=".pdf,.doc,.docx">
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><a href="#edita-contrato-paso-13" class="btn btn-primary btn-lg w-full">Continuar</a></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-11" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="edita-contrato-paso-13" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Deseas agregar observaciones?</h1>
                                <p class="text-base leading-7 text-base-content/60">Este campo es opcional.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="observaciones">Observaciones</label>
                                <textarea id="observaciones" class="textarea textarea-lg w-full" name="observaciones" rows="4">Contrato vigente hasta el 31 de diciembre de 2026.</textarea>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><button type="button" class="btn btn-primary btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12l4 4L19 6" />
                                    </svg>
                                    Guardar cambios
                                </button></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#edita-contrato-paso-12" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
