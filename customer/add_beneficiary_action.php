<?php

    include('../validation/validate_customer.php');
    include('../header.php');
    include('../navbar.php');
    include('../connect.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php')

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $acno = mysqli_real_escape_string($conn, $_POST["acno"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phno = mysqli_real_escape_string($conn, $_POST["phno"]);

    $id = $_SESSION['loggedIn_cust_id'];
    $sql0 = "SELECT cust_id FROM customer WHERE first_name='".$fname."' AND
                                                last_name='".$lname."' AND
                                                account_no='".$acno."' AND
                                                email='".$email."' AND
                                                phone_no='".$phno."'";
    $result = $conn->query($sql0);

    $success = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $beneficiary_id = $row["cust_id"];

        if ($id != $beneficiary_id) {
            $sql1 = "INSERT INTO beneficiary".$id." VALUES(
                        NULL,
                        '$beneficiary_id',
                        '$email',
                        '$phno',
                        '$acno'
                    )";

            if (($conn->query($sql1) === TRUE)) {
                $success = 1;
            }
        }
        else {
            $success = -1;
        }
    }
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
            if ($success == 1) { ?>
                <p id="info"><?php echo "Beneficiary successfully added !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Invalid data entered/Connection error !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Can't add self as beneficiary !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Go Back</a>
        </div>
    </div>

</body>
</html>
