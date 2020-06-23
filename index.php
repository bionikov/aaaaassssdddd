<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styl3.css">
<title>Dane o zwierzętach</title>
</head>
<body>

<header>
<h1>ATLAS ZWIERZĄT</h1>
</header>

<section id="formularz">
<h2>Gromady</h2>
<ol style="list-style-position: inside">
	<li>Ryby</li>
	<li>Płazy</li>
	<li>Gady</li>
	<li>Ptaki</li>
	<li>Ssaki</li>
</ol>
<form action="" method="POST">
Wybierz gromadę: <input type="number" name="liczba"><input type="submit" value="Wyświetl">
</form>
</section>
<section id="lewy">
<img src="zwierzeta.jpg" alt="dzikie zwierzeta">
</section>

<section id="srodek">
<?php
	 error_reporting(0);
	 $connect =mysqli_connect('localhost','root','','baza');
	 if(!$connect){
		 echo "Błąd połączenia";
	 }
	 if(!isset($_POST['liczba'])){
	 }else{
	$l=$_POST['liczba'];
	if($l>5 OR $l<0){
	}else{
	$tab=Array("","RYBY","PŁAZY","GADY","PTAKI","SSAKI",);
	echo "<h1>$tab[$l]</h1>";
	 $sql="SELECT zwierzeta.gatunek,zwierzeta.wystepowanie FROM zwierzeta WHERE zwierzeta.Gromady_id=$l";
	 $query= mysqli_query($connect,$sql);
		while ($linia=mysqli_fetch_assoc($query))
		{
		 	echo $linia['gatunek']." ".$linia['wystepowanie']."<br><br>";
		}
	 }
	 }
		 mysqli_close($connect);
?>
</section>
<section id="prawy">
<h2>Wszystkie zwierzęta w bazie</h2>

<?php
	 $connect =mysqli_connect('localhost','root','','baza');
	 if(!$connect){
		 echo "Błąd połączenia";
	 }
	 $sql="SELECT zwierzeta.id, zwierzeta.gatunek,gromady.nazwa FROM zwierzeta,gromady WHERE zwierzeta.Gromady_id = gromady.id";
	 $query= mysqli_query($connect,$sql);
		while ($linia=mysqli_fetch_assoc($query))
		{
		 	echo $linia['id'].". ".$linia['gatunek'].","." ".$linia['nazwa']."<br>";
		 }
		 mysqli_close($connect);
?>
</section>

<footer>
<a href="http://atlas-zwierzat.pl" target="_blank">Poznaj inne  strony o zwierzętach</a>
		autor Atlasu zwierząt: Jakub Wajszczyk
</footer>

</body>
</html>
