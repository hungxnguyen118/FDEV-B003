<?php
function notice_after_delete_database($result, $message_failed = '', $message_success = '', $page = ''){
    if ($result !== false) {
        ?>
        <script>
            alert('<?= $message_failed ?>');
            <?= ($page)?"window.location.href = 'index.php?page=$page';":''; ?>
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('<?= $message_failed ?>');
        </script>
        <?php
    }
}