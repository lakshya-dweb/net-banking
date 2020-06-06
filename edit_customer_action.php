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

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $aadhar = mysqli_real_escape_string($conn, $_POST["aadhar"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phno = mysqli_real_escape_string($conn, $_POST["phno"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $acno = mysqli_real_escape_string($conn, $_POST["acno"]);
    $pin = mysqli_real_escape_string($conn, $_POST["pin"]);
    $cus_uname = mysqli_real_escape_string($conn, $_POST["cus_uname"]);
    $cus_pwd = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);

    $sql0 = "UPDATE customer SET first_name = '$fname',
                                 last_name = '$lname',
                                 dob = '$dob',
                                 aadhar_no = '$aadhar',
                                 email = '$email',
                                 phone_no = '$phno',
                                 address = '$address',
                                 branch = '$branch',
                                 account_no = '$acno',
                                 pin = '$pin',
                                 uname = '$cus_uname',
                                 pwd = '$cus_pwd'
                            WHERE cust_id=".$_SESSION['cust_id'];
 echo "<pre>"; print_r($sql0); echo "</pre>";
?>
<style>
    body {
    background-color:  #FAFAFA;
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    margin-left: 256px;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    background-color: #FAFAFA;
}

.flex-item {
    display: -webkit-flex;
    display: flex;
    background-color: #FAFAFA;
    width: auto;
    height: auto;
    margin: 10px;
}

@media screen and (max-width: 855px) {
    .flex-container {
        margin: auto;
    }
}

p[id="info"] {
    font-size: 24px;
    margin-left: 20px;
    margin-right: 20px;
    font-family: Roboto-Regular;
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
    border-radius: 3px;
}

.button:hover {
    opacity: 0.8;
}

</style>
<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
                if (($conn->query($sql0) === TRUE)) { ?>
                    <p id="info"><?php echo "Values Updated Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./manage_customers.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
