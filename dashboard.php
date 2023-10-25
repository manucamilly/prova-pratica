<?php
session_start();

if(!isset($_SESSION['nome_usuario'])){
    header("Location: index.php");
    exit();
}

$email_usuario = $_SESSION['nome_usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Painel de controle</h1>
    <p>Seja bem vindo(a)<?php echo $nome_usuario;?> </p>

    <a href="logout.php">Sair</a>

</body>
</html>