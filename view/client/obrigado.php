<?php
namespace App\view\client;

class Obrigado{
    public static function obrigado($nomeUsuario){
        if (!empty($nomeUsuario)) {
            echo "<h2>Obrigado por comprar conosco, $nomeUsuario!</h2>";
        } else {
            echo "<h2>Obrigado por comprar conosco!</h2>";
        }
    }
}
?>
