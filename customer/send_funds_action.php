<?php

    include('../validation/validate_customer.php');
    include('../header.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php');

    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Transaction.
         1 = Insufficient Funds.
         2 = Wrong password entered. */
    $err_no = -1;

    if (isset($_GET['cust_id'])) {
        $receiver_id = $_GET['cust_id'];
    }

    $sender_id = $_SESSION['loggedIn_cust_id'];
    $amt = mysqli_real_escape_string($conn, $_POST["amt"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id." AND pwd='".$password."'";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql5 = "SELECT * FROM customer WHERE cust_id=".$receiver_id;
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    if (($result0->num_rows) > 0) {
        $sql1 = "SELECT balance FROM passbook".$sender_id." ORDER BY trans_id DESC LIMIT 1";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $sender_balance = $row1["balance"];

        $updated_sender_balance = $sender_balance - $amt;
        if($updated_sender_balance >= 0) {
            $sql2 = "SELECT balance FROM passbook".$receiver_id." ORDER BY trans_id DESC LIMIT 1";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $receiver_balance = $row2["balance"];

            $updated_receiver_balance = $receiver_balance + $amt;

            $sql3 = "INSERT INTO passbook".$sender_id." VALUES(
                        NULL,
                        NOW(),
                        'Sent to: ".$row5["first_name"]." ".$row5["last_name"].", AC/No: ".$row5["account_no"]."',
                        '$amt',
                        '0',
                        '$updated_sender_balance'
                    )";

            $sql4 = "INSERT INTO passbook".$receiver_id." VALUES(
                        NULL,
                        NOW(),
                        'Received from: ".$row0["first_name"]." ".$row0["last_name"].", AC/No: ".$row0["account_no"]."',
                        '0',
                        '$amt',
                        '$updated_receiver_balance'
                    )";

            if (($conn->query($sql3) === TRUE) && ($conn->query($sql4) === TRUE)) {
                $err_no = 0;
            }
        }
        else {
            $err_no = 1;
        }
    }
    else {
        $err_no = 2;
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
            if ($err_no == -1) { ?>
                <p id="info"><?php echo "Connection Error ! Please try again later.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info"><?php echo "Transfer Successful !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Insufficient Funds !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info"><?php echo "Wrong password entered !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Go Back</a>
        </div>
    </div>

</body>
</html>
