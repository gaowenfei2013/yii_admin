<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'Create Members','url'=>'javascript:;','icon'=>'plus','active'=>true),
	array('label'=>'List Members','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'Manage Members','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Create Members</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>