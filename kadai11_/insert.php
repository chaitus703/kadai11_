<?php

require_once('model.php');
$pdo = db_connect();
$view = get_all_posts($pdo);

require_once('templates/list.php');

// funcs.phpを読み込む
require_once('funcs.php');


require_once('model.php');
$pdo = db_connect();
$view = get_all_posts2($pdo);
?>
    
    <div class="container">
        <div><?= $view ?></div>
    </div>
</div>
</body>
</html>