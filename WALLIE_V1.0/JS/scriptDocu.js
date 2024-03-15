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
    let obj={
        url:"../../Tipo Documento/Controller/controllerDocu.php",
        type:"POST",
        data:{
            registrar: registrar.value,
            tabla_nom:tabla_nom.value,
            Docu_Cod:Docu_Cod.value,
            Docu_Nom:Docu_Nom.value,
            Docu_des:Docu_des.value
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}