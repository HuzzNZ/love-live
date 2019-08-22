<!DOCTYPE HTML>
<head>
    <?php
        include "db-config/db-connect.php";
        $query = $u_album_meta->prepare("SELECT * FROM `albums` WHERE `ID` = ?");
        $query->bind_param("i", $_GET["id"]);
        $query->execute();
        $query_results = $query->get_result();
        $result = mysqli_fetch_assoc($query_results);
        $count = mysqli_num_rows($query_results);
        $real_count = $count;
    ?>
    <title>h/LoveLive! - <?php echo $result['Name'] ?></title>
    <?php include "../global-head.php" ?>
    <meta name="description" content="Album by <?php echo $result['Artist'] ?>, released <?php $date  = date_create($result['Release_Date']); echo date_format($date,"M j Y"); ?>">
</head>

<body>
<?php include "../global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "../global-side-search.php"; ?>
    </div>
    <div class="main-content">
        <?php include "../global-check-results.php"; ?>
    </div>
</div>
</body>

