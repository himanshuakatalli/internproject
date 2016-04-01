<?php
class WidgetHomeMenu extends CWidget
{
	public $visible=true;
 	public function init()
	{
		if($this->visible)
		{

		}
	}

	public function run()
	{
		if($this->visible)
		{
			$this->renderContent();
		}
	}
	protected function renderContent()
	{
		$model	=	new LoginForm;
		$forgot	=	new ForgotpasswordForm;
		$users	=	new Users;
		$this->render('widgetHomeMenu',array('model'=>$model,'forgot'=>$forgot,'users'=>$users));
	}
}
