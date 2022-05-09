<?php
require '../action/action.php';

for ($num = 1; $num <= $totalPages; $num++) {
    if ($num != $current_page) {
        if ($num > $current_page - 4 && $num < $current_page + 4) { ?>
            <li class="active"> <a style="color: white" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
            </li>
        <?php } } else { ?>
        <li class=""><?= $num ?></li>
    <?php }
} ?>