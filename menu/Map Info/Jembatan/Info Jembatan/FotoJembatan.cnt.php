<?
require_once 'Zend/Json/Encoder.php';

class FotoJembatanContent extends ContentInterface
{
  public function FotoJembatanContent(){
	ContentInterface::ContentInterface();
  }
  public function Show(ValidatorInterface $v){
  	$p = $this->Parent();
  	$db = $this->Parent()->MakeDatabase();
	
	ContentInterface::Assign('foto', $p->FileName);
  	ContentInterface::Assign('YuiRelatifPath', YUI_RELATIF_PATH);
  	ContentInterface::Assign('width', $p->Rect['width'] - 15);
  	ContentInterface::Assign('height', $p->Rect['height']);
	ContentInterface::Show($v);
	ContentInterface::Display();
  }
  public function Path(){return __FILE__;}
}
?>