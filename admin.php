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
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		function mesajeAdmin(val) { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        ajax1 = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        ajax1 = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    ajax1.onreadystatechange = function() {
		        if (ajax1.readyState == 4 && ajax1.status == 200) {
		            document.getElementById("mesaje").innerHTML = ajax1.responseText;
		        }
		    }
		    ajax1.open("GET","\\Pet4Web/apps/afismes.php?Page="+val,true);
		    ajax1.send();
		}
	</script>
</head>
<body onload="mesajeAdmin(1)">
<div class="container">
	<?php
		if(isset($_SESSION['admin']) && $_SESSION['admin']=="ok"){
			?>
			<header>
					<div class="logo">
						<a href="admin.php"><img src="public/imagini/logo.png" alt="Pet4Web"></a>
							<h1><em>Pet4Web</em></h1>
					</div>
					<nav class="primary-navigation">
						<ul>
							<li><a href="generareHTML.php">Generare raport HTML</a></li>
							<li><a href="generarePDF.php">Generare raport PDF</a></li>
							<li><a href="generareCSV.php">Generare raport CSV</a></li>
							<li><a class="btn-primary" href="logout.php">Logout</a></li>
						</ul>
					</nav>	
			</header>
		<?php
			echo "<div class=\"main-content\">";
			echo "<p>Aceasta este zona admin</p>";
			echo "<div id=\"mesaje\"></div>";
			echo "</div>";
		}
		else{
			header("Location:\\Pet4Web/index.php");
		}
	?>
</div>
</body>
</html>