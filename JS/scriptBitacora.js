//-----------------------------FILTAR BUSQUEDA AMBIENTES------------------------------
function buscarAmbienteBitacora(valor, campo) {
    console.log(valor)
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $("#tblBitacora").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

//-----------------------------------LISTAR BITACORA----------------------------------

function detalleBitacora(valor, boton, campo) {
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php",
        type:"GET",
        data:{
            btn_detalle: boton,
            valor:valor,
            campo:campo
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista detalle bitacora");
    });
}

// -----------------------------registrar bitacora------------------------------
function registrarBitacora(boton, valor, campo) {
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php",
        type:"GET",
        data:{
            btn_registrar: boton,
            valor:valor,
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



// ------------------crear bitacora-------------------------------
function crearBitacora() {
    var mensajeError = document.getElementById('mensaje-error');
    var camposValidos = true;
    
    // Obtén todos los campos generados
    var campos = document.querySelectorAll('.inputModificadoCrear');
    
    campos.forEach(function (campo) {
        if (campo.value.trim() === '') {
            camposValidos = false;
            campo.style.border = '1px solid red'; // Cambia el estilo para resaltar el campo
        } else {
            campo.style.border = ''; // Restaura el estilo normal
        }
    });
    
    if (!camposValidos) {
        // Si hay campos vacíos, muestra un mensaje de error general
            mensajeError.textContent = '¡Hay campos vacíos!';
            mensajeError.style.color = 'red';
            mensajeError.style.fontWeight = '600';
        return false;
    } else {
        // Si todos los campos están completos, elimina el mensaje de error
        if (mensajeError) {
            mensajeError.textContent = '';
            mensajeError.style.color = '';
            mensajeError.style.fontWeight = '';
        }
    }
    // -------------------formulario---------------------
    let capturarFormulario = $("#FormCrearBitacora").serialize();
    //alert(capturarFormulario);
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php?&btn_crear=crear",
        type:"POST",
        data: capturarFormulario,
        async: false
    }
    $.ajax(obj)
    .done((resp)=>{
        //alert(resp)
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------bitacoras de ambientes------------------------------

function historialBitacoras(boton,ambiente,campo) {
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php",
        type:"POST",
        data:{
            btn_historial: boton,
            ambiente: ambiente,
            campo: campo
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

//------------------------------CARGAR MODAL DE FINALIZACION DE BITACORA-----------------------//

function finalizarBitacora(boton,valor,ambiente,campo1,campo2) {
    let obj={
        url:"../../Bitacora/controller/controllerBitacora.php",
        type:"POST",
        data:{
            btn_finalizar: boton,
            valor: valor,
            ambiente: ambiente,
            campo1: campo1,
            campo2:campo2
        }
    }
    $.ajax(obj)
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al carga de la vista");
    });
    
}

//--------------------------------CARGAR DATOS DE FINALIZACIÓN DE BITACORA--------------------------//

function terminarBitacora() {
    var mensajeError = document.getElementById('mensaje-error');
    var camposValidos = true;
    
    // Obtén todos los campos generados
    var campos = document.querySelectorAll('.inputModificadoCrear');
    
    campos.forEach(function (campo) {
        if (campo.value.trim() === '') {
            camposValidos = false;
            campo.style.border = '1px solid red'; // Cambia el estilo para resaltar el campo
        } else {
            campo.style.border = ''; // Restaura el estilo normal
        }
    });
    
    if (!camposValidos) {
        // Si hay campos vacíos, muestra un mensaje de error general
            mensajeError.textContent = '¡Hay campos vacíos!';
            mensajeError.style.color = 'red';
            mensajeError.style.fontWeight = '600';
        return false;
    } else {
        // Si todos los campos están completos, elimina el mensaje de error
        if (mensajeError) {
            mensajeError.textContent = '';
            mensajeError.style.color = '';
            mensajeError.style.fontWeight = '';
        }
    }

    // ------------formulario-----------------
    
    let capturarFormulario = $("#FormTerminarBitacora").serialize();
    //alert(capturarFormulario);
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php?",
        type:"POST",
        data: capturarFormulario + "&btn_terminar=terminar",
        async: false
    }
    $.ajax(obj)
    .done((resp)=>{
        //alert(resp)
        $(".modal-content").html("Bitacora registrada con exito");
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });

}




// -----------------------------Detalles--------------------------------

// function detalleAmbientes(boton,codigo,campo) {
//     let obj={
//         url:"../../ambientes/Controller/controllerAmbientes.php",
//         type:"GET",
//         data:{
//             btn_detalle: boton,
//             codigo:codigo,
//             campo:campo
//         }
//     }
//     $.ajax(obj) // Aquí se cambió $ajax por $.ajax
//     .done((resp)=>{
//         $(".modal-content").html(resp);
//     }).fail(()=>{
//         $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
//     });
// }

// -----------------------------editar Rol------------------------------
// function editarBitacora(boton, Amb_Cod,campo) {
//     let obj={
//         url:"../../ambientes/Controller/controllerAmbientes.php",
//         type:"GET",
//         data:{
//             btn_editar: boton,
//             cod:Amb_Cod,
//             campo:campo
//         }
//     }
//     $.ajax(obj) // Aquí se cambió $ajax por $.ajax
//     .done((resp)=>{
//         $(".modal-content").html(resp);
//     }).fail(()=>{
//         $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
//     });
// }

// -----------------------------cambiar Ambiente------------------------------

function cambiarAmbiente(boton) {
    let obj={
        url:"../../Bitacora/Controller/controllerBitacora.php",
        type:"GET",
        data:{
            btn_cambiar:boton
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}

// function eliminarBitacora(boton, Amb_Cod,campo) {
//     let obj={
//         url:"../../Bitacora/Controller/controllerBitacora.php",
//         type:"GET",
//         data:{
//             btn_eliminar:boton,
//             cod:Amb_Cod,
//             campo:campo
//         }
//     }
//     $.ajax(obj) // Aquí se cambió $ajax por $.ajax
//     .done((resp)=>{
//         $(".modal-content").html(resp);
//     }).fail(()=>{
//         $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
//     });
// }