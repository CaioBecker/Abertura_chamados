<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo/icone_santa_casa_sjc_colorido.png">
    <title>Layout Bootstrap</title>
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>    

        <nav class="navbar navbar-expand-md navbar-dark bg-color">
            <a class="navbar-brand" href="#">
                <img src="img/logo/icone_santa_casa_sjc_branco.png" height="28px" width="28px" class="d-inline-block align-top" alt="Santa Casa de São José dos Campos">
                <h10>Santa Casa de São José dos Campos</h10>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExample06">
                <ul class="navbar-nav">          
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                <div class="menu_azul_claro">
                    <li class="nav-item">
                        <h10><a class="nav-link" href="#"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Faq</a></h10>
                    </li>
                </div>
                <div class="menu_preto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> Menu</a></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown06">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                </div>
                </li>
                <div class="menu_azul_claro">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> Heitor</a></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown06">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                <div class="menu_vermelho">
                </ul>
            </div>
        </nav>

    <!--DIRETORIO-->
    <div class="diretorio">
        <a class="diretorio_link" href="index.php"> 
            <i class="fa fa-home" aria-hidden="true"></i> Home 
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <a class="diretorio_link" href="#"> 
            <?php echo ucwords(substr(basename($_SERVER['PHP_SELF']),0,-4)); ?>
        </a>
    </div>

    </header>
    
    <main>

        <div class="conteudo">
            <div class="container">