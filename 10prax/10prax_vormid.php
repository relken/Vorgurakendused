<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>10-praktikum-vormid</title>
		<style>
			#tekst{
			  background-color: <?php if(isset($_POST['taustaVarvus'])){$taustaVarvus=htmlspecialchars($_POST['taustaVarvus']);
				echo $_POST['taustaVarvus'];} ?>;
			  color:  <?php if(isset($_POST['tekstiVarvus'])){$tekstiVarvus=htmlspecialchars($_POST['tekstiVarvus']);
				echo $_POST['tekstiVarvus'];} ?>;
			  border-color:   <?php if(isset($_POST['piirVarvus'])){$piirVarvus=htmlspecialchars($_POST['piirVarvus']);
				echo $_POST['piirVarvus'];} ?>;
			  border-style:  <?php if(isset($_POST['piirjoonStiil'])){$piirjoonStiil=htmlspecialchars($_POST['piirjoonStiil']);
				echo $_POST['piirjoonStiil'];} ?>;
			  border-width: <?php if(isset($_POST['piirjoonLaius'])){$piirjoonLaius=htmlspecialchars($_POST['piirjoonLaius']);
				echo $_POST['piirjoonLaius']."px";} ?>;
			  font-family: <?php if(isset($_POST['tekstFont'])){$tekstFont=htmlspecialchars($_POST['tekstFont']);
				echo $_POST['tekstFont'];} ?>;
			}
		</style>
		<?php 
		$taustaVarvus = '#660000';
		$tekstiVarvus = '#0000ff';
		$piirjoonLaius = '5';
		
		?>
		
	</head>
  
	<body>  
		<div id="tekst"> <?php if (isset($_POST['sisestus'])){$sisestus=htmlspecialchars($_POST['sisestus']);echo $_POST['sisestus'];} ?>
		</div>
		<br>
		
		<form action="10prax_vormid.php" method="POST">
			<textarea rows="10" cols="100" name="sisestus" placeholder="Sisesta siia tekst"><?php if(isset($_POST['sisestus'])) echo htmlspecialchars($_POST['sisestus']); ?></textarea>
			<br>
			<br>
			<input type="color" name="taustaVarvus" value="<?php if(isset($_POST['taustaVarvus'])) {echo htmlspecialchars($_POST['taustaVarvus']);}
				else {echo $taustaVarvus;}?>">Vali taustavärv</input>			
			<input type="color" name="tekstiVarvus" value="<?php if(isset($_POST['tekstiVarvus'])) {echo htmlspecialchars($_POST['tekstiVarvus']);}
				else {echo $tekstiVarvus;}?>">Vali tekstivärv</input>
			<input type="color" name="piirVarvus" value="<?php if(isset($_POST['piirVarvus'])) echo htmlspecialchars($_POST['piirVarvus']);?>">Vali piirjoone värvus</input>
			<br>
			<br>
			<select name="piirjoonStiil">
			    <option value="" disabled selected hidden <?php if(isset($_POST["piirjoonStiil"]) && $_POST["piirjoonStiil"] == "") echo "selected"; ?>>Vali piirjoone stiil</option>
				<option value="dashed" <?php if(isset($_POST["piirjoonStiil"]) && $_POST["piirjoonStiil"] == "dashed") echo "selected"; ?>>dashed</option>
				<option value="groove" <?php if(isset($_POST["piirjoonStiil"]) && $_POST["piirjoonStiil"] == "groove") echo "selected"; ?>>groove</option>
				<option value="ridge" <?php if(isset($_POST["piirjoonStiil"]) && $_POST["piirjoonStiil"] == "ridge") echo "selected"; ?>>ridge</option>
				<option value="solid" <?php if(isset($_POST["piirjoonStiil"]) && $_POST["piirjoonStiil"] == "solid") echo "selected"; ?>>solid</option>
			</select>
			<br>
			<br>
			<input type="number" min="0" max="100" name="piirjoonLaius" value="<?php if(isset($_POST['piirjoonLaius'])) {echo htmlspecialchars($_POST['piirjoonLaius']);}
				else {echo $piirjoonLaius;}?>">Vali piirjoone laius</input>
			<br>
			<br>
			<select name="tekstFont">
				<option value="" disabled selected hidden <?php if(isset($_POST["tekstFont"]) && $_POST["tekstFont"] == "") echo "selected"; ?>>Vali teksti font</option>
				<option value="Times New Roman" <?php if(isset($_POST["tekstFont"]) && $_POST["tekstFont"] == "Times New Roman") echo "selected"; ?>>Times New Roman</option>
				<option value="Georgia" <?php if(isset($_POST["tekstFont"]) && $_POST["tekstFont"] == "Georgia") echo "selected"; ?>>Georgia</option>
				<option value="Arial" <?php if(isset($_POST["tekstFont"]) && $_POST["tekstFont"] == "Arial") echo "selected"; ?>>Arial</option>
				<option value="Verdana" <?php if(isset($_POST["tekstFont"]) && $_POST["tekstFont"] == "Times Verdana Roman") echo "selected"; ?>>Verdana</option>
			</select>
			<br>
			<br>
			<button type="submit" name="saada">Saada</button>
		</form>
		
	</body>
</html>