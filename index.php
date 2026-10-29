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
            <a class="btn btn-primary" href="login.php">Acceder</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero bg-white h-[90vh] lg:px-[13vw]">
        <div class="hero-content flex-col lg:flex-row-reverse">

            <img alt="Tailwind CSS hero component"
                src="https://cdn.pixabay.com/photo/2024/08/31/11/18/kitchen-9011246_1280.jpg"
                class="max-w-[90vw] hidden md:block md:max-w-lg rounded-lg shadow-2xl" />

            <div class="flex flex-col justify-between self-stretch py-6">
                <div class="badge badge-secondary">Administración inmobiliaria</div>
                <h1 class="text-6xl">Encuentra tu nuevo espacio para llamar hogar.</h1>
                <p class="py-6 justify-start text-lg">
                    Te ayudamos a encontrar departamentos en renta y venta, con la mejor ubicación y precio. Nuestro
                    equipo de expertos te guiará en todo el proceso para que encuentres el lugar perfecto para ti.
                </p>
                <div class="flex flex-wrap gap-2 justify-start ml-[.5rem]">
                    <button class="btn btn-secondary">Conocer más</button>
                    <div class="aura aura-silver">
                        <button class="btn btn-primary">Ver departamentos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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