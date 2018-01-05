

function loadEstados(id){
  $.ajax({
          type: "GET",
          url:"services/estados-list?id=" + id,
          dataType: "json",
          success: function (data) {
            var select = document.getElementById("estado");
            $("#estado").empty();

            var option = document.createElement('option');
            option.text = "Seleccione";
            option.value = "";
            select.add(option);

            console.log(data);
            jQuery.each(data, function(i, val) {
              console.log(i);
              console.log(val);
              var option = document.createElement('option');
              option.text = val;
              option.value = i;
              select.add(option);

            });
          }
        }); 
}

function loadCiudades(id){
  $.ajax({
          type: "GET",
          url:"services/ciudades-list?id=" + id,
          dataType: "json",
          success: function (data) {
            var select = document.getElementById("ciudad");
            $("#ciudad").empty();

            var option = document.createElement('option');
            option.text = "Seleccione";
            option.value = "";
            select.add(option);

            console.log(data);
            jQuery.each(data, function(i, val) {
              console.log(i);
              console.log(val);
              var option = document.createElement('option');
              option.text = val;
              option.value = i;
              select.add(option);

            });
          }
        }); 
}

function loadMunicipio(id){
  $.ajax({
          type: "GET",
          url:"services/municipios-list?id=" + id,
          dataType: "json",
          success: function (data) {
            var select = document.getElementById("municipio");
            $("#municipio").empty();

            var option = document.createElement('option');
            option.text = "Seleccione";
            option.value = "";
            select.add(option);

            console.log(data);
            jQuery.each(data, function(i, val) {
              console.log(i);
              console.log(val);
              var option = document.createElement('option');
              option.text = val;
              option.value = i;
              select.add(option);

            })
          }
        }); 
}

function loadColonias(id){
  $.ajax({
          type: "GET",
          url:"services/colonias-list?id=" + id,
          dataType: "json",
          success: function (data) {
            var select = document.getElementById("colonia");
            $("#colonia").empty();

            var option = document.createElement('option');
            option.text = "Seleccione";
            option.value = "";
            select.add(option);

            console.log(data);
            jQuery.each(data, function(i, val) {
              console.log(i);
              console.log(val);
              var option = document.createElement('option');
              option.text = val;
              option.value = i;
              select.add(option);

            })
          }
        }); 
}