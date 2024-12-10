function validateForm() {
    // Obtén los valores de los campos de usuario y contraseña
    const usuario = document.getElementById("usuarios").value.trim();
    const contraseña = document.getElementById("contraseña").value.trim();
    const errorMessage = document.getElementById("error-message");

    
    errorMessage.textContent = "";

    if (usuario === "") {
        errorMessage.textContent = "Por favor, ingresa un nombre de usuario.";
        return false;
    }
    if (contraseña === "") {
        errorMessage.textContent = "Por favor, ingresa una contraseña.";
        return false;
    }

   
    return true;
}
