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
        ['id' => 1, 'ruta' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80', 'fecha_registro' => '2025-09-10'],
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
                    <p class="section-description">Información registrada para este inmueble.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="./editar_depa.php?id=<?= (int) $departamento['id'] ?>" class="btn btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m16 4 4 4L8 20H4v-4L16 4Z" />
                            <path d="m14 6 4 4" />
                        </svg>
                        Editar datos
                    </a>
                    <div class="tooltip tooltip-left" data-tip="Eliminar departamento">
                        <button type="button" class="inline-flex size-10 items-center justify-center rounded-md text-error transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-error" aria-label="Eliminar departamento">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M3 6h18" />
                                <path d="M8 6V4h8v2" />
                                <path d="m19 6-1 14H6L5 6" />
                                <path d="M10 11v5" />
                                <path d="M14 11v5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <dl class="detail-grid">
                <div class="detail-item"><dt>Número o clave</dt><dd><?= htmlspecialchars($departamento['nombre_numero']) ?></dd></div>
                <div class="detail-item"><dt>Edificio</dt><dd><?= htmlspecialchars($departamento['edificio']) ?></dd></div>
                <div class="detail-item"><dt>Dirección</dt><dd><?= htmlspecialchars($departamento['direccion']) ?></dd></div>
                <div class="detail-item"><dt>Piso</dt><dd><?= htmlspecialchars($departamento['piso']) ?></dd></div>
                <div class="detail-item"><dt>Habitaciones</dt><dd><?= (int) $departamento['habitaciones'] ?></dd></div>
                <div class="detail-item"><dt>Baños</dt><dd><?= htmlspecialchars((string) $departamento['banos']) ?></dd></div>
                <div class="detail-item"><dt>Precio de renta</dt><dd>$<?= number_format((float) $departamento['precio_renta'], 2) ?></dd></div>
                <div class="detail-item"><dt>Depósito</dt><dd>$<?= number_format((float) $departamento['deposito'], 2) ?></dd></div>
                <div class="detail-item"><dt>Contacto</dt><dd><?= htmlspecialchars($departamento['contacto']) ?></dd></div>
                <div class="detail-item"><dt>Estado</dt><dd><?= htmlspecialchars($departamento['estado']) ?></dd></div>
                <div class="detail-item"><dt>Fecha de registro</dt><dd><?= date('d/m/Y', strtotime($departamento['fecha_registro'])) ?></dd></div>
                <div class="detail-item sm:col-span-2 lg:col-span-3"><dt>Descripción</dt><dd><?= htmlspecialchars($departamento['descripcion']) ?></dd></div>
            </dl>
        </section>

        <section class="surface-card section-card">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Imágenes del departamento</h2>
                    <p class="section-description">Imágenes registradas para este inmueble.</p>
                </div>
                <a href="./agregar_imagen_depa.php?id_departamento=<?= (int) $departamento['id'] ?>" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <circle cx="9" cy="9" r="2" />
                        <path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L9 18" />
                        <path d="M12 12v6M9 15h6" />
                    </svg>
                    Agregar imagen
                </a>
            </div>
            <div class="data-table-wrap">
                <table class="table table-zebra">
                    <thead><tr><th>ID</th><th>Vista previa</th><th>Fecha de registro</th><th></th></tr></thead>
                    <tbody>
                        <?php foreach ($imagenes as $imagen): ?>
                            <tr>
                                <td><?= (int) $imagen['id'] ?></td>
                                <td>
                                    <img src="<?= htmlspecialchars($imagen['ruta']) ?>" alt="Imagen del departamento <?= htmlspecialchars($departamento['nombre_numero']) ?>" class="h-16 w-24 rounded-md border border-base-300 object-cover" loading="lazy">
                                </td>
                                <td><?= date('d/m/Y', strtotime($imagen['fecha_registro'])) ?></td>
                                <td class="text-right">
                                    <div class="tooltip tooltip-left" data-tip="Eliminar imagen">
                                        <button type="button" class="inline-flex size-10 items-center justify-center rounded-md text-error transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-error" aria-label="Eliminar imagen">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M3 6h18" />
                                                <path d="M8 6V4h8v2" />
                                                <path d="m19 6-1 14H6L5 6" />
                                                <path d="M10 11v5" />
                                                <path d="M14 11v5" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
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
                    <p class="section-description">Consulta los reportes y accede a sus formularios en pantallas independientes.</p>
                </div>
                <a href="./nuevo_mantenimiento.php?id_departamento=<?= (int) $departamento['id'] ?>" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Registrar mantenimiento
                </a>
            </div>

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
                                <td><span class="badge badge-soft badge-info"><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $mantenimiento['estado']))) ?></span></td>
                                <td class="text-sm"><?= date('d/m/Y', strtotime($mantenimiento['fecha_registro'])) ?><br>Usuario ID <?= (int) $mantenimiento['id_usuario_registro'] ?></td>
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <div class="tooltip tooltip-left" data-tip="Actualizar mantenimiento">
                                            <a href="./actualizar_mantenimiento.php?id=<?= (int) $mantenimiento['id'] ?>&amp;id_departamento=<?= (int) $departamento['id'] ?>" class="inline-flex size-10 items-center justify-center rounded-md text-base-content transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-base-content" aria-label="Actualizar mantenimiento">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="m16 4 4 4L8 20H4v-4L16 4Z" />
                                                    <path d="m14 6 4 4" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="tooltip tooltip-left" data-tip="Eliminar mantenimiento">
                                            <button type="button" class="inline-flex size-10 items-center justify-center rounded-md text-error transition-transform hover:scale-110 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-error" aria-label="Eliminar mantenimiento">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M3 6h18" />
                                                    <path d="M8 6V4h8v2" />
                                                    <path d="m19 6-1 14H6L5 6" />
                                                    <path d="M10 11v5" />
                                                    <path d="M14 11v5" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

</html>
