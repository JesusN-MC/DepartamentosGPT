<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DaisyUI - Shadcn Light</title>

    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        [data-theme="shadcn"] {
            color-scheme: light;

            /* Base */
            --color-base-100: oklch(1 0 0);
            --color-base-200: oklch(0.985 0 0);
            --color-base-300: oklch(0.922 0 0);
            --color-base-content: oklch(0.145 0 0);

            /* Primary */
            --color-primary: oklch(0.205 0 0);
            --color-primary-content: oklch(0.985 0 0);

            /* Secondary */
            --color-secondary: oklch(0.97 0 0);
            --color-secondary-content: oklch(0.205 0 0);

            /* Accent */
            --color-accent: oklch(0.97 0 0);
            --color-accent-content: oklch(0.205 0 0);

            /* Neutral */
            --color-neutral: oklch(0.205 0 0);
            --color-neutral-content: oklch(0.985 0 0);

            /* Info */
            --color-info: oklch(0.546 0.215 262.881);
            --color-info-content: oklch(0.985 0 0);

            /* Success */
            --color-success: oklch(0.596 0.145 163.225);
            --color-success-content: oklch(0.985 0 0);

            /* Warning */
            --color-warning: oklch(0.769 0.188 70.08);
            --color-warning-content: oklch(0.205 0 0);

            /* Error / Destructive */
            --color-error: oklch(0.577 0.245 27.325);
            --color-error-content: oklch(0.985 0 0);

            /* Radios */
            --radius-selector: 0.375rem;
            --radius-field: 0.5rem;
            --radius-box: 0.625rem;

            /* Tamaños */
            --size-selector: 0.25rem;
            --size-field: 0.25rem;

            /* Bordes y efectos */
            --border: 1px;
            --depth: 0;
            --noise: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar bg-base-100 shadow-sm min-h-[72px]">
        <div class="navbar-start">
            <a class="btn btn-ghost text-xl" href="index.php">DepartamentosGPT</a>
        </div>
        <div class="navbar-center hidden lg:flex">
        </div>
        <div class="navbar-end">
            <a class="btn btn-primary" href="departamentos.php">Ver departamentos</a>
        </div>
    </div>


    <main class="flex h-[90vh] flex-col bg-base-100">
        <form action="departamentos.php" method="POST" class="flex flex-1 flex-col">
            <div class="carousel carousel-horizontal carousel-start w-full overflow-x-hidden scroll-smooth">

               
                <section id="paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el número del departamento?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Puede ser un número o clave, por ejemplo 301 o 1A.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="nombre_numero">Número del departamento</label>
                                <input type="text" id="nombre_numero" name="nombre_numero" maxlength="50"
                                    class="input input-lg w-full" placeholder="301" required>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-2" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="departamentos.php" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </section>

              
                <section id="paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿En qué edificio está?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Escribe el nombre o número del edificio.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="edificio">Edificio</label>
                                <input type="text" id="edificio" name="edificio" maxlength="100"
                                    class="input input-lg w-full" placeholder="Edificio 1" required>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-3" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="paso-3" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es la dirección?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Incluye calle, número, colonia y ciudad.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="direccion">Dirección</label>
                                <input type="text" id="direccion" name="direccion" maxlength="255" autocomplete="street-address"
                                    class="input input-lg w-full"
                                    placeholder="Av. Principal 123, Col. Centro, Escuinapa, Sinaloa" required>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-4" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-2" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

               
                <section id="paso-4" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿En qué piso está?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Puedes escribir un número o texto, por ejemplo 3 o PB.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="piso">Piso</label>
                                <input type="text" id="piso" name="piso" maxlength="20"
                                    class="input input-lg w-full" placeholder="3" required>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-5" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-3" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

               
                <section id="paso-5" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuántas habitaciones tiene?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Escribe solo el número de habitaciones.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="habitaciones">Habitaciones</label>
                                <input type="number" id="habitaciones" name="habitaciones" min="0" max="255" step="1"
                                    class="input input-lg w-full" placeholder="2" required>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-6" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-4" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

               
                <section id="paso-6" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuántos baños tiene?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Usa .5 para medios baños, por ejemplo 1.5.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="banos">Baños</label>
                                <input type="number" id="banos" name="banos" min="0" max="99.9" step="0.5"
                                    class="input input-lg w-full" placeholder="2" required>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-7" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-5" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

                
                <section id="paso-7" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Quieres agregar una descripción?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Es opcional. Puedes dejarla vacía y continuar.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="descripcion">Descripción (opcional)</label>
                                <textarea id="descripcion" name="descripcion" rows="4"
                                    class="textarea textarea-lg w-full"
                                    placeholder="Una breve descripción del departamento"></textarea>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-8" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-6" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

               
                <section id="paso-8" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuánto cuesta la renta?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Indica el precio mensual en pesos mexicanos.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="precio_renta">Precio de renta</label>
                                <label class="input input-lg w-full">
                                    <span class="label">$</span>
                                    <input type="number" id="precio_renta" name="precio_renta" min="0" step="0.01"
                                        placeholder="850.00" required>
                                    <span class="label">MXN</span>
                                </label>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#paso-9" class="btn btn-primary btn-lg w-full">Continuar</a>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-7" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                </section>

               
                <section id="paso-9" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿De cuánto es el depósito?</h1>
                                <p class="max-w-xl text-base leading-7 text-base-content/60">Indica el monto del depósito en pesos mexicanos.</p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="deposito">Depósito</label>
                                <label class="input input-lg w-full">
                                    <span class="label">$</span>
                                    <input type="number" id="deposito" name="deposito" min="0" step="0.01"
                                        placeholder="500.00" required>
                                    <span class="label">MXN</span>
                                </label>
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <button type="submit" class="btn btn-primary btn-lg w-full">Guardar departamento</button>
                                </div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="#paso-8" class="btn btn-secondary btn-lg w-full">Regresar</a>
                            </div>
                        </div>
                    </div>
                    
                </section>

                
                
            </div>
            
        </form>
    </main>
</body>

</html>