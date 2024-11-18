var regCorreo = /^[\w\-.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var regTel = /^[0-9]{10}$/;
var regNom = /^[a-zA-Z\s]+$/;

document.addEventListener("DOMContentLoaded", () => {

    const validarCampo = (campo, regExp, min, max, soloLetras) => {
        campo.setCustomValidity("");
        campo.classList.remove("valido");
        campo.classList.remove("novalido");
        const valor = campo.value.trim();
        if (valor.length < min || valor.length > max || (regExp && !valor.match(regExp)) || (soloLetras && !valor.match(regNom))) {
            campo.setCustomValidity("Campo no válido");
            campo.classList.add("novalido");
        } else {
            campo.setCustomValidity("");
            campo.classList.add("valido");
        }
    };

    const inputs = document.querySelectorAll("input[type='text'], input[type='password']");
    inputs.forEach(input => {
        input.addEventListener("keyup", e => {
            if (e.code !== "Tab" && e.target.id !== "txtEmail") {
                validarCampo(e.target, regNom, 2, 30, true);
            }
        });
    });

    const txtEmail = document.getElementById("txtEmail");
    txtEmail.addEventListener("keyup", e => {
        if (e.code == "Tab") return;
        let txt = e.target;
        if (txt.value.trim().match(regCorreo)) {
            txt.setCustomValidity("");
            txt.classList.add("valido");
            txt.classList.remove("novalido");
        } else {
            txt.setCustomValidity("Campo no válido");
            txt.classList.remove("valido");
            txt.classList.add("novalido");
        }
    });

    document.getElementById("txtTelefono").addEventListener("keyup", e => {
        validarCampo(e.target, regTel, 0, 0);
    });

    document.getElementById("txtPassword").addEventListener("keyup", e => {
        validarCampo(e.target, null, 6, 20);
    });

    document.getElementById("txtConfirmarPassword").addEventListener("keyup", e => {
        validarCampo(e.target, null, 6, 20);
    });

    document.getElementById("cboRol").addEventListener("change", e => {
        const cbo = e.target;
        cbo.setCustomValidity("");
        cbo.classList.remove("valido");
        cbo.classList.remove("novalido");
        if (!(cbo.value == 'admin' || cbo.value == 'empleado' || cbo.value == 'cliente')) {
            cbo.setCustomValidity("Campo no válido");
            cbo.classList.add("novalido");
        } else {
            cbo.classList.add("valido");
        }
    });

    document.getElementById("btnAceptar").addEventListener("click", e => {
        e.target.form.classList.add("validado");
        const controles = e.target.form.querySelectorAll("input, select");
        controles.forEach(control => {
            control.setCustomValidity("");
        });

        const txtNombre = document.getElementById("txtNombre");
        const txtApellido1 = document.getElementById("txtApellido1");
        const txtApellido2 = document.getElementById("txtApellido2");
        const txtContrasenia = document.getElementById("txtPassword");
        const txtContrasenia2 = document.getElementById("txtConfirmarPassword");
        const txtTel = document.getElementById("txtTelefono");
        const cboRol = document.getElementById("cboRol");

        if (txtNombre.value.trim().length < 2 || txtNombre.value.trim().length > 30 || !txtNombre.value.trim().match(regNom)) {
            txtNombre.setCustomValidity("El nombre es obligatorio (entre 2 y 30 caracteres)");
        }
        if (txtApellido1.value.trim().length < 2 || txtApellido1.value.trim().length > 30 || !txtApellido1.value.trim().match(regNom)) {
            txtApellido1.setCustomValidity("El primer apellido es obligatorio (entre 2 y 30 caracteres)");
        }
        if (txtApellido2.value.trim().length > 0 && (txtApellido2.value.trim().length < 2 || txtApellido2.value.trim().length > 30 || !txtApellido2.value.trim().match(regNom))) {
            txtApellido2.setCustomValidity("El segundo apellido debe tener entre 2 y 30 caracteres");
        }
        if (txtContrasenia.value.trim().length < 6 || txtContrasenia.value.trim().length > 20) {
            txtContrasenia.setCustomValidity("La contraseña es obligatoria (entre 6 y 20 caracteres)");
        }
        if (txtContrasenia2.value.trim() !== txtContrasenia.value.trim()) {
            txtContrasenia2.setCustomValidity("Las contraseñas no coinciden");
        }
        if (txtTel.value.trim().length > 0 && txtTel.value.trim().length !== 10) {
            txtTel.setCustomValidity("El teléfono debe tener 10 dígitos");
        }

        if (!e.target.form.checkValidity()) {
            e.preventDefault();
        }
    });
});
