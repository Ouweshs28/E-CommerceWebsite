function login(){
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
            if (responseData=="success"){
                toastr.success("Successfully logged in");
            }else{
                toastr.error("Incorrect Password or Username")
            }

        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL
    request.open("POST", "customerlogin.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract registration data
    let fname = document.getElementsByName("c_name")[0].value;
    let password = document.getElementsByName("c_password")[0].value;

    if(fname==""||password==""){
        toastr.error("Please fill up all details");
        return;
    }
    //Send request
    request.send("c_username=" + fname
        + "&c_pass=" + password);
}