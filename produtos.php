  <?php include 'view/header.php';
        include "config.php";
        $a= new Controller();
        $a->produtos();
  ?>

        <h3 class='center'>Produtos</h3>
        <div class="row">    
             <?php
                    for ($i = 0; $i < count($a->Produtos); $i++) {
                        ?>
                        <div class="col s12 m6 l3 center">
                            <div class="card small">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="img/<?= $a->Produtos[$i]['foto']?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?= $a->Produtos[$i]['nome']?><i class="material-icons right">more_vert</i></span>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4"><?= $a->Produtos[$i]['nome']?><i class="material-icons right">close</i></span>
                                    <p><?= $a->Produtos[$i]['descricao']?></p>
                                    <p><a href="<?= $a->Produtos[$i]['link']?>"><?= $a->Produtos[$i]['link']?></a> </p>
                                    <?php if(isset($_SESSION['login'])){
                                     echo "<p><a href='#' id='".$a->Produtos[$i]['id']."' onclick='AddProduto(this.id)'><img src='img/add.png' class='responsive-img center' style='width: 40px;'></a></p>";
                                    }?>
                                </div>
                            </div>
                            </div>
<?php } ?>
            
      
           
        </div>
     
    <?php include 'view/footer.php';?>