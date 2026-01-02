<?php

//classe
class Dashboard {
    public $data_inicio;
    public $data_fim;
    public $numeroVendas;
    public $totalVendas;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }
}

//classe de conexão bd
class Conexao {
    private $host = 'localhost';
    private $dbname = 'dashboard';
    private $user = 'root';
    private $pass = '';

    public function conectar() {
        try {
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            $conexao->exec('set charset utf8');
            return $conexao;
        } catch (PDOExeption $e) {
            echo '<p>'.$e->getMessege().'</p>';
        }
    }
}

class Bd {
    private $conexao;
    private $dashboard;

    public dunction __construct(Conexao $conexao, Dashboard $dashboard) {
        $this->conexao = $conexao->conectar();
        $this->dashboard = $dashboard;
    }
}

$dashboard = new Dashboard();
$conexao = new Conexao();

$bd = new Bd($conexao, $dashboard);


?>