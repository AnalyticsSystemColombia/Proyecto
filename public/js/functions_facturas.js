

////cargar la tabla de la categoria
var tableFacturas;
var tableResultados;
document.addEventListener('DOMContentLoaded',function(){
	////var formUsuarios = document.querySelector("formUsuarios");
	tableFacturas = $('#tableFacturas').DataTable({
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
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
    
	});


	////var formUsuarios = document.querySelector("formUsuarios");
	tableResultados = $('#tableResultados').DataTable({
        "paging": false,
        "searching": false,
        "info":false,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Facturas/getResultados",
			"dataSrc":""
		},
		"columns":[
		{"data":"total"}
		],
        "bDestroy":false,
        "iDisplayLength":1,
	}, false);



    formFacturas.onsubmit = function(e) {
        e.preventDefault();
        
        var strlistEmpresa = document.querySelector('#provCodi').value;
        var intprovNumeFact = document.querySelector('#txtprovNumeFact').value;
        var strprovValoFact = document.querySelector('#txtprovValoFact').value;
        var intlistStatus = document.querySelector('#listStatus').value;
  
        if(strlistEmpresa == '' || 
           intprovNumeFact  == '' || 
           strprovValoFact == '' || 
           intlistStatus == '')
        {
            swal("Atencion", "Todos los campos son obligatorios", "error");
            return false;
        }
          var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          var ajaxUrl = base_url+'/Facturas/enviarFacturas';
          var formData = new FormData(formFacturas);
          request.open("POST", ajaxUrl, true);
          request.send(formData);
          request.onreadystatechange = function(){
              if(request.readyState == 4 && request.status == 200){
                  var objData = JSON.parse(request.responseText);
                  if(objData.status){
                      $('#modalFacturas').modal('hide');
                      formElement.reset();
                      swal("Facturas", objData.msg ,"success");
                      tableFacturas.api().ajax.reload(function(){
  
                      });
                  }else{
                      swal("Error", objData.msg , "error");
                  }
              }
          }
      }
}, false);



window.addEventListener('load', function(){
	fntSelectProveedores();
	btnViewFacturas();
	//fntEditProveedor();
}, false);

function fntSelectProveedores(){
	var ajaxUrl = base_url+'/Proveedores/getSelectproveedores';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();

	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#provCodi').innerHTML = request.responseText;
			document.querySelector('#provCodi').value = 1;
			// $('#listRolid').selectpicker('refresh');
			// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
		}
	}
}

function btnViewFacturas() {
	var btnViewFacturas = document.querySelectorAll(".btnViewFacturas");
	btnViewFacturas.forEach(function(btnViewFacturas){
		btnViewFacturas.addEventListener('click', function(){
		var provFactId = this.getAttribute("pv");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Facturas/getFactura/'+provFactId;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var estadoF = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#provNombre").innerHTML = objData.data.Nombre;
					document.querySelector("#provCodigo").innerHTML = objData.data.provFactCodi;
					document.querySelector("#provNumero").innerHTML = objData.data.provNumeFact;
					document.querySelector("#provValor").innerHTML = objData.data.provValoFact;
					document.querySelector("#provFecha").innerHTML = objData.data.fechaRegistro;
                    document.querySelector("#provEstado").innerHTML = estadoF;
					$('#ModalViewFacturas').modal('show');
				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
		});
	});
}


function openModal()
{
	document.querySelector('#idfactura').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nueva factura";
	document.querySelector("#formFacturas").reset();

	$('#modalFacturas').modal('show');
}