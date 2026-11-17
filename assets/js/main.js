document.addEventListener('DOMContentLoaded', () => {

    const form = document.querySelector('form');

    // Obtener todos los inputs del formulario que puedan recibir información
    const getInputs = () => {
        return Array.from(form.querySelectorAll(
            'input:not([type="hidden"]):not([type="submit"]):not([type="button"]):not([type="reset"]):not([disabled]):not([readonly])'
        ));
    };

    // Escuchar cuando el usuario presiona una tecla dentro del formulario
    form.addEventListener('keydown', (event) => {

        // Solo nos interesa la tecla Enter
        if (event.key !== 'Enter') return;

        // Evitar interferir con otras combinaciones de teclas
        if (event.isComposing || event.shiftKey || event.ctrlKey || event.altKey) return;

        // Obtener el input que actualmente tiene el foco
        const currentInput = event.target;

        // Verificar que el evento provenga de un input
        if (currentInput.tagName !== 'INPUT') return;

        // Obtener los inputs actuales del formulario
        const inputs = getInputs();

        // Identificar la posición del input actual
        const currentIndex = inputs.indexOf(currentInput);

        // Si no encontramos el input, no hacemos nada
        if (currentIndex === -1) return;

        // Si estamos en el último input, permitimos el envío normal
        if (currentIndex === inputs.length - 1) return;

        // Evitar que Enter envíe el formulario
        event.preventDefault();

        // Validar el input actual antes de avanzar
        if (!currentInput.checkValidity()) {
            currentInput.reportValidity();
            return;
        }

        // Obtener el siguiente input
        const nextInput = inputs[currentIndex + 1];

        // Buscar el contenedor del carrusel
        const carousel = form.querySelector('.carousel');

        // Identificar la sección donde está el siguiente input
        const nextSection = nextInput.closest('.carousel-item');

        // Si existe un carrusel, desplazarnos a la siguiente sección
        if (carousel && nextSection) {
            carousel.scrollTo({
                left: nextSection.offsetLeft,
                behavior: 'smooth'
            });
        }

        // Pasar el foco al siguiente input
        nextInput.focus({ preventScroll: true });

    });


    window.onSignIn = function (response) {
        document.getElementById('loading').classList.remove('hidden');
        // Crear un formulario oculto para enviar el token
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '../controllers/validar_login.php';

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'credential';
        input.value = response.credential;

        form.appendChild(input);
        document.body.appendChild(form);

        // Enviar el formulario
        setTimeout(() => {
            form.submit();
        }, 1500);
    }

    // Si algo falla o el usuario cancela
    window.addEventListener('error', () => {
        document.getElementById('loading').classList.add('hidden');
    });
});
