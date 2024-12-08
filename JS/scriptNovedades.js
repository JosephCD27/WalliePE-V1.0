function consulAmbiente(boton) {

    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"POST",
        data:{
            btn_ambiente: boton
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

function crearNovedad(boton,ambiente) {
    
    var ambiente = ambiente;  
    
    var mensajeError = document.getElementById('mensaje-error');
    
    // Verifica que los campos no estén vacíos y que 'ambiente' y 'tipo_elem' no sean 'defecto'
    if (ambiente === 'defecto') {
        // Si no existe el elemento de mensaje de error, créalo
        if (!mensajeError) {
            mensajeError = document.createElement('div');
            mensajeError.id = 'mensaje-error';
            document.querySelector('.mensaje_error').prepend(mensajeError);
        }
        // Establece el mensaje de error y el estilo
        mensajeError.textContent = 'Debes seleccionar un ambiente!';
        mensajeError.style.color = 'red';
        mensajeError.style.fontWeight = '600';
    
        return false;
    } else {
        // Si los campos son válidos y existe el mensaje de error, elimínalo
        if (mensajeError) {
            mensajeError.remove();
        }
    }

    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"POST",
        data:{
            btn_crear: boton,
            ambiente: ambiente,
            campo:'Amb_Cod'
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
//------------------------------Detalles Novedades-----------------------------


function detalleNovedad(boton,ambiente,novedad,campo) {
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"GET",
        data:{
            btn_detalle: boton,
            ambiente:ambiente,
            codigo:novedad,
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

// -----------------------------editar Novedades------------------------------
function editarNovedad(boton,ambiente,novedad,campo) {
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"GET",
        data:{
            btn_editar: boton,
            ambiente:ambiente,
            Nov_Cod:novedad,
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

// -----------------------------eliminar Novedades------------------------------

function eliminarNovedad(boton,codigo,campo) {
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            Nov_Cod:codigo,
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

// -----------------------------buscar Novedades------------------------------
function buscarNovedad(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $("#tblNovedad").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Novedades------------------------------

function consultaCrear() {
    
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const selects = document.querySelectorAll('select');
    const textareas = document.querySelectorAll('textarea');
    let camposVacios = false;
    let error = document.getElementById('mensaje-error');

    // Validar si hay al menos un checkbox seleccionado
    if (checkboxes.length === 0) {
        error.textContent = 'Debes seleccionar al menos un elemento.';
        error.style.color = 'red';
        error.style.fontWeight = '600';
        return;
    }

    // Validar campos y selects para cada checkbox seleccionado
    checkboxes.forEach((checkbox) => {
        const parentDiv = checkbox.closest('.novedad');
        const inputElement = parentDiv.querySelector('.inputModificadoCrear');
        const selectElement = parentDiv.querySelector('select');
        const textareaElement = parentDiv.querySelector('textarea');

        if (!inputElement.value || selectElement.value === 'defecto' || !textareaElement.value) {
            camposVacios = true;
        }
    });

    if (camposVacios) {
        error.textContent = 'Por favor, diligencia todos los campos.';
        error.style.color = 'red';
        error.style.fontWeight = '600';
        return;
    }

    // ------------enviar informacion al controlador---------
    let form = $("#form_crear").serialize();
    let obj = {
        url: "../../Novedades/Controller/controllerNovedades.php?registrar=registrar",
        type: "POST",
        data: form
    };
    $.ajax(obj)
    .done((resp) => {
        $(".modal-content").html(resp);
    }).fail(() => {
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------Anular novedad------------------------------

function consultaEliminar() {
    let form = $("#form_eliminar").serialize();
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php?borrar=eliminar",
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

// -----------------------------Cargar Opciones de Mantenimiento------------------------------

function modalAtender(boton,ambiente,novedad,campo){
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"GET",
        data:{
            btn_mod_atender: boton,
            ambiente:ambiente,
            codigo:novedad,
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

// -----------------------------Finalizar Novedad ------------------------------

function modalFinalizar(boton,novedad,campo){
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"GET",
        data:{
            btn_mod_finalizar: boton,
            codigo:novedad,
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

// -----------------------------atender elemento------------------------------

function atenderElemento(boton) {
    let indice = $(boton).data('indice');
    let form = $("#form_atender_" + indice).serialize()+ "&indice=" + indice;

    let obj = {
        url: "../../Novedades/Controller/controllerNovedades.php",
        type: "POST",
        data: form
    };

    $.ajax(obj)
    .done((resp) => {
        window.location.href="../../Novedades/View/listarNovedad.php";
        // $(".modal-content").html(resp);
    }).fail(() => {
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------terminar mantenimiento del elemento------------------------------

function terminarElemento(boton) {
    let indice = $(boton).data('indice');
    let form = $("#form_atender_" + indice).serialize()+ "&indice=" + indice;

    let obj = {
        url: "../../Novedades/Controller/controllerNovedades.php",
        type: "POST",
        data: form
    };

    $.ajax(obj)
    .done((resp) => {
        window.location.href="../../Novedades/View/listarNovedad.php";
        // $(".modal-content").html(resp);
    }).fail(() => {
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

//-------------------------------PDF REPORTES----------------------//

function PDFreporte(Botom) {
    let obj={
        url:"../../Novedades/Controller/controllerNovedades.php",
        type:"POST",
        data:{
            btn_pdf:Botom
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un problema");
    });
}

//----------------------------GENERAR PDF--------------------------//

function GenerarPDF() {
    let form = $('#formPDF').serialize()
    let=obj={
        url:"../../fpdf/PruebaV.php",
        type: "POST",
        data: form
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al generar el documento");
    });
}
