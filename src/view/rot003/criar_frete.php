<?php
require_once('../template/header.php');
?>

<link rel="stylesheet" href="../../../public/css/criar_frete.css">
<main class="main">
    <div class="content">
        <div class="box">
            <div class="header-box">
                <span>NOVO FRETE</span>
            </div>
            <div class="body-box">
                <div class="data mt-2 ml-2">
                    <span class="icone-obrigatorio">*</span>
                    <label for="data">Data</label>
                    <input type="date" name="data" class="form-control-sm bg-white" />
                </div>

                <div class="carga mt-2">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="carga">Nº Carga:</label>
                    <div class="px-2">
                        <input type="text" name="num-carga" id="num-carga" class="form-control" />
                    </div>
                </div>
                <div class="placa mb-3 mt-1">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="placa">Placa:</label>
                    <div class="px-2">
                        <select name="placa" name="placa" class="form-control">
                            <option value="Selecione">Selecione</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                </div>
                <div class="destino mt-2 ml-2 ">
                    <span class="icone-obrigatorio">*</span>
                    <label for="destino">Destino:</label>
                    <input type="text" name="destino" class="form-control-sm" style="text-transform: uppercase" />
                </div>
                <div class="km mt-2">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="km-inicial">KM1:</label>
                    <input type="text" name="km1" id="km1" class="form-control-sm" />
                    <span class="icone-obrigatorio">*</span>
                    <label for="km-inicial">KM2:</label>
                    <input type="text" name="km2" id="km2" class="form-control-sm" />
                    <span class="icone-obrigatorio">*</span>
                    <label for="km-inicial">Total:</label>
                    <input type="text" name="km-total" id="km-total" class="form-control-sm" />
                </div>
                <div class="peso-bruto mt-2 ml-2">
                    <span class="icone-obrigatorio">*</span>
                    <label for="peso-bruto">Peso Bruto (kg):</label>
                    <input type="text" name="peso-bruto" id="peso-bruto" class="form-control-sm" />
                </div>
                <div class="reentrega mt-2 ml-2">
                    <label for="reentrega">Peso Bruto Reentrega (kg):</label>
                    <input type="text" name="peso-bruto-reentrega" id="peso-bruto-reentrega" class="form-control-sm" />
                </div>
                <div class="nfs-reentrega mt-2 ml-2">
                    <label for="nfs-reentrega">Nº Notas Reentregas:</label>
                    <div class="px-2">
                        <textarea cols="30" rows="1" name="notas-reentrega" class="form-control"></textarea>
                    </div>
                </div>
                <div class="pernoite mt-2 ml-2">
                    <label for="pernoite">Pernoite (R$):</label>
                    <input type="text" name="pernoite" id="pernoite" class="form-control-sm" />
                </div>
                <div class="descargas mt-2 ml-2">
                    <label for="descargas">Descargas (R$):</label>
                    <input type="text" name="descarga" id="descarga" class="form-control-sm" />
                    <input name="arquivo" type="file" />
                </div>
                <div class="pedagio mt-2 ml-2">
                    <label for="pedagio">Pedágio (R$):</label>
                    <input type="text" name="pedagio" id="pedagio" class="form-control-sm" />
                </div>
                <div class="complemento mt-2 ml-2">
                    <label for="complemento">Complementos (R$):</label>
                    <input type="text" name="complementos" id="complementos" class="form-control-sm" />
                </div>
                <div class="observacao mt-2 ml-2">
                    <label for="observacao">Observações:</label>
                    <div class="px-2">
                        <textarea cols="30" rows="1" name="observacao" class="form-control"></textarea>
                    </div>
                </div>
                <div class="buttons-box d-flex justify-content-end mr-2">
                    <button type="submit" class="btn btn-primary btn-sm mt-2" data-toggle="modal" id="btn-modal" data-target="#calcular">Calcular</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="calcular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Conferir valor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="action_003.php" method="post">
                                <div class="modal-body p-2">
                                    <div>
                                        <label>Valor do Frete Tabela R$:</label>
                                        <span id="mostrarValor" name="valor-tabela"></span>
                                    </div>
                                    <div>
                                        <label>Valor do Frete Aceito R$:</label>
                                        <input type="number" name="valor-aceito ">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="criar-frete">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ---------------------------------------------------------------------------------------------- -->


            </div>
            <div class="footer-box">ChargeLog</div>
        </div>
</main>


<script type="text/javascript">
    // <!-- Máscaras dos inputs -->
    $("#num-carga").mask("9999999999999999");
    $("#km1").mask("9999999999999999");
    $("#km2").mask("9999999999999999");
    $("#peso-bruto").mask("999999999.999");
    $("#peso-bruto-reentrega").mask("999999999.999");
    $("#pernoite").mask("999999999.99");
    $("#descarga").mask("999999999.99");
    $("#pedagio").mask("999999999.99");
    $("#descarga").mask("999999999.99");
    $("#complementos").mask("999999999.99");

    //Mostrar resumo do frete antes de inserir na database
    $('#btn-modal').click(function() {
        $('#mostrarValor').text($('#pernoite').val());
    })
</script>



<?php
require_once('../template/footer.php');
?>