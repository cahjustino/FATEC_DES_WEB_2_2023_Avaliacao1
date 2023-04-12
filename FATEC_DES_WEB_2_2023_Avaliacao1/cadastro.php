<?php
    session_start(); // initial session

    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){// se não existir login no session ou login não estiver valido volta para index.php
        header("location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se o método chamado for tipo Post
        if( $_POST['nome'] != ""  &&   $_POST['author'] != "" && $_POST['ano_lancamento'] != "")  { // verifica se não são vázio os campos
            $nome = $_POST['nome'];
            $author = $_POST['author'];
            $ano_lancamento = $_POST['ano_lancamento']; 
            $filename = "cadastro.txt";
        
            // verifica se o arquivo existe. retorna bool
            if (!file_exists($filename)) {
                $handle = fopen($filename, "w");
            } else {
                
                $handle = fopen($filename, "a");
            }

            fwrite($handle,"$nome,$author,$ano_lancamento\n");

            fflush($handle);

            fclose($handle);

           
            header("location: inicio.php");
        }
    }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px;  margin: auto; margin-top: 50px;}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px; }
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3><a class="text-black" href="inicio.php">Cadastro de livros</a></h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h2>Cadastro de novo livro</h2>
        <form action="cadastro.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>author</label>
                <input type="text" name="author" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>ano_lançamento</label>
                <input type="text" name="ano_lancamento" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>    
</body>
</html>