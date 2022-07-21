var tableColegiados;
function requestAll(){
    return  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
}
document.addEventListener('DOMContentLoaded', function(){

    tableColegiados = $('#tableColegiados').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"Colegiados/getAll",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_colegiado"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"cedula"},
            {"data":"codigo_federacion"},
            {"data":"telefono"},
            {"data":"email_user"},
            {"data":"status"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"acs"]]
    });

    var formColegiado = document.querySelector("#formColegiado");
    formColegiado.onsubmit = function(e) {
        e.preventDefault();
        var intColegiado = document.querySelector('#listUsuarios').value;
        var strFederacion = document.querySelector('#txtFederacion').value;

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
            if(elementsValid[i].classList.contains('is-invalid')) {
                sweetAlert("Atención", "Por favor verifique los campos en rojo." , "error");
                return false;
            }
        }

        var request = requestAll();
        var intId_colegiado = document.querySelector('#idColegiado').value;
        var ajaxUrl = urlAjax(intId_colegiado,0);

        var formData = new FormData(formColegiado);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormColegiado').modal("hide");
                    formColegiado.reset();
                    sweetAlert("Colegiados", objData.msg ,"success");
                    tableColegiados.api().ajax.reload();

                }else{
                    sweetAlert("Error", objData.msg , "error");
                }
            }
        }

    }
}, false);


//Funcion para validar el Modal a mostrar
function urlAjax(intId_rol, RESPUESTA_QUERY){
    var ajaxUrl;
    if(intId_rol>RESPUESTA_QUERY){
        ajaxUrl = base_url+'Colegiados/editRegistro';
    }
    if(intId_rol==RESPUESTA_QUERY){
        ajaxUrl = base_url+'Colegiados/setRegistro';
    }
    return ajaxUrl;
}

window.addEventListener("load", function() {
    setTimeout(() => {
        fntRolesUsuario();

    }, 500);
}, false);

function fntRolesUsuario(){
    var ajaxUrl = base_url+'Usuarios/getSelectUsuarios';
    var request = requestAll();
    request.open("GET",ajaxUrl,true);
    request.send();


    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listUsuarios').innerHTML = request.responseText;
            document.querySelector('#listUsuarios').value;
            $('#listUsuarios').selectpicker('render');
        }
    }

}
function fntViewColegiado(idColegiado){

    var idColegiado = idColegiado;
    var request = requestAll();
    var ajaxUrl = base_url+'Colegiados/getIndividual/'+idColegiado;
    request.open("GET",ajaxUrl,true);
    request.send();
    //$('#modalViewColegiado').modal('show');

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                var estadoUsuario = objData.data.status == 1 ?
                    '<span class="badge badge-success" style="background: green">Activo</span>' :
                    '<span class="badge badge-danger" style="background: red">Inactivo</span>';

                document.querySelector("#celCedula").innerHTML = objData.data.cedula;
                document.querySelector("#celNombre").innerHTML = objData.data.nombres;
                document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celEmail").innerHTML = objData.data.email_user;

                document.querySelector("#celFederacion").innerHTML = objData.data.codigo_federacion;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
                $('#modalViewColegiado').modal('show');
            }else{
                sweetAlert("Error", objData.msg , "error");
            }
        }

    }
}
function fntEditColegiado(idColegiado) {

    querySelector("Actualizar Colegiado", "Actualizar");

    var idColegiado = idColegiado;
    var request = requestAll();
    var ajaxUrl = base_url + 'Colegiados/getIndividual/' + idColegiado;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idColegiado").value = objData.data.id_colegiado;
                document.querySelector("#txtFederacion").value = objData.data.codigo_federacion;
                document.querySelector("#listUsuarios").value = objData.data.idpersona;
                $('#listUsuarios').selectpicker('render');
                estatus(objData);
            }
        }
        $('#modalFormColegiado').modal('show');
    }
}

function fntDelColegiado(idColegiado) {
    var idcolegiado = idColegiado;
    swal({
        title: 'Eliminar Colegiado',
        text: "¿Realmente quiere eliminar el Colegiado?",
        icon: "warning",
        buttons: [
            'No, Cancelar',
            'Si, Eliminar'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            if (isConfirm) {
                var request = requestAll();
                var ajaxUrl = base_url + 'Colegiados/delRegistro';
                var strData = "id_colegiado=" + idcolegiado;
                request.open("POST", ajaxUrl, true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strData);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        var objData = JSON.parse(request.responseText);

                        if (objData.status) {
                            swal("Eliminar!", objData.msg, "success");
                            tableColegiados.api().ajax.reload();
                        } else {
                            swal("Atención!", objData.msg, "error");
                        }
                    }
                }
            }
        } else {
            swal("Atención", objData.msg, "error");
        }
    });
}
function estatus(objData){
    if (objData.data.status == 1) {
        document.querySelector("#listStatus").value = 1;
    } else {
        document.querySelector("#listStatus").value = 2;
    }
    $('#listStatus').selectpicker('render');
}
function querySelector(titulo, accion){
    document.querySelector('#titleModal').innerHTML = titulo;
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = accion;
}
function openModal()
{
    querySelector("Nuevo Colegiado", "Guardar");
    document.querySelector('#idColegiado').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector("#formColegiado").reset();
    $('#modalFormColegiado').modal('show');
}