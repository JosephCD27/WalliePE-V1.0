function consultaUsuario() {
    //Validación de campos
    if ($("#usuario").val() === "" || $("#password").val() === "") {//. val para capturar los datos y hacer la validacion
        $(".modal_Login").html("Por favor, completa todos los campos.");//modal de confimación
        alert("debes ingresar documento y contraseña");
        return; // Detiene la ejecución si la validación falla
    }
    let form = $("#login_usuario").serialize();
    let obj = {
        url: "../../login/Controller/controllerLogin.php?consultar=buscar",
        type: "POST",
        async: true,
        data: form
    };
    $.ajax(obj)
        .done((resp) => {
            let datos = resp.trim().split(',');
            let usuarioEsValido = datos[0];
            let nombreUsuario = datos[1]; // Captura el nombre del usuario
            let apellidoUsuario = datos[2];

            if(usuarioEsValido === 'true') {
                // El usuario es válido, redirigir y pasar el nombre como parámetro
                window.location.href = '../../Principal/pantallaPrincipal.php?nom_Usu='+encodeURIComponent(nombreUsuario)+'&ape_Usu='+encodeURIComponent(apellidoUsuario);
            } else {
                // El usuario no es válido
                // $(".modal_Login").html("Inicio de sesión fallido.");
                alert("la contraseña o el documento registrado no son validos");
            }
        })
        .fail(() => {
            // $(".modal_Login").html("Oops!, hemos tenido un error al cargar la vista");
            alert("Oops!, hemos tenido un error al cargar la vista");

            console.log("Error al realizar la petición AJAX");
        });
}