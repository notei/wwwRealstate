<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Direcciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="direcciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_municipio')->textInput() ?>

    <?= $form->field($model, 'num_cp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_lat')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'num_lon')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'txt_calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_num_exterior')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_num_interior')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_colonia')->textInput(['maxlength' => true]) ?>

    <div id="map"></div>

 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqH0iUfB-ljC8YfhbVwLw5YSEfsaTneC0&callback=initMap">
    </script> 
<script> 
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
      function updateLatLng(lat,lng){
        latIn = $("#direcciones-num_lat");
        lngIn = $("#direcciones-num_lon");

        latIn.val(lat);
        lngIn.val(lng);
      }

      function parseAddress(dir){
        $("#direcciones-txt_num_exterior").val(dir[0].short_name);
        $("#direcciones-txt_calle").val(dir[1].short_name);
        $("#direcciones-txt_colonia").val(dir[2].short_name);
        $("#direcciones-num_cp").val(dir[7].short_name);
      }

      

</script>  

</div>
