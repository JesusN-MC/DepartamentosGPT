<!DOCTYPE html>
<html lang="es" data-theme="shadcn" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar departamento - DepartamentosGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v=20261115-3">
</head>

<body class="bg-base-200 font-[family-name:Inter,sans-serif]">
    <?php include '../components/navbar.php'; layout('r-2'); ?>

    <main class="flex min-h-[90vh] flex-col bg-base-200">
        <form class="flex flex-1 flex-col">
            <div class="carousel carousel-horizontal carousel-start w-full scroll-smooth">
                <section id="edita-paso-1" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8">
                        <div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                            <div class="space-y-4"><a href="./detalle_depa_gestion.php?id=1" class="link link-hover text-sm">← Detalle del departamento</a><span class="badge badge-ghost">Paso 1 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el número del departamento?</h1></div>
                            <fieldset class="fieldset w-full gap-2"><label class="label" for="nombre_numero">Número o clave</label><input id="nombre_numero" class="input input-lg w-full" name="nombre_numero" maxlength="50" value="302" required></fieldset>
                            <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-2" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="./detalle_depa_gestion.php?id=1" class="btn btn-secondary btn-lg w-full">Cancelar</a></div>
                        </div>
                    </div>
                </section>
                <section id="edita-paso-2" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 2 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cómo se llama el edificio?</h1><p class="text-base leading-7 text-base-content/60">Escribe el nombre o número del edificio.</p></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="edificio">Edificio</label><input id="edificio" class="input input-lg w-full" name="edificio" maxlength="100" value="Edificio Olmo" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-3" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-1" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-3" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 3 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es la dirección?</h1><p class="text-base leading-7 text-base-content/60">Incluye calle, número, colonia y ciudad.</p></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="direccion">Dirección</label><input id="direccion" class="input input-lg w-full" name="direccion" maxlength="255" value="Colima 145, Roma Norte, Cuauhtémoc" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-4" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-2" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-4" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 4 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿En qué piso está?</h1><p class="text-base leading-7 text-base-content/60">Puedes escribir un número o texto, por ejemplo 3 o PB.</p></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="piso">Piso</label><input id="piso" class="input input-lg w-full" name="piso" maxlength="20" value="3" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-5" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-3" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-5" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 5 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuántas habitaciones tiene?</h1></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="habitaciones">Habitaciones</label><input id="habitaciones" class="input input-lg w-full" type="number" name="habitaciones" min="0" max="255" value="2" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-6" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-4" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-6" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 6 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuántos baños tiene?</h1><p class="text-base leading-7 text-base-content/60">Usa .5 para medios baños, por ejemplo 1.5.</p></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="banos">Baños</label><input id="banos" class="input input-lg w-full" type="number" name="banos" min="0" max="99.9" step="0.5" value="1.5" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-7" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-5" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-7" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 7 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es la renta mensual?</h1></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="precio_renta">Precio de renta</label><input id="precio_renta" class="input input-lg w-full" type="number" name="precio_renta" min="0" step="0.01" value="18500" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-8" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-6" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-8" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 8 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el depósito?</h1></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="deposito">Depósito</label><input id="deposito" class="input input-lg w-full" type="number" name="deposito" min="0" step="0.01" value="18500" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-9" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-7" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-9" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 9 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el contacto?</h1></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="contacto">Contacto</label><input id="contacto" class="input input-lg w-full" name="contacto" maxlength="100" value="55 1234 5678" required></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-10" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-8" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-10" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 10 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Cuál es el estado?</h1></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="estado">Estado</label><select id="estado" class="select select-lg w-full" name="estado"><option>Disponible</option><option selected>En renta</option><option>En Mantenimiento</option></select></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><a href="#edita-paso-11" class="btn btn-primary btn-lg w-full">Continuar</a></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-9" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
                <section id="edita-paso-11" class="carousel-item w-full shrink-0">
                    <div class="mx-auto flex min-h-[80vh] w-full max-w-5xl flex-col px-6 pb-8"><div class="mx-auto flex w-full max-w-[460px] flex-1 flex-col justify-center gap-8 py-12">
                        <div class="space-y-4"><span class="badge badge-ghost">Paso 11 de 11</span><h1 class="text-4xl tracking-tight sm:text-6xl">¿Quieres agregar una descripción?</h1><p class="text-base leading-7 text-base-content/60">Este campo es opcional.</p></div>
                        <fieldset class="fieldset w-full gap-2"><label class="label" for="descripcion">Descripción</label><textarea id="descripcion" class="textarea textarea-lg w-full" name="descripcion" rows="4">Departamento luminoso con cocina integrada y vigilancia.</textarea></fieldset>
                        <div class="flex w-full flex-col gap-3"><div class="aura aura-silver"><button type="button" class="btn btn-primary btn-lg w-full"><svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l4 4L19 6" /></svg>Guardar cambios</button></div><div class="divider my-1 text-sm text-base-content/50">O</div><a href="#edita-paso-10" class="btn btn-secondary btn-lg w-full">Regresar</a></div>
                    </div></div>
                </section>
            </div>
        </form>
    </main>
</body>

</html>
