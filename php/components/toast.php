<?php if (isset($_SESSION["message"])): ?>
    <div class="toast-demo">
        ✅ <?= $_SESSION["message"] ?>
    </div>
      <?php unset($_SESSION["message"]);
    // Удаляем после показа
    ?>
<?php endif; ?>
