document.addEventListener("DOMContentLoaded", () => {
    new DataTable('#tblProductos');

    document.getElementById("mdlEliminar").addEventListener('shown.bs.modal', (e) => {
        let id = e.relatedTarget.value;
        let nombre = e.relatedTarget.getAttribute("nombre");
        document.getElementById("btnEliminar").value = id;
        document.getElementById("ProductoEliminar").innerText = nombre;
    });
});
