<?php

     include('../validation/validate_customer.php');
    include('../header.php');
    include('../navbar.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php');

    if (isset($_GET['cust_id'])) {
        $id = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
?>

<style>
    .flex-container {
    display: -webkit-flex;
    display: flex;
    margin-left: 0px;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    background-color: #FAFAFA;
}

.flex-container-form_header {
    display: -webkit-flex;
    display: flex;
    margin-left:0px;
    width: auto;
    height: auto;
    background-color: #FAFAFA;
    border-bottom: 3px solid #263238;
}

h1[id="form_header"] {
    margin-left: 0px;
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
    background: url("./images/radio_button_unchecked.png") left top no-repeat;
    display: block;
    min-height: 25px;
    padding-left: 35px;
}

input[type=radio]:checked + label {
    background: url("./images/radio_button_checked.png") left top no-repeat;
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
    background: url("./images/down_arrow.png") 96% / 15% no-repeat #eee;
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
    <div align="center">
    <form class="add_customer_form w-50" action="./send_funds_action.php?cust_id=<?php echo $id ?>" method="post" style="border:2px solid black;">
        <div class="flex-container-form_header">
            <h1 id="form_header">Transfer Funds</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>
                    To : <label id="info_label">
                        <?php echo $row0["first_name"]." ".$row0["last_name"] ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No : <label id="info_label"><?php echo $row0["account_no"] ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Enter Amount :</label><br>
                <input name="amt" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Enter your password :</b></label><br>
                <input name="password" size="24" type="password" required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-6">
                <a href="/beneficiary.php" class="button">Go Back</a>
            </div>
            <div class="col-md-6 col-6">
                <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12 col-12">
                <button type="submit" class="btn btn-md btn-block btn-success">Submit</button>
            </div>
        </div>

    </form>
</div>
    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }
    </script>

</body>
</html>
