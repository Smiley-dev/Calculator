//Send AJAX GET request
function sendRequest(factors){
    factors = factors.replace(/ /g, "")
    console.log(factors);

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "index.php?factors=" + factors, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("expresion").innerHTML = this.responseText;
        }
    }

}