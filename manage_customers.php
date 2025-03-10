<?php
    include('./validation/validate_admin.php');
    include('./header.php');
    include("./connect.php");
    include('./admin_sidebar.php');
    include('./session_timeout.php');

    if (isset($_POST['submit'])) {
        $back_button = TRUE;
        $search = $_POST['search'];
        $by = $_POST['by'];

        if ($by == "name") {
            $sql0 = "SELECT cust_id, first_name, last_name, account_no FROM customer
            WHERE first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%'
            OR CONCAT(first_name, ' ', last_name) LIKE '%".$search."%'";
        }
        else {
            $sql0 = "SELECT cust_id, first_name, last_name, account_no FROM customer
            WHERE account_no LIKE '$search'";
        }
    }
    else {
        $back_button = FALSE;

        $sql0 = "SELECT cust_id, first_name, last_name, account_no FROM customer";
    }
?>
<style>
    .flex-container {
    display: -webkit-flex;
    display: flex;
    margin-left: 256px;
    width: auto;
    height: auto;
    padding-top: 20px;
    margin-bottom: 100px;
    flex-direction: column;
}

.flex-container-bb {
    display: -webkit-flex;
    display: flex;
    margin: 30px;
    margin-left: auto;
    margin-right: auto;
}

.search-bar-wrapper {
    height: 100px;
}

.search-bar-wrapper .search-bar {
    display: -webkit-flex;
    display: flex;
    margin-left: 256px;
    position: relative;
    width: auto;
    height: 100px;
    flex-direction: column;
    background-color: #448AFF;
    box-shadow: 0 8px 8px -6px black;
    overflow: hidden;
}

form {
    display: -webkit-flex;
    display: flex;
    flex-direction: row;
    width: inherit;
    height: inherit;
}

input[type=text] {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
    height: 56px;
    width: 18vw;
    max-width: 280px;
    margin-top: 12px;
    padding: 1px 1px;
    bottom: 0;
    border: 3px solid #212121;
    box-sizing: border-box;
    background-color: white;
}

button[id="search"] {
    font-family: Roboto-Regular;
    background: url(images/search.png) no-repeat;
    background-color: white;
    cursor: pointer;
    width: 55px;
    height: 40px;
    padding-bottom: 50px;
    border: 3px solid #212121;
    border-left: 0;
}

.add-button {
    font-family: OpenSans-Regular;
    color: #212121;
    font-size: 26px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    background-color: white;
    cursor: pointer;
    margin-top: 12px;
    margin-right: 12px;
    height: 56px;
    padding: 5px 16px;
    border: 3px solid #212121;
}

@media screen and (max-width: 855px) {
    .add-button {
        margin-right: 0px;
        border-right: 0;
        padding: 5px 8px;
    }
}

/* Add a hover effect for buttons */
button[id="search"]:hover {
    background-color: #BDBDBD;
}

label {
    display: block;
    float: left;
    color: #212121;
    font-family: OpenSans-Regular;
    font-size: 26px;
    background-color: white;
    border: 3px solid #212121;
    border-right: 0;
    margin: 12px;
    margin-right: 0px;
    height: 56px;
    padding-top: 5px;
    padding-left: 5px;
}

select {
    font-family: OpenSans-Regular;
    color: #212121;
    font-size: 24px;
    background: url("images/down_arrow.png") 96% / 15% no-repeat #eee;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: white;
    border: 3px solid #212121;
    border-left: 0;
    margin: 12px;
    margin-left: 0px;
    height: 56px;
    width: 95px;
}

@media screen and (max-width: 855px) {
    label {
        display: none;
    }
}

.flex-item-search-bar {
    display: -webkit-flex;
    display: flex;
    flex-direction: row;
    margin: auto;
    width: auto;
    height: auto;
}

/* Used to make the search-bar sticky */
.search-bar-wrapper .search-bar-fixed {
    width: 100%;
    top: 53px;
    bottom: 0;
    z-index: 1;
    position: fixed;
}

.fi-search-bar-fixed {
    position: relative;
    left: -128px;
}

.flex-container-label {
    width: auto;
    flex: 1 1 100px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    font-family: OpenSans-Bold;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin-left: 20px;
    margin-right: 20px;
    cursor: pointer;
    box-shadow: 2px 2px 4px #888888;
    border-radius: 3px;
}

.button:hover {
    box-shadow: 5px 5px 20px #888888;
}
/*-------------------------------------------------------*/

.flex-item {
    display: -webkit-flex;
    display: flex;
    flex-direction: row;
    margin: auto;
    margin-top: 10px;
    width: auto;
    height: auto;
    background-color: #E0E0E0;
    border-radius: 3px;
    box-shadow: 0px 2px 2px #888888;
}

.flex-item-1 {
    flex: 1;
    height: 80px;
    margin: 5px;
    background-color: transparent;
}

.flex-item-2 {
    width: 360px;
    height: auto;
    margin: 5px;
    background-color: transparent;
}

@media screen and (max-width: 855px) {
    .flex-container, .search-bar-wrapper .search-bar {
        margin-left: auto;
    }

    .flex-item-2 {
        width: 250px;
    }
}

@media screen and (max-width: 370px) {
    .flex-container {
        margin-left: auto;
        overflow-x: scroll;
    }
}

p[id="info"] {
    text-align: center;
    font-size: 40px;
    color: #212121;
    margin: auto;
    margin-top: 10px;
    margin-bottom: 10px;
    padding: 12px 32px;
    font-family: Roboto-Regular;
    border: 2px solid #00BCD4;
    border-radius: 7px;
    background-color: #F5F5F5;
}

p[id="id"] {
    text-align: center;
    font-size: 40px;
    color: #212121;
    margin: auto;
    font-family: Roboto-Regular;
}

p[id="name"] {
    margin-top: 0px;
    margin-left: 20px;
    font-size: 40px;
    color: #212121;
    font-family: Roboto-Regular;
}

p[id="acno"] {
    margin-top: -35px;
    margin-left: 20px;
    font-size: 20px;
    color: #212121;
    font-family: Roboto-Regular;
}

p[id="none"] {
    margin: auto;
    font-size: 40px;
    color: #212121;
    font-family: Roboto-Regular;
}

/* Dropdown Button */
.dropbtn {
    background: url("images/menu.png") no-repeat;
    margin-left: 10px;
    margin-top: 10px;
    padding-top: 46px;
    padding-left: 36px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    opacity: 0.8;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-top: -10px;
    margin-left: 20px;
}

@media screen and (max-width: 1100px) {
    .dropdown-content {
        right: 0;
        margin-right: 17px;
    }
}

/* Links inside the dropdown */
.dropdown-content a {
    font-family: OpenSans-Regular;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

</style>
<body>
    <?php  include ("./user_navbar.php"); ?>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">

                <form class="search_form" action="" method="post">
                    <div class="flex-item-search">
                        <input name="search" size="30" type="text" placeholder="Search Customers..." />
                    </div>

                    <div class="flex-item-search-button">
                        <button type="submit" name="submit" id="search"></button>
                    </div>

                    <div class="flex-item-by">
                        <label>By :</label>
                    </div>

                    <div class="flex-item-search-by">
                        <select name="by">
                            <option value="name">Name</option>
                            <option value="acno">Ac/No</option>
                        </select>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="flex-container">
        <?php
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++; ?>

                <div class="flex-item">
                    <div class="flex-item-1">
                        <p id="id"><?php echo $i . "."; ?></p>
                    </div>
                    <div class="flex-item-2">
                        <p id="name"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></p>
                        <p id="acno"><?php echo "Ac/No : " . $row["account_no"]; ?></p>
                    </div>
                    <div class="flex-item-1">
                        <div class="dropdown">
                            <!--We are dynamically naming each dropdown for every entry in the loop and
                                passing the respective integer value in the dropdown_func().
                                This creates adynamic anchor for each button-->
                          <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                          <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                            <!--Pass the customer trans_id as a get variable in the link-->
                            <a href="./edit_customer.php?cust_id=<?php echo $row["cust_id"] ?>">View / Edit</a>
                            <a href="./transactions.php?cust_id=<?php echo $row["cust_id"] ?>">Transactions</a>
                            <a href="./delete_customer.php?cust_id=<?php echo $row["cust_id"] ?>"
                                 onclick="return confirm('Are you sure?')">Delete</a>
                          </div>
                        </div>
                    </div>
                </div>

            <?php }
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            if ($back_button) { ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="./manage_customers.php" class="button">Go Back</a>
                    </div>
                </div>
            <?php }
            $conn->close(); ?>
    </div>

    <script>
    /*  The problem with lots of menus sharing same anchor(dropdown-content) is that clicking on
        any of the buttons produces the same output as clicking the first button. Thus only the
        menu associated with the first button opens. This is BIG PROBLEM when we have lots of menus
        inside the while-loop.
        Hence, solve this problem using dynamic naming to create different anchors for different
        buttons.
        This is a proper solution and NOT a hack/workaround */
    function dropdown_func(i) {
        // Dynamic naming of the dropdown #id
        var doc_id = "dropdown".concat(i.toString());

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        // Close any menus, if opened, before opening a new one
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
        }

        document.getElementById(doc_id).classList.toggle("show");
        return false;
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    // Sticky search-bar
    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        // Fixes some 'unfortunate-graphics-derp' while resizing the window
        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });
    });

    </script>

</body>
</html>
