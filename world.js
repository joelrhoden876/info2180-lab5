window.onload=function(){

    let lookupButton;
    let httpRequest;
    let phpResponse;
    let searchfield;

    
    searchfield = document.getElementById("country");
    phpResponse = document.getElementById("result");
    lookupButton= document.getElementById("lookup");


    lookupButton.addEventListener("click", function(){
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = showResponse;
        httpRequest.open("GET", "world.php?country=" + searchfield.value);
        httpRequest.send();
    })

    
    function showResponse(){
        if (httpRequest.readyState === XMLHttpRequest.DONE){
            if (httpRequest.status === 200){
                // alert(httpRequest.responseText);
                phpResponse.textContent = httpRequest.responseText;
                phpResponse.innerHTML = phpResponse.textContent;
                // console.log(httpRequest.responseText);
            }
            else{
                alert("Invalid request.");
            }
        }
    }
    
}