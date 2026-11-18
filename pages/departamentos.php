<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Departamentos disponibles - DepartamentosGPT</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
    
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <!-- Navbar -->
    <header class="sticky top-0 z-50">
        <?php
            include '../components/navbar.php';
            layout('r-1');
        ?>
        <section class="listing-toolbar">
            <div class="mx-auto flex max-w-[96rem] flex-wrap items-center gap-3 px-5 py-3 sm:px-8 lg:px-10">
                <label class="input flex min-w-48 flex-1 items-center gap-2">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" width="14" height="14" stroke-linecap="round" stroke-width="2.5"
                            fill="none" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input type="search" class="grow" placeholder="Colonia, calle o edificio"
                        aria-label="Buscar por colonia, calle o edificio" />
                </label>

                <select class="select select-bordered select-sm w-40" aria-label="Filtrar por precio">
                    <option selected>Precio</option>
                    <option>Hasta $15,000</option>
                    <option>$15,000 - $20,000</option>
                    <option>Más de $20,000</option>
                </select>

                <select class="select select-bordered select-sm w-36" aria-label="Filtrar por recámaras">
                    <option selected>Recámaras</option>
                    <option>1 recámara</option>
                    <option>2 recámaras</option>
                    <option>3+ recámaras</option>
                </select>

                <select class="select select-bordered select-sm w-32" aria-label="Filtrar por baños">
                    <option selected>Baños</option>
                    <option>1 baño</option>
                    <option>2 baños</option>
                    <option>3+ baños</option>
                </select>

                <button class="btn btn-neutral btn-sm gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7" />
                        <path d="m20 20-4-4" />
                    </svg>
                    Buscar
                </button>
            </div>
        </section>
    </header>


    <!-- Listado de departamentos -->
    <main>
        <div class="mx-auto max-w-[96rem] px-5 pb-10 pt-6 sm:px-8 lg:px-10">
            <section class="department-grid grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5"
                aria-label="Departamentos disponibles">
                <?php
                $departamentos = [
                    ['nombre' => 'Edificio Olmo &middot; 302', 'imagen' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 2, 'piso' => 3, 'direccion' => 'Colima 145 Roma Norte, Cuauht&eacute;moc', 'precio' => '$18,500'],
                    ['nombre' => 'Edificio del Parque &middot; 204', 'imagen' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 2, 'piso' => 2, 'direccion' => 'Av. M&eacute;xico 87 Hip&oacute;dromo, Cuauht&eacute;moc', 'precio' => '$21,000'],
                    ['nombre' => 'Edificio Alameda &middot; 105', 'imagen' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 1, 'banos' => 1, 'piso' => 1, 'direccion' => 'Dr. Mora 18 Centro, Cuauht&eacute;moc', 'precio' => '$12,500'],
                    ['nombre' => 'Edificio Olmo &middot; 402', 'imagen' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 2, 'piso' => 3, 'direccion' => 'Colima 145 Roma Norte, Cuauht&eacute;moc', 'precio' => '$18,500'],
                    ['nombre' => 'Edificio Londres &middot; 102', 'imagen' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 1, 'banos' => 1, 'piso' => 1, 'direccion' => 'Londres 40 Ju&aacute;rez, Cuauht&eacute;moc', 'precio' => '$15,500'],
                    ['nombre' => 'Edificio Brisa &middot; 303', 'imagen' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 2, 'piso' => 3, 'direccion' => 'Lago P&aacute;tzcuaro 56 An&aacute;huac, Miguel Hidalgo', 'precio' => '$17,900'],
                    ['nombre' => 'Edificio del Parque &middot; 205', 'imagen' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 2, 'piso' => 2, 'direccion' => 'Av. M&eacute;xico 87 Hip&oacute;dromo, Cuauht&eacute;moc', 'precio' => '$21,000'],
                    ['nombre' => 'Edificio Alameda &middot; 106', 'imagen' => 'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 1, 'banos' => 1, 'piso' => 1, 'direccion' => 'Dr. Mora 18 Centro, Cuauht&eacute;moc', 'precio' => '$12,500'],
                    ['nombre' => 'Edificio Londres &middot; 103', 'imagen' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 1, 'banos' => 1, 'piso' => 1, 'direccion' => 'Londres 40 Ju&aacute;rez, Cuauht&eacute;moc', 'precio' => '$15,500'],
                    ['nombre' => 'Edificio Brisa &middot; 304', 'imagen' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 2, 'piso' => 3, 'direccion' => 'Lago P&aacute;tzcuaro 56 An&aacute;huac, Miguel Hidalgo', 'precio' => '$17,900'],
                    ['nombre' => 'Edificio Jacaranda &middot; 202', 'imagen' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&q=80', 'habitaciones' => 2, 'banos' => 1, 'piso' => 2, 'direccion' => 'Xicot&eacute;ncatl 128 Del Carmen, Coyoac&aacute;n', 'precio' => '$19,500'],
                ];
                foreach ($departamentos as $departamento):
                ?>
                    <a href="../pages/detalle_depa.php" class="block">
                        <article class="property-card card card-compact overflow-hidden">
                            <figure class="aspect-[1.65/1] w-full">
                                <img src="<?= htmlspecialchars($departamento['imagen']) ?>" alt="Fotograf&iacute;a de referencia del departamento <?= $departamento['nombre'] ?>" class="h-full w-full object-cover" loading="lazy">
                            </figure>
                            <div class="card-body">
                                <div class="flex items-center justify-between gap-2">
                                    <h2 class="min-w-0 truncate font-semibold leading-tight"><?= $departamento['nombre'] ?></h2>
                                    <div class="flex shrink-0 items-center gap-2 text-xs text-base-content/70" aria-label="Caracter&iacute;sticas">
                                        <div class="tooltip" data-tip="Habitaciones <?= $departamento['habitaciones'] ?>">
                                            <span class="inline-flex items-center gap-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 4v16M2 8h20v12M2 13h20M6 8v5M22 17H2" /></svg><span><?= $departamento['habitaciones'] ?></span></span>
                                        </div>
                                        <div class="tooltip" data-tip="Baños <?= $departamento['banos'] ?>">
                                            <span class="inline-flex items-center gap-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6 7.5 4.5a2.12 2.12 0 0 0-3 3L6 9M3 12h18v2a6 6 0 0 1-6 6H9a6 6 0 0 1-6-6v-2ZM7 20v2M17 20v2" /></svg><span><?= $departamento['banos'] ?></span></span>
                                        </div>
                                        <div class="tooltip" data-tip="Piso <?= $departamento['piso'] ?>">
                                            <span class="inline-flex items-center gap-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3 9 5-9 5-9-5 9-5ZM3 12l9 5 9-5M3 16l9 5 9-5" /></svg><span><?= $departamento['piso'] ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <p class="flex items-center gap-1.5 truncate text-xs text-base-content/60"><svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" /><circle cx="12" cy="10" r="2.5" /></svg><span class="truncate"><?= $departamento['direccion'] ?></span></p>
                                <div class="mt-auto flex items-baseline justify-end gap-1">
                                    <span class="text-lg font-semibold leading-tight"><?= htmlspecialchars($departamento['precio']) ?></span>
                                    <span class="text-xs text-base-content/50">MXN / mes</span>
                                </div>
                            </div>
                        </article>
                    </a>
                <?php endforeach; ?>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer footer footer-horizontal footer-center p-8">
        <nav class="grid grid-flow-col gap-4">
            <a class="link link-hover" href="../index.php">Inicio</a>
            <a class="link link-hover" href="./login.php">Acceder</a>
        </nav>
        <aside>
            <p>DepartamentosGPT · <?= date('Y') ?></p>
        </aside>
    </footer>
</body>

</html>