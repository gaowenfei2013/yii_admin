<?php
/**
 * 隐藏菜单元素
 */
$this->no_visible_elements = true;
?>
<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading"><?php echo Yii::t('site','登录'); ?></p>
            <div class="block-body">
                <form>
                    <label>Username</label>
                    <input type="text" class="span12">
                    <label>Password</label>
                    <input type="password" class="span12">
                    <a href="index.html" class="btn btn-primary pull-right">Sign In</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>