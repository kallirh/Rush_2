<script>
	$(function(){
		$('#select').on('change', function () {
			var url = $(this).val(); 
			if (url) { 
				window.location = url;
			}
			return false;
		});
		$( "button" ).click(function() {
			alert("ok");
});

	});
</script>

<?php 


$root = $_GET["root"];

if($root === "music_title" || $root === "music_gender")
{
	?>

	<script type="text/mustache" id="test">
		<li><strong>Nom musique</strong> : {{name}}</li>
		<li><strong>Album</strong> : <img src="{{photo}}"></li>
		<li><strong> Durée </strong>: {{duration}}"></li>
		<audio controls="controls"><source src="{{mp3}}" type="audio/mp3" /></audio>
	</script>
	<script type="text/javascript" src="javascript/mustache/listing/listing_music.js">

	</script>
	<?php 
}

elseif($root === "search_artists" || $root === "listing_artists")
{
	?>

	<script type="text/mustache" id="test">
		<li><strong>Nom</strong> : {{name}}</li>
		<li><strong>Biographie</strong> : {{bio}}</li>
		<li><strong>Description</strong> : {{description}}</li>
		<li><strong>Photo</strong> : <img src="{{photo}}"></li>
		<div id="display_album"> 
		<button>Afficher tous les albums</button></div>
		<li id="albums"><strong>Albums</strong> : {{album}}</li>
	</script>
	<script type="text/javascript" src="javascript/mustache/listing/listing_artists.js">
	</script>
	<?php  
}

elseif($root === "search_albums" || "listing_albums")
{
	?>

	<script type="text/mustache" id="test">
		<li><strong>Nom de l'album</strong> : {{name}}</li>
		<li><img src="{{photo}}"></li>
		<li><strong>Popularité</strong> :{{popularity}}</li>
		<li><strong>Description</strong> : {{description}}</li>
	</script>
	<script type="text/javascript" src="javascript/mustache/listing/listing_albums.js">

	</script>
	<?php 

}
?> 