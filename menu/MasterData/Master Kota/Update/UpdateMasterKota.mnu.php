<?php

class UpdateMasterKotaMenu extends MenuInterface{
	public $id = NULL;

	public function UpdateMasterKotaMenu(){
		MenuInterface::MenuInterface();
	}
	public function Name(){return 'Tambah Master Propinsi';}
	public function OnSetKey($key = array()){
		if($key['id'] != NULL)$this->id = $key['id'];
		if($this->Child() != NULL)$this->Child()->OnSetKey($key);
	}
	public function Path(){return __FILE__;}
	public function HaveDownloadButton(){return true;}
	public function ClassName(){return __CLASS__;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeFrame(){return SimpajatanFrame::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>