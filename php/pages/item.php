<?php

$id = $_GET["id"];

$item = $pdo->prepare("SELECT * FROM objects WHERE id = ?");
$item->execute([$id]);
$obj = $item->fetch();

if (isset($_POST["fav"])) {
    $smth = $pdo->prepare(
        "INSERT INTO favourites (user_id, object_id) VALUES (?,?)",
    );
    $smth->execute([$_SESSION["uid"], $id]);
}
?>

<div class="card" style="max-width: 700px;">
    <div class="card-img">🖼️ изображение объекта</div>
    <div class="card-content">
        <h2><?= $obj["title"] ?></h2>
        <p><strong>Цена:</strong> <?= $obj["price"] ?> ₽</p>
        <p><strong>Описание:</strong> Светлая квартира с ремонтом, рядом метро.</p>
        <div class="flex">
            <form method="POST">
                <button name="fav" class="btn btn-primary">❤️ В избранное</button>
            </form
            <a href="#" class="btn btn-edit">✏️ Редактировать</a>
            <a href="#" class="btn btn-delete">🗑️ Удалить</a>
        </div>
    </div>
</div>
