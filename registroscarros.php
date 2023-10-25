<?php 
require_once('classes/Crud.php');
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'create':
            $crud->create($_POST);
            $rows = $crud->read();
            break;
        case 'read':
            $rows = $crud->read();
            break;
        case 'update':
            if(isset($_POST['id_carro'])){
                $crud->update($_POST);
            }
            $rows = $crud->read();
            break;

        case 'delete':
            $crud->delete($_GET['id_carro']);
            $rows = $crud->read();
            break;

        default:
            $rows = $crud->read();
            break;
    }
} else {
    $rows = $crud->read();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="color: #ff69b4;">Registros de Carros</title>
    <style>
        body {
            background-color: #fff5f5; 
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #ff69b4; 
            text-align: center;
        }
        form {
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #ff69b4; 
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ff69b4; 
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #ff69b4; 
            color: #fff; 
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff4f94; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ff69b4; 
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ff69b4;
            color: #fff; 
        }
        tr:nth-child(even) {
            background-color: #fff5f5; 
        }
        tr:nth-child(odd) {
            background-color: #fff; 
        }
        a {
            text-decoration: none;
            color: #ff69b4; 
            margin-right: 10px;
        }
        a.delete {
            color: #ff0000; 
        }
    </style>
</head>
<body>

<script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();
    });
</script>

<?php

if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id_carro'])){
    $id = $_GET['id_carro'];
    $result = $crud->readOne($id);

    if(!$result){
        echo "Registro não encontrado.";
        exit();
    }
    $marca = $result['marca'];
    $modelo = $result['modelo'];
    $ano_de_fabricacao = $result['ano_de_fabricacao'];
    $cor = $result['cor'];
    $tipo_de_combustivel = $result['tipo_de_combustivel'];
    $n_de_portas = $result['n_de_portas'];
    $quilometragem = $result['quilometragem'];
    $preco = $result['preco'];
?>

    <form action="?action=update" method="POST">
        <input type="hidden" name="id_carro" value="<?php echo $id_carro ?>">
        <label for="marca">Marca</label>
        <input type="text" name="marca" value="<?php echo $marca ?>">

        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" value="<?php echo $modelo ?>">

        <label for="ano_de_fabricacao">Data de Fabricação</label>
        <input type="date" name="ano_de_fabricacao" value="<?php echo $ano_de_fabricacao ?>">

        <label for="cor">Cor</label>
        <input type="text" name="cor" value="<?php echo $cor ?>">

        <label for="tipo_de_combustivel">Combustível</label>
        <select name="tipo_de_combustivel">
            <option value="Gasolina">Gasolina</option>
            <option value="Diesel">Diesel</option>
            <option value="Etanol">Etanol</option>
        </select>

        <label for="n_de_portas">Portas</label>
        <input type="number" name="n_de_portas" value="<?php echo $n_de_portas ?>">

        <label for="quilometragem">Quilometragem</label>
        <input type="number" name="quilometragem" value="<?php echo $quilometragem ?>">

        <label for="preco">Preço</label>
        <input type="number" name="preco" value="<?php echo $preco ?>">

        <input type="submit" value="Atualizar" name="enviar" onclick="return confirm('Certeza que deseja atualizar?')">
    </form>

<?php
}else{
?>

<form action="?action=create" method="POST">
    <label for="marca">Marca</label>
    <input type="text" name="marca">

    <label for="modelo">Modelo</label>
    <input type="text" name="modelo">

    <label for="ano_de_fabricacao">Data de Fabricação</label>
    <input type="date" name="ano_de_fabricacao">

    <label for="cor">Cor</label>
    <input type="text" name="cor">

    <label for="tipo_de_combustivel">Combustível</label>
    <select name="tipo_de_combustivel">
        <option value="Gasolina">Gasolina</option>
        <option value="Diesel">Diesel</option>
        <option value="Etanol">Etanol</option>
    </select>

    <label for="n_de_portas">Portas</label>
    <input type="number" name="n_de_portas">

    <label for="quilometragem">Quilometragem</label>
    <input type="number" name="quilometragem">

    <label for="preco">Preço</label>
    <input type="number" name="preco">

    <input type="submit" value="Cadastrar" name="enviar">
</form>

<form method="GET">
    <input type="text" name="search" placeholder="Buscar por nome, fabricante ou usuário">
    <button type="submit">Pesquisar</button>
</form>

<?php
}
?>

<table>
    <tr>
        <th>Id</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Fabricação</th>
        <th>Cor</th>
        <th>Combustível</th>
        <th>Portas</th>
        <th>Quilometragem</th>
        <th>Preço</th>
    </tr>

    <?php
    if(isset($rows)){
    foreach($rows as $row){
            echo "<tr>";
            echo "<td>". $row['id_carro']."</td>";
            echo "<td>". $row['marca']."</td>";
            echo "<td>". $row['modelo']."</td>";
            echo "<td>". $row['ano_de_fabricacao']."</td>";
            echo "<td>". $row['cor']."</td>";
            echo "<td>". $row['tipo_de_combustivel']."</td>";
            echo "<td>". $row['n_de_portas']."</td>";
            echo "<td>". $row['quilometragem']."</td>";
            echo "<td>". $row['preco']."</td>";
            echo "<td>";
            echo "<a href='?action=update&id_carro=".$row['id_carro']."'>Editar</a>"; 
            echo "<a href='?action=delete&id_carro=".$row['id_carro']."' onclick='return confirm(\"Tem certeza que deseja deletar esse registro?\")' class='delete'>Deletar</a>";
            echo "</td>";
            echo "</tr>";

        }
    }else{
        echo "Não há registros a serem exibidos";
    }
    ?>
</table>
</body>
</html>
