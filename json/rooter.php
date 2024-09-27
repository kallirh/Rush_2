<?php
include('modele/base.php');
include('modele/artists.php');
include('modele/search.php');
include('modele/Music.class.php');
include('modele/albums.php');

if(!isset($_GET['root']))
{
	die("Aucune route défini en paramètre");
}
else if(substr($_GET['root'], 0, 6) === "search")
{
	$pdo = new Search();
}
else if(substr($_GET['root'], 0, 7) === "listing")
{
	$pdo = new Artist();
}
else if(substr($_GET['root'], 0, 5) === "music")
{
	//echo"o";
	$pdo = new Music();
}


if(isset($_POST['search']))
{
	$search = $_POST['search'];
}
//var_dump($search);

/* ---------- */
/* API ROUTER */
/* ---------  */


switch($_GET['root']) 
{

	/* ---------------- */
	/* PARTIE RECHERCHE */
	/* ---------------  */

	/* Recherche albums par titre */
	case 'search_albums' :
	if(!empty($search))
	{
		$query = $pdo->searchAlbumTitle($search);
		$return['liste_album'] = $query;
		$results = $pdo->return_json(true, "Liste albums", $return);
//var_dump($results);
//echo json_encode($results);
	}
	break;


	/* Recherche artiste par nom */
	case 'search_artists' :
	if(!empty($search))
	{
		$query = $pdo->searchArtists($search);
		$return['liste_artiste'] = $query;
		$return['liste_albums'] = [];
		$results = $pdo->return_json(true, "Liste artiste contenant :".$search."", $return);

	foreach ($results as $key) {
	}
	for ($i=0; $i < count($key['liste_artiste']) ; $i++) { 
	//var_dump($key['liste_artiste'][$i]['id']);
		$id_artist = $key['liste_artiste'][$i]['id'];
		$albums = $pdo->searchAlbumsOf($id_artist);
		foreach($albums as $list){
			$return['liste_albums'][$id_artist] .= $list['name'].". ";
		}
	}
		$results = $pdo->return_json(true, "Liste album contenant :".$search."", $return);
	}
	break;

	/* Recherche musique par titre */
	case 'music_title' :
	if(!empty($search))
	{
		$query = $pdo->getTracksInfo($search);
		$return['fiche_musique'] = $query;
		$results = $pdo->return_json(true, "Liste musique contenant : ".$search."", $return);
//echo json_encode($results);
	}
	break;

	/* Recherche musique par genre */
	case 'music_gender' :
	if(!empty($search))
	{
		$query = $pdo->searchMusicGender($search);
		$return['fiche_musique'] = $query;
		$results = $pdo->return_json(true, "Liste musique par genre :".$search."", $return);
//echo json_encode($results);
	}
	break;
	/* ------------- */
	/* FIN RECHERCHE */
	/* ------------  */


	/* ---------------- */
	/* PARTIE LISTING   */
	/* ---------------  */

	/* Lister tous les artistes */
	case 'listing_artists' :
	$query = $pdo->getAllArtists();
	$return['liste_artiste'] = $query;
	$return['liste_albums'] = [];
	$results = $pdo->return_json(true, "Liste tous artistes", $return);
	/*foreach ($results as $key) {
	}
	for ($i=0; $i < count($key['liste_artiste']) ; $i++) { 
		$id_artist = $key['liste_artiste'][$i]['id'];
	//var_dump($id_artist);
		$albums = $pdo->searchAlbumsOf($id_artist);
		foreach($albums as $list){
			if(isset($return['liste_albums']))
			{
			//var_dump($list);
			$return['liste_albums'][$id_artist] .= $list['name'].'. ';}
		}
	}
	$results = $pdo->return_json(true, "Liste tous artistes", $return);
*/
//echo json_encode($results);

	break;

	case 'listing_albums' :
	$query = $pdo->getInfosAlbums();
	$return['liste_album'] = $query;
	$results = $pdo->return_json(true, "Liste tous albums", $return);
//echo json_encode($results);
	break;

	/* ------------- */
	/* FIN LISTING   */
	/* ------------  */

	default:
	die("Cette route n'existe pas");
	break;
}

