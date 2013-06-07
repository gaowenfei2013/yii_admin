<?php
/**
 * 公共配置文件修改控制器
 * Class SettingController
 */

class SettingController extends Controller {

    public $controllerName = '公共配置';

    /**
     * 显示，修改配置
     */
    public function actionMain(){
        $main = Yii::app()->params['main'];
        if(isset($_POST['main'])){
            $content  = "<?php \r\n //网站公共配置\r\r return ";
            $content .= var_export($_POST['main'],true);
            $content .= ';';
            if(file_put_contents(Yii::app()->basePath.'/public_config/main.php', $content)){
                $this->showMsg('修改配置成功！');
            }else{
                $this->showMsg('修改配置失败！','','操作失败');
            }
        }
        $this->render('main',array('main'=>$main));
    }

    public function actionCreate(){
        $model=new SettingForm;

        if(isset($_POST['SettingForm']))
        {
            $model->attributes=$_POST['SettingForm'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('create', array('model'=>$model));
    }
}