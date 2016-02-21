$('#lower-nav').affix({
    offset: {top: 0}
});

window.onload = function(){
    loadResults();
    createFilters();
};

var possibleGenres = [];

function loadResults() {

    for (var i = 1; i < fmData.length; i++) {

        callsign = fmData[i]['callsign'];
        toPrint = "";
        // Check if the possible filters are added yet, if not add them to the filter array
        if($.inArray(fmData[i]['primaryGenre'], possibleGenres) == -1) {
            possibleGenres.push(fmData[i]['primaryGenre']);
        }
        for (var key in fmData[i]) { // to iterate through array
            //document.write(key + ": " + fmData[i][key] + "|");
            toPrint += fmData[i][key] + "|";

        }
        createRow(callsign, toPrint);
    }
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

        // create the checkbox
        var checkbox = document.createElement("input");
        checkbox.id = "checkbox" + i;
        checkbox.type="checkbox";
        checkbox.style="margin-left: 0;";

        // create the label
        var label = document.createElement("label");
        label.htmlFor = "checkbox " + i;
        label.innerHTML = possibleGenres[i];

        divContain.appendChild(checkbox);
        divContain.appendChild(label);

        // finally append to container list
        containerList.appendChild(divContain);

    }
}

function changeFilterIcon(){
    var glyph = document.getElementById("filterGlyph");
    if(glyph.className == "glyphicon glyphicon-chevron-up pull-right")
        glyph.className = "glyphicon glyphicon-chevron-down pull-right";
    else
        glyph.className = "glyphicon glyphicon-chevron-up pull-right";
}

function changeFM_AMIcon(){
    var glyph = document.getElementById("filterGlyph2");
    if(glyph.className == "glyphicon glyphicon-chevron-up pull-right")
        glyph.className = "glyphicon glyphicon-chevron-down pull-right";
    else
        glyph.className = "glyphicon glyphicon-chevron-up pull-right";
}