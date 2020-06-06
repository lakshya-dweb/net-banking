<?php
    include ("./validation/validate_admin.php");
    include ("./header.php");
    include ("./navbar.php");
    include ("./user_navbar.php");
    include ("./admin_sidebar.php");
    include ("./session_timeout.php");
?>
    <link rel="stylesheet" href="./admin_home_style.css">
<body>

    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Welcome Admin !
            </h1>
            <p id="customer" style="max-width:800px">
                From here you can manage all of core Internet Banking settings.
                You can add/manage customers, view their transactions, edit their
                details and even delete them. You can also post news on the website.
                <br>Please keep in mind that with big power comes big responsibility.
                Therefore please do not misuse your admin control to create trouble.
            </p>
        </div>
    </div>

</body>
</html>

<?php include "./footer.php"; ?>
