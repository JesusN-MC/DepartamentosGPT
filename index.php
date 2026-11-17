<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DepartamentosGPT · Encuentra tu espacio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="./assets/css/style.css?v=20261115-3">

</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <!-- Navbar -->
    <div class="app-navbar navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <a class="btn btn-ghost text-xl" href="index.php">DepartamentosGPT</a>
        </div>
        <nav class="navbar-center hidden items-center gap-1 lg:flex" aria-label="Navegación principal">
            <a class="btn btn-ghost btn-sm" href="./pages/departamentos.php">Departamentos</a>
        </nav>
        <div class="navbar-end">
            <a class="btn btn-primary" href="./pages/login.php">Acceder</a>
        </div>
    </div>

    <!-- Hero Section -->
    <main class="hero h-[90vh] bg-base-200 lg:px-[13vw]">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <img alt="Interior de un departamento"
                src="https://cdn.pixabay.com/photo/2024/08/31/11/18/kitchen-9011246_1280.jpg"
                class="hidden max-w-[90vw] rounded-lg shadow-2xl md:block md:max-w-lg" />

            <div class="flex flex-col justify-between self-stretch py-6">
                <div class="badge badge-soft">Administración inmobiliaria</div>
                <h1 class="text-6xl font-semibold tracking-tight">Encuentra tu nuevo espacio para llamar hogar.</h1>
                <p class="py-6 text-lg">
                    Te ayudamos a encontrar departamentos en renta y venta, con la mejor ubicación y precio. Nuestro
                    equipo de expertos te guiará en todo el proceso para que encuentres el lugar perfecto para ti.
                </p>
                <div class="ml-[.5rem] flex flex-wrap gap-2">
                    <a href="./pages/departamentos.php" class="btn btn-secondary">Conocer más</a>
                    <a href="./pages/departamentos.php" class="btn btn-primary">Ver departamentos</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer footer footer-horizontal footer-center p-8">
        <nav class="grid grid-flow-col gap-4">
            <a class="link link-hover" href="./pages/departamentos.php">Departamentos</a>
            <a class="link link-hover" href="./pages/login.php">Acceder</a>
        </nav>
        <aside>
            <p>DepartamentosGPT · <?= date('Y') ?></p>
        </aside>
    </footer>
</body>

</html>