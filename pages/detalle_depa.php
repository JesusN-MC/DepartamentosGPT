<?php
$d = [
    'nombre_numero' => '302',
    'edificio'      => 'Edificio Olmo',
    'direccion'     => 'Colima 145, Roma Norte, Cuauhtémoc',
    'piso'          => '3',
    'habitaciones'  => 2,
    'banos'         => 1.5,
    'descripcion'   => "Departamento luminoso a pasos de cafeterías, parques y transporte público.\nCocina integrada, ventanales amplios y vigilancia 24 horas.",
    'precio_renta'  => 18500.00,
    'deposito'      => 18500.00,
    'contacto'      => '55 1234 5678',
];

// Las fotos no están en la tabla; por ahora van de ejemplo (luego pueden venir de otra tabla)
$imagenes = [
    'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80',
    'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
    'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=80',
    'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=1200&q=80',
];

$titulo = $d['edificio'] . ' · ' . $d['nombre_numero'];
$banos  = rtrim(rtrim(number_format((float) $d['banos'], 1), '0'), '.'); // 1.5 -> "1.5", 2.0 -> "2"
?>
<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titulo) ?> - DepartamentosGPT</title>

    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-white">
    <!-- Navbar -->
    <header class="sticky top-0 z-50">
        <div class="navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <div class="megamenu megamenu-wide p-2" id="my-megamenu-2" popover>
                    <span class="megamenu-active"></span>
                    <button popovertarget="b1">Servicios</button>
                    <div id="b1" popover>
                        <ul class="menu menu-horizontal">
                            <li><a>Enterprise</a></li>
                            <li><a>CRM software</a></li>
                            <li><a>Security</a></li>
                            <li><a>Consulting</a></li>
                        </ul>
                    </div>
                    <button popovertarget="b2" class="after:content-none">Departamentos</button>
                    <button popovertarget="b3" class="after:content-none">Nosotros</button>
                </div>
            </div>
            <div class="navbar-end">
                <a class="btn btn-primary" href="./login.php">Acceder</a>
            </div>
        </div>
    </header>

    <!-- Detalle -->
    <main class="mx-auto max-w-5xl px-6 py-8">
        <a href="./departamentos.php" class="btn btn-ghost btn-sm mb-4">‹ Volver</a>

        <div class="grid gap-8 md:grid-cols-5">

            <!-- Carrusel -->
            <div class="relative md:col-span-3">
                <div id="carrusel" class="carousel w-full rounded-box border border-base-300">
                    <?php foreach ($imagenes as $i => $img): ?>
                        <div class="carousel-item w-full">
                            <img src="<?= htmlspecialchars($img) ?>"
                                alt="Foto <?= $i + 1 ?> de <?= htmlspecialchars($titulo) ?>"
                                class="aspect-[4/3] w-full object-cover" <?= $i > 0 ? 'loading="lazy"' : '' ?>>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Flechas -->
                <div class="absolute left-3 right-3 top-1/2 flex -translate-y-1/2 justify-between">
                    <button id="prev" class="btn btn-circle btn-sm" aria-label="Anterior">❮</button>
                    <button id="next" class="btn btn-circle btn-sm" aria-label="Siguiente">❯</button>
                </div>
            </div>

            <!-- Información -->
            <div class="flex flex-col gap-4 md:col-span-2">
                <div class="badge badge-secondary">En renta</div>

                <h1 class="text-3xl font-semibold"><?= htmlspecialchars($titulo) ?></h1>

                <p class="flex items-center gap-1.5 text-base-content/70">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                        <circle cx="12" cy="10" r="2.5" />
                    </svg>
                    <?= htmlspecialchars($d['direccion']) ?>
                </p>

                <!-- Precio y depósito -->
                <div>
                    <span class="text-3xl font-bold">$<?= number_format($d['precio_renta']) ?></span>
                    <span class="text-sm text-base-content/60">MXN / mes</span>
                    <p class="text-sm text-base-content/60">
                        Depósito: $<?= number_format($d['deposito']) ?> MXN
                    </p>
                </div>

                <!-- Características -->
                <div class="flex flex-wrap gap-2">
                    <div class="badge badge-outline"><?= (int) $d['habitaciones'] ?> recámaras</div>
                    <div class="badge badge-outline"><?= $banos ?> baños</div>
                    <div class="badge badge-outline">Piso <?= htmlspecialchars($d['piso']) ?></div>
                </div>

                <?php if (!empty($d['descripcion'])): ?>
                    <p class="text-base-content/80"><?= nl2br(htmlspecialchars($d['descripcion'])) ?></p>
                <?php endif; ?>

                <!-- Contacto -->
                <div class="mt-2 flex flex-wrap items-center gap-2">
                    <button class="btn btn-primary">Agendar visita</button>
                    <button class="btn btn-secondary">Contactar</button>
                </div>
                <p class="text-sm text-base-content/60">
                    Contacto: <span class="font-medium text-base-content"><?= htmlspecialchars($d['contacto']) ?></span>
                </p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer footer-horizontal footer-center bg-base-200 text-base-content rounded p-10">
        <nav class="grid grid-flow-col gap-4">
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
        </nav>
        <aside>
            <p>Copyright © <?= date('Y') ?> - All right reserved by ACME Industries Ltd</p>
        </aside>
    </footer>

    <script>
        // Flechas del carrusel: mueven un "slide" completo
        const carrusel = document.getElementById('carrusel');
        document.getElementById('prev').addEventListener('click', () =>
            carrusel.scrollBy({ left: -carrusel.clientWidth, behavior: 'smooth' }));
        document.getElementById('next').addEventListener('click', () =>
            carrusel.scrollBy({ left: carrusel.clientWidth, behavior: 'smooth' }));
    </script>
</body>

</html>