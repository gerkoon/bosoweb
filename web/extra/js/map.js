var office = [
        ["Estamos aquí", "43.3024202", "-2.982852800000046", "icon1", "<div>html</div>"]
    ];

    var markers = Array();
var infowindowActivo = false;
function setGoogleMarkers(map, locations) {
    // Definimos los iconos a utilizar con sus medidas
    var icon1 = new google.maps.MarkerImage(
            "images/pin.png",
        new google.maps.Size(28, 41)
    );

    for(var i=0; i<locations.length; i++) {
        var elPunto = locations[i];
        var myLatLng = new google.maps.LatLng(elPunto[1], elPunto[2]);

        markers[i]=new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: eval(elPunto[3]),
            title: elPunto[0]
        });
        markers[i].infoWindow=new google.maps.InfoWindow({
            content: elPunto[4]
        });
        google.maps.event.addListener(markers[i], 'click', function(){      
            if(infowindowActivo)
                infowindowActivo.close();
            infowindowActivo = this.infoWindow;
            infowindowActivo.open(map, this);
        });
    }
}

    window.onload = function() {
        var mapOptions = {
          center: new google.maps.LatLng(43.3024202, -2.982852800000046),
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
        setGoogleMarkers(map, office);
      }