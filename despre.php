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
?>
	<div class="main-content new-petition">
		<h2>Despre noi</h2>
			<p>Multumim ca ati vizitat situl nostru!</p>
			<p>
				Noi suntem doi studenti care au decis sa inceapa calatoria in lumea tehnologiilor WEB prin intermediul acestui proiect, Pet4Web.
				Acest proiect presupune livrarea catre utilizator a unei aplicatii WEB care sa permita gestionarea usoara a petitiilor. In cazul in care nu va
				descurcati cu interfata si utilizarea sitului v-am pus la dispozitie un manual simplificat pentru a va invata cum sa navigati in cadrul sitului.
			</p>
			<h3>Feedback</h3>
			<p>
				Speram ca v-a placut situl si in caz aveti vreo nelamurire sau daca doriti sa ne lasati un feedback prin intermediul formularului de contact.
			</p>
	</div>
	<?php
		require_once("leftside.php");
		require_once("footer.php");
	?>
</div>
</body>
</html>