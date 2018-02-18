
    <title>Bootstrap 3 with Google Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet" media="screen">
 
    
      <script src="js/html5shiv.php"></script>
      <script src="js/respond.js"></script>
 


    <div id="map-container" class="col-md-6"></div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>  
 
      function init_map() {
    var var_location = new google.maps.LatLng(11.430817,12.331516);
 
        var var_mapoptions = {
          center: var_location,
          zoom: 10
        };
 
    var var_marker = new google.maps.Marker({
      position: var_location,
      map: var_map,
      title:"Venice"});
 
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
 
    var_marker.setMap(var_map); 
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);
 
    </script>
