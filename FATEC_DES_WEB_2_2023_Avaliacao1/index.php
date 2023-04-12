<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se o método chamado for tipo Post
        session_start(); // inicializa session 
        if($_POST['username'] == 'fatec' and $_POST['password'] == 'araras'){ // se o usuario e senha for valido
            $_SESSION['login'] = TRUE; // seta no session login verdadeiro
            $_SESSION["username"] = 'fatec';  // seta no session usuaria carla
            header("location: inicio.php"); // redireciona para inicio
        } else {
            $_SESSION['login'] = FALSE; // se não seta no session login falso
        }
    }
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 12px sans-serif; 
            background-color:lightgray;
        }
        table{
            margin-left:300px;
        }
        img{
            padding:10px;
        }
    
        .title{text-align: center; margin-top:30px;}
        .wrapper{ width: 350px; padding: 15px; margin: auto; margin-top: 50px;
        }
        
    </style>
</head>
<body>
    <h1 class="title">Cadastro de livros</h1>
        <table>
            <tr>
                <td>
                    <img src="img/logofatec.png" alt="logo fatec">
                </td>
        
        <td>
        <div class="wrapper">
        <h2>Acesso professor</h2>
        <p>Insira login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div> 
                </td> 
            </tr>
        </table>
</body>
</html>