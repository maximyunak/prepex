<?php

$favs = $pdo
    ->query(
        "SELECT * FROM favourites f LEFT JOIN objects o on o.id = f.object_id",
    )
    ->fetchAll(); ?>

<div class="profile-card form-card" style="max-width: 700px;">
    <h2>👤 Профиль: admin_ivan</h2>
    <p>Email: admin@example.com</p>
    <hr>
    <h3>⭐ Избранные объекты</h3>
    <div class="favorite-list">

        <?php foreach ($favs as $fav): ?>
        <div style="display: flex; justify-content: space-between; margin-top: 10px;">
            <a href="">
                <span><?= $fav["title"] ?></span>
            </a>
            <a href="#" class="btn-delete" style="padding: 4px 16px;">Удалить</a>
        </div>
        <?php endforeach; ?>

        <div style="display: flex; justify-content: space-between; margin-top: 10px;">
            <a href="">
                <span>Квартира в центре</span>
            </a>
            <a href="#" class="btn-delete" style="padding: 4px 16px;">Удалить</a>
        </div>
        <div style="display: flex; justify-content: space-between; margin-top: 10px;">
            <a href="">
                <span>Квартира в центре</span>
            </a>
            <a href="#" class="btn-delete" style="padding: 4px 16px;">Удалить</a>
        </div>
    </div>
</div>
