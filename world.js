window.onload=function(){

    let countryLookupButton;
    let cityLookupButton;
    let httpRequest;
    let phpResponse;
    let searchfield;

    
    searchfield = document.getElementById("country");
    phpResponse = document.getElementById("result");
    countryLookupButton= document.getElementById("lookupco");
    cityLookupButton = document.getElementById("lookupci");

    countryLookupButton.addEventListener("click", function(){
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = showResponse;
        httpRequest.open("GET", "world.php?country=" + searchfield.value );
        httpRequest.send();
    })

    cityLookupButton.addEventListener("click", function(){
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = showResponse;
        httpRequest.open("GET", "world.php?city=" + searchfield.value );
        httpRequest.send();
    })
    
    function showResponse(){
        if (httpRequest.readyState === XMLHttpRequest.DONE){
            if (httpRequest.status === 200){
                phpResponse.textContent = httpRequest.responseText;
                phpResponse.innerHTML = phpResponse.textContent;
            }
            else{
                alert("Invalid request.");
            }
        }
    }
    
}