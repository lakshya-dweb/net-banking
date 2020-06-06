<?php


    include('../validation/validate_customer.php');
    include('../header.php');
    include('../navbar.php');
    include('../customer/customer_navbar.php');
    include('../customer/customer_sidebar.php');
    include('../session_timeout.php');
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
    <form class="add_customer_form" action="pass_change_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Change Password/PIN</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>What do you want to change ?</label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="type" value="password" id="password-radio" checked>
                    <label id="radio-label" for="password-radio"><span class="radio" >Password</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="type" value="pin" id="pin-radio">
                    <label id="radio-label" for="pin-radio"><span class="radio">PIN</span></label>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Enter old value :</b></label><br>
                <input name="old_pwd" size="30" type="password" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Enter new value :</label><br>
                <input name="new_pwd" size="30" type="password" required />
            </div>
            <div  class=container>
                <label>Enter new value again :</b></label><br>
                <input name="check_pwd" size="30" type="password" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="/customer_profile.php" class="button">Go Back</a>
            </div>
            <div class="container">
                <button type="submit">Submit</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }
    </script>

</body>
</html>
