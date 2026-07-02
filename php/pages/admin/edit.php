<?php
?>

<div class="form-card">
    <h2>✏️ Редактировать объект</h2>
    <form>
        <div class="form-group">
            <label>Название</label>
            <input type="text" value="Квартира в центре (обновлено)">
        </div>
        <div class="form-group"><label>Цена</label><input type="number" value="13000"></div>
        <div class="form-group"><label>Описание</label><textarea
                rows="3">Новый ремонт, современная техника</textarea></div>
        <div class="form-group"><label>Новое изображение (jpg/png, до 2МБ)</label><input type="file"
                                                                                         accept="image/jpeg,image/png">
        </div>
        <button class="btn btn-edit">Сохранить изменения</button>
    </form>
</div>
