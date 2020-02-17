$.getScript('./js/checksession.js', function()
{
    loadProfile();
});

function loadProfile(){
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page
            displayProfileDetails(request.responseText);
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
function displayProfileDetails(jsonUser){
    //Convert JSON to array of product objects
    let profile = JSON.parse(jsonUser);

    //Create HTML table containing product data
    let htmlStr = '<div class="form-group"><label>Your Username</label>'+
        '<input type="text" class="form-control" name="c_username" required disabled value="'+profile[0].username+'">' +'</div>';
    htmlStr += '<div class="form-group"><label>First Name</label><input type="text" class="form-control" name="c_fname" value="'+profile[0].firstName+'"></div>';
    htmlStr += '<div class="form-group"> <label>Last Name</label> <input type="text" class="form-control" name="c_lname" value="'+profile[0].lastName+'"> </div>';
    htmlStr += '<div class="form-group"><label>Your Email</label> <input type="text" class="form-control" name="c_email" value="'+profile[0].email+'"> </div>';
    htmlStr += '<div class="form-group"><label>Your Password</label><input type="password" class="form-control" name="c_pass" value="'+profile[0].password+'"></div>';
    htmlStr += '<div class="form-group"><label>Your Address</label><input type="text" class="form-control" name="c_address" value="'+profile[0].address+'"></div>';
    htmlStr += '<div class="form-group"><label>Your Postal Code</label><input type="text" class="form-control" name="c_postalcode" value="'+profile[0].postalCode+'"></div>';
    htmlStr += '<div class="form-group"><label>Your Phone Number</label><input type="text" class="form-control" name="c_contact" value="'+profile[0].phone+'"></div>';
    htmlStr +='<div class="form-group"><label>Your Profile Picture</label><input type="file" class="form-control form-height-custom" name="c_image" required></div>';
    htmlStr += '<div class="text-center"><button name="register" class="btn btn-primary">UPDATE</button></div>';
    //Finish off table and add to document
    document.getElementById("myaccount").innerHTML = htmlStr;
}

function displayProfile(userProfile){
    //Convert JSON to array of product objects
    let profile = JSON.parse(userProfile);

    //Create HTML table containing product data
    let htmlStr = '<div style="text-align: center;">';
    htmlStr += '<img src="../server/images/Users/'+profile[0].picUrl+'" style="height: 180px;"> </div><br />';
    htmlStr += '<h3 align="center" class="panel-title">'+profile[0].firstName+' '+profile[0].lastName+'</h3>';
    //Finish off table and add to document
    document.getElementById("userprofile").innerHTML = htmlStr;
}