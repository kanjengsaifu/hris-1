<?php
require_once FW_DIR . '/menu/CommonGrid.cnt.php';
require_once FW_DIR . '/constant/RowModifier.cst.php';
require_once 'constant/Session.cst.php';
require_once Framework::ThisFolder(__FILE__) . 'SurveyKondisiJalan.rmd.php';

class SurveyKondisiJalanContent extends CommonGridContent{

	public function SurveyKondisiJalanContent(){
		CommonGridContent::CommonGridContent();
	}
	public function MakeRowModifier(){return new SurveyKondisiJalanRowModifier();}
  	public function Path(){return __FILE__;}
	public function IsHaveScrollBar(){return false;}
	public function ScrollBarWidth(){return 0;}
	public function IsHaveSearch(){return true;}
	public function IsHavePaging(){return true;}
	public function IsHaveDownload(){return true;}

	public function LinksButton(){
		$Par = $this->Parent();		
		
		$m = new InsertSurveyKondisiJalanMenu();
		$m->AddTail(clone($Par));
		$Link = array();
		$Link[0][RowModifierConstant::BottomLink__Name] = 'Tambah';
		$Link[0][RowModifierConstant::BottomLink__RefLink] = $m->Ref();
		return $Link;
	} 
 	public function TitleString(){return NULL;}
	public function OrderBy(){return array();}
	public function GroupBy(){return array();}
	public function Tables(){
		return array(
			array('TABLE' => "`svy_kondisi_ruas_jalan`"),
			array('TABLE' => "`mst_ruas_jalan`")
		);
	}
	public function Fields(){
		return array(
			array(
				'FIELD' => "svy_kondisi_ruas_jalan.id__mst_ruas_jalan",
				'ALIAS' => "ID Ruas",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "mst_ruas_jalan.nama_ruas",
				'ALIAS' => "Nama Ruas",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "DT_IndonesiaDateTime(timestamp)",
				'ALIAS' => "Waktu Survey",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "svy_kondisi_ruas_jalan.post",
				'ALIAS' => "Kilometer Awal",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "svy_kondisi_ruas_jalan.offset",
				'ALIAS' => "Kilometer Akhir",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "(
					SELECT mst_lajur.nama
					FROM mst_lajur
					WHERE
						svy_kondisi_ruas_jalan.id__mst_lajur = mst_lajur.id
				)",
				'ALIAS' => "Lajur",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "(
					SELECT mst_kondisi_jalan.nama
					FROM mst_kondisi_jalan
					WHERE
						svy_kondisi_ruas_jalan.id__mst_kondisi_jalan = mst_kondisi_jalan.id
				)",
				'ALIAS' => "Kondisi",
				'IS_SEARCHED' => true
			),
			array(
				'FIELD' => "svy_kondisi_ruas_jalan.id__mst_ruas_jalan",
				'ALIAS' => "IdRuasJalan _HIDE_",
				'IS_HIDDEN' => true,
				'IS_SEARCHED' => false
			),
			array(
				'FIELD' => "svy_kondisi_ruas_jalan.timestamp",
				'ALIAS' => "Time _HIDE_",
				'IS_HIDDEN' => true,
				'IS_SEARCHED' => false
			),
			array(
				'FIELD' => "svy_kondisi_ruas_jalan.id__mst_lajur",
				'ALIAS' => "IdLajur _HIDE_",
				'IS_HIDDEN' => true,
				'IS_SEARCHED' => false
			),
			array(
				'FIELD' => "post",
				'ALIAS' => "Post _HIDE_",
				'IS_HIDDEN' => true,
				'IS_SEARCHED' => false
			),
			array(
				'FIELD' => "offset",
				'ALIAS' => "OffSet _HIDE_",
				'IS_HIDDEN' => true,
				'IS_SEARCHED' => false
			)				
		);
	}
	public function Conditions(){
		return array(
			array(
				'CONDITION' => "svy_kondisi_ruas_jalan.id__mst_ruas_jalan = mst_ruas_jalan.id",
				'OPERATOR' => "AND"
			),
			array(
				'CONDITION' => "mst_ruas_jalan.id__mst_propinsi IN (
									SELECT 
										id 
									FROM 
										mst_propinsi 
									WHERE id__mst_balaibesar = '".$_SESSION[FrameworkSessionConstant::IdBidang]."')",
				'OPERATOR' => NULL
			)
		);
  	}}

?>