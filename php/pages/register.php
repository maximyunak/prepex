<?php
?>

<div class="form-card">
    <h2>🔐 Регистрация</h2>
    <form method="POST">
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" value="demo_user">
            <div class="error-msg">* поле обязательно, только латиница</div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="demo@example.com">
            <div class="error-msg">* неверный формат или email уже занят</div>
        </div>
        <div class="form-group">
            <label>Пароль (мин 6 символов)</label>
            <input type="password" name="password" value="123456">
        </div>
        <div class="form-group">
            <label>Повтор пароля</label>
            <input type="password" name="password2" value="123456">
            <div class="error-msg">пароли не совпадают</div>
        </div>
        <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
    </form>
</div>
