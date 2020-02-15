window.onload=loadProfile;

function loadProfile(){
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page
            displayProfile(request.responseText);
        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "getaccount.php");
    request.send();
}

//Loads products into page
function displayProfile(userProfile){
    //Convert JSON to array of product objects
    let profile = JSON.parse(userProfile);

    //Create HTML table containing product data
    let htmlStr = '<div style="text-align: center;">'+
        '<input type="text" class="form-control" name="c_username" required disabled value='+profile[0].username+'>' + '</div>';
    htmlStr += '<img src="../server/images/Users'+userProfile[0].picUrl+'" style="height: 180px;"> </div><br />';
    htmlStr += '<h3 align="center" class="panel-title">'+userProfile[0].firstName+' '+userProfile[0].lastName+'</h3>';
    //Finish off table and add to document
    document.getElementById("profile").innerHTML = htmlStr;
}