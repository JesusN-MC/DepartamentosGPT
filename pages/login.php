<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acceder - DepartamentosGPT</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Servicio de Google OAuth -->
    <script src="https://accounts.google.com/gsi/client" async></script>

    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php 
        include '../components/navbar.php';
        layout('auth-l');
    ?>

    <!-- Login -->
    <main class="flex h-[90vh] flex-col bg-base-200">
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

                                <div id="g_id_onload"
                                    data-client_id="12487998053-u7foc6j4f1rie3nm9p7cf1tvb42ij753.apps.googleusercontent.com"
                                    data-login_uri="http://localhost/proyecto_departamentos/controllers/validar_login.php"
                                    data-auto_prompt="false" data-callback="onSignIn">
                                </div>

                                <div class="g_id_signin flex justify-center" data-type="standard" data-size="large"
                                    data-theme="outline" data-text="sign_in_with" data-shape="rectangular"
                                    data-logo_alignment="left">
                                </div>
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
            </div>
        </form>

        <div id="loading" class="hidden">
            <div class="fixed w-[100vw] h-[100vh] top-0 left-0 z-50 flex items-end justify-end bg-gray-900/50 p-4">
                <div role="alert" class="alert alert-vertical sm:alert-horizontal w-full max-w-[400px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current text-info h-6 w-6 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="font-bold">Iniciando sesión...</h3>
                        <div class="text-xs">Por favor, espera un momento.</div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script src="../assets/js/main.js">
    </script>
</body>

</html>