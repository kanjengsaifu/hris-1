 <?php
 require_once('../includes/db.conf.php');
 require_once('../adodb/adodb.inc.php');
 
 
//$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_perwakilan'])
{ $kode_perwakilan = $_POST['kode_perwakilan'];
}else{ $kode_perwakilan = $_GET['kode_perwakilan'];}

 if($_POST['pil'])
{ $pil = $_POST['pil'];
}else{ $pil = $_GET['pil'];}


 if($_POST['cari'])
{ $cari = $_POST['cari'];
}else{ $cari = $_GET['cari'];}

$n_limit=20;
if (empty($_POST['paging']))
{	$hal_ke=1;
}else{
	$hal_ke = $_POST['paging'];
}
$hal_ke_ = $n_limit*($hal_ke-1);


$sql="select  tbl_kasus_pengaduan.*,  tbl_wni.nama as nama_terlapor , nama_majikan , alamat_majikan, tbl_wni.nama ,no_paspor, nama_kasus, nama_pengaduan,
 nm_perwakilan,
 SUBSTRING(tgl_pengaduan,6,2)  as bulan_a ,
 LEFT(tgl_pengaduan,4) as tahun_a , 
 RIGHT(tgl_pengaduan,2) as tanggal_a , nama_kabupaten
 from  tbl_kasus_pengaduan
 inner join  tbl_wni on tbl_wni.kode_wni = tbl_kasus_pengaduan.kode_wni
 left  join tbl_mast_pengaduan on tbl_mast_pengaduan.kode_pengaduan = tbl_kasus_pengaduan.kode_pengaduan
 left join tbl_mast_kasus on tbl_mast_kasus.kode_kasus = tbl_kasus_pengaduan.kode_kasus
 left join tbl_kerja_tki on tbl_kerja_tki.kode_kerja_tki = tbl_kasus_pengaduan.kode_kerja_tki 
 inner join tbl_mast_perwakilan on tbl_mast_perwakilan.kode_perwakilan = tbl_kasus_pengaduan.kode_perwakilan
left  join tbl_mast_wil_kabupaten on tbl_mast_wil_kabupaten.id_kabupaten = tbl_wni.id_kabupaten
where tbl_kasus_pengaduan.kode_perwakilan='$kode_perwakilan' and ( kode_kat_kasus=1 or  kode_kat_kasus=2 or kode_kat_kasus=3  or kode_kat_kasus=4  ) ";


if ($pil !="") {
	
		if ($pil==1) {
			$sql.=" and tbl_wni.nama LIKE '%".$cari."%' ";
		} 
		if ($pil==2) {
			$sql .= "AND kode_form_pengaduan = '".$cari."' ";
		}
		if ($pil==3) { //ktp
			$sql .= "AND tbl_wni.kode_wni = '".$cari."' ";
		}

		if ($pil==4) { //paspor
			$sql .= "AND tbl_wni.no_paspor = '".$cari."' ";
		}

		if ($pil==5) { // tahun
			$sql .= "AND LEFT(tgl_pengaduan,4) = '".$cari."' ";
		}

		if ($pil==6) { // tahun
			$sql.=" and nama_kabupaten LIKE '%".$cari."%' ";
		}




}


$rs_paging	= $db->execute($sql);
$n_rec = $rs_paging->recordCount();
$sql .= "limit $hal_ke_,$n_limit ";
$n_page = ceil($n_rec/$n_limit);  
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

$sql_pw="select upper(nm_perwakilan) as nm_perwakilan  from tbl_mast_perwakilan where kode_perwakilan='$kode_perwakilan'";
$rs_pw	= $db->execute($sql_pw);
$nm_perwakilan=$rs_pw->fields['nm_perwakilan'];

//echo "PILIHANNNNNNNNNN".$pil;

?>

<link href="style.css" type="text/css" rel="stylesheet" />
<link href="formulir.css" type="text/css" rel="stylesheet" />
<SCRIPT LANGUAGE="JavaScript" SRC="global.js"></SCRIPT>


<form action="list_pengaduan.php" method="POST" name="frm">

<TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>

<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR KASUS/PENGADUAN WNI/TKI/ABK/STAF UNTUK PERWAKILAN <?=$nm_perwakilan?> </strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>


<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>
<td width="50">Berdasarkan</td>
<td width="10">:</td>
<td width="30">
<select name='pil' class="text">
<option value=0> </option>
<option value='1' <? if ($pil==1) { echo "selected"; } ?>>Nama TKI/WNI/ABK/STAF</option>
<option value='2' <? if ($pil==2) { echo "selected"; } ?>>Kode Pengaduan/Kasus</option>
<option value='3' <? if ($pil==3) { echo "selected"; } ?>>No KTP</option>
<option value='4' <? if ($pil==4) { echo "selected"; } ?>>No Pasport</option>
<option value='5' <? if ($pil==5) { echo "selected"; } ?>>Tahun</option>
<option value='6' <? if ($pil==6) { echo "selected"; } ?>>Daerah Asal</option>

 </select>

</td>
<td  NOWRAP>&nbsp;Karakter dicari  </td>
<td width="10">:</td>
<td width="100"><input class="text" type="text" name="cari" size="20"  value="<?=$cari?>"  ></td>
<td width="10">&nbsp;</td>
<td width="240" >
<a href="#" onclick="submit();">
<img src="icon_find.gif" border="0">&nbsp;cari
</a>
 

</td>
</tr>
</table>



<br>


		<table width="500">
		<tr>
		<td align="center">
		 
			<table width="500" border="0" cellpadding="0" cellspacing="0">
			<tr><td colspan="10" align="center"><hr width="100%"></td></tr>
			</table>

			<table width="500" border="0" cellpadding="0" cellspacing="0" class="ewTable">
			<tr>
			<td  align="left" valign="top" class="ewTableHeader">KODE PENGADUAN/KASUS</td>
			<td  align="left" valign="top" class="ewTableHeader">KATEGORI KASUS</td>
			<td  align="left" valign="top" class="ewTableHeader">NAMA WNI/TKI</td>
			<td  align="left" valign="top" class="ewTableHeader">NO KTP</td>
			<td  align="left" valign="top" class="ewTableHeader">NO PASPORT</td>
			 <td  align="left" valign="top" class="ewTableHeader">DAERAH ASAL</td>
			<td  align="left" valign="top" class="ewTableHeader">JENIS KASUS</td>
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="6" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	
				?>
                
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_form_pengaduan'];?>', '<?=$list_arr_satuan[$i]['kode_wni'];?>', '<?=$list_arr_satuan[$i]['nama'];?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>
				
			 
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['kode_form_pengaduan'];?></td>
					<td align="left" class="tdatacontent"> 
					<? if ($list_arr_satuan[$i]['kode_kat_kasus']==1){ echo "WNI"; } ?>
					<? if ($list_arr_satuan[$i]['kode_kat_kasus']==2){ echo "TKI"; } ?>
					<? if ($list_arr_satuan[$i]['kode_kat_kasus']==3){ echo "ABK"; } ?>
					<? if ($list_arr_satuan[$i]['kode_kat_kasus']==4){ echo "STAFF"; } ?>
					
					</td>
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['nama']);?> </td>
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['kode_wni']);?> </td>

					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['no_paspor'];?></td>
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['nama_kabupaten'];?></td>
					 <td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['nama_kasus'];?></td>
					 
				</tr>
				<? }?>

		</table>




</TD>
</TR>
</TABLE>

</center>

<table width="100%">
<tr class="text-regular">
 
<td>

			 
			<INPUT TYPE="hidden" name="kode_perwakilan" value="<?=$kode_perwakilan?>">		 
 


			&nbsp;Hal : 
                    <select name="paging" size="1" onChange="doPaging(this.value);">
					   <? for($i=1;$i<=($n_page);$i++) {?>	

						<option value="<?=$i;?>" <? if ($hal_ke == $i)  echo 'SELECTED'?> ><?=$i;?></option>
					   <? }?>
					  </select>
                    &nbsp; &nbsp; 
                    
                    
        
        
        
			</td>
			<td align="right">Jumlah data : <strong> <?=$n_rec;?> records </strong> </td>
			<td align="right"> </td>
</tr>
</table>
</FORM>

<script>
function GetPengaduan(kode_form_pengaduan,kode_wni,nama) {
    window.opener.document.getElementById('kode_form_pengaduan').value=kode_form_pengaduan;
    window.opener.document.getElementById('kode_wni').value=kode_wni;
	    window.opener.document.getElementById('nama').value=nama;

    window.close();
    //    alert(KodeDepartemen);
}
</script>