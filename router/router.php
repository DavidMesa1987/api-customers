<?php

class Router {
    private $routes = [];

    public function addRoute($method, $patternPath, $callback) {
        $this->routes[] = array(
            'method'      => $method,
            'patternPath' => $patternPath,
            'callback'    => $callback
        );
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path   = $_SERVER['REQUEST_URI'];
        $path   = parse_url($path, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match("~^{$route['patternPath']}$~", $path, $matches)) {
                array_shift($matches);
                call_user_func_array($route['callback'], $matches);
                return;
            }
        }

        // Se nessuna route corrisponde, restituisci un errore 404
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'RISORSA NON TROVATA']);
    }
}
?>