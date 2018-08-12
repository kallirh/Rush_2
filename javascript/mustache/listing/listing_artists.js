      $('#nb_result').on('change', function () {
        limit = $(this).val();
                window.localStorage.setItem("limit", limit);
      });
        $("#search").attr("placeholder", "Recherche artiste...");
        $.getJSON(
			"results.json",
			function (key, value) {
            	i = 0
            	limit = localStorage.getItem('limit');
                console.log(key);
            	max = key['results']['liste_artiste'].length
            	while(i <= limit)
            	{
                id = key['results']['liste_artiste'][i]['id'];
                console.log(id);
            	name = key['results']['liste_artiste'][i]['name'];
            	bio = key['results']['liste_artiste'][i]['bio'];
            	description = key['results']['liste_artiste'][i]['description'];
            	photo = key['results']['liste_artiste'][i]['photo'];

                albums = key['results']['liste_albums'][id];
                test += albums+" - ";
            	i++


            	 template = $('#test').html();

            	 user = {
            		name: name,
            		bio: bio,
            		description : description,
            		photo : photo,

                    album : albums
            	};

    // génération du HTML
    	 rendu = Mustache.render(template, user);

    // Insertion du résultat dans la page HTML
    $('#example').append(rendu);

				}
                //console.log(test.toString());
                console.log(JSON.stringify(test));

});