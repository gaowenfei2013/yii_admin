<!doctype html>
<html class="off">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/admin/style.css"/>
    <title>管理中心</title>
</head>
<body scroll="no">
<div id="header">
    <div class="logo"><a href="index.php" title="管理中心"></a></div>
    <div class="fr">
        <div class="cut_line admin_info tr">
            <a href="<?php echo Yii::app()->baseUrl ?>/index.php" target="_blank">网站首页</a>
            <span class="cut">|</span><span class="mr10"><?php echo Yii::app()->user->name ?></span>
            <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">[注销]</a>
        </div>
    </div>
    <ul class="nav white" id="J_tmenu">
        <li class="top_menu"><a href="javascript:;" data-id="50" hidefocus="true" style="outline:none;">商品</a></li>
        <li class="top_menu"><a href="javascript:;" data-id="70" hidefocus="true" style="outline:none;">用户</a></li>
    </ul>
</div>
<div id="content">
    <div class="left_menu fl">
        <div id="J_lmenu" class="J_lmenu" data-uri="www.baidu.com">
            <h3 class="f14"><span class="J_switchs cu on" title="展开或关闭"></span>商品管理</h3>
            <ul>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="<?php echo Yii::app()->createUrl('backendUser/admin') ?>" data-id="52" hidefocus="true">用户管理</a></li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="&a=add&menuid=249" data-id="249" hidefocus="true">添加商品</a>
                </li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="" data-id="250" hidefocus="true">一键删除</a>
                </li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="" data-id="203" hidefocus="true">商品审核</a></li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="" data-id="56" hidefocus="true">商品分类</a>
                </li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="" data-id="199" hidefocus="true">商品来源</a></li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="" data-id="186" hidefocus="true">商品评论</a>
                </li>
                <li class="sub_menu">
                    <a href="javascript:;" data-uri="" data-id="288" hidefocus="true">图片本地化</a></li>
            </ul>
            <h3 class="f14"><span class="J_switchs cu on" title="展开或关闭"></span>商品采集</h3>
            <ul>
                <li class="sub_menu"><a href="javascript:;" data-uri="" data-id="192" hidefocus="true">阿里妈妈</a></li>
                <li class="sub_menu"><a href="javascript:;" data-uri="" data-id="290" hidefocus="true">淘宝网址</a></li>
                <li class="sub_menu"><a href="javascript:;" data-uri="" data-id="268" hidefocus="true">拍拍网址</a></li>
                <li class="sub_menu"><a href="javascript:;" data-uri="" data-id="287" hidefocus="true">天猫折扣精选</a></li>
                <li class="sub_menu"><a href="javascript:;" data-uri="" data-id="289" hidefocus="true">精品推荐</a></li>
                <li class="sub_menu"><a href="javascript:;" data-uri="" data-id="281" hidefocus="true">淘宝评论</a></li>
            </ul>
        </div>
        <h1>这里通过data-uri地址，获取ajax获取左侧菜单。在/js/admin.js 21、104行</h1>
        <a href="javascript:;" id="J_lmoc" style="outline-style: none; outline-color: invert; outline-width: medium;"
           hidefocus="true" class="open" title="展开或关闭"></a>
    </div>
    <div class="right_main">
        <div class="crumbs">
            <div class="options">
                <a href="javascript:;" title="刷新页面" id="J_refresh" class="refresh" hidefocus="true">刷新页面</a>
                <a href="javascript:;" title="全屏" id="J_full_screen" class="admin_full" hidefocus="true">全屏</a>
                <a href="javascript:;" title="更新缓存" id="J_flush_cache" class="flush_cache" data-uri="" hidefocus="true">更新缓存</a>
                <a href="javascript:;" title="后台地图" id="J_admin_map" class="admin_map" data-uri="test.html"
                   hidefocus="true">后台地图</a>
            </div>
            <div id="J_mtab" class="mtab"><a href="javascript:;" id="J_prev" class="mtab_pre fl" title="上一页">上一页</a><a
                    href="javascript:;" id="J_next" class="mtab_next fr" title="下一页">下一页</a>

                <div class="mtab_p">
                    <div class="mtab_b">
                        <ul id="J_mtab_h" class="mtab_h">
                            <li class="current" data-id="0"><span><a>后台首页</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="J_rframe" class="rframe_b">
            <iframe id="rframe_0" src="<?php echo Yii::app()->createUrl('site/main') ?>" frameborder="0"
                    scrolling="auto" style="height:100%;width:100%;"></iframe>
        </div>
    </div>
</div>
<script type="text/javascript">
    //语言项目
    var lang = new Object();
    lang.connecting_please_wait = "请稍后...";
    lang.confirm_title = "提示消息";
    lang.move = "移动";
    lang.dialog_title = "消息";
    lang.dialog_ok = "确定";
    lang.dialog_cancel = "取消";
    lang.please_input = "请输入";
    lang.please_select = "请选择";
    lang.not_select = "不选择";
    lang.all = "所有";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/assets/570c01b5/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/artDialog-5.0.3/jquery.artDialog.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/admin/admin.js"></script>

</body>
</html>