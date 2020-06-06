<?php
    include('../header.php');
    include('../connect.php');
?>
<style>
body, html {
    height: 100%;
    background: url("./images/news.jpg") no-repeat center center fixed;
    background-size: cover;
}
.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}</style>
<body>
    <?php include_once('../customer/navbar.php'); ?>
    <div class="container">
        <?php
            $sql0 = "SELECT id, title, created FROM news ORDER BY created DESC";
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $sql1 = "SELECT body FROM news_body WHERE id=$id";
                $result1 = $conn->query($sql1); ?>
                <div class="card text-white bg-dark mb-3 mt-3 w-70">
                      <div class="card-header display-4"><?php echo $row["title"] . "<br>"; ?></div>
                      <div class="card-body">
                        <h5 class="card-title"><p id="date"><?php echo "Posted On : " .
                                                date("d/m/Y", strtotime($row["created"])); ?></p></h5>
                        <p class="card-text"><?php while($row1 = $result1->fetch_assoc()) {
                                                echo $row1["body"]; } ?></p>
                      </div>
                    </div>
                    <?php }
            } else {
                echo "No news available ! Please post some.";
            }
            $conn->close();
        ?>
    </div>

</body>
</html>
