<?php
include 'config.php';

$c = new Controller();
$c->index();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'view/header.php';?>
        <div class="row center">
            <div class="col s4">
                <h3 class="center">
                    Login
                </h3>
                <form method="POST">
                <div class="row ">
                    <div class="input-field col s12">
                        <input id="email"  name="email"type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row ">
                    <div class="input-field col s12">
                        <input id="password" name="senha" type="password" class="validate">
                        <label for="password">Senha</label>
                    </div>
                </div>
                <button class="waves-effect waves-light btn" type='submit' name="login">Login</button>
                </form>
                <h3 class="center">
                    Cadastro      
                </h3>
                <div class="row">
                    <form method="post">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                        oninvalid="setCustomValidity('O email deve ser algo como a@a.com')" onchange="try{setCustomValidity('')}catch(e){}" >
                        <label for="email">Email</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate" name="nome" required>
                            <label for="first_name">Nome</label>
                        </div> 
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="senha" pattern=".{4,10}" required
                                oninvalid="setCustomValidity('A senha deve conter de 4 a 10 caracteres.')" onchange="try{setCustomValidity('')}catch(e){}">
                                <label for="password">Senha</label>
                            </div>
                            <button class="waves-effect waves-light btn" name="cadastro">Cadastrar</button> 
                            
                        </div>
                    </div>
                           </form>
                </div>
             
            </div>
            <div class="col s8" >
                <div class="container center-align">
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img src="img/Home.jpg"> <!-- random image -->
                            <div class="caption center-align">
                                <h3></h3>
                                <h5 class="light grey-text text-lighten-3"></h5>
                            </div>
                        </li>
                        <li>
                            <img src="img/Produtos.jpg"> <!-- random image -->
                            <div class="caption left-align">
                                <h3></h3>
                                <h5 class="light grey-text text-lighten-3"</h5>
                            </div>
                        </li>
                        <li>
                            <img src="img/Listas.jpg"> <!-- random image -->
                            <div class="caption right-align">
                                <h3></h3>
                                <h5 class="light grey-text text-lighten-3"></h5>
                            </div>
                        </li>
                        <li>
                            <img src="img/Perfil_1.jpg"> <!-- random image -->
                            <div class="caption center-align">
                                <h3></h3>
                                <h5 class="light grey-text text-lighten-3"></h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>




 <?php include 'view/footer.php'; ?>