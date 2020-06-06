<?php
    include ("../header.php");
?>
<style>
    body, html {
    height: 100%;
    background: url("./images/contact_us.jpg") no-repeat center center fixed;
    background-size: cover;
    color: #fff;
}

.flex-container-background {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
    overflow: auto;
    width: auto;
}

.flex-container-heading {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    width: auto;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    background: rgba(0, 0, 0, .3);
    border: 2px solid #fff;
}

.flex-item {
    width: 500px;
    height: 200px;
    margin: 10px;
    margin-left: auto;
    margin-right: auto;
}

@media screen and (max-width: 500px) {
    .flex-item {
        width: auto;
        height: auto;
    }
}

h1[id="contact"] {
    line-height: normal;
    font-family: Roboto-Thin;
    font-size: 50px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    color: white;
}

h1[id="sub-contact"] {
    margin-top: 0px;
    margin-left: 10px;
    font-size: 30px;
    font-family: Roboto-Regular;
    color: white;
    line-height: normal;
}

p[id="sub-contact"] {
    margin-top: -10px;
    margin-left: 10px;
    font-size: 24px;
    font-family: Roboto-Regular;
    color: white;
    line-height: normal;
}

@media screen and (max-width: 1000px) {
    h1[id="sub-contact"] {
        text-align: center;
    }

    p[id="sub-contact"] {
        text-align: center;
    }
}


}
</style>
<body>
   <?php  include ("../customer/navbar.php"); ?> 
   
    <div class="flex-container-background">
        <div class="flex-container-heading">
            <h1 id="contact">Contact Us</h1>
        </div>

        <div class="flex-container" style="border-bottom: 0;
                                           border-top-left-radius: 10px;
                                           border-top-right-radius: 10px;">
            <div class="flex-item">
                <h1 id="sub-contact">Corporate Headquarters</h1>
                <p id="sub-contact">
                    Corporate HQ<br>Dolphin Bank<br>
                    1985 Cedar Bridge Ave, Suite 3<br>
                    Lakewood, NY 08701
                </p>
            </div>
            <div class="flex-item">
                <h1 id="sub-contact">General Contact</h1>
                <p id="sub-contact">
                    Toll-Free: 888-968-6822<br>
                    Phone: 732-367-5505<br>
                    Fax: 732-367-2313<br>
                    Email: office@&#8203dolphinbank.com
                </p>
            </div>
        </div>

        <div class="flex-container" style="border-top: 0;
                                           border-bottom-left-radius: 10px;
                                           border-bottom-right-radius: 10px;">
            <div class="flex-item">
                <h1 id="sub-contact">Customer Care (24x7)</h1>
                <p id="sub-contact">
                    Toll-Free: 888-966-6992<br>
                    Phone: 732-666-5555<br>
                    Email: care@&#8203dolphinbank.com
                </p>
            </div>
            <div class="flex-item">
                <h1 id="sub-contact">Live Chat</h1>
                <p id="sub-contact">
                    Download our app and live chat<br>
                    with our customer care !<br>
                    App available on Google Play<br>
                    and iPhone-AppStore.
                </p>
            </div>
        </div>
    </div>

</body>
</html>
