<style>
  /*BOTON DE CIERRE*/
  .gm-ui-hover-effect {
    display: none !important;
  }

  .gm-style .gm-style-iw-c {
    padding: 0 !important;
  }

  .gm-style-iw-ch {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    flex-grow: 1;
    -webkit-flex-shrink: 1;
    flex-shrink: 1;
    padding: 0 !important;
    overflow: hidden;
  }
</style>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zAA0lz2WIp9qYBZd671LqbUaFok9LMc&callback=iniMap" async defer></script>

<script>
  //let map = '8';
  let marker;
  let geocoder;
  let responseDiv;
  let response;
  let geo;
  let iconBase = "{{asset('img/pin-32.png')}}"

  function iniMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: {
        lat: 19.029564042307438,
        lng: -70.76856891228802
      },
      zoom: 4,
    });

    const infoWindow = new google.maps.InfoWindow({
      content: "",
      disableAutoPan: true,
    });

    function activitySelect() {
      $.ajax({
        url: "{{ route('propiedadesMaps') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {

          $.each(response.data, function(key, value) {
            let a;
            let b;

            a = value.latitud;
            b = value.longitud;
            // lat.push(aux) ;

            var marker = new google.maps.Marker({
              // position: {lat:this.a , lng:this.b},
              map: map,
              title: value.name,
              icon: iconBase
            });

            var infowindow = new google.maps.InfoWindow();
            var imageSrc = '{{ asset("img/product/product_id_") }}' + value.id + '/' + value.portada; // Almacena la URL de la imagen que deseas mostrar en el InfoWindow

            marker.addListener('mouseover', function() {
              var content = '<div style="width: 200px; background-color: #fff; padding: 0px;">';
              //content += '<p class="mb-0">' + value.price + '</p>';
              content += '<img src="' + imageSrc + '" class="w-100">'; // Utiliza la variable imageSrc en la etiqueta img
              content += '<br/> <p class="mb-0">' + value.name + '</p>';
              content += '</div>';


              infowindow.setContent(content);
              infowindow.open(map, marker);
            });


            marker.addListener('mouseout', function() {
              infowindow.close();
            });


            marker.addListener("click", function() {
              window.location.href = "{{ route('producto.show', ['id' => $product->id]) }}".replace('$product->id', value.id);
            });

            var latlng = new google.maps.LatLng(a, b)
            marker.setPosition(latlng);

            marker.addListener("click", () => {
              infoWindow.setContent(value.name);
              infoWindow.open(map, marker);
            });

            //----------------------------
            var latlng = new google.maps.LatLng(a, b)
            marker.setPosition(latlng);

            marker.addListener("click", () => {
              infoWindow.setContent(value.name);
              infoWindow.open(map, marker);
            });

          });
        },
        error: function() {
          alert('Hubo un error obteniendo los datos!');
        }
      });
    }
    activitySelect()

  }
</script>