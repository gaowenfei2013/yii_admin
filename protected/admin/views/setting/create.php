<?php
/* @var $this SettingFormController */
/* @var $model SettingForm */
/* @var $form CActiveForm */

$this->menu=array(
    array('label'=>'新增','url'=>'javascript:;','active'=>true,'icon'=>'plus','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'管理','url'=>array('main'),'icon'=>'th-list'),
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form-form',
	'enableAjaxValidation'=>false,
));

?>

    <p class="help-block"> <span class="required">*</span>是必填项</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'key',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'value',array('class'=>'span5')); ?>
<?php echo $form->dropDownListRow($model,'readOnly',array(0,1)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'提交',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
