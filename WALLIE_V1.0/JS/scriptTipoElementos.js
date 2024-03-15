// ----------------------------Redirecciones de Modales DEL CRUD---------------------------------------------------

// -----------------------------crear Rol------------------------------
function crearTipoElementos(boton) {
    let obj={
        url:"../../TipoElementos/Controller/controllerTipoElementos.php",
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

// -----------------------------editar Rol------------------------------
function editarTipoElementos(boton, Tipo_Cod,campo) {
    let obj={
        url:"../../TipoElementos/Controller/controllerTipoElementos.php",
        type:"GET",
        data:{
            btn_editar: boton,
            cod:Tipo_Cod,
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

function eliminarTipoElementos(boton, Tipo_Cod,campo) {
    let obj={
        url:"../../TipoElementos/Controller/controllerTipoElementos.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            cod:Tipo_Cod,
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
function buscarTipoElementos(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../TipoElementos/Controller/controllerTipoElementos.php",
        type:"POST",
        data:{
            btn_buscar: "btn_buscar",
            opciones: campo,
            condicion: valor
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $("#tblTipo").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}
// -----------------------------crear Rol------------------------------
function consultaCrear() {
    let obj={
        url:"../../TipoElementos/Controller/controllerTipoElementos.php",
        type:"POST",
        data:{
            registrar: registrar.value,
            tabla_nom:tabla_nom.value,
            Tipo_Cod:Tipo_Cod.value,
            Tipo_Nombre:Tipo_Nombre.value,
            Tipo_Desc:Tipo_Desc.value
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}