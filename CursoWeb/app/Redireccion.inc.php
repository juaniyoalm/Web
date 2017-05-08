<?php
class Redireccion {
    public static function redirigir ($url) {
        header('Location: ' . $url, true, 301);
        exit();// hay que cortar la ejecucion despues de redirigir
    }
}
?>
