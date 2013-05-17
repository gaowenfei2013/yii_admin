<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
   $modelClass = !empty($_POST['CrudCode']['tab_name']) ? $_POST['CrudCode']['tab_name'] : $this->modelClass;
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'列出 <?php echo $modelClass; ?>', 'url'=>array('index')),
	array('label'=>'新增 <?php echo $modelClass; ?>', 'url'=>array('create')),
	array('label'=>'更新 <?php echo $modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'删除 <?php echo $modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理 <?php echo $modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1>查看 <?php echo $modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
