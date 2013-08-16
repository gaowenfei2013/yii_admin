<?php
$backend = dirname(dirname(__FILE__));
$frontend = dirname($backend);
Yii::setPathOfAlias('backend',$backend);

$frontendArray = require_once($frontend.'/config/main.php');
$backendArray=array(
    'name'=>'网站后台管理系统',
    'basePath'=>$frontend,
    'viewPath'=>$backend.'/views',
    'controllerPath'=>$backend.'/controllers',
    'runtimePath'=>$backend.'/runtime',
    'language'=>'zh_cn',
    'import'=>array(
        'application.models.*',
        'backend.models.*',
        'backend.components.*',
        'application.public_components.*',
        'backend.modules.srbac.controllers.*',
    ),
    // application components
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
        ),
        'authManager'=>array(
            // 类SDbAuthManager在srbac模块中的路径（别名），注意大小写
            'class'=>'backend.modules.srbac.components.SDbAuthManager',
            // 使用的数据库的组件名
            'connectionID'=>'db',
            // 下面是3个数据表
            // The itemTable name (default:authitem)
            'itemTable'=>'tb_rbac_items',
            // The assignmentTable name (default:authassignment)
            'assignmentTable'=>'tb_rbac_assignments',
            // The itemChildTable name (default:authitemchild)
            'itemChildTable'=>'tb_rbac_itemchildren',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/showMsg',
        ),

    ),

    'modules'=>array(
        'srbac' => array(
            'class'=>'backend.modules.srbac.SrbacModule',
            'userclass'=>'BackendUser', //default: User
            'userid'=>'id', //default: userid
            'username'=>'username', //default:username
            'delimeter'=>'@', //default:-
            'debug'=>false, //default :false
            'pageSize'=>20, // default : 15
            'superUser' =>'Authority', //default: Authorizer
            'css'=>'srbac.css',  //default: srbac.css
            'layout'=>
            'backend.views.layouts.main', //default: application.views.layouts.main,                                                //must be an existing alias
            'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
            //srbac.views.authitem.unauthorized, must be an existing alias
            'alwaysAllowed'=>array(   //default: array()
                'SiteLogin','SiteLogout','SiteAdmin',
                'SiteError', 'SiteContact'),
            'userActions'=>array('Show','View','List'), //default: array()
            'listBoxNumberOfLines' => 20,  //default : 10
            'imagesPath' => 'srbac.images', // default: srbac.images
            'imagesPack'=>'noia', //default: noia
            'iconText'=>true, // default : false
            'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
            //must be an existing alias
            'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
            //must be an existing alias
            'showHeader'=>true, // default: false
            'showFooter'=>true, // default: false
            'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
            // must be an existing alias
        ),
    ),
    //'params'=>CMap::mergeArray(require($frontend.'/config/params.php'),require($backend.'/config/params.php')),
);
return CMap::mergeArray($frontendArray,$backendArray);