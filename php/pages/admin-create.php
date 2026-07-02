<?php

$errors = [];

if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $text = $_POST["text"];
    $price = $_POST["price"];

    if (strlen($title) < 3) {
        $errors["title"] = "title is too short";
    } elseif (strlen($title) > 255) {
        $errors["title"] = "title is too long";
    }
    if (strlen($text) < 3) {
        $errors["text"] = "text is too short";
    } elseif (strlen($text) > 255) {
        $errors["text"] = "text is too long";
    }

    if ($price < 0) {
        $errors["price"] = "price is too short";
    }

    $file = $_FILES["image"];

    // if (empty($file)) {
    //     $errors["image"] = "image is empty";
    // }

    if (empty($errors)) {
        $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, ["jpg", "jpeg", "png"])) {
            $errors["image"] = "only JPG and PNG allowed";
        } else {
            // ИСПРАВЛЕННЫЙ ПУТЬ!
            $imageName = uniqid("object_") . "." . $ext;

            // Вариант 1: Относительный путь от корня проекта
            $uploadDir = __DIR__ . "/../../uploads/";

            // Вариант 2: Абсолютный путь (рекомендуется)
            // $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $uploadPath = $uploadDir . $imageName;

            if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                $smth = $pdo->prepare(
                    "INSERT INTO objects (title, text, price, image) VALUES (?,?,?,?)",
                );
                $smth->execute([$title, $text, $price, $imageName]);

                $_SESSION["message"] = "Object created successfully!";
                header("Location: ?page=catalog");
                exit();
            } else {
                $errors["image"] = "failed to upload file";
            }
        }
    }
}
?>

<div class="form-card">
    <h2>➕ Добавить объект</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Название</label><input type="text" name="title">
                <?php if (isset($errors["title"])): ?>
                    <div class="error-msg"><?= $errors["title"] ?></div>
                 <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Цена</label><input name="price" min="0" type="number">
                <?php if (isset($errors["price"])): ?>
                    <div class="error-msg"><?= $errors["price"] ?></div>
                 <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Описание</label><textarea name="text" rows="3">Уютная студия с WiFi</textarea>
            <?php if (isset($errors["text"])): ?>
                <div class="error-msg"><?= $errors["text"] ?></div>
             <?php endif; ?>
        </div>
        <div class="form-group"><label>Изображение (jpg/png, до 2МБ)</label>
            <input type="file"
                   name="image"
                   accept="image/jpeg,image/png">
        </div>
        <?php if (isset($errors["image"])): ?>
            <div class="error-msg"><?= $errors["image"] ?></div>
         <?php endif; ?>
        <button name="create" class="btn btn-primary">Создать</button>
    </form>
</div>
