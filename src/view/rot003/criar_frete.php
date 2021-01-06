<?php
session_start();

require_once('../template/header.php');
require_once(dirname(__FILE__, 3) . '/db/conexao.php');

$idUsuario = $_SESSION['idUsuario'];
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
                    <input type="date" id="data" class="form-control-sm bg-white" />
                </div>

                <div class="carga mt-2">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="carga">Nº Carga:</label>
                    <div class="px-2">
                        <input type="text" id="numCarga" name="numCarga" class="form-control" autocomplete="off" />
                    </div>
                </div>
                <div class="placa mb-3 mt-1">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="placa">Placa:</label>
                    <div class="px-2">
                        <select id="placa" name="placa" class="form-control">
                            <option value="selecione">Selecione a placa</option>

                            <?php
                            //Buscando placas cadastradas no banco de dados 
                            $sql = "SELECT * FROM veiculo WHERE id_login = '$idUsuario' ORDER BY placa";
                            $conn = novaConexao();
                            $resultado = $conn->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_array()) {
                                    $placa = $row['placa'];
                                    $id_placa = $row['id'];
                                    echo "<option value='$id_placa|$placa'>$placa</option>";
                                }
                            } elseif ($conexao->error) {
                                echo "Erro: " . $conn->error;
                            }
                            $conn->close();

                            ?>
                        </select>
                    </div>
                </div>
                <div class="destino mt-2 px-2">
                    <span class="icone-obrigatorio">*</span>
                    <label for="destino">Destino:</label>
                    <select name="destino" id="destino" class="form-control">
                        <option value="selecione">Destino mais longe</option>

                        <?php
                           //Buscando placas cadastradas no banco de dados 
                            $sql = "SELECT * FROM km_destino ORDER BY cidade";
                            $conn = novaConexao();
                            $resultado = $conn->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_array()) {
                                    $cidade = $row['cidade'];
                                    echo "<option value='$id|$cidade'>$cidade</option>";
                                }
                            } elseif ($conexao->error) {
                                echo "Erro: " . $conn->error;
                            }
                            $conn->close();
                        ?>

                    </select>
                    
                </div>
                <div class="km mt-2">
                    <span class="icone-obrigatorio ml-2">*</span>
                    <label for="km1">KM1:</label>
                    <input type="text" id="km1" class="form-control-sm" autocomplete="off" />
                    <span class="icone-obrigatorio">*</span>
                    <label for="km2">KM2:</label>
                    <input type="text" id="km2" class="form-control-sm" autocomplete="off" />
                    <span class="icone-obrigatorio">*</span>
                    <label for="kmTotal">Total:</label>
                    <input type="text" id="kmTotal" class="form-control-sm" autocomplete="off" />
                </div>
                <div class="peso-bruto mt-2 ml-2">
                    <span class="icone-obrigatorio">*</span>
                    <label for="peso-bruto">Peso Bruto (kg):</label>
                    <input type="text" id="pesoBruto" class="form-control-sm" autocomplete="off" />
                </div>
                <div class="reentrega mt-2 ml-2">
                    <label for="reentrega">Peso Bruto Reentrega (kg):</label>
                    <input type="text" id="pesoBrutoReentrega" class="form-control-sm" autocomplete="off" />
                </div>
                <div class="nfs-reentrega mt-2 ml-2">
                    <label for="nfs-reentrega">Nº Notas Reentregas:</label>
                    <div class="px-2">
                        <textarea cols="30" rows="1" id="notasReentrega" class="form-control"></textarea>
                    </div>
                </div>
                <div class="pernoite mt-2 ml-2">
                    <label for="pernoite">Pernoite (R$):</label>
                    <input type="text" id="pernoite" class="form-control-sm" autocomplete="off" />
                </div>
                <div class="descargas mt-2 ml-2">
                    <label for="descargas">Descargas (R$):</label>
                    <input type="text" id="descarga" class="form-control-sm" autocomplete="off" />
                </div>
                <div class="complemento mt-2 ml-2">
                    <label for="complemento">Complementos (R$):</label>
                    <input type="text" id="complementos" class="form-control-sm" autocomplete="off" />
                </div>
                <div class="observacao mt-2 ml-2">
                    <label for="observacao">Observações:</label>
                    <div class="px-2">
                        <textarea cols="30" rows="1" id="observacao" class="form-control" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="buttons-box d-flex justify-content-end mr-2">
                    <button class="btn btn-primary btn-sm mt-2" id="calc">Calcular</button>
                </div>

                <!-- INICIO MODAL-->
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
                                        <span id="valorTabela" name="valorTabela"></span>
                                    </div>
                                    <div>
                                        <label>Valor do Frete Aceito R$:</label>
                                        <input type="text" id="valorAceito" name="valorAceito">
                                    </div>
                                    <div id="msg"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="criaFrete">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- FIM MODAL -->

            </div>
            <div class="footer-box">ChargeLog</div>
        </div>
</main>

<script src="003.js"></script>

<?php
require_once('../template/footer.php');
?>