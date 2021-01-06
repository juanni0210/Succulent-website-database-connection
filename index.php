<?php include "./db-connection/connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta:vp -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title>Jane's Succulents Garden</title>
    <?php include "./includes/styles.php"; ?>
</head>

<body>
    <div id="bootstrap-override">
        <?php include "./includes/navigation.php"; ?>
        <?php include "./includes/masthead.php"; ?>
    </div>

    <div class="container plants">
        <h2 class="text-centered">Our Plants</h2>
        <div class="row">
            <?php 
                include "./web-service/get-data.php"; 
                printHTML();
            ?>
        </div>
    </div>
    <?php include "./includes/footer.php"; ?>

    <?php include "./includes/scripts.php"; ?>
</body>

</html>
