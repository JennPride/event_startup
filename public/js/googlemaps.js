
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD5sa0JLfdZXg9rq1DUOivGcdAuhIZ-UA&callback=initMap"
    async defer></script>
      <script>

      var coordinates = [
      @foreach ($events as $e)
      ["{{ $e->locationLat }}", "{{ $e->locationLng }}"],
      @endforeach
      ];

        function initMap() {
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv, {
            center: {lat: 38.98676, lng: -76.942619},
            zoom: 15
          });
          for( i=0; i < coordinates.length; i++) {
            var location = new google.maps.LatLng(coordinates[i][0], coordinates[i][1]);

            var marker = new google.maps.Marker({
              position: location,
              map:map,
            });
          }
        }
      </script>
