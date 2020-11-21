<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="../../public/css/criar_frete.css">
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
                    <input type="date" class="form-control-sm bg-white" />
                </div>

                <div class="carga mt-2">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="carga">Nº Carga:</label>
                    <div class="px-2">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="placa mb-3 mt-1">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="placa">Placa:</label>
                    <div class="px-2">
                        <select name="placa" id="placa" class="form-control">
                            <option value="Selecione">Selecione</option>
                        </select>
                    </div>
                </div>
                <div class="destino mt-2 ml-2 ">
                    <span class="icone-obrigatorio">*</span>
                    <label for="destino">Destino:</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="km mt-2">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="km-inicial">KM1:</label>
                    <input type="text" class="form-control-sm" />
                    <span class="icone-obrigatorio">*</span>
                    <label for="km-inicial">KM2:</label>
                    <input type="text" class="form-control-sm" />
                    <span class="icone-obrigatorio">*</span>
                    <label for="km-inicial">Total:</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="peso-bruto mt-2 ml-2">
                    <span class="icone-obrigatorio">*</span>
                    <label for="peso-bruto">Peso Bruto (kg):</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="reentrega mt-2 ml-2">
                    <label for="reentrega">Peso Bruto Reentrega (kg):</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="nfs-reentrega mt-2 ml-2">
                    <label for="nfs-reentrega">Nº Notas Reentregas:</label>
                    <div class="px-2">
                        <textarea cols="30" rows="1" class="form-control"></textarea>
                    </div>
                </div>
                <div class="pernoite mt-2 ml-2">
                    <label for="pernoite">Pernoite:</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="descargas mt-2 ml-2">
                    <label for="descargas">Descargas:</label>
                    <input type="text" class="form-control-sm" />
                    <input name="arquivo" type="file" />
                </div>
                <div class="pedagio mt-2 ml-2">
                    <label for="pedagio">Pedágio:</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="complemento mt-2 ml-2">
                    <label for="complemento">Complementos:</label>
                    <input type="text" class="form-control-sm" />
                </div>
                <div class="observacao mt-2 ml-2">
                    <label for="observacao">Observações:</label>
                    <div class="px-2">
                        <textarea cols="30" rows="1" class="form-control"></textarea>
                    </div>
                </div>
                <div class="buttons-box d-flex justify-content-end mr-2">
                    <button class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#calcular">Calcular</button>

                    <!-- //////////  INICIO MODAL  ///////// -->
                    <div class="modal fade" id="calcular">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmar Frete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="box-bodal">
                                        <div class="frete-tabela">
                                            <label>Frete Tabela: R$1000,00</label>
                                        </div>
                                        <div class="frete-aceito">
                                            <span class="icone-obrigatorio">*</span>
                                            <label>Frete Aceito:</label>
                                            <input type="text" class="form-control-sm">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                    <form action="#" method="post">
                                        <input type="hidden" name="id" value="">
                                        <a type="submit" href="fretes_em_aberto.html" class="btn btn-primary" name="">OK</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //////////  FIM MODAL  ///////// -->
                    
                </div>
                <div class="footer-box">ChargeLog</div>
            </div>
        </div>
</main>

<?php
require_once('template/footer.php');
?>