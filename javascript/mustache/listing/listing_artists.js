      $('#nb_result').on('change', function () {
        limit = $(this).val();
                window.localStorage.setItem("limit", limit);
      });

        $("#search").attr("placeholder", "Recherche artiste...");
        $.getJSON(
			"results.json",
			function (key, value) {
            	id = 1
            	console.log(key['results']['liste_artiste']);
            	i = 0
            	limit = localStorage.getItem('limit');
                console.log(limit);
            	max = key['results']['liste_artiste'].length
            	while(i <= limit-1)
            	{
            	name = key['results']['liste_artiste'][i]['name'];
            	bio = key['results']['liste_artiste'][i]['bio'];
            	description = key['results']['liste_artiste'][i]['description'];
            	photo = key['results']['liste_artiste'][i]['photo'];

                album = key['results']['liste_albums'][i]['name'];
                cover = key['results']['liste_albums'][i]['cover_small'];
                popularity = key['results']['liste_albums'][i]['popularity'];
                console.log(album);
            	i++


            	 template = $('#test').html();

            	 user = {
            		name: name,
            		bio: bio,
            		description : description,
            		photo : photo,

                    album : album,
                    cover : cover,
                    popularity
            	};

    // génération du HTML
    	 rendu = Mustache.render(template, user);

    // Insertion du résultat dans la page HTML
    $('#example').append(rendu);

				}

});