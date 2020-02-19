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
    htmlStr += '<div class="form-group"><label>Your Country</label><input type="text" class="form-control" name="c_country" value="'+profile[0].country+'"></div>';
    htmlStr += '<div class="form-group"><label>Your Postal Code</label><input type="text" class="form-control" name="c_postalcode" value="'+profile[0].postalCode+'"></div>';
    htmlStr += '<div class="form-group"><label>Your Phone Number</label><input type="text" class="form-control" name="c_contact" value="'+profile[0].phone+'"></div>';
    htmlStr += '<div class="text-center"><button name="register" class="btn btn-primary" onclick="update()">UPDATE</button></div>';
    //Finish off table and add to document
    document.getElementById("myaccount").innerHTML = htmlStr;
}

function displayProfile(userProfile){
    //Convert JSON to array of product objects
    let profile = JSON.parse(userProfile);

    //Create HTML table containing product data
    let htmlStr = '<div style="text-align: center;">';
    htmlStr += '<img src="../images/user.png" style="height: 180px;"> </div><br />';
    htmlStr += '<h3 align="center" class="panel-title">'+profile[0].firstName+' '+profile[0].lastName+'</h3>';
    //Finish off table and add to document
    document.getElementById("userprofile").innerHTML = htmlStr;
}

function update(){
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
            toastr.success(responseData);
            window.location.href="index.php";
        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL
    request.open("POST", "updatecustomer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract registration data
    let fanme = document.getElementsByName("c_fname")[0].value;
    let lanme = document.getElementsByName("c_lname")[0].value;
    let username = document.getElementsByName("c_username")[0].value;
    let email = document.getElementsByName("c_email")[0].value;
    let password = document.getElementsByName("c_pass")[0].value;
    let address = document.getElementsByName("c_address")[0].value;
    let country = document.getElementsByName("c_country")[0].value;
    let postalCode = document.getElementsByName("c_postalcode")[0].value;
    let phone = document.getElementsByName("c_contact")[0].value;

    if(fanme==""||lanme==""||username==""||email==""||password==""||address==""||country==""||postalCode==""||phone==""){
        toastr.error("Please fill up all details");
        return;
    }
    //Send request
    request.send("c_fname=" + fanme
        + "&c_lname=" + lanme
        + "&c_username=" + username
        + "&c_email=" + email
        + "&c_pass=" + password
        + "&c_address=" + address
        + "&c_country=" + country
        + "&c_postalcode=" + postalCode
        + "&c_contact=" + phone );
}