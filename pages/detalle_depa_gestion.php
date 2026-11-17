<!DOCTYPE html>
<html lang="es" data-theme="shadcn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar departamento - DepartamentosGPT</title>
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

    $departamento = [
        'id' => (int) ($_GET['id'] ?? 1),
        'nombre_numero' => '302',
        'edificio' => 'Edificio Olmo',
        'direccion' => 'Colima 145, Roma Norte, Cuauhtémoc',
        'piso' => '3',
        'habitaciones' => 2,
        'banos' => 1.5,
        'descripcion' => 'Departamento luminoso con cocina integrada y vigilancia.',
        'precio_renta' => 18500,
        'deposito' => 18500,
        'contacto' => '55 1234 5678',
        'estado' => 'En renta',
        'fecha_registro' => '2025-09-10',
    ];
    $imagenes = [
        ['id' => 1, 'ruta' => 'assets/images/departamento-302-1.jpg', 'fecha_registro' => '2025-09-10'],
    ];
    $mantenimientos = [
        ['id' => 1, 'id_usuario_registro' => 2, 'titulo' => 'Fuga bajo el lavabo', 'descripcion' => 'Revisar conexión de agua del baño.', 'fecha_reporte' => '2026-11-10', 'fecha_inicio' => '2026-11-12', 'fecha_finalizacion' => '', 'estado' => 'en_proceso', 'responsable' => 'Técnico de mantenimiento', 'costo' => 850, 'observaciones' => 'Acceso coordinado con el inquilino.', 'fecha_registro' => '2026-11-10'],
        ['id' => 2, 'id_usuario_registro' => 1, 'titulo' => 'Revisión de instalación eléctrica', 'descripcion' => 'Inspeccionar contacto de cocina.', 'fecha_reporte' => '2026-11-14', 'fecha_inicio' => '', 'fecha_finalizacion' => '', 'estado' => 'pendiente', 'responsable' => '', 'costo' => 0, 'observaciones' => '', 'fecha_registro' => '2026-11-14'],
    ];
    ?>

    <main class="app-page">
        <div class="page-heading">
            <div>
                <a href="./gestion_departamentos.php" class="link link-hover text-sm">← Gestión de departamentos</a>
                <h1 class="page-title mt-2">Gestionar <?= htmlspecialchars($departamento['edificio']) ?> · <?= htmlspecialchars($departamento['nombre_numero']) ?></h1>
                <p class="page-description"><?= htmlspecialchars($departamento['direccion']) ?></p>
            </div>
            <span class="badge badge-soft badge-info"><?= htmlspecialchars($departamento['estado']) ?></span>
        </div>

        <section class="surface-card section-card">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Datos del departamento</h2>
                    <p class="section-description">Actualiza los campos que pertenecen al registro del inmueble.</p>
                </div>
            </div>
            <form class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <label class="fieldset">
                    <span class="label">Número o clave</span>
                    <input class="input w-full" name="nombre_numero" maxlength="50" value="<?= htmlspecialchars($departamento['nombre_numero']) ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Edificio</span>
                    <input class="input w-full" name="edificio" maxlength="100" value="<?= htmlspecialchars($departamento['edificio']) ?>" required>
                </label>
                <label class="fieldset sm:col-span-2 lg:col-span-1">
                    <span class="label">Dirección</span>
                    <input class="input w-full" name="direccion" maxlength="255" value="<?= htmlspecialchars($departamento['direccion']) ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Piso</span>
                    <input class="input w-full" name="piso" maxlength="20" value="<?= htmlspecialchars($departamento['piso']) ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Habitaciones</span>
                    <input class="input w-full" type="number" name="habitaciones" min="0" max="255" value="<?= (int) $departamento['habitaciones'] ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Baños</span>
                    <input class="input w-full" type="number" name="banos" min="0" max="99.9" step="0.5" value="<?= htmlspecialchars((string) $departamento['banos']) ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Precio de renta</span>
                    <input class="input w-full" type="number" name="precio_renta" min="0" step="0.01" value="<?= (int) $departamento['precio_renta'] ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Depósito</span>
                    <input class="input w-full" type="number" name="deposito" min="0" step="0.01" value="<?= (int) $departamento['deposito'] ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Contacto</span>
                    <input class="input w-full" name="contacto" maxlength="100" value="<?= htmlspecialchars($departamento['contacto']) ?>" required>
                </label>
                <label class="fieldset">
                    <span class="label">Estado</span>
                    <select class="select w-full" name="estado">
                        <option <?= $departamento['estado'] === 'Disponible' ? 'selected' : '' ?>>Disponible</option>
                        <option <?= $departamento['estado'] === 'En renta' ? 'selected' : '' ?>>En renta</option>
                        <option <?= $departamento['estado'] === 'En Mantenimiento' ? 'selected' : '' ?>>En Mantenimiento</option>
                    </select>
                </label>
                <div class="fieldset">
                    <span class="label">Fecha de registro</span>
                    <p class="input flex items-center"><?= date('d/m/Y', strtotime($departamento['fecha_registro'])) ?></p>
                </div>
                <label class="fieldset sm:col-span-2 lg:col-span-3">
                    <span class="label">Descripción</span>
                    <textarea class="textarea w-full" name="descripcion" rows="3"><?= htmlspecialchars($departamento['descripcion']) ?></textarea>
                </label>
                <div class="flex flex-wrap justify-between gap-3 sm:col-span-2 lg:col-span-3">
                    <button type="button" class="btn btn-ghost text-error">Eliminar departamento</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </section>

        <section class="surface-card section-card">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Imágenes del departamento</h2>
                    <p class="section-description">Cada imagen se guarda con una ruta y el departamento relacionado.</p>
                </div>
            </div>
            <form class="mb-4 flex flex-wrap items-end gap-3">
                <input type="hidden" name="id_departamento" value="<?= (int) $departamento['id'] ?>">
                <label class="fieldset min-w-64 flex-1">
                    <span class="label">Ruta de imagen</span>
                    <input class="input w-full" name="ruta" maxlength="500" required>
                </label>
                <button type="button" class="btn btn-primary">Agregar imagen</button>
            </form>
            <div class="data-table-wrap">
                <table class="table table-zebra">
                    <thead><tr><th>ID</th><th>Ruta</th><th>Fecha de registro</th><th></th></tr></thead>
                    <tbody>
                        <?php foreach ($imagenes as $imagen): ?>
                            <tr>
                                <td><?= (int) $imagen['id'] ?></td>
                                <td><?= htmlspecialchars($imagen['ruta']) ?></td>
                                <td><?= date('d/m/Y', strtotime($imagen['fecha_registro'])) ?></td>
                                <td class="text-right"><button type="button" class="btn btn-ghost btn-sm text-error">Eliminar</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="surface-card section-card">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Mantenimientos</h2>
                    <p class="section-description">Registra reportes y actualiza su estado de seguimiento.</p>
                </div>
            </div>

            <form class="mb-6 grid gap-4 rounded-box border border-base-300 bg-base-200/60 p-4 sm:grid-cols-2 lg:grid-cols-3">
                <input type="hidden" name="id_departamento" value="<?= (int) $departamento['id'] ?>">
                <label class="fieldset">
                    <span class="label">Usuario que registra</span>
                    <select class="select w-full" name="id_usuario_registro" required>
                        <option value="">Selecciona un usuario</option>
                        <option value="1">Usuario ID 1</option>
                    </select>
                </label>
                <label class="fieldset">
                    <span class="label">Título</span>
                    <input class="input w-full" name="titulo" maxlength="150" required>
                </label>
                <label class="fieldset">
                    <span class="label">Fecha del reporte</span>
                    <input class="input w-full" type="datetime-local" name="fecha_reporte" required>
                </label>
                <label class="fieldset">
                    <span class="label">Responsable</span>
                    <input class="input w-full" name="responsable" maxlength="150">
                </label>
                <label class="fieldset">
                    <span class="label">Fecha de inicio</span>
                    <input class="input w-full" type="datetime-local" name="fecha_inicio">
                </label>
                <label class="fieldset">
                    <span class="label">Fecha de finalización</span>
                    <input class="input w-full" type="datetime-local" name="fecha_finalizacion">
                </label>
                <label class="fieldset">
                    <span class="label">Costo</span>
                    <input class="input w-full" type="number" name="costo" min="0" step="0.01">
                </label>
                <label class="fieldset sm:col-span-2 lg:col-span-3">
                    <span class="label">Descripción</span>
                    <textarea class="textarea w-full" name="descripcion" rows="2" required></textarea>
                </label>
                <label class="fieldset sm:col-span-2 lg:col-span-3">
                    <span class="label">Observaciones</span>
                    <textarea class="textarea w-full" name="observaciones" rows="2"></textarea>
                </label>
                <div class="flex justify-end sm:col-span-2 lg:col-span-3">
                    <button type="button" class="btn btn-primary">Registrar mantenimiento</button>
                </div>
            </form>

            <div class="data-table-wrap">
                <table class="table table-zebra">
                    <thead>
                        <tr><th>Reporte</th><th>Fechas</th><th>Responsable y costo</th><th>Estado</th><th>Registro / usuario</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mantenimientos as $mantenimiento): ?>
                            <tr>
                                <td>
                                    <div class="font-semibold"><?= htmlspecialchars($mantenimiento['titulo']) ?></div>
                                    <div class="text-sm text-base-content/60"><?= htmlspecialchars($mantenimiento['descripcion']) ?></div>
                                </td>
                                <td class="text-sm">
                                    Reporte: <?= htmlspecialchars($mantenimiento['fecha_reporte']) ?><br>
                                    Inicio: <?= htmlspecialchars($mantenimiento['fecha_inicio'] ?: 'Sin programar') ?><br>
                                    Fin: <?= htmlspecialchars($mantenimiento['fecha_finalizacion'] ?: 'Pendiente') ?>
                                </td>
                                <td><?= htmlspecialchars($mantenimiento['responsable'] ?: 'Sin asignar') ?><br>$<?= number_format((float) $mantenimiento['costo'], 2) ?></td>
                                <td>
                                    <form class="flex items-center gap-2">
                                        <input type="hidden" name="id" value="<?= (int) $mantenimiento['id'] ?>">
                                        <select class="select select-sm" name="estado" aria-label="Estado del mantenimiento">
                                            <?php foreach (['pendiente', 'programado', 'en_proceso', 'finalizado', 'cancelado'] as $estado): ?>
                                                <option value="<?= $estado ?>" <?= $mantenimiento['estado'] === $estado ? 'selected' : '' ?>><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $estado))) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-sm"><?= date('d/m/Y', strtotime($mantenimiento['fecha_registro'])) ?><br>Usuario ID <?= (int) $mantenimiento['id_usuario_registro'] ?></td>
                                <td>
                                    <div class="flex gap-2">
                                        <button type="button" class="btn btn-outline btn-sm">Actualizar</button>
                                        <button type="button" class="btn btn-ghost btn-sm text-error">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="page-note">Vista de demostración. Las acciones aún no están conectadas a la base de datos.</p>
        </section>
    </main>
</body>

</html>
