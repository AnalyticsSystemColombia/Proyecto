////cargar la tabla
let tableFacturas;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
    tableFacturas = $('#tableFacturas').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Facturas/getFacturas",
            "dataSrc":""
        },
        "columns":[
            {"data":"provFactId"},
            {"data":"provNomb"},
            {"data":"provNumeFact"},
            {"data":"provValoFact"},
            {"data":"provFactFech"},
            {"data":"status"},
            {"data":"options"},
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
        "order":[[0,"desc"]]  
});


/////insertar facturas
formFacturas.onsubmit = function(e) {
	  e.preventDefault();
	    
	  var listEmpresa = document.querySelector('#listEmpresa').value;
	  var intprovNumeFact = document.querySelector('#txtprovNumeFact').value;
	  var intprovValoFact = document.querySelector('#txtprovValoFact').value;
	  var intStatus = document.querySelector('#listStatus').value;

	  if( listEmpresa == '' ||   intprovNumeFact  == '' || intprovValoFact == ''  || intStatus == ''){
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
	    divLoading.style.display = "flex";
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Facturas/setFactura';
		var formData = new FormData(formFacturas);
		request.open("POST", ajaxUrl, true);
		request.send(formData);

		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				let objData = JSON.parse(request.responseText);
				if(objData.status){
					if(rowTable == ""){
                        tableFacturas.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = listEmpresa;
                        rowTable.cells[2].textContent = intprovNumeFact;
                        rowTable.cells[3].textContent = intprovValoFact;
                        rowTable.cells[4].textContent = intStatus;
                        rowTable = "";
                    }
					$('#modalFacturas').modal('hide');
					formElement.reset();
					swal("Facturas", objData.msg ,"success");
					tableFacturas.api().ajax.reload(function(){

					});
				}else{
					swal("Error", objData.msg , "error");
				}
			}
			divLoading.style.display = "none";
            return false;
		}
	}
}, false);



window.addEventListener('load', function(){
	fntSelectProveedores();
	fntViewFacturas();
	fntEditInfo();
}, false);


function fntSelectProveedores(){
	var ajaxUrl = base_url+'/Proveedores/getSelectproveedores';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#listEmpresa').innerHTML = request.responseText;
			document.querySelector('#listEmpresa').value = 1;
			// $('#listRolid').selectpicker('refresh');
			// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
		}
	}
}

function fntViewFacturas() {
	let btnView = document.querySelectorAll(".btnView");
	btnView.forEach(function(btnViewFacturas){
		btnView.addEventListener('click', function(){
		var provFactId = this.getAttribute("pr");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Facturas/getFacturas/'+provFactId;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var status = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#celprovNit").innerHTML = objData.data.provNombEmpr;
					document.querySelector("#celprovNomb").innerHTML = objData.data.provNumeEmpr;
					document.querySelector("#celprovDire").innerHTML = objData.data.prov;
					document.querySelector("#celprovTele").innerHTML = objData.data.provValoFact;
					document.querySelector("#celprovEmail").innerHTML = objData.data.provFactFech;
					document.querySelector("#celprovDeta").innerHTML = objData.data.status;
					$('#ModalViewFacturas').modal('show');

				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
		});
	});
}


function fntEditInfo(element,provFactId){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Factura";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Facturas/getFactura/'+provFactId;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#provFactId").value = objData.data.provFactId;
                document.querySelector("#listEmpresa").value = objData.data.provFactCodi;
                document.querySelector("#txtprovNumeFact").value = objData.data.provNumeFact;
                document.querySelector('#txtprovValoFact').value = objData.data.provValoFact;
                document.querySelector('#listStatus').value = objData.data.status;
             
                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }

                $('#modalFacturas').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelFactura(){

}

//////abre el modal para crear provvedor

function openModal()
{
	
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Proveedor";
	document.querySelector("#formFacturas").reset();

	$('#modalFacturas').modal('show');
}



