<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.1/mustache.js"></script>
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<?php 
	include('json/rooter.php');
	  ?>
	</head>
	<body>
		<form action="#" method="post">

			<input type="text" name="search" id="search" placeholder="">
			<button type="submit">recherche</button>
			<select id="select">
				<option value="">Recherche par</option>
				<option value="test.php?root=music_title">Titre de musique</option>
				<option value="test.php?root=search_albums">Titre album</option>
				<option value="test.php?root=music_gender">Genre</option>
				<option value="test.php?root=search_artists">Nom artiste</option>
			</select>
			<select id="nb_result">
				<option value="">Nombre de résultats</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">25</option>
				<option value="30">30</option>
				<option value="50">50</option>
			</select>
			<button type="submit"><a href="test.php?root=listing_artists">Lister tous les artistes</a></button>
			<button type="submit"><a href="test.php?root=listing_albums">Lister tous les albums</a></button>


		</form>

		<ul id="example">

		</ul>	
</body>
<?php include('template/mustache/display.php');?>
</html>