<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de departamentos - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php
    include '../components/navbar.php';
    layout('r-2');

    $departamentos = [
        ['id' => 1, 'nombre_numero' => '302', 'edificio' => 'Edificio Olmo', 'direccion' => 'Colima 145, Roma Norte, Cuauhtémoc', 'piso' => '3', 'habitaciones' => 2, 'banos' => 1.5, 'precio_renta' => 18500, 'estado' => 'En renta'],
        ['id' => 2, 'nombre_numero' => '204', 'edificio' => 'Edificio del Parque', 'direccion' => 'Av. México 87, Hipódromo, Cuauhtémoc', 'piso' => '2', 'habitaciones' => 2, 'banos' => 2, 'precio_renta' => 21000, 'estado' => 'Disponible'],
        ['id' => 3, 'nombre_numero' => '105', 'edificio' => 'Edificio Alameda', 'direccion' => 'Dr. Mora 18, Centro, Cuauhtémoc', 'piso' => '1', 'habitaciones' => 1, 'banos' => 1, 'precio_renta' => 12500, 'estado' => 'En Mantenimiento'],
    ];
    ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <h1 class="page-title">Gestión de departamentos</h1>
                <p class="page-description">Consulta, registra y actualiza los inmuebles.</p>
            </div>
            <a href="./nuevo_depa.php" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Registrar departamento
            </a>
        </section>

        <form class="surface-card filter-bar" method="get">
            <label class="input min-w-56 flex-1 items-center gap-2">
                <span class="sr-only">Buscar departamento</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <input type="search" name="q" class="grow" placeholder="Edificio, número o dirección">
            </label>
            <select name="estado" class="select w-48" aria-label="Filtrar por estado">
                <option value="">Todos los estados</option>
                <option>Disponible</option>
                <option>En renta</option>
                <option>En Mantenimiento</option>
            </select>
            <button type="submit" class="btn btn-neutral">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 5h16l-6.5 7.5V19l-3 1v-7.5L4 5Z" />
                </svg>
                Filtrar
            </button>
        </form>

        <div class="surface-card data-table-wrap">
            <table class="table table-zebra departments-table">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Dirección</th>
                        <th>Características</th>
                        <th>Renta mensual</th>
                        <th>Estado</th>
                        <th><span class="sr-only">Acciones</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($departamentos as $departamento): ?>
                        <tr>
                            <td>
                                <div class="font-semibold"><?= htmlspecialchars($departamento['edificio']) ?></div>
                                <div class="text-sm text-base-content/60">N.º <?= htmlspecialchars($departamento['nombre_numero']) ?></div>
                            </td>
                            <td><?= htmlspecialchars($departamento['direccion']) ?></td>
                            <td><?= (int) $departamento['habitaciones'] ?> rec. · <?= htmlspecialchars((string) $departamento['banos']) ?> baños · Piso <?= htmlspecialchars($departamento['piso']) ?></td>
                            <td class="font-medium">$<?= number_format($departamento['precio_renta']) ?> MXN</td>
                            <td>
                                <?php if ($departamento['estado'] === 'Disponible'): ?>
                                    <span class="badge badge-soft badge-success">Disponible</span>
                                <?php elseif ($departamento['estado'] === 'En renta'): ?>
                                    <span class="badge badge-soft badge-info">En renta</span>
                                <?php else: ?>
                                    <span class="badge badge-soft badge-warning">En mantenimiento</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <div class="tooltip tooltip-left" data-tip="Gestionar departamento">
                                    <a class="inline-flex size-10 items-center justify-center text-base-content transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" href="./detalle_depa_gestion.php?id=<?= (int) $departamento['id'] ?>" aria-label="Gestionar departamento">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
