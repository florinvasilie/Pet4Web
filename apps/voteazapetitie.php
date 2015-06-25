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
<!DOCTYPE HTML>
<html>
<head>
	<title>Voteaza</title>
</head>
<body>
	<?php
		require_once("database.php");

		$id=$_GET['id'];

		try{
			$db=new Database();
		}catch(Exception $e){
			header("refresh:5;url=\\Pet4Web/index.php");
			die("A aparut o eroare: ".$e->getMessage().". Veti fi redirectionat in 5 secunde");
		}
		$sql="insert into semnaturi (id_petitie, username) values (:id,'".$_SESSION['username']."')";
		try{
			$db->execute($sql,array(array(":id",$id,-1)));
		}catch(Exception $e){
			header("refresh:5;url=\\Pet4Web/index.php");
			die("A aparut o eroare: ".$e->getMessage().". Veti fi redirectionat in 5 secunde");
		}
		echo "<p>Ati votat. Multumim! Veti fi redirectat.</p>";
		header("Location: \\Pet4Web/details.php?id=".$id);
	?>
</body>
</html>