<?php
include 'config.php';
$l = new Controller();
$l->listas();
if(isset($_GET['link'])){
   $link=$_GET['link'];
   $z= new Lista();
   $n=$z->getUserByLink($link);
}
?>
<?php include 'view/header.php';?>
        <div class="row">
            <div class="col s4 m4 l4">
                <br>
                <div class="center">
                    <img class="circle responsive-img"  id="foto" src="img/perfil.jpg">
                    <p id='dados'>
               
                    </p>
                </div>
                <h3 class="center">

                </h3>
                <div class="row">
                    <div class="collection center with-header">
                        <div  class="collection-header"><h4>Listas</h4></div>
                        
                        <input type="text" placeholder="Pesquisar..." id="pesquisa">
                        <div id="nomes">
                        <?php foreach($l->users as $usuarios){ ?>
                        <a href="#!" class="collection-item" id='<?= $usuarios['id'] ?>' onclick="getLista(this.id)"><?= $usuarios['nome'] ?><div class="secondary-content"><i class="material-icons">send</i></div></a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s8 m8 l8">
                <h3 class="center">Presentes</h3>
                <div id="presentes">
                    <h4>Clique em alguem da Lista para ver seus presentes</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
       
         <?php include 'view/footer.php';?>

         <script>
        <?php if(isset($_GET['link'])){
            if(isset($n)){
                echo "getLista(".$n.")" ;
            }
        }?>
            </script>
