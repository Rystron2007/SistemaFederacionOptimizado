//Script para las funcionabilidad del controlador ROL
//Variable general para la tabla ROL
var tableRoles;
function requestAll(){
return  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
}
document.addEventListener('DOMContentLoaded', function(){
    
    tableRoles =$('#tableRoles').dataTable({
    "aProcessing":true,
    "aServerSide":true,
    //esta propiedad permite cambiar el lenguaje de la tabal en español
    "language":{
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    //Ajax que permite agregar a la variable URL la url del Modelo que se hace el trabajo 
    //con la base de datos
    "ajax":{
        "url": " "+base_url+"Roles/getAll",
        "dataSrc":""
    },
    //Definicion de las columnas de la tabla donde se mostraran los datos
    "columns":[
        {"data":"id_rol"},
        {"data":"nombre_rol"},
        {"data":"descripcion_rol"},
        {"data":"status"},
        {"data":"options"},
        
    ],
    //Configuracion adicional de la tabla
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"asc"]]
    });

    //Metodo para creacion de un Nuevo Rol 
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e){
        //Accion que previene que la página se recarge al momento de dar clic en submit
        e.preventDefault();
        //Asignación de los datos a las variables para su uso en la funcion
        var intId_rol = document.querySelector('#id_rol').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
        
        if(strNombre == '' || strDescripcion == '' || intStatus == ''){
            //Mensjae de alerta en un modal de error 
            sweetAlert("Atención", "Todos los campos son obligatorios", "error");
            return false;
        }
        
        //Asignacion del tipo de navegador en la variable request 
        var request = requestAll();
        //Variable ajax con URl que obtiene el query realizado 
        var ajaxUrl = urlAjax(intId_rol,0);
        var formData = new FormData(formRol);
        //Captura de los datos usando el metodo POST
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            //Validacion para conocerl el estado del ingreso por medio de los estados request 
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                //validacion si la data se ejecuto de manera correcta
                if(objData.status){
                    //llamado al modal para enviar mensaje de informacion
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    sweetAlert("Roles de Usuario", objData.msg, "success");
                    
                    //actualzar el navegador. 
                    tableRoles.api().ajax.reload();
                }else{
                    //Mensaje de error en caso de fallo en el query
                    sweetAlert("Error", objData.msg,"error");
                }
            }
        }
    }
});
//Funcion para validar el Modal a mostrar
function urlAjax(intId_rol, RESPUESTA_QUERY){
    var ajaxUrl;
    if(intId_rol>RESPUESTA_QUERY){
        ajaxUrl = base_url+'Roles/editRegistro';
    }
    if(intId_rol==RESPUESTA_QUERY){
        ajaxUrl = base_url+'Roles/setRegistro';
    }
    return ajaxUrl;
}
//Metodo que permite abrir el modal para ingreso de datos de un nuevo rol 
$('#tableRoles').DataTable();
function openModal(){

    document.querySelector('#id_rol').value=""; 
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-success");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol"; 
    document.querySelector('#formRol').reset(); 
    $('#modalFormRol').modal('show');
}
//Se agrega el evento windows load para agregar la funcion fntEditRol al momento de cargar 
//la pagina 

window.addEventListener("load", function() {
    setTimeout(() => { 
    }, 500);
  }, false);

//Metodo para dar una accion al boton editar rol 
function fntEditRol(id_rol){
    //Selecciona Todos los elementos que tengan la clase btnEditRol (Se puede cambiar para seleccionar otro
    //Elemento)
    
            document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
            document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-success","btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            //Acciones para capturar el ID 
            var id_rol = id_rol;
            var request = requestAll();
            var ajaxetUser = base_url+'Roles/getIndividual/'+id_rol;
            request.open("GET",ajaxetUser,true);
            request.send();

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        document.querySelector('#id_rol').value=objData.data.id_rol; 
                        document.querySelector('#txtNombre').value=objData.data.nombre_rol; 
                        document.querySelector('#txtDescripcion').value=objData.data.descripcion_rol; 
                        if(objData.data.status == 1){
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="1" selected class="notBlock">Inactivo</option>';
                        }
                        var htmlSelect = `${optionSelect}
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                        `;
                        document.querySelector('#listStatus').innerHTML = htmlSelect;
                        $('#modalFormRol').modal('show');
                    }else{
                        sweetAlert("Error", objData.msg,"error");
                    }
                }
            }
            $('#modalFormRol').modal('show');

}

function fntDelRol(id_rol){
    
            var id_rol = id_rol;

    swal({
        title: "Eliminar Rol",
        text: "Realmente desea Eliminar el ROL",
        icon: "warning",
        buttons: [
            'No, Cancelar',
            'Si, Eliminar'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
                        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Roles/delRegistro';
            var strData = "id_rol="+id_rol;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function(){

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {

                        swal("Eliminar!", objData.msg, "success");
                        tableRoles.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        } else {
            swal("Atención", "objData.msg", "error");
        }
    });
}


function fntPermiso(id_rol){
   
    var id_rol = id_rol;
    var request = requestAll();
    var ajaxUrl  = base_url+'Permisos/getPermisosRol/'+id_rol;
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#contentAjax').innerHTML = request.responseText;
            $('.modalPermisos').modal('show');
            document.querySelector('#formPermisos').addEventListener('submit',fntSavePermisos,false);
        }
    }
}

function fntSavePermisos(evnet){
    evnet.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Permisos/setPermisos'; 
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                swal("Permisos de usuario", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
    
}