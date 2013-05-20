<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->uid,
);

$this->menu=array(
    array('label'=>'View Members','url'=>'javascript:;','icon'=>'eye-open','active'=>true),
	array('label'=>'List Members','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'Create Members','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Update Members','url'=>array('update','id'=>$model->uid),'icon'=>'eye-open'),
	array('label'=>'Delete Members','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'Are you sure you want to delete this item?'),'icon'=>'remove'),
	array('label'=>'Manage Members','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>View Members #<?php echo $model->uid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'uid',
		'username',
		'password',
		'email',
		'myid',
		'myidkey',
		'regip',
		'regdate',
		'lastloginip',
		'lastlogintime',
		'salt',
		'secques',
	),
)); ?>
