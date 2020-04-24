//  Senior Design Fall 2019

//Function for searching the database.
function search(){
    var val = sessionStorage.getItem("searchQ");
    var cat = sessionStorage.getItem("searchCat");
    if(cat != null){
        document.getElementById(cat).selected = true;
    }else{
        cat = "ManuscriptName";
    }
    document.getElementById("SearchDB").value = val;
    if(val == null){
        val = "";
    }
    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
         document.getElementById("content-body").innerHTML = this.responseText
            addRowHandlers();
        }
    };
    req.open("GET", "php/msstateSearch.php?q=" + val + "&cat=" + cat, true);
    req.send();
}

// This function calls the page for a fresh search, with just the search bar showing.
function FreshSearch(){
    sessionStorage.clear("searchQ");
    sessionStorage.clear("searchCat");
    window.location = "http://localhost/seniorproject/browse.html";
}

// This function redirects to a browse page based off of a search.
function MSURedir(){
    sessionStorage.setItem("searchQ", document.getElementById("SearchDB").value);
    sessionStorage.setItem("searchCat", document.getElementById("category").value);
    window.location = "http://localhost/seniorproject/browse.html";
}

// This function shows adds handlers to rows in the table.
function addRowHandlers() {
    var row = document.getElementById("MSUTable").rows;
    for (i = 0; i < row.length; i++) {
        row[i].onclick = function(){ return function(){
            var slot = this.cells[0];
            showDetails(slot.innerHTML);
        };}(row[i]);
    }
}

// This function shows the details column.
function showDetails(column){
    sessionStorage.setItem("msuColumn",column);
    window.location = "http://localhost/seniorproject/MSUdetails.html";
}

// Function for viewing details.
function viewDetails(){
    var val = sessionStorage.getItem("searchQ");
    var cat = sessionStorage.getItem("searchCat");
    document.getElementById("SearchDB").value = val;
    if(cat != null){
        document.getElementById(cat).selected = true;
    }else{
        cat = "ManuscriptName";
    }

    if(sessionStorage.getItem("msuColumn") != null){
        var record = sessionStorage.getItem("msuColumn");
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("details").innerHTML = this.responseText;
                var location = document.getElementById("loc");
            }
        };
        req.open("GET", "php/showMSUDetails.php?q=" + record, true);
        req.send();
    }else{
        document.getElementById("details").innerHTML = "<h2>Error: Please go back</h2>"
    }
}

//This function shows whether or not there are other copies in the database.
function otherCopies(){
    var record = sessionStorage.getItem("msuColumn");
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("otherCopies").innerHTML = this.responseText;
            }
        };
        req.open("GET", "php/otherCopies.php?q=" + record, true);
        req.send();
}

function loadMap(){
    alert();
    L.mapbox.accessToken = 'pk.eyJ1IjoiY29ucmFkMjA5OCIsImEiOiJjazU2d2c0bDgwOXRnM25wa3owM2tubjgyIn0.h58Ce7phnlgqh5Ld6YN8yg';
    var geocoder = L.mapbox.geocoder('mapbox.places');

    var name = "" + document.getElementById('name').innerHTML +  "";
    var loc = "" + document.getElementById('lib').innerHTML + ", " + document.getElementById('loc').innerHTML + "";

    var map = L.mapbox.map('map')
        .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'))
        .addControl(L.mapbox.geocoderControl('mapbox.places', {
        autocomplete: true
    }));

    geocoder.query(loc, showMap);

    var count = document.getElementById("otherCopies").childElementCount;
    var regex = /[0-9]. /;

    if(count > 0){
        for(var i = 1; i < count + 1; i++){
            var preParse = document.getElementById("" + i + "").innerHTML;
            var res = preParse.split(regex);
            res = res[1].slice(0)
            var loc0 = res
            geocoder.query(res, showMap2)
        }
    }

    function showMap(err, data) {

        if (data.lbounds) {
            map.fitBounds(data.lbounds);
        } else if (data.latlng) {
            L.marker([data.latlng[0], data.latlng[1]]).addTo(map)
            .bindPopup('<h>' + name + '</h><p>' + loc + '</p>')
            .openPopup();

            map.setView([data.latlng[0], data.latlng[1]], 2);
        }
    }

    function showMap2(err, data) {

        if (data.lbounds) {
            map.fitBounds(data.lbounds);
        } else if (data.latlng) {
            L.marker([data.latlng[0], data.latlng[1]]).addTo(map)
            .bindPopup('<h>' + name + '</h><p>' + loc0 + '</p>')
            .openPopup();

            map.setView([data.latlng[0], data.latlng[1]], 2);
        }
    }
}