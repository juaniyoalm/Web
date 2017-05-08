<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $nombre = sa(10);
    $email = sa(5) . '@' . sa(3);
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $usuario = new Usuario('', $nombre, $email, $password, '', '');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}

for ($entradas = 0; $entradas < 100; $entradas++) {
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(1, 100);

    $entrada = new Entrada('', $autor, $url, $titulo, $texto, '', '');
    RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++) {
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand(1, 100);

    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
}

function sa($longitud) {
    $caracteres = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for ($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    return $string_aleatorio;
}

function lorem() {
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet facilisis nisi, eu imperdiet arcu. Sed magna odio, mollis vitae ex et, posuere feugiat libero. In urna tortor, tristique quis mauris a, iaculis interdum est. Integer quam ligula, aliquet vel urna eu, cursus efficitur lectus. Ut ac auctor urna. Vestibulum interdum dui velit, at imperdiet enim dignissim id. Aenean ut pretium nulla. Phasellus et libero vel enim vestibulum tincidunt venenatis sed ante. Morbi laoreet blandit dictum. Cras sapien nulla, porttitor ac velit vel, dictum venenatis arcu. Morbi id purus a arcu gravida tincidunt ut vel orci. Duis pharetra porttitor mattis. Pellentesque sed turpis et nisi scelerisque elementum. Sed at sodales quam. Donec mauris elit, rhoncus posuere vulputate at, semper a sem. Sed facilisis felis tristique, lacinia nibh vitae, bibendum nunc.

Cras tincidunt pretium ex sit amet semper. Maecenas sagittis, justo a euismod maximus, eros eros malesuada lorem, sed tincidunt sapien risus id elit. Morbi volutpat, turpis eu sollicitudin commodo, arcu massa congue turpis, id pretium dolor nunc in urna. Ut erat tellus, ornare non ultrices ac, elementum ut justo. Ut ullamcorper consectetur venenatis. Integer ac tempor velit. Duis mauris est, luctus eu orci sit amet, consectetur iaculis tellus. Donec tristique, felis ac pulvinar ultrices, sapien eros faucibus mi, non dictum magna turpis in ante.

Sed vestibulum velit vel enim semper, ac ultricies arcu placerat. Morbi quis libero rhoncus, pulvinar ligula in, sagittis diam. Pellentesque pellentesque accumsan ante, mattis volutpat risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nulla eros, rhoncus sit amet nunc quis, efficitur accumsan urna. Fusce porttitor sodales tortor non facilisis. Pellentesque consectetur a ipsum sed faucibus. Nullam pulvinar ultrices congue. Morbi convallis, libero ut vehicula tempus, risus enim mattis est, eget consectetur diam quam sit amet nibh. Integer tempor interdum massa, nec varius lacus feugiat vitae. Integer vulputate elementum euismod. Morbi et augue vitae dolor mattis ornare. Proin leo nisl, ornare in pellentesque consectetur, gravida quis metus. Ut hendrerit diam sed tortor vehicula, nec placerat eros hendrerit. Vivamus sit amet dui vel felis rhoncus blandit ut a velit.

Cras nec finibus augue. Ut lacus sem, congue sit amet lorem ut, aliquam placerat eros. Morbi quis sapien nec orci dignissim dignissim sit amet at tellus. Vestibulum semper id est quis sodales. Fusce vulputate tempus justo non placerat. Cras ut nulla id dui tempus tempus ut ut libero. Morbi massa dolor, pellentesque sit amet venenatis ac, facilisis nec magna. Nullam vitae lectus non massa bibendum elementum non posuere lectus. Suspendisse egestas dolor vitae neque dictum egestas. Vestibulum sodales vehicula magna a ullamcorper. Aenean fermentum, tortor in porta rhoncus, sapien massa rutrum diam, vel dapibus mauris augue sit amet purus. Etiam sem est, mattis nec lorem sit amet, dapibus tincidunt libero. Morbi cursus dapibus risus, sit amet fringilla libero porttitor hendrerit. Curabitur ultrices euismod scelerisque. Sed in dui tellus.

Nam mauris nunc, congue quis tempus ut, varius quis libero. Praesent at dapibus magna. Fusce gravida massa arcu, in placerat nibh fringilla suscipit. Cras tempor purus eget ante sagittis porttitor. Aenean pulvinar, magna vel facilisis congue, turpis felis sollicitudin leo, nec ultricies sapien purus ut nunc. Aliquam ultricies consectetur neque at rhoncus. Proin eros enim, pharetra in dolor et, porta varius neque. Curabitur vel erat ut nulla commodo pellentesque eget sit amet eros. Ut quis sollicitudin ligula. Pellentesque auctor metus sit amet leo euismod cursus. Ut placerat sem nulla, ut tincidunt lorem vehicula a.';

    return $lorem;
}
