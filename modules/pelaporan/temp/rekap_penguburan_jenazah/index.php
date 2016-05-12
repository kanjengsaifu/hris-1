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
require_once($DIR_HOME.'/laporan/inc.rekap_jenazah_penguburan.php');  

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
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/pelaporan/rekap_penguburan_jenazah';
 
#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/pelaporan');
$FILE_JS  = $JS_MODUL.'/rekap_penguburan_jenazah';

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

if ($_GET['kode_kawasan']) $kode_kawasan = $_GET['kode_kawasan'];
else if ($_POST['kode_kawasan']) $kode_kawasan = $_POST['kode_kawasan'];
else $kode_kawasan="";

if ($_GET['kode_sebab']) $kode_sebab = $_GET['kode_sebab'];
else if ($_POST['kode_sebab']) $kode_sebab = $_POST['kode_sebab'];
else $kode_sebab="";

if ($_GET['bulan']) $bulan = $_GET['bulan'];
else if ($_POST['bulan']) $bulan = $_POST['bulan'];
else $bulan="";

if ($_GET['tahun']) $tahun = $_GET['tahun'];
else if ($_POST['tahun']) $tahun = $_POST['tahun'];
else $tahun="";

if ($_GET['kode_kat_kasus']) $kode_kat_kasus = $_GET['kode_kat_kasus'];
else if ($_POST['kode_kat_kasus']) $kode_kat_kasus = $_POST['kode_kat_kasus'];
else $kode_kat_kasus="";
 

if ($_GET['search']) $search = $_GET['search'];
else if ($_POST['search']) $search = $_POST['search'];
else $search="";


$var_cari="no_propinsi=".$no_propinsi."&id_kab=".$id_kab."&usia=".$usia."&jk=".$jk."&kode_perwakilan=".$kode_perwakilan."&kode_sebab=".$kode_sebab."&kode_kat_kasus=".$kode_kat_kasus."&kode_kawasan=".$kode_kawasan."&bulan=".$bulan."&tahun=".$tahun;
$smarty->assign ("VAR_CARI", $var_cari);
 

$Search_Year = $_GET[tahun];
$smarty->assign ("SEARCH", $search);
$str_completer = "mod_id=".$mod_id."&limit=".$LIMIT."&SORT=".$SORT."&no_propinsi=".$no_propinsi."&no_kabupaten=".$no_kabupaten."&search=1&Search_Year=".$Search_Year."&jns_jln=".$jns_jln;
$str_completer_ = "limit=".$LIMIT."&SORT=".$SORT."&page=".$page."&no_propinsi=".$no_propinsi."&no_kabupaten=".$no_kabupaten."&search=1&Search_Year=".$Search_Year."&jns_jln=".$jns_jln;

$SES_TAHUN		    = $_SESSION['TAHUN'];
$SES_MENINGGAL		    = $_SESSION['MENINGGAL'];
$SES_INSTANSI		= $_SESSION['KODE_INSTANSI'];
$SES_JENIS_USER		= $_SESSION['JENIS_USER'];
//--------------------------------------
//SHOW DATA INSTANSI
//---------------------------------------

$smarty->assign ("SES_TAHUN", $SES_TAHUN);
$smarty->assign ("SES_MENINGGAL", $SES_MENINGGAL);
$smarty->assign ("SES_INSTANSI", $SES_INSTANSI);
$smarty->assign ("SES_JENIS_USER", $SES_JENIS_USER);


$smarty->assign ("BULAN", $bulan);
$smarty->assign ("TAHUN", $tahun);
$smarty->assign ("KODE_KAT_KASUS", $kode_kat_kasus);
 //--------------------------------------
//SHOW DATA INSTANSI
//---------------------------------------

//---------------------------------------

$sql_instansi = "SELECT *  FROM tbl_mast_kawasan order by nama_kawasan ";
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
 

$sql_kematian = "SELECT *  FROM tbl_mast_sebab_kematian  order by penyebab_kematian  ";
$result_kematian = $db->Execute($sql_kematian);
$initSet = array();
$data_sebab = array();
$z=0;
while ($arr=$result_kematian->FetchRow()) {
	array_push($data_sebab, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_SEBAB", $data_sebab);
 

//----------Menampilkan Data Ruas---------------------------

if ($_GET[get_proyek] == 1)
{
	$kode_proyek = $_GET[kode_proyek];
			if($kode_proyek!=''){	
					$sql_ruas_combo 	  = " SELECT * FROM tbl_proyek_detail_ruas   WHERE kode_proyek ='$kode_proyek' ORDER BY nama_paket ";
					$result_data_usulan = $db->execute($sql_ruas_combo);
			 
					//echo $sql_data_usulan;
					$data_usulan = "<select id=\"kode_paket\"  name=\"kode_paket\" style=\"width:200px\" >";
					$data_usulan .= "<option value=\"\"> [Pilih  Paket] </option>";

					while(!$result_data_usulan ->EOF):
						$data_usulan .= "<option value=".$result_data_usulan->fields['kode_paket'].">".$result_data_usulan->fields['nama_paket']."</option>";
						$result_data_usulan->MoveNext();
					endwhile; 	
					 $data_usulan .="</select>";
					$delimeter   = "-";
			 
					 $option_choice = $data_usulan."^/&".$delimeter;	
					echo $option_choice;	
			}
}

  			
if ($_GET['tahun'] != '')
{
	if (Privi($mod_id, $user_id, 'search') != 'no')
	{
				$sql__="select * , upper(nama_kawasan) as nama_kawasan from tbl_mast_kawasan where kode_kawasan='$_GET[kode_kawasan]' ";
				$rs__=$db->Execute($sql__);			  
				 $nm_kawasan = $rs__->fields['nama_kawasan']; 				 
				 $smarty->assign ("NM_KAWASAN", $nm_kawasan); 
				 				
			$sql_sebab="select upper(penyebab_kematian) as penyebab_kematian from tbl_mast_sebab_kematian where kode_sebab='$_GET[kode_sebab]' ";
				$rs_sebab=$db->Execute($sql_sebab);			  
				 $nm_sebab = $rs_sebab->fields['penyebab_kematian']; 				 
				 $smarty->assign ("NM_SEBAB", $nm_sebab); 
								
								if ($bulan=='1') { $nama_bulan='Januari';  }
												if ($bulan=='2') { $nama_bulan='Februari';  }
												if ($bulan=='3') { $nama_bulan='Maret';  }
												if ($bulan=='4') { $nama_bulan='April';  }
												if ($bulan=='5') { $nama_bulan='Mei';  }
												if ($bulan=='6') { $nama_bulan='Juni';  }
												if ($bulan=='7') { $nama_bulan='Juli';  }
												if ($bulan=='8') { $nama_bulan='Agustus';  }
												if ($bulan=='9') { $nama_bulan='September';  }
												if ($bulan=='10') { $nama_bulan='Oktober';  }
												if ($bulan=='11') { $nama_bulan='November';  }
												if ($bulan=='12') { $nama_bulan='Desember';  }
								
								
								
	
if ($kode_kawasan !=''){
$sql_detail = "SELECT distinct nm_perwakilan,
(SELECT COUNT(c.kode_wni) from tbl_jenazah c left join tbl_mast_perwakilan d on (c.kode_perwakilan=d.kode_perwakilan)
left join tbl_mast_sebab_kematian e on (c.kode_sebab=e.kode_sebab)
 where d.kode_perwakilan=a.kode_perwakilan and kode_pilihan_meninggal=2 and LEFT(c.tgl_meninggal,4) = '$tahun'  ";
 
 if ($bulan !='') {	
	$sql_detail .= "and MONTH(c.tgl_meninggal) =$bulan "; 
	}
  if ($kode_sebab !='') {	
	$sql_detail .= "and e.kode_sebab ='$_GET[kode_sebab]'"; 
	}
 $sql_detail .= ") as orang
FROM tbl_mast_perwakilan a
 LEFT JOIN tbl_mast_negara ON tbl_mast_negara.kode_negara = a.kode_negara
LEFT JOIN tbl_mast_kawasan ON tbl_mast_kawasan.kode_kawasan = tbl_mast_negara.kode_kawasan
 where tbl_mast_kawasan.kode_kawasan ='$_GET[kode_kawasan]'
 order by nm_perwakilan";
}

	if ($kode_kawasan ==''){
		$sql_detail = "SELECT distinct nm_perwakilan,
(SELECT COUNT(c.kode_wni) from tbl_jenazah c left join tbl_mast_perwakilan d on (c.kode_perwakilan=d.kode_perwakilan)
left join tbl_mast_sebab_kematian e on (c.kode_sebab=e.kode_sebab)
 where d.kode_perwakilan=a.kode_perwakilan and kode_pilihan_meninggal=2 and LEFT(c.tgl_meninggal,4) = '$tahun'";


 if ($bulan !='') {	
	$sql_detail .= "  and MONTH(c.tgl_meninggal) =$bulan "; 
	}
  if ($kode_sebab !='') {	
	$sql_detail .= "and e.kode_sebab ='$_GET[kode_sebab]'"; 
	}
 $sql_detail .= ") as orang
FROM tbl_mast_perwakilan a order by nm_perwakilan  ";
	}


	//echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br>".$sql_detail;

				$numresults2=$db->Execute($sql_detail);
				$count2 = $numresults2->RecordCount();
 				$recordSet2 = $db->Execute($sql_detail);
				$end2 = $recordSet2->RecordCount();
				$initSet2 = array();
				$data_tb2 = array();
				$row_class2 = array();
				$z=0;
				while ($arr2=$recordSet2->FetchRow()) {
					
					$content_data .= print_content($z+1,$arr2[nm_perwakilan],$arr2[orang]);
					
					
					array_push($data_tb2, $arr2);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
					array_push($row_class2, $ROW_CLASSNAME2);
					array_push($initSet2, $z);
					$z++;
				}
				
			 
				
			   $smarty->assign ("DATA_TB2", $data_tb2);

								
												

if ($kode_kawasan !=''){
			   $sql_kawasan="SELECT distinct nama_kawasan, 
(SELECT COUNT(tbl_jenazah.kode_wni) from tbl_jenazah
left join tbl_mast_sebab_kematian on tbl_jenazah.kode_sebab=tbl_mast_sebab_kematian.kode_sebab
 left join tbl_mast_perwakilan on tbl_jenazah.kode_perwakilan=tbl_mast_perwakilan.kode_perwakilan
LEFT JOIN tbl_mast_negara ON tbl_mast_perwakilan.kode_negara=tbl_mast_negara.kode_negara
LEFT JOIN tbl_mast_kawasan ON tbl_mast_negara.kode_kawasan=tbl_mast_kawasan.kode_kawasan
where kode_pilihan_meninggal=2	and LEFT(tgl_meninggal,4) ='$tahun' ";

if ($bulan !='') {	
  $sql_kawasan .= "and MONTH(tgl_meninggal)= $bulan  "; 
	}
  if ($kode_sebab !='') {	
	$sql_kawasan .= "and tbl_mast_sebab_kematian.kode_sebab ='$_GET[kode_sebab]'"; 
	}
 $sql_kawasan .= "and tbl_mast_kawasan.kode_kawasan=a.kode_kawasan) as orang
FROM tbl_mast_kawasan a  
 where kode_kawasan ='$_GET[kode_kawasan]'  ";

}



if ($kode_kawasan ==''){
			   $sql_kawasan="SELECT distinct nama_kawasan, 
(SELECT COUNT(tbl_jenazah.kode_wni) from tbl_jenazah
left join tbl_mast_sebab_kematian on tbl_jenazah.kode_sebab=tbl_mast_sebab_kematian.kode_sebab
 left join tbl_mast_perwakilan on tbl_jenazah.kode_perwakilan=tbl_mast_perwakilan.kode_perwakilan
LEFT JOIN tbl_mast_negara ON tbl_mast_perwakilan.kode_negara=tbl_mast_negara.kode_negara
LEFT JOIN tbl_mast_kawasan ON tbl_mast_negara.kode_kawasan=tbl_mast_kawasan.kode_kawasan
where kode_pilihan_meninggal=2	and LEFT(tgl_meninggal,4) ='$tahun' ";

if ($bulan !='') {	
  $sql_kawasan .= "and MONTH(tgl_meninggal)= $bulan  "; 
	}
 if ($kode_sebab !='') {	
	$sql_kawasan .= "and tbl_mast_sebab_kematian.kode_sebab ='$_GET[kode_sebab]'"; 
	}
 $sql_kawasan .= "and tbl_mast_kawasan.kode_kawasan=a.kode_kawasan) as orang
FROM tbl_mast_kawasan a order by nama_kawasan ";
}

	
				
				$numresults3=$db->Execute($sql_kawasan);
				$count3 = $numresults3->RecordCount();
 				$recordSet3 = $db->Execute($sql_kawasan);
				$end3 = $recordSet3->RecordCount();
				$initSet3 = array();
				$data_tb3 = array();
				$row_class3 = array();
				$z=0;
				while ($arr3=$recordSet3->FetchRow()) {
					
					$content_data2 .= print_content2($z+1,$arr3[nama_kawasan],$arr3[orang]);
					
					array_push($data_tb3, $arr3);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
			   array_push($row_class3, $ROW_CLASSNAME2);
				 array_push($initSet3, $z);
					$z++;
				}

			  $smarty->assign ("DATA_TB3", $data_tb3);
			  
if ($kode_kawasan !=''){			  
$sql_total="SELECT COUNT(kode_wni) as total_orang from tbl_jenazah
left join tbl_mast_sebab_kematian on tbl_jenazah.kode_sebab=tbl_mast_sebab_kematian.kode_sebab
 left join tbl_mast_perwakilan on tbl_jenazah.kode_perwakilan=tbl_mast_perwakilan.kode_perwakilan
LEFT JOIN tbl_mast_negara ON tbl_mast_perwakilan.kode_negara=tbl_mast_negara.kode_negara
LEFT JOIN tbl_mast_kawasan ON tbl_mast_negara.kode_kawasan=tbl_mast_kawasan.kode_kawasan
 where kode_pilihan_meninggal=2 and LEFT(tgl_meninggal,4) ='$tahun' and tbl_mast_kawasan.kode_kawasan ='$_GET[kode_kawasan]' ";
if ($bulan !='') {	
	$sql_total .= " 	and MONTH(tgl_meninggal) = $bulan ";
	}
	 if ($kode_sebab !='') {	
	$sql_total .= "and tbl_mast_sebab_kematian.kode_sebab ='$_GET[kode_sebab]'"; 
	}	
}



if ($kode_kawasan ==''){			  
$sql_total="SELECT COUNT(kode_wni) as total_orang from tbl_jenazah
 left join tbl_mast_sebab_kematian on tbl_jenazah.kode_sebab=tbl_mast_sebab_kematian.kode_sebab 
 where kode_pilihan_meninggal=2 and LEFT(tgl_meninggal,4) ='$tahun'  ";
if ($bulan !='') {	
	$sql_total .= " 	and MONTH(tgl_meninggal) = $bulan ";
	}
	 if ($kode_sebab !='') {	
	$sql_total .= "and tbl_mast_sebab_kematian.kode_sebab ='$_GET[kode_sebab]'"; 
	}
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
					
					 $tot2=$arr4[total_orang];
					$content_data .= print_content("","<b>TOTAL PENGUBURAN JENAZAH </b>",$tot2);
				 	 $content_data2 .= print_content("","<b>TOTAL PENGUBURAN JENAZAH </b>",$tot2);

					
					array_push($data_tb4, $arr4);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
			   array_push($row_class4, $ROW_CLASSNAME2);
				 array_push($initSet4, $z);
					$z++;
				}

			  $smarty->assign ("DATA_TB4", $data_tb4);
			  



				$file= $DIR_HOME."/files/rekap_penguburan_jenazah_".$nama_bulan."_".$tahun.".xls";

				$fp=@fopen($file,"w");
				if(!is_resource($fp))
				return false;
				//$content = str_replace("@@@@BREAKPAGE@@@@@",$content_break,$content);
				stream_set_write_buffer($fp, 0);
				
				$content = print_header($nama_bulan,$tahun);
				$content .= $content_data;
				$content .= print_header2();
				$content .= $content_data2;
				$content .= print_footer();
				
				fwrite($fp,$content);
				fclose($fp);
				$file_2= $HREF_HOME."/files/rekap_penguburan_jenazah_".$nama_bulan."_".$tahun.".xls";	
}

}


($_GET['search'] == '1') ? $tampilkan_search_box = 0: $tampilkan_search_box = 1;

$smarty->assign ("SEARCH_BOX", $tampilkan_search_box);

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