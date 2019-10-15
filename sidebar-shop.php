<?php
if ( ! is_active_sidebar( 'shop_sidebar' ) ) {
    return;
}
?>
<div class="col-lg-3">
    <div class="left_sidebar_area">
        <?php dynamic_sidebar('shop_sidebar') ?>
    </div>
</div>