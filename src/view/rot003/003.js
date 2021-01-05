// <!-- Máscaras dos inputs -->
$("#numCarga").mask("9999999999999999");
$("#km1").mask("9999999999999999");
$("#km2").mask("9999999999999999");
$("#pesoBruto").mask("999999999.999");
$("#pesoBrutoReentrega").mask("999999999.999");
$("#pernoite").mask("999999999.99");
$("#descarga").mask("999999999.99");
$("#pedagio").mask("999999999.99");
$("#descarga").mask("999999999.99");
$("#complementos").mask("999999999.99");


//Calcular Frete
$(document).ready(function () {

    $('#calc').click(function () {

        var data = $('#data').val()
        var numCarga = $('#numCarga').val()
        var placa = $('#placa').val()
        var destino = $('#destino').val()
        var km1 = $('#km1').val()
        var km2 = $('#km2').val()
        var kmTotal = $('#kmTotal').val()
        var pesoBruto = $('#pesoBruto').val()
        var pesoBrutoReentrega = $('#pesoBrutoReentrega').val()
        var notasReentrega = $('#notasReentrega').val()
        var pernoite = $('#pernoite').val()
        var descarga = $('#descarga').val()
        var pedagio = $('#pedagio').val()
        var complementos = $('#complementos').val()
        var observacao = $('#observacao').val()

        $.ajax({
            url: 'action_003.php',
            method: 'POST',
            dataType: 'json',
            data: {
                data: data,
                numCarga: numCarga,
                placa: placa,
                destino: destino,
                km1: km1,
                km2: km2,
                kmTotal: kmTotal,
                pesoBruto: pesoBruto,
                pesoBrutoReentrega: pesoBrutoReentrega,
                notasReentrega: notasReentrega,
                pernoite: pernoite,
                descarga: descarga,
                pedagio: pedagio,
                complementos: complementos,
                observacao: observacao
            }
        }).done(function (result) {

            $('#valorTabela').html(result)
            $('#valorAceito').val(pernoite);
            // var resposta = JSON.parse(JSON.stringify(data));
            // console.log(resposta);

            console.log(result)
            // for (var i = 0; i < result.length; i++) {
            //     console.log(result)
            // }

            $('#calcular').modal('show')

        });
    })

});
