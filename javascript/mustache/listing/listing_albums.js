      $('#nb_result').on('change', function () {
        limit = $(this).val();
                window.localStorage.setItem("limit", limit);
      });
        $("#search").attr("placeholder", "Recherche albums...");
		$.getJSON(
			"results.json",
			function (key, value) {
                //console.log(key['results']);
            	//console.log(key['results']['liste_album']);
            	id = 1
            	//console.log(key['results']['liste_album'][id]);
            	i = 0
            	limit = localStorage.getItem('limit');
                //console.log(limit);
            	max = key['results']['liste_album'].length
            	while(i <= limit-1)
            	{
            	name = key['results']['liste_album'][i]['name'];
            	description = key['results']['liste_album'][i]['description'];
            	photo = key['results']['liste_album'][i]['cover_small'];
                popularity = key['results']['liste_album'][i]['popularity'];
                artist_id = key['results']['liste_album'][i]['artist_id'];
                console.log(key['results']['liste_album'][i]);
            	i++


            	 template = $('#test').html();

            	 user = {
            		name: name,
            		description : description,
            		photo : photo,
                    popularity : popularity,
                    artist_id : artist_id
            	};

    // génération du HTML
    	 rendu = Mustache.render(template, user);

    // Insertion du résultat dans la page HTML
    $('#example').append(rendu);

				}

});