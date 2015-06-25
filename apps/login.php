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
	<title>Login</title>
</head>
<body>
<?php
	require_once("database.php");
	try{
		$db= new Database();
	}catch(Exception $e){
		die("Serverul a intalnit o eroare: ".$e->getMessage());
	}

	try{
		//$rez=$db->execFetchAll("select count(username) as cont from admin where username='".$_REQUEST['nume']."'");
		$rez=$db->execFetchAll("select count(username) as cont from admin where username=:reqn",array(array(":reqn",htmlspecialchars($_REQUEST['nume']),-1)));
	}catch(Exception $e){
		die("Serverul a intalnit o eroare: ".$e->getMessage());
	}
	foreach($rez as $r){
		$cont=$r['CONT'];
	}

	if($cont!=0){
		try{
			$rez=$db->execFetchAll("select ltrim(rtrim(passwd)) as passwd from admin where username=:reqn1",array(array(":reqn1",htmlspecialchars($_REQUEST['nume']),-1)));
		}catch(Exception $e){
			die("Serverul a intalnit o eroare: ".$e->getMessage());
		}
		foreach($rez as $r){
			$pass=$r['PASSWD'];
		}
		$pass= preg_replace('/\s+/', '',$pass);
		if($pass==$_REQUEST['passwd']){
			$_SESSION['admin']="ok";
			header("Location:\\Pet4Web/admin.php");
		}
		else{
			echo "<p>Parola este gresita!</p>";
			header("refresh:2;url=\\Pet4Web/index.php");
		}
	}
	else{

		try{
			$rez=$db->execFetchAll("select count(username) as cont from utilizatori where username=:reqn2",array(array(":reqn2",htmlspecialchars($_REQUEST['nume']),-1)));
		}catch(Exception $e){
			die("Serverul a intalnit o eroare: ".$e->getMessage());
		}
		foreach($rez as $r){
			$cont=$r['CONT'];
		}
		if ($cont!=0){
			try{
				$rez=$db->execFetchAll("select ltrim(rtrim(passwd)) as passwd from utilizatori where username=:reqn",array(array(":reqn",htmlspecialchars($_REQUEST['nume']),-1)));
			}catch(Exception $e){
				die("Serverul a intalnit o eroare: ".$e->getMessage());
			}
			foreach($rez as $r){
				$pass=$r['PASSWD'];
			}
			$pass= preg_replace('/\s+/', '',$pass);
			if($pass==$_REQUEST['passwd']){
				$_SESSION['username']=$_REQUEST['nume'];
				$_SESSION['password']=$pass;
				?>
				<p>Ati fost logat cu succes.O sa fiti redirectat pe pagina principala in 5 secunde.</p>
				<?php
				header("Location: \\Pet4Web/index.php");
			}
			else{
				?>
				<p>Numele de utlizator sau parola sunt gresite .O sa fiti redirectat pe pagina de login in 5 secunde.</p>
				<?php
				header("refresh:2;url=\\Pet4Web/login.php");
			}
		}
		else{
			?>
				<p>Numele de utlizator nu exista. O sa fiti redirectat pe pagina de login in 5 secunde.</p>
				<?php
				header("refresh:2;url=\\Pet4Web/login.php");
		}
	}
?>	
</body>
</html>
