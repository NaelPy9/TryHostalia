<?php
    require_once "./vendor/autoload.php";
    abstract class Controller{
        private $twig;
        public function __construct(){
            $loader = new \Twig\Loader\FilesystemLoader("./vistas");
            $this->twig = new \Twig\Environment($loader);
            
        }
        public function render(string $vista, array $datos = []) {
            echo $this->twig->render($vista, $datos) ;
        }
    }