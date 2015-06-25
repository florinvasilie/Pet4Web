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
	<script src="resources/js/afisarebutoane.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		function paginareUser(val) { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        ajax1 = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        ajax1 = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    ajax1.onreadystatechange = function() {
		        if (ajax1.readyState == 4 && ajax1.status == 200) {
		            document.getElementById("listapet").innerHTML = ajax1.responseText;
		        }
		    }
		    ajax1.open("GET","\\Pet4Web/apps/paguser.php?Page="+val,true);
		    ajax1.send();
		}
		
		function init(){
			showButton();
			paginareUser(1);
		}
	</script>
</head>
<body onload="init()">
<div class="container">
	<?php
		require_once("header.php");
		require_once("apps/database.php");
	?>
	
			<?php
				try{
					$db=new Database();
				}
				catch(Exception $e){
					die("Serverul a intalnit o eroare: ".$e->getMessage());
				}
				$sql="select nume,email,data_nasterii from utilizatori where username='".$_SESSION['username']."'";
				try{
					$rez=$db->execFetchAll($sql);
				}
				catch(Exception $e){
					die("Serverul a intalnit o eroare: ".$e->getMessage());
				}

				$afis="<aside>";
				$afis.="<h2>Informatii</h2>";
				$afis.="<ul class=\"categories\">";
				foreach($rez as $r){
					$afis.="<li>Nume: ".$r['NUME']."</li>";
					$afis.="<li>Email: ".$r['EMAIL']."</li>";
					$afis.="<li>Data nasterii: ".$r['DATA_NASTERII']."</li>";
				}
				$sql="select count(id_petitie) as test from petitii where username='".$_SESSION['username']."'";
				try{
					$rez=$db->execFetchAll($sql);
				}
				catch(Exception $e){
					die("Serverul a intalnit o eroare: ".$e->getMessage());
				}
				foreach($rez as $r){
					$afis.="<li>Numarul de petiti propuse: ".$r['TEST']."</li>";
				}

	
				$afis.="<li><a class=\"btn-primary\"href=\"modificare.php\">Editeaza cont</a></li>
				</ul>
			</aside>";
			?>

		<div class="main-content" id="listapet"></div>
		<?php
			echo $afis;

			require_once("footer.php");
		?>
</div>

</body>
</html>