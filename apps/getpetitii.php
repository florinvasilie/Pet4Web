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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Get Petitii</title>
</head>
<body>
	<?php
		require_once("database.php");
		$req=$_GET['q'];
		if($req=="top"){
			$sql="SELECT * FROM (SELECT id_petitie,titlu,username,data_postarii FROM petitii ORDER BY vizualizari DESC) WHERE rownum<=5";
		}
		else{
			$sql="SELECT * FROM (SELECT id_petitie,titlu,username,data_postarii FROM petitii ORDER BY data_postarii DESC) WHERE ROWNUM<=5";
		}
		if ($sql!=''){
			try{
				$db=new Database();
				$rez=$db->execFetchAll($sql);
				if($rez==null){
					echo "<p>Nu sunt petitii de afisat!</p>";
					die();
				}
				echo "<table>
				<tr>
				<th>Titlu</th>
				<th>Utilizator</th>
				<th>Data postarii</th>
				</tr>";
				foreach ($rez as $r) {
					echo "<tr>";
					echo "<td><a href=\"details.php?id=".$r['ID_PETITIE']."\">". $r['TITLU'] . "</a></td>";
				    echo "<td>" . $r['USERNAME'] . "</td>";
				    echo "<td>" . $r['DATA_POSTARII'] . "</td>";
				    echo "</tr>";
				}
				echo "</table>";
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
	?>
</body>
</html>