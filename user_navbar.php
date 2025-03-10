<style>
.nav-wrapper {
    height: 53px;
    background: #333;
}

/* Add a black background color to the top navigation */
.nav-wrapper .topnav {
    background-color: #263238;
    overflow: hidden;
    height: 53px;
}

.topnav a[id="hamburger"] {
    display: none;
}

/* Style the Welcome User */
.topnav a[id="user"] {
    float: left;
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 27px;
    font-family: Roboto-Light;
}

/* Style the links inside the navigation bar */
.topnav a[id="profile"] {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 17px 17px;
    text-decoration: none;
    font-size: 17px;
    font-family: OpenSans-Bold;
    background-color: #0D47A1;
    border-top-left-radius: 3px;
}

.topnav a[id="logout"] {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 17px 17px;
    text-decoration: none;
    font-size: 17px;
    font-family: OpenSans-Bold;
    background-color: #b71c1c;
    border-top-right-radius: 3px;
}

/* Change the color of links on hover */
.topnav a[id="profile"]:hover {
    color: white;
    background-color: #2196F3;
}

.topnav a[id="logout"]:hover {
    color: white;
    background-color: #f44336;
}

/* When the screen is less than 855 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 855px) {
    .topnav a[id="user"] {
        display: none;
    }

    .topnav a[id="hamburger"] {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 0px 16px;
        text-decoration: none;
        font-size: 45px;
        font-family: Roboto-Light;
    }
}

/* Used to make the navbar sticky */
.nav-wrapper .navbar-fixed {
    top: 0;
    left: 0;
    right: 0;
    z-index: 10;
    position: fixed;
}

</style>

<body>
    <div class="nav-wrapper">
        <div class="topnav" id="theTopNav">
            <a href="javascript:void(0);" class="icon" onclick="openNav()" id="hamburger">
                &#9776;
            </a>
            <a id="user">Welcome, &nbspAdmin !</a>
            <a id="logout" href="./logout_action.php" style="border-top-left-radius: 3px;" 
                    onclick="return confirm('Are you sure?')">Logout</a>
        </div>
    </div>

<script>
// Function below is jquery-3 function used for making the navbar sticky
$(document).ready(function() {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 120) {
      $("#theTopNav").addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 121) {
      $("#theTopNav").removeClass('navbar-fixed');
  }
  });
});
</script>

</body>
</html>
