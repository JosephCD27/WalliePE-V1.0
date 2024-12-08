// ----------------------------Redirecciones de Modales DEL CRUD---------------------------------------------------

// -----------------------------crear Rol------------------------------
function crearAmbientes(boton) {
    let obj={
        url:"../../ambientes/Controller/controllerAmbientes.php",
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

// -----------------------------Detalles--------------------------------

function detalleAmbientes(boton,codigo,campo) {
    let obj={
        url:"../../ambientes/Controller/controllerAmbientes.php",
        type:"GET",
        data:{
            btn_detalle: boton,
            codigo:codigo,
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

// -----------------------------editar Rol------------------------------
function editarAmbientes(boton, Amb_Cod,campo) {
    let obj={
        url:"../../ambientes/Controller/controllerAmbientes.php",
        type:"GET",
        data:{
            btn_editar: boton,
            cod:Amb_Cod,
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

// -----------------------------eliminar Rol------------------------------

function eliminarAmbientes(boton, Amb_Cod,campo) {
    let obj={
        url:"../../ambientes/Controller/controllerAmbientes.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            cod:Amb_Cod,
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
function buscarAmbientes(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../ambientes/Controller/controllerAmbientes.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $("#tblAmbientes").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Rol------------------------------
function consultaCrear() {
    
    var nombre = document.getElementById('Amb_Ref').value;
    var descripcion = document.getElementById('Amb_Desc').value;
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
        url:"../../ambientes/Controller/controllerAmbientes.php?registrar=crear",
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

    var nombre = document.getElementById('Amb_Ref').value;
    var descripcion = document.getElementById('Amb_Desc').value;
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
        url:"../../ambientes/Controller/controllerAmbientes.php?actualizar=cambiar",
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
        url:"../../ambientes/Controller/controllerAmbientes.php?borrar=eliminar",
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
