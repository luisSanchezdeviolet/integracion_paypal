const btnAgregar = document.getElementById('btnAgregar');
const btnCerrar = document.getElementById('btncerrar');
let tabla;
let detalles =[];
const tbody = document.getElementById('listDetalle');
const btnPay = document.getElementById('btn-pay');
const btnReturnPage = document.getElementById('returnPage');
const btnPaypal = document.getElementById('btnPaypal');


document.addEventListener('DOMContentLoaded', () => {
    $("#page-checkout").hide();

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


btnPay.addEventListener('click', () => {
    if(detalles.length <= 0) {
        Swal.fire({
            title: 'Error!',
            text: 'No hay productos',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        })
    }else {
        $("#page-cart").hide();
        $("#page-checkout").show();
    }
    listarDetallesCheckout();

})

btnReturnPage.addEventListener('click', (e) => {
    e.preventDefault();
    $("#page-checkout").hide();
    $("#page-cart").show();


})

btnPaypal.addEventListener('click', (e) => {
    e.preventDefault();

    let vent_nombre = $("#vent_nom").val();
    let vent_apellido = $("#vent_ape").val();
    let vent_email = $("#vent_email").val();
    let vent_telefono = $("#vent_telf").val();
    let vent_direccion = $("#vent_dire").val();
    let vent_pais = $("#vent_pais").val();
    let vent_depa = $("#vent_depa").val();
    let vent_cp = $("#vent_codpostal").val();


    let vent_total = $("#vent_total").val();

    $.ajax({ 
        url:"../../controller/paypal.php?opciones=pagar",
        method: "POST",
        data:{'detalles':JSON.stringify(detalles), vent_total:vent_total, vent_nom:vent_nombre, vent_ape:vent_apellido, vent_email:vent_email, vent_telf:vent_telefono, vent_dire:vent_direccion, vent_pais:vent_pais, vent_depa:vent_depa, vent_codpostal:vent_cp},
        cache: false,
        dataType: "html",
        success: function(data) {
            window.open(data, '_blank');
        }
    })

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

















/*Checkout* */

function listarDetallesCheckout(){
    $('#listDetalleCheckout').html('');
    var filas = "";
    var det_total = 0;
    var vent_total = 0;

    for(var i=0; i<detalles.length;i++){
        var det_total = detalles[i].det_total = detalles[i].det_cant * detalles[i].prod_precio;
        var filas = filas + "<li>"+ detalles[i].prod_nom + " × " + detalles[i].det_cant + "<span>" + detalles[i].det_total +"</span></li>"

        vent_total = vent_total + det_total;
    }
    console.log(vent_total);

    $('#listDetalleCheckout').html(filas);
    $('#subtotalCheckout').html("USD "+vent_total);
    $('#totalCheckout').html("USD "+vent_total);

    const ventTotal = document.getElementById('vent_total');
    ventTotal.value = vent_total;
}

init();