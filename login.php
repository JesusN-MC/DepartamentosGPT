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
            <a class="btn btn-primary" href="registro.php">Registrarse</a>
        </div>
    </div>

    <!-- Login -->
    <main class="flex h-[90vh] flex-col bg-base-100">
        <form action="departamentos.php" method="POST" class="flex flex-1 flex-col">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="auth-email" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">
                                    ¿Cuál es tu correo electrónico?
                                </h1>

                                <p class="max-w-xl text-base leading-7 text-base-content/60">
                                    Escribe el correo que utilizas para acceder a tu cuenta.
                                </p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="email">
                                    Correo electrónico
                                </label>

                                <input type="email" id="email" name="email" class="input input-lg w-full"
                                    placeholder="nombre@ejemplo.com" autocomplete="email" />
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">
                                <div class="aura aura-silver">
                                    <a href="#auth-password" class="btn btn-primary btn-lg w-full">
                                        Continuar
                                    </a>
                                </div>

                                <div class="divider my-1 text-sm text-base-content/50">
                                    O
                                </div>

                                <button type="button" class="btn btn-secondary btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"
                                        aria-hidden="true">
                                        <path fill="#EA4335"
                                            d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 3.06 13.22l7.98 6.19C12.93 13.72 18.01 9.5 24 9.5z" />
                                        <path fill="#4285F4"
                                            d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.76 7.18l7.73 6C44.42 37.98 46.98 31.82 46.98 24.55z" />
                                        <path fill="#FBBC05"
                                            d="M11.04 28.59A14.4 14.4 0 0 1 10.27 24c0-1.59.27-3.13.76-4.59l-7.98-6.19A23.9 23.9 0 0 0 0 24c0 3.87.93 7.52 3.06 10.78l7.98-6.19z" />
                                        <path fill="#34A853"
                                            d="M24 48c6.48 0 11.93-2.13 15.91-5.8l-7.73-6c-2.15 1.45-4.91 2.3-8.18 2.3-5.99 0-11.07-4.22-12.96-9.91l-7.98 6.19C6.51 41.62 14.62 48 24 48z" />
                                    </svg>
                                    Continuar con Google
                                </button>
                            </div>

                        </div>
                    </div>
                </section>
                <section id="auth-password" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">

                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">

                            <div class="space-y-4">
                                <h1 class="text-4xl tracking-tight sm:text-6xl">
                                    Nos alegramos de verte de nuevo
                                </h1>

                                <p class="max-w-xl text-base leading-7 text-base-content/60">
                                    Introduce tu contraseña para acceder a tu cuenta.
                                </p>
                            </div>

                            <fieldset class="fieldset w-full max-w-xl gap-2">
                                <label class="label" for="password">
                                    Contraseña
                                </label>

                                <input type="password" id="password" name="password" class="input input-lg w-full"
                                    placeholder="Ingresa tu contraseña" autocomplete="current-password" />
                            </fieldset>

                            <div class="flex w-full max-w-xl flex-col gap-3">

                                <div class="aura aura-silver">
                                    <button type="submit" class="btn btn-primary btn-lg w-full">
                                        Acceder
                                    </button>
                                </div>

                                <div class="divider my-1 text-sm text-base-content/50">
                                    O
                                </div>

                                <a href="#auth-email" class="btn btn-secondary btn-lg w-full">
                                    Regresar
                                </a>

                            </div>

                        </div>
                    </div>
                </section>
                ```
            </div>
        </form>

    </main>
</body>

</html>