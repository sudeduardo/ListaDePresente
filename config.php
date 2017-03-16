<?php
function __autoload($classe){
    if(file_exists("Controller/{$classe}.php")){
        require_once "Controller/{$classe}.php";}
    if(file_exists("Model/{$classe}.php")){
        require_once  "Model/{$classe}.php";}
}
