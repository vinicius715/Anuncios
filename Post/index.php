<?php
include_once("settings/settings.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Posts em aprovação</title>
        <link href="assetspost/css/styleposts.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="/LoginTCC/item-switch.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="
        sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="
        sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
    <body>
        <div id="body">
        <center>
        <h2>Anúncios em aprovação</h2>
        <?php
        
        if(isset($_GET['pagina'])){
            $do = ($_GET['pagina']);
        }else{
            $do = "inicio";
        }

        if(file_exists("paginas/".$do.".php")){
            include("paginas/".$do.".php");
        }else{
            print 'Página não encontrada';
        }

        ?>
        <a href="produtos.php"> <button class="back"> Voltar ao catálogo </button> </a> 
        <br>
        </center>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-
        0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>