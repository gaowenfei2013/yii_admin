<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
 $modelClass = !empty($_POST['CrudCode']['tab_name']) ? $_POST['CrudCode']['tab_name'] : $this->modelClass;
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'新增 <?php echo $modelClass; ?>', 'url'=>array('create')),
	array('label'=>'管理 <?php echo $modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1><?php echo $label; ?></h1>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
