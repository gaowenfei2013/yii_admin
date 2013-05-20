<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
    array('label'=>'Update Members','url'=>'javascript:;','active'=>true,'icon'=>'pencil'),
	array('label'=>'List Members','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'Create Members','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'View Members','url'=>array('view','id'=>$model->uid),'icon'=>'eye-open'),
	array('label'=>'Manage Members','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Update Members <?php echo $model->uid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>