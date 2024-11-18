document.addEventListener('DOMContentLoaded', function() {
    const nombreInput = document.getElementById('nombre');
    const descripInput = document.getElementById('descripcion');
    const precioInput = document.getElementById('precio');
    const imagenInput = document.getElementById('imagen');
    const stockInput = document.getElementById('stock');
    const form = document.querySelector('form');

    function validateNombre() {
        const nombre = nombreInput.value;
        const nombreError = document.getElementById('nombreError');
        const nombreRegex = /^[a-zA-Z][a-zA-Z0-9\s]*$/;

        if (!nombre) {
            nombreError.textContent = "El nombre es obligatorio.";
            nombreInput.classList.add('is-invalid');
            return false;
        } else if (!nombreRegex.test(nombre)) {
            nombreError.textContent = "El nombre no puede comenzar con un espacio, número o carácter especial.";
            nombreInput.classList.add('is-invalid');
            return false;
        } else {
            nombreError.textContent = "";
            nombreInput.classList.remove('is-invalid');
            nombreInput.classList.add('is-valid');
            return true;
        }
    }

    function validateDescripcion() {
        const descripcion = descripInputInput.value;
        const descripError = document.getElementById('DescripcionError');
        const descripRegex = /^[a-zA-Z][a-zA-Z0-9\s]*$/;

        if (!descripcion) {
            descripError.textContent = "La descripcion es obligactoria.";
            descripInput.classList.add('is-invalid');
            return false;
        } else if (!descripRegex.test(descripcion)) {
            nombreError.textContent = "La descripcion no puede comenzar con un espacio, número o carácter especial.";
            nombreInput.classList.add('is-invalid');
            return false;
        } else {
            descripError.textContent = "";
            descripInput.classList.remove('is-invalid');
            descripInput.classList.add('is-valid');
            return true;
        }
    }

    function validatePrecio() {
        const precio = precioInput.value;
        const precioError = document.getElementById('precioError');

        if (precio === '') {
            precioError.textContent = "El precio es obligatorio.";
            precioInput.classList.add('is-invalid');
            return false;
        } else if (precio < 0) {
            precioError.textContent = "El precio no puede ser negativo.";
            precioInput.classList.add('is-invalid');
            return false;
        } else {
            precioError.textContent = "";
            precioInput.classList.remove('is-invalid');
            precioInput.classList.add('is-valid');
            return true;
        }
    }

    function validateStock() {
        const stock = stockInput.value;
        const stockError = document.getElementById('stockError');

        if (stock === '') {
            stockError.textContent = "El stock es obligatorio.";
            stockInput.classList.add('is-invalid');
            return false;
        } else if (stock < 0) {
            stockError.textContent = "El stock no puede ser negativo.";
            stockInput.classList.add('is-invalid');
            return false;
        } else {
            stockError.textContent = "";
            stockInput.classList.remove('is-invalid');
            stockInput.classList.add('is-valid');
            return true;
        }
    }

    nombreInput.addEventListener('input', validateNombre);
    descripInput.addEventListener('input', validateDescripcion);
    precioInput.addEventListener('input', validatePrecio);
    stockInput.addEventListener('input', validateStock);

    form.addEventListener('submit', function(event) {
        const isNombreValid = validateNombre();
        const isDescripValid = validateDescripcion();
        const isPrecioValid = validatePrecio();
        const isStockValid = validateStock();

        if (!isNombreValid || !isPrecioValid || !isStockValid ||!isDescripValid) {
            event.preventDefault();
        }
    });
});
