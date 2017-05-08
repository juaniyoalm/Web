<?php
// Info de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD', 'blog');

// rutas de la web
define("SERVIDOR", "http://localhost/CursoWeb");
define("RUTA_REGISTRO", SERVIDOR . "/registro");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR . "/registro-correcto");
define("RUTA_LOGIN", SERVIDOR . "/login");
define("RUTA_LOGOUT", SERVIDOR . "/logout");
define("RUTA_ENTRADA", SERVIDOR . "/entrada");
define("RUTA_GESTOR", SERVIDOR . "/gestor");
define("RUTA_GESTOR_ENTRADAS", RUTA_GESTOR . "/entradas");
define("RUTA_GESTOR_COMENTARIOS", RUTA_GESTOR . "/comentarios");
define("RUTA_GESTOR_FAVORITOS", RUTA_GESTOR . "/favoritos");
define("RUTA_NUEVA_ENTRADA", SERVIDOR . "/nueva-entrada");
define("RUTA_BORRAR_ENTRADA", SERVIDOR . "/borrar-entrada");
define("RUTA_EDITAR_ENTRADA", SERVIDOR . "/editar-entrada");

// recursos
define("RUTA_CSS", SERVIDOR . "/css/");
define("RUTA_JS", SERVIDOR . "/js/");
