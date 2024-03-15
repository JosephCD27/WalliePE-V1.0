// ----------------------------Redirecciones de Modales DEL CRUD---------------------------------------------------

// -----------------------------crear Rol------------------------------
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

// -----------------------------editar Rol------------------------------
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

// -----------------------------eliminar Rol------------------------------

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
    let obj={
        url:"../../Rol/Controller/controllerRol.php",
        type:"POST",
        data:{
            registrar: registrar.value,
            tabla_nom:tabla_nom.value,
            Rol_Cod:Rol_Cod.value,
            Rol_Nombre:Rol_Nombre.value,
            Rol_Desc:Rol_Desc.value
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}