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
	<title>Detalii</title>
	<script src="resources/js/afisarebutoane.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://apis.google.com/js/platform.js" async defer>
  		{lang: 'ro'}
	</script>
</head>
<body onload="showButton()">
<div class="container">
	<?php
		require_once("header.php");
		require_once("apps/database.php");

		if(!$_GET["id"]){
			die("A aparut o eroare!");
		}
		$id=$_GET["id"];
		?>
		<div class="main-content new-petition">
		<?php
		try{
			$db=new Database();
			$sql="SELECT * FROM PETITII WHERE ID_PETITIE=:var";
			$rez=$db->execFetchAll($sql,array(array(":var",$id,-1)));
			foreach($rez as $r){
				echo "<p>Titlu: ".$r['TITLU']."</p>";
				echo "<p>Autor: ".$r['USERNAME']."</p>";
				echo "<p>Destinatar: ".$r['DESTINATAR']."</p>";
				echo "<p>Categorie: ".$r['CATEGORIE']."</p>";	
				echo "<p>Mesaj: ".$r['CONTINUT']."</P>";
				echo "<p>Vizualizari: ".$r['VIZUALIZARI']."</p>";
				$sql="UPDATE PETITII SET VIZUALIZARI=".$r['VIZUALIZARI']."+1 WHERE ID_PETITIE=:var";
				$rez=$db->execute($sql,array(array(":var",$id,-1)));
			}
			$sql="select count(id_petitie) as voturi from semnaturi where id_petitie=".$id;
			$rez=$db->execFetchAll($sql);
			foreach($rez as $r){
				echo "<p>Voturi: ".$r['VOTURI']."</p>";
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	?>

		<?php
		if (isset($_SESSION['username'])){
			try{
				$sql="select passwd from utilizatori where username='".$_SESSION['username']."'";
				$rez=$db->execFetchAll($sql);
				foreach($rez as $r){
					$pass=$r['PASSWD'];
					$pass= preg_replace('/\s+/', '',$pass);
				}
				if ($pass==$_SESSION['password']){
					$sql="select count(username) as test from semnaturi where id_petitie='".$id."' and username='".$_SESSION['username']."'";
					try{
						$rez=$db->execFetchAll($sql);
					}catch(Exception $e){
						echo "<p>A aparut o eroare.</p>";
					}
					foreach($rez as $r){
						$test=$r['TEST'];
					}
					if($test){
						echo "<p>Ati votat aceasta petitie. Multumim! </p>";
					}

					else {
						echo "<a class=\"btn-primary\" href=\"apps/voteazapetitie.php?id=".$id."\">Voteaza</a><br><br>";
					}
				}
				else{
					session_destroy();
					echo "<a class=\"btn-primary\" href=\"\\Pet4Web/login.php\">Login</a>";
				}
				
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
		else{
			echo "<h2>Logati-va pentru a putea vota</h2>";
		}
	?>

	<a href="https://twitter.com/share" class="twitter-share-button" data-size="large">Tweet</a>
	<script>!
	function(d,s,id){
		var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		if(!d.getElementById(id)){
			js=d.createElement(s);
			js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
			fjs.parentNode.insertBefore(js,fjs);
		}
		}
		(document, 'script', 'twitter-wjs');
	</script>
	<div class="g-plusone" data-annotation="inline" data-width="300"></div>
	</div>
	<?php
	require_once("leftside.php");
	require_once("footer.php");
	?>
</div>
</body>
</html>