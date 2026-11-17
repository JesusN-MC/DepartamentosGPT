<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis contratos - DepartamentosGPT</title>
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
    layout('r-1');
    $contratos = [
        ['id' => 1, 'folio' => 'DEP-2026-001', 'departamento' => 'Edificio Olmo · 302', 'fecha_inicio' => '2026-01-01', 'fecha_salida' => '2026-12-31', 'renta_mensual' => 18500, 'estado' => 'vigente'],
        ['id' => 2, 'folio' => 'DEP-2026-018', 'departamento' => 'Edificio Alameda · 105', 'fecha_inicio' => '2026-11-01', 'fecha_salida' => '2027-04-30', 'renta_mensual' => 12500, 'estado' => 'pendiente_firma'],
    ];
    ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <h1 class="page-title">Mis contratos</h1>
                <p class="page-description">Consulta el estado de tus contratos y sus rentas.</p>
            </div>
        </section>

        <div class="surface-card data-table-wrap">
            <table class="table table-zebra">
                <thead>
                    <tr><th>Folio</th><th>Departamento</th><th>Vigencia</th><th>Renta mensual</th><th>Estado</th><th></th></tr>
                </thead>
                <tbody>
                    <?php foreach ($contratos as $contrato): ?>
                        <tr>
                            <td class="font-semibold"><?= htmlspecialchars($contrato['folio']) ?></td>
                            <td><?= htmlspecialchars($contrato['departamento']) ?></td>
                            <td><?= date('d/m/Y', strtotime($contrato['fecha_inicio'])) ?> – <?= date('d/m/Y', strtotime($contrato['fecha_salida'])) ?></td>
                            <td>$<?= number_format($contrato['renta_mensual']) ?> MXN</td>
                            <td>
                                <?php if ($contrato['estado'] === 'vigente'): ?>
                                    <span class="badge badge-soft badge-success">Vigente</span>
                                <?php else: ?>
                                    <span class="badge badge-soft badge-warning">Pendiente de firma</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right"><a class="btn btn-ghost btn-sm" href="./detalle_contrato.php?id=<?= (int) $contrato['id'] ?>">Ver contrato</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="page-note">Datos de demostración hasta conectar la vista con la base de datos.</p>
    </main>
</body>

</html>
