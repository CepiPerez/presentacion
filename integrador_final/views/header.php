<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="views/css/bootstrap.min.css" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    <link href="views/fontawesome/css/all.min.css" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="views/css/templatemo-diagoona.css" rel="stylesheet" />

</head>
<body>

<?php 

    function generateLinks()
    {
        $links = [
            'inicio' => '/',
            'trabajos' => '/works.php',
            'contacto' => '/contact.php',
            'admin' => '/admin.php'
        ];

        foreach ($links as $key => $val)
        {
            echo '<li class="nav-item'. ($_SERVER['REQUEST_URI'] == $val ? ' active' : '') . '">';
            echo '<a class="nav-link tm-nav-link" href="'. ($_SERVER['REQUEST_URI'] == $val ? '#' : $val) . '">' . $key . '</a>';
            echo "</li>\n";
        }
    }

?>

<div class="tm-container">        
    <div>
        <div class="tm-row pt-4">
            <div class="col ml-4">
                <div class="tm-site-header media">
                    <div class="media-body p-0">
                        <h1 class="tm-sitename text-uppercase m-0">PORTFOLIO</h1>
                        <p class="tm-slogon m-0">Matias Perez</p>
                    </div>        
                </div>
            </div>
            <div class="col-auto mr-4">
                <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                    <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
                        data-toggle="collapse" data-target="#navbar-nav" 
                        aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                        <ul class="navbar-nav text-uppercase">

                            <?php generateLinks() ?>
                            
                        </ul>                            
                    </div>                        
                </nav>
            </div>
        </div>
        
        <div class="tm-row">
        







