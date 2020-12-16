<?php

class Veiculo
{

    public $placa;
    public $categoria;
    public $transportadora;

    function __construct($placa, $categoria, $transportadora)
    {
        $this->placa = $placa;
        $this->categoria = $categoria;
        $this->transportadora = $transportadora;
    }
}
