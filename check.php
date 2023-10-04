<?php

function getUsersList() {
// Функция получения списка пользователей и хешей их паролей
    
    // Массив пользователей
    $usersList = [
        'admin' => ['id' => '1', 'passwordHash' => '789d743a205201340d53eea0319f1f16'], // 132432
        'user' => ['id' => '2', 'passwordHash' => '202cb962ac59075b964b07152d234b70'], // 123
        'user2' => ['id' => '3', 'passwordHash' => '7ac76614385c0e105ec65e9072b59a95'], // ol25
    ];

    return $usersList;
};

function existsUser($login) {
// проверяет, существует ли пользователь с указанным логином;
    
    $usersList = getUsersList();              // список пользователей и хеш-паролей  

    return isset($usersList[$login]);

};


function checkPassword($login, $passwordHash) {
    // возвращает true тогда, когда существует пользователь с указанным логином 
    // и введенный им пароль прошел проверку, иначе — false

    if (existsUser($login)) { 

        $usersList = getUsersList();              // список пользователей и хеш-паролей  

        // Если пароль из базы совпадает с паролем из формы
        if ($passwordHash === $usersList[$login]['passwordHash']) {
            return true;
        };
    };
    return false;
};

function getCurrentUser() {
    // возвращает либо имя вошедшего на сайт пользователя, либо null
    // Проверяем, есть ли сессия пользователя 
    session_start();
    
    if ( isset($_SESSION['auth']) && ($_SESSION['auth'] === true) ) {
        return $_SESSION['login']; // Возвращает имя вошедшего пользователя
    } else {
        return null; // Возвращает null, если пользователь не вошел
    }
};

function getUserTime() {
    //возвращает время первого входа текущего пользователя
    //из сессии или из куки

    $login = getCurrentUser();
    if (!$login) return 0;    // нет входа - 0 

    if (isset($_COOKIE['login']) && $_COOKIE['login'] === $login && isset($_COOKIE['time'])) {
        $authTime = $_COOKIE['time'];       // время первого входа этого пользователя по куки
    } else if (isset($_SESSION['time'])) {
        $authTime = $_SESSION['time'];      // время по сессии
    } else $authTime = 0;
       
    return $authTime;
};


function lostTime() {
    //возвращает время до конца акции 

    $startTime = getUserTime();     //время первого входа пользователя
    $currentTime = time(); // Текущее время в секундах
        // Рассчитываем оставшееся время до окончания акции
    $timeLeft = $startTime + (24 * 60 * 60) - $currentTime;
     
    if ($timeLeft < 0) $timeLeft = 0;   // обнулим отрицательный результат

        // Преобразуем оставшееся время в формат часов, минут, секунд

    $hours = floor($timeLeft / 3600);
    $minutes = floor(($timeLeft % 3600) / 60);
    $seconds = $timeLeft % 60;
        
    return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
   
};

function getUserBirthdate() {
    //возвращает дату рождения текущего пользователя
    
    $login = getCurrentUser();
    if (!$login) return null;    // нет входа 

    if (isset($_COOKIE['login']) && $_COOKIE['login'] === $login && isset($_COOKIE['birthdate'])) {
        $birthdate = $_COOKIE['birthdate'];       // время первого входа этого пользователя по куки
    } else if (isset($_SESSION['birthdate'])) {
        $authTime = $_SESSION['birthdate'];      // время по сессии
    } else $birthdate = null;
    
    return $birthdate;
};

function getBirthday($year) {
    // вычисляет день рождения клиента в нужном году (в секундах)

    $birthdata = getUserBirthdate();                        // дата рождения клиента Y-m-d
    if (!isset($birthdata))  return null;
    
    $birthdataNotYear = mb_substr($birthdata, 4 );          // дата без года
    $birthday = strtotime($year.$birthdataNotYear);         // день рождения в текущем году в секундах
    
    return $birthday;
}

function daysBeforeBirthday() {
    //считает количество дней до дня рожения клиента

    $curYear = date("Y");                               // текущий год
    $curBirthday = getBirthday($curYear);               // день клиента в текущем году
    if (!isset($curBirthday))  return null;

    $today = strtotime(date("Y-m-d"));                  // текущая дата

    if ($curBirthday < $today ) {                       // день рождения был в этом году
        $curBirthday = getBirthday($curYear + 1);       // берем день клиента в следующем году
    };

    $daysLeft = ( $curBirthday - $today ) / (60 * 60 * 24);     // переводим в сутки

    return $daysLeft;
   
};

?>
