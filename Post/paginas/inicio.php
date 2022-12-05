<div class="well well-sm">
    <?php
    if(isset($_GET['posts'])){
        $pg = (int)$_GET['posts'];
    }else{
        $pg = 1;
    }

    $maximo = 2;
    $inicio = ($pg * $maximo) - $maximo;

    $seleciona = mysqli_query($conecta, "SELECT * FROM posts ORDER BY id DESC LIMIT $inicio, $maximo");
    $conta = mysqli_num_rows($seleciona);

    if($conta <= 0){
        echo "<code>Nenhuma postagem cadastrada no banco de dados!";
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
        <p> <a href="" class="titulo"> <?php echo $titulo; ?> </a></p>  
        <?php if ($descricao != null) { ?><p class="descricao"> <?php echo $descricao; ?> </p><?php } ?>
        <?php if ($imagem != null) { ?><p><img src="<?php echo $imagem;?>" class="foto"/> </p><?php } ?> 
        <p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Enviado em: <?php echo $data. " às " .$hora; ?></br>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Por: <?php echo $linha['nome']; ?> </p> 
        <br>
    </div>

    <?php }} ?>
</div>

<nav align="center">
    <ul class="pagination">
        <?php
        $seleciona = mysqli_query($conecta, "SELECT * FROM posts");
        $totalPosts = mysqli_num_rows($seleciona);

        $pags = ceil($totalPosts / $maximo);
        $links = 2;

        echo '<li><a href="?pagina=inicio&posts=1" aria-label="Página Inicial"><span aria-hidden="true">&laquo;</span></a></li>';

        for($i = $pg - $links; $i <= $pg - 1; $i++) {
            if($i <= 0){
        }else{
            echo '<li> <a href="?pagina=inicio&posts=' . $i . '">' . $i . '</a> </li>';
        }
    }

        echo '<li><a href="?pagina=inicio&posts='.$pg.'">'.$pg.'</a></li>';

        for ($i = $pg + 1; $i <= $pg + $links; $i++)
            if($i > $pags){
            }else{
                echo '<li><a href="?pagina=inicio&posts='.$i.'">'.$i.'</a></li>';
            }

            echo '<li><a href="?pagina=inicio&posts='.$pags.'" aria-label="Última página"><span aria-hidden="true">&raquo;</span></a></li>';
        
        ?>
    </ul>
</nav>