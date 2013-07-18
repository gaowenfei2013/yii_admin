<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
        <div class="row-fluid">
                <div class="span12">
                    <div id="sidebar" class="well well-small span3">
                        <?php
                        $controllerName = isset($this->controllerName) ? $this->controllerName : null;
                        $this->beginWidget('zii.widgets.CPortlet', array(
                            'title' => '操作 '.$controllerName,
                        ));
                        $this->widget('bootstrap.widgets.TbMenu', array(
                            'items' => $this->menu,
                            'htmlOptions' => array('class' => 'nav-list'),
                        ));
                        $this->endWidget();
                        ?>
                        </div>
                    <!-- sidebar -->
                    <div id="content">
                        <?php echo $content; ?>
                    </div>
                    <!-- content -->
                </div>
        </div>
<?php $this->endContent(); ?>