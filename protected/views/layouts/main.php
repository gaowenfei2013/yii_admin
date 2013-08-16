
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="zh_cn"/>
    <meta name="keywords" content="yii"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <style type="text/css">
        /* Body and structure
        -------------------------------------------------- */
    body {
        position: relative;
        padding-top: 40px;
    }
        /* Responsive
        -------------------------------------------------- */
        /* Tablet to desktop
        ------------------------- */
    @media (min-width: 768px) and (max-width: 980px) {
        /* Remove any padding from the body */
        body {
            padding-top: 0;
        }
    }
        /* Tablet
        ------------------------- */
    @media (max-width: 767px) {
        /* Remove any padding from the body */
        body {
            padding-top: 0;
        }
    }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.bootcss.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->

</head>

<body>

<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>null, // null or 'inverse'
    'brand'=>CHtml::encode($this->pageTitle),
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>'#', 'active'=>true),
                array('label'=>'Link', 'url'=>'#'),
                array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
                )),
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Link', 'url'=>'#'),
                '---',
                array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'Separated link', 'url'=>'#'),
                )),
            ),
        ),
    ),
));
?>

<div class="container">

    <?php echo $content; ?>
    <hr>
    <footer>
        <p>&copy; Company 2013</p>
    </footer>

</div> <!-- /container -->

</body>

</html>

