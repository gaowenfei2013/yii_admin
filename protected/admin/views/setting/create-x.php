<?php
$this->menu=array(
    array('label'=>'更新','url'=>'javascript:;','active'=>true,'icon'=>'pencil','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
);
?>


<form class="form-vertical" id="setting-main-form" action="<?php echo Yii::app()->createUrl('setting/main'); ?>" method="post">
    <label for="key" >key标识</label>
    <input class="span5"  name="main[key]" id="key"  type="text" />
    <div class="form-actions">
        <button class="btn btn-primary" type="submit" name="yt0">新增</button>
    </div>

</form>