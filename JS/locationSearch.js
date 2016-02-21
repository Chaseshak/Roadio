window.onload = function(){
    loadResults();
};


function loadResults() {
    for (var i = 1; i < 4 /**fmData.length **/; i++) {
        callsign = fmData[i]['callsign'];
        toPrint = "";
        for (var key in fmData[i]) { // to iterate through array
            //document.write(key + ": " + fmData[i][key] + "|");
            toPrint += fmData[i][key] + "|";
        }
        createRow(callsign, toPrint);
    }
}

function createRow(index, toPrint){
    var rowDiv = document.createElement("div");
    rowDiv.className = "row";
    rowDiv.id = index;
    colDiv = document.createElement("div");
    colDiv.className = "col-md-12";
    colDiv.id = index;
    colDiv.innerHTML = toPrint;
    rowDiv.appendChild(colDiv);
    var container = document.getElementById("container");
    container.appendChild(rowDiv);

}

// display one card first and edit formatting, then loop in rest
