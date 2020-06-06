<?php

    include('../validation/validate_customer.php');
    include('../header.php');
    include('../customer/navbar.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php');

    $id = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    if ($row1["debit"] == 0) {
        $transaction = $row1["credit"];
        $type = "credit";
    }
    else {
        $transaction = $row1["debit"];
        $type = "debit";
    }

    $time = strtotime($row1["trans_date"]);
    $sanitized_time = date("d/m/Y, g:i A", $time);

    $sql2 = "SELECT COUNT(*) FROM beneficiary".$id;
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
?>
<style>
    .card.text-center.mt-4.w-80 {
    max-width: 60%;
    margin-left: 30%;
}
</style>
        <div class="card text-center  mt-4  w-80">
          <div class="card-header">
          <h2> Welcome, <?php echo $row0["first_name"] ?>&nbsp<?php echo $row0["last_name"] ?>&nbsp!</h2>
            <br>
          </div>
          <div class="card-body">
            <h5 class="card-title"><h4><b>AC/No: <?php echo $row0["account_no"]; ?></b></h4></h5>
            <p class="card-text">&#9656 Balance: <?php echo number_format($row1["balance"]); ?>/-
                        <br>&#9656 You have <?php echo $row2["COUNT(*)"]; ?> beneficiaries.
                        <br>&#9656 Your last transaction (<?php echo $type; ?>) of&nbspRs.&nbsp<?php
                        echo number_format($transaction); ?><br>
                        on <?php echo $sanitized_time; ?>, was: "<?php echo $row1["remarks"]; ?>"</p>
          </div>
        </div>
<?php include('../footer.php'); ?>
