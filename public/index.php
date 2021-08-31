<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/UserController.php');
require_once('../app/controller/AuthController.php');
require_once('../app/controller/MultaController.php');
require_once('../app/controller/ConductoresController.php');
require_once('../app/models/Router.php');


// Iniciamos la sesion

session_start();

//Creamos la sesion
if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
    if ($_SESSION["perfil"] == "agente") {
        $_SESSION['id_agente'] = 0;
        $_SESSION['captcha'] = 0;
    }
}

// Creamos un enrutador para indicar que controlador debe responder a la peticiones

$route = new Router();

// Añadimos rutas
// array para la lista de usuarios


// ruta login
$route->addRoute(array(
    'name' => 'Login',
    'path' => '/^\/login$/',
    'action' => [AuthController::class, 'actionLogin'],
    'auth' => ["invitado", "admin", "agente"]
));

// ruta cierre sesion
$route->addRoute(array(
    'name' => 'Logout',
    'path' => '/^\/user\/logout$/',
    'action' => [AuthController::class, 'actionLogout'],
    'auth' => ["invitado", "admin", "agente"]
));

$route->addRoute(array(
    'name' => 'MultasList',
    'path' => '/^\/multa\/list$/',
    'action' => [MultaController::class, 'actionMultaList'],
    'auth' => ["invitado", "admin", "agente"]
));

$route->addRoute(array(
    'name' => 'PagarMulta',
    'path' => '/^\/multa\/\d+$/',
    'action' => [MultaController::class, 'actionPagarMulta'],
    'auth' => ["invitado", "admin", "agente"]
));

$route->addRoute(array(
    'name' => 'SancionesImpuestas',
    'path' => '/^\/sanciones$/',
    'action' => [MultaController::class, 'actionMultasImpuesta'],
    'auth' => ["agente"]
));

$route->addRoute(array(
    'name' => 'ConductoresList',
    'path' => '/^\/conductores$/',
    'action' => [ConductoresController::class, 'actionListConductores'],
    'auth' => ["admin"]
));

$route->addRoute(array(
    'name' => 'NuevaSancion',
    'path' => '/^\/nuevasancion$/',
    'action' => [MultaController::class, 'actionNuevaSancion'],
    'auth' => ["agente"]
));



// recoger lo que devuelve la url

$url = str_replace(DIRURL, '', $_SERVER['REQUEST_URI']);

// echo $url;

$ruta = $route->match($url);
if ($ruta) {
    if (in_array($_SESSION['perfil'], $ruta['auth'])) {
        $nameController = $ruta['action'][0];
        $nameAction = $ruta['action'][1];

        $controller = new $nameController();
        $controller->$nameAction($url);
    } else {
        echo " acceso no permitido";
    }
} else {
    echo "no ruta";
}
