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
  });
};

function setMarkers(map, spots) {
    var marker, i, info = [];
    for (i = 0; i < spots.length; i++) {
      var spot = spots[i];
      marker = new mapboxgl.Marker()
      .setLngLat([spot[2], spot[1]])
      }
    marker.addTo(map);
}
window.onload = InitializeMap;
