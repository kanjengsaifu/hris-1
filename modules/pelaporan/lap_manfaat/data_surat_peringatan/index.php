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
$_SESSION['LANG']       = $LANG;

#FOR IMAGES CLASS PAGER
$HREF_IMAGES = $HREF_THEME.'/'.(base64_decode($_SESSION['THEME']).'/images');

# including Header file for Content Expiring
require_once($DIR_INC.'/header.exp.inc');
# including Header file for Database Configuration
require_once($DIR_INC.'/db.conf.php');
require_once($DIR_ADODB.'/adodb.inc.php');
require_once($DIR_INC.'/class.pager.php');
//require_once($DIR_HOME.'../../../../laporan/inc.kasus_wni.php'); 
require_once($DIR_HOME.'../laporan/inc.sp2.php');  

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
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/pelaporan/lap_kepegawaian/data_surat_peringatan';
 
#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/pelaporan/lap_kepegawaian');
$FILE_JS  = $JS_MODUL.'/data_surat_peringatan';

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

if ($_GET['t_sp__no_cari']) $t_sp__no_cari = $_GET['t_sp__no_cari'];
else if ($_POST['t_sp__no_cari']) $t_sp__no_cari = $_POST['t_sp__no_cari'];
else $t_sp__no_cari="";



if ($_GET['kode_subcab_cari']) $kode_subcab_cari = $_GET['kode_subcab_cari'];
else if ($_POST['kode_subcab_cari']) $kode_subcab_cari = $_POST['kode_subcab_cari'];
else $kode_subcab_cari="";

if ($_GET['departemen_cari']) $departemen_cari = $_GET['departemen_cari'];
else if ($_POST['departemen_cari']) $departemen_cari = $_POST['departemen_cari'];
else $departemen_cari="";

if ($_GET['nama_karyawan_cari']) $nama_karyawan_cari = $_GET['nama_karyawan_cari'];
else if ($_POST['nama_karyawan_cari']) $nama_karyawan_cari = $_POST['nama_karyawan_cari'];
else $nama_karyawan_cari="";


if ($_GET['nip_karyawan_cari']) $nip_karyawan_cari = $_GET['nip_karyawan_cari'];
else if ($_POST['nip_karyawan_cari']) $nip_karyawan_cari = $_POST['nip_karyawan_cari'];
else $nip_karyawan_cari="";

if ($_GET['bulan']) $bulan = $_GET['bulan'];
else if ($_POST['bulan']) $bulan = $_POST['bulan'];
else $bulan="";

if ($_GET['tahun']) $tahun = $_GET['tahun'];
else if ($_POST['tahun']) $tahun = $_POST['tahun'];
else $tahun="";

if ($_GET['search']) $search = $_GET['search'];
else if ($_POST['search']) $search = $_POST['search'];
else $search="";

$smarty->assign ("KODE_CABANG_CARI", $kode_cabang_cari);
$tahun_ses=$_SESSION['SESSION_TAHUN'];
$smarty->assign ("TAHUN_SES", $tahun_ses);


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

$smarty->assign ("TAHUN_SESSION", $tahun_session);
$smarty->assign ("BULAN_SESSION", $bulan_session);
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
//-----------------CLOSE DATA SUBCABANG------------------//

//------------------DATA AJAX SUBCAB---------------------//

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
//---------------------closer ajax subcabang id------------------------------------------------//


/**DATA COMBO KARYAWAN**/

    $sql_cari_karyawan = "SELECT peg.r_cabang__nama,peg.r_dept__ket,peg.r_jabatan__id,peg.r_jabatan__ket,peg.r_pegawai__nama,peg.r_pnpt__nip FROM v_pegawai peg 
where peg.r_cabang__id='$kode_pw_ses'  " ;
        
    $result_cari_karyawan = $db->Execute($sql_cari_karyawan);
        $initSet = array();
        $data_cari_karyawan = array();
        $z=0;
        while ($arr=$result_cari_karyawan->FetchRow()) {
                array_push($data_cari_karyawan, $arr);
                array_push($initSet, $z);
                $z++;
                        }
$smarty->assign ("DATA_CARI_KARYAWAN", $data_cari_karyawan);



if ($_GET[get_combo_karyawan] == 1)
{  
    
	$subcabang = $_GET[no_subcab];   
       
       

			if($subcabang!=''){
					$sql_kabupaten = "SELECT peg.r_cabang__nama,peg.r_dept__ket,peg.r_jabatan__id,peg.r_jabatan__ket,peg.r_pegawai__nama,peg.r_pnpt__nip FROM v_pegawai peg 
                                                          where peg.r_cabang__id='$kode_pw_ses'  AND peg.r_dept__id='$subcabang' ";
                                        //var_dump($sql_kabupaten)or die();
                                        $recordSet_kabupaten = $db->Execute($sql_kabupaten);
					
					$input_kab="<select name='nama_karyawan_cari'>";
					$input_kab.="<option value=''> ";
					$input_kab.="</option> ";
					while(!$recordSet_kabupaten->EOF):
						$input_kab.="<option value=";
						$input_kab.= $recordSet_kabupaten->fields[r_pnpt__nip].">".$recordSet_kabupaten->fields['r_pnpt__nip']."-".$recordSet_kabupaten->fields['r_pegawai__nama'];
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


/**TUTUP COMBO KARYAWAN**/

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

//--------------CLOSE BLN PERIODE AKTIF-----------------------------------//


        
//-----------------view_index-----------------------//
if ($_GET['search'] == '1')
    {
	if (Privi($mod_id, $user_id, 'search') != 'no')
	{
            $sql__="SELECT *,UPPER(r_cabang__nama) AS nm_perwakilan FROM r_cabang WHERE  r_cabang.r_cabang__id='$kode_cabang_cari' ";
            $rs__=$db->Execute($sql__);
            $nm_perwakilan = $rs__->fields['nm_perwakilan'];
            $smarty->assign ("NM_PERWAKILAN", $nm_perwakilan);
            
            $sql_jabatan =  "SELECT `peg`.`r_pnpt__no_mutasi` AS `r_pnpt__no_mutasi`,
                `peg`.`r_pnpt__kon_awal` AS `r_pnpt__kon_awal`,
                `peg`.`r_pnpt__kon_akhir` AS `r_pnpt__kon_akhir`,
                `peg`.`r_jabatan__ket` AS `r_jabatan__ket`,
                `peg`.`r_dept__ket` AS `r_dept__ket`,
                `peg`.`r_subdept__id` AS `r_subdept__id` from v_pegawai peg where peg.r_pnpt__nip ='$nip_karyawan_cari' ";

$recordSet_jabatan = $db->Execute($sql_jabatan);
$initSet = array();
$data_jabatan_history = array();
$z=0;
while ($arr=$recordSet_jabatan->FetchRow()) {
	array_push($data_jabatan_history, $arr);
	array_push($initSet, $z);
	$z++;
}
$smarty->assign ("CV_JABATAN", $data_jabatan_history);
     

//$sql_pendidikan ="SELECT peg.r_pnpt__nip AS r_pnpt__nip, 
//                peg.r_pegawai__pend_akhir AS r_pegawai__pend_akhir,
//                peg.r_pegawai__pend_sekolah  AS r_pegawai__pend_sekolah,
//                peg.r_pegawai__pend_tgl_lulus  AS r_pegawai__pend_tgl_lulus,
//                peg.r_pegawai__pend_jurusan AS r_pegawai__pend_jurusan  
//                from v_pegawai peg where peg.r_pnpt__nip ='$nip_karyawan_cari' ";
////var_dump($sql_pendidikan)or die();
//$recordSet_pendidikan = $db->Execute($sql_pendidikan);
//$initSet = array();
//$data_pendidikan = array();
//$z=0;
//while ($arr=$recordSet_pendidikan->FetchRow()) {
//	array_push($data_pendidikan, $arr);
//	array_push($initSet, $z);
//	$z++;
//}
//$smarty->assign ("CV_PENDIDIKAN", $data_pendidikan);
 
		  if($jenis_user=='2'){
     
                          
                      
                                            $sql  ="SELECT 
                                            A.t_sp__no AS t_sp__no,
                                            A.t_sp__nip AS t_sp__nip,
                                            A.t_sp__tgl AS t_sp__tgl,
                                            A.t_sp__jabatan AS t_sp__jabatan,
                                            A.t_sp__cabang AS t_sp__cabang,
                                            A.t_sp__jenis AS t_sp__jenis,
                                            A.t_sp__alasan AS t_sp__alasan,
                                            peg.r_pnpt__nip AS r_pnpt__nip,
                                            peg.r_pnpt__aktif AS r_pnpt__aktif,
                                            peg.r_jabatan__id AS r_jabatan__id,
                                            peg.r_jabatan__ket AS r_jabatan__ket,
                                            peg.r_subdept__id AS r_subdept__id,
                                            peg.r_subdept__ket AS r_subdept__ket,
                                            peg.r_dept__akronim AS r_dept__akronim,
                                            peg.r_dept__id AS r_dept__id,
                                            peg.r_dept__ket AS r_dept__ket,
                                            peg.r_subcab__nama AS r_subcab__nama,
                                            peg.r_cabang__nama AS r_cabang__nama,
                                            peg.r_cabang__id AS r_cabang__id,
                                            peg.r_subcab__id AS r_subcab__id,
                                            peg.r_subcab__cabang AS r_subcab__cabang,
                                            peg.r_pegawai__id AS r_pegawai__id,
                                            peg.r_pegawai__nama AS r_pegawai__nama
                                            FROM
                                              t_surat_peringatan A
                                              INNER JOIN v_pegawai peg ON peg.r_pnpt__nip=A.t_sp__nip
                                              WHERE r_pnpt__aktif=1 AND r_cabang__id = '".$kode_pw_ses."' ";
                                                
                      

			} else {
					$sql  ="SELECT 
                                            A.t_sp__no AS t_sp__no,
                                            A.t_sp__nip AS t_sp__nip,
                                            A.t_sp__tgl AS t_sp__tgl,
                                            A.t_sp__jabatan AS t_sp__jabatan,
                                            A.t_sp__cabang AS t_sp__cabang,
                                            A.t_sp__jenis AS t_sp__jenis,
                                            A.t_sp__alasan AS t_sp__alasan,
                                            peg.r_pnpt__nip AS r_pnpt__nip,
                                            peg.r_pnpt__aktif AS r_pnpt__aktif,
                                            peg.r_jabatan__id AS r_jabatan__id,
                                            peg.r_jabatan__ket AS r_jabatan__ket,
                                            peg.r_subdept__id AS r_subdept__id,
                                            peg.r_subdept__ket AS r_subdept__ket,
                                            peg.r_dept__akronim AS r_dept__akronim,
                                            peg.r_dept__id AS r_dept__id,
                                            peg.r_dept__ket AS r_dept__ket,
                                            peg.r_subcab__nama AS r_subcab__nama,
                                            peg.r_cabang__nama AS r_cabang__nama,
                                            peg.r_cabang__id AS r_cabang__id,
                                            peg.r_subcab__id AS r_subcab__id,
                                            peg.r_subcab__cabang AS r_subcab__cabang,
                                            peg.r_pegawai__id AS r_pegawai__id,
                                            peg.r_pegawai__nama AS r_pegawai__nama
                                            FROM
                                              t_surat_peringatan A
                                              INNER JOIN v_pegawai peg ON peg.r_pnpt__nip=A.t_sp__nip
                                              WHERE r_pnpt__aktif=1 ";	

			}
 
				//echo "<br><br><br><br><br><br><br><br><br><br>dddddddddkode_perwakilan_cari ===".$kode_perwakilan_cari;

                                             if ($kode_cabang_cari !='') {
						 	$sql.=" and  r_cabang__id =".$kode_cabang_cari."  ";
						 }

						 if ($kode_subcab_cari !='') {
						 	$sql.=" and  r_subcab__id ='$kode_subcab_cari' ";
						 }

						if ($departemen_cari !=''  ) {
						 	$sql.="  and r_dept__id='$departemen_cari' ";
						 }
                                                 
                                                  if ($nip_karyawan_cari !='') {
						 	$sql.="and r_pnpt__nip ='$nip_karyawan_cari'";
						 }
                                                 
                                                  if ($t_sp__no_cari !='') {
						 	$sql.="and t_sp__no ='$t_sp__no_cari'";
						 }
                                                  
                                                 if ($bulan !='') {
                                                        $sql.=" AND MONTH(t_sp__tgl)='$bulan'";
                                                 }

                                                  if ($tahun !='') {
                                                        $sql.=" AND YEAR(t_sp__tgl)='$tahun'";
                                                 }
                                                 

		

			 	 $sql.=" ORDER BY r_pegawai__id ";

			    if ($_GET['page']) $start = $p->findStartGet($LIMIT); else $start = $p->findStartPost($LIMIT);
                              //  var_dump($sql)or die();
				$numresults=$db->Execute($sql);
				$count = $numresults->RecordCount();
				$pages = $p->findPages($count,$LIMIT); 
				$sql  .= "LIMIT ".$start.", ".$LIMIT;
				$recordSet = $db->Execute($sql);
				//print $sql;
				$end = $recordSet->RecordCount();
				$initSet = array();
				$data_tb = array();
				$row_class = array();
				$z=0;
				 $count_no = 1;
				while ($arr=$recordSet->FetchRow()) {
					array_push($data_tb, $arr);
                                        
                                  $jenis_sp=$arr[t_sp__jenis];    
                                   IF( $jenis_sp==1)
                                   {
                                       $jenis_sp='Surat Peringatan 1';
                                   }elseif ($approval==2)
                                    {
                                         $jenis_sp='Surat Peringatan 2';
                                     }
                                   else
                                   {
                                        $jenis_sp='Surat Peringatan 3';
                                   }      
                              
                                        
                                 $label="Nama :". $arr[r_pegawai__nama]; 
                                 
                                 
//                                 $label_bln=$arr[label_bulan];
//                                 $label_tahun=$arr[label_tahun];
                                 
				
					
			   
			   $content_data .= print_content(
                                        $arr[r_pnpt__nip],
                                        $arr[r_pegawai__nama],
                                        $arr[r_cabang__nama],
                                        $arr[r_subcab__nama],
                                        $arr[r_dept__ket],
                                        $arr[r_jabatan__ket],
                                        $arr[t_sp__tgl],
                                        $arr[t_sp__alasan],
                                       $jenis_sp);
                           
                           
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
				$count_all  = $start+$end;
				$next_prev = $p->nextPrevCustom($page, $pages, "ORDER=".$ORDER."&".$str_completer); 
                                
                                 
                                
                          
                                  $smarty->assign ("DATA_TB", $data_tb);
                                  $no = $data_tb[0][t_sp__no];
                                $nip = $data_tb[0][r_pnpt__nip];
                                $r_pegawai__nama = $data_tb[0][r_pegawai__nama];
                                $r_cabang__nama = $data_tb[0][r_cabang__nama];
                                $r_subcab__nama =$data_tb[0][r_subcab__nama];
                                $r_dept__ket= $data_tb[0][r_dept__ket];
                                $t_sp__tgl= $data_tb[0][t_sp__tgl];
                                $t_sp__alasan= $data_tb[0][t_sp__alasan];
//				$file= $DIR_HOME."/files/sp_detail_".$nm_perwakilan."_".$tahun.".xls";
//				$fp=@fopen($file,"w");
//				if(!is_resource($fp))
//				return false;
				//$content = str_replace("@@@@BREAKPAGE@@@@@",$content_break,$content);
				//stream_set_write_buffer($fp, 0);
                             
                               // var_dump($content_data)or die();
				//$content = print_header($nm_perwakilan,$bulan,$tahun,$data_tb);
				//$content .= $content_data;
				
				//$content .= print_footer();
//				fwrite($fp,$content);
//				fclose($fp);
				//$file_2= $HREF_HOME."/files/sp_detail_".$nm_perwakilan."_".$tahun.".xls";
                             //   $file_2= $HREF_HOME."/laporan/inc.sp2.php";
                                $file_2= $HREF_HOME."/laporan/inc.sp3.php?nm_perwakilan=".$nm_perwakilan."&bulan=".$bulan."&tahun=".$tahun."&nip=".$nip."&no=".$no; 
                               
                                
}

}
else
{
				
            $sql__="SELECT *,UPPER(r_cabang__nama) AS nm_perwakilan FROM r_cabang WHERE  r_cabang.r_cabang__id='$kode_cabang_cari' ";
            $rs__=$db->Execute($sql__);
            $nm_perwakilan = $rs__->fields['nm_perwakilan'];
            $smarty->assign ("NM_PERWAKILAN", $nm_perwakilan);
            
			if($jenis_user=='2'){
                            
                           

                                                
                                                $sql = "SELECT 
                                            A.t_sp__no AS t_sp__no,
                                            A.t_sp__nip AS t_sp__nip,
                                            A.t_sp__tgl AS t_sp__tgl,
                                            A.t_sp__jabatan AS t_sp__jabatan,
                                            A.t_sp__cabang AS t_sp__cabang,
                                            A.t_sp__jenis AS t_sp__jenis,
                                            A.t_sp__alasan AS t_sp__alasan,
                                            peg.r_pnpt__nip AS r_pnpt__nip,
                                            peg.r_pnpt__aktif AS r_pnpt__aktif,
                                            peg.r_jabatan__id AS r_jabatan__id,
                                            peg.r_jabatan__ket AS r_jabatan__ket,
                                            peg.r_subdept__id AS r_subdept__id,
                                            peg.r_subdept__ket AS r_subdept__ket,
                                            peg.r_dept__akronim AS r_dept__akronim,
                                            peg.r_dept__id AS r_dept__id,
                                            peg.r_dept__ket AS r_dept__ket,
                                            peg.r_subcab__nama AS r_subcab__nama,
                                            peg.r_cabang__nama AS r_cabang__nama,
                                            peg.r_cabang__id AS r_cabang__id,
                                            peg.r_subcab__id AS r_subcab__id,
                                            peg.r_subcab__cabang AS r_subcab__cabang,
                                            peg.r_pegawai__id AS r_pegawai__id,
                                            peg.r_pegawai__nama AS r_pegawai__nama
                                            FROM
                                              t_surat_peringatan A
                                              INNER JOIN v_pegawai peg ON peg.r_pnpt__nip=A.t_sp__nip
                                              WHERE r_pnpt__aktif=1 AND  r_cabang__id= '".$kode_pw_ses."' ";
                                            

			} else {
						$sql  = " SELECT 
                                            A.t_sp__no AS t_sp__no,
                                            A.t_sp__nip AS t_sp__nip,
                                            A.t_sp__tgl AS t_sp__tgl,
                                            A.t_sp__jabatan AS t_sp__jabatan,
                                            A.t_sp__cabang AS t_sp__cabang,
                                            A.t_sp__jenis AS t_sp__jenis,
                                            A.t_sp__alasan AS t_sp__alasan,
                                            peg.r_pnpt__nip AS r_pnpt__nip,
                                            peg.r_pnpt__aktif AS r_pnpt__aktif,
                                            peg.r_jabatan__id AS r_jabatan__id,
                                            peg.r_jabatan__ket AS r_jabatan__ket,
                                            peg.r_subdept__id AS r_subdept__id,
                                            peg.r_subdept__ket AS r_subdept__ket,
                                            peg.r_dept__akronim AS r_dept__akronim,
                                            peg.r_dept__id AS r_dept__id,
                                            peg.r_dept__ket AS r_dept__ket,
                                            peg.r_subcab__nama AS r_subcab__nama,
                                            peg.r_cabang__nama AS r_cabang__nama,
                                            peg.r_cabang__id AS r_cabang__id,
                                            peg.r_subcab__id AS r_subcab__id,
                                            peg.r_subcab__cabang AS r_subcab__cabang,
                                            peg.r_pegawai__id AS r_pegawai__id,
                                            peg.r_pegawai__nama AS r_pegawai__nama
                                            FROM
                                              t_surat_peringatan A
                                              INNER JOIN v_pegawai peg ON peg.r_pnpt__nip=A.t_sp__nip
                                              WHERE r_pnpt__aktif=1";	

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
                                                  if ($nama_karyawan_cari !='') {
						 	$sql.="and r_pnpt__nip ='$nip_karyawan_cari'  ";
						 }
                                                 
                                                  if ($t_sp__no_cari !='') {
						 	$sql.="and t_sp__no ='$t_sp__no_cari'";
						 }
                                                  if ($bulan !='') {
                                                        $sql.=" AND MONTH(t_sp__tgl)='$bulan'";
                                                 }

                                                  if ($tahun !='') {
                                                        $sql.=" AND YEAR(t_sp__tgl)='$tahun'";
                                                 }
                                                 

		

			 	 $sql.=" ORDER BY r_pegawai__id ";
 
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
                                 $count_no = 1;
				while ($arr=$recordSet->FetchRow()) {
					array_push($data_tb, $arr);
                                        
                                 $label="Nama :". $arr[r_pegawai__nama]; 					
                                 $label_bln=$arr[label_bulan];
                                 $label_tahun=$arr[label_tahun];
				
					
			      $jenis_sp=$arr[t_sp__jenis];    
                                   IF( $jenis_sp==1)
                                   {
                                       $jenis_sp='Surat Peringatan 1';
                                   }elseif ($approval==2)
                                    {
                                         $jenis_sp='Surat Peringatan 2';
                                     }
                                   else
                                   {
                                        $jenis_sp='Surat Peringatan 3';
                                   }  
			   $content_data .= print_content(
                                        $arr[r_pnpt__nip],
                                        $arr[r_pegawai__nama],
                                        $arr[r_cabang__nama],
                                        $arr[r_subcab__nama],
                                        $arr[r_dept__ket],
                                        $arr[r_jabatan__ket],
                                        $arr[t_sp__tgl],
                                        $arr[t_sp__alasan],
                                       $jenis_sp);
                           
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
				$count_all  = $start+$end;
				$next_prev = $p->nextPrevCustom($page, $pages, "ORDER=".$ORDER."&".$str_completer); 
                                
                                
                                $smarty->assign ("DATA_TB", $data_tb);
//				$file= $DIR_HOME."/files/sp_detail_".$nm_perwakilan."_".$tahun.".xls";
//				$fp=@fopen($file,"w");
//				if(!is_resource($fp))
//				return false;
//				//$content = str_replace("@@@@BREAKPAGE@@@@@",$content_break,$content);
//				stream_set_write_buffer($fp, 0);
//				$content = print_header($nm_perwakilan,$bulan,$tahun);
//				$content .= $content_data;
//				
//				$content .= print_footer();
//				fwrite($fp,$content);
//				fclose($fp);
				//$file_2= $HREF_HOME."/files/sp_detail_".$nm_perwakilan."_".$tahun.".xls";
                              //   $file_2= $HREF_HOME."/laporan/inc.sp2.php";
                                
}
//------------------tutup_view_index----------------------------------------------------------------//        
    
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


($_GET['search'] == '1') ? $tampilkan_search_box = 0: $tampilkan_search_box = 1;
$smarty->assign ("SEARCH_BOX", $tampilkan_search_box);
$smarty->assign ("SEARCH_YEAR", $Search_Year);
$smarty->assign ("FILES", $file_2);
$smarty->assign ("COUNT_NO",$count_no);
$smarty->assign ("TB_NO", _NO_URUT);
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