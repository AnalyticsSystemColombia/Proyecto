////cargar la tabla de la categoria
var tableVentas;

document.addEventListener('DOMContentLoaded',function(){
	////var formUsuarios = document.querySelector("formUsuarios");
	tableVentas = $('#tableVentas').DataTable({	
            'createdRow':function(row,data,index){
                if(data['cantidad'] <= 100000){
                    $('td', row).eq(4).css({
                        'background-color':'#008f39'
                    })
                }
            },
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.22/api/sum().js",
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Ventas/getVentas",
			"dataSrc":""
		},
		"columns":[
		{"data":"prodNomb"}, 
		{"data":"prodStock"},
		{"data":"cantidad" },
		{"data":"prodPrec",
		render:function(data){
			return '$'+data;
		}},
		{"data":"monto",
		render:function(data){
			return '$'+data;
		},
	    },
		{"data":"fecha"},
        {"data":"options"},
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]],
	});
	
	
	////insertar productos
	var formPedidos = document.querySelector("#formPedidos");
	formPedidos.onsubmit = function(e) {
	  e.preventDefault();
	  //document.querySelector("#txtprodNomb").innerHTML = objData.data.prodNomb;
	  var intCant = document.querySelector('#txtCant').value;
	  var intprodNomb = document.querySelector('#txtprodNomb').value;
	  var intprodPrec = document.querySelector('#txtprodPrec').value;
	  if( intCant == '')
	  {
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Pedidos/setPedidos';
		var formData = new FormData(formPedidos);
		request.open("POST", ajaxUrl, true);
		request.send(formData);
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					$('#ModalPedido').modal('hide');
					formElement.reset();
					swal("Pedidos", objData.msg ,"success");
					tablepedido.api().ajax.reload(function(){

					});
				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
	}
	
}, false);

window.addEventListener('load', function(){
	fntSelectCategoria();
	fntViewProductos();
	fntCarritoProductos();
}, false);

///funcion para cargar select categorias

function fntSelectCategoria(){
	var ajaxUrl = base_url+'/Categorias/getSelectCategorias';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function() {	
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#listProd').innerHTML = request.responseText;
			document.querySelector('#listProd').value = 1;
			// $('#listRolid').selectpicker('refresh');
			// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
		}
	}
}


///funcion para cargar select  carrito

function fntCarritoProductos() {
	var btnCarrito = document.querySelectorAll(".btnCarrito");
	btnCarrito.forEach(function(btnCarrito){
	btnCarrito.addEventListener('click', function(){

	var prodCodi = this.getAttribute("pr");
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
	var ajaxUrl = base_url+'/Pedidos/getAgregar/'+prodCodi;
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
	if(request.status == 200){
		var objData = JSON.parse(request.responseText);
		if(objData.status){
		
		document.querySelector("#txtprodNomb").innerHTML = objData.data.prodNomb;
		document.querySelector("#txtprodPrec").innerHTML = objData.data.prodPrec;
		document.querySelector("#txtprodStock").innerHTML = objData.data.prodStock;
		
		$('#ModalAgregar').modal('show');

	}else{
		swal("Error", objData.msg , "error");
			}
		}
				
	}
	
		});
	});
}

//////funcion para ver producto ok
function fntViewProductos() {
	var btnViewProductos = document.querySelectorAll(".btnViewProductos");
	btnViewProductos.forEach(function(btnViewProductos){
		btnViewProductos.addEventListener('click', function(){
		var prodCodi = this.getAttribute("pr");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Pedidos/getProducto/'+prodCodi;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var estadoUsuario = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#celIdentificacion").innerHTML = objData.data.cateNomb;
					document.querySelector("#celNombres").innerHTML = objData.data.prodNomb;
					document.querySelector("#celApellidos").innerHTML = objData.data.prodPrec;
					document.querySelector("#celTelefono").innerHTML = objData.data.prodMode;
					document.querySelector("#celEmail").innerHTML = objData.data.prodStock;
					document.querySelector("#celEstado").innerHTML = estadoUsuario;
					document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
					$('#ModalViewProductos').modal('show');

				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
		});
	});

}
  function openModal(){
	document.querySelector('#idproductos').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Agregar al carrito";
	document.querySelector("#formPedidos").reset();

	$('#ModalPedidos').modal('show');
}



