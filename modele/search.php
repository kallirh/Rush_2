<?php

class Search extends Database
{	

	
/*Faire une recherche:
– Par titre de la musique*/
	public function searchMusicTitle($search)
	{
		$query = $this->select("*", "tracks WHERE name LIKE '%".$search."%'");
		//var_dump($query);
		return $query;
	}

/*Faire une recherche:
– Par titre de l’album*/
	public function searchAlbumTitle($search)
	{
		$query = $this->select("*", "albums WHERE name LIKE '%".$search."%'");

		return $query;
	}

/*Faire une recherche:
– Par nom de l’artiste*/
	public function searchArtists($name)
	{
		$query = $this->select('*', 'artists WHERE name LIKE "%'.$name.'%"');
		return $query;
	}
	public function searchAlbumsOf($id_artist)
	{
		$albums = $this->select('*', '`albums` WHERE `artist_id` = '.$id_artist.'');
		return $albums;
	}

}