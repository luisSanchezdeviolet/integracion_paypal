const btnAgregar = document.getElementById('btnAgregar');
const btnCerrar = document.getElementById('btncerrar');
let tabla;
let detalles =[];
const tbody = document.getElementById('listDetalle');


document.addEventListener('DOMContentLoaded', () => {
    $("#pnlcheckout").hide();

    tabla=$('#lista_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/producto.php?opciones=listar',
            type : "post",
            dataType : "json",
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
})



function init() {

}

btnAgregar.addEventListener('click', () => {
    $('#mymodal').modal('show');
})

btnCerrar.addEventListener('click', () => {
    $('#mymodal').modal('hide');
})


function agregar(prod_id) {
    $.ajax({ 
        url:"../../controller/producto.php?opciones=mostrar",
        method: "POST",
        data:{prod_id:prod_id},
        cache: false,
        dataType: "json",
        success: function(data) {
            let obj = {
                det_cant: 1,
                prod_id:prod_id,
                cat_id:data.cat_id,
                prod_nom:data.prod_nom,
                prod_moneda:data.prod_moneda,
                prod_precio:data.prod_precio,
                det_total:0
            };
            detalles.push(obj);
            listarDetalles();
            $('#mymodal').modal('hide');
            console.log(detalles)
        }
    })
}


function listarDetalles(){
    $('#listDetalle').html('');
    var filas = "";
    var det_total = 0;
    var vent_total = 0;

    for(var i=0; i<detalles.length;i++){
        var det_total = detalles[i].det_total = detalles[i].det_cant * detalles[i].prod_precio;
        var filas = filas +
        "<tr>"+
            "<td>"+
                "<a href='#'><img src='../../assets/images/pro3/2.jpg' alt=''></a>"+
            "</td>"+
            "<td name='prod_nom[]'>"+
                "<a href='#'>"+detalles[i].prod_nom+"</a>"+
            "</td>"+
            "<td name='prod_precio[]' id='prod_precio[]'>"+
                "<h2>"+detalles[i].prod_precio+"</h2>"+
            "</td>"+
            "<td>"+
                "<div class='qty-box'>"+
                    "<div class='input-group'>"+
                        "<input type='number' name='quantity' name='det_cant[]' id='det_cant[]' class='form-control input-number' onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidad(event, this, "+(i)+");' value='"+detalles[i].det_cant+"'>"+
                    "</div>"+
                "</div>"+
            "</td>"+
            "<td><a href='#' onClick='quitar(event, "+(i)+");' class='icon'><i class='ti-close'></i></a></td>"+
            "<td>"+
                "<h2 class='td-color' name='det_total[]' id='det_total"+i+"'>"+detalles[i].prod_moneda+" "+det_total+"</h2>"+
            "</td>"+
        "</tr>";

        vent_total = vent_total + det_total;
    }

    $('#listDetalle').html(filas);
    $('#vent_total_cart').html("USD "+vent_total);
}


function quitar(event, idx) {
    event.preventDefault();
    detalles.splice(idx,1);
    listarDetalles();
}


function setCantidad(event, obj, idx) {
    event.preventDefault();
    detalles[idx].det_cant = parseInt(obj.value);
    recalcular(idx);
}



function recalcular(idx) {
    let det_total = detalles[idx].det_total = detalles[idx].det_cant * detalles[idx].prod_precio;
    $('#det_total'+idx).html("MXN "+det_total);
    calcularTotales();
}

function calcularTotales() {
    let vent_total = 0;
    for(let i =0; i<detalles.length;i++) {
        vent_total  = vent_total + (detalles[i].det_cant * detalles[i].prod_precio)
        
    }

    $('#vent_total_cart').html("MXN "+vent_total);


    
}

init();