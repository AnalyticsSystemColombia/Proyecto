
var tableModulos;

document.addEventListener('DOMContentLoaded', function() 
{
	tableModulos = $('#tableModulos').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Modulos/getModulos",
			"dataSrc":""
		},
		"columns":[
		{"data":"idmodulo"},
		{"data":"moduTitu"},
		{"data":"moduDesc"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});


	var formModulo = document.querySelector("#formModulo");
	formModulo.onsubmit = function(e) 
	{
		e.preventDefault();
		var intIdRol = document.querySelector('#idmodulo').value;
		var strNombre = document.querySelector('#txtmoduTitu').value;
		var strDescripcion = document.querySelector('#txtmoduDesc').value;
		var intStatus = document.querySelector('#listStatus').value;
		if(strNombre == '' || strDescripcion == '' || intStatus == '')
		{
			swal("Atención", "Todos los campos son obligatorios", "error");
			return false;
		}
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl =  base_url+'/Modulos/setModulo';
		var formData = new FormData(formModulo);
		request.open("POST", ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function()
		 {
			
			if(request.readyState == 4 && request.status == 200)
			{
			var objData = JSON.parse(request.responseText);
			
			if(objData.status)
			{
				$('#ModalModulos').modal("hide");
				formRol.reset();
				swal("Roles de usuario", objData.msg ,"success");
				tableModulos.api().ajax.reload();
			}else{
				swal("Error", objData.msg , "Error");
			    }
			}
			
		}
	}

});

$('#tableModulos').DataTable();

	function openModal()
	{
		document.querySelector('#idmodulo').value="";
		document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
		document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
		document.querySelector('#btnText').innerHTML = "Guardar";
		document.querySelector('#titleModal').innerHTML = "Nuevo Módulo";
		document.querySelector("#formModulo").reset();

		$('#ModalModulos').modal('show');
	}


	window.addEventListener('load', function()
	{
		// fntEditRol();
		// fntDelRol();
		// fntPermisos();
	}, false);

	function fntEditModulo(idmodulo)
	{

		document.querySelector('#titleModal').innerHTML = "Actualizar Modulo";
		document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
		document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
		document.querySelector('#btnText').innerHTML = "Actualizar";

		var idmodulo = idmodulo;
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl =  base_url+'/Modulos/getModulo/'+idmodulo;
		request.open("GET", ajaxUrl,true);
		request.send();

			request.onreadystatechange = function() 
			{
			
				if(request.readyState == 4 && request.status == 200)
				{
			/// console.log(request.responseText);
				var objData = JSON.parse(request.responseText);
				if(objData.status)
				{
					document.querySelector("#idmodulo").value = objData.data.idmodulo;
					document.querySelector("#txtmoduTitu").value = objData.data.moduTitu;
					document.querySelector("#txtmoduDesc").value = objData.data.moduDesc;
					
				
				if(objData.data.status == 1)
				{
					var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
				}else{

					var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
				}
				var htmlSelect = `${optionSelect}
								<option value="1">activo</option>
								<option value="2">Inactivo</option>
								`;
			            document.querySelector("#listStatus").innerHTML = htmlSelect;
			            $('#ModalModulos').modal('show');
		    	}else{
				      swal("Error", objData.msg , "Error");
			    }
		    }

		}
	}


	   function fntDelRol(idmodulo)
		{
		
		var idmodulo = idmodulo;
			
		swal({
			title: "Eliminar módulo",
			text: "¡Quieres eliminar realmente el módulo",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Si eliminar",
			cancelButtonText: "No cancelar",
			closeOnConfirm: false,
			closeOnCancel: true
		}, function(isConfirm)
		{
			if(isConfirm)
			{
				var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
				var ajaxUrl = base_url+'/Modulos/delModulo/';
				var strData = "idmodulo="+idmodulo;
				request.open("POST", ajaxUrl, true);
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				request.sent(strData);
				request.onreadystatechange = function()
				{
					if(request.readyState == 4 && request.status == 200)
					{
						var objData = JSON.parse(responseText);
						if(objData.status)
						{
							swal("Eliminar", objData.msg , "success");
							tableRoles.api().ajax.reload(function(){
								fntEditModulo();
								fntDelModulo();
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
		
	
