<?php

class Pet{
    private $conn;
    private $usuario_id;
    public $nome;
    public $sexo;
    public $raca;
    public $porte;
    public $foto;
    public function _construct($conn, $nome, $sexo, $raca, $porte, $usuario_id,$foto= null){
        $this->conn = $conn;
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->porte = $porte;
        $this->usuario_id = $usuario_id; 
        $this->raca = $raca;
        $this->foto = $foto;
    }
    public function salvar(){
        $sql = "INSERT INTO pet(nome, sexo, porte, raca, foto, usuario_id) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute([$this->nome, $this->sexo, $this->porte, $this->raca, $this->foto, $this->usuario-id])){
            $this->usuario_id =$this->conn->lastInsertId();
            return $this->usuario_id;
        }else{
            throw new Exception("Erro em salvar pet. ");
        }
    }
}

?>