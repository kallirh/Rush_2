<?php

class Music extends Database 
{
	public function getTracksInfo($name)
	{
		$tracks = $this->select('tracks.name as track_name, 
			tracks.duration as duration, tracks.mp3 as mp3, 
			albums.name as album_name, albums.cover as cover', 
			'tracks left join albums on tracks.album_id = albums.id 
			where tracks.name like "%'.$name.'%"');

		return $tracks;
	}

/*Faire une recherche:
– Par genre*/
	public function searchMusicGender($gender)
	{
		$query = $this->select("*", "genres, genres_albums, albums WHERE genres.id = genres_albums.genre_id AND genres_albums.album_id = albums.id AND genres.name = '".$gender."'");
		return $query;
		
	}
}