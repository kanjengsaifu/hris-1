<?php
require_once FW_DIR .  '/menu/AbstractHandler.mnu.php';

class DeleteSurveyDeskripsiRuasJalanHandlerMenu extends AbstractHandlerMenu{
	public $IDRuas = NULL;
	public $WaktuSurvey = NULL;
	public $Post = NULL;
	public $Offset = NULL;
	public $Next = NULL;
	
	public function DeleteSurveyDeskripsiRuasJalanHandlerMenu(){
		AbstractHandlerMenu::AbstractHandlerMenu();
	}	
	public function Name(){return 'Proses Delete Survey Deskripsi Jalan' ;}
	public function Path(){return __FILE__;}
	public function HaveDownloadButton(){return true;}
	public function ClassName(){return __CLASS__;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>