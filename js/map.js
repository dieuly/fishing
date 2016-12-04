var map;
var url = "http://lipas.cc.jyu.fi/geoserver/lipas/ows?service=WFS&version=1.0.0&outputFormat=json&request=GetFeature&typeName=lipas:lipas_kaikki_pisteet&srsName=EPSG:4326&maxFeatures=250&filter=%3cPropertyIsEqualTo%3e%3cPropertyName%3etyyppikoodi%3c/PropertyName%3e%3cLiteral%3e201%3c/Literal%3e%3c/PropertyIsEqualTo%3e";
// InitializeMap
function InitializeMap() {
  $.getJSON(url, function(json) {
      console.log(json);
      var fishingSpots = [];
      $.each(json.features, function (index, feature) {
          fishingSpots[index] =  [feature.properties.nimi_fi,
              feature.geometry.coordinates[1],
              feature.geometry.coordinates[0],
              feature.properties.lisatieto_fi,
              feature.properties.www
          ];
      });
      mapboxgl.accessToken = 'pk.eyJ1IjoiYmFvbyIsImEiOiJjaXVzZ2J2emEwMDJmMnRtcHhxYmZxaDV1In0.vKWh01poRIYE42_P1Vbseg';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        zoom: 6,
        center: [25.5287, 63.0465]
      });

      map.addControl(new MapboxDirections({
        accessToken: mapboxgl.accessToken
      }), 'top-left');

      json.features.forEach(function(marker) {
        // create a DOM element for the marker
        var popup = new mapboxgl.Popup()
            .setLngLat(marker.geometry.coordinates)
            .setHTML('<b>'+marker.properties.nimi_fi+'</b><p />' + marker.properties.lisatieto_fi + '<p /><b>Lisätietoja:</b> <a href="' +marker.properties.www+'" target="_blank">' + marker.properties.www + '</a>');

        var el = document.createElement('div');
        el.className = 'marker';
        el.style.backgroundImage = 'url(http://users.metropolia.fi/~dieun/fish-icon.png)';
        el.style.width = '50px';
        el.style.height = '50px';

        // add marker to map
        new mapboxgl.Marker(el, {offset: [-25, -25]})
          .setLngLat(marker.geometry.coordinates)
          .setPopup(popup)
          .addTo(map);

      });



      //when click the place, open the popup showing its description
      // map.on('click', function () {
      //
      //   json.features.forEach(function(feature) {
      //   var popup = new mapboxgl.Popup()
      //       .setLngLat(feature.geometry.coordinates)
      //       .setHTML('<b>'+feature.properties.nimi_fi+'</b><p />' + feature.properties.lisatieto_fi + '<p /><b>Lisätietoja:</b> <a href="' + feature.properties.www +
      //               '" target="_blank">' + feature.properties.www + '</a>')
      //       .addTo(map);
      //   });
      // });

      // map.on('load', function () {
      //   map.addSource("locations", {
      //     "type": "geojson",
      //     "data": "http://lipas.cc.jyu.fi/geoserver/lipas/ows?service=WFS&version=1.0.0&outputFormat=json&request=GetFeature&typeName=lipas:lipas_kaikki_pisteet&srsName=EPSG:4326&maxFeatures=250&filter=%3cPropertyIsEqualTo%3e%3cPropertyName%3etyyppikoodi%3c/PropertyName%3e%3cLiteral%3e201%3c/Literal%3e%3c/PropertyIsEqualTo%3e"
      //   });

      //add a layer showing the places
    //     map.addLayer({
    //      "id": "locations",
    //      "type": "symbol",
    //      "source": "locations"
    //    });
    //  }); // end map loading
    //  map.on('click', function (e) {
    //   var features = map.queryRenderedFeatures(e.point, { layers: ['locations'] });
     //
    //   if (!features.length) {
    //       return;
    //   }
     //
    //   var feature = features[0];

      //Populate the popup and set its coordinates
      //based on the feature found.
      // var popup = new mapboxgl.Popup()
      //     .setLngLat(feature.geometry.coordinates)
      //     .setHTML(feature.properties.nimi_fi)
      //     .addTo(map);
      // });
      // setMarkers(map, fishingSpots);

  });
};

function setMarkers(map, spots) {
    var marker, i, info = [];
    // var infowindow = new mapboxgl.popup({
    // });

     for (i = 0; i < spots.length; i++) {
        var spot = spots[i];
        marker = new mapboxgl.Marker()
        .setLngLat([spot[2], spot[1]])

        // {
        //   position: {lat: spot[1], lng: spot[2]},
        //   map: map,
        //   title: spot[0]
        // });

        // info[i] = '<b>'+spot[0]+'</b><p />' + spot[3] + '<p /><b>Lisätietoja:</b> <a href="' + spot[4] +
        //         '" target="_blank">' + spot[4] + '</a>';

        // map.on(marker, 'click', (function(marker, i) {
        //     return function() {
        //       infowindow.setContent(info[i]);
        //       infowindow.open(map, marker);
        //     }
        //   })(marker, i));
      }
      marker.addTo(map);
}


// findLocation
// function FindLocation() {
//
//   var locations = [
//     ['Turun kaupungin alue, area: 150m2', 60.2166, 24.9836, 3],
//     ['Aurajoki, Halistenkoski, area: 190m2',60.171165982, 24.903996384, 2],
//     ['Airiston kalastusalue, area: 90m2',60.1815, 24.8841, 1]
//   ];
//
//   var map = new google.maps.Map(document.getElementById('map'), {
//     zoom: 10,
//     center: new google.maps.LatLng(60.1699, 24.9384),
//     mapTypeId: google.maps.MapTypeId.ROADMAP
//   });
//
//   var infowindow = new google.maps.InfoWindow();
//
//   var marker, i;
//
//   for (i = 0; i < locations.length; i++) {
//     marker = new google.maps.Marker({
//       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//       map: map
//     });
//
//     google.maps.event.addListener(marker, 'click', (function(marker, i) {
//       return function() {
//         infowindow.setContent(locations[i][0]);
//         infowindow.open(map, marker);
//       }
//     })(marker, i));
//   }
// }
//
// function Search() {
//   FindLocation();
//   var intro = document.getElementById("introduction");
//   var places = document.getElementById("accordion");
//   intro.style.display = 'none';
//   // places.style.display = 'block';
//
// }

window.onload = InitializeMap;
