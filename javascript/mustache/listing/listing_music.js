      $('#nb_result').on('change', function () {
        limit = $(this).val();
                window.localStorage.setItem("limit", limit);
      });
        $("#search").attr("placeholder", "Recherche musique...");
        $.getJSON(
			"results.json",
			function (key, value) {
            	console.log(key['results']);
            	id = 1
            	console.log(key['results']['fiche_musique'][id]);
            	i = 0
            	limit = localStorage.getItem('limit');
            	max = key['results']['fiche_musique'].length
            	while(i <= limit-1)
            	{
            	name = key['results']['fiche_musique'][i]['track_name'];
            	duration = key['results']['fiche_musique'][i]['duration'];
            	mp3 = key['results']['fiche_musique'][i]['mp3'];
                photo = key['results']['fiche_musique'][i]['cover'];
            	i++


            	 template = $('#test').html();

            	 user = {
            		name: name,
            		duration: duration,
            		mp3 : mp3,
                    photo : photo
            	};

    // génération du HTML
    	 rendu = Mustache.render(template, user);

    // Insertion du résultat dans la page HTML
    $('#example').append(rendu);

				}

});