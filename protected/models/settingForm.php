<?php
/**
 * 公共配置文件模型
 * Class LoginForm
 */
class SettingForm extends CFormModel
{
	public $key;
	public $name;
	public $value;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('key,name,value', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'key'=>'key标识',
			'name'=>'名称',
			'value'=>'值',
		);
	}

}
