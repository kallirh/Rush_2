<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Rush 2 : My Spotify</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
  <script src="showAlbum.js"></script>
</head>
<body ng-app="app">
  <table ng-controller="controller">
    <tr ng-repeat="album in results">
      <td> {{ album.liste_album[0]['name'] }} </td>
      <td> {{ album.liste_album[0]['description'] }} </td>
      <td> <img src="{{ album.liste_album[0]['cover_small'] }}" > </td>
    </tr>

    <tr ng-repeat="album in results">
      <td> {{ album.liste_album[1]['name'] }} </td>
      <td> {{ album.liste_album[1]['description'] }} </td>
      <td> <img src="{{ album.liste_album[1]['cover_small'] }}" > </td>
    </tr>

    <tr ng-repeat="album in results">
      <td> {{ album.liste_album[2]['name'] }} </td>
      <td> {{ album.liste_album[2]['description'] }} </td>
      <td> <img src="{{ album.liste_album[2]['cover_small'] }}" > </td>
    </tr>

    <tr ng-repeat="album in results">
      <td> {{ album.liste_album[3]['name'] }} </td>
      <td> {{ album.liste_album[3]['description'] }} </td>
      <td> <img src="{{ album.liste_album[3]['cover_small'] }}" > </td>
    </tr>
  </table>

<!--   <audio controls>
   <source src=" {{ insertMusicChampsHere }} ">
  </audio> --> 
</body>
</html>