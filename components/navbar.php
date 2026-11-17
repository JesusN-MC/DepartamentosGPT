<?php
function layout(string $pantalla): void
{
    $paginaActual = basename($_SERVER['PHP_SELF'] ?? '');
    $esPagina = static fn(array $paginas): bool => in_array($paginaActual, $paginas, true);

    if ($pantalla === 'auth-r') {
        echo '    
        <div class="app-navbar navbar bg-base-100 shadow-sm min-h-[72px]">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <div class="navbar-center hidden lg:flex">
            </div>
            <div class="navbar-end">
                <a class="btn btn-primary" href="../pages/login.php">Acceder</a>
            </div>
        </div>
        ';
    }
    if ($pantalla === 'auth-l') {
        echo '
        <div class="app-navbar navbar bg-base-100 shadow-sm min-h-[72px]">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <div class="navbar-center hidden lg:flex">
            </div>
            <div class="navbar-end">
                <a class="btn btn-primary" href="../pages/registro.php">Registrarse</a>
            </div>
        </div>
        ';
    }
    if ($pantalla === 'r-1') {
        echo '
        <div class="app-navbar navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <nav class="app-nav" aria-label="Navegación principal">
                <a href="../pages/departamentos.php" class="app-nav-link ' . ($esPagina(["departamentos.php", "detalle_depa.php"]) ? "is-active" : "") . '">Departamentos</a>
                <a href="../pages/contratos.php" class="app-nav-link ' . ($esPagina(["contratos.php", "detalle_contrato.php"]) ? "is-active" : "") . '">Contratos</a>
            </nav>
            <div class="navbar-end">
                <button type="button" class="tooltip tooltip-left btn btn-ghost btn-square"
                    data-tip="Cerrar sesión" aria-label="Cerrar sesión" title="Cerrar sesión"
                    onclick="logout_modal.showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M10 17l5-5-5-5" />
                        <path d="M15 12H3" />
                        <path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6" />
                    </svg>
                </button>
                <dialog id="logout_modal" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Cerrar sesión</h3>
                        <p class="py-4">¿Realmente quieres cerrar la sesión?</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Cancelar</button>
                            </form>
                            <form action="../controllers/cerrar_sesion.php" method="post">
                                <button type="submit" class="btn btn-primary">Sí, cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button aria-label="Cerrar"></button>
                    </form>
                </dialog>
            </div>
        </div>
        ';
    }
    if ($pantalla === 'r-2') {
        echo '
        <div class="app-navbar navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <a class="btn btn-ghost text-xl" href="../index.php">DepartamentosGPT</a>
            </div>
            <nav class="app-nav" aria-label="Navegación principal">
                <a href="../pages/dashboard.php" class="app-nav-link ' . ($esPagina(["dashboard.php"]) ? "is-active" : "") . '">Dashboard</a>
                <a href="../pages/gestion_departamentos.php" class="app-nav-link ' . ($esPagina(["gestion_departamentos.php", "nuevo_depa.php", "detalle_depa_gestion.php"]) ? "is-active" : "") . '">Departamentos</a>
                <a href="../pages/gestion_contratos.php" class="app-nav-link ' . ($esPagina(["gestion_contratos.php", "nuevo_contrato.php", "detalle_contrato.php"]) ? "is-active" : "") . '">Contratos</a>
                <a href="../pages/gestion_usuarios.php" class="app-nav-link ' . ($esPagina(["gestion_usuarios.php"]) ? "is-active" : "") . '">Usuarios</a>
            </nav>
            <div class="navbar-end">
                <button type="button" class="tooltip tooltip-left btn btn-ghost btn-square"
                    data-tip="Cerrar sesión" aria-label="Cerrar sesión" title="Cerrar sesión"
                    onclick="logout_modal.showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M10 17l5-5-5-5" />
                        <path d="M15 12H3" />
                        <path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6" />
                    </svg>
                </button>
                <dialog id="logout_modal" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Cerrar sesión</h3>
                        <p class="py-4">¿Realmente quieres cerrar la sesión?</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Cancelar</button>
                            </form>
                            <form action="../controllers/cerrar_sesion.php" method="post">
                                <button type="submit" class="btn btn-primary">Sí, cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button aria-label="Cerrar"></button>
                    </form>
                </dialog>
            </div>
        </div>
        ';
    }
}