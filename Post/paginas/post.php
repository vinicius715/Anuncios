<div class="well well-sm">
<?php

$idPost = $_GET['id'];

$seleciona = mysqli_query($conecta, "SELECT * FROM posts WHERE id = '$idPost'");
    $conta = mysqli_num_rows($seleciona);

    if($conta <= 0){
        echo 'Post não encontrado';
    }else{
        while($row = mysqli_fetch_array($seleciona)){
            $id = $row['id'];
            $titulo = $row['titulo'];
            $descricao = $row['descricao'];
            $imagem = $row['imagem'];
            $data = $row['data'];
            $hora = $row['hora'];
            $postador = $row['postador'];
            $sql = "SELECT * FROM usuario WHERE nome = '$postador'";
            $query = mysqli_query($conecta, $sql);
            $linha = mysqli_fetch_assoc($query);

?>

<div id="panel" align="left">
        <p> <a href="?pagina=post&id= <?php echo $id; ?>" class="titulo"> <?php echo $titulo; ?> </a></p>  
        <?php if ($descricao != null) { ?><p class="descricao"> <?php echo $descricao; ?> </p><?php } ?>
        <?php if ($imagem != null){?><p> <img src="<?php echo $imagem;?>" class="foto"/> </p><?php } ?> 
        <p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Postado em: <?php echo $data. " às " .$hora; ?></br>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Postado por: <?php echo $linha['nome']; ?> </p> 
    </div>
    
    <?php }} ?>
