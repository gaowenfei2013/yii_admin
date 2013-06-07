<?php
$this->menu=array(
    array('label'=>'更新','url'=>'javascript:;','active'=>true,'icon'=>'pencil','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
);
?>


<form class="form-vertical" id="setting-main-form" action="<?php echo Yii::app()->createUrl('setting/main'); ?>" method="post">

    <?php foreach($main as $k=>$v): ?>
    <label for="<?php echo  $k ?>" ><?php echo $v['name'] ?></label>
    <?php
        //判断配置字符串长度 >60 则使用textarea
        $vLen = mb_strlen($v['value'],'utf-8');
        if( $vLen < 60):
    ?>
    <input class="span5"  name="main[<?php echo $k ?>][value]"
   id="<?php echo $k ?>" value="<?php echo $v['value'] ?>" type="text" />
    <?php else:
          //自动 textarea
          $spanN =   intval($vLen/30) <=12 ? intval($vLen/30): 12;
          $rows = intval($vLen/30) <=8 ? intval($vLen/30) : 8;
    ?>
    <textarea name="main[<?php echo $k ?>][value]" id="<?php echo $k ?>"
    class="span<?php echo $spanN ?>" rows="<?php echo $rows ?>" >
        <?php echo $v['value'] ?>
    </textarea>
    <?php endif; ?>

    <input type="hidden" name="main[<?php echo $k ?>][name]"  value="<?php echo $v['name'] ?>" />
    <?php endforeach; ?>
    <div class="form-actions">
        <button class="btn btn-primary" type="submit" name="yt0">修改</button>
    </div>

</form>