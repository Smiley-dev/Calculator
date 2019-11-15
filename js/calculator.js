//Send AJAX GET request
function sendRequest(factors){
    //Remove whitespace
    factors = factors.replace(/ /g, "")

    var xhttp = new XMLHttpRequest();
    //Send request
    //xhttp.open("GET", "=" + factors, true);
    //xhttp.send();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("results").innerHTML = this.responseText;
        }
    }

}