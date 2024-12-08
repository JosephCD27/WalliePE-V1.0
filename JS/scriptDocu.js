// ----------------------------Redirecciones de Modales DEL CRUD---------------------------------------------------

// -----------------------------crear Tipo Documento------------------------------
function crearDocu(boton) {
    let obj={
        url:"../../Tipo Documento/Controller/controllerDocu.php",
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

// -----------------------------editar Tipo Documento------------------------------
function editarDocu(boton, Docu_Cod,campo) {
    let obj={
        url:"../../Tipo Documento/Controller/controllerDocu.php",
        type:"GET",
        data:{
            btn_editar: boton,
            cod:Docu_Cod,
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

// -----------------------------eliminar Tipo Documento------------------------------

function eliminarDocu(boton, Docu_Cod,campo) {
    let obj={
        url:"../../Tipo Documento/Controller/controllerDocu.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            cod:Docu_Cod,
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

// -----------------------------buscar Tipo Documento------------------------------
function buscarDocu(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../Tipo Documento/Controller/controllerDocu.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $("#tblDocu").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Tipo Documento------------------------------
// registrar,tabla_nom,Docu_Cod,Rol_Nombre,Rol_Desc
function consultaCrear() {

    var nombre = document.getElementById('Docu_Nom').value;
    var descripcion = document.getElementById('Docu_Desc').value;
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
        url:"../../Tipo Documento/Controller/controllerDocu.php?registrar=crear",
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

// -----------------------------Editar Tipo Documento------------------------------

function consultaEditar() {

    var nombre = document.getElementById('Docu_Nom').value;
    var descripcion = document.getElementById('Docu_Desc').value;
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
        url:"../../Tipo Documento/Controller/controllerDocu.php?actualizar=cambiar",
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
        url:"../../Tipo Documento/Controller/controllerDocu.php?borrar=eliminar",
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
