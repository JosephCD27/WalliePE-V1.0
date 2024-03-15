function crearUsuario(boton) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
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


// -----------------------------editar Usuarios------------------------------
function editarUsuario(boton,Usu_Id,campo) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"GET",
        data:{
            btn_editar: boton,
            Usu_Id:Usu_Id,
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

// -----------------------------eliminar Usuarios------------------------------

function eliminarUsuario(boton,Usu_Id,campo) {
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
        type:"GET",
        data:{
            btn_eliminar:boton,
            Usu_Id:Usu_Id,
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

// -----------------------------buscar Usuarios------------------------------
function buscarUsuario(valor,campo) {
    console.log(valor)
    let obj={
        url:"../../Usuarios/Controller/controllerUsuarios.php",
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
// -----------------------------crear Usuarios------------------------------

function consultaCrear() {
    let obj={
        url:"../Usuarios/Controller/controllerUsuarios.php",
        type:"POST",
        data:{
            registrar: registrar.value,
            tabla_nom:tabla_nom.value,
            Usu_Id:Usu_Id.value,
            Usu_Nombre:Usu_Nombre.value,
            Usu_Apellido:Usu_Apellido.value,
            Usu_Correo:Usu_Correo.value,
            Usu_Telefono:Usu_Telefono.value,
            Usu_Contraseña:Usu_Contraseña.value
        }
    }
    $.ajax(obj) // Aquí se cambió $ajax por $.ajax
    .done((resp)=>{
        $(".modal-content").html(resp);
    }).fail(()=>{
        $(".modal-content").html("Oops!, hemos tenido un error al cargar la vista");
    });
}