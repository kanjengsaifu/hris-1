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
$_SESSION['LANG']       = $LANG;

#FOR IMAGES CLASS PAGER
$HREF_IMAGES = $HREF_THEME.'/'.(base64_decode($_SESSION['THEME']).'/images');

# including Header file for Content Expiring
require_once($DIR_INC.'/header.exp.inc');
# including Header file for Database Configuration
require_once($DIR_INC.'/db.conf.php');
require_once($DIR_ADODB.'/adodb.inc.php');
require_once($DIR_INC.'/class.pager.php');

require_once($DIR_INC.'/func.inc.php');

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

$jenis_user  = $_SESSION['SESSION_JNS_USER'];
$kode_pw_ses  = $_SESSION['SESSION_KODE_CABANG'];
$smarty->assign ("JENIS_USER_SES", $jenis_user);
$smarty->assign ("KODE_PW_SES", $kode_pw_ses);

#HREF
$smarty->assign ("HREF_HOME_PATH", $HREF_HOME);
$smarty->assign ("HREF_HOME_PATH_AJAX", $HREF_HOME.'/modules/kpi/kpi_verifikasi');
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
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/kpi/kpi_verifikasi/';


#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/kpi');
$FILE_JS  = $JS_MODUL.'/kpi_verifikasi';

if($_POST['mod_id'])
{
		$mod_id = $_POST['mod_id'];
}else
{
		$mod_id = $_GET['mod_id'];
}

$user_id = base64_decode($_SESSION['UID']);

$smarty->assign ("MOD_ID", $mod_id);

#Initiate TABLE
$tbl_name	= "r_kpi";

//-----------------------------------END OF LOCAL CONFIG-------------------------------//


if ($_POST['limit']) { $LIMIT = $_POST['limit']; }
else if ($_GET['limit']) {$LIMIT = $_GET['limit']; }
else $LIMIT=$nLimit;

if ($_POST['SORT']) { $SORT = $_POST['SORT']; }
else if ($_GET['SORT']) { $SORT = $_GET['SORT']; }
else $SORT="ASC";

if ($_GET['ORDER']) { $ORDER = $_GET['ORDER']; }
else if ($_POST['ORDER']) { $ORDER = $_POST['ORDER']; }
else $ORDER="  tanggal desc ";

if ($_GET['page']) $page = $_GET['page'];
else if ($_POST['page']) $page = $_POST['page'];
else $page="1";

if ($_GET['kode_perwakilan_cari']) $kode_perwakilan_cari = $_GET['kode_perwakilan_cari'];
else if ($_POST['kode_perwakilan_cari']) $kode_perwakilan_cari = $_POST['kode_perwakilan_cari'];
else $kode_perwakilan_cari="";


if ($_GET['nama_karyawan_cari']) $nama_karyawan_cari = $_GET['nama_karyawan_cari'];
else if ($_POST['nama_karyawan_cari']) $nama_karyawan_cari = $_POST['nama_karyawan_cari'];
else $nama_karyawan_cari="";
 
if ($_GET['idfinger_cari']) $idfinger_cari= $_GET['idfinger_cari'];
else if ($_POST['idfinger_cari']) $idfinger_cari = $_POST['idfinger_cari'];
else $idfinger_cari="";

if ($_GET['bulan']) $bulan = $_GET['bulan'];
else if ($_POST['bulan']) $bulan = $_POST['bulan'];
else $bulan="";

if ($_GET['tahun']) $tahun = $_GET['tahun'];
else if ($_POST['tahun']) $tahun = $_POST['tahun'];
else $tahun="";

if ($_GET['departemen_cari']) $departemen_cari = $_GET['departemen_cari'];
else if ($_POST['departemen_cari']) $departemen_cari= $_POST['departemen_cari'];
else $departemen_cari="";





$tahun_ses_aktif		=	$_SESSION['SESSION_TAHUN_AKTIF'];
$bulan_ses_aktif		=	$_SESSION['SESSION_BULAN_AKTIF'];
$smarty->assign ("TAHUN_SES", $tahun_ses_aktif);
$smarty->assign ("BULAN_SES", $bulan_ses_aktif);

$today= date("Y-m-d");
$today = explode('-', $today);
$today_tahun = $today[0];
$today_bulan  = $today[1];
$today_hari  = $today[2];



 $smarty->assign("EDIT_MUTASI",$edit_r_pnpt__no_mutasi);

$smarty->assign ("KODE_PERWAKILAN_CARI", $kode_perwakilan_cari);
$smarty->assign ("NAMA_KARYAWAN_CARI", $nama_karyawan_cari);
$smarty->assign ("ID_FINGER_CARI", $idfinger_cari);


$smarty->assign ("TODAY_DATE", $today);
$smarty->assign ("BULAN", $today_bulan);
$smarty->assign ("TAHUN", $today_tahun);

 

$str_completer = "mod_id=".$mod_id."&limit=".$LIMIT."&SORT=".$SORT."&kode_perwakilan_cari=".$kode_perwakilan_cari."&nama_karyawan_cari=".$nama_karyawan_cari."&idfinger_cari=".$idfinger_cari."&bulan=".$bulan."&tahun=".$tahun;
//$str_completer_ = "limit=".$LIMIT."&SORT=".$SORT."&page=".$page;
$str_completer_ = "mod_id=".$mod_id."&limit=".$LIMIT."&page=".$page."&SORT=".$SORT."&kode_perwakilan_cari=".$kode_perwakilan_cari."&nama_karyawan_cari=".$nama_karyawan_cari."&idfinger_cari=".$idfinger_cari."&bulan=".$bulan."&tahun=".$tahun;

//-----------SHOW DATA DEPARTEMEN-----------------------//
$sql_departemen = "SELECT A.r_dept__id,A.r_dept__ket FROM r_departement A";
$result_departemen = $db->Execute($sql_departemen);
$initSet = array();
$data_departemen = array();
$z=0;
while ($arr=$result_departemen->FetchRow()) {
	array_push($data_departemen, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_DEPARTEMEN", $data_departemen);
//-----------CLOSE DATA DEPARTEMEN-----------------------//

//-------------DATA CABANG--------------------------------------//
$sql_pwk = "SELECT * FROM r_cabang order by r_cabang__id  ";
$result_pwk = $db->Execute($sql_pwk);

$initSet = array();
$data_pwk = array();
$z=0;
while ($arr=$result_pwk->FetchRow()) {
	array_push($data_pwk, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_CABANG", $data_pwk);
//-------------CLOSE DATA CABANG--------------------------------------//

//-----------------------VIEW EDIT ---------------------------------------//
$opt = $_GET[opt];
$ed = 0;
if($opt=="1")
{ 
        $sql_= "SELECT 
                 r_kpi.r_kpi__id AS r_kpi__id,
                r_kpi.r_kpi__finger AS r_kpi__finger,
                r_kpi.r_kpi__bulan AS r_kpi__bulan,
                r_kpi.r_kpi__tahun AS r_kpi__tahun,
                r_kpi.r_kpi__nilai AS r_kpi__nilai,
                r_kpi.r_kpi__keterangan AS r_kpi__keterangan,
                r_kpi.r_kpi__approval AS r_kpi__approval,
                r_kpi.r_kpi__date_created AS r_kpi__date_created,
                r_kpi.r_kpi__date_updated AS r_kpi__date_updated,
                r_departement.r_dept__akronim AS r_dept__akronim,
                r_departement.r_dept__id AS r_dept__id,
                r_departement.r_dept__ket AS r_dept__ket,
                r_subcabang.r_subcab__nama AS r_subcab__nama,
                r_cabang.r_cabang__nama AS r_cabang__nama,
                r_cabang.r_cabang__id AS r_cabang__id,
                r_pegawai.r_pegawai__id AS r_pegawai__id,
                r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print
                FROM r_kpi
                        INNER JOIN r_penempatan
                          ON r_penempatan.r_pnpt__finger_print = r_kpi.r_kpi__finger
                        INNER JOIN r_pegawai
                          ON r_pegawai.r_pegawai__id = r_penempatan.r_pnpt__id_pegawai
                        INNER JOIN r_subcabang
                          ON r_subcabang.r_subcab__id = r_penempatan.r_pnpt__subcab
                        INNER JOIN r_cabang
                          ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                        INNER JOIN r_subdepartement
                          ON r_subdepartement.r_subdept__id = r_pnpt__subdept
                        INNER JOIN r_departement
                          ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept 
                        WHERE r_kpi__id='".$_GET['id']."'";      
    $resultSet = $db->Execute($sql_);                    
    $edit_r_kpi__id = $resultSet->fields[r_kpi__id];
    $edit_r_kpi__finger = $resultSet->fields[r_kpi__finger];
    $edit_r_kpi__bulan = $resultSet->fields[r_kpi__bulan];
    $edit_r_kpi__tahun = $resultSet->fields[r_kpi__tahun];
    $edit_r_kpi__nilai = $resultSet->fields[r_kpi__nilai];
    $edit_r_kpi__keterangan = $resultSet->fields[r_kpi__keterangan];
    $edit_r_kpi__approval = $resultSet->fields[r_kpi__approval];
    $edit_r_cabang__id=$resultSet->fields[r_cabang__id];
    $edit_r_cabang__nama=$resultSet->fields[r_cabang__nama];
    $edit_r_pegawai__nama=$resultSet->fields[r_pegawai__nama];
    $edit_r_pnpt__finger_print=$resultSet->fields[r_pnpt__finger_print];
    $edit_r_pnpt__no_mutasi=$resultSet->fields[r_pnpt__no_mutasi];
    
    
    $edit=1;
    $smarty->assign("OPT",$opt); //component_edit
    $smarty->assign("EDIT_ID", $edit_id);//component_edit 
    $smarty->assign("EDIT_KPI_ID",$edit_r_kpi__id);
    $smarty->assign("EDIT_KPI_MUTASI", $edit_r_kpi__finger);
    $smarty->assign("EDIT_KPI_BULAN", $edit_r_kpi__bulan);
    $smarty->assign("EDIT_KPI_TAHUN", $edit_r_kpi__tahun);
    $smarty->assign("EDIT_KPI_NILAI", $edit_r_kpi__nilai);
    $smarty->assign("EDIT_KPI_KETERANGAN", $edit_r_kpi__keterangan);
    $smarty->assign("EDIT_KPI_APPROVAL", $edit_r_kpi__approval);
    $smarty->assign("EDIT_KODE_CABANG",$edit_r_cabang__id);
    $smarty->assign("EDIT_NAMA_CABANG",$edit_r_cabang__nama);
    $smarty->assign("EDIT_NAMA_PEGAWAI",$edit_r_pegawai__nama);
     $smarty->assign("EDIT_FINGERPRINT",$edit_r_pnpt__finger_print);
     $smarty->assign("EDIT_MUTASI",$edit_r_pnpt__no_mutasi);

     
     
    
    $smarty->assign ("EDIT_VAL", $edit);
}                    


//---------------------------------CLOSE VIEW EDIT ----------------------------------------------------------------//


//---------------------------------VIEW INDEX----------------$opt = $_GET[opt];-----------------------------------------------------//
if ($_GET['search'] == '1')
    {
	if (Privi($mod_id, $user_id, 'search') != 'no')
	{
 
		  if($jenis_user=='2'){
                                                  $sql  = "SELECT 
                                                    r_kpi.r_kpi__id AS r_kpi__id,
                                                    r_kpi.r_kpi__finger AS r_kpi__finger,
                                                    r_kpi.r_kpi__bulan AS r_kpi__bulan,
                                                    r_kpi.r_kpi__tahun AS r_kpi__tahun,
                                                    r_kpi.r_kpi__nilai AS r_kpi__nilai,
                                                    r_kpi.r_kpi__keterangan AS r_kpi__keterangan,
                                                    r_kpi.r_kpi__approval AS r_kpi__approval,
                                                    r_kpi.r_kpi__date_created AS r_kpi__date_created,
                                                    r_kpi.r_kpi__date_updated AS r_kpi__date_updated,
                                                    r_departement.r_dept__akronim AS r_dept__akronim,
                                                    r_departement.r_dept__id AS r_dept__id,
                                                    r_departement.r_dept__ket AS r_dept__ket,
                                                    r_subcabang.r_subcab__nama AS r_subcab__nama,
                                                    r_cabang.r_cabang__nama AS r_cabang__nama,
                                                    r_cabang.r_cabang__id AS r_cabang__id,
                                                    r_pegawai.r_pegawai__id AS r_pegawai__id,
                                                    r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                                                    r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                                                    r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                                                    r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print
                                                    FROM r_kpi
                                                            INNER JOIN r_penempatan
                                                              ON r_penempatan.r_pnpt__finger_print = r_kpi.r_kpi__finger
                                                            INNER JOIN r_pegawai
                                                              ON r_pegawai.r_pegawai__id = r_penempatan.r_pnpt__id_pegawai
                                                            INNER JOIN r_subcabang
                                                              ON r_subcabang.r_subcab__id = r_penempatan.r_pnpt__subcab
                                                            INNER JOIN r_cabang
                                                              ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                                            INNER JOIN r_subdepartement
                                                              ON r_subdepartement.r_subdept__id = r_pnpt__subdept
                                                            INNER JOIN r_departement
                                                              ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept 
                                                            WHERE r_cabang__id = '".$kode_pw_ses."'";
                      

			} else {
						$sql  = "SELECT   r_kpi.r_kpi__id AS r_kpi__id,
                                                    r_kpi.r_kpi__finger AS r_kpi__finger,
                                                    r_kpi.r_kpi__bulan AS r_kpi__bulan,
                                                    r_kpi.r_kpi__tahun AS r_kpi__tahun,
                                                    r_kpi.r_kpi__nilai AS r_kpi__nilai,
                                                    r_kpi.r_kpi__keterangan AS r_kpi__keterangan,
                                                    r_kpi.r_kpi__approval AS r_kpi__approval,
                                                    r_kpi.r_kpi__date_created AS r_kpi__date_created,
                                                    r_kpi.r_kpi__date_updated AS r_kpi__date_updated,
                                                    r_departement.r_dept__akronim AS r_dept__akronim,
                                                    r_departement.r_dept__id AS r_dept__id,
                                                    r_departement.r_dept__ket AS r_dept__ket,
                                                    r_subcabang.r_subcab__nama AS r_subcab__nama,
                                                    r_cabang.r_cabang__nama AS r_cabang__nama,
                                                    r_cabang.r_cabang__id AS r_cabang__id,
                                                    r_pegawai.r_pegawai__id AS r_pegawai__id,
                                                    r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                                                    r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                                                    r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                                                    r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print
                                                    FROM r_kpi
                                                            INNER JOIN r_penempatan
                                                              ON r_penempatan.r_pnpt__finger_print = r_kpi.r_kpi__finger
                                                            INNER JOIN r_pegawai
                                                              ON r_pegawai.r_pegawai__id = r_penempatan.r_pnpt__id_pegawai
                                                            INNER JOIN r_subcabang
                                                              ON r_subcabang.r_subcab__id = r_penempatan.r_pnpt__subcab
                                                            INNER JOIN r_cabang
                                                              ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                                            INNER JOIN r_subdepartement
                                                              ON r_subdepartement.r_subdept__id = r_pnpt__subdept
                                                            INNER JOIN r_departement
                                                              ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept 
                                                           WHERE 1=1   ";	

			}
 
				//echo "<br><br><br><br><br><br><br><br><br><br>dddddddddkode_perwakilan_cari ===".$kode_perwakilan_cari;
			 
				if($kode_perwakilan_cari !=''){
					$sql .= "AND  r_cabang__id= '".$kode_perwakilan_cari."'  ";
				}
				if($nama_karyawan_cari !=''){
					$sql .= "AND r_pegawai__nama LIKE '%".$nama_karyawan_cari."%' "; 
				}
                                if($idfinger_cari !=''){
					$sql .= "AND r_pnpt__finger_print = '".$idfinger_cari."' "; 
                                        
				} 
                                
                                if ($bulan !='') {
					$sql.=" and r_kpi__bulan='$bulan'  ";
                                }

                                if ($tahun !='') {
                                       $sql.=" AND r_kpi__tahun='$tahun' ";
                                }
                                 if ($departemen_cari !='') {
                                       $sql.=" AND r_dept__id='$departemen_cari' ";
                                }
			 	 $sql .= "ORDER BY r_kpi__date_updated  DESC ";

                                if ($_GET['page']) $start = $p->findStartGet($LIMIT); else $start = $p->findStartPost($LIMIT);
				$numresults=$db->Execute($sql);
				$count = $numresults->RecordCount();
				$pages = $p->findPages($count,$LIMIT); 
				$sql  .= "LIMIT ".$start.", ".$LIMIT;
                              
				$recordSet = $db->Execute($sql);
				
				$end = $recordSet->RecordCount();
				$initSet = array();
				$data_tb = array();
				$row_class = array();
				$z=0;
				while ($arr=$recordSet->FetchRow()) {
					array_push($data_tb, $arr);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
					array_push($row_class, $ROW_CLASSNAME);
					array_push($initSet, $z);
					$z++;
				}

				$count_view = $start+1;
				$count_all  = $start+$end;
				$next_prev = $p->nextPrevCustom($page, $pages, "ORDER=".$ORDER."&".$str_completer); 
}

}
else
    
{
				
			if($jenis_user=='2'){
          
                                                $sql = "SELECT   r_kpi.r_kpi__id AS r_kpi__id,
                                                    r_kpi.r_kpi__finger AS r_kpi__finger,
                                                    r_kpi.r_kpi__bulan AS r_kpi__bulan,
                                                    r_kpi.r_kpi__tahun AS r_kpi__tahun,
                                                    r_kpi.r_kpi__nilai AS r_kpi__nilai,
                                                    r_kpi.r_kpi__keterangan AS r_kpi__keterangan,
                                                    r_kpi.r_kpi__approval AS r_kpi__approval,
                                                    r_kpi.r_kpi__date_created AS r_kpi__date_created,
                                                    r_kpi.r_kpi__date_updated AS r_kpi__date_updated,
                                                    r_departement.r_dept__akronim AS r_dept__akronim,
                                                    r_departement.r_dept__id AS r_dept__id,
                                                    r_departement.r_dept__ket AS r_dept__ket,
                                                    r_subcabang.r_subcab__nama AS r_subcab__nama,
                                                    r_cabang.r_cabang__nama AS r_cabang__nama,
                                                    r_cabang.r_cabang__id AS r_cabang__id,
                                                    r_pegawai.r_pegawai__id AS r_pegawai__id,
                                                    r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                                                    r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                                                    r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                                                    r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print
                                                       
                                                       
                                                    FROM r_kpi
                                                            INNER JOIN r_penempatan
                                                              ON r_penempatan.r_pnpt__finger_print = r_kpi.r_kpi__finger
                                                            INNER JOIN r_pegawai
                                                              ON r_pegawai.r_pegawai__id = r_penempatan.r_pnpt__id_pegawai
                                                            INNER JOIN r_subcabang
                                                              ON r_subcabang.r_subcab__id = r_penempatan.r_pnpt__subcab
                                                            INNER JOIN r_cabang
                                                              ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                                            INNER JOIN r_subdepartement
                                                              ON r_subdepartement.r_subdept__id = r_pnpt__subdept
                                                            INNER JOIN r_departement
                                                              ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept 
                                                           WHERE r_cabang__id= '".$kode_pw_ses."'  ";
                                            

			} else {
						$sql  = "SELECT   r_kpi.r_kpi__id AS r_kpi__id,
                                                    r_kpi.r_kpi__finger AS r_kpi__finger,
                                                    r_kpi.r_kpi__bulan AS r_kpi__bulan,
                                                    r_kpi.r_kpi__tahun AS r_kpi__tahun,
                                                    r_kpi.r_kpi__nilai AS r_kpi__nilai,
                                                    r_kpi.r_kpi__keterangan AS r_kpi__keterangan,
                                                    r_kpi.r_kpi__approval AS r_kpi__approval,
                                                    r_kpi.r_kpi__date_created AS r_kpi__date_created,
                                                    r_kpi.r_kpi__date_updated AS r_kpi__date_updated,
                                                    r_departement.r_dept__akronim AS r_dept__akronim,
                                                    r_departement.r_dept__id AS r_dept__id,
                                                    r_departement.r_dept__ket AS r_dept__ket,
                                                    r_subcabang.r_subcab__nama AS r_subcab__nama,
                                                    r_cabang.r_cabang__nama AS r_cabang__nama,
                                                    r_cabang.r_cabang__id AS r_cabang__id,
                                                    r_pegawai.r_pegawai__id AS r_pegawai__id,
                                                    r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                                                    r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                                                    r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                                                    r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print
                                                    FROM r_kpi
                                                            INNER JOIN r_penempatan
                                                              ON r_penempatan.r_pnpt__finger_print = r_kpi.r_kpi__finger
                                                            INNER JOIN r_pegawai
                                                              ON r_pegawai.r_pegawai__id = r_penempatan.r_pnpt__id_pegawai
                                                            INNER JOIN r_subcabang
                                                              ON r_subcabang.r_subcab__id = r_penempatan.r_pnpt__subcab
                                                            INNER JOIN r_cabang
                                                              ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                                            INNER JOIN r_subdepartement
                                                              ON r_subdepartement.r_subdept__id = r_pnpt__subdept
                                                            INNER JOIN r_departement
                                                              ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept 
                                                           WHERE 1=1 ";	

			}
                                
                                if($kode_perwakilan_cari !=''){
					$sql .= "AND  r_cabang__id= '".$kode_perwakilan_cari."'  ";
				}
				if($nama_karyawan_cari !=''){
					$sql .= "AND r_pegawai__nama LIKE '%".$nama_karyawan_cari."%' "; 
				}
                                if($idfinger_cari !=''){
					$sql .= "AND r_pnpt__finger_print = '".$idfinger_cari."' ";
				}
                                if ($bulan !='') {
					$sql.=" and r_kpi__bulan='$bulan'  ";
                                }
                                if ($tahun !='') {
                                       $sql.=" AND r_kpi__tahun='$tahun' ";
                                }
                                if ($departemen_cari !='') {
                                       $sql.=" AND r_dept__id='$departemen_cari' ";
                                }
                                
			 	$sql .= " ORDER BY r_pegawai__nama,r_kpi__date_updated  DESC ";
				if ($_GET['page']) $start = $p->findStartGet($LIMIT); else $start = $p->findStartPost($LIMIT);
//var_dump($sql) or die();
                                $numresults=$db->Execute($sql);
                                $count = $numresults->RecordCount();
				$pages = $p->findPages($count,$LIMIT); 
				$sql  .= "LIMIT ".$start.", ".$LIMIT;
				$recordSet = $db->Execute($sql);
				$end = $recordSet->RecordCount();
				$initSet = array();
				$data_tb = array();
				$row_class = array();
				$z=0;
				while ($arr=$recordSet->FetchRow()) {
					array_push($data_tb, $arr);
					if ($z%2==0){ 
						$ROW_CLASSNAME="#CCCCCC"; }
					else {
						$ROW_CLASSNAME="#EEEEEE";
					   }
					array_push($row_class, $ROW_CLASSNAME);
					array_push($initSet, $z);
					$z++;
				}
				$count_view = $start+1;
				$count_all  = $start+$end;
				$next_prev = $p->nextPrevCustom($page, $pages, "ORDER=".$ORDER."&".$str_completer); 
}
//---------------------------------CLOSE VIEW INDEX---------------------------------------------------------------------//

  //var_dump($str_completer) or die();
  //var_dump($tgl_masuk) or die();

//---------------     LOOPING       -----------------------------------------///
$smarty->assign ("TABLE_CAPTION", _CAPTION_TABLE_KELURAHAN);
$smarty->assign ("TABLE_NAME", _NAMA_TABLE_KELURAHAN);
$smarty->assign ("FORM_NAME", _FORM);
$smarty->assign ("TITLE", _TITLE_KEL);
$smarty->assign ("HEAD_TITLE", _HEAD_TITLE_KEL);

$smarty->assign ("SUBMIT", _SUBMIT);
$smarty->assign ("RESET", _RESET);
$smarty->assign ("LIST_ME", _LIST_ME);
$smarty->assign ("RECORD_PER_PAGE", _RECORD_PER_PAGE);
$smarty->assign ("ACTION", _ACTION);
$smarty->assign ("EDIT", _EDIT);
$smarty->assign ("DELETE", _DELETE);
$smarty->assign ("SORT_IN", _SORT_IN);
$smarty->assign ("SORT_ORDER", _SORT_ORDER);
$smarty->assign ("SHOWING", _SHOWING);
$smarty->assign ("OF", _OF);
$smarty->assign ("RECORDS", _RECORDS);
$smarty->assign ("LIST", _LIST_KEL);
$smarty->assign ("BTN_NEW", _BTN_NEW);

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
$smarty->assign ("DATA_TB",$data_tb);

$config['date'] = '%I:%M %p';
$config['time'] = '%H:%M:%S';
$smarty->assign('config', $config);
$smarty->assign ("DATA_TB_TGL_MASUK", $tgl_masuk);

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
