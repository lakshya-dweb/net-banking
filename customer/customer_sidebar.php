<style>
    .sidenav {
    width: 256px;
    background-color: #eee;
    height: 90vh;
    float: left;
    overflow-y: auto;
    box-shadow: 1px 1px 5px #888888;
}

.sidenav a {
    font-family: OpenSans-Regular;
    font-size: 19px;
    color: #212121;
    display: block;
    padding: 22px 16px;
    text-decoration: none;
}

.sidenav a:hover {
    background-color: #ddd;
}

.sidenav a[id="label"] {
    font-family: OpenSans-Bold;
    font-size: 22px;
    color: #212121;
    display: block;
    padding: 11px;
    text-decoration: none;
    border-top: 1px solid #212121;
    border-bottom: 1px solid #212121;
}

.sidenav a[id="label"]:hover {
    background-color: transparent;
}

.sidenav a.active {
    background-color: #ccc;
}

/* Sticky Sidebar */
.sidenav-fixed {
    height: auto;
    top: 53px;
    z-index: 100;
    bottom: 0;
    position: fixed;
}

.sidenav a[id="closebtn"] {
    display: none;
}

@media screen and (max-width: 855px) {
    .sidenav {
        height: 100vh;
        width: 0;
        margin-top: -53px;
        z-index: 100;
        top: 131px;
        background-color: #eee;
        overflow-x: hidden;
        transition: 0.5s;
        box-shadow: 3px 3px 20px #000000;
    }

    .sidenav a[id="closebtn"] {
        font-family: OpenSans-Regular;
        font-size: 19px;
        color: #212121;
        display: block;
        margin-left: 200px;
    }

    .sidenav.sidenav-fixed.responsive {
        top: 53px;
        z-index: 100;
    }
}

</style>
<body>
    <div class="sidenav" id="theSideNav">
        <a href="javascript:void(0)" id="closebtn" style="padding: 10px 20px;"
                        onclick="closeNav()">&times;</a>
        <a href="./customer_home.php">Home</a>
        <a href="./customer_transactions.php">My Transactions</a>
        <a id="label">Send/Recieve</a>
        <a href="./beneficiary.php">Transfer Funds</a>
        <a href="./atm_simulator.php">ATM Simulator</a>
        <a id="label">Contact Us<a href="tel:0294-2395">0294-2395</a></a>

    </div>

<script>
// For-Loop below is used to create active links and accordingly color them.
// Helps in recognizing which tab is selected.
for (var i = 0; i < document.links.length; i++) {
    if (document.URL.indexOf('?') > 0) {
        sanitizedURL = document.URL.substring(0, document.URL.indexOf('?'));
    }
    else {
        sanitizedURL = document.URL;
    }
    if (document.links[i].href == sanitizedURL) {
        document.links[i].className = 'active';
    }
}

function openNav() {
    document.getElementById("theSideNav").style.width = "256px";
    var x = document.getElementById("theSideNav");
    if (x.className === "sidenav sidenav-fixed") {
        x.className += " responsive";
    }
}

// Never use get window size of jquery, in javascript, they dont work !
function closeNav() {
    if (document.documentElement.clientWidth < 856) {
        document.getElementById("theSideNav").style.width = "0";
    }
}

$(document).ready(function() {
    $(window).resize(function () {
        if ($(window).width() > 855)
            document.getElementById("theSideNav").style.width = "256px";

        if (($(window).width()) < 856){
            $('#closebtn').trigger('click');
        }
    });
});

// Function below is jquery-3 function used for making the navbar sticky
$(document).ready(function() {
    $(window).scroll(function () {
        var x1 = document.getElementById("theSideNav").style.width;

        if ($(window).scrollTop() > 120) {
          $("#theSideNav").addClass('sidenav-fixed');

            if (($(window).width()) < 856 && x1 == "256px") {
                $('#hamburger').trigger('click');
            }
        }

        if ($(window).scrollTop() < 121) {
          $("#theSideNav").removeClass('sidenav-fixed');
        }
    });
});
</script>

</body>
</html>
