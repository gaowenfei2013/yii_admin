<?php
$this->breadcrumbs=array(
	'Members',
);

$this->menu=array(
    array('label'=>'List Members','url'=>'javascript:;','icon'=>'th-list','active'=>true),
	array('label'=>'Create Members','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Manage Members','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Members</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
