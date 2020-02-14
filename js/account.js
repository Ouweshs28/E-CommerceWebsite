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
function displayProfile(jsonProducts){
    //Convert JSON to array of product objects
    let profile = JSON.parse(jsonProducts);

    //Create HTML table containing product data
    let htmlStr = '<label>Your Username</label>'+
        '<input type="text" class="form-control" name="c_username" required disabled value='+profile[0].username+'>' + '</div>';
        htmlStr += '<div class="form-group"><label>First Name</label><input type="text" class="form-control" name="c_fname" value='+profile[0].firstName+' required></div>';
        htmlStr += '<div class="form-group"> <label>Last Name</label> <input type="text" class="form-control" name="c_lname" value='+profile[0].lastName+' required> </div>';
        htmlStr += '<div class="form-group"><label>Your Email</label> <input type="text" class="form-control" name="c_email" value='+profile[0].email+' required> </div>';
        htmlStr += '<div class="form-group"><label>Your Password</label><input type="password" class="form-control" name="c_pass" value='+profile[0].password+' required>';
        htmlStr += '<div class="form-group"><label>Your Address</label><input type="text" class="form-control" name="c_address" value='+profile[0].address+' required></div>';
        htmlStr += '<div class="form-group"><label>Your Postal Code</label><input type="text" class="form-control" name="c_postalcode" value='+profile[0].postalCode+' required></div>';
        htmlStr += '<div class="form-group"><label>Your Phone Number</label><input type="text" class="form-control" name="c_contact" value='+profile[0].phone+' required></div>';
        htmlStr +='<div class="form-group"><label>Your Profile Picture</label><input type="file" class="form-control form-height-custom" name="c_image" required></div>'
        htmlStr += '<div class="text-center"><button name="register" class="btn btn-primary">UPDATE</button></div>';
    //Finish off table and add to document
    document.getElementById("myaccount").innerHTML = htmlStr;
}