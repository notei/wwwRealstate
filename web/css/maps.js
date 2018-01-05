 
var marker;  
var lat_lng = {lat: 19.4326068, lng: -99.1353936}; 
var map;  
var geocoder;

function initMap() {
        geocoder = new google.maps.Geocoder;
        map = new google.maps.Map(document.getElementById('map'), {
          center: lat_lng,
          zoom: 12
        });
        

        marker = new google.maps.Marker({  
        map: map,  
        draggable: true,   
        position: lat_lng  
        });  

        //marker.setAnimation(google.maps.Animation.BOUNCE);

        google.maps.event.addListener(marker, "dragend", function(event) { 
          var lat = event.latLng.lat(); 
          var lng = event.latLng.lng(); 

          var pos = {
              lat: lat,
              lng: lng
            };

          updateLatLngPos(pos);
        }); 

        google.maps.event.addListener(map, 'click', function(event) {
            var lat = event.latLng.lat(); 
            var lng = event.latLng.lng(); 

            var pos = {
              lat: lat,
              lng: lng
            };

            
            updateLatLngPos(pos);

        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            
            updateLatLngPos(pos);

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        
      }


      function geocodeLatLng(geocoder, map, latlng) {
       
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              console.log(results[0]);
              parseAddress(results[0].address_components);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
 

      function updateLatLngPos(pos){
        console.log(pos);
        map.panTo(pos);
        marker.setPosition( pos );
        geocodeLatLng(geocoder,map, pos);
        updateLatLng(pos.lat, pos.lng); 
      }
      

      
