function crearUsuario(boton) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"POST",
        data:{
            btn_crear: boton
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

//------------------------------Detalles Usuarios-----------------------------


function detalleUsuario(boton,codigo,campo) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"GET",
        data:{
            btn_detalle: boton,
            codigo:codigo,
            campo:campo
        }
    }
    $.ajax(obj) 
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------editar Usuarios------------------------------
function editarUsuario(boton,Usu_Id,campo) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"GET",
        data:{
            btn_editar: boton,
            Usu_Id:Usu_Id,
            campo:campo
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------eliminar Usuarios------------------------------

function eliminarUsuario(boton,Usu_Id,campo) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            Usu_Id:Usu_Id,
            campo:campo
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}




// -------------------------------Ejecucion de consultas del CRUD---------------------------------------------------

// -----------------------------buscar Usuarios------------------------------
function buscarUsuario(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $("#tblUsuario").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Usuarios------------------------------

function consultaCrear() {

    var documento = document.getElementById('Usu_Id').value;  
    var nombre = document.getElementById('Usu_Nombre').value;
    var apellido = document.getElementById('Usu_Apellido').value;
    var tipo_docu = document.getElementById('Docu_Cod').value;
    var correo = document.getElementById('Usu_Correo').value;
    var telefono = document.getElementById('Usu_Telefono').value;
    var clave = document.getElementById('Usu_Clave').value;
    var rol = document.getElementById('Rol_Cod').value;
    
    var mensajeError = document.getElementById('mensaje-error');
    
    // Verifica que los campos no estén vacíos y que 'ambiente' y 'tipo_elem' no sean 'defecto'
    if (documento.trim() === '' || nombre.trim() === '' || apellido.trim() === '' || clave.trim() === '' || correo.trim() === '' || telefono.trim() === '' || tipo_docu === 'defecto' || rol === 'defecto') {
        // Si no existe el elemento de mensaje de error, créalo
        if (!mensajeError) {
            mensajeError = document.createElement('div');
            mensajeError.id = 'mensaje-error';
            document.querySelector('.mensaje_error').prepend(mensajeError);
        }
        // Establece el mensaje de error y el estilo
        mensajeError.textContent = '¡Hay campos vacíos o no se ha seleccionado una opción válida!';
        mensajeError.style.color = 'red';
        mensajeError.style.fontWeight = '600';
    
        return false;
    } else {
        // Si los campos son válidos y existe el mensaje de error, elimínalo
        if (mensajeError) {
            mensajeError.remove();
        }
    }
    // ------------enviar informacion al controlador---------
    
    let form = $("#form_crear").serialize();
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php?registrar=registrar",
        type:"POST",
        data: form
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------Editar Rol------------------------------

function consultaEditar() {


    var documento = document.getElementById('Usu_Id').value;  
    var nombre = document.getElementById('Usu_Nombre').value;
    var apellido = document.getElementById('Usu_Apellido').value;
    var tipo_docu = document.getElementById('Docu_Cod').value;
    var correo = document.getElementById('Usu_Correo').value;
    var telefono = document.getElementById('Usu_Telefono').value;
    var clave = document.getElementById('Usu_Clave').value;
    var rol = document.getElementById('Rol_Cod').value;
    
    var mensajeError = document.getElementById('mensaje-error');
    
    // Verifica que los campos no estén vacíos y que 'ambiente' y 'tipo_elem' no sean 'defecto'
    if (documento.trim() === '' || nombre.trim() === '' || apellido.trim() === '' || clave.trim() === '' || correo.trim() === '' || telefono.trim() === '' || tipo_docu === 'defecto' || rol === 'defecto') {
        // Si no existe el elemento de mensaje de error, créalo
        if (!mensajeError) {
            mensajeError = document.createElement('div');
            mensajeError.id = 'mensaje-error';
            document.querySelector('.mensaje_error').prepend(mensajeError);
        }
        // Establece el mensaje de error y el estilo
        mensajeError.textContent = '¡Hay campos vacíos o no se ha seleccionado una opción válida!';
        mensajeError.style.color = 'red';
        mensajeError.style.fontWeight = '600';
    
        return false;
    } else {
        // Si los campos son válidos y existe el mensaje de error, elimínalo
        if (mensajeError) {
            mensajeError.remove();
        }
    }
 
    // ------------enviar informacion al controlador---------
    let form = $("#form_editar").serialize();
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php?actualizar=cambiar",
        type:"POST",
        data:form
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------Eliminar Rol------------------------------

function consultaEliminar() {
    let form = $("#form_eliminar").serialize();
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php?borrar=eliminar",
        type:"POST",
        data:form
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}