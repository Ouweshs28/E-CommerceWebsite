let loggedInStr = '<a onclick="logout()">Logout</a>';
let loginStr = '<a href="login.php">Login</a>';
let LoggedInCartStr='<a href="#" class="btn btn-success btn-sm">Welcome</a>' +
    '                <a href="cart.php">4 Items In Your Cart | Total Price: $300 </a>';
let CartStr='<a href="#" class="btn btn-success btn-sm">Welcome</a>';
let LoggedInCartMenu='<a href="cart.php">Go To Cart</a>';
let LoggedInCarBtn='<i class="fa fa-shopping-cart"></i><span>4 Items In Your Cart</span>';
let request = new XMLHttpRequest();

//Check login when page loads
window.onload = checkLogin;

//Checks whether user is logged in.
function checkLogin(){
    //Create event handler that specifies what should happen when server responds
    request.onload = function(){
        console.log(request.responseText);
        if(request.responseText === "ok"){
            document.getElementById("login").innerHTML = loggedInStr;
            document.getElementById("loginnav").innerHTML=loggedInStr;
            document.getElementById("cart").innerHTML=LoggedInCartStr;
            document.getElementById("cartmenu").innerHTML=LoggedInCartMenu;
            document.getElementById("cartBtn").innerHTML=LoggedInCarBtn;
            document.getElementsByClassName("myaccount")[1].style.display="";
            document.getElementsByClassName("myaccount")[0].style.display="";
        }
        if(request.responseText === "out"){
            toastr.success("Successfully logged out");
            document.getElementById("login").innerHTML  = loginStr;
            document.getElementById("loginnav").innerHTML=loginStr;
            document.getElementById("cart").innerHTML=CartStr;
            document.getElementById("cartmenu").style.display="none";
            document.getElementById("cartBtn").style.display="none";
            document.getElementsByClassName("myaccount")[0].style.display="none";
            document.getElementsByClassName("myaccount")[1].style.display="none";
        }
        if(request.responseText==="not logged in"){
            document.getElementById("login").innerHTML  = loginStr;
            document.getElementById("loginnav").innerHTML=loginStr;
            document.getElementById("cart").innerHTML=CartStr;
            document.getElementById("cartmenu").style.display="none";
            document.getElementById("cartBtn").style.display="none";
            document.getElementsByClassName("myaccount")[0].style.display="none";
            document.getElementsByClassName("myaccount")[1].style.display="none";
        }
    };
    //Set up and send request
    request.open("GET", "checklogin.php");
    request.send();
}

//Logs the user out.
function logout(){
    //Create event handler that specifies what should happen when server responds
    request.onload = function(){
        checkLogin();
    };
    //Set up and send request
    request.open("GET", "logout.php");
    request.send();
    window.location.href="index.php";
}