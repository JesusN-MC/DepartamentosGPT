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

        .department-grid .card-body {
            gap: 0.75rem;
            padding: 1rem;
        }

        .department-grid .card-body h2 {
            font-size: 0.95rem;
        }

        .department-grid .card-body [aria-label="Características"] {
            font-size: 0.8rem;
        }

        .department-grid .card-body p {
            font-size: 0.75rem;
        }

        .department-grid .card-body svg {
            width: 1rem;
            height: 1rem;
            flex-shrink: 0;
        }

        .department-grid .card-body>div:last-child>span:first-child {
            font-size: 1.25rem;
        }

        .department-grid .card-body>div:last-child>span:last-child {
            font-size: 0.7rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="sticky top-0 z-50">
        <div class="navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="index.php">DepartamentosGPT</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <button class="btn sm:hidden" popovertarget="my-megamenu-2">Menu</button>
                <div class="megamenu max-sm:megamenu-vertical megamenu-wide p-2" id="my-megamenu-2" popover>
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
            </div>
        </div>
        <section class="border-y border-base-300 bg-base-100">
            <div class="mx-auto flex max-w-6xl flex-wrap items-center gap-2 px-10 py-2">
                <label class="input min-w-48 flex min-w-48 flex-1 items-center gap-2">
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

                <select class="select select-bordered select-sm w-28" aria-label="Filtrar por precio">
                    <option selected>Precio</option>
                    <option>Hasta $15,000</option>
                    <option>$15,000 - $20,000</option>
                    <option>Más de $20,000</option>
                </select>

                <select class="select select-bordered select-sm w-24" aria-label="Filtrar por recámaras">
                    <option selected>Recámaras</option>
                    <option>1 recámara</option>
                    <option>2 recámaras</option>
                    <option>3+ recámaras</option>
                </select>

                <select class="select select-bordered select-sm w-24" aria-label="Filtrar por baños">
                    <option selected>Baños</option>
                    <option>1 baño</option>
                    <option>2 baños</option>
                    <option>3+ baños</option>
                </select>

                <button class="btn btn-neutral btn-sm gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <circle cx="11" cy="11" r="7" />
                        <path d="m20 20-4-4" />
                    </svg>
                    Buscar
                </button>
            </div>
        </section>
    </header>


    <!-- Listado de departamentos -->
    <main class="bg-white">
        <div class="mx-auto px-10 pb-8 pt-6">
            <section class="department-grid grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4"
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
                    <a href="#" class="hover-3d my-2 mx-2 cursor-pointer">
                        <article class="card card-compact overflow-hidden border border-base-300 bg-base-100 shadow-none">
                            <figure class="aspect-[1.92/1] w-full">
                                <img src="<?= htmlspecialchars($departamento['imagen']) ?>" alt="Fotograf&iacute;a de referencia del departamento <?= $departamento['nombre'] ?>" class="h-full w-full object-cover" loading="lazy">
                            </figure>
                            <div class="card-body gap-1.5 p-2.5">
                                <div class="flex items-center justify-between gap-2">
                                    <h2 class="min-w-0 truncate text-[10px] font-semibold leading-tight"><?= $departamento['nombre'] ?></h2>
                                    <div class="flex shrink-0 items-center gap-2 text-[9px] text-base-content/70" aria-label="Caracter&iacute;sticas">
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
                                <p class="flex items-center gap-1 truncate text-[8px] text-base-content/60"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" /><circle cx="12" cy="10" r="2.5" /></svg><span class="truncate"><?= $departamento['direccion'] ?></span></p>
                                <div class="mt-auto flex items-baseline justify-end gap-1">
                                    <span class="text-sm font-bold leading-tight"><?= htmlspecialchars($departamento['precio']) ?></span>
                                    <span class="text-[8px] text-base-content/50">MXN / mes</span>
                                </div>
                            </div>
                        </article>
                    </a>
                <?php endforeach; ?>
            </section>

            <!-- Paginación -->
            <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                <p class="text-[10px] text-base-content/55">Mostrando 1–12 de 27 departamentos</p>
                <nav class="join join-horizontal" aria-label="Paginación de departamentos">
                    <button class="btn btn-xs join-item" disabled>‹ Anterior</button>
                    <button class="btn btn-xs join-item btn-neutral" aria-current="page">1</button>
                    <button class="btn btn-xs join-item">2</button>
                    <button class="btn btn-xs join-item">3</button>
                    <button class="btn btn-xs join-item">Siguiente ›</button>
                </nav>
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
        <nav>
            <div class="grid grid-flow-col gap-4">
                <a>
                    <svg aria-label="Twitter" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg aria-label="YouTube" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg aria-label="Facebook" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>
            </div>
        </nav>
        <aside>
            <p>Copyright © {new Date().getFullYear()} - All right reserved by ACME Industries Ltd</p>
        </aside>
    </footer>
</body>

</html>