<?php 

include 'sessao.php';
include 'conexao2.php';

if(id){header("Location: login.html");exit;}

$stmt = $conexao->prepare("SELECT nome, foto, raca, sexo, porte FROM pets WHERE usuario_id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$pets = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pets</title>
</head>
<body>
    <h1>Olá, seja bem vindo <?=htmlspecialchars($nome)?>!</h1>
    <a href="logout.php" >Sair</a>

    <h2>Seus Pets:</h2>
    <?php if($pets): ?>
        <?php foreach ($pets as $p): ?>
            <div>
              <img src="<?= htmlspecialchars($p['foto']?: 'img/pet_padrao.jpg')?>" alt= "<?=htmlspecialchars($p['nome'])?>">
              <h2><?= htmlspecialchars($p['nome'])?></h2>
              <p>Raça: <?= htmlspecialchars($p['raca'])?><br>
                 Sexo: <?= htmlspecialchars($p['sexo'])?><br>
                 Porte: <?= htmlspecialchars($p['porte'])?></p>
            </div>
        <hr>

    <?php endforeach; ?>
<?php else: ?>
    <p>Você ainda não cadastrou nenhum pet. </p>
<?php endif; ?>

              
</body>
</html>