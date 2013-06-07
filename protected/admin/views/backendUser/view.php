<?php
$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>'查看 后台用户','url'=>'javascript:;','icon'=>'eye-open','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出 后台用户','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增 后台用户','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'更新 后台用户','url'=>array('update','id'=>$model->id),'icon'=>'pencil'),
	array('label'=>'删除 后台用户','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'真的要删除这条数据?'),'icon'=>'trash'),
	array('label'=>'管理 后台用户','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>查看 后台用户 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'salt',
		'email',
		'true_name',
		'created',
		'updated',
		'last_login_time',
		'last_login_ip',
		'login_times',
		'login_time',
		'login_ip',
	),
)); ?>