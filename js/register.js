function register() {
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
            toastr.success(responseData);
            setTimeout(window.location.href = "login.php", 1000);
        } else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL
    request.open("POST", "newcustomer.php");
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

    if (fanme == "" || lanme == "" || username == "" || email == "" || password == "" || address == "" || country == "" || postalCode == "" || phone == "") {
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
        + "&c_contact=" + phone);
}