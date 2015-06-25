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
	<script src="resources/js/afisarepetitii.js" type="text/javascript"></script>
	<script src="resources/js/afisarebutoane.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		function start(){
			showButton();
			showPetition("top");
		}
	</script>
</head>
<body onload="start()">
<div class="container">
	<?php
		require_once("header.php");
		require_once("leftside.php");
	?>
	<div class="main-content">
		<h2>Petitii</h2>
		<form>
			<label for="sort" class="sr-only">Display</label>
			<select name="afisare" onchange="showPetition(this.value)" id="sort">
				<option value="top">Top petitii</option>
				<option value="new">Cele mai noi</option>
			</select>
		</form>
		<div id="petitii"></div>
		<?php
			require_once("footer.php");
		?>
	</div>
</div>
</body>
</html>