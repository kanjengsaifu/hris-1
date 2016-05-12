<?php
class UpdateRoadMenu extends MenuInterface
{
  public $IdRoad = NULL;
    
  public function UpdateRoadMenu(){
  	MenuInterface::MenuInterface();
  }
  public function OnSetKey($key = array()){
		if(	$key['id'] != NULL){
			$this->IdRoad = $key['id'];
		}
		if($this->Child() != NULL)$this->Child()->OnSetKey($key);
	}	
  public function Name(){return 'Ubah Location Road';}
  public function Path(){return __FILE__;}
  public function HaveDownloadButton(){return true;}
  public function ClassName(){return __CLASS__;}
	public function MakeApplication(){return SimpajatanApplication::Instance();}
	public function MakeFrame(){return SimpajatanFrame::Instance();}
	public function MakeDatabase(){return SimpajatanMySqlDatabase::Instance();}
}
?>