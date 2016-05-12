<?php

class InsertSurveyKondisiTepiJalanMenu extends MenuInterface{
	public $SearchIDRuas = NULL;
	public function InsertSurveyKondisiTepiJalanMenu(){
		MenuInterface::MenuInterface();
	}
	public function IdPencarianSearched(){return $this->SearchIDRuas;}	
	public function Name(){return 'Tambah Survey Kondisi Tepi Road';}
	public function Path(){return __FILE__;}
	public function HaveDownloadButton(){return true;}
	public function ClassName(){return __CLASS__;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeFrame(){return SimpajatanFrame::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>