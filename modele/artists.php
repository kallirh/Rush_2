<?php
class Artist extends Database
{



/*	 Trouver les artistes et récupérer:
– Leur description
– Leur biographie
– Leurs albums
– Leur photos
*/
public function getArtistInfo($name)
	{
		$artists = $this->select('artists.name as name, artists.bio as bio, 
			albums.name as albums, artists.description as desc, 
			artists.photo as photo', 'artists 
			left join albums on artists.id = albums.artist_id 
			where artists.name like "%'.$name.'%"');

		return $artists;
	}

	/*Lister tout les artistes*/
	public function getAllArtists()
	{
	$artists = $this->select('*', 'artists');
	return $artists;
	}

/*
Dans les albums récupérés:
– Leurs musiques
– Leur genre
– Le nombre de tracks
– La photo de l’album
– Leur popularité
– Leur année de création */

	public function getInfosAlbums()
	{
	$albums = $this->select('*', 'albums');
	return $albums;
	}

	public function getAlbumsOf($id_artist)
	{
		$albums = $this->select('*', '`albums` WHERE `artist_id` = '.$id_artist.'');
		return $albums;
	}
/*	public function getAlbumsOf($artiste)
	{
		$albums = $this->select('*', 'albums, artists WHERE albums.artist_id = artists.id AND artists.name LIKE '.$artiste.'');
		return $albums;
	}*/

}