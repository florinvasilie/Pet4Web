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
<html>
<head>
	<title>q</title>
</head>
<body>
	<?php
		require_once("database.php");
		$id=$_GET['id'];
		try{
			$db=new Database();
		}
		catch(Exception $e){
			die("Serverul a intalnit o eroare: ".$e->getMessage());
		}
		$sql="delete from petitii where id_petitie=:id";
		try{
			$db->execute($sql,array(array(":id",htmlspecialchars($id),-1)));
		}
		catch(Exception $e){
			die("Serverul a intalnit o eroare: ".$e->getMessage());
		}
		$sql="delete from semnaturi where id_petitie=:id";
		try{
			$db->execute($sql,array(array(":id",htmlspecialchars($id),-1)));
		}
		catch(Exception $e){
			die("Serverul a intalnit o eroare: ".$e->getMessage());
		}
		header("location:\\Pet4Web/userpage.php");
	?>
</body>
</html>