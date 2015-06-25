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
		<h2>Register</h2>
			<form action="apps/register.php" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input id="username" name="username" type="text" placeholder="Username" required>
				</div>
				<div class="form-group">
					<label for="username">Nume</label>
					<input id="username" name="nume" type="text" placeholder="Nume" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input id="email" name="email" type="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="date">Data Nasterii</label>
					<input id="username" name="datan" type="date" placeholder="Data Nasterii" required>
				</div>
				<div class="form-group">
					<label for="password">Parola</label>
					<input id="password" name="parola" type="password" placeholder="Parola" required>
				</div>
				<button class="btn-primary pull-right" name="buton" type="submit">
				Trimite!</button>
			</form>
	</div>
	<?php
		require_once("leftside.php");
		require_once("footer.php");
	?>
</div>
</body>
</html>