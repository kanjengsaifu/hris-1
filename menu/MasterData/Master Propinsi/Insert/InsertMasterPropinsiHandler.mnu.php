<?php
require_once FW_DIR .  '/menu/AbstractHandler.mnu.php';

class InsertMasterPropinsiHandlerMenu extends AbstractHandlerMenu{	
	public function InsertMasterPropinsiHandlerMenu(){
		AbstractHandlerMenu::AbstractHandlerMenu();
	}
	public function Name(){return 'Proses Tambah Master Propinsi';}
	public function Path(){return __FILE__;}
	public function HaveDownloadButton(){return true;}
	public function ClassName(){return __CLASS__;}
	public function HasValidator(){return TRUE;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>