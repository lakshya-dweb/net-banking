<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include('../validation/validate_customer.php');
    include('../header.php');
    include('../navbar.php');
    include('../connect.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php');

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $cus_uname = mysqli_real_escape_string($conn, $_POST["cus_uname"]);

    $sql0 = "UPDATE customer SET email = '$email',
                                 address = '$address',
                                 uname = '$cus_uname'
                            WHERE cust_id=".$_SESSION['loggedIn_cust_id'];;
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
            <a href="./customer_home.php" class="button">Home</a>
        </div>

    </div>

</body>
</html>
