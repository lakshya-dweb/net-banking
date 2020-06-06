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

    $sql0 = "DELETE FROM customer WHERE cust_id=".$_SESSION['cust_id'];
    $sql1 = "DROP TABLE passbook".$_SESSION['cust_id'];
    $sql2 = "DROP TABLE beneficiary".$_SESSION['cust_id'];

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
                    <p id="info"><?php echo "Customer Deleted Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>
        </div>

        <div class="flex-item">
            <?php
                if (($conn->query($sql1) === TRUE)) { ?>
                    <p id="info"><?php echo "Customer's Passbook Deleted Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>
        </div>

        <div class="flex-item">
            <?php
                if (($conn->query($sql2) === TRUE)) { ?>
                    <p id="info"><?php echo "Customer's Beneficiary Deleted Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>"; ?></p>
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
