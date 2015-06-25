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
	<title>Modifica</title>
</head>
<body>
	<?php
		require_once("database.php");
		if(!htmlspecialchars($_REQUEST["parola"])){
			echo "<p>Nu ati specificat parola!</p>";
			die();
		}
		if(!htmlspecialchars($_REQUEST["nume"])){
			echo "<p>Nu ati introdus numele dvs!</p>";
			die();
		}
		if(!htmlspecialchars($_REQUEST["datan"])){
			echo "<p>Nu ati specificat data nasterii!</p>";
			die();
		}
		try{
		$db = new Database();
		}catch(Exception $e){
			header("refresh:2;url=\\Pet4Web/index.php");
			die("Eroare server: ".$e->getMessage());
		}
		// $sql="UPDATE utilizatori SET passwd='".$_REQUEST["parola"]."',
	 //    	nume='".$_REQUEST["nume"]."',
	 //    	data_nasterii=TO_DATE('".$_REQUEST["datan"]."','YYYY-MM-DD')
	 //    	WHERE username='".$_REQUEST["username"]."'";
		$sql="UPDATE utilizatori SET passwd=:parola,
	    	nume=:nume,
	    	data_nasterii=TO_DATE(:datan,'YYYY-MM-DD')
	    	WHERE username=:username";
		try{
			$db->execute($sql,array(array(":parola",htmlspecialchars($_REQUEST['parola']),-1),array(":nume",htmlspecialchars($_REQUEST['nume']),-1),array(":datan",htmlspecialchars($_REQUEST['datan']),-1),array(":username",htmlspecialchars($_REQUEST['username']),-1)));
		}catch(Exception $e){
			header("refresh:2;url=\\Pet4Web/index.php");
			die("Eroare server: ".$e->getMessage());
		}
		$_SESSION['password']=$_REQUEST['parola'];
		echo "<p>Datele au fost modificate cu succes! Veti fi redirectat pe pagina contului</p>";
		header("Location: \\Pet4Web/userpage.php");
	?>
</body>
</html>