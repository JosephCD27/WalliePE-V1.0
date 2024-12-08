function validarFormulario() {


    // Si todo está bien, ejecuta la función consultaCrear()
    consultaCrear();
}
// ----------------------------Redirecciones de Modales DEL CRUD---------------------------------------------------
// -----------------------------modal crear------------------------------
function crearRol(boton) {
    let obj={
        url:"../../Rol/Controller/controllerRol.php",
        type:"POST",
        data:{
            btn_crear: boton
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------modal editar------------------------------
function editarRol(boton, Rol_Cod,campo) {
    let obj={
        url:"../../Rol/Controller/controllerRol.php",
        type:"GET",
        data:{
            btn_editar: boton,
            cod:Rol_Cod,
            campo:campo
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// -----------------------------modal eliminar------------------------------

function eliminarRol(boton, Rol_Cod,campo) {
    let obj={
        url:"../../Rol/Controller/controllerRol.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            cod:Rol_Cod,
            campo:campo
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}




// -------------------------------Ejecucion de consultas del CRUD---------------------------------------------------

// -----------------------------buscar Rol------------------------------
function buscarRol(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../Rol/Controller/controllerRol.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $("#tblRol").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Rol------------------------------
// registrar,tabla_nom,Rol_Cod,Rol_Nombre,Rol_Desc
function consultaCrear() {

    var nombre = document.getElementById('Rol_Nombre').value;
    var descripcion = document.getElementById('Rol_Desc').value;
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
    // ------------enviar informacion al controlador---------
    let form = $("#form_crear").serialize();
    let obj={
        url:"../../Rol/Controller/controllerRol.php?registrar=crear",
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

// -----------------------------Editar Rol------------------------------

function consultaEditar() {

    var nombre = document.getElementById('Rol_Nombre').value;
    var descripcion = document.getElementById('Rol_Desc').value;
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
        url:"../../Rol/Controller/controllerRol.php?actualizar=cambiar",
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
        url:"../../Rol/Controller/controllerRol.php?borrar=eliminar",
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

// -----------------------------modal editar permisos------------------------------
function editarPermisos(boton,tabla,cod) {
    let obj={
        url:"../../Rol/Controller/controllerRol.php",
        type:"POST",
        data:{
            btn_permisos: boton,
            tabla: tabla,
            rol_cod:cod
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

/////////////////////////////////////////
function guardarPermisos() {
    var formData = $('#form_editar_permisos').serialize();
    $.ajax({
        url: '../Controller/controllerRol.php?guardar_permisos',
        method: 'POST',
        data: formData,
        success: function(response) {
            alert(response);
            $('#modalCrudRol').modal('close');
        },
        error: function() {
            alert('Error al guardar los permisos.');
        }
    });
}
