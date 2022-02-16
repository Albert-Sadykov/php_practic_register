<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
	<div class="form mt-4">
		<?php 
			if($_COOKIE['user'] == ''):
		?>
		<div class="sign_up">
			<h1>Регистрация</h1>
			<form action="sign_up.php" method="post">
				<input type="text" class="form-control" name="name" 
				id="name" placeholder="Введите имя">
				<input type="email" class="form-control" name="email" 
				id="email" placeholder="Введите email">
				<input type="password" class="form-control" name="password" 
				id="password" placeholder="Введите password">
				<button class="btn btn-success" 
				type="submit">Зарегестрироваться</button>		
			</form>
		</div>
		<div class="sign_in">
			<h1>Войти</h1>
			<form action="sign_in.php" method="post">
				<input type="text" class="form-control" name="name" 
				id="name" placeholder="Введите имя">
				<input type="password" class="form-control" name="password" 
				id="password" placeholder="Введите password">
				<button class="btn btn-success" 
				type="submit">Войти</button>		
			</form>
		</div>
		
		<?php else: ?>
			<form action="sign_out.php" method="post">
				<?php
					if ($_COOKIE['user'] = "albert"){
						echo "<p>Здравствуйте мой повелитель</p>";
				} else {
					echo "<p>Привет" . $_COOKIE["user"] . "</p>";
				}
				?>
				<button class="btn btn-success" 
				type="submit">Выйти</button>
			</form>
		<?php endif; ?>
	</div>
</body>
</html>