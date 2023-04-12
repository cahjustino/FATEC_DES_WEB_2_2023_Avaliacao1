<?php
    session_start(); // initial session

    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){ // se não existir login no session ou login não estiver valido volta para index.php
        header("location: index.php");
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px;}
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
        .wrapper{ width: 650px; padding: 20px;  margin: auto; margin-top: 20px;}

        .alunos {display: block; width: 100%; overflow-x: auto;}
        .data-table {width: 100%; }
        table thead th {padding: 1rem 2rem; text-align: left;}
        table tbody td {padding: 1rem 2rem;}
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3 class=" text-black">Area Professor</h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </nav>
    <div class="page-header">
        <h1>Olá<b><br></b>Bem vindo(a) á biblioteca Fatec</h1>
    </div>
    <p>
        <a href="cadastro.php" class="btn btn-primary">Cadastro de livros</a>
        <br><br>
    </p>
    <h2>Livros  Cadastrados</h2>
    <div class="wrapper">
        <section class="aluno">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">author</th>
                        <th class="text-center">ano_lançamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(file_exists("cadastro.txt")){ 
                            $file = file("cadastro.txt"); 
                            foreach($file as $line){ 
                                $line = trim($line);
                                $livros = explode(",",$line);
                                echo "<tr><td> $livros[0]</td><td>$livros[1]</td><td>$livros[2]</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
   
</body>
</html>