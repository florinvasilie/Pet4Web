<?php
 /* Copyright (C) <2015>  <Pohrib Petre Mihail & Vasilie Florin Paul>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.*/
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pet4Web</title>
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
	<script src="resources/js/afisarebutoane.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onload="showButton()">
<div class="container">
<?php
	require_once("header.php");
?>
	<div class="main-content new-petition">
		<h2>LogIn</h2>
			<form action="apps/login.php" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input name="nume" type="text" placeholder="Username" id="username" required>
				</div>
				<div class="form-group">
					<label for="password">Parola</label>
					<input name="passwd" type="password" placeholder="Parola" id="password" required>
				</div>
				<button name="buton" type="submit" class="btn-primary pull-right">
				Trimite!</button>
			</form>

		<a href="register.php" class="btn-primary">Cont nou!</a>
	</div>
	<?php
		require_once("leftside.php");
		require_once("footer.php");
	?>
</div>
</body>
</html>