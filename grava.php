<?php

$host  = "localhost";
$banco = "reencontro_ex_alunos";
$usuario = "root";
$senha = "";

// capturando os dados que o usuário digitou
$nome     = $_REQUEST["txtnome"];
$email    = $_REQUEST["txtemail"];
$mensagem = $_REQUEST["txtmensagem"];

$pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);

$sql = "INSERT INTO faleconosco (nome, email, mensagem) VALUES (:nome, :email, :mensagem)";

$stm = $pdo->prepare($sql);
$stm->bindValue(':nome', $nome);
$stm->bindValue(':email', $email);
$stm->bindValue(':mensagem', $mensagem);

$res = $stm->execute();
if ($res) {
    echo "Dados gravados com sucesso!";
}else{
    echo "Erro ao tentar gravar os dados!";
}

echo "<br><br>";
echo "<a href='site-escola-main.php'>Voltar</a>";
?>