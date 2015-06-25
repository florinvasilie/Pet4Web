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
	require_once("apps/database.php");

	if(isset($_SESSION['username'])){
		try{
			$db=new Database();
			$sql="select passwd from utilizatori where username='".$_SESSION['username']."'";
			$rez=$db->execFetchAll($sql);
			foreach($rez as $r){
				$pass=$r['PASSWD'];
				$pass= preg_replace('/\s+/', '',$pass);
				if ($pass==$_SESSION['password']){
					?>
					<div class="main-content new-petition">
						<h2>Petitie Noua</h2>
						<form action="apps/inregpetitie.php" method="post">
							<div class="form-group">
								<label for="title">Titlu</label>
								<input name="titlu" type="text" placeholder="Titlul petitiei" required>
							</div>
							<div class="form-group">
								<label for="category">Categorie</label>
								<select name="categorii" placeholder="Categorii" id="category">
									<option value="animale">Animale</option>
									<option value="cultural">Cultural</option>
									<option value="economic">Economic</option>
									<option value="mediu">Mediu</option>
									<option value="social">Social</option>
								</select>
							</div>
							<div class="form-group">
								<label for="receiver">Destinatarul Petitiei</label>
								<input id="receiver" name="destinatar" type="text" placeholder="Destinatarul petitiei" required>
							</div>
							<div class="form-group">
								<label for="message">Mesaj</label>
								<textarea name="continut" id="message" required></textarea>
							</div>
							<button class="btn-primary pull-right" name="buton" type="submit">Posteaza
							</button>
						</form>
					</div>
					<?php
				}
				else{
					session_destroy();
					die("Logati-va pentru a posta o petitie.");
				}
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	else{
		die("Logati-va pentru a posta o petitie.");
	}

	require_once("leftside.php");
	require_once("footer.php");
	
?>
</div>
</body>
</html>