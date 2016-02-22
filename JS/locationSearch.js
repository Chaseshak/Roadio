$('#lower-nav').affix({
    offset: {top: 0}
});

window.onload = function(){
    var results = loadResults();
    createFilters();
    filters = [];
    populateSearchResults(results, filters);
};

var possibleGenres = [];

function loadResults() {
    var results = [];
    for (var i = 1; i < fmData.length; i++) {
        callsign = fmData[i]['callsign'];
        results.push(fmData[i]);
        toPrint = "";
        // Check if the possible filters are added yet, if not add them to the filter array
        if($.inArray(fmData[i]['primaryGenre'], possibleGenres) == -1) {
            possibleGenres.push(fmData[i]['primaryGenre']);
        }
    }
    // sort the possible genres array
    possibleGenres.sort();
    return results;
}

function createRow(index, toPrint){
    // create the row
    var rowDiv = document.createElement("div");
    rowDiv.className = "row";
    rowDiv.id = index;
    // create the column
    colDiv = document.createElement("div");
    colDiv.className = "col-md-12";
    colDiv.id = index;
    //colDiv.innerHTML = toPrint;
    // create the search result container
    var resultContainer = document.createElement("div");
    resultContainer.className = "display-container";
    resultContainer.style = "color: black";
    resultContainer.innerHTML = toPrint;
    // append elems.
    colDiv.appendChild(resultContainer);
    rowDiv.appendChild(colDiv);
    var container = document.getElementById("container");
    container.appendChild(rowDiv);
}

function createFilters(){
    var containerList = document.getElementById("collapseFilters");
    for(i = 0; i < possibleGenres.length; i++){
        // create the container for checkbox
        var divContain = document.createElement("div");
        divContain.className = "checkbox";
        divContain.style = "padding-left: 10px";

        // create the checkbox
        var checkbox = document.createElement("input");
        checkbox.type="checkbox";
        checkbox.id = "checkbox" + i;
        checkbox.style="margin-left: 0;";

        // create the label
        var label = document.createElement("label");
        label.htmlFor = "checkbox" + i;
        label.innerHTML = possibleGenres[i];

        divContain.appendChild(checkbox);
        divContain.appendChild(label);

        // finally append to container list
        containerList.appendChild(divContain);

    }
}
function passToWebsiteModal(id){
    var title = document.getElementById("addSiteModal");
    title.innerHTML = "Add website for " + id;
    var formCallsign = document.getElementById("callsignForm");
    formCallsign.value = id;
}

function passToRangeMapModal(data){
    var dataArr = [];
    dataArr = data.split(",");
    var modalContain = document.getElementById("rangeHeader");
    modalContain.innerHTML = "Estimated Range for " + dataArr[0];
    /**
     * dataArr layout:
     * callsign 0
     * appId 1
     * frequency 2
     * city 3
     * state 4
     * latitude (of station) 5
     * longitude (of station) 6
     * Entered Lat 7
     * Entered Lng 8
     * Entered Loc 9
     */
    // build url

    var lati = parseFloat(dataArr[7]);
    var lngi = parseFloat(dataArr[8]);
    var myLatLng = {lat: lati, lng: lngi};
    var urlKML = "https://transition.fcc.gov/fcc-bin/contourplot.kml?appid=" + dataArr[1] +
            "&call=" + dataArr[0] + "&freq=" + dataArr[2] + "&contour=60&city=" +
            dataArr[3] + "&state=" + dataArr[4] + "&.kml";

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: myLatLng
        });

        var location = dataArr[9] + ", " + dataArr[10];
        var contentStr = "<h5>Your Location:</h5>" + "<p>" + location + "</p>";
        var infoWindow = new google.maps.InfoWindow({
            content: contentStr
        });

        var marker = new google.maps.Marker({
           position: myLatLng,
            map: map,
           title: 'Your Entered Location'
        });

        marker.addListener('click', function(){
           infoWindow.open(map, marker);
        });

        var ctaLayer = new google.maps.KmlLayer({
            url: urlKML,
            map: map
        });
    }

    $("#rangeDoc").on("shown.bs.modal", function(e) {
        // Trigger map on modal load
        initMap();
    });
}

function populateSearchResults(results, filters){
    // if no filters, display all results

    if(filters.length == 0) {

        for(i = 0; i < results.length; i++){


            if(results[i]['callsign'].length != 0){ // make sure good data
                // create row
                var row = document.createElement("div");
                row.className = "row";

                // create first column
                var iconDiv = document.createElement("div");
                iconDiv.className = "hidden-xs col-sm-3";
                iconDiv.style="padding: 0;";

                var iconTag = document.createElement("img");
                iconTag.src = "Resources/radioIcon.png";
                iconTag.style = "max-height:140px; max-width: 134px;";

                // add img tag to iconDiv and then add to row
                iconDiv.appendChild(iconTag);
                row.appendChild(iconDiv);

               // create second column
                var col2 = document.createElement("div");
                col2.className = "col-xs-4 col-sm-3";
                col2.style = "padding: 0";

                // create ul
                var ul1 = document.createElement("ul");
                ul1.className = "list-group";

                // create li item callsign
                var liCall = document.createElement("li");
                liCall.className = "list-group-item clearfix";
                var callsign = document.createElement("h4");
                callsign.className = "pull-left";
                callsign.innerHTML = "<strong>" + results[i]['callsign'] + "</strong>";
                // create li item location
                var liLocation = document.createElement("li");
                liLocation.className = "list-group-item clearfix";
                var location = document.createElement("h5");
                location.className = "pull-left";
                var city = results[i]['city'].toLocaleLowerCase();
                city = city.replace("_", " ");
                city = capitalizeFirstLetter(city);
                location.innerHTML = city + ", " + results[i]['state'];

                // create 3rd column
                var col3 = document.createElement("div");
                col3.className = "col-xs-4 col-sm-3";
                col3.style = "padding: 0";

                // create ul list
                var ul2 = document.createElement("ul");
                ul2.className = "list-group";

                // create li item Genre
                var liGenre = document.createElement("li");
                liGenre.className = "list-group-item clearfix";
                var genre = document.createElement("h4");
                genre.className = "pull-left";
                genre.innerHTML = "<strong>" + results[i]['primaryGenre'] + "</strong>";
                // create li item website
                // check if website found
                var liSite = document.createElement("li");
                liSite.className = "list-group-item clearfix";
                var webContain = document.createElement("h5");
                webContain.className = "pull-left";
                var website = document.createElement("a");
                website.id = results[i]['callsign'];

                // handle case where no website found
                if(results[i]['website'] == null){
                    website.href="#noSite";
                    website.innerHTML = "No site, add one!";
                    website.setAttribute("data-toggle", "modal");
                    website.setAttribute("onclick", "passToWebsiteModal(\"" + results[i]['callsign'] + "\");");
                    website.target = "#noSite";
                }
                else{
                    website.href = results[i]['website'];
                    website.innerHTML = results[i]['callsign'] + "'s Website";
                    website.target = "_blank";
                }
                webContain.appendChild(website);

                // create 4th column
                var col4 = document.createElement("div");
                col4.className = "col-xs-4 col-sm-3";
                col4.style="padding-right: 10px; padding-left:0px;";

                // create ul list
                var ul3 = document.createElement("ul");
                ul3.className = "list-group";

                // create li item freq
                var liFreq = document.createElement("li");
                liFreq.className = "list-group-item clearfix";
                var freq = document.createElement("h4");
                freq.className = "pull-left";
                freq.innerHTML = "<strong>" + results[i]['frequency'] + "</strong>";
                // create li item for range map
                var liRangeMap = document.createElement("li");
                liRangeMap.className = "list-group-item clearfix";
                var rangeDocContain = document.createElement("h5");
                rangeDocContain.className = "pull-left";
                var rangeMap = document.createElement("a");
                rangeMap.id = results[i]['callsign'] + "RangeDoc";
                rangeMap.innerHTML = "Range Map";
                rangeMap.href="#rangeDoc";
                rangeMap.setAttribute("data-toggle", "modal");
                rangeMap.setAttribute("onclick" , "passToRangeMapModal(\"" +
                    results[i]['callsign'] + "," + results[i]['appId'] + "," + results[i]['frequency'] + "," +
                    results[i]['city'] + "," + results[i]['state'] + ", " + results[i]['latitude'] + ", " + results[i]['longitude'] +
                    ", " + results[i]['enteredLat'] + ", " +
                    results[i]['enteredLng'] + ", " + results[i]['enteredLoc']
                    + "\");");
                rangeDocContain.appendChild(rangeMap);

                // add all elements
                liCall.appendChild(callsign);
                liLocation.appendChild(location);
                ul1.appendChild(liCall);
                ul1.appendChild(liLocation);
                col2.appendChild(ul1);

                liGenre.appendChild(genre);
                liSite.appendChild(webContain);
                ul2.appendChild(liGenre);
                ul2.appendChild(liSite);
                col3.appendChild(ul2);

                liFreq.appendChild(freq);
                liRangeMap.appendChild(rangeDocContain);
                ul3.appendChild(liFreq);
                ul3.appendChild(liRangeMap);
                col4.appendChild(ul3);

                row.appendChild(col2);
                row.appendChild(col3);
                row.appendChild(col4);
                // add row to container
                var container = document.getElementById("containerResults");
                container.appendChild(row);
                // add hr
                var hr = document.createElement("hr");
                hr.className = "hr-location";
                container.appendChild(hr);
            }
        }
    }
    // else display the appropriate filtered results
    else{

    }
}



function capitalizeFirstLetter(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
}

/**
 * Called when the filter genres dropdown is clicked and changes the glyphicon
 * appropriately to up or down.
 */
function changeFilterIcon(){
    var glyph = document.getElementById("filterGlyph");
    if(glyph.className == "glyphicon glyphicon-chevron-up pull-right")
        glyph.className = "glyphicon glyphicon-chevron-down pull-right";
    else
        glyph.className = "glyphicon glyphicon-chevron-up pull-right";
}

/**
 * Called when the AM/FM dropdown is clicked and changes the glyphicon
 * appropriately to up or down.
 */
function changeFM_AMIcon(){
    var glyph = document.getElementById("filterGlyph2");
    if(glyph.className == "glyphicon glyphicon-chevron-up pull-right")
        glyph.className = "glyphicon glyphicon-chevron-down pull-right";
    else
        glyph.className = "glyphicon glyphicon-chevron-up pull-right";
}