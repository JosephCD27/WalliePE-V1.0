function consultaUsuario() {
    // Inicialización y obtención de la instancia de la modal
    var instance = M.Modal.init(document.getElementById('modal_Login'));

    // Validación de campos y apertura de modal con mensaje de error si es necesario
    if ($("#usuario").val() === "" || $("#password").val() === "") {
        //abre una modal
        instance.open();
        $(".modal-content").html("<h4>Error</h4><p>Por favor, completa todos los campos.</p>");
        return;
    }

    // Configuración del objeto AJAX
    let obj = {
        url: "../../login/Controller/controllerLogin.php?consultar=buscar",
        type: "POST",
        async: true,
        data: $("#login_usuario").serialize()
    };

    // Llamada AJAX simplificada con funciones de flecha
    $.ajax(obj).done(resp => {
        //se cortan y separan los valores que se obtienen del controlador para almacenarlos independientemente
        let [usuarioEsValido, nombreUsuario, apellidoUsuario] = resp.trim().split(',');

        //valida que el usuario exista
        if (usuarioEsValido === 'true') {
            window.location.href = `../../Principal/controller/controllerPrincipal.php?nom_Usu=${nombreUsuario}&ape_Usu=${apellidoUsuario}`;
        } else {
            //abre una modal
            instance.open();
            $(".modal-content").html("<h4>Error</h4><p>El usuario o la contraseña no son válidos.</p>");
        }
    }).fail(() => {
        instance.open();
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
        console.log("Error al realizar la petición AJAX");
    });
}
