function procesarCompra(event) {
    event.preventDefault();

    let nombre = document.getElementById('nombre').value.trim();
    let direccion = document.getElementById('direccion').value.trim();
    let opcionEnvio = document.querySelector('input[name="opcionEnvio"]:checked').value;

    validarNombre();
    if (document.getElementById('envioDomicilio').checked) {
        validarDireccion();
    }

    let nombreError = document.getElementById('nombre-error').textContent;
    let direccionError = document.getElementById('direccion-error').textContent;

    if (nombreError || (document.getElementById('envioDomicilio').checked && direccionError)) {
        return;
    }

    fetch('procesarCompra.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ nombre, direccion, opcionEnvio })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'confirmacion.php';
        } else {
            alert('Error al procesar la compra');
        }
    });
}
