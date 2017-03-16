<?php
include 'config.php';
$a = new Controller();
$a->Perfil();
?>
<?php include 'view/header.php'; ?>
<script src="js/jquery-2.2.1.min.js" type="text/javascript"></script>
<script src="js/perfil.js" type="text/javascript"></script>
<div class="row">
    <div class="col s4 m4 l4">
        <br>
        <div class="center">
            <img class="circle responsive-img" src="img/<?php echo $_SESSION['login']['foto']; ?>">
            <br>
            <a data-target="modal1" class="btn modal-trigger"><i class="material-icons left">picture_in_picture</i>Alterar Foto</a>
            <p>
                <?php echo $_SESSION['login']['nome']; ?><br>
                <?php echo "Data de Cadastro: " . date('d/m/Y', strtotime($_SESSION['login']['data_cadastro'])) ?>
            </p>
            <a class="grey-text text lighten-3 "href="listas.php?link=<?= $_SESSION['link'] ?>">Link da Lista</a>
        </div>
        <h3 class="center">
        </h3>
        <div class="row">
        </div>
    </div>
    <div id="modal1" class="modal">
        <form method="POST"  enctype="multipart/form-data" >
            <div class="modal-content">
                <h4>Alterar Foto</h4>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" name="imagem">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" name="enviar">Enviar</button>
            </div>
        </form>
    </div>
    <div id="modal2" class="modal">
        <form method="POST">
            <div class="modal-content">
                <h4>Alterar Nome de Lista</h4>
                <div class="file-field input-field">
                    <input type="text" name="nome_lista">
                </div>
            </div>
            <div class="modal-footer">
                <button  type="submit" class=" modal-action modal-close waves-effect waves-light btn" name="enviar_lista">Alterar</button>
            </div>
        </form>
    </div>
    <div class="col s8 m8 l8">
        <h3 class="center"><?php echo $_SESSION['nome_lista']; ?>
            <a  data-target="modal2" class="modal-trigger" id='<?php $_SESSION['login']['id'] ?> '><img src='img/edit.png'  class='responsive-img center' style='width: 25px;'> </a></h3>
        <div class="row">
            <?php
            for ($i = 0; $i < count($a->presentes); $i++) {
                ?>
                <div class="col s12 m6 l3" id="<?= $a->presentes[$i]['id'] ?>">
                    <div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/<?= $a->presentes[$i]['foto'] ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?= $a->presentes[$i]['nome'] ?><i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal center">
                            <span class="card-title grey-text text-darken-4"><?= $a->presentes[$i]['nome'] ?><i class="material-icons right">close</i></span>
                            <p><a href="<?= $a->presentes[$i]['link'] ?>"><?= $a->presentes[$i]['link'] ?></a></p>
                            <p><a href="#" id="<?= $a->presentes[$i]['id'] ?>" onclick="ExcluirLista(this.id)"><img src="img/delete.png" class="responsive-img center" style="width: 40px;"></a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>






        </div>
    </div>
</div>

<?php include 'view/footer.php'; ?>


