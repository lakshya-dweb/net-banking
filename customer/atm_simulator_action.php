<?php
    
    include('../validation/validate_customer.php');
    include('../header.php');
    include('../navbar.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php');


    $id = $_SESSION['loggedIn_cust_id'];
    $amt = mysqli_real_escape_string($conn, $_POST["amt"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $pin = mysqli_real_escape_string($conn, $_POST["pin"]);

    $sql0 = "SELECT balance FROM passbook".$id." ORDER BY trans_id DESC LIMIT 1";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    $balance = $row["balance"];

    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Transaction.
         1 = Insufficient Funds.
         2 = Wrong PIN entered. */
    $err_no = -1;

    $sql_pin = "SELECT * FROM customer WHERE cust_id=".$id." AND pin='".$pin."'";
    $result_pin = $conn->query($sql_pin);

    if (($result_pin->num_rows) > 0) {
        // For Credit transactions
        if ($type == "credit") {
            $final_balance = $balance + $amt;

            $sql1 = "INSERT INTO passbook".$id." VALUES(
                        NULL,
                        NOW(),
                        'Cash Deposit',
                        '0',
                        '$amt',
                        '$final_balance'
                    )";

            if (($conn->query($sql1) === TRUE)) {
                $err_no = 0;
            }
        }

        // For Debit transactions
        if ($type == "debit") {
            $final_balance = $balance - $amt;

            if ($final_balance >= 0) {
                $sql1 = "INSERT INTO passbook".$id." VALUES(
                            NULL,
                            NOW(),
                            'Cash to Self',
                            '$amt',
                            '0',
                            '$final_balance'
                        )";

                if (($conn->query($sql1) === TRUE)) {
                    $err_no = 0;
                }
            }
            else {
                $err_no = 1;
            }
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
                <p id="info"><?php echo "Transaction Successful !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Insufficient Funds !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info"><?php echo "Wrong PIN Entered !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./atm_simulator.php" class="button">Go Back</a>
        </div>
    </div>

</body>
</html>
