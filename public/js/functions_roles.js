
let tableRoles;
let divLoading = document.querySelector("#divLoading");
let rowTable ="";
document.addEventListener('DOMContentLoaded', function() 
{
	tableRoles = $('#tableRoles').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Roles/getRoles",
			"dataSrc":""
		},
		"columns":[
		{"data":"idrol"},
		{"data":"roleNomb"},
		{"data":"roleDesc"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});

  if(document.querySelector("#formRol")){
    let formRol = document.querySelector("#formRol");
	formRol.onsubmit = function(e) {
		e.preventDefault();
		let strNombre = document.querySelector('#txtroleNomb').value;
		let strDescripcion = document.querySelector('#txtroleDesc').value;
		let intStatus = document.querySelector('#listStatus').value;
		if(strNombre == '' || strDescripcion == '' || intStatus == ''){
			swal("Atención", "Todos los campos son obligatorios", "error");
			return false;
		}
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl =  base_url+'/Roles/setRol';
		let formData = new FormData(formRol);
		request.open("POST", ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
			let objData = JSON.parse(request.responseText);
			if(objData.status){
				if(rowTable ==""){
					tableRoles.api().ajax.reload();
				}else{
					htmlStatus = intStatus == 1 ?
                        '<span class="badge badge-succes">Activo</span>':
                        '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent =strNombre;
                        rowTable.cells[2].textContent =strApellido;
                        rowTable.cells[3].textContent =strDescripcion;
                        rowTable.cells[4].innerHTML = htmlStatus;
				}
				$('#ModalRoles').modal("hide");
				formRol.reset();
				swal("Roles de usuario", objData.msg ,"success");
				tableRoles.api().ajax.reload();
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

$('#tableRoles').DataTable();

function openModal(){
	document.querySelector('#idrol').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
	document.querySelector("#formRol").reset();
	$('#ModalRoles').modal('show');
}


	window.addEventListener('load', function(){
		// fntEditRol();
		// fntDelRol();
		// fntPermisos();
	}, false);

	function fntEditRol(idrol){
		document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
		document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
		document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
		document.querySelector('#btnText').innerHTML = "Actualizar";
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl =  base_url+'/Roles/getRol/'+idrol;
		request.open("GET", ajaxUrl,true);
		request.send();
			request.onreadystatechange = function() {
				if(request.readyState == 4 && request.status == 200){
			/// console.log(request.responseText);
				let objData = JSON.parse(request.responseText);
				if(objData.status){
					document.querySelector("#idrol").value = objData.data.idrol;
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
			            $('#ModalRoles').modal('show');
		    	}else{
				      swal("Error", objData.msg , "Error");
			    }
		    }

		}
	}


	function fntDelRol(idrol){
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
				let strData = "idrol="+idrol;
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