<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar imagen - DepartamentosGPT</title>
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
            <input type="hidden" name="id_departamento" value="1">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="imagen-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4">
                                <a href="./detalle_depa_gestion.php?id=1" class="link link-hover text-sm">← Detalle del departamento</a>
                                <span class="badge badge-ghost">Edificio Olmo · Departamento 302</span>
                                <h1 class="text-4xl tracking-tight sm:text-6xl">¿Qué imagen deseas agregar?</h1>
                                <p class="text-base leading-7 text-base-content/60">Este dato se registra en el departamento seleccionado.</p>
                            </div>
                            <fieldset class="fieldset w-full gap-2">
                                <label class="label" for="imagen">Archivo de imagen</label>
                                <input id="imagen" class="file-input file-input-lg w-full" type="file" name="imagen" accept="image/*" required>
                                <p class="text-sm text-base-content/60">Selecciona una imagen del departamento.</p>
                            </fieldset>
                            <div class="flex w-full flex-col gap-3">
                                <div class="aura aura-silver"><button type="button" class="btn btn-primary btn-lg w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect width="18" height="18" x="3" y="3" rx="2" />
                                        <circle cx="9" cy="9" r="2" />
                                        <path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L9 18M12 12v6m-3-3h6" />
                                    </svg>
                                    Agregar imagen
                                </button></div>
                                <div class="divider my-1 text-sm text-base-content/50">O</div>
                                <a href="./detalle_depa_gestion.php?id=1" class="btn btn-secondary btn-lg w-full">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
