<?php

?>

<div class="form-card">
    <h2>➕ Добавить объект</h2>
    <form>
        <div class="form-group">
            <label>Название</label><input type="text" value="Новая студия">
            <div class="error-msg">* пользователь не найден</div>
        </div>
        <div class="form-group">
            <label>Цена</label><input type="number" value="15000">
            <div class="error-msg">* пользователь не найден</div>
        </div>
        <div class="form-group">
            <label>Описание</label><textarea rows="3">Уютная студия с WiFi</textarea>
            <div class="error-msg">* пользователь не найден</div>
        </div>
        <div class="form-group"><label>Изображение (jpg/png, до 2МБ)</label><input type="file"
                                                                                   accept="image/jpeg,image/png">
        </div>
        <div class="error-msg">❌ Размер превышает 2 МБ (демо)</div>
        <button class="btn btn-primary">Создать</button>
    </form>
</div>
