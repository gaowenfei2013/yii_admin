<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'list',
            'items'=>$this->menu,
            'htmlOptions'=>array('class'=>'well'),
        ));
        ?>
    <?php $this->widget('bootstrap.widgets.TbMenu', array(
        'type'=>'list',
        'items'=>array(
            array('label'=>'LIST HEADER'),
            array('label'=>'Home', 'icon'=>'home', 'url'=>'#'),
            array('label'=>'Library', 'icon'=>'book', 'url'=>'#','active'=>true),
            array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
            array('label'=>'ANOTHER LIST HEADER'),
            array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
            array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
            array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
        ),
    )); ?>
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>