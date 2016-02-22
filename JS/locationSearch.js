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
        toPrint = "";
        results.push(fmData[i]);
        // Check if the possible filters are added yet, if not add them to the filter array
        if($.inArray(fmData[i]['primaryGenre'], possibleGenres) == -1) {
            possibleGenres.push(fmData[i]['primaryGenre']);
        }
        //for (var key in fmData[i]) { // to iterate through array
        //    //document.write(key + ": " + fmData[i][key] + "|");
        //    toPrint += fmData[i][key] + "|";
        //}
        //createRow(callsign, toPrint);
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

                // add all elements
                liCall.appendChild(callsign);
                liLocation.appendChild(location);
                ul1.appendChild(liCall);
                ul1.appendChild(liLocation);
                col2.appendChild(ul1);
                row.appendChild(col2);

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