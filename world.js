document.addEventListener("DOMContentLoaded", function(){
    btn = document.querySelector("button#lookup");
    btnC = document.querySelector("button#lookupCi");
    div = document.querySelector("div#result");

    btn.addEventListener("click", function(){
        //Fetch data from AJAX using XMLHttpRequest object
        var request = new XMLHttpRequest();
        var input = document.querySelector("input").value;
        request.open("GET","world.php?country=" + input + "&city=" + false);
        request.send();

        //Checks if the requested document is ready and sets alert
        request.onreadystatechange = function(){
            if (this.readyState === 4 && this.status === 200){
                var res = request.responseText;
                div.innerHTML = res;
            }
        }         
    });

    btnC.addEventListener("click", function(){
        var request = new XMLHttpRequest();
        var input = document.querySelector("input").value;
        request.open("GET","world.php?country=" + input + "&city=" + true);
        request.send();

        request.onreadystatechange = function(){
            if (this.readyState === 4 && this.status === 200){
                var res = request.responseText;
                div.innerHTML = res;
            }
        }  
    });
});