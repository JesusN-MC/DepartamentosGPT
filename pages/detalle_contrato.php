<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del contrato - DepartamentosGPT</title>
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
    $vistaGestion = ($_GET['vista'] ?? '') === 'gestion';
    layout($vistaGestion ? 'r-2' : 'r-1');

    $contrato = [
        'id' => (int) ($_GET['id'] ?? 1),
        'folio' => 'DEP-2026-001',
        'id_departamento' => 1,
        'departamento' => 'Edificio Olmo · 302',
        'id_inquilino' => 2,
        'inquilino' => 'Ana Torres',
        'fecha_inicio' => '2026-01-01',
        'cantidad_meses' => 12,
        'fecha_salida' => '2026-12-31',
        'renta_mensual' => 18500,
        'dia_pago' => 5,
        'deposito' => 18500,
        'fecha_firma' => '2025-12-20',
        'estado' => 'vigente',
        'observaciones' => 'Contrato de renta anual.',
        'ruta_archivo' => '',
        'fecha_registro' => '2025-12-20',
    ];
    $rentas = [
        ['id' => 31, 'numero_renta' => 11, 'periodo' => '2026-11-01', 'estado' => 'completado', 'fecha_registro' => '2025-12-20'],
        ['id' => 32, 'numero_renta' => 12, 'periodo' => '2026-12-01', 'estado' => 'pendiente', 'fecha_registro' => '2025-12-20'],
    ];
    $pagos = [
        ['id' => 51, 'id_renta' => 31, 'fecha_pago' => '2026-11-05', 'monto' => 18500, 'metodo_pago' => 'transferencia', 'referencia' => 'TRX-001', 'comprobante' => '', 'estado' => 'aprobado', 'id_usuario_revisor' => 1, 'observaciones' => 'Pago recibido.', 'fecha_registro' => '2026-11-05'],
    ];
    ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <a href="<?= $vistaGestion ? './gestion_contratos.php' : './contratos.php' ?>" class="link link-hover text-sm">← <?= $vistaGestion ? 'Gestión de contratos' : 'Mis contratos' ?></a>
                <h1 class="page-title mt-2">Contrato <?= htmlspecialchars($contrato['folio']) ?></h1>
                <p class="page-description"><?= htmlspecialchars($contrato['departamento']) ?> · <?= htmlspecialchars($contrato['inquilino']) ?></p>
            </div>
            <span class="badge badge-soft badge-success"><?= htmlspecialchars(ucfirst($contrato['estado'])) ?></span>
        </section>

        <section class="surface-card section-card">
            <div class="section-heading">
                <h2 class="section-title">Datos del contrato</h2>
            </div>
            <dl class="detail-grid">
                <div class="detail-item"><dt>Vigencia</dt><dd><?= date('d/m/Y', strtotime($contrato['fecha_inicio'])) ?> – <?= $contrato['fecha_salida'] !== '' ? date('d/m/Y', strtotime($contrato['fecha_salida'])) : 'Sin fecha de salida' ?></dd></div>
                <div class="detail-item"><dt>Duración</dt><dd><?= (int) $contrato['cantidad_meses'] ?> meses</dd></div>
                <div class="detail-item"><dt>Renta mensual</dt><dd>$<?= number_format($contrato['renta_mensual']) ?> MXN</dd></div>
                <div class="detail-item"><dt>Día de pago</dt><dd>Día <?= (int) $contrato['dia_pago'] ?></dd></div>
                <div class="detail-item"><dt>Depósito</dt><dd>$<?= number_format($contrato['deposito']) ?> MXN</dd></div>
                <div class="detail-item"><dt>Firma</dt><dd><?= $contrato['fecha_firma'] ? date('d/m/Y', strtotime($contrato['fecha_firma'])) : 'Sin firma' ?></dd></div>
                <div class="detail-item"><dt>Registro</dt><dd><?= date('d/m/Y', strtotime($contrato['fecha_registro'])) ?></dd></div>
                <div class="detail-item sm:col-span-2"><dt>Observaciones</dt><dd><?= htmlspecialchars($contrato['observaciones']) ?></dd></div>
            </dl>
            <?php if ($contrato['ruta_archivo'] !== ''): ?>
                <a class="link mt-3 inline-block" href="<?= htmlspecialchars($contrato['ruta_archivo']) ?>">Ver archivo del contrato</a>
            <?php endif; ?>
            <?php if ($vistaGestion): ?>
            <details class="mt-5 border-t border-base-300 pt-4">
                <summary class="cursor-pointer font-medium">Actualizar contrato</summary>
                <form class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <input type="hidden" name="id" value="<?= (int) $contrato['id'] ?>">
                    <label class="fieldset"><span class="label">Folio</span><input class="input w-full" name="folio" maxlength="30" value="<?= htmlspecialchars($contrato['folio']) ?>" required></label>
                    <label class="fieldset"><span class="label">ID de departamento</span><input class="input w-full" type="number" name="id_departamento" value="<?= (int) $contrato['id_departamento'] ?>" required></label>
                    <label class="fieldset"><span class="label">ID de inquilino</span><input class="input w-full" type="number" name="id_inquilino" value="<?= (int) $contrato['id_inquilino'] ?>" required></label>
                    <label class="fieldset"><span class="label">Fecha de inicio</span><input class="input w-full" type="date" name="fecha_inicio" value="<?= htmlspecialchars($contrato['fecha_inicio']) ?>" required></label>
                    <label class="fieldset"><span class="label">Duración (meses)</span><input class="input w-full" type="number" min="1" name="cantidad_meses" value="<?= (int) $contrato['cantidad_meses'] ?>" required></label>
                    <label class="fieldset"><span class="label">Fecha de salida (opcional)</span><input class="input w-full" type="date" name="fecha_salida" value="<?= htmlspecialchars($contrato['fecha_salida']) ?>"></label>
                    <label class="fieldset"><span class="label">Renta mensual</span><input class="input w-full" type="number" min="0" step="0.01" name="renta_mensual" value="<?= (int) $contrato['renta_mensual'] ?>" required></label>
                    <label class="fieldset"><span class="label">Día de pago</span><input class="input w-full" type="number" min="1" max="31" name="dia_pago" value="<?= (int) $contrato['dia_pago'] ?>" required></label>
                    <label class="fieldset"><span class="label">Depósito</span><input class="input w-full" type="number" min="0" step="0.01" name="deposito" value="<?= (int) $contrato['deposito'] ?>" required></label>
                    <label class="fieldset"><span class="label">Fecha de firma</span><input class="input w-full" type="date" name="fecha_firma" value="<?= htmlspecialchars($contrato['fecha_firma']) ?>"></label>
                    <label class="fieldset"><span class="label">Estado</span><select class="select w-full" name="estado"><?php foreach (['borrador', 'pendiente_firma', 'vigente', 'vencido', 'terminado', 'cancelado'] as $estado): ?><option value="<?= $estado ?>" <?= $contrato['estado'] === $estado ? 'selected' : '' ?>><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $estado))) ?></option><?php endforeach; ?></select></label>
                    <label class="fieldset"><span class="label">Ruta del archivo</span><input class="input w-full" name="ruta_archivo" maxlength="500" value="<?= htmlspecialchars($contrato['ruta_archivo']) ?>"></label>
                    <label class="fieldset sm:col-span-2 lg:col-span-3"><span class="label">Observaciones</span><textarea class="textarea w-full" name="observaciones" rows="2"><?= htmlspecialchars($contrato['observaciones']) ?></textarea></label>
                    <div class="flex justify-between gap-3 sm:col-span-2 lg:col-span-3"><button type="button" class="btn btn-ghost text-error">Eliminar contrato</button><button type="button" class="btn btn-primary">Guardar cambios</button></div>
                </form>
            </details>
            <?php endif; ?>
        </section>

        <section class="surface-card section-card">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Rentas y pagos</h2>
                    <p class="section-description">Las rentas corresponden a periodos del contrato; cada pago se asocia a una renta.</p>
                </div>
            </div>
            <div class="data-table-wrap">
                <table class="table table-zebra">
                    <thead><tr><th>Renta</th><th>Periodo</th><th>Estado de renta</th><th>Registro</th><th>Pagos registrados</th></tr></thead>
                    <tbody>
                        <?php foreach ($rentas as $renta): ?>
                            <tr>
                                <td>#<?= (int) $renta['numero_renta'] ?><div class="text-xs text-base-content/60">ID <?= (int) $renta['id'] ?></div></td>
                                <td><?= date('F Y', strtotime($renta['periodo'])) ?></td>
                                <td><span class="badge badge-soft <?= $renta['estado'] === 'completado' ? 'badge-success' : 'badge-warning' ?>"><?= htmlspecialchars(ucfirst($renta['estado'])) ?></span></td>
                                <td><?= date('d/m/Y', strtotime($renta['fecha_registro'])) ?></td>
                                <td>
                                    <?php $pagosRenta = array_filter($pagos, static fn($pago) => $pago['id_renta'] === $renta['id']); ?>
                                    <?php if (!$pagosRenta): ?>
                                        <span class="text-sm text-base-content/60">Sin pagos</span>
                                    <?php endif; ?>
                                    <?php foreach ($pagosRenta as $pago): ?>
                                        <div class="mb-3 rounded-box border border-base-300 bg-base-100 p-3">
                                            <div class="flex flex-wrap items-center justify-between gap-2">
                                                <div class="font-medium">$<?= number_format($pago['monto'], 2) ?> MXN · <?= htmlspecialchars(ucfirst($pago['metodo_pago'])) ?></div>
                                                <span class="badge badge-soft <?= $pago['estado'] === 'aprobado' ? 'badge-success' : ($pago['estado'] === 'rechazado' ? 'badge-error' : 'badge-warning') ?>"><?= htmlspecialchars(ucfirst($pago['estado'])) ?></span>
                                            </div>
                                            <p class="mt-1 text-sm text-base-content/60">ID <?= (int) $pago['id'] ?> · Pago: <?= htmlspecialchars($pago['fecha_pago']) ?> · Referencia: <?= htmlspecialchars($pago['referencia']) ?> · Revisor ID: <?= (int) $pago['id_usuario_revisor'] ?></p>
                                            <?php if ($pago['comprobante'] !== ''): ?><a class="link text-sm" href="<?= htmlspecialchars($pago['comprobante']) ?>">Ver comprobante</a><?php endif; ?>
                                            <p class="text-sm"><?= htmlspecialchars($pago['observaciones']) ?></p>
                                            <p class="text-xs text-base-content/60">Registrado: <?= htmlspecialchars($pago['fecha_registro']) ?></p>
                                            <?php if ($vistaGestion): ?>
                                                <div class="mt-2 flex flex-wrap gap-2">
                                                    <button type="button" class="btn btn-outline btn-sm">Aprobar pago</button>
                                                    <button type="button" class="btn btn-ghost btn-sm text-error">Eliminar pago</button>
                                                </div>
                                                <details class="mt-2">
                                                    <summary class="cursor-pointer text-sm font-medium">Actualizar pago</summary>
                                                    <form class="mt-3 grid gap-3 sm:grid-cols-2">
                                                        <input type="hidden" name="id" value="<?= (int) $pago['id'] ?>">
                                                        <label class="fieldset"><span class="label">Renta (ID)</span><select class="select w-full" name="id_renta"><?php foreach ($rentas as $opcionRenta): ?><option value="<?= (int) $opcionRenta['id'] ?>" <?= $pago['id_renta'] === $opcionRenta['id'] ? 'selected' : '' ?>>#<?= (int) $opcionRenta['numero_renta'] ?> · <?= date('F Y', strtotime($opcionRenta['periodo'])) ?></option><?php endforeach; ?></select></label>
                                                        <label class="fieldset"><span class="label">Fecha de pago</span><input class="input w-full" type="date" name="fecha_pago" value="<?= htmlspecialchars($pago['fecha_pago']) ?>"></label>
                                                        <label class="fieldset"><span class="label">Monto</span><input class="input w-full" type="number" name="monto" min="0" step="0.01" value="<?= (float) $pago['monto'] ?>"></label>
                                                        <label class="fieldset"><span class="label">Método de pago</span><select class="select w-full" name="metodo_pago"><option value="efectivo" <?= $pago['metodo_pago'] === 'efectivo' ? 'selected' : '' ?>>Efectivo</option><option value="transferencia" <?= $pago['metodo_pago'] === 'transferencia' ? 'selected' : '' ?>>Transferencia</option></select></label>
                                                        <label class="fieldset"><span class="label">Referencia</span><input class="input w-full" name="referencia" maxlength="100" value="<?= htmlspecialchars($pago['referencia']) ?>"></label>
                                                        <label class="fieldset"><span class="label">Comprobante</span><input class="input w-full" name="comprobante" maxlength="500" value="<?= htmlspecialchars($pago['comprobante']) ?>"></label>
                                                        <label class="fieldset"><span class="label">Estado</span><select class="select w-full" name="estado"><?php foreach (['pendiente', 'rechazado', 'aprobado'] as $estadoPago): ?><option value="<?= $estadoPago ?>" <?= $pago['estado'] === $estadoPago ? 'selected' : '' ?>><?= htmlspecialchars(ucfirst($estadoPago)) ?></option><?php endforeach; ?></select></label>
                                                        <label class="fieldset"><span class="label">ID de usuario revisor</span><input class="input w-full" type="number" name="id_usuario_revisor" min="1" value="<?= (int) $pago['id_usuario_revisor'] ?>"></label>
                                                        <label class="fieldset sm:col-span-2"><span class="label">Observaciones</span><textarea class="textarea w-full" name="observaciones" rows="2"><?= htmlspecialchars($pago['observaciones']) ?></textarea></label>
                                                        <button type="button" class="btn btn-primary sm:col-span-2">Guardar cambios del pago</button>
                                                    </form>
                                                </details>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="grid items-start gap-5 lg:grid-cols-2">
            <form class="surface-card section-card grid gap-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <h2 class="section-title">Registrar pago de renta</h2>
                    <p class="section-description mt-1">Captura el pago y su comprobante.</p>
                </div>
                <label class="fieldset"><span class="label">Renta</span><select class="select w-full" name="id_renta"><?php foreach ($rentas as $renta): ?><option value="<?= (int) $renta['id'] ?>">Renta #<?= (int) $renta['numero_renta'] ?> · <?= date('F Y', strtotime($renta['periodo'])) ?></option><?php endforeach; ?></select></label>
                <label class="fieldset"><span class="label">Fecha de pago</span><input class="input w-full" type="date" name="fecha_pago" required></label>
                <label class="fieldset"><span class="label">Monto</span><input class="input w-full" type="number" name="monto" min="0" step="0.01" required></label>
                <label class="fieldset"><span class="label">Método de pago</span><select class="select w-full" name="metodo_pago" required><option value="efectivo">Efectivo</option><option value="transferencia">Transferencia</option></select></label>
                <label class="fieldset"><span class="label">Referencia</span><input class="input w-full" name="referencia" maxlength="100"></label>
                <label class="fieldset"><span class="label">Ruta del comprobante</span><input class="input w-full" name="comprobante" maxlength="500"></label>
                <?php if ($vistaGestion): ?>
                    <label class="fieldset"><span class="label">Estado del pago</span><select class="select w-full" name="estado"><option value="pendiente">Pendiente</option><option value="rechazado">Rechazado</option><option value="aprobado">Aprobado</option></select></label>
                    <label class="fieldset"><span class="label">ID de usuario revisor</span><input class="input w-full" type="number" name="id_usuario_revisor" min="1"></label>
                <?php endif; ?>
                <label class="fieldset"><span class="label">Observaciones</span><textarea class="textarea w-full" name="observaciones" rows="2"></textarea></label>
                <button type="button" class="btn btn-primary sm:col-span-2">Registrar pago</button>
            </form>

            <form class="surface-card section-card grid gap-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <h2 class="section-title">Reportar mantenimiento</h2>
                    <p class="section-description mt-1">El reporte queda relacionado con el departamento del contrato.</p>
                </div>
                <input type="hidden" name="id_departamento" value="<?= (int) $contrato['id_departamento'] ?>">
                <label class="fieldset"><span class="label">ID de usuario que registra</span><input class="input w-full" type="number" name="id_usuario_registro" min="1" required></label>
                <label class="fieldset"><span class="label">Título</span><input class="input w-full" name="titulo" maxlength="150" required></label>
                <label class="fieldset"><span class="label">Fecha del reporte</span><input class="input w-full" type="datetime-local" name="fecha_reporte" required></label>
                <label class="fieldset"><span class="label">Descripción</span><textarea class="textarea w-full" name="descripcion" rows="3"></textarea></label>
                <label class="fieldset"><span class="label">Fecha de inicio</span><input class="input w-full" type="datetime-local" name="fecha_inicio"></label>
                <label class="fieldset"><span class="label">Fecha de finalización</span><input class="input w-full" type="datetime-local" name="fecha_finalizacion"></label>
                <label class="fieldset"><span class="label">Responsable</span><input class="input w-full" name="responsable" maxlength="150"></label>
                <label class="fieldset"><span class="label">Costo</span><input class="input w-full" type="number" name="costo" min="0" step="0.01"></label>
                <label class="fieldset"><span class="label">Observaciones</span><textarea class="textarea w-full" name="observaciones" rows="2"></textarea></label>
                <button type="button" class="btn btn-primary sm:col-span-2">Enviar reporte</button>
            </form>
        </section>
        <p class="page-note">Datos y acciones de demostración. La interfaz todavía no modifica registros en la base de datos.</p>
    </main>
</body>

</html>
