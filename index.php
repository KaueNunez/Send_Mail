<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Mail</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./img/email-icon.png">
    <style>
    a {
        text-decoration: none;
        font-size: 25px;
    }

    span {
        color: white;
        font-size: 20px;
    }

    input[type=text] {
        width: 265px;
    }

    label {
        font-weight: bold;
        font-size: 1.2em;
    }

    .alert {
        font-weight: bold;
    }

    @media(max-width:700px) {
        input[type=text] {
            width: 120%;
        }
    }

    @media(min-width: 800px) and (max-width:1200px) {
        a {
            text-decoration: none;
            font-size: 50px;
        }

        span {
            color: white;
            font-size: 30px;
        }

        input[type=text] {
            width: 95%;
            font-size: 1em;
        }

        label {
            font-weight: bold;
            font-size: 1.4em;
        }

        .btn {
            width: 120px;
            padding: 10px;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar bg-primary navbar-expands-md navbar-dark mb-4">
        <div class="container">
            <div class="row">
                <div class="col aligh-self-center pt-2 pb-2">
                    <a class="text-white d-inline" href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                    </a>
                    <span>New Message</span>
                </div>
            </div>
        </div>
    </nav>

    <section>
        <div class="container mb-3">
            <?php 
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '1')){
                echo '<div class="alert alert-warning">Todos os campos estão vazios!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '2')){
                echo '<div class="alert alert-warning">Campo E-mail e Assunto estão vazios!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '3')){
                echo '<div class="alert alert-warning">Campo E-mail e Mensagem estão vazios!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '4')){
                echo '<div class="alert alert-warning">Campo Mensagem e Assunto estão vazios!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '5')){
                echo '<div class="alert alert-warning">Campo E-mail está vazio!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '6')){
                echo '<div class="alert alert-warning">Campo Assunto está vazio!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '7')){
                echo '<div class="alert alert-warning">Campo Mensagem está vazio!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '8')){
                echo '<div class="alert alert-danger">Por favor preencher um e-mail válido!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '9')){
                echo '<div class="alert alert-success">E-mail enviado com sucesso!!!</div>';
            }
            if(isset($_GET['resultado']) && ($_GET['resultado'] === '10')){
                echo '<div class="alert alert-danger">OPS!!!<br>Ocorreu um problema ao enviar o E-mail: {$mail->ErrorInfo}</div>';
            }
            ?>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="./email_validacao.php" method="post">
                        <div class="form-group">
                            <label for="email">E-mail <br><input class="form-control" type="text" name="email"
                                    id="email"></label>
                            <br>
                            <label for="assunto">Assunto <br><input class="form-control" type="text" name="assunto"
                                    id="assunto"></label>
                            <br>
                            <label for="mensagem">Mensagem <br><textarea class="form-control" name="mensagem"
                                    id="mensagem" cols="30" rows="10"></textarea></label>
                            <br>
                            <button type="submit" class="btn btn-outline-primary btn-lg">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>