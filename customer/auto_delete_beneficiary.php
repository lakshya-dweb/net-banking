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
    include('../session_timeout.php')

    $_SESSION['auto_delete_benef'] = false;
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
            <p id="info" style="font-size:36px;">
                <b>One or more of your beneficiaries have been deleted ! :(</b><br>
            </p>
        </div>

        <div class="flex-item">
            <p id="info" style="margin-top:-40px;">
                <br>For security reasons if sensitive details of your beneficiary like
                Phone No, Account No, Email-ID, etc have been changed <b>OR</b> if the
                beneficiary no longer exists, they get deleted from your list of
                beneficiaries automatically.<br><br>
                Please add beneficiary details again. :)
            </p>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Go to Transfer Funds</a>
        </div>

    </div>

</body>
</html>
