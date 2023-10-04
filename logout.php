<?php
    session_start();
        // Удаляем из сессии информацию о том, что мы авторизовались:
    $_SESSION['auth'] = false; 
    unset($_SESSION['login']); 
    unset($_SESSION['time']); 
    unset($_SESSION['birthdate']); 
    setcookie('birthdate', $birthdate, time() - 1);      
        //главная страница 
    header("Location: /index.php");
    exit();

