<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include ("./validation/validate_admin.php");
    include ("./connect.php");
    include ("./header.php");
    include ("./user_navbar.php");
    include ("./admin_sidebar.php");
    include ("./session_timeout.php");

    if (isset($_GET['cust_id'])) {
        $_SESSION['cust_id'] = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id'];
    $sql1 = "SELECT * FROM passbook".$_SESSION['cust_id']." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$_SESSION['cust_id'].")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $gender = $row["gender"];
            $dob = $row["dob"];
            $aadhar = $row["aadhar_no"];
            $email = $row["email"];
            $phno = $row["phone_no"];
            $address = $row["address"];
            $branch = $row["branch"];
            $acno = $row["account_no"];
            $pin = $row["pin"];
            $cus_uname = $row["uname"];
            $cus_pwd = $row["pwd"];
        }
    }

    if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            $balance = $row["balance"];
        }
    }
?>
<style>
    .flex-container {
    display: -webkit-flex;
    display: flex;
    margin-left: 256px;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    background-color: #FAFAFA;
}

.flex-container-form_header {
    display: -webkit-flex;
    display: flex;
    margin-left: 256px;
    width: auto;
    height: auto;
    background-color: #FAFAFA;
    border-bottom: 3px solid #263238;
}

h1[id="form_header"] {
    margin-left: 20px;
    font-family: Roboto-Thin;
    color: #263238;
}

.flex-container-radio {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    background-color: #FAFAFA;
}

@media screen and (max-width: 855px) {
    .flex-container, .flex-container-form_header {
        margin-left: auto;
    }
}

/* Bordered form */
form {
    border: 3px solid white;
    width: inherit;
    margin-left: 0px;
}

label {
    display: block;
    float: left;
    color: #212121;
    font-family: OpenSans-Bold;
    font-size: 20px;
}

label[id="info_label"] {
    display: block;
    float: right;
    margin-left: 6px;
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
    width: auto;
    margin: 8px 0;
    padding: 1px 1px;
    border: 0;
    border-bottom: 1px solid #212121;
    box-sizing: border-box;
    background-color: transparent;
}

@media screen and (max-width: 480px) {
    input[type=text], input[type=password] {
        width: 300px;
    }

    label[id="info_label"] {
        display: block;
        float:none;
    }
}

@media screen and (max-width: 350px) {
    input[type=text], input[type=password] {
        width: 240px;
    }
}

.container {
    margin-top: 20px;
    margin-left: 20px;
    margin-right: 20px;
    float: left;
    display: inline-block;
}

input[type=radio] {
    display: none;
    background-color: white;
    float: left;
    padding: 1px 1px;
}

label[id="radio-label"] {
    background: url("images/radio_button_unchecked.png") left top no-repeat;
    display: block;
    min-height: 25px;
    padding-left: 35px;
}

input[type=radio]:checked + label {
    background: url("images/radio_button_checked.png") left top no-repeat;
}

textarea {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
    height: 100px;
    width:35vw;
    max-width: 720px;
    min-width: 240px;
    margin: 8px 0;
    padding: 1px 1px;
    border: 0;
    border: 1px solid #212121;
    box-sizing: border-box;
    background-color: transparent;
}

select {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 20px;
    background: url("images/down_arrow.png") 96% / 15% no-repeat #eee;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: transparent;
    width: 130%;
    padding: 4px 0;
    border: none;
    border-bottom: 1px solid #212121;
}

/* Set a style for all buttons */
button {
    font-family: OpenSans-Regular;
    font-size: 18px;
    background-color: #00BCD4;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 3px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    font-family: OpenSans-Regular;
    font-size: 18px;
    padding: 14px 20px;
    margin: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 3px;
    cursor: pointer;
}

.password-button {
    background-color: transparent;
    color: #d50000;
    font-family: OpenSans-Regular;
    font-size: 18px;
    padding: 14px 20px;
    margin: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 3px;
    border: 2px solid #d50000;
    cursor: pointer;
}

.password-button:hover {
    background-color: #d32f2f;
    color: white;
    border: 2px solid #d32f2f;
}

/* Add a hover effect for buttons */
button:hover, .button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.reset {
    width: auto;
    background-color: #f44336;
}

</style>
<body>
    <form class="add_customer_form" action="./edit_customer_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Edit/View Customer details . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Customer ID : <label id="info_label"> <?php echo $_SESSION['cust_id'] ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name :</label><br>
                <input name="fname" size="30" type="text" value="<?php echo $fname ?>" required />
            </div>
            <div  class=container>
                <label>Last Name :</b></label><br>
                <input name="lname" size="30" type="text" value="<?php echo $lname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance : <label id="info_label"> <?php echo number_format($balance) ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Gender :
                    <label id="info_label">
                    <?php
                        if ($gender == "male") {echo "Male";}
                        elseif ($gender == "female") {echo "Female";}
                        else {echo "Others";}
                    ?>
                    <label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Date of Birth :</label><br>
                <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" value="<?php echo $dob ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Aadhar No :</label><br>
                <input name="aadhar" size="25" type="text" value="<?php echo $aadhar ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div  class=container>
                <label>Phone No. :</b></label><br>
                <input name="phno" size="30" type="text" value="<?php echo $phno ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Address :</label><br>
                <textarea name="address" required /><?php echo $address ?></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Bank Branch :</label>
            </div>
            <div  class=container>
                <select name="branch">
                    <option value="kathmandu" <?php if ($branch == 'kathmandu') {?> selected="selected" <?php }?>>Kathmandu</option>
                    <option value="delhi" <?php if ($branch == 'delhi') {?> selected="selected" <?php }?>>Delhi</option>
                    <option value="newyork" <?php if ($branch == 'newyork') {?> selected="selected" <?php }?>>New York</option>
                    <option value="paris" <?php if ($branch == 'paris') {?> selected="selected" <?php }?>>Paris</option>
                    <option value="riyadh" <?php if ($branch == 'riyadh') {?> selected="selected" <?php }?>>Riyadh</option>
                    <option value="moscow" <?php if ($branch == 'moscow') {?> selected="selected" <?php }?>>Moscow</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No :</label><br>
                <input name="acno" size="25" type="text" value="<?php echo $acno ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>PIN(4 digit) :</b></label><br>
                <input name="pin" size="15" type="text" value="<?php echo $pin ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Username :</label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="cus_pwd" size="30" type="password" value="<?php echo $cus_pwd ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="./manage_customers.php" class="button">Go Back</a>
            </div>
            <div class="container">
                <button type="submit">Update</button>
            </div>
        </div>

    </form>

</body>
</html>
