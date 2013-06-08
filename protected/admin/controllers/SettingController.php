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
        //重组数据
        $buildData = array();
        foreach($main as $k => $v){
            $buildData[] = array(
                'id'=>$k,
                'value'=>$v['value'],
                'name'=>$v['name'],
                'readOnly'=>$v['readOnly'],
            );
        }
        // Create filter model and set properties
        $filtersForm=new FiltersForm;
        if (isset($_GET['FiltersForm']))
            $filtersForm->filters=$_GET['FiltersForm'];

        $filteredData=$filtersForm->filter($buildData);
        $dataProvider = new CArrayDataProvider($filteredData,array(
             'pagination'=>array(
                  'pageSize'=>20,
              ),
        ));

        $this->render('main',array(
            'dataProvider'=>$dataProvider,
            'filtersForm'=>$filtersForm,
        ));
    }

    /**
     * 新增 配置
     */
    public function actionCreate(){
        $model=new SettingForm;
        $main = Yii::app()->params['main'];
        if(isset($_POST['SettingForm']))
        {
            $model->attributes=$_POST['SettingForm'];
            if($model->validate())
            {
                $addData = array(
                    $model->key=>array(
                        'name'=>$model->name,
                        'value'=>$model->value,
                        'readOnly'=>$model->readOnly,
                    ),
                );
                $data = array_merge($main, $addData);
                $this->_write($data);
            }
        }
        $this->render('create', array('model'=>$model));
    }

    public function actionUpdate(){
        if(isset($_POST['main'])){

        }
    }

    public function actionDelete(){

    }

    /**
     * 写配置
     * @param array $data 数据
     */
    private function _write(array $data){
        $content  = "<?php \r\n //网站公共配置\r\r return ";
        $content .= var_export($data,true);
        $content .= ';';
        if(file_put_contents(Yii::app()->basePath.'/public_config/main.php', $content)){
            $this->showMsg('修改配置成功！');
        }else{
            $this->showMsg('修改配置失败！','','操作失败');
        }
    }

}