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
	<title>Inregistrare petitie</title>
</head>
<body>
	<?php
		require_once("database.php");
		try{
			$db= new Database();
		}catch(Exception $e){
			die("Eroare server: ".$e->getMessage());
			header("refresh:5;url=\\Pet4Web/index.php");
		}
		$sql="insert into petitii(categorie,titlu,data_postarii,username,vizualizari,continut,destinatar)". 
		"values(:categorii,:titlu,SYSDATE,:username,0,:continut,:destinatar)";

		try{
			$db->execute($sql,array(array(":categorii",$_REQUEST['categorii'],-1),array(":titlu",htmlspecialchars($_REQUEST['titlu']),-1),
			array(":username",htmlspecialchars($_SESSION['username']),-1),array(":continut",htmlspecialchars($_REQUEST['continut']),-1),array(":destinatar",htmlspecialchars($_REQUEST['destinatar']),-1)));
		}catch(Exception $e){
			die("Eroare server: ".$e->getMessage()."Incercati mai tarziu!");
			header("refresh:5;url=\\Pet4Web/index.php");
		}
		echo "<p>Petitia a fost inregistrata! Veti fi redirectat catre pagina principala in 5 secunde.</p>";
		header("Location: \\Pet4Web/index.php");
	?>

</body>
</html>