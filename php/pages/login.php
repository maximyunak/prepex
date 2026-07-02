<?php

$errors = [];

if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $smth = $pdo->prepare("SELECT * FROM users WHERE name = ?");
    $smth->execute([$name]);
    $user = $smth->fetch();

    if (!$user) {
        $errors["user"] = "not found";
    }

    if (!$user || !password_verify($password, $user["password"])) {
        $errors["password"] = "not true";
    } else {
        $_SESSION["uid"] = $user["id"];

        exit(header("Location: ?page=catalog"));
    }
}
?>

<div class="form-card">
    <h2>🔑 Вход</h2>
    <form method="POST">
        <div class="form-group">
            <label>Email</label>
            <input name="name" value="user@mail.ru">
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" value="">
        </div>
        <?php if (isset($errors["password"])): ?>
            <div>password miss</div>
        <?php endif; ?>
        <?php if (isset($errors["user"])): ?>
            <div>user miss</div>
        <?php endif; ?>
        <button name="login" class="btn btn-primary" type="submit">Войти</button>
    </form>
</div>
