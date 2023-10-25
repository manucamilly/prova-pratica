<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
    <style>
        body {
            background-color: #FFE4E1;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color: #FF1493; 
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin: 10px 0;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #FF69B4; 
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #FF1493; 
            color: #FFF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #FF69B4;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #FF1493; 
            color: #FFF;
        }
        tr:nth-child(even) {
            background-color: #FFC0CB; 
        }
        .delete {
            color: #FF0000; 
            text-decoration: none;
            margin-left: 10px;
        }
        a {
            color: #FF1493; 
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            border: 2px solid #FF1493; 
            border-radius: 5px;
            background-color: #FFF; 
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #FF1493; 
            color: #FFF;
        }
    </style>
</head>
<body>

    <h1>Login</h1>
    <form id_usuario="loginForm">
        <label for="nome_usuario">Usuario:</label>
        <input type="text" id="nome_usuario" required>
        <label for="email_usuario">E-mail:</label>
        <input type="email" id="email_usuario" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" required>
    </form>
    <a href="registroscarros.php" style="margin-top: 20px;">Entrar</a>
</body>
</html>
