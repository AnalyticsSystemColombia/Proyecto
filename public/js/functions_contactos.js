let tableContactos;
tableContactos = $('#tableContactos').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/contactos/getContactos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"nombre"},
            {"data":"email"},
            {"data":"fecha"},
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
        "order":[[0,"desc"]]  
    });


    function fntViewInfo(id){
        let request = (window.XMLHttpRequest) ? 
                        new XMLHttpRequest() : 
                        new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Contactos/getMensaje/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                $('#ModalViewMensaje').modal('show');
                // if(objData.status)
                // {
                //     document.querySelector("#celId").innerHTML = objProducto.codigo;
                //     document.querySelector("#celNombre").innerHTML = objProducto.prodNomb;
                //     document.querySelector("#celEmail").innerHTML = objProducto.prodPrec;
                //     document.querySelector("#celFecha").innerHTML = objProducto.prodStock;
                //     document.querySelector("#celMensaje").innerHTML = objProducto.cateNomb;
                //     document.querySelector("#celStatus").innerHTML = estadoProducto;
                //     document.querySelector("#celDescripcion").innerHTML = objProducto.descripcion;
                //     $('#ModalViewMensaje').modal('show');
    
                // }else{
                //     swal("Error", objData.msg , "error");
                // }
            }
        } 
    }