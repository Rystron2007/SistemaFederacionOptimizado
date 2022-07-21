var tableClub;
function requestAll(){
    return  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
}
document.addEventListener('DOMContentLoaded', function(){

    tableClub = $('#tableClub').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"Club/getAll",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_club"},
            {"data":"codigo_club"},
            {"data":"nombre_club"},
            {"data":"correo_club"},
            {"data":"asociacion_futbol"},
            {"data":"direccion_club"},
            {"data":"presidente"},
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

    var formClub = document.querySelector("#formClub");
    formClub.onsubmit = function(e) {
        e.preventDefault();

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
            if(elementsValid[i].classList.contains('is-invalid')) {
                sweetAlert("Atención", "Por favor verifique los campos en rojo." , "error");
                return false;
            }
        }

        var request = requestAll();
        var id_club = document.querySelector('#idClub').value;
        var ajaxUrl = urlAjax(id_club,0);

        var formData = new FormData(formClub);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormClub').modal("hide");
                    formClub.reset();
                    sweetAlert("Club", objData.msg ,"success");
                    tableClub.api().ajax.reload();

                }else{
                    sweetAlert("Error", objData.msg , "error");
                }
            }
        }

    }
}, false);


//Funcion para validar el Modal a mostrar
function urlAjax(id_club, RESPUESTA_QUERY){
    var ajaxUrl;
    if(id_club>RESPUESTA_QUERY){
        ajaxUrl = base_url+'Club/editRegistro';
    }
    if(id_club==RESPUESTA_QUERY){
        ajaxUrl = base_url+'Club/setRegistro';
    }
    return ajaxUrl;
}

window.addEventListener("load", function() {
    setTimeout(() => {
        //fntClub();

    }, 500);
}, false);


function fntViewClub(idClub){

    var idClub = idClub;
    var request = requestAll();
    var ajaxUrl = base_url+'Club/getIndividual/'+idClub;
    request.open("GET",ajaxUrl,true);
    request.send();


    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                var estadoClub = objData.data.status == 1 ?
                    '<span class="badge badge-success" style="background: green">Activo</span>' :
                    '<span class="badge badge-danger" style="background: red">Inactivo</span>';

                document.querySelector("#celCodigo").innerHTML = objData.data.codigo_club;
                document.querySelector("#celNombre").innerHTML = objData.data.nombre_club;
                document.querySelector("#celFederacion").innerHTML = objData.data.asociacion_futbol;
                document.querySelector("#celEmail").innerHTML = objData.data.correo_club;
                document.querySelector("#celDireccion").innerHTML = objData.data.direccion_club;


                document.querySelector("#celEstado").innerHTML = estadoClub;
                document.querySelector("#celFechaFundacion").innerHTML = objData.data.fecha_fundacion;
                $('#modalViewClub').modal('show');
            }else{
                sweetAlert("Error", objData.msg , "error");
            }
        }
    }
}

function fntEditClub(idClub) {

    querySelector("Actualizar Club", "Actualizar")
    var idClub = idClub;
    var request = requestAll();
    var ajaxUrl = base_url + 'Club/getIndividual/' + idClub;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idClub").value = objData.data.id_club;
                document.querySelector("#txtCodigoClub").value = objData.data.codigo_club;
                document.querySelector("#txtNombre").value = objData.data.nombre_club;
                document.querySelector("#txtFederacion").value = objData.data.asociacion_futbol;
                document.querySelector("#txtEmail").value = objData.data.correo_club;
                document.querySelector("#txtDireccion").value = objData.data.direccion_club;
                document.querySelector("#selectDate").value = objData.data.fecha_fundacion;
                document.querySelector("#txtPresidente").value = objData.data.presidente;

                estatus(objData);
            }
        }
        $('#modalFormClub').modal('show');
    }
}
function estatus(objData){
    if (objData.data.status == 1) {
        document.querySelector("#listStatus").value = 1;
    } else {
        document.querySelector("#listStatus").value = 2;
    }
    $('#listStatus').selectpicker('render');
}
function fntDelClub(id_club) {

    var id_club = id_club;

    swal({
        title: 'Eliminar Club',
        text: "¿Realmente quiere eliminar el Club?",
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
                var ajaxUrl = base_url + 'Club/delRegistro';
                var strData = "idClub=" + id_club;
                request.open("POST", ajaxUrl, true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strData);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        var objData = JSON.parse(request.responseText);

                        if (objData.status) {
                            swal("Eliminar!", objData.msg, "success");
                            tableClub.api().ajax.reload();

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

function querySelector(titulo, accion){
    document.querySelector('#titleModal').innerHTML = titulo;
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = accion;
}

function openModal()
{
    querySelector("Nuevo Club", "Guardar");
    document.querySelector('#idClub').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector("#formClub").reset();
    $('#modalFormClub').modal('show');
}