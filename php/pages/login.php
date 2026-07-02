<?php

?>

<div class="form-card">
    <h2>🔑 Вход</h2>
    <form method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="user@mail.ru">
            <div class="error-msg">* пользователь не найден</div>
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" value="">
            <div class="error-msg">* неверный пароль</div>
        </div>
        <button class="btn btn-primary" type="submit">Войти</button>
    </form>
</div>
