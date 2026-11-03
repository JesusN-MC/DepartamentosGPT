<!DOCTYPE html>
<html lang="en" data-theme="shadcn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DaisyUI - Shadcn Light</title>

    <!-- DaisyUI 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        [data-theme="shadcn"] {
            color-scheme: light;

            /* Base */
            --color-base-100: oklch(1 0 0);
            --color-base-200: oklch(0.985 0 0);
            --color-base-300: oklch(0.922 0 0);
            --color-base-content: oklch(0.145 0 0);

            /* Primary */
            --color-primary: oklch(0.205 0 0);
            --color-primary-content: oklch(0.985 0 0);

            /* Secondary */
            --color-secondary: oklch(0.97 0 0);
            --color-secondary-content: oklch(0.205 0 0);

            /* Accent */
            --color-accent: oklch(0.97 0 0);
            --color-accent-content: oklch(0.205 0 0);

            /* Neutral */
            --color-neutral: oklch(0.205 0 0);
            --color-neutral-content: oklch(0.985 0 0);

            /* Info */
            --color-info: oklch(0.546 0.215 262.881);
            --color-info-content: oklch(0.985 0 0);

            /* Success */
            --color-success: oklch(0.596 0.145 163.225);
            --color-success-content: oklch(0.985 0 0);

            /* Warning */
            --color-warning: oklch(0.769 0.188 70.08);
            --color-warning-content: oklch(0.205 0 0);

            /* Error / Destructive */
            --color-error: oklch(0.577 0.245 27.325);
            --color-error-content: oklch(0.985 0 0);

            /* Radios */
            --radius-selector: 0.375rem;
            --radius-field: 0.5rem;
            --radius-box: 0.625rem;

            /* Tamaños */
            --size-selector: 0.25rem;
            --size-field: 0.25rem;

            /* Bordes y efectos */
            --border: 1px;
            --depth: 0;
            --noise: 0;
        }
    </style>
</head>
<body>
    
<div class="card bg-base-100 w-96 shadow-sm">
  <figure>
            <div class="carousel carousel-center bg-neutral rounded-box max-w-md space-x-4 p-4">
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp"
      class="rounded-box" />
  </div>
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.webp"
      class="rounded-box" />
  </div>
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.webp"
      class="rounded-box" />
  </div>
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1494253109108-2e30c049369b.webp"
      class="rounded-box" />
  </div>
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1550258987-190a2d41a8ba.webp"
      class="rounded-box" />
  </div>
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1559181567-c3190ca9959b.webp"
      class="rounded-box" />
  </div>
  <div class="carousel-item">
    <img
      alt="Tailwind CSS component"
      src="https://img.daisyui.com/images/stock/photo-1601004890684-d8cbf643f5f2.webp"
      class="rounded-box" />
  </div>
</div>
  </figure>
  <div class="card-body">
    <h2 class="card-title">
      Card Title
      <div class="badge badge-secondary">NEW</div>
    </h2>
    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
    <div class="card-actions justify-end">
      <div class="badge badge-outline">Fashion</div>
      <div class="badge badge-outline">Products</div>
    </div>
  </div>
</div>

</body>
</html>