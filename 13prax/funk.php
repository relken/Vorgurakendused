<?php
header("Content-type: text/html; charset=utf-8");

function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
		// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	$errors = array();
	if(isset($_SESSION['user'])){kuva_puurid();} else {
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['user'])) {
				$kasutaja = mysqli_real_escape_string($connection, htmlspecialchars($_POST['user']));
				} else {$errors[] = "Kasutajanimi puudu, palun sisesta";}
			if(!empty($_POST['pass'])) {
				$passw = mysqli_real_escape_string($connection, htmlspecialchars($_POST['pass']));
				} else {$errors[] = "Parool puudu, palun sisesta";}			
			$sql = "SELECT id FROM relken_kylastajad WHERE username='$kasutaja' AND passw=SHA1('$passw')";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_num_rows($result);
			if($row >=1){
				$_SESSION['user'] = $kasutaja;
				header("Location: ?page=loomad");
				} else {header("Location: ?page=login");}
		}
	}
	include('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	if (!isset($_SESSION['user'])) {
		header("Location: ?page=login");
		} else {
	global $connection;
	mysqli_set_charset($connection, 'utf8');
	$puur = array();
	$query = "SELECT DISTINCT(puur) FROM rain_loomaaed";
	$result = mysqli_query($connection, $query);
		while($row = $result->fetch_assoc()){
		$puur = $row;
			foreach($puur as $puur_nr){
				$query_loomad = "SELECT * FROM rain_loomaaed WHERE puur=". $puur_nr;
				$result_loom = mysqli_query($connection, $query_loomad);
					while($row = $result_loom->fetch_assoc()){
					$puur[$puur_nr][]=$row;
					}
			} include('views/puurid.html');
		}
	}		
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	$errors = array();
	if (!isset($_SESSION['user'])) {header("Location: ?page=login");} 
	else {
		if (!empty($_POST)){
			if (empty($_POST['nimi'])) {$errors[]="Nimi peab olema täidetud";}
			if (empty($_POST['puur'])) {$errors[]="Puur peab olema täidetud";}
			if (empty($_FILES['liik']['name'])) {$errors[]="Pilt peab olema lisatud";}
			if (empty($errors)){
				$nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
				$puur = mysqli_real_escape_string($connection, $_POST['puur']);
				$liik = mysqli_real_escape_string($connection, "pildid/".$_FILES['liik']['name']);
				upload('liik');
				$sql = "INSERT INTO rain_loomaaed (nimi, liik, puur) VALUES ('$nimi', '$liik', '$puur')";
				echo mysqli_query($connection, $sql);
				$kontroll = mysqli_insert_id($connection);
				if ($kontroll >=1){
						header("Location: ?page=loomad");
				} else {
						kuva_puurid();
				}
			}
		}
	
	}
	include_once('views/loomavorm.html');	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>