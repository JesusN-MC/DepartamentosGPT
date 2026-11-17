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
            <a href="./nuevo_contrato.php" class="btn btn-primary">Crear contrato</a>
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
            <button type="submit" class="btn btn-neutral">Filtrar</button>
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
                            <td class="text-right"><a class="btn btn-ghost btn-sm" href="./detalle_contrato.php?id=<?= (int) $contrato['id'] ?>&amp;vista=gestion">Gestionar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="page-note">Datos de demostración hasta conectar la gestión con la base de datos.</p>
    </main>
</body>

</html>
