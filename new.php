<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXKFAtXLGEJH7bu2yvwlUxVufc1ZIrO78"></script>
<div id="map"></div>
<script>
function initMap() {
  var location = {lat: 37.7749, lng: -122.4194}; // Example location
  var map = new google.maps.Map(document.getElementById('map'), {
    center: location,
    zoom: 15
  });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
<script>
var placeId = 'ChIJ2eUgeAK6j4ARbn5u_wAGqWA'; // Example place ID
var service = new google.maps.places.PlacesService(map);

service.getDetails({placeId: placeId}, function(place, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    if (place.photos && place.photos.length > 0) {
      var photoUrl = place.photos[0].getUrl();
      document.getElementById('photo').src = photoUrl;
    }
  }
});
</script>
