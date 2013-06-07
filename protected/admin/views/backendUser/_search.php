<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'true_name',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'last_login_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'last_login_ip',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'login_times',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'login_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'login_ip',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'搜索',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
