<?php

class InsertSectionMenu extends MenuInterface
{
	public function InsertSectionMenu(){
		MenuInterface::MenuInterface();
	}
	public function Name(){return 'Tambah Location Section';}
	public function Path(){return __FILE__;}
	public function HaveDownloadButton(){return true;}
	public function ClassName(){return __CLASS__;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeFrame(){return SimpajatanFrame::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>