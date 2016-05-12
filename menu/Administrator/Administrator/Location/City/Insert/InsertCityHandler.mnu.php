<?php
require_once FW_DIR .  '/menu/AbstractHandler.mnu.php';

class InsertCityHandlerMenu extends AbstractHandlerMenu
{
	public function InsertCityHandlerMenu(){
		AbstractHandlerMenu::AbstractHandlerMenu();
			
	}
	public function Name(){return 'Proses Insert Location City';}
	public function Path(){return __FILE__;}
	public function HaveDownloadButton(){return true;}
	public function ClassName(){return __CLASS__;}
	public function HasValidator(){return TRUE;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>