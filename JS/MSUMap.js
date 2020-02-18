//Senior Design Spring 2020

var mymap = L.map('map').setView([51.505, -0.09]);
alert("Before Tile Layer");
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
maxZoom: 18,
id: 'mapbox/streets-v11',
tileSize: 512,
zoomOffset: -1,
accessToken: 'pk.eyJ1IjoiY29ucmFkMjA5OCIsImEiOiJjazU2d20zMnYwYWF4M2xtb2tjcnA4MzV3In0.Jrgm-pFb_Z1xCAkTHht7gw'
}).addTo(mymap);
alert("After Tile Layer");
