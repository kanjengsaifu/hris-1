 <?php
 require_once('../includes/db.conf.php');
 require_once('../adodb/adodb.inc.php');
 
 
//$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
 // $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_kawasan'])
{ $kode_kawasan = $_POST['kode_kawasan'];
}else{ $kode_kawasan = $_GET['kode_kawasan'];}
  

   if($_POST['tahun'])
{ $tahun = $_POST['tahun'];
}else{ $tahun = $_GET['tahun'];}

 if($_POST['bulan'])
{ $bulan = $_POST['bulan'];
}else{ $bulan = $_GET['bulan'];}


 if($_POST['kode_kasus'])
{ $kode_kasus = $_POST['kode_kasus'];
}else{ $kode_kasus = $_GET['kode_kasus'];}

if ($_GET['kode_negara']) $kode_negara = $_GET['kode_negara'];
else if ($_POST['kode_negara']) $kode_negara = $_POST['kode_negara'];
else $kode_negara="";

if ($_GET['usia']) $usia = $_GET['usia'];
else if ($_POST['usia']) $usia = $_POST['usia'];
else $usia="";

if ($_GET['jk']) $jk = $_GET['jk'];
else if ($_POST['jk']) $jk = $_POST['jk'];
else $jk="";

 

 if ($_GET['kode_klasifikasi_wni']) $kode_klasifikasi_wni = $_GET['kode_klasifikasi_wni'];
else if ($_POST['kode_klasifikasi_wni']) $kode_klasifikasi_wni = $_POST['kode_klasifikasi_wni'];
else $kode_klasifikasi_wni="";
 

if ($_GET['kode_sektor']) $kode_sektor = $_GET['kode_sektor'];
else if ($_POST['kode_sektor']) $kode_sektor = $_POST['kode_sektor'];
else $kode_sektor="";
 

 if ($_GET['kode_jenis']) $kode_jenis = $_GET['kode_jenis'];
else if ($_POST['kode_jenis']) $kode_jenis = $_POST['kode_jenis'];
else $kode_jenis="";
 
if ($_GET['kode_negara']) $kode_negara = $_GET['kode_negara'];
else if ($_POST['kode_negara']) $kode_negara = $_POST['kode_negara'];
else $kode_negara="";

if ($_GET['usia']) $usia = $_GET['usia'];
else if ($_POST['usia']) $usia = $_POST['usia'];
else $usia="";

if ($_GET['jk']) $jk = $_GET['jk'];
else if ($_POST['jk']) $jk = $_POST['jk'];
else $jk="";

 

 if ($_GET['kode_klasifikasi_wni']) $kode_klasifikasi_wni = $_GET['kode_klasifikasi_wni'];
else if ($_POST['kode_klasifikasi_wni']) $kode_klasifikasi_wni = $_POST['kode_klasifikasi_wni'];
else $kode_klasifikasi_wni="";
 

if ($_GET['kode_sektor']) $kode_sektor = $_GET['kode_sektor'];
else if ($_POST['kode_sektor']) $kode_sektor = $_POST['kode_sektor'];
else $kode_sektor="";
 

 if ($_GET['kode_jenis']) $kode_jenis = $_GET['kode_jenis'];
else if ($_POST['kode_jenis']) $kode_jenis = $_POST['kode_jenis'];
else $kode_jenis="";
 


$sql="select count(kode_kasus) as jml_kasus , nama_kasus from v_kasus_rekap
inner join tbl_wni on v_kasus_rekap.kode_wni = tbl_wni.kode_wni
inner join   tbl_mast_perwakilan on tbl_mast_perwakilan.kode_perwakilan = v_kasus_rekap.kode_perwakilan  
left  join   tbl_mast_negara  on tbl_mast_negara.kode_negara = tbl_mast_perwakilan.kode_negara where tbl_mast_negara.kode_negara='$kode_kawasan'  ";
 
 if ($tahun !='')
 {	
	$sql.=" and thn_pengaduan='$tahun' ";
 }


 if ($bulan !='')
 {	
	$sql.=" and bln_pengaduan='$bulan' ";
 }

 if ($kode_kasus !='')
 {	
	$sql.=" and kode_kasus='$kode_kasus' ";
 }

  if ($tahun !='')
 {	 $sql.=" and thn_pengaduan='$tahun' ";
 }


 if ($bulan !='')
 {	 $sql.=" and bln_pengaduan='$bulan' ";
 }

 if ($kode_kasus !='')
 {	 $sql.=" and kode_kasus='$kode_kasus' ";
 }

  if ($kode_klasifikasi_wni !='') { 
									  $sql.= " AND kode_sumber='$kode_klasifikasi_wni' ";
  						}
							 if ($kode_jenis !='') { 
									 $sql.= " and tbl_wni.kode_jenis='$kode_jenis' ";
							 }
  
							  if ($jk!='') { 
								  $sql.= "  AND jk='$jk' ";
							 }

							
							if ($usia!='') { 
								  if ($usia=='1') { 
									  $sql.= "  AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) >= 0 AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) <= 20  ";
								 }

								 if ($usia=='2') { 
									  $sql.= "  AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) >= 21 AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) <= 40  ";
								 }

								  if ($usia=='3') { 
									  $sql.= "  AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) >= 41 AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) <= 60  ";
								 }


								   if ($usia=='4') { 
									  $sql.= "  AND ( CASE  WHEN  year(tgl_lahir)='' then 0  WHEN  year(tgl_lahir)='1' then 0 WHEN  year(tgl_lahir) IS NULL then 0 else   YEAR(CURDATE())  -  YEAR(tgl_lahir) end ) >=60 ";
								 } 
							}




$sql.=" group by nama_kasus order by nama_kasus " ;
$rs_paging	= $db->execute($sql);
$n_rec = $rs_paging->recordCount();
 
 $rs2	= $db->execute($sql);
$list_arr_satuan = array();
$row_class = array();
$initSet = array();
$z=0;$i=1;$y=2;$n=0;
while($arr=$rs2->FetchRow()){
	array_push($list_arr_satuan, $arr); 
	if ($i%2==0){ 
			$ROW_CLASSNAME="#FFFFFF"; }
		else {
			$ROW_CLASSNAME="#F0F0F0";
	    }
    array_push($row_class, $ROW_CLASSNAME);
	array_push($initSet, $z);
	$z++;$i++;$y++;$n++;
}

$jum = count($list_arr_satuan);

$sql_pw="select upper(nama_negara) as nama_kawasan  from tbl_mast_negara where kode_negara='$kode_kawasan'";
$rs_pw	= $db->execute($sql_pw);
$nama_kawasan=$rs_pw->fields['nama_kawasan'];

//echo "PILIHANNNNNNNNNN".$pil;

?>

<link href="style.css" type="text/css" rel="stylesheet" />
<link href="formulir.css" type="text/css" rel="stylesheet" />
<SCRIPT LANGUAGE="JavaScript" SRC="global.js"></SCRIPT>


<form action="list_wni.php" method="POST" name="frm">

 <TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>

<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR KASUS NEGARA <?=$nama_kawasan?> </strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>
 
		<table width="500">
		<tr>
		<td align="center">
		 
			 

			<table width="500" border="0" cellpadding="0" cellspacing="0" class="ewTable">
			<tr> 
			<td  align="left" valign="top" class="ewTableHeader">NAMA KASUS </td>
			<td  align="left" valign="top" class="ewTableHeader">JUMLAH KASUS </td> 
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="7" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	
				?>
                
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_bha'];?>', '<?=$list_arr_satuan[$i]['nama_bha'];?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>			
			 
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['nama_kasus']);?> </td>
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['jml_kasus']);?> </td>
			 

					 
				</tr>
				<? }?>

		</table>




</TD>
</TR>
</TABLE>

</center>

 </FORM>

 