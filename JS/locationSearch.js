window.onload = function(){
    addData();
};
for(var i = 1; i < fmData.length; i++){
    for(var key in fmData[i]){ // to iterate through array
        document.write(key + ": " + fmData[i][key] + "|");
    }
    document.write("<br>");
}