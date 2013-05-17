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
$label=$this->pluralize($this->class2name($modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'新增',
);\n";
?>

$this->menu=array(
	array('label'=>'列出 <?php echo $modelClass; ?>', 'url'=>array('index')),
	array('label'=>'管理 <?php echo $modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1>新增 <?php echo $modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
