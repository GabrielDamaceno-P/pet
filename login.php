<?php
session_start();
include 'banco.php';
class UserAuthenticator{
    private $conexao;

    public function __construct($conexao){
        $this=>conexao = $conexao;
    }
    public function authenticate ($username, $password){
        $stmt = $this->conexao->prepare("SELECT usuario_id, senha FROM usuarios WHERE nome =?");
        if(!$stmt){
            die("Erro no prepare (authenticate):". $this->conexao->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result && $result->num_rows > 0){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user["senha"])){
                return $user["usuario_id"];
            }
        }
        return false;
    }
    public function userExists($username){
        $stmt = $this->conexao->prepare("SELECT usuario_id FROM usuarios WHERE nome = ?");
        if(!$stmt){
            die("Erro no prepare (userExits):".$this->conexao->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result && $result->num_rows > 0;
    }
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $nome = $_POST["nome"] ?? '';
    $senha = $_POST["senha"] ?? '';
}
?>