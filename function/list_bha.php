 <?php
require_once('../includes/db.conf.php');
require_once('../adodb/adodb.inc.php');
require_once('../includes/config.conf.php');
 
 
 
//$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_negara'])
{ $kode_negara = $_POST['kode_negara'];
}else{ $kode_negara = $_GET['kode_negara'];}

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


$sql="select * from tbl_mast_badan_hukum_asing left join tbl_mast_negara on tbl_mast_negara.kode_negara = tbl_mast_badan_hukum_asing.kode_negara  where 1=1  ";
	 

if ($pil !="") {
	
		if ($pil==1) {//nama wna
			$sql.=" and nama_bha LIKE '%".addslashes($cari)."%' ";
		} 
		if ($pil==2) {//kode negara
			$sql .= "AND nama_negara LIKE '%".addslashes($cari)."%' ";
		}
	 

		if ($pil==3) { //alamat Luar negeri
			$sql .= "AND tbl_mast_badan_hukum_asing.alamat = '".addslashes($cari)."' ";
		}
		 

}

$sql .= " order by nama_bha asc ";
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

$sql_pw="select upper(nama_negara) as nama_negara  from tbl_mast_negara where kode_negara='$kode_negara'";
$rs_pw	= $db->execute($sql_pw);
$nama_negara=$rs_pw->fields['nama_negara'];

//echo "PILIHANNNNNNNNNN".$pil;

?>

<link href="style.css" type="text/css" rel="stylesheet" />
<link href="formulir.css" type="text/css" rel="stylesheet" />
<SCRIPT LANGUAGE="JavaScript" SRC="global.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript" SRC="tw-ajax.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="tw-sack.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" SRC="<?=$HREF_THEME?>/defaults/javascripts/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<link rel="stylesheet" href="<?=$HREF_THEME?>/defaults/css/dhtmlgoodies_calendar.css" type="text/css">
 
<div id="ajax_input"> 

<form action="list_bha.php" method="POST" name="frm">

 <TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>

<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR  BADAN HUKUM ASING <?=$nama_negara?> </strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>


<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>
<td width="50">Berdasarkan</td>
<td width="10">:</td>
<td width="30">
<select name='pil' class="text">
<option value=0></option>
<option value='1' <? if ($pil==1) { echo "selected"; } ?>>Nama BHA</option>
 
<option value='2' <? if ($pil==2) { echo "selected"; } ?>>Nama Negara</option>
<option value='4' <? if ($pil==3) { echo "selected"; } ?>>Alamat </option>
 
  
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
 
 <a href="#" OnClick="JavaScript:Ajax('ajax_input','bha/form.php?kode_perwakilan=<?=$kode_perwakilan?>')">
 <img src="disk.png" border="0">&nbsp;Tambah  
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
			<td  align="left" valign="top" class="ewTableHeader">NAMA BADAN HUKUM ASING </td> 
			<td  align="left" valign="top" class="ewTableHeader">NEGARA</td>
			<td  align="left" valign="top" class="ewTableHeader">ALAMAT  </td>
			<td  align="left" valign="top" class="ewTableHeader">TELEPON  </td>
			  
		 
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="7" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	
				   $nama_bha=str_replace("'","",$list_arr_satuan[$i]['nama_bha']);

				?>
                
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_bha'];?>', '<?=$nama_bha;?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>
				
			 
					 <td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['nama_bha']);?> </td>
			 
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['nama_negara'];?></td>
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['alamat'];?></td>
					 <td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['tlp'];?></td>
			 
					 

					 
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

			 
			<INPUT TYPE="hidden" name="kode_negara" value="<?=$kode_negara?>">		 
 


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
</div>
<script>
function GetPengaduan(kode_wna,nama_wna) {
    
    window.opener.document.getElementById('kode_wni').value=kode_wna;
	 window.opener.document.getElementById('nama').value=nama_wna;

    window.close();
    //    alert(KodeDepartemen);
}

function doPaging(hal) {
  frm.action="list_bha.php";
  frm.submit();
}


function submit(){
  frm.action="list_bha.php";
  frm.submit();
}

//CEK FORM
//CEK FORM
//CEK FORM
//CEK FORM
//CEK FORM
//CEK FORM
function checkFrm(theForm){
with (theForm){
	if (kode_bha.value == "") 
		{ 
			alert ("Silahkan isi field kode badan Hukum Asing !"); 
			kode_bha.focus();
			return false; 
		}
	else if (nama_bha.value == "") 
		{ 
			alert ("Silahkan isi field nama badan Hukum Asing!"); 
			nama_bha.focus();
			return false; 
		}
		else if (alamat.value == "") 
		{ 
			alert ("Silahkan isi field alamat !"); 
			alamat.focus();
			return false; 
		}
		else if (tlp.value == "") 
		{ 
			alert ("Silahkan isi field Nomor Telepon !"); 
			tlp.focus();
			return false; 
		}
	else
		{
			submit();
			return true;
			
		}

}
	
	
}
  
// CEK FORM
// CEK FORM
// CEK FORM


  

// CEK FORM
// CEK FORM
// CEK FORM




</script>