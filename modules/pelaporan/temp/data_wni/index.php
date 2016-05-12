<?php

# Including Main Configuration
# including file for Main Configurations
require_once('../../../includes/config.conf.php');

# Create a session to store global config path
session_save_path($DIR_SESS);
session_set_cookie_params($expiry);
session_start();

if ((!isset($_SESSION['UID'])) || (empty($_SESSION['UID']))){
	require_once('../../../includes/header.redirect.inc');
}else{

//yang harus dibuat session
$THEME = base64_encode("defaults");
$LANG = base64_encode("indonesia");
$_SESSION['THEME']	= $THEME;
$_SESSION['LANG']   = $LANG;

#FOR IMAGES CLASS PAGER
$HREF_IMAGES = $HREF_THEME.'/'.(base64_decode($_SESSION['THEME']).'/images');

# including Header file for Content Expiring
require_once($DIR_INC.'/header.exp.inc');
# including Header file for Database Configuration
require_once($DIR_INC.'/db.conf.php');
require_once($DIR_ADODB.'/adodb.inc.php');
require_once($DIR_INC.'/class.pager.php');
 require_once($DIR_HOME.'/laporan/inc.wni.php'); 

$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
 //$db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

# including the proper language file
require_once($DIR_LANG.'/'.base64_decode($_SESSION['LANG']).'.lang.php');
# including the proper theme template file and also generate output
//require_once($DIR_INC.'/copyright.tpl');

//=================================== BEGIN PARSING TEMPLATE BLOCK====================================

# including Header file for Smarty Parser Configurator
require_once($DIR_INC."/libs.inc.php");
# setting Smarty Class Debugger
//$smarty->debugging = true;

# Start Parsing the Template

#HREF
$smarty->assign ("HREF_HOME_PATH", $HREF_HOME);
$smarty->assign ("HREF_IMG_PATH", $HREF_THEME.'/'.(base64_decode($_SESSION['THEME']).'/images'));
$smarty->assign ("HREF_CSS_PATH", $HREF_THEME.'/'.(base64_decode($_SESSION['THEME']).'/css'));
$smarty->assign ("HREF_JS_PATH", $HREF_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts'));


#DIR
$smarty->assign ("DIR_HOME_PATH", $DIR_HOME);
$smarty->assign ("DIR_IMG_PATH", $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/images'));
$smarty->assign ("DIR_CSS_PATH", $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/css'));
$smarty->assign ("DIR_JS_PATH", $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts'));
$smarty->assign ("SELF", $_SERVER['PHP_SELF']);

//------------------------------------LOCAL CONFIG--------------------------------------//
#SETTING FOR TEMPLATE 
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/pelaporan/data_wni';
 
#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/pelaporan');
$FILE_JS  = $JS_MODUL.'/data_wni';

if($_POST['mod_id'])
{
		$mod_id = $_POST['mod_id'];
}else
{
		$mod_id = $_GET['mod_id'];
}

$user_id = base64_decode($_SESSION['UID']);

$smarty->assign ("MOD_ID", $mod_id);

$smarty->assign ("ID_PROPINSI",$MAIN_PROP);

#Initiate TABLE
 
//-----------------------------------END OF LOCAL CONFIG-------------------------------//

if ($_POST['limit']) { $LIMIT = $_POST['limit']; }
else if ($_GET['limit']) {$LIMIT = $_GET['limit']; }
else $LIMIT=$nLimit;

if ($_POST['SORT']) { $SORT = $_POST['SORT']; }
else if ($_GET['SORT']) { $SORT = $_GET['SORT']; }
else $SORT="ASC";

if ($_GET['ORDER']) { $ORDER = $_GET['ORDER']; }
else if ($_POST['ORDER']) { $ORDER = $_POST['ORDER']; }
else $ORDER="a.id_fjl_01_detail";

if ($_GET['page']) $page = $_GET['page'];
else if ($_POST['page']) $page = $_POST['page'];
else $page="1";

if ($_GET['kode_perwakilan']) $kode_perwakilan = $_GET['kode_perwakilan'];
else if ($_POST['kode_perwakilan']) $kode_perwakilan = $_POST['kode_perwakilan'];
else $kode_perwakilan="";

if ($_GET['nama_propinsi']) $nama_propinsi = $_GET['nama_propinsi'];
else if ($_POST['nama_propinsi']) $nama_propinsi = $_POST['nama_propinsi'];
else $nama_propinsi="";

if ($_GET['no_propinsi']) $no_propinsi = $_GET['no_propinsi'];
else if ($_POST['no_propinsi']) $no_propinsi = $_POST['no_propinsi'];
else $no_propinsi="";

if ($_GET['nama_kabupaten']) $nama_kabupaten = $_GET['nama_kabupaten'];
else if ($_POST['nama_kabupaten']) $nama_kabupaten = $_POST['nama_kabupaten'];
else $nama_kabupaten="";

if ($_GET['id_kab']) $id_kab = $_GET['id_kab'];
else if ($_POST['id_kab']) $id_kab = $_POST['id_kab'];
else $id_kab="";

if ($_GET['kode_kat_kasus']) $kode_kat_kasus = $_GET['kode_kat_kasus'];
else if ($_POST['kode_kat_kasus']) $kode_kat_kasus = $_POST['kode_kat_kasus'];
else $kode_kat_kasus="";
 

if ($_GET['search']) $search = $_GET['search'];
else if ($_POST['search']) $search = $_POST['search'];
else $search="";
 

if ($_GET['kode_wni']) $kode_wni = $_GET['kode_wni'];
else if ($_POST['kode_wni']) $kode_wni = $_POST['kode_wni'];
else $kode_wni="";
 


 if ($_GET['kode_klasifikasi_wni']) $kode_klasifikasi_wni = $_GET['kode_klasifikasi_wni'];
else if ($_POST['kode_klasifikasi_wni']) $kode_klasifikasi_wni = $_POST['kode_klasifikasi_wni'];
else $kode_klasifikasi_wni="";
 

if ($_GET['kode_sektor']) $kode_sektor = $_GET['kode_sektor'];
else if ($_POST['kode_sektor']) $kode_sektor = $_POST['kode_sektor'];
else $kode_sektor="";
 

 if ($_GET['kode_jenis']) $kode_jenis = $_GET['kode_jenis'];
else if ($_POST['kode_jenis']) $kode_jenis = $_POST['kode_jenis'];
else $kode_jenis="";
 


$Search_Year = $_GET[tahun];
$smarty->assign ("SEARCH", $search);

$str_completer = "mod_id=".$mod_id."&limit=".$LIMIT."&SORT=".$SORT."&no_propinsi=".$no_propinsi."&no_kabupaten=".$no_kabupaten."&search=1&Search_Year=".$Search_Year."&jns_jln=".$jns_jln;
$str_completer_ = "limit=".$LIMIT."&SORT=".$SORT."&page=".$page."&no_propinsi=".$no_propinsi."&no_kabupaten=".$no_kabupaten."&search=1&Search_Year=".$Search_Year."&jns_jln=".$jns_jln;

$SES_TAHUN		    = $_SESSION['TAHUN'];
$SES_INSTANSI		= $_SESSION['KODE_INSTANSI'];
$SES_JENIS_USER		= $_SESSION['JENIS_USER'];
//--------------------------------------
//SHOW DATA INSTANSI
//---------------------------------------

$smarty->assign ("SES_TAHUN", $SES_TAHUN);
$smarty->assign ("SES_INSTANSI", $SES_INSTANSI);
$smarty->assign ("SES_JENIS_USER", $SES_JENIS_USER);


$smarty->assign ("BULAN", $bulan);
$smarty->assign ("TAHUN", $tahun);
$smarty->assign ("KODE_KAT_KASUS", $kode_kat_kasus);
 //--------------------------------------
//SHOW DATA INSTANSI
//---------------------------------------

$sql_instansi = "SELECT *  FROM tbl_mast_perwakilan  order by nm_perwakilan ";
$result_instansi = $db->Execute($sql_instansi);
$initSet = array();
$data_instansi = array();
$z=0;
while ($arr=$result_instansi->FetchRow()) {
	array_push($data_instansi, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_INSTANSI", $data_instansi);
 
//SHOW DATA PROVINSI
//-------------------------------------
$sql_propinsi = "SELECT id_propinsi,no_propinsi,nama_propinsi FROM tbl_mast_wil_propinsi order by nama_propinsi ";
$result_propinsi = $db->Execute($sql_propinsi);
$initSet = array();
$data_propinsi = array();
$z=0;
while ($arr=$result_propinsi->FetchRow()) {
	array_push($data_propinsi, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_PROPINSI", $data_propinsi);

if ($_GET[get_prop] == 1)
{
	$no_propinsi = $_GET[no_prop];
			if($no_propinsi!=''){	
					$sql_kabupaten = "SELECT id_kabupaten,no_kabupaten,nama_kabupaten FROM tbl_mast_wil_kabupaten WHERE no_propinsi='".$no_propinsi."' ORDER BY nama_kabupaten ASC";
					$recordSet_kabupaten = $db->Execute($sql_kabupaten);
					//print $sql_kabupaten;
					$input_kab="<select name=id_kab  >";
					$input_kab.="<option value=>[Pilih Kabupaten] ";
					$input_kab.="</option> ";
					while(!$recordSet_kabupaten->EOF): 
						$input_kab.="<option value=";
						$input_kab.= $recordSet_kabupaten->fields['id_kabupaten'].">".$recordSet_kabupaten->fields['nama_kabupaten'];   
						$input_kab.="</option>";
					$recordSet_kabupaten->MoveNext();
					endwhile; 
					$input_kab.="</select> ";
					//
					$delimeter   = "-";
					$option_choice = $input_kab."^/&".$delimeter;	
					echo $option_choice;
			}
}


  	 if ($_GET[get_jenis] == 1)
{
			$kode_sumber = $_GET[no_prop];

			if($kode_sumber=='1'){ // NON TKI
				 
				 
				 
					$input_kab="<select name=kode_sektor disabled>";
					$input_kab.="<option value=>[Pilih Sektor Pekerjaan] ";
					$input_kab.="</option> ";					 
					$input_kab.="</select> ";
					 

					$sql_kecamatan = "SELECT * from tbl_mast_jenis_wni ORDER BY nama_jenis_wni ASC";
					$recordSet_kecamatan = $db->Execute($sql_kecamatan); 
					//print $sql_kecamatan;
					$input_kec="<select name=kode_jenis >";
					$input_kec.="<option value=>[Pilih Jenis WNI Non TKI] ";
					$input_kec.="</option> ";
					while(!$recordSet_kecamatan->EOF): 
						$input_kec.="<option value=";
						$input_kec.= $recordSet_kecamatan->fields['kode_jenis_wni'].">".$recordSet_kecamatan->fields['nama_jenis_wni'];   
						$input_kec.="</option>";
					$recordSet_kecamatan->MoveNext();
					endwhile; 
					$input_kec.="</select> ";



					$delimeter   = "-";
					$option_choice = $input_kab."^/&".$input_kec."^/&".$delimeter;	
					echo $option_choice;


			}


			if($kode_sumber=='4'){ //INFORMAL
				 
				 
				 
					$input_kab="<select name=kode_sektor disabled>";
					$input_kab.="<option value=>[Pilih Sektor Pekerjaan] ";
					$input_kab.="</option> ";					 
					$input_kab.="</select> ";
					 

					 $sql_kecamatan = "SELECT * from tbl_mast_jenis_informal ORDER BY nama_informal  ASC";
					$recordSet_kecamatan = $db->Execute($sql_kecamatan); 
					//print $sql_kecamatan;
					$input_kec="<select name=kode_jenis >";
					$input_kec.="<option value=>[Pilih Jenis TKI Informal] ";
					$input_kec.="</option> ";
					while(!$recordSet_kecamatan->EOF): 
						$input_kec.="<option value=";
						$input_kec.= $recordSet_kecamatan->fields['kode_jenis_informal'].">".$recordSet_kecamatan->fields['nama_informal'];   
						$input_kec.="</option>";
					$recordSet_kecamatan->MoveNext();
					endwhile; 
					$input_kec.="</select> ";



					$delimeter   = "-";
					$option_choice = $input_kab."^/&".$input_kec."^/&".$delimeter;	
					echo $option_choice;


			}


			if($kode_sumber=='6'){ //ABK
				 
				 
				 
					$input_kab="<select name=kode_sektor disabled>";
					$input_kab.="<option value=>[Pilih Sektor Pekerjaan] ";
					$input_kab.="</option> ";					 
					$input_kab.="</select> ";
					 

					 $sql_kecamatan = "SELECT * from tbl_mast_jenis_abk ORDER BY nama_abk  ASC";
					$recordSet_kecamatan = $db->Execute($sql_kecamatan); 
					//print $sql_kecamatan;
					$input_kec="<select name=kode_jenis >";
					$input_kec.="<option value=>[Pilih Jenis TKI ABK] ";
					$input_kec.="</option> ";
					while(!$recordSet_kecamatan->EOF): 
						$input_kec.="<option value=";
						$input_kec.= $recordSet_kecamatan->fields['kode_jenis_abk'].">".$recordSet_kecamatan->fields['nama_abk'];   
						$input_kec.="</option>";
					$recordSet_kecamatan->MoveNext();
					endwhile; 
					$input_kec.="</select> ";



					$delimeter   = "-";
					$option_choice = $input_kab."^/&".$input_kec."^/&".$delimeter;	
					echo $option_choice;


			}



			if($kode_sumber=='3'){ //TKI FORMAL
				 
			 

					$sql_kecamatan2 = "SELECT * from tbl_mast_sektor ORDER BY nama_sektor ASC";
					$recordSet_kecamatan2 = $db->Execute($sql_kecamatan2); 
					//print $sql_kecamatan;
					$input_kab="<select name=kode_sektor onchange=\"cari_jenis2(this.value);\"  >";
					$input_kab.="<option value=>[Pilih Sektor Pekerjaan] ";
					$input_kab.="</option> ";
					while(!$recordSet_kecamatan2->EOF): 
						$input_kab.="<option value=";
						$input_kab.= $recordSet_kecamatan2->fields['kode_sektor'].">".$recordSet_kecamatan2->fields['nama_sektor'];   
						$input_kab.="</option>";
					$recordSet_kecamatan2->MoveNext();
					endwhile; 
					$input_kab.="</select> ";




					$sql_kecamatan = "SELECT * from tbl_mast_jenis_formal ORDER BY nama_formal  ASC";
					$recordSet_kecamatan = $db->Execute($sql_kecamatan); 
					//print $sql_kecamatan;
					$input_kec="<select name=kode_jenis>";
					$input_kec.="<option value=>[Pilih Jenis TKI Formal] ";
					$input_kec.="</option> ";
					while(!$recordSet_kecamatan->EOF): 
						$input_kec.="<option value=";
						$input_kec.= $recordSet_kecamatan->fields['kode_jenis_formal'].">".$recordSet_kecamatan->fields['nama_formal'];   
						$input_kec.="</option>";
					$recordSet_kecamatan->MoveNext();
					endwhile; 
					$input_kec.="</select> ";



					$delimeter   = "-";
					$option_choice = $input_kab."^/&".$input_kec."^/&".$delimeter;	
					echo $option_choice;


			}
  
}

if ($_GET[get_jenis_sektor] == 1)
{
			$no_propinsi = $_GET[no_prop];

			if($no_propinsi!=''){	
					$sql_kabupaten = "SELECT * from tbl_mast_jenis_formal  WHERE kode_sektor='".$no_propinsi."' ORDER BY nama_formal ASC";
					$recordSet_kabupaten = $db->Execute($sql_kabupaten);
					//print $sql_kabupaten;
					$input_kab="<select name=kode_jenis >";
					$input_kab.="<option value=>[Pilih Jenis TKI Formal] ";
					$input_kab.="</option> ";
					while(!$recordSet_kabupaten->EOF): 
						$input_kab.="<option value=";
						$input_kab.= $recordSet_kabupaten->fields['kode_jenis_formal'].">".$recordSet_kabupaten->fields['nama_formal'];   
						$input_kab.="</option>";
					$recordSet_kabupaten->MoveNext();
					endwhile; 
					$input_kab.="</select> ";
					//
					$delimeter   = "-";
					$option_choice = $input_kab."^/&".$delimeter;	
					echo $option_choice;
			}
}
		

	if (Privi($mod_id, $user_id, 'search') != 'no')
	{
 
    if ($kode_wni == '') {

				   if ($no_propinsi != '') {
				$sql_prop="select upper(nama_propinsi) as nama_propinsi from tbl_mast_wil_propinsi 
				inner join tbl_mast_wil_kabupaten where tbl_mast_wil_kabupaten.no_propinsi=tbl_mast_wil_propinsi.no_propinsi
				and tbl_mast_wil_propinsi.no_propinsi='$no_propinsi' ";
					$rs_prop=$db->Execute($sql_prop);			  
					 $nama_propinsi = $rs_prop->fields['nama_propinsi'];
				 }
				$smarty->assign ("NM_PROPINSI", $nama_propinsi);
				   
				   
				   if ($id_kab != '') {  
							$sql_kab="select upper(nama_kabupaten) as nama_kabupaten from tbl_mast_wil_kabupaten where id_kabupaten='$id_kab' ";
						$rs_kab=$db->Execute($sql_kab);			  
						 $nama_kabupaten = $rs_kab->fields['nama_kabupaten']; 	
				 }
				   $smarty->assign ("NM_KABUPATEN", $nama_kabupaten); 
				 
				  
				  if ($kode_perwakilan != '') {
				$sql__="select * , upper(nm_perwakilan) as nm_perwakilan from tbl_mast_perwakilan where kode_perwakilan='$kode_perwakilan' ";
				$rs__=$db->Execute($sql__);			  
				 $nm_perwakilan = $rs__->fields['nm_perwakilan']; 
				  }
				   $smarty->assign ("NM_PERWAKILAN", $nm_perwakilan);
				
					  if ($kode_klasifikasi_wni!='') { 

					  if ($kode_klasifikasi_wni==1) {
						$nama_kw="WNI NON TKI";	
							if ($kode_jenis !='') {
							 $sql_jenis="select upper( nama_jenis_wni) as nama_jenis_wni  from tbl_mast_jenis_wni where  kode_jenis_wni='$kode_jenis' ";
							 $rs_jenis=$db->Execute($sql_jenis);			  
							 $nama_jenis = $rs_jenis->fields['nama_jenis_wni']; 

							}
					  }
					  if ($kode_klasifikasi_wni==3) {
						$nama_kw="  TKI FORMAL ";
						if ($kode_jenis !='') {
							 $sql_jenis="select  upper (nama_formal) as nama_formal  from tbl_mast_jenis_formal  where  kode_jenis_formal='$kode_jenis' ";
							  $rs_jenis=$db->Execute($sql_jenis);			  
							 $nama_jenis = $rs_jenis->fields['nama_formal']; 
							}
					  }

					   if ($kode_klasifikasi_wni==4) {
						$nama_kw="  TKI INFORMAL ";	
						if ($kode_jenis !='') {
							 $sql_jenis="select  upper(nama_informal) as nama_informal  from tbl_mast_jenis_informal  where  kode_jenis_informal='$kode_jenis' ";
							   $rs_jenis=$db->Execute($sql_jenis);			  
							 $nama_jenis = $rs_jenis->fields['nama_informal']; 
							}
					  }

					   if ($kode_klasifikasi_wni==6) {
						$nama_kw="  TKI ABK ";
						if ($kode_jenis !='') {
							 $sql_jenis="select  upper(nama_abk) as nama_abk  from tbl_mast_jenis_abk  where  kode_jenis_abk='$kode_jenis' ";
							  $rs_jenis=$db->Execute($sql_jenis);			  
							 $nama_jenis = $rs_jenis->fields['nama_abk']; 
							}
					  }
 
					 $smarty->assign ("NAMA_KLASIFIKASI", $nama_kw); 	 
					 $smarty->assign ("NAMA_JENIS", $nama_jenis); 
				 }


				$sql_detail = "SELECT tbl_wni.nama ,

				tbl_wni.kode_wni , nm_perwakilan , tbl_wni.alamat, tbl_wni.tlp, tbl_wni.alamat_ln, tbl_wni.tlp_ln,lama_tinggal, 
				(CASE  WHEN kode_sumber=1 then (select nama_jenis_wni from tbl_mast_jenis_wni where tbl_mast_jenis_wni.kode_jenis_wni=tbl_wni.kode_jenis)   
				WHEN kode_sumber=3  then (select nama_formal  from tbl_mast_jenis_formal  where tbl_mast_jenis_formal.kode_jenis_formal=tbl_wni.kode_jenis)
				WHEN kode_sumber=4  then (select nama_informal  from tbl_mast_jenis_informal  where tbl_mast_jenis_informal.kode_jenis_informal=tbl_wni.kode_jenis)
				WHEN kode_sumber=6  then (select nama_abk  from tbl_mast_jenis_abk  where tbl_mast_jenis_abk.kode_jenis_abk=tbl_wni.kode_jenis)  else '' END) as pekerjaan
				 from tbl_wni
				 left join tbl_mast_wil_kabupaten on tbl_mast_wil_kabupaten.id_kabupaten=tbl_wni.id_kabupaten
				 left join tbl_mast_wil_propinsi on tbl_mast_wil_propinsi.no_propinsi=tbl_mast_wil_kabupaten.no_propinsi
				 inner join tbl_mast_perwakilan on tbl_mast_perwakilan.kode_perwakilan = tbl_wni.kode_perwakilan
				 where 1=1 ";
 
				 if ($id_kab != '') {
					 $sql_detail .= " and tbl_wni.id_kabupaten='$id_kab' "; 
				 }
				  if ($no_propinsi != '') {
					 $sql_detail .= "and  tbl_mast_wil_kabupaten.no_propinsi='$no_propinsi'  "; 
				 }
				  if ($kode_perwakilan != '') {
					 $sql_detail .= "and  tbl_wni.kode_perwakilan='$kode_perwakilan' "; 
				 }
				  if ($kode_klasifikasi_wni != '') {
					 $sql_detail .= "and  kode_sumber='$kode_klasifikasi_wni' "; 
				 }
				 if ($kode_jenis != '') {
					 $sql_detail.= " and tbl_wni.kode_jenis='$kode_jenis' ";
				 }



				

				 $sql_detail .= " order by nama asc ";
				$numresults2=$db->Execute($sql_detail);
				$count2 = $numresults2->RecordCount();
 				$recordSet2 = $db->Execute($sql_detail);
				$end2 = $recordSet2->RecordCount();
				
				
				$initSet2 = array();
				$data_tb2 = array();
				$row_class2 = array();
				$z=0;

				while ($arr2=$recordSet2->FetchRow()) {
					array_push($data_tb2, $arr2);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
					array_push($row_class2, $ROW_CLASSNAME2);
					array_push($initSet2, $z);
					$z++;
					
					$content_data .= print_content($arr2[nama],$arr2[kode_wni],$arr2[alamat],$arr2[tlp],$arr2[alamat_ln],
									$arr2[tlp_ln],$arr2[lama_tinggal],$arr2[pekerjaan]);
					
				}
			   $smarty->assign ("DATA_TB2", $data_tb2);


				$sql_total="SELECT COUNT(*) as total_orang from tbl_wni 
				left join tbl_mast_wil_kabupaten on tbl_mast_wil_kabupaten.id_kabupaten=tbl_wni.id_kabupaten
				left join tbl_mast_wil_propinsi on tbl_mast_wil_propinsi.no_propinsi=tbl_mast_wil_kabupaten.no_propinsi
				where 1=1 ";
				 
				  if ($id_kab != '') {
				 $sql_total .= " and tbl_wni.id_kabupaten='$id_kab' "; 
				 }
				  if ($no_propinsi != '') {
				 $sql_total .= "and  tbl_mast_wil_kabupaten.no_propinsi='$no_propinsi'  "; 
				 }
					 if ($kode_perwakilan != '') {
				 $sql_total .= "and  kode_perwakilan='$kode_perwakilan' "; 
 
					}

			if ($kode_klasifikasi_wni != '') {
				 $sql_total .= "and  kode_sumber='$kode_klasifikasi_wni' "; 
				 }

				 if ($kode_jenis != '') {
					 $sql_total.= " and tbl_wni.kode_jenis='$kode_jenis' ";
				 }
 
 
				$numresults4=$db->Execute($sql_total);
				$count4 = $numresults4->RecordCount();
 				$recordSet4 = $db->Execute($sql_total);
				$end4 = $recordSet4->RecordCount();
				$initSet4 = array();
				$data_tb4 = array();
				$row_class4 = array();
				$z=0;
				while ($arr4=$recordSet4->FetchRow()) {
					array_push($data_tb4, $arr4);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
			   array_push($row_class4, $ROW_CLASSNAME2);
				 array_push($initSet4, $z);
					$z++;
					
					$label="TOTAL WNI/TKI : ".$arr4[total_orang];
					$content_data .= print_content("","","","","","","",$label);
				}

			  $smarty->assign ("DATA_TB4", $data_tb4);

				$file= $DIR_HOME."/files/laporan_data_wni_tki_".$nama_propinsi."_".$nama_kabupaten."_".$nm_perwakilan.".xls";

				$fp=@fopen($file,"w");
				if(!is_resource($fp))
				return false;
				//$content = str_replace("@@@@BREAKPAGE@@@@@",$content_break,$content);
				stream_set_write_buffer($fp, 0);
				
				$content = print_header($nama_propinsi,$nama_kabupaten,$nm_perwakilan);
				$content .= $content_data;
				
				$content .= print_footer();
				
				fwrite($fp,$content);
				fclose($fp);
				$file_2= $HREF_HOME."/files/laporan_data_wni_tki_".$nama_propinsi."_".$nama_kabupaten."_".$nm_perwakilan.".xls";		
 

	} else {

			$sql_wni="select tbl_wni.kode_wni ,
			tbl_wni.alamat ,
			 nama_agama, 
			tbl_wni.tgl_lahir ,
			tbl_wni.kode_sumber ,
			nama_kabupaten ,
			tbl_wni.jk ,
			tbl_wni.no_paspor ,
			tbl_wni.tlp ,
			tbl_wni.alamat_ln ,
			tbl_wni.tlp_ln ,
			tbl_wni.tempat_lahir ,
			tbl_wni.lama_tinggal  ,
			nm_perwakilan, nama_jenis_wni as nama_jenis  , 
			tbl_wni.nama as nama,tbl_wni.alamat as alamat , (CASE  WHEN kode_sumber=1 then (select nama_jenis_wni from tbl_mast_jenis_wni where tbl_mast_jenis_wni.kode_jenis_wni=tbl_wni.kode_jenis)   
			WHEN kode_sumber=3  then (select nama_formal  from tbl_mast_jenis_formal  where tbl_mast_jenis_formal.kode_jenis_formal=tbl_wni.kode_jenis)
			WHEN kode_sumber=4  then (select nama_informal  from tbl_mast_jenis_informal  where tbl_mast_jenis_informal.kode_jenis_informal=tbl_wni.kode_jenis)
			WHEN kode_sumber=6  then (select nama_abk  from tbl_mast_jenis_abk  where tbl_mast_jenis_abk.kode_jenis_abk=tbl_wni.kode_jenis)  else '' END) as pekerjaan    from 
		    tbl_wni
			 inner join  tbl_mast_perwakilan on tbl_mast_perwakilan.kode_perwakilan = tbl_wni.kode_perwakilan
			 left join tbl_mast_agama on tbl_mast_agama.kode_agama  = tbl_wni.kode_agama
			 left join tbl_mast_jenis_wni on tbl_mast_jenis_wni.kode_jenis_wni = tbl_wni.kode_jenis
			 left  join tbl_mast_wil_kabupaten on tbl_mast_wil_kabupaten.id_kabupaten = tbl_wni.id_kabupaten where tbl_wni.kode_wni='$kode_wni' ";
			 $rs_wni=$db->Execute($sql_wni);
			 $kode_wni = $rs_wni->fields['kode_wni'];
			$nama = $rs_wni->fields['nama']; 	
			$pekerjaan = $rs_wni->fields['pekerjaan']; 	
			$alamat = $rs_wni->fields['alamat']; 	
			$nama_agama = $rs_wni->fields['nama_agama']; 	
			$tgl_lahir = $rs_wni->fields['tgl_lahir']; 	
			$kode_sumber = $rs_wni->fields['kode_sumber']; 	
			$nama_kabupaten = $rs_wni->fields['nama_kabupaten']; 	

			$jk = $rs_wni->fields['jk']; 
			 $no_paspor = $rs_wni->fields['no_paspor'];
			$tlp = $rs_wni->fields['tlp']; 

			 $alamat_ln = $rs_wni->fields['alamat_ln']; 	
			 $tlp_ln = $rs_wni->fields['tlp_ln']; 		
			 $tempat_lahir = $rs_wni->fields['tempat_lahir']; 

			 $lama_tinggal = $rs_wni->fields['lama_tinggal'];
			 $nm_perwakilan = $rs_wni->fields['nm_perwakilan'];					
$smarty->assign ("NM_PERWAKILAN", $nm_perwakilan);
$smarty->assign ("KODE_WNI", $kode_wni);
$smarty->assign ("NAMA", $nama);
$smarty->assign ("PEKERJAAN", $pekerjaan);
$smarty->assign ("ALAMAT", $alamat);
$smarty->assign ("NAMA_AGAMA", $nama_agama);
$smarty->assign ("TGL_LAHIR", $tgl_lahir);
$smarty->assign ("KODE_SUMBER", $kode_sumber);
$smarty->assign ("NAMA_KABUPATEN", $nama_kabupaten);
$smarty->assign ("JK", $jk);
$smarty->assign ("NO_PASPOR", $no_paspor);
$smarty->assign ("TLP", $tlp);
$smarty->assign ("ALAMAT_LN", $alamat_ln);
$smarty->assign ("TLP_LN", $tlp_ln);
$smarty->assign ("TEMPAT_LAHIR", $tempat_lahir);
$smarty->assign ("LAMA_TINGGAL", $lama_tinggal);


						if ($kode_sumber == 3 or $kode_sumber == 4) {
								$sql_pekerja="select nama_majikan, nama_pjtki, nama_pjtka, alamat_majikan, tlp_majikan, tgl_awal, tgl_akhir  from tbl_kerja_tki
							inner join tbl_wni on tbl_kerja_tki.kode_wni = tbl_wni.kode_wni							 
							inner join tbl_mast_perwakilan on tbl_mast_perwakilan.kode_perwakilan = tbl_wni.kode_perwakilan
							inner join tbl_mast_pjtki on tbl_mast_pjtki.kode_pjtki = tbl_kerja_tki.kode_pjtki
							left  join tbl_mast_pjtka on tbl_mast_pjtka.kode_pjtka = tbl_kerja_tki.kode_pjtka  where tbl_kerja_tki.kode_wni='$kode_wni' " ;

								$result_pekerja = $db->Execute($sql_pekerja);
						$initSet = array();
						$data_pekerja = array();
						$z=0;
						while ($arr=$result_pekerja->FetchRow()) {
							array_push($data_pekerja, $arr);
							array_push($initSet, $z);
							$z++;
						}
						$smarty->assign ("DATA_PEKERJA", $data_pekerja);

						}

						 if ($kode_sumber == 6  ) {
							 $sql_pekerja="  SELECT tbl_kerja_tki_pelayaran.kode_kerja_tki
							 , tbl_kerja_tki_pelayaran.kode_agency
							 , tbl_kerja_tki_pelayaran.kode_perwakilan
							 , tbl_kerja_tki_pelayaran.kode_wni
							 , tbl_kerja_tki_pelayaran.tgl_awal
							 , tbl_kerja_tki_pelayaran.tgl_akhir
							 , tbl_kerja_tki_pelayaran.nama_kapal
							 , tbl_wni.kode_wni
							 , tbl_wni.nama
								, tbl_wni.jk
							 , tbl_mast_perwakilan.kode_perwakilan
							 , tbl_mast_perwakilan.nm_perwakilan
							  , tbl_mast_agency_pelayaran.kode_agency
							 , tbl_mast_agency_pelayaran.nama_agency
						FROM
						  tbl_kerja_tki_pelayaran
						INNER JOIN tbl_wni
						ON tbl_kerja_tki_pelayaran.kode_wni = tbl_wni.kode_wni
						INNER JOIN tbl_mast_perwakilan
						ON tbl_kerja_tki_pelayaran.kode_perwakilan = tbl_mast_perwakilan.kode_perwakilan
						left  JOIN tbl_mast_agency_pelayaran
						ON tbl_kerja_tki_pelayaran.kode_agency = tbl_mast_agency_pelayaran.kode_agency  where tbl_kerja_tki_pelayaran.kode_wni='$kode_wni' " ;

							$result_pekerja = $db->Execute($sql_pekerja);
						$initSet = array();
						$data_pekerja = array();
						$z=0;
						while ($arr=$result_pekerja->FetchRow()) {
							array_push($data_pekerja, $arr);
							array_push($initSet, $z);
							$z++;
						}
						$smarty->assign ("DATA_PEKERJA", $data_pekerja);

						}


					

//echo $sql_pekerja."<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


							$sql_kasus  = " select kode_kat_kasus,sumber_informasi  ,
							kronologis_permasalahan , bantuan ,kode_form_pengaduan  , 
						 SUBSTRING(tgl_pengaduan,6,2)  as bulan_tl ,
						 LEFT(tgl_pengaduan,4) as tahun_tl , 
						 RIGHT(tgl_pengaduan,2) as tanggal_tl  
						 from  tbl_kasus_pengaduan
								 
						 where 1=1  and  tbl_kasus_pengaduan.kode_wni='$kode_wni'";

						$result_kasus = $db->Execute($sql_kasus);
						$initSet = array();
						$data_kasus = array();
						$z=0;
						while ($arr=$result_kasus->FetchRow()) {
							array_push($data_kasus, $arr);
							array_push($initSet, $z);
							$z++;
						}
						$smarty->assign ("DATA_KASUS", $data_kasus);	
								
				$sql_td1 = "select * from tbl_tindak_lanjut inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_tindak_lanjut.kode_form_pengaduan where kode_jenis_penindak=1 and  tbl_kasus_pengaduan.kode_wni='$kode_wni' ";
					$result_td1 = $db->Execute($sql_td1);
						$initSet = array();
						$data_td1 = array();
						$z=0;
						while ($arr=$result_td1->FetchRow()) {
							array_push($data_td1, $arr);
							array_push($initSet, $z);
							$z++;
						}
						$smarty->assign ("DATA_TL1", $data_td1);



				 $sql_td2="select * from tbl_tindak_lanjut  inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_tindak_lanjut.kode_form_pengaduan where kode_jenis_penindak=2 and  tbl_kasus_pengaduan.kode_wni='$kode_wni' ";
				 $result_td2 = $db->Execute($sql_td2);
						$initSet = array();
						$data_td2 = array();
						$z=0;
						while ($arr=$result_td2->FetchRow()) {
							array_push($data_td2, $arr);
							array_push($initSet, $z);
							$z++;
						}
						$smarty->assign ("DATA_TL2", $data_td2);

			   
					$sql_detail2="select tbl_hak_tki.kode_form_pengaduan ,
					jenis_hak , ekuivalent_rp 
					from tbl_hak_tki  inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_hak_tki.kode_form_pengaduan where  tbl_kasus_pengaduan.kode_wni='$kode_wni'";
				 
					 $recordSet4 = $db->Execute($sql_detail2);
					 
					$initSet4 = array();
					$data_tb4 = array();
					$row_class4 = array();
					$yy=0;
					while ($arr4=$recordSet4->FetchRow()) {
						 $count_row = $recordSet4->RecordCount();
						array_push($data_tb4, $arr4);
						if ($yy%2==0){ 
							$ROW_CLASSNAME4="#CCCCCC"; }
						else {
							$ROW_CLASSNAME4="#EEEEEE";
						   }
						array_push($row_class4, $ROW_CLASSNAME4);
						array_push($initSet4, $zz);
						$yy++;
					}

				   $smarty->assign ("DATA_TB4", $data_tb4);


				// asuransi TKI
				
					    $sql_detail5="select  tbl_asuransi_tki.kode_form_pengaduan ,
					jenis_asuransi , ekuivalent_rp  from tbl_asuransi_tki  inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_asuransi_tki.kode_form_pengaduan    where  tbl_kasus_pengaduan.kode_wni='$kode_wni'";
				 	 
  
					 $recordSet5 = $db->Execute($sql_detail5);
					 
					$initSet5 = array();
					$data_tb5 = array();
					$row_class5 = array();
					$yy=0;
					while ($arr5=$recordSet5->FetchRow()) {
						 $count_row = $recordSet5->RecordCount();
						array_push($data_tb5, $arr5);
						if ($yy%2==0){ 
							$ROW_CLASSNAME4="#CCCCCC"; }
						else {
							$ROW_CLASSNAME4="#EEEEEE";
						   }
						array_push($row_class5, $ROW_CLASSNAME5);
						array_push($initSet5, $zz);
						$yy++;
					}

				   $smarty->assign ("DATA_TB5", $data_tb5);


				   // PEMULANGAN TKI
				
					    $sql_detail6="select tbl_pemulangan.kode_form_pengaduan,  
						nama_pilihan_pemulangan , 
						 SUBSTRING(tgl_pemulangan,6,2)  as bulan_a ,
						 LEFT(tgl_pemulangan,4) as tahun_a , 
						 RIGHT(tgl_pemulangan,2) as tanggal_a   from tbl_pemulangan
						   inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_pemulangan.kode_form_pengaduan
						left join tbl_pilihan_pemulangan on tbl_pilihan_pemulangan.kode_pilihan = tbl_pemulangan.kode_pilihan  where  tbl_kasus_pengaduan.kode_wni='$kode_wni'";
 
					 $recordSet6 = $db->Execute($sql_detail6);
					 
					$initSet6 = array();
					$data_tb6 = array();
					$row_class6 = array();
					$yy=0;
					while ($arr6=$recordSet6->FetchRow()) {
						 $count_row = $recordSet6->RecordCount();
						array_push($data_tb6, $arr6);
						if ($yy%2==0){ 
							$ROW_CLASSNAME6="#CCCCCC"; }
						else {
							$ROW_CLASSNAME6="#EEEEEE";
						   }
						array_push($row_class6, $ROW_CLASSNAME6);
						array_push($initSet6, $zz);
						$yy++;
					}

				   $smarty->assign ("DATA_TB6", $data_tb6);


				     // PENANGANAN JENAZAH TKI
				
					    $sql_detail7="select tbl_jenazah.kode_form_pengaduan , nama_pilihan_penguburan  from
					tbl_jenazah
					 inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_jenazah.kode_form_pengaduan
					 left join tbl_pilihan_penguburan on tbl_pilihan_penguburan.kode_pilihan_meninggal = tbl_jenazah.kode_pilihan_meninggal  where  tbl_kasus_pengaduan.kode_wni='$kode_wni'";
						 
					$recordSet7 = $db->Execute($sql_detail7);
					 
					$initSet7 = array();
					$data_tb7 = array();
					$row_class7 = array();
					$yy=0;
					while ($arr7=$recordSet7->FetchRow()) {
						 $count_row = $recordSet7->RecordCount();
						array_push($data_tb7, $arr7);
						if ($yy%2==0){ 
							$ROW_CLASSNAME7="#CCCCCC"; }
						else {
							$ROW_CLASSNAME7="#EEEEEE";
						   }
						array_push($row_class7, $ROW_CLASSNAME7);
						array_push($initSet7, $zz);
						$yy++;
					}

					   $smarty->assign ("DATA_TB7", $data_tb7);


					 $sql_detail8="select tbl_sidang_hasil.kode_form_pengaduan  , vonis from
					tbl_sidang_hasil
					 inner join tbl_kasus_pengaduan on tbl_kasus_pengaduan.kode_form_pengaduan = tbl_sidang_hasil.kode_form_pengaduan
					  where  tbl_kasus_pengaduan.kode_wni='$kode_wni' ";
						  
					$recordSet8 = $db->Execute($sql_detail8);
					 
					$initSet8 = array();
					$data_tb8 = array();
					$row_class8 = array();
					$yy=0;
					while ($arr8=$recordSet8->FetchRow()) {
						 $count_row = $recordSet8->RecordCount();
						array_push($data_tb8, $arr8);
						if ($yy%2==0){ 
							$ROW_CLASSNAME8="#CCCCCC"; }
						else {
							$ROW_CLASSNAME8="#EEEEEE";
						   }
						array_push($row_class8, $ROW_CLASSNAME8);
						array_push($initSet8, $zz);
						$yy++;
					}

					   $smarty->assign ("DATA_TB8", $data_tb8);

						
	}


}


($_GET['search'] == '1') ? $tampilkan_search_box = 0: $tampilkan_search_box = 1;

$smarty->assign ("SEARCH_BOX", $tampilkan_search_box);
$smarty->assign ("KODE_WNI", $kode_wni);
$smarty->assign ("SEARCH_YEAR", $Search_Year);
$smarty->assign ("FILES", $file_2);
$smarty->assign ("TITLE", _PRINT_TITLE_JL_01_MAIN);
$smarty->assign ("HEAD_TITLE", _PRINT_HEAD_TITLE_JL_01_MAIN);
$smarty->assign ("TB_PROPINSI", _NAMA_PROP);
$smarty->assign ("TB_KABUPATEN", _NAMA_KABUPATEN);
$smarty->assign ("TB_NO", _NO_URUT);
$smarty->assign ("TB_NO_KABUPATEN", _NO_KABUPATEN);
$smarty->assign ("TB_NO_RUAS", _NO_RUAS);
$smarty->assign ("TB_NAMA_RUAS", _NAMA_RUAS);
$smarty->assign ("TB_TITIK_PENGENAL_PANGKAL", _TITIK_PENGENAL_PANGKAL);
$smarty->assign ("TB_TITIK_PENGENAL_UJUNG", _TITIK_PENGENAL_UJUNG);
$smarty->assign ("TB_NAMA_KECAMATAN", _NAMA_KECAMATAN);
$smarty->assign ("TB_PANJANG_RUAS", _PANJANG_RUAS);
$smarty->assign ("TB_LEBAR_RATA_RATA", _LEBAR_RATA_RATA);
$smarty->assign ("TB_PANJANG_PERMUKAAN", _PANJANG_PERMUKAAN);
/*** remark 17-08-2010 
$smarty->assign ("TB_ASPAL", _ASPAL);
$smarty->assign ("TB_PM", _PENETRASI_MACADAM);
$smarty->assign ("TB_TELFORD", _TELFORD);
$smarty->assign ("TB_TANAH", _TANAH);
$smarty->assign ("TB_BLM_TEMBUS", _BELUM_TEMBUS);
***/
$smarty->assign ("TB_TANAH", _TANAH);
$smarty->assign ("TB_KERIKIL", _KERIKIL);
$smarty->assign ("TB_PENETRASI_MACADAM", _PENETRASI_MACADAM);
//$smarty->assign ("TB_HRS", _HRS);
$smarty->assign ("TB_HOT_MIX", _HOT_MIX);
$smarty->assign ("TB_BETON_SEMEN", _BETON_SEMEN);
$smarty->assign ("TB_LAIN_LAIN", _LAIN_LAIN);
$smarty->assign ("TB_KETERANGAN", _KETERANGAN);
$smarty->assign ("SUBMIT", _SUBMIT);
$smarty->assign ("RESET", _RESET);
$smarty->assign ("LIST_ME", _PRINT_LIST_JL_01_MAIN);
$smarty->assign ("RECORD_PER_PAGE", _RECORD_PER_PAGE);
$smarty->assign ("ACTION", _ACTION);
$smarty->assign ("EDIT", _EDIT);
$smarty->assign ("DELETE", _DELETE);
$smarty->assign ("SORT_IN", _SORT_IN);
$smarty->assign ("SORT_ORDER", _SORT_ORDER);
$smarty->assign ("SHOWING", _SHOWING);
$smarty->assign ("OF", _OF);
$smarty->assign ("RECORDS", _RECORDS);
$smarty->assign ("BTN_NEW", _BTN_NEW);

/*** Tambahan 06-06-2010 ***/
$smarty->assign ("TB_JENIS_JALAN", _NAMA_JENIS_JALAN);

// kolom pada form pencarian
$smarty->assign ("PID_JENIS_JLN2", $fields_find_jns_jln_);
/*** End 0f 06-06-2010 ***/

$smarty->assign ("INITSET", $initSet);
$smarty->assign ("PATH", $PATH);
$smarty->assign ("LIMIT", $LIMIT);
$smarty->assign ("SORT", $SORT);
$smarty->assign ("ORDER", $ORDER);
$smarty->assign ("page", $page);
$smarty->assign ("LISTVAL", $arrayName);
$smarty->assign ("SELECTED", $selected);
$smarty->assign ("ROW_CLASSNAME", $row_class);
$smarty->assign ("STR_COMPLETER", $str_completer);
$smarty->assign ("STR_COMPLETER_", $str_completer_);
$smarty->assign ("COUNT_VIEW", $count_view);
$smarty->assign ("COUNT_ALL", $count_all);
$smarty->assign ("COUNT", $count);
$smarty->assign ("NEXT_PREV", $next_prev);
$smarty->assign ("DATA_TB", $data_tb);
$smarty->assign ("DATA_PANJANG", $data_panjang);
$smarty->assign ("DATA_LEBAR", $data_lebar);
$smarty->assign ("DATA_TANAH", $data_tanah);
$smarty->assign ("DATA_KERIKIL", $data_kerikil);
$smarty->assign ("DATA_PENETRASI_MACADAM", $data_penetrasi_macadam);
$smarty->assign ("DATA_HOT_MIX", $data_hot_mix);
$smarty->assign ("DATA_BETON_SEMEN", $data_beton_semen);
$smarty->assign ("DATA_LAIN_LAIN", $data_lain_lain);

# Finally Grab All Parsed variables, parse it into the template, and generate ouput
# Clear Cache First
$smarty->clear_cache ($TPL_PATH.'/'.$DOC_SELF_NAME_ONLY.'.tpl');
# Parsing the proper theme template & Generate Output
$smarty->display ($TPL_PATH.'/'.$DOC_SELF_NAME_ONLY.'.tpl');
//require_once($DIR_THEME.'/'.base64_decode($_SESSION['THEME']).$DOC_SELF_PATH.$DOC_SELF_NAME_ONLY.'.tpl');
//=================================== END PARSING TEMPLATE BLOCK====================================
# Store all the JavaScript  for this pages into /javascripts/file_name  and include it here (bottom page)
require_once($FILE_JS.'/'.$DOC_SELF_NAME_ONLY.'.js');

# AdoDb closed here
$db->Close();
}
?>