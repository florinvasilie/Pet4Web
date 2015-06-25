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
	require_once("database.php");
	if (isset($_SESSION['username'])){
		try{
			$db=new Database();
			$sql="select passwd from utilizatori where username='".$_SESSION['username']."'";
			$rez=$db->execFetchAll($sql);
			if($rez==null){
				echo "<li><a class=\"btn-primary\" href=\"\\Pet4Web/login.php\">Login</a></li>";
				die();
			}
			foreach($rez as $r){
				$pass=$r['PASSWD'];
				$pass= preg_replace('/\s+/', '',$pass);
				if ($pass==$_SESSION['password']){
					echo "<li><a class=\"btn-primary\" href=\"\\Pet4Web/userpage.php\">Contul meu</a></li>";
					echo "<li><a class=\"btn-primary\" href=\"\\Pet4Web/logout.php\">Logout</a></li>";
				}
				else{
					session_destroy();
					echo "<li><a class=\"btn-primary\" href=\"\\Pet4Web/login.php\">Login</a></li>";
				}
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	else{
		echo "<li><a class=\"btn-primary\" href=\"\\Pet4Web/login.php\">Login</a></li>";
	}
?>