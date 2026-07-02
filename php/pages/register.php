<?php

$errors = [];

$name = "";

if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    $smth = $pdo->prepare("SELECT * FROM users WHERE name = ?");
    $smth->execute([$name]);
    $isExistName = $smth->fetch();

    if (strlen($name) < 3) {
        $errors["name"] = "Name is too short";
    } elseif ($isExistName) {
        $errors["name"] = "Name already exists";
    }

    if (strlen($password) < 6) {
        $errors["password"] = "Password is too short";
    }
    if ($password != $password_confirm) {
        $errors["password_confirm"] = "Passwords do not match";
    }

    if (empty($errors)) {
        $user = $pdo->prepare(
            "INSERT INTO users (name, password) VALUES (?,?)",
        );
        $user->execute([$name, hash("sha256", $password)]);

        $_SESSION["message"] = "Успешная регистрация";

        exit(header("Location: ?page=login"));
    }
}
?>

<div class="form-card">
    <h2>🔐 Регистрация</h2>
    <form method="POST">
        <div class="form-group">
            <label>Логин</label>
            <input type="text" value="<?= htmlspecialchars(
                $name,
            ) ?>" name="name">
           <?php if (isset($errors["name"])): ?>
               <div class="error-msg"><?= $errors["name"] ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Пароль (мин 6 символов)</label>
            <input type="password" name="password">
            <?php if (isset($errors["password"])): ?>
                <div class="error-msg"><?= $errors["password"] ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Повтор пароля</label>
            <input type="password" name="password_confirm">
            <?php if (isset($errors["password_confirm"])): ?>
                <div class="error-msg"><?= $errors["password_confirm"] ?></div>
            <?php endif; ?>
        </div>
        <button name="register" class="btn btn-primary" type="submit">Зарегистрироваться</button>
    </form>
</div>
