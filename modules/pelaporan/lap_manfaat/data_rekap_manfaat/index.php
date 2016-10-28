<?php

# Including Main Configuration
# including file for Main Configurations
require_once('../../../../includes/config.conf.php');

# Create a session to store global config path
session_save_path($DIR_SESS);
session_set_cookie_params($expiry);
session_start();

if ((!isset($_SESSION['UID'])) || (empty($_SESSION['UID']))){
	require_once('../../../../includes/header.redirect.inc');
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
//require_once($DIR_HOME.'../../../../laporan/inc.kasus_wni.php'); 
require_once($DIR_HOME.'../laporan/inc.rekap_pinjaman.php');  

$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
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
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/pelaporan/lap_manfaat/data_rekap_manfaat';
 
#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/pelaporan/lap_manfaat');
$FILE_JS  = $JS_MODUL.'/data_rekap_manfaat';

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

if ($_GET['kode_cabang_cari']) $kode_cabang_cari = $_GET['kode_cabang_cari'];
else if ($_POST['kode_cabang_cari']) $kode_cabang_cari = $_POST['kode_cabang_cari'];
else $kode_cabang_cari="";


if ($_GET['kode_subcab_cari']) $kode_subcab_cari = $_GET['kode_subcab_cari'];
else if ($_POST['kode_subcab_cari']) $kode_subcab_cari = $_POST['kode_subcab_cari'];
else $kode_subcab_cari="";



if ($_GET['departemen_cari']) $departemen_cari = $_GET['departemen_cari'];
else if ($_POST['departemen_cari']) $departemen_cari = $_POST['departemen_cari'];
else $departemen_cari="";
$smarty->assign ("DEPARTEMEN_CARI", $departemen_cari);

if ($_GET['bulan']) $bulan = $_GET['bulan'];
else if ($_POST['bulan']) $bulan = $_POST['bulan'];
else $bulan="";

if ($_GET['tahun']) $tahun = $_GET['tahun'];
else if ($_POST['tahun']) $tahun = $_POST['tahun'];
else $tahun="";


if ($_GET['nama_karyawan_cari']) $nama_karyawan_cari = $_GET['nama_karyawan_cari'];
else if ($_POST['nama_karyawan_cari']) $nama_karyawan_cari = $_POST['nama_karyawan_cari'];
else $nama_karyawan_cari="";


if ($_GET['search']) $search = $_GET['search'];
else if ($_POST['search']) $search = $_POST['search'];
else $search="";


if ($_GET['sts_pjm']) $sts_pjm_cari= $_GET['sts_pjm'];
else if ($_POST['sts_pjm']) $sts_pjm_cari = $_POST['sts_pjm'];
else $sts_pjm_cari="";



$smarty->assign ("KODE_CABANG_CARI", $kode_cabang_cari);
$tahun_ses		=	$_SESSION['SESSION_TAHUN'];
$smarty->assign ("TAHUN_SES", $tahun_ses);

//$fields_find_jns_jln_	= $jns_jln!=""?$jns_jln:$jns_jln2;

$Search_Year = $_GET[tahun];
$smarty->assign ("SEARCH", $search);

$str_completer = "mod_id=".$mod_id."&limit=".$LIMIT."&SORT=".$SORT."&search=1&Search_Year=".$Search_Year."&kode_cabang_cari=".$kode_cabang_cari."&nama_karyawan_cari=".$nama_karyawan_cari."&kode_subcab_cari=".$kode_subcab_cari;
$str_completer_ = "limit=".$LIMIT."&SORT=".$SORT."&page=".$page."&search=1&Search_Year=".$Search_Year;

$SES_TAHUN		= $_SESSION['TAHUN'];
$SES_INSTANSI		= $_SESSION['KODE_INSTANSI'];
$SES_JENIS_USER		= $_SESSION['JENIS_USER'];
//var_dump($str_completer)or die();

$jenis_user     = $_SESSION['SESSION_JNS_USER'];
$kode_pw_ses    = $_SESSION['SESSION_KODE_CABANG'];
$tahun_session	= $_SESSION['SESSION_TAHUN'];
$bulan_session	= $_SESSION['SESSION_BULAN'];  

$smarty->assign ("JENIS_USER_SES", $jenis_user);
$smarty->assign ("KODE_PW_SES", $kode_pw_ses);

$smarty->assign ("TAHUN_SES", $tahun_session);
$smarty->assign ("BULAN_SES", $bulan_session);

//-----------DATA STATUS PEGAWAI-----------------------//
$sql_sts = "SELECT * FROM r_status_pegawai";
$result_sts = $db->Execute($sql_sts);
$initSet = array();
$data_sts = array();
$z=0;
while ($arr=$result_sts->FetchRow()) {
	array_push($data_sts, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_STS", $data_sts);
//-----------DATA STATUS PEGAWAI-----------------------//



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
 


//-----------------DATA SUBCABANG--------------------------------------------------------//

    $sql_subcab = "SELECT cab.r_cabang__id,cab.r_cabang__nama,subcab.r_subcab__nama,subcab.r_subcab__id FROM r_cabang cab,r_subcabang subcab
        where cab.r_cabang__id=subcab.r_subcab__cabang and cab.r_cabang__id='$kode_pw_ses'  order by subcab.r_subcab__id " ;
    //var_dump($sql_subcab) or die();
    $result_subcab = $db->Execute($sql_subcab);
        $initSet = array();
        $data_subcab = array();
        $z=0;
        while ($arr=$result_subcab->FetchRow()) {
                array_push($data_subcab, $arr);
                array_push($initSet, $z);
                $z++;
                        }
    
    
$smarty->assign ("DATA_SUBCABANG", $data_subcab);
//-----------------CLOSE DATA SUBCABANG-------------------------------------------------------//

//-----------------------DATA AJAX SUBCAB-----------------------------------------------------//

if ($_GET[get_subcab] == 1)
{  
    
	$subcabang = $_GET[no_subcab];   
       
       

			if($subcabang!=''){
					$sql_kabupaten = "SELECT cab.r_cabang__id ,cab.r_cabang__nama,subcab.r_subcab__nama,subcab.r_subcab__id as subcab FROM r_cabang cab,r_subcabang subcab
                                                          where cab.r_cabang__id=subcab.r_subcab__cabang AND cab.r_cabang__id='$subcabang' ORDER BY cab.r_cabang__nama ASC";
                                        //var_dump($sql_kabupaten)or die();
                                        $recordSet_kabupaten = $db->Execute($sql_kabupaten);
					
					$input_kab="<select name=kode_subcab_cari >";
					$input_kab.="<option value=''> ";
					$input_kab.="</option> ";
					while(!$recordSet_kabupaten->EOF):
						$input_kab.="<option value=";
						$input_kab.= $recordSet_kabupaten->fields[subcab].">".$recordSet_kabupaten->fields['r_subcab__nama'];
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
//-------------------------------------------closer ajax subcabang id-------------------------------------------------------------//


//-----------SHOW DATA CABANG--------------------------//

$sql_cabang = "SELECT * FROM r_cabang";
$result_cabang = $db->Execute($sql_cabang);
$initSet = array();
$data_cabang = array();
$z=0;
while ($arr=$result_cabang->FetchRow()) {
	array_push($data_cabang, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("DATA_CABANG", $data_cabang);
//---------------CLOSE DATA CABANG-------------------------//

//-----------SHOW DATA DEPARTEMEN-----//
$sql_departemen = "SELECT * FROM r_departement";
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
//-----------CLOSE DATA DEPARTEMEN----//



//-----------------BLN PERIODE AKTIF--------------------------------------------------------//
$sql_cek_periode="SELECT r_periode__payroll_id,r_periode__payroll_bulan,r_periode__payroll_tahun,r_periode__payroll_status
                                  FROM r_periode_payroll WHERE r_periode__payroll_status=1 ";
                  
        $rs_val = $db->Execute($sql_cek_periode);
        $periode_bulan= $rs_val->fields['r_periode__payroll_bulan'];
        $periode_tahun= $rs_val->fields['r_periode__payroll_tahun'];

        $smarty->assign ("PERIODE_BULAN",  $periode_bulan);
        $smarty->assign ("PERIODE_TAHUN",  $periode_tahun);


    
//-----------------DATA SUBCABANG--------------------------------------------------------//
    
    $sql_subcab = "SELECT cab.r_cabang__id,cab.r_cabang__nama,subcab.r_subcab__nama,subcab.r_subcab__id FROM r_cabang cab,r_subcabang subcab
        where cab.r_cabang__id=subcab.r_subcab__cabang and cab.r_cabang__id='$kode_pw_ses'  order by subcab.r_subcab__id " ;
    
    $result_subcab = $db->Execute($sql_subcab);
        $initSet = array();
        $data_subcab = array();
        $z=0;
        while ($arr=$result_subcab->FetchRow()) {
                array_push($data_subcab, $arr);
                array_push($initSet, $z);
                $z++;
                        }
$smarty->assign ("DATA_SUBCABANG", $data_subcab);
//-----------------CLOSE DATA SUBCABANG-------------------------//       


if ($_GET['search'] == '1')
{
	if (Privi($mod_id, $user_id, 'search') != 'no')
	{
	$sql__="SELECT *,UPPER(r_cabang__nama) AS nm_perwakilan FROM r_cabang WHERE  r_cabang.r_cabang__id='$kode_cabang_cari' ";
     
        $rs__=$db->Execute($sql__);
        $nm_perwakilan = $rs__->fields['nm_perwakilan'];
        $smarty->assign ("NM_PERWAKILAN", $nm_perwakilan);	
  
              if($jenis_user=='2'){
				           $sql  = "SELECT
                                                    r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                                                    r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                                                    r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print,
                                                    r_jabatan.r_jabatan__id AS r_jabatan__id,
                                                    r_jabatan.r_jabatan__ket AS r_jabatan__ket,
                                                    r_subdepartement.r_subdept__id AS r_subdept__id,
                                                    r_subdepartement.r_subdept__ket AS r_subdept__ket,
                                                    r_departement.r_dept__akronim AS r_dept__akronim,
                                                    r_departement.r_dept__id AS r_dept__id,
                                                    r_departement.r_dept__ket AS r_dept__ket,
                                                    r_subcabang.r_subcab__nama AS r_subcab__nama,
                                                    r_cabang.r_cabang__nama AS r_cabang__nama,
                                                    r_cabang.r_cabang__id AS r_cabang__id,
                                                    r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                                                    r_angsuran.r_ang__id AS r_ang__id,
                                                    r_angsuran.r_ang__jenis AS r_ang__jenis,
                                                    r_angsuran.r_ang__platfond AS r_ang__platfond,
                                                    r_angsuran.r_ang__cicilan AS r_ang__cicilan,
                                                    r_angsuran.r_ang__tenor_bulan AS r_ang__tenor_bulan,
                                                    t_pinjaman.t_pjm__no_pinjaman AS t_pjm__no_pinjaman,
                                                    t_pinjaman.t_pjm__approval AS t_pjm__approval,
                                                    t_angsuran_pinjaman.t_ang__jenis AS t_ang__jenis,
                                                    t_angsuran_pinjaman.t_ang__nopjm AS t_ang__nopjm,
                                                    t_angsuran_pinjaman.t_ang__mutasi AS t_ang__mutasi,
                                                    t_angsuran_pinjaman.t_ang__tanggal AS t_ang__tanggal,
                                                    SUM(t_angsuran_pinjaman.t_ang__nilai_angsuran) AS t_ang__nilai_angsuran,
                                                    COUNT(t_angsuran_pinjaman.t_ang__angsuran_ke) AS t_ang__angsuran_ke
                                                    FROM
                                                    r_pegawai
                                                    INNER JOIN r_penempatan ON r_penempatan.r_pnpt__id_pegawai = r_pegawai.r_pegawai__id
                                                    INNER JOIN r_jabatan ON r_penempatan.r_pnpt__jabatan = r_jabatan.r_jabatan__id
                                                    INNER JOIN r_subdepartement ON r_penempatan.r_pnpt__subdept = r_subdepartement.r_subdept__id
                                                    INNER JOIN r_subcabang ON r_penempatan.r_pnpt__subcab = r_subcabang.r_subcab__id
                                                    INNER JOIN r_departement ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept
                                                    INNER JOIN r_cabang ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                                    INNER JOIN t_pinjaman ON t_pinjaman.t_pjm__mutasi = r_penempatan.r_pnpt__no_mutasi
                                                    INNER JOIN t_angsuran_pinjaman ON t_angsuran_pinjaman.t_ang__mutasi = t_pinjaman.t_pjm__mutasi
                                                    INNER JOIN r_angsuran ON r_angsuran.r_ang__id = t_pinjaman.t_pjm__jenis
                                                    WHERE t_pjm__approval = 1 AND r_cabang__id= '".$kode_pw_ses."' ";
			} else {
					   $sql  = "SELECT
                                                    r_penempatan.r_pnpt__nip AS r_pnpt__nip,
                                                    r_penempatan.r_pnpt__no_mutasi AS r_pnpt__no_mutasi,
                                                    r_penempatan.r_pnpt__finger_print AS r_pnpt__finger_print,
                                                    r_jabatan.r_jabatan__id AS r_jabatan__id,
                                                    r_jabatan.r_jabatan__ket AS r_jabatan__ket,
                                                    r_subdepartement.r_subdept__id AS r_subdept__id,
                                                    r_subdepartement.r_subdept__ket AS r_subdept__ket,
                                                    r_departement.r_dept__akronim AS r_dept__akronim,
                                                    r_departement.r_dept__id AS r_dept__id,
                                                    r_departement.r_dept__ket AS r_dept__ket,
                                                    r_subcabang.r_subcab__nama AS r_subcab__nama,
                                                    r_cabang.r_cabang__nama AS r_cabang__nama,
                                                    r_cabang.r_cabang__id AS r_cabang__id,
                                                    r_pegawai.r_pegawai__nama AS r_pegawai__nama,
                                                    r_angsuran.r_ang__id AS r_ang__id,
                                                    r_angsuran.r_ang__jenis AS r_ang__jenis,
                                                    r_angsuran.r_ang__platfond AS r_ang__platfond,
                                                    r_angsuran.r_ang__cicilan AS r_ang__cicilan,
                                                    r_angsuran.r_ang__tenor_bulan AS r_ang__tenor_bulan,
                                                    t_pinjaman.t_pjm__no_pinjaman AS t_pjm__no_pinjaman,
                                                    t_pinjaman.t_pjm__approval AS t_pjm__approval,
                                                    t_angsuran_pinjaman.t_ang__jenis AS t_ang__jenis,
                                                    t_angsuran_pinjaman.t_ang__nopjm AS t_ang__nopjm,
                                                    t_angsuran_pinjaman.t_ang__mutasi AS t_ang__mutasi,
                                                    t_angsuran_pinjaman.t_ang__tanggal AS t_ang__tanggal,
                                                    SUM(t_angsuran_pinjaman.t_ang__nilai_angsuran) AS t_ang__nilai_angsuran,
                                                    COUNT(t_angsuran_pinjaman.t_ang__angsuran_ke) AS t_ang__angsuran_ke
                                                    FROM
                                                    r_pegawai
                                                    INNER JOIN r_penempatan ON r_penempatan.r_pnpt__id_pegawai = r_pegawai.r_pegawai__id
                                                    INNER JOIN r_jabatan ON r_penempatan.r_pnpt__jabatan = r_jabatan.r_jabatan__id
                                                    INNER JOIN r_subdepartement ON r_penempatan.r_pnpt__subdept = r_subdepartement.r_subdept__id
                                                    INNER JOIN r_subcabang ON r_penempatan.r_pnpt__subcab = r_subcabang.r_subcab__id
                                                    INNER JOIN r_departement ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept
                                                    INNER JOIN r_cabang ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                                    INNER JOIN t_pinjaman ON t_pinjaman.t_pjm__mutasi = r_penempatan.r_pnpt__no_mutasi
                                                    INNER JOIN t_angsuran_pinjaman ON t_angsuran_pinjaman.t_ang__mutasi = t_pinjaman.t_pjm__mutasi
                                                    INNER JOIN r_angsuran ON r_angsuran.r_ang__id = t_pinjaman.t_pjm__jenis
                                                    WHERE 1=1 ";	

			}
                        
                                                if ($kode_cabang_cari !='') {
                                                             $sql.=" and  r_cabang__id =".$kode_cabang_cari."  ";
                                                      }

						 if ($kode_subcab_cari !='') {
						 	$sql.=" and  r_subcab__id ='$kode_subcab_cari' ";
						 }

						if ($departemen_cari !=''  ) {
						 	$sql.="  and r_dept__id='$departemen_cari' ";
						 } 
                                                 if ($bulan !=''  ) {
                                                   $sql.="  and MONTH(r_pnpt__kon_akhir)='$bulan' ";
                                                     } 
                                                if ($tahun !=''  ) {
                                                               $sql.="  and YEAR(r_pnpt__kon_akhir)='$tahun' ";
                                                        } 
						if ($nama_karyawan_cari !='') {
						 	$sql.="and r_pegawai__nama LIKE '%".$nama_karyawan_cari."%'  ";
						 }
                                                  if ($sts_pjm_cari !='') {
						 	$sql.="and t_pjm__approval = '".$sts_pjm_cari."'  ";
						 }
						    $sql.=" GROUP BY t_pjm__no_pinjaman order by r_pegawai__nama asc ";
                                          //   var_dump($sql)or die();
							$numresults=$db->Execute($sql);
							$count = $numresults->RecordCount();
							$recordSet = $db->Execute($sql);
							$end = $recordSet->RecordCount();
							$initSet = array();
							$data_tb = array();
							$row_class = array();
							$z=0;
                                                         $count_no = 1;
							while ($arr=$recordSet->FetchRow()) {
								array_push($data_tb, $arr);
								
						
                                                        $label="Nama :". $arr[r_pegawai__nama]; 					
                                                        $status_pjm= $arr[t_pjm__approval];
                                                        IF($status_pjm=='1')
                                                        {
                                                         $label_sts='Belum Lunas';   
                                                        }  else {
                                                         $label_sts='Lunas';   
                                                        }
                                                   


                                                               $labeltgl=$arr[tanggal_tl]." ".$nama_bulan." ".$arr[tahun_tl];

                                                $content_data .= print_content(
                                                        $count_no,
                                                        $arr[r_pnpt__nip],
                                                        $arr[r_pegawai__nama],
                                                        $arr[r_cabang__nama],
                                                        $arr[t_pjm__no_pinjaman],
                                                        number_format($arr[r_ang__platfond],2,',','.'),
                                                        $arr[r_ang__tenor_bulan],//tenor
                                                        number_format($arr[t_ang__nilai_angsuran],2,',','.'),//total bayar
                                                        $arr[t_ang__angsuran_ke], //total cicilan
                                                        number_format($arr[r_ang__cicilan],2,',','.'),
                                                        $label_sts);	

                                                        if ($z%2==0){ 
                                                        $ROW_CLASSNAME="#CCCCCC"; }
                                                        else {
                                                        $ROW_CLASSNAME="#EEEEEE";
                                                        }
                                                            array_push($row_class, $ROW_CLASSNAME);
                                                            array_push($initSet, $z);
                                                            $z++;	
                                                            $count_no=$count_no+1;  
                                                        } 
                                                                   
                                                        $count_view = $start+1;
                                                              
                                                $smarty->assign ("DATA_TB", $data_tb);
                            
                            
                            
                            
                            //total karyawan
                            $sql_total="SELECT COUNT(t_pjm__mutasi) as total_orang
                                        FROM r_pegawai
                                        INNER JOIN r_penempatan ON r_penempatan.r_pnpt__id_pegawai = r_pegawai.r_pegawai__id
                                        INNER JOIN r_jabatan ON r_penempatan.r_pnpt__jabatan = r_jabatan.r_jabatan__id
                                        INNER JOIN r_subdepartement ON r_penempatan.r_pnpt__subdept = r_subdepartement.r_subdept__id
                                        INNER JOIN r_subcabang ON r_penempatan.r_pnpt__subcab = r_subcabang.r_subcab__id
                                        INNER JOIN r_departement ON r_departement.r_dept__id = r_subdepartement.r_subdept__dept
                                        INNER JOIN r_cabang ON r_cabang.r_cabang__id = r_subcabang.r_subcab__cabang
                                        INNER JOIN t_pinjaman ON t_pinjaman.t_pjm__mutasi = r_penempatan.r_pnpt__no_mutasi
                                        where 1=1 ";
                            
                                                if ($kode_cabang_cari !='') {
                                                            $sql_total.=" and  r_cabang__id =".$kode_cabang_cari."  ";
                                                    }

                                                if ($kode_subcab_cari !='') {
                                                           $sql_total.=" and  r_subcab__id ='$kode_subcab_cari' ";
                                                    }

                                                if ($departemen_cari !=''  ) {
                                                           $sql_total.="  and r_dept__id='$departemen_cari' ";
                                                    }
                                                if ($nama_karyawan_cari !='') {
                                                            $sql_total.="and r_pegawai__nama LIKE '%".$nama_karyawan_cari."%'  ";
						 }
                                                  if ($sts_pjm_cari !='') {
                                                            $sql_total.="and t_pjm__approval = '".$sts_pjm_cari."'  ";
						 }
                              
                                                 
                                                 
                           // var_dump($sql_total) or die();          
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

					$label="JML KARYAWAN : ".$arr4[total_orang];
					$content_data .= print_content("","","","","","","","","","",$label);
				}

                                $smarty->assign ("DATA_TB4", $data_tb4);          
                               //TUTUP TOTAL 
				$file= $DIR_HOME."/files/rekappjm_".$nm_perwakilan."_".$tahun.".xls";
				$fp=@fopen($file,"w");
				if(!is_resource($fp))
				return false;
				//$content = str_replace("@@@@BREAKPAGE@@@@@",$content_break,$content);
				stream_set_write_buffer($fp, 0);
				
				$content = print_header($nm_perwakilan,$tahun);
				$content .= $content_data;
				$content .= print_footer();
				fwrite($fp,$content);
				fclose($fp);
				$file_2= $HREF_HOME."/files/rekappjm_".$nm_perwakilan."_".$tahun.".xls";	

               

        }
}
//else 
//{
//    
//    $sql__="SELECT *,UPPER(r_cabang__nama) AS nm_perwakilan FROM r_cabang WHERE  r_cabang.r_cabang__id='$kode_cabang_cari' ";
//     
//        $rs__=$db->Execute($sql__);
//        $nm_perwakilan = $rs__->fields['nm_perwakilan'];
//        $smarty->assign ("NM_PERWAKILAN", $nm_perwakilan);
//	
//        if($jenis_user=='2')    {
//					$sql = "SELECT * from v_pegawai peg WHERE 1 = 1  AND peg.r_cabang__id='$kode_pw_ses'";
//                		}
//                
//                else
//                {
//                    
//                    $sql  =  "SELECT * FROM v_pegawai peg where 1=1 ";
//                }
//                
//                
//						 if ($kode_cabang_cari !='') {
//						 	$sql.="and  peg.r_cabang__id =".$kode_cabang_cari."  ";
//						 }
//
//						 if ($kode_subcab_cari !='') {
//						 	$sql.=" and  peg.r_subcab__id ='$kode_subcab_cari' ";
//						 }
//
//						if ($departemen_cari !=''  ) {
//						 	$sql.="  and peg.r_dept__id='$departemen_cari' ";
//						 } 
//
//						  if ($nama_karyawan_cari !='') {
//						 	$sql.="and peg.r_pegawai__nama LIKE '%".$nama_karyawan_cari."%'  ";
//						 }
//
// 
//						    $sql.=" order by peg.r_pegawai__nama asc ";
//                                                 
//							$numresults=$db->Execute($sql);
//							$count = $numresults->RecordCount();
//							$recordSet = $db->Execute($sql);
//							$end = $recordSet->RecordCount();
//							$initSet = array();
//							$data_tb = array();
//							$row_class = array();
//							$z=0;
//                                                         $count_no = 1;
//							while ($arr=$recordSet->FetchRow()) {
//								array_push($data_tb, $arr);
//								
//						
//                    $label="Nama :". $arr[r_pegawai__nama];
//                    $labeltgl=$arr[tanggal_tl]." ".$nama_bulan." ".$arr[tahun_tl];
//					
//			   $content_data .= print_content(
//                                   $count_no,
//                                   $arr[r_pnpt__nip],
//                                   $arr[r_pnpt__finger_print],
//                                   $arr[r_pegawai__nama],
//                                   $arr[r_cabang__nama],
//                                   $arr[r_subcab__nama],
//                                   $arr[r_dept__ket],
//                                   $arr[r_jabatan__ket],
//                                   $arr[r_level__ket],
//                                   $arr[r_stp__nama],
//                                   $arr[r_pnpt__kon_awal],
//                                   $arr[r_pnpt__kon_akhir]);	
//							
//								if ($z%2==0){ 
//									$ROW_CLASSNAME="#CCCCCC"; }
//								else {
//									$ROW_CLASSNAME="#EEEEEE";
//								   }
//								array_push($row_class, $ROW_CLASSNAME);
//								array_push($initSet, $z);
//								$z++;	
//                                                               $count_no=$count_no+1;  
//                                                                } 
//                                                                   
//                                                                    $count_view = $start+1;
//                                                              
//			    $smarty->assign ("DATA_TB", $data_tb);
//                            
//                            
//                            
//                            
//                            //total karyawan
//                          $sql_total="SELECT COUNT(*) as total_orang FROM v_pegawai where 1=1 ";
//                             if ($kode_cabang_cari !='') {
//                                       $sql_total.=" and  r_cabang__id =".$kode_cabang_cari."  ";
//                                }
//
//                                if ($kode_subcab_cari !='') {
//                                       $sql_total.=" and  r_subcab__id ='$kode_subcab_cari' ";
//                                }
//
//                               if ($departemen_cari !=''  ) {
//                                       $sql_total.="  and r_dept__id='$departemen_cari' ";
//                                } 
//                               if ($nama_karyawan_cari !='') {
//                                        $sql_total.="and r_pegawai__nama LIKE '%".$nama_karyawan_cari."%'  ";
//						 }
//
//
//                                //      var_dump($sql_total)or die();
//                                $numresults4=$db->Execute($sql_total);
//				$count4 = $numresults4->RecordCount();
// 				$recordSet4 = $db->Execute($sql_total);
//				$end4 = $recordSet4->RecordCount();
//				$initSet4 = array();
//				$data_tb4 = array();
//				$row_class4 = array();
//				$z=0;
//				while ($arr4=$recordSet4->FetchRow()) {
//					array_push($data_tb4, $arr4);
//					if ($z%2==0){
//						$ROW_CLASSNAME="#CCCCCC"; }
//					else {
//						$ROW_CLASSNAME="#EEEEEE";
//					   }
//                                array_push($row_class4, $ROW_CLASSNAME2);
//				array_push($initSet4, $z);
//					$z++;
//
//					$label="JML KARYAWAN : ".$arr4[total_orang];
//					$content_data .= print_content("","","","","","","","","","","",$label);
//				}
//
//                                $smarty->assign ("DATA_TB4", $data_tb4);          
//                               //TUTUP TOTAL 
//				$file= $DIR_HOME."/files/laporan_pegawai_".$nm_perwakilan."_".$tahun.".xls";
//				$fp=@fopen($file,"w");
//				if(!is_resource($fp))
//				return false;
//				//$content = str_replace("@@@@BREAKPAGE@@@@@",$content_break,$content);
//				stream_set_write_buffer($fp, 0);
//				
//				$content = print_header($nm_perwakilan,$tahun);
//				$content .= $content_data;
//				$content .= print_footer();
//				fwrite($fp,$content);
//				fclose($fp);
//				$file_2= $HREF_HOME."/files/laporan_pegawai_".$nm_perwakilan."_".$tahun.".xls";	
//
//               
//
//        }

        
        
        
        
        
        
                                        



($_GET['search'] == '1') ? $tampilkan_search_box = 0: $tampilkan_search_box = 1;
$smarty->assign ("SEARCH_BOX", $tampilkan_search_box);
$smarty->assign ("SEARCH_YEAR", $Search_Year);
$smarty->assign ("NO_URUT", $count_no); 
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