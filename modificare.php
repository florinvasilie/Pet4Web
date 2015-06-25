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
	<title>Modificare</title>
	<script src="resources/js/afisarebutoane.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onload="showButton()">
<div class=container>
	<?php
		require_once("header.php");
		require_once("apps/database.php")

	?>
	<div class="main-content new-petition">
		<?php
			try{
					$db=new Database();
				}
				catch(Exception $e){
					die("Serverul a intalnit o eroare: ".$e->getMessage());
				}
				$sql="select username,passwd,nume,email,to_char(data_nasterii,'YYYY-MM-DD') as data_nasterii from utilizatori where username='".$_SESSION['username']."'";
				try{
					$rez=$db->execFetchAll($sql);
				}
				catch(Exception $e){
					die("Serverul a intalnit o eroare: ".$e->getMessage());
				}
				foreach($rez as $r){
				?>
				<form action="apps/modifica.php" method="post">
				
					<div class="form-group">
					<label for="username">Username</label>
					<input id="username" name="username" type="text" placeholder="Username" value=<?=$r['USERNAME'] ?> readonly>
					</div>
					<div class="form-group">
						<label for="username">Nume</label>
						<input id="username" name="nume" type="text" placeholder="Nume" value=<?=$r['NUME'] ?> required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="Email" value=<?=$r['EMAIL'] ?> readonly>
					</div>
					<div class="form-group">
						<label for="date">Data Nasterii</label>
						<input id="username" name="datan" type="date" placeholder="Data Nasterii" value=<?=$r['DATA_NASTERII'] ?> required>
					</div>
					<div class="form-group">
						<label for="password">Parola</label>
						<input id="password" name="parola" type="password" placeholder="Parola" value=<?=$r['PASSWD'] ?> required>
					</div>
					<button class="btn-primary pull-right" name="buton" type="submit">
					Trimite!</button>
			
				</form>
				<?php
				}
		?>


	</div>
	<?php
		require_once("leftside.php");
		require_once("footer.php");
	?>
</div>
</body>
</html>