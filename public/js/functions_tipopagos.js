
let tableTipopagos;
let divLoading = document.querySelector("#divLoading");
let rowTable ="";
document.addEventListener('DOMContentLoaded', function() 
{
	tableTipopagos = $('#tableTipopagos').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/TipoPagos/getTipoPagos",
			"dataSrc":""
		},
		"columns":[
		{"data":"idtipopago"},
		{"data":"tipopago"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});

  if(document.querySelector("#formTipopago")){
    let formTipopago = document.querySelector("#formTipopago");
	formTipopago.onsubmit = function(e) {
		e.preventDefault();
		let strTipopagp = document.querySelector('#txtroleNomb').value;
		let intStatus = document.querySelector('#listStatus').value;
		if(strTipopagp == ''  || intStatus == ''){
			swal("Atención", "Todos los campos son obligatorios", "error");
			return false;
		}
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl =  base_url+'/TipoPagos/setTipoPagos';
		let formData = new FormData(formTipopago);
		request.open("POST", ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
			let objData = JSON.parse(request.responseText);
			if(objData.status){
				if(rowTable ==""){
					tableTipopagos.api().ajax.reload();
				}else{
					htmlStatus = intStatus == 1 ?
                        '<span class="badge badge-succes">Activo</span>':
                        '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[0].textContent =strTipopagp;
                        rowTable.cells[1].innerHTML = htmlStatus;
				}
				$('#ModalTipopagos').modal("hide");
				formTipopago.reset();
				swal("Tipo de pago", objData.msg ,"success");
				tableTipopagos.api().ajax.reload();
			}else{
				swal("Error", objData.msg , "Error");
				}
			}
			divLoading.style.display = "none";
            return false;
		}
	}
  }
});

$('#tableTipopagos').DataTable();

function openModal(){
	document.querySelector('#idtipopago').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Tipo de pago";
	document.querySelector("#formTipopago").reset();
	$('#ModalTipopagos').modal('show');
}


	window.addEventListener('load', function(){
		// fntEditRol();
		// fntDelRol();
		// fntPermisos();
	}, false);

	function fntEditRol(idtipopago){
		document.querySelector('#titleModal').innerHTML = "Actualizar Tipo pago";
		document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
		document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
		document.querySelector('#btnText').innerHTML = "Actualizar";
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl =  base_url+'/Roles/getRol/'+idtipopago;
		request.open("GET", ajaxUrl,true);
		request.send();
			request.onreadystatechange = function() {
				if(request.readyState == 4 && request.status == 200){
			/// console.log(request.responseText);
				let objData = JSON.parse(request.responseText);
				if(objData.status){
					document.querySelector("#idtipopago").value = objData.data.idtipopago;
					document.querySelector("#txtroleNomb").value = objData.data.roleNomb;
					document.querySelector("#txtroleDesc").value = objData.data.roleDesc;
				if(objData.data.status == 1){
					let optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
				}else{
					let optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
				}
				let htmlSelect = `${optionSelect}
								<option value="1">activo</option>
								<option value="2">Inactivo</option>
								`;
			            document.querySelector("#listStatus").innerHTML = htmlSelect;
			            $('#ModalTipopagos').modal('show');
		    	}else{
				      swal("Error", objData.msg , "Error");
			    }
		    }

		}
	}


	function fntDelRol(idtipopago){
		swal({
			title: "Eliminar rol",
			text: "¡Quieres eliminar realmente el rol",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Si eliminar",
			cancelButtonText: "No cancelar",
			closeOnConfirm: false,
			closeOnCancel: true
		}, function(isConfirm){
			if(isConfirm){
				let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
				let ajaxUrl = base_url+'/Roles/delRol/';
				let strData = "idtipopago="+idtipopago;
				request.open("POST", ajaxUrl, true);
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				request.sent(strData);
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						let objData = JSON.parse(responseText);
						if(objData.status){
							swal("Eliminar", objData.msg , "success");
							tableRoles.api().ajax.reload(function(){
								fntEditRol();
								fntDelRol();
								fntPermisos();
							});
						}else{
							swal("Atencion", objData.msg , "error");
						}
					}
				}
			}
		});
	}
	
		
	function fntPermisos(idrol){
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url+'/Permisos/getPermisosRol/'+idrol;
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
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url+'/Permisos/setPermisos'; 
		let formElement = document.querySelector("#formPermisos");
		let formData = new FormData(formElement);
		request.open("POST",ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				let objData = JSON.parse(request.responseText);
				if(objData.status){
					swal("Permisos de usuario", objData.msg ,"success");
				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
	}