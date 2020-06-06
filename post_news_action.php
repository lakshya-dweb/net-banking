<?php
  

    include ("./validation/validate_admin.php");
    include ("./connect.php");
    include ("./header.php");
    include ("./user_navbar.php");
    include ("./admin_sidebar.php");
    include ("./session_timeout.php");
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
            $headline = mysqli_real_escape_string($conn, $_POST["headline"]);
            $news_details = mysqli_real_escape_string($conn, $_POST["news_details"]);

            $sql0 = "INSERT INTO news (title, created)
            VALUES('$headline', NOW())";

            $sql1 = "INSERT INTO news_body (body)
            VALUES('$news_details')"; ?>

            <?php
            if (($conn->query($sql0) === TRUE) && ($conn->query($sql1) === TRUE)) { ?>
                <p id="info"><?php echo "News posted successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Server Error !<br>";
                echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>";
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php
            }

            $conn->close();
            ?>
        </div>

        <div class="flex-item">
            <a href="./post_news.php" class="button">Post Again</a>
        </div>

    </div>

</body>
</html>
