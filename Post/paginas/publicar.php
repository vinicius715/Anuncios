<?php
include_once '../settings/settings.php';
ini_get("open_basedir");
ini_get("allow_url_include");
ini_set("allow_url_include", "1");
?>
<html>
    <head>
        <title>Anunciar</title>
        <link rel="stylesheet" type="text/css" href="../assetspost/css/style.css">
        <link rel="icon" type="image/png" href="/LoginTCC/item-switch.ico">
    </head>
<body>


<center>
<div class="box">
    <div id="panel">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Anunciar Item</h2>
            <p><input type="text" name="titulo" id="titulo" placeholder="Título" maxlength="50" required/></p>
            <p><input type="text" name="postador" id="postador" placeholder="Seu Nome" maxlength="20" required/></p>
            <textarea name="descricao" id="descricao" placeholder="Descrição" style="height:auto!important" rows="5" maxlength="280" 
            class="form form-control" required></textarea> 
            <label for="image">Enviar imagem</label>
            <p> <input type="file" name="image" id="image" accept="image/*" required/> </p>
            <img id="preview" src="" width="310">
            <br> </br>
            <br>
            <button type="submit"> Publicar </button>
            <input type="hidden" name="enviar" value="send"/>
        </form>
        <a href="produtos.php"> <button> Cancelar </button> </a> 
    </div>
    
</div>
</body>
</html>
</center>

        <script>
        function readImage() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };       
        file.readAsDataURL(this.files[0]);
    }
}
document.getElementById("image").addEventListener("change", readImage, false);
        </script>

        <?php
            if(isset($_POST['enviar']) && $_POST['enviar'] == "send"){
                $titulo = $_POST['titulo'];
                $descricao = $_POST['descricao'];
                
                date_default_timezone_set('America/Sao_Paulo');
                $data = date("d/m/Y");
                $hora = date("H:i");
                $postador = $_POST['postador'];

                if(empty($titulo) || empty($postador)){
                    echo "<br> <center> <script>alert('É obrigatório título, descrição e imagem')</script> </center>";
                } else{

                    $uploaddir = '/imagens/uploads/';
                    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
                    $imagename = $uploaddir . basename($_FILES['image']['name']);
    
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                        echo "Imagem enviada com sucesso";
                        $query = "INSERT INTO posts (titulo, descricao, imagem, data, hora, postador) VALUES ('$titulo', '$descricao', 
                        '$imagename', '$data', '$hora', '$postador')";
    
                        if(mysqli_query($conecta, $query)){
                            echo ('<script>alert("Publicado com Sucesso!")
                            window.location.href="../index.php";
                            </script>');
                        }
                    
                    }else{
                        echo "Erro ao enviar a imagem";
                    }
                }
            }
        ?> 
