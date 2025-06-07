function init() {

}

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const ventId = urlParams.get('vent_id');
    const paymentId = urlParams.get('paymentId');
    const token = urlParams.get('token');
    const PayerID = urlParams.get('PayerID');

    $.post("../../controller/venta.php?opciones=mostrar", {vent_id:ventId}, function(data) {
        data = JSON.parse(data);
        $('#vent_nom_ape').html(data.vent_nom + ' ' + data.vent_ape);
        $('#vent_dire').html(data.vent_dire);
        $('#vent_pais').html(data.vent_pais);
        $('#vent_postal').html(data.vent_codpostal);
        $('#vent_email').html(data.vent_email);
        $('#vent_total').html("$ "+data.vent_total);
        $('#vent_depa').html(data.vent_depa);
    })

    $.post("../../controller/venta.php?opciones=listar", {vent_id:ventId}, function(data) {
        $('#listdetalle').html(data);
    })

    $.ajax({
        url: "../../controller/paypal.php?opciones=validar",
        method: "POST",
        data: {paymentId: paymentId, token: token, PayerID: PayerID},
        success: function(data) {
            actualizar(ventId, paymentId, token, PayerID, data);
        }
    })
})


function actualizar(vent_id, paymentId, token, PayerID, json_data) {
    $.ajax({
        url: "../../controller/venta.php?opciones=update",
        method: "POST",
        data: {vent_id: vent_id, paymentId: paymentId, PayerID: PayerID, json_data:json_data},
        success: function(data) {

        }
    })
}


init();