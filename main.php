<!--  Страничка формы авторизации -->
<?php
	session_start();
	include ('check.php');              //подключаем файл с фунциями  
	$login = getCurrentUser();
	$daysBefore = daysBeforeBirthday();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/ico_mini_white.png" />
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <title>Райский уголок</title>
</head>

<body>
	<header>
		<div class="panel"> 
			<img src="img/logo2.png" alt="Логотип Райский уголок"> 
			<nav class="links">
				<ul>
					<li><a href="index.php">Главная</a>	</li>
					<li><a href="#">Услуги</a></li>            
					<li><a href="#">Контакты</a></li>        
				</ul>   
			</nav> 
            <div id="login-logoff"> 
                <?php                     	// Если пользователь залогинен, отображаем ссылку на выход и имя пользователя 
                    if ($login) {
				?>
                    <p> Добро пожаловать, <?=$login?></p> 
					<?php                  // дней до дня рожения осталось:
	                    if ($daysBefore >= 0) {	?>
						<p> Дней до дня рожения осталось: <?=$daysBefore?></p> 
						<?php
						}?> 
                    <a href="logout.php">Выход</a> 
                <?php
                } else {?>
                    <a href="login.php">Вход</a>
                    <a href="#">Регистрация</a>
				<?php
                }?> 
            </div>
		</div>
	</header>
	<div class="main-name"> 
		<h1>Райский уголок</h1>
	</div>

	<div class="main-content">		
		<div class="сontent-wrapper">
			<div class="welcome" id="welcome">
				<h2>Добро пожаловать в наш SPA-салон "Райский уголок"!</h2>
				<p class="description">Мы предлагаем широкий спектр релаксационных услуг, помогающих вам восстановить энергию, достичь гармонии и насладиться полным спокойствием.</p>
			</div>
			<?php
                if ($login) { 
					include('personal.php');
                }; ?>

			<article class="services">
				<div>
					<h2>Массаж</h2>
					<p class="description">
						Различные виды массажа, такие как шведский, тайский, лимфодренажный и др., способствуют расслаблению мышц и улучшению физического состояния
					</p>
				</div>
				<img src="https://unsplash.com/photos/cU53ZFBr3lk/download?force=true&w=600" 
					alt="Массаж для расслабления с маслом"
					title="https://unsplash.com/photos/cU53ZFBr3lk">
			</article>
			<article class="services">
				<div>
					<h2>Ароматерапия</h2>
					<p class="description">
						Использование эфирных масел для создания атмосферы релаксации и улучшения самочувствия
					</p>
				</div>
				<img src="https://unsplash.com/photos/W7AyAs7azHc/download?force=true&w=300" 
					alt="Ароматерапия"
					title="https://unsplash.com/photos/W7AyAs7azHc">
			</article>
			<article class="services">
				<div>
					<h2>СПА-процедуры</h2>
					<p class="description">
						Включая гидротерапию, сауну, джакузи, и обертывания, помогают расслабиться и очистить организм
					</p>
				</div>
				<img src="https://unsplash.com/photos/K65M3GbRYq8/download?force=true&w=600" 
					alt="SPA-процедуры"
					title="https://unsplash.com/photos/K65M3GbRYq8">
			</article>
			<article class="services">
				<div>
					<h2>Массаж головы и лица</h2>
					<p class="description">
						Уход за кожей и массаж головы могут помочь снять стресс и улучшить состояние кожи
					</p>
				</div>
				<img src="https://unsplash.com/photos/Pe9IXUuC6QU/download?force=true&w=600" 
				alt="Массаж головы и лица"
				title="https://unsplash.com/photos/Pe9IXUuC6QU">
					</article>
			<p>	Это лишь некоторые из возможных услуг, которые можно предоставить в СПА-салоне "Райский уголок". 
				Вы можете адаптировать их в соответствии с вашими предпочтениями. 
			</p>
			<h3>
				Мы создаем идеальную атмосферу релаксации и комфорта для каждого гостя
			</h3>
		</div>
	</div>

	<footer>
		<p>СПА-салон "Райский уголок" © 2022. Все права защищены.</p>
		<p>Адрес: ул. Примерная, 123, Город</p>
		<p>Телефон: 8-800-123-4567</p>
	</footer>

</body>
</html>