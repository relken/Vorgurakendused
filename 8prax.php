<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>8-praktikum</title>
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
				echo $_POST['piirjoonLaius'];} ?>;
			  font-family: <?php if(isset($_POST['tekstFont'])){$tekstFont=htmlspecialchars($_POST['tekstFont']);
				echo $_POST['tekstFont'];} ?>;
			}
		</style>
	</head>
  
	<body>  
		<div id="tekst"> <?php if (isset($_POST['sisestus'])){$sisestus=htmlspecialchars($_POST['sisestus']);
			echo $_POST['sisestus'];} ?>
		</div>
		<br>
		
		<form action="8prax.php" method="POST">
			<textarea rows="10" cols="100" name="sisestus" placeholder="Sisesta siia tekst"></textarea>
			<br>
			<br>
			<input type="color" name="taustaVarvus" value="#FFFFFF">Vali taustavärv</input>
			<input type="color" name="tekstiVarvus" value="#000000">Vali tekstivärv</input>
			<input type="color" name="piirVarvus" value="#000000">Vali piirjoone värvus</input>
			<br>
			<br>
			<select name="piirjoonStiil">
				<option value="" disabled selected hidden>Vali piirjoone stiil</option>
				<option value="dashed">dashed</option>
				<option value="groove">groove</option>
				<option value="ridge">ridge</option>
				<option value="solid">solid</option>
			</select>
			<br>
			<br>
			<input type="number" min="0" max="10" value="5" name="piirjoonLaius">Vali piirjoone laius</input>
			<br>
			<br>
			<select name="tekstFont">
				<option value="" disabled selected hidden>Vali teksti font</option>
				<option value="Times New Roman">Times New Roman</option>
				<option value="Georgia">Georgia</option>
				<option value="Arial">Arial</option>
				<option value="Verdana">Verdana</option>
			</select>
			<br>
			<br>
			<button type="submit" name="saada">Saada</button>
		</form>
		
	</body>
</html>