<?php

$username = $_POST['login'] ?? null;
$passwordHash = md5($_POST['password']) ?? null;
$birthdate = $_POST['birthdate'] ?? null;

include ('check.php');              //подключаем файл с фунциями  

$isAuth = checkPassword($username, $passwordHash);

if ($isAuth) { // пользователь вошел
        
        // Стартуем сессию:
    session_start(); 
    
        // Пишем в сессию информацию о том, что мы авторизовались:
    $_SESSION['auth'] = true; 
    
        // Пишем в сессию логин пользователя
    $_SESSION['login'] = $username; 

        // Пишем время авторизации в сессию 
    $authTime = time();
    $_SESSION['time'] = $authTime; 

        // Пишем Дату рожения 
    $_SESSION['birthdate'] = $birthdate; 
    setcookie('birthdate', $birthdate, time() + 86400);      // 24 часа   

        // Запоминаем в Cookie время акции и пользователя
    if (!isset($_COOKIE['time']) || ($_COOKIE['login'] != $username)) {
        setcookie('login', $username, time() + 86400);      // 24 часа   
        setcookie('time', $authTime, time() + 86400);  // 24 часа   
    };
}

// include('index.php');
header("Location: /index.php");
exit();
?>