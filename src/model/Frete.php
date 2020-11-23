<?php

class Frete {

    public $data;
    public $num_carga;
    public $placa;
    public $destino;
    public $km1;
    public $km2;
    public $km_total;
    public $peso_bruto;
    public $num_notas_fiscais;
    public $valor_pernoite;
    public $descargas;
    public $imagem;
    public $complementos ;
    public $observacao;
    public $status_frete ;
    

     function __construct($data, $num_carga, $placa, $destino, $km1, $km2, $km_total, $peso_bruto)
     {
         $this->data = $data;
         $this->num_carga = $num_carga;
         $this->placa = $placa;
         $this->destino = $destino;
         $this->km1 = $km1;
         $this->km2 = $km2;
         $this->km_total = $km_total;
         $this->peso_bruto = $peso_bruto;
     }

}