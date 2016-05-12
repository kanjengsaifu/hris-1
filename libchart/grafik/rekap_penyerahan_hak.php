<br> 
 <link href="style.css" type="text/css" rel="stylesheet" />

<?php
 
 require_once('../../includes/db.conf.php');
 require_once('../../adodb/adodb.inc.php');
 
 $db = &ADONewConnection($DB_TYPE);
 // $db->debug = true;
 $db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
 include "../libchart/classes/libchart.php";

if ($_GET['kode_kawasan']) $kode_kawasan = $_GET['kode_kawasan'];
else if ($_POST['kode_kawasan']) $kode_kawasan = $_POST['kode_kawasan'];
else $kode_kawasan="";
 

if ($_GET['bulan']) $bulan = $_GET['bulan'];
else if ($_POST['bulan']) $bulan = $_POST['bulan'];
else $bulan="";

if ($_GET['tahun']) $tahun = $_GET['tahun'];
else if ($_POST['tahun']) $tahun = $_POST['tahun'];
else $tahun="";

if ($bulan==1) { $nama_bulan="JANUARI"; }
if ($bulan==2) { $nama_bulan="FEBRUARI"; }
if ($bulan==3) { $nama_bulan="MARET"; }
if ($bulan==4) { $nama_bulan="APRIL"; }
if ($bulan==5) { $nama_bulan="MEI"; }
if ($bulan==6) { $nama_bulan="JUNI"; }
if ($bulan==7) { $nama_bulan="JULI"; }
if ($bulan==8) { $nama_bulan="AGUSTUS"; }
if ($bulan==9) { $nama_bulan="SEPTEMBER"; }
if ($bulan==10) { $nama_bulan="OKTOBER"; }
if ($bulan==11) { $nama_bulan="NOVEMBER"; }
if ($bulan==12) { $nama_bulan="DESEMBER"; }
?>


 <table width="100%"    border=0 width="100%">	
			 	 
 <tr><td width="100" ><b>PERIODE </b></td><td width="5"> <b>: </b></td><td colspan="2"><b> <?=$nama_bulan?> <?=$tahun?></b> &nbsp;</td></tr>
 </table>
 <br>
 
						<?
						$sql_kawasan = "SELECT a.nama_kawasan,
						(select count(kode_wni) from tbl_kasus_pengaduan 
						INNER JOIN tbl_hak_tki ON tbl_hak_tki.kode_form_pengaduan = tbl_kasus_pengaduan.kode_form_pengaduan
						LEFT JOIN  tbl_mast_perwakilan on  tbl_mast_perwakilan.kode_perwakilan =  tbl_kasus_pengaduan.kode_perwakilan
						LEFT JOIN tbl_mast_negara ON tbl_mast_negara.kode_negara = tbl_mast_perwakilan.kode_negara
						LEFT JOIN tbl_mast_kawasan ON tbl_mast_kawasan.kode_kawasan = tbl_mast_negara.kode_kawasan
						where  tbl_mast_negara.kode_kawasan = a.kode_kawasan and YEAR(tgl_penyerahan)='$tahun' ";
						
						if ($bulan !='') {	
 						 $sql_kawasan .= "and MONTH(tgl_penyerahan)='$bulan' "; 
						}
						
						$sql_kawasan .= "
						) as jumlah FROM tbl_mast_kawasan a ";
						 
  
						$rs = $db->Execute($sql_kawasan);				


	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	while(!$rs->EOF): 		
		$nama_kawasan = $rs->fields['nama_kawasan'];
		$jml_wni = $rs->fields['jumlah'];
			$dataSet->addPoint(new Point($nama_kawasan,$jml_wni)); 
	 $rs->MoveNext();
	 endwhile;

	$chart->setDataSet($dataSet);
	$chart->setTitle("GRAFIK REKAP PENYERAHAN HAK PER KAWASAN   ");
	$chart->render("generated/demo1.png");

?>

 
  <title>GRAFIK REKAP PENYERAHAN HAK</title>
		<img alt="Vertical bars chart" src="generated/demo1.png" style="border: 1px solid gray;"/>
   
</html>
