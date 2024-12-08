function crearElemento(boton){
    let obj={
        url:"../../Elementos/Controller/controllerElementos.php",
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

// -----------------------------Detalle Elementos------------------------------

function detalleElemento(boton,codigo,campo) {
    let obj={
        url:"../../Elementos/Controller/controllerElementos.php",
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

// -----------------------------editar Elementos------------------------------
function editarElemento(boton,codigo,campo) {
    let obj={
        url:"../../Elementos/Controller/controllerElementos.php",
        type:"GET",
        data:{
            btn_editar: boton,
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

// -----------------------------eliminar Elementos------------------------------

function eliminarElemento(boton,codigo,campo) {
    let obj={
        url:"../../Elementos/Controller/controllerElementos.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
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

// -------------------------------Ejecucion de consultas del CRUD---------------------------------------------------

// -----------------------------buscar Elementos------------------------------
function buscarElemento(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../Elementos/Controller/controllerElementos.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $("#tblUsuario").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Elementos------------------------------

function consultaCrear() {

    var nombre = document.getElementById('Elem_Nombre').value;
    var marca = document.getElementById('Elem_Marca').value;
    var serial = document.getElementById('Elem_Serial').value;
    var ambiente = document.getElementById('Amb_Cod').value;
    var tipo_elem = document.getElementById('tipo').value;
    
    var mensajeError = document.getElementById('mensaje-error');
    
    // Verifica que los campos no estén vacíos y que 'ambiente' y 'tipo_elem' no sean 'defecto'
    if (nombre.trim() === '' || marca.trim() === '' || serial.trim() === '' || ambiente === 'defecto' || tipo_elem === 'defecto') {
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
        url:"../../Elementos/Controller/controllerElementos.php?registrar=registrar",
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

    var nombre = document.getElementById('Elem_Nombre').value;
    var marca = document.getElementById('Elem_Marca').value;
    var serial = document.getElementById('Elem_Serial').value;
    var ambiente = document.getElementById('Amb_Cod').value;
    var tipo_elem = document.getElementById('tipo').value;
    
    var mensajeError = document.getElementById('mensaje-error');
    
    // Verifica que los campos no estén vacíos y que 'ambiente' y 'tipo_elem' no sean 'defecto'
    if (nombre.trim() === '' || marca.trim() === '' || serial.trim() === '' || ambiente === 'defecto' || tipo_elem === 'defecto') {
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
        url:"../../Elementos/Controller/controllerElementos.php?actualizar=cambiar",
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
        url:"../../Elementos/Controller/controllerElementos.php?borrar=eliminar",
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