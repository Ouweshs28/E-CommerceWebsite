<link rel="stylesheet" type="text/css" href="styles/cmslogin.css" />
<div class="w3-container w3-center w3-light-grey" style="padding:64px 16px" id="cmslogin">
    <h1><strong>CMS LOGIN - ADMIN ONLY</strong></h1>
    <div>
        <div class="container">
            <p id="LoginPara">
                <label for="uname"><b>CMS Username</b></label>
                <input type="text" id="username" placeholder="Enter CMS Username" name="username">
                <br>
                <br>
                <label for="password"><b>CMS Password</b></label>
                <input type="password" id="password" placeholder="Enter CMS Password" name="password">
                <br>
                <br>
                <p style="color: red" id="ErrorMessages"></p>
                <button class="cmsloginbutton" onclick="login()">Login</button>
                <br>
                <h3 class="w3-center"><a href="../account.php"><button class="backbutton">Go Back</button></a></h3>
        </div>
    </div>
</div>


<script>
    

    
    var loggedInStr = "";
    var loginStr = document.getElementById("LoginPara").innerHTML;
    var request = new XMLHttpRequest();

    window.onload = checkLogin;

    
    function checkLogin() {
        request.onload = function() {
            if (request.responseText === "ok") {
                document.getElementById("LoginPara").innerHTML = loggedInStr;
            } else {
                console.log(request.responseText);
                document.getElementById("LoginPara").innerHTML = loginStr;
            }
        };
        
        request.open("GET", "checklogin.php");
        request.send();
    }

    function login() {
       
        request.onload = function() {
          
            if (request.status === 200) {
                
                var responseData = request.responseText;

                
                if (responseData === "ok") {
                    document.getElementById("LoginPara").innerHTML = loggedInStr;
                    document.getElementById("ErrorMessages").innerHTML = "";
                    window.location.href = "cmsmenu.php"
                } else
                    document.getElementById("ErrorMessages").innerHTML = request.responseText;
            } else
                document.getElementById("ErrorMessages").innerHTML = "Error communicating with server";
        };

       
        var usrEmail = document.getElementById("username").value;
        var usrPassword = document.getElementById("password").value;

       
        request.open("POST", "cms_login.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("email=" + usrEmail + "&password=" + usrPassword);
    }

    function logout() {
        
        request.onload = function() {
            checkLogin();
        };
       
        request.open("GET", "logout.php");
        request.send();
    }
</script>
