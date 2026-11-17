<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear contrato - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php include '../components/navbar.php'; layout('r-2'); ?>

    <main class="app-page">
        <section class="page-heading">
            <div>
                <a href="./gestion_contratos.php" class="link link-hover text-sm">← Gestión de contratos</a>
                <h1 class="page-title mt-2">Crear contrato</h1>
                <p class="page-description">Captura los campos definidos para el contrato.</p>
            </div>
        </section>

        <form class="surface-card grid gap-6 p-5 sm:p-6">
            <section class="form-section">
                <div class="form-section-heading">
                    <h2 class="section-title">Partes del contrato</h2>
                    <p class="section-description">Asocia el inmueble y el inquilino al folio.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <label class="fieldset">
                        <span class="label">Folio</span>
                        <input class="input w-full" name="folio" maxlength="30" required>
                    </label>
                    <label class="fieldset">
                        <span class="label">Departamento</span>
                        <select class="select w-full" name="id_departamento" required>
                            <option value="">Selecciona un departamento</option>
                            <option value="1">Edificio Olmo · 302</option>
                            <option value="2">Edificio del Parque · 204</option>
                            <option value="3">Edificio Alameda · 105</option>
                        </select>
                    </label>
                    <label class="fieldset">
                        <span class="label">Inquilino</span>
                        <select class="select w-full" name="id_inquilino" required>
                            <option value="">Selecciona un usuario</option>
                            <option value="2">Usuario ID 2</option>
                            <option value="3">Usuario ID 3</option>
                        </select>
                    </label>
                </div>
            </section>

            <section class="form-section">
                <div class="form-section-heading">
                    <h2 class="section-title">Vigencia y pagos</h2>
                    <p class="section-description">Define las fechas y cantidades acordadas.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <label class="fieldset">
                        <span class="label">Fecha de inicio</span>
                        <input class="input w-full" type="date" name="fecha_inicio" required>
                    </label>
                    <label class="fieldset">
                        <span class="label">Duración (meses)</span>
                        <input class="input w-full" type="number" name="cantidad_meses" min="1" required>
                    </label>
                    <label class="fieldset">
                        <span class="label">Fecha de salida (opcional)</span>
                        <input class="input w-full" type="date" name="fecha_salida">
                    </label>
                    <label class="fieldset">
                        <span class="label">Renta mensual</span>
                        <input class="input w-full" type="number" name="renta_mensual" min="0" step="0.01" required>
                    </label>
                    <label class="fieldset">
                        <span class="label">Día de pago</span>
                        <input class="input w-full" type="number" name="dia_pago" min="1" max="31" required>
                    </label>
                    <label class="fieldset">
                        <span class="label">Depósito</span>
                        <input class="input w-full" type="number" name="deposito" min="0" step="0.01" required>
                    </label>
                    <label class="fieldset">
                        <span class="label">Fecha de firma</span>
                        <input class="input w-full" type="date" name="fecha_firma">
                    </label>
                    <label class="fieldset">
                        <span class="label">Estado</span>
                        <select class="select w-full" name="estado" required>
                            <?php foreach (['borrador', 'pendiente_firma', 'vigente', 'vencido', 'terminado', 'cancelado'] as $estado): ?>
                                <option value="<?= $estado ?>"><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $estado))) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </section>

            <section class="form-section">
                <div class="form-section-heading">
                    <h2 class="section-title">Documento y notas</h2>
                    <p class="section-description">Estos campos son opcionales.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="fieldset">
                        <span class="label">Ruta del archivo</span>
                        <input class="input w-full" name="ruta_archivo" maxlength="500">
                    </label>
                    <label class="fieldset sm:col-span-2">
                        <span class="label">Observaciones</span>
                        <textarea class="textarea w-full" name="observaciones" rows="3"></textarea>
                    </label>
                </div>
            </section>

            <div class="flex flex-wrap justify-end gap-3">
                <a href="./gestion_contratos.php" class="btn btn-ghost">Cancelar</a>
                <button type="button" class="btn btn-primary">Guardar contrato</button>
            </div>
        </form>
        <p class="page-note">Formulario de interfaz. Aún no guarda información en la base de datos.</p>
    </main>
</body>

</html>
