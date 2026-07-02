<?php

$items = $pdo->query("SELECT * FROM objects")->fetchAll(); ?>

<h2 class="section-title">🏡 Объекты</h2>
<div class="object-grid">
    <?php foreach ($items as $item): ?>
    <a href="?page=item&id=<?= $item["id"] ?>">
        <div class="card">
            <div class="card-img">
                <img src="uploads/<?= $item["image"] ?> " alt="<?= $item[
     "title"
 ] ?>" />
            </div>
            <div class="card-content">
                <div class="card-title"><?= $item["title"] ?></div>
                <div>⭐ <?= $item["price"] ?> ₽ / мес</div>
                <a href="#" class="btn btn-outline" style="margin-top: 12px;">Подробнее</a>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
</div>
