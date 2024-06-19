<?php
// Массив с маршрутами
$routes = [
    '/main' => 'main.php',
    '/' => 'main.php',
    '/contact' => 'contact.php',
    '/catalog' => 'catalog.php',
    '/company' => 'company.php',
    '/goscontracts' => 'goscontracts.php',
    '/admin' => 'login.php',
    '/adminPanel' => 'administration.php',
    '/viewOrders' => 'viewOrders.php',
];

// Получение текущего URL
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Проверка, существует ли такой маршрут
if (array_key_exists($url, $routes)) {
    // Если маршрут существует, подключаем соответствующий файл
    require_once __DIR__ . '/pages/' . $routes[$url];
} else {
    // Если маршрут не существует, подключаем 404.php
    http_response_code(404);
    require_once __DIR__ . '/pages/404.php';
}