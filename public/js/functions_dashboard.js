// function fntViewUsuario(){
//     let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     let ajaxUrl = base_url+'/Dashboard/consultaUsuariosDashboard';
//     request.open("GET",ajaxUrl,true);
//     request.send();
//     request.onreadystatechange = function(){
//         if(request.readyState == 4 && request.status == 200)
//         {
//             $.ajax({
//                 type: 'GET',
//                 "url": " "+base_url+"/Dahsboard/consultaUsuariosDashboard",
//                 dataType: 'html',
//                 success: function (data) {
//                     console.log(data);
//                     $('h3').html(data);
//                 }
//             });
//         }
//     }
// }

function fntViewUsuario(){
    $('.inner').click(function(){
        e.preventDefault();
        $.ajax({
            type: 'GET',
            "url": " "+base_url+"/Dahsboard/consultaUsuariosDashboard",
                "columns":[
                    {"data":"total"}
                   
                ],
        });
    });
    }