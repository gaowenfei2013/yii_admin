<?php

/**
+------------------------------------------------------------------------------
 * 图片文件上传类
 *
 * 验证文件的大小、类型、上传目录
+------------------------------------------------------------------------------
 * @category cms5.0
 * @author xuzhenjun <412530435@qq.com>
 * @version $Id$
+------------------------------------------------------------------------------
 */
class FileUpload{
    private $max_size; //允许上传的最大文件
    private $erron; //错误数字
    private $type; //文件类型
    private $path; //文件上传保存的目录
    private $typeArr; //允许上传文件的类型合集
    private $todayPath; //当天文件存放的文件夹
    private $fileName; //文件名
    private $tmp; //临时文件
    private $link; //文件链接
    private $error = '抱歉：上传文件失败，发生了以下错误：\n'; //提示错误信息

    /**
     * +----------------------------------------------------------
     * 构造方法，初始化
     * +----------------------------------------------------------
     * @param string $file 上传文件html控件的名称
     * @param int $size 上传文件html中MAX_FILE_SIZE的值
     * @param array $type 允许上传文件类型的集合，默认为空，允许上传jpg、png、gif图片
     * +----------------------------------------------------------
     */
    public function __construct($file,$size,$type=array('jpg','png','gif','bmp')){
        $this->erron = $_FILES[$file]['error'];
        $this->max_size = $size/1024;
        $this->tmp = $_FILES[$file]['tmp_name'];
        $this->fileName = $_FILES[$file]['name'];
        $info = pathinfo($this->fileName);
        $this->type = $info["extension"];
        $this->typeArr = $type;
        $this->path = Yii::app()->basePath.'/../uploads/';
        $this->todayPath = $this->path.date('Ymd').'/';
        $this->checkError();
        $this->checkType();
        $this->checkPath();
        $this->moveToUpload();

    }
    /**
     * +----------------------------------------------------------
     * 验证文件类型，失败则返回错误信息
     * +----------------------------------------------------------
     */
    private function checkType(){
        if(!in_array($this->type, $this->typeArr)){
            $this->error .= '不合法的上传类型！';
            Tool::alertBack($this->error);
        }
    }
    /**
     * +----------------------------------------------------------
     * 验证上传是否成功，失败则返回错误信息
     * +----------------------------------------------------------
     */
    private function checkError(){
        if(!empty($this->erron)){
            switch($this->erron){
                case 1 :
                    $this->error .= '上传值超过了约定最大值！';
                    break;
                case 2 :
                    $this->error .= '上传值超过了'.$this->max_size.'KB！';
                    break;
                case 3 :
                    $this->error .= '只有部分文件被上传！';
                    break;
                case 4 :
                    $this->error .= '没有任何文件被上传！';
                    break;
                default:
                    $this->erron .= '发生未知错误';
            }
            Tool::alertBack($this->error);
        }
    }
    /**
     * +----------------------------------------------------------
     * 验证上传目录是否可写，是否存在，不存在则创建，失败则返回错误信息
     * +----------------------------------------------------------
     */
    private function checkPath(){
        if(!is_dir($this->path) || !is_writable($this->path)){
            if(!mkdir($this->path)){ //如果目录不存在、或者不可写，则创建
                $this->error .= '创建上传目录失败';
                Tool::alertBack($this->error);
            }
        }
        if(!is_dir($this->todayPath) || !is_writable($this->todayPath)){
            if(!mkdir($this->todayPath)){ //如果当天目录不存在、或者不可写，则创建
                $this->error .= '创建上传子目录失败';
                Tool::alertBack($this->error);
            }
        }
    }
    /**
     * +----------------------------------------------------------
     * 按照时间重新命名文件
     * +----------------------------------------------------------
     */
    private function setName(){
        $nameArr = explode('.', $this->fileName);
        $postfix = $nameArr[count($nameArr)-1];
        return $this->link = $this->todayPath.date('YmdHis').mt_rand(100,1000).'.'.$postfix;
    }
    /**
     * +----------------------------------------------------------
     * 移动临时文件到指定文件夹
     * +----------------------------------------------------------
     */
    private function moveToUpload(){
        if(is_uploaded_file($this->tmp)){
            if(!move_uploaded_file($this->tmp,$this->setName())){
                $this->error .= '移动临时文件失败！';
            }
        }else{
            $this->error .= '临时文件不存在';
        }
    }
    /**
     * +----------------------------------------------------------
     * 返回生成的文件链接,相对路径
     * +----------------------------------------------------------
     */
    public function getLink(){
        $rootLen = strlen(Yii::app()->basePath.'/../');
        return substr($this->link, $rootLen);
    }
}

