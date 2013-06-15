<?php
/**
* 后台菜单 控制器
*/
class MenuController extends SBaseController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $controllerName = '后台菜单';


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->pageTitle = '查看_后台菜单_'.Yii::app()->name;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->pageTitle = '新增_后台菜单_'.Yii::app()->name;
		$model=new Menu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->pageTitle = '更新_后台菜单_'.Yii::app()->name;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
     * @throws CHttpException
	 */
	public function actionDelete($id)
	{
        $this->pageTitle = '删除_后台菜单_'.Yii::app()->name;
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$dataProvider=new CActiveDataProvider('Menu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->pageTitle = '管理_后台菜单_'.Yii::app()->name;
		$model=new Menu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
     * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Menu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     *获取 当前类的所有子类
     */
    public static function actionAjaxFillTree(){
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        $parentId = 0;
        if (isset($_GET['root'])) {
            $parentId = (int) $_GET['root'];
        }
        $menu = new Menu();
        $children = $menu->getChildren($parentId);
        //节点处增加链接
        $tree_data=array();
        foreach ($children as $child)
        {
            $options=array(
                'href'=>Yii::app()->createUrl('menu/update', array('id'=>$child['id'])),
                'id'=>$child['id'],
                'class'=>'treenode',
            );
            $child['text'] = CHtml::openTag('a', $options).$child['text'].CHtml::closeTag('a');
            $tree_data[]=$child;
        }
        //转换成json, 替换hasChildren
        echo str_replace( '"hasChildren":"0"', '"hasChildren":false', CTreeView::saveDataAsJson($tree_data));
        exit();
    }

    /**
     * ajax 显示后台菜单
     */
    public function actionShow(){
        $menu = new Menu();
        if(isset($_POST['id'])){
            $parentId = $_POST['id'];
            $menuData = $menu->getChildren($parentId);
        }else{ //如果没有传值，默认显示第一个
            $parentId = 0;
            $menuTop = $menu->getChildren($parentId);
            $menuData = $menu->getChildren($menuTop[0]['id']);
        }
        $menuHtml = '';
        foreach($menuData as $v){
            if($v['hasChildren']){
                $menuLi = ''; //li 子菜单
                $menuHtml .= '<h3 class="f14"><span class="J_switchs cu on" title="展开或关闭"></span>'.$v['name'].'</h3>';
                //继续查找子类
                $ChildrenMenu = $menu->getChildren($v['id']);
                if($ChildrenMenu){
                    foreach($ChildrenMenu as $v_c){
                        $pattern = '(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)';
                        $isUrl = preg_match($pattern,$v_c['link']);
                        if(!$isUrl){
                            $del = Helper::findModule('srbac')->delimeter;
                            $tmpAccess = explode('/',$v_c['link']);
                            $access = '';
                            foreach($tmpAccess as $v_a){
                                $access .= ucfirst($v_a);
                            }
                            if(count($tmpAccess)==3){
                                $access = $tmpAccess[0].$del.ucfirst($tmpAccess[1]).ucfirst($tmpAccess[2]);
                            }
                            $allowedAccess = Helper::findModule('srbac')->getAlwaysAllowed(); //总是允许的
                            if(!Yii::app()->user->checkAccess($access) && !in_array($access,$allowedAccess) ) break;
                        }


                        //如果url是绝对地址，则用绝对地址
                        $url = $isUrl ? $v_c['link'] : Yii::app()->createUrl($v_c['link']);
                        $menuLi .= '
                        <li class="sub_menu">
                           <a href="'.$url.'"  data-id="'.$v_c['id'].'" hidefocus="true">'.$v_c['name'].'</a>
                        </li>';
                    }
                    $menuHtml .= '<ul>'.$menuLi.'</ul>';
                }

            }else{
                $menuLi = ''; //li 子菜单
                //如果url是绝对地址，则用绝对地址
                $pattern = '(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)';
                $url = preg_match($pattern,$v['link']) ? $v['link'] : Yii::app()->createUrl($v['link']);
                $menuLi .= '
                        <li class="sub_menu">
                           <a href="'.$url.'"  data-id="'.$v['id'].'" hidefocus="true">'.$v['name'].'</a>
                        </li>';
                $menuHtml .= '<ul>'.$menuLi.'</ul>';
            }

        }
        echo $menuHtml;
    }

}
