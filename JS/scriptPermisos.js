// ----------------------------Redirecciones de Modales DEL CRUD---------------------------------------------------
// -----------------------------modal crear------------------------------
function crearPermiso(boton) {
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php",
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

// -----------------------------modal editar------------------------------
function editarPermiso(boton, id_permiso, campo) {
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php",
        type:"POST",
        data:{
            btn_editar: boton,
            id_permiso: id_permiso,
            campo: campo
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------modal eliminar------------------------------
function eliminarPermiso(boton, id_permiso, campo) {
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php",
        type:"POST",
        data:{
            btn_eliminar: boton,
            id_permiso: id_permiso,
            campo: campo
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

// -----------------------------buscar Permiso------------------------------
function buscarPermiso(valor, campo) {
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $("#tblPermiso").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------crear Permiso------------------------------
function consultaCrear() {

    var nombre = document.getElementById('per_nombre').value;
    var descripcion = document.getElementById('per_descripcion').value;
    var mensajeError = document.getElementById('mensaje-error');

    if(nombre.trim() === '' || descripcion.trim() === '') {
        // Si no existe el elemento de mensaje de error, créalo
        if (!mensajeError) {
            mensajeError = document.createElement('div');
            mensajeError.id = 'mensaje-error';
            document.querySelector('.mensaje_error').prepend(mensajeError);
        }
        // Establece el mensaje de error y el estilo
        mensajeError.textContent = 'hay campos vacios!';
        mensajeError.style.color = 'red';
        mensajeError.style.fontWeight = '600';

        return false;
    } else {
        // Si los campos no están vacíos y existe el mensaje de error, elimínalo
        if (mensajeError) {
            mensajeError.remove();
        }
    }

    let form = $("#form_crear").serialize();
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php?registrar=crear",
        type:"POST",
        data:form
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------Editar Permiso------------------------------
function consultaEditar() {

    var nombre = document.getElementById('per_nombre').value;
    var descripcion = document.getElementById('per_descripcion').value;
    var mensajeError = document.getElementById('mensaje-error');

    if(nombre.trim() === '' || descripcion.trim() === '') {
        // Si no existe el elemento de mensaje de error, créalo
        if (!mensajeError) {
            mensajeError = document.createElement('div');
            mensajeError.id = 'mensaje-error';
            document.querySelector('.mensaje_error').prepend(mensajeError);
        }
        // Establece el mensaje de error y el estilo
        mensajeError.textContent = 'hay campos vacios!';
        mensajeError.style.color = 'red';
        mensajeError.style.fontWeight = '600';

        return false;
    } else {
        // Si los campos no están vacíos y existe el mensaje de error, elimínalo
        if (mensajeError) {
            mensajeError.remove();
        }
    }
    
    let form = $("#form_editar").serialize();
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php?actualizar=cambiar",
        type:"POST",
        data:form
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------Eliminar Permiso------------------------------
function consultaEliminar() {
    let form = $("#form_eliminar").serialize();
    let obj={
        url:"../../Permisos/Controller/controllerPermisos.php?borrar=eliminar",
        type:"POST",
        data:form
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
