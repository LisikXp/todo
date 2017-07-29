<?php
class Newtasks extends Controller{

	public function __construct() {
		//echo "Мы в контроллере INDEX";
		parent::__construct();
		$this->view->render('index/newtasks');




	}
	public function index() {
		//echo 'INSIDE INDEX INDEX';

	}

}
?>