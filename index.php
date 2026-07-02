<?php
session_start();
require_once "php/config/pdo.php";
require_once "php/config/pdo.php";

$currentPage = $_GET["page"] ?? "catalog";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Экзамен · PHP | 3 курс</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

    <?php require "./php/components/header.php"; ?>
    <?php require "./php/components/toast.php" ?>

    <?php include("./php/pages/$currentPage.php"); ?>


</div>
</body>
</html>