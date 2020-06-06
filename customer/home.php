<?php
   include('../header.php');


    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
           background:url("./images/home.jpg") no-repeat center center fixed;
           background-size: cover;
          overflow-x: hidden; 
        }

        .d-flex.justify-content-center {
            margin-top: 69px;
        }
        .user_card {
            height: 300px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: rgba(0, 0, 0, .5);
            position: relative;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }
        .brand_logo_container {
            position: absolute;
            height: 140px;
            width: 140px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .login_btn {
            width: 100%;
            background: #c0392b !important;
            color: white !important;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .login_container {
            padding: 0 2rem;
        }
        .input-group-text {
            background: #c0392b !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
</style>
<body>
    <?php include('../customer/navbar.php');?>
    <div class="container h-100">
          <div class="row">  
                <div class="col-md-12" align="center">
                    <h2 class="display-4 text-white">Your Bank at Your Fingertips</h2>
                </div>
            </div>
        <div class="d-flex justify-content-center">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="images/logo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <form action="./customer_login_action.php" method="post">
                            <h2 class="display-5 text-white text-center">Welcome</h2>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="cust_uname" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="cust_psw" class="form-control input_pass" value="" placeholder="password">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="button" class="btn login_btn">Login</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
