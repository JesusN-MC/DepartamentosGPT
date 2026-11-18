<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de contratos - DepartamentosGPT</title>
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
    $contratos = [
        ['id' => 1, 'folio' => 'DEP-2026-001', 'departamento' => 'Edificio Olmo · 302', 'inquilino' => 'Ana Torres', 'fecha_inicio' => '2026-01-01', 'fecha_salida' => '2026-12-31', 'renta_mensual' => 18500, 'estado' => 'vigente'],
        ['id' => 2, 'folio' => 'DEP-2026-018', 'departamento' => 'Edificio Alameda · 105', 'inquilino' => 'Luis Fernández', 'fecha_inicio' => '2026-11-01', 'fecha_salida' => '2027-04-30', 'renta_mensual' => 12500, 'estado' => 'pendiente_firma'],
    ];
    ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <h1 class="page-title">Gestión de contratos</h1>
                <p class="page-description">Consulta los contratos y administra sus rentas.</p>
            </div>
            <a href="./nuevo_contrato.php" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Crear contrato
            </a>
        </section>

        <form class="surface-card filter-bar" method="get">
            <label class="input min-w-56 flex-1 items-center gap-2">
                <span class="sr-only">Buscar contrato</span>
                <input type="search" name="q" class="grow" placeholder="Folio, departamento o inquilino">
            </label>
            <select class="select w-48" name="estado" aria-label="Filtrar por estado">
                <option value="">Todos los estados</option>
                <?php foreach (['borrador', 'pendiente_firma', 'vigente', 'vencido', 'terminado', 'cancelado'] as $estado): ?>
                    <option value="<?= $estado ?>"><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $estado))) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-neutral">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 5h16l-6.5 7.5V19l-3 1v-7.5L4 5Z" />
                </svg>
                Filtrar
            </button>
        </form>

        <div class="surface-card data-table-wrap">
            <table class="table table-zebra">
                <thead>
                    <tr><th>Folio</th><th>Departamento</th><th>Inquilino</th><th>Vigencia</th><th>Renta mensual</th><th>Estado</th><th></th></tr>
                </thead>
                <tbody>
                    <?php foreach ($contratos as $contrato): ?>
                        <tr>
                            <td class="font-semibold"><?= htmlspecialchars($contrato['folio']) ?></td>
                            <td><?= htmlspecialchars($contrato['departamento']) ?></td>
                            <td><?= htmlspecialchars($contrato['inquilino']) ?></td>
                            <td><?= date('d/m/Y', strtotime($contrato['fecha_inicio'])) ?> – <?= date('d/m/Y', strtotime($contrato['fecha_salida'])) ?></td>
                            <td>$<?= number_format($contrato['renta_mensual']) ?> MXN</td>
                            <td><span class="badge badge-soft <?= $contrato['estado'] === 'vigente' ? 'badge-success' : 'badge-warning' ?>"><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $contrato['estado']))) ?></span></td>
                            <td class="text-right">
                                <div class="tooltip tooltip-left" data-tip="Gestionar contrato">
                                    <a class="inline-flex size-10 items-center justify-center text-base-content transition-transform hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" href="./detalle_contrato_gestion.php?id=<?= (int) $contrato['id'] ?>" aria-label="Gestionar contrato">
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
