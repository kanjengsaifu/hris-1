 <?php
 require_once('../includes/db.conf.php');
 require_once('../adodb/adodb.inc.php');
require_once('../includes/config.conf.php');

 
 
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


// TAMBAHAN UNTUK AJAX WNI */
// TAMBAHAN UNTUK AJAX WNI */
// TAMBAHAN UNTUK AJAX WNI */
// TAMBAHAN UNTUK AJAX WNI */

if ($_GET[get_prop] == 1)
{
	$no_propinsi = $_GET[no_prop];
			if($no_propinsi!=''){	
					$sql_kabupaten = "SELECT id_kabupaten,no_kabupaten,nama_kabupaten FROM tbl_mast_wil_kabupaten WHERE no_propinsi='".$no_propinsi."' ORDER BY id_kabupaten ASC";
					$recordSet_kabupaten = $db->Execute($sql_kabupaten);
					//print $sql_kabupaten;
					$input_kab="<select name=id_kab >";
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

if ($_GET[get_kec] == 1)
{
	$no_propinsi = $_GET[no_prop];
	$no_kabupaten = $_GET[no_kab];
	//$kecamatan_id = $_GET[kecamatan_id];
	//print $no_kabupaten;

			if($no_propinsi!=''){	
					$sql_kecamatan = "SELECT id_kecamatan,no_kecamatan,nama_kecamatan FROM tbl_mast_wil_kecamatan WHERE no_kabupaten='".$no_kabupaten."' AND no_propinsi='".$no_propinsi."' ORDER BY id_kecamatan ASC";
					$recordSet_kecamatan = $db->Execute($sql_kecamatan); 
					//print $sql_kecamatan;
					$input_kec="<select name=no_kecamatan onchange=\"cari_kec2($no_propinsi,$no_kabupaten,this.value)\">";
					$input_kec.="<option value=[Pilih Kecamatan]> ";
					$input_kec.="</option> ";
					while(!$recordSet_kecamatan->EOF): 
						$input_kec.="<option value=";
						$input_kec.= $recordSet_kecamatan->fields['no_kecamatan'].">".$recordSet_kecamatan->fields['nama_kecamatan'];   
						$input_kec.="</option>";
					$recordSet_kecamatan->MoveNext();
					endwhile; 
					$input_kec.="</select> ";
					//
					$delimeter   = "-";
					$option_choice = $input_kec."^/&".$delimeter;	
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
 
// END TAMBAHAN UNTUK AJAX WNI */
// END TAMBAHAN UNTUK AJAX WNI */
// END TAMBAHAN UNTUK AJAX WNI */
// END TAMBAHAN UNTUK AJAX WNI */




$sql="select * , nm_perwakilan , nama_jenis_wni as nama_jenis ,tbl_wni.nama as nama , tbl_wni.alamat as alamat_ind from
						tbl_wni
						inner join  tbl_mast_perwakilan on tbl_mast_perwakilan.kode_perwakilan = tbl_wni.kode_perwakilan
						left join  tbl_mast_agama on tbl_mast_agama.kode_agama  = tbl_wni.kode_agama
						left join   tbl_mast_jenis_wni on tbl_mast_jenis_wni.kode_jenis_wni = tbl_wni.kode_jenis
						left  join tbl_mast_wil_kabupaten on tbl_mast_wil_kabupaten.id_kabupaten = tbl_wni.id_kabupaten where tbl_wni.kode_perwakilan='$kode_perwakilan' ";


if ($pil !="") {
	
		if ($pil==1) {
			$sql.=" and tbl_wni.nama LIKE '%".addslashes($cari)."%' ";
		} 
		if ($pil==2) {
			$sql .= "AND kode_form_pengaduan = '".$cari."' ";
		}
		if ($pil==3) { //ktp

			$sql .= "AND tbl_wni.no_paspor = '".addslashes($cari)."' ";
 
		}

		if ($pil==4) { //paspor
			$sql .= "AND tbl_wni.kode_wni = '".addslashes(trim($cari))."' ";
		}
 
		if ($pil==6) { // tahun
			$sql.=" and nama_kabupaten LIKE '%".addslashes($cari)."%' ";
		}
 

}


$sql.=" order by nama "; 

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
<SCRIPT LANGUAGE="JavaScript" SRC="tw-ajax.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="tw-sack.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" SRC="<?=$HREF_THEME?>/defaults/javascripts/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<link rel="stylesheet" href="<?=$HREF_THEME?>/defaults/css/dhtmlgoodies_calendar.css" type="text/css">


<div id="ajax_input"> 

<form action="list_tki_penampungan.php" method="POST" name="frm">

<TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>

<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR  WNI  UNTUK PERWAKILAN <?=$nm_perwakilan?> </strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>


<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>
<td width="50">Berdasarkan</td>
<td width="10">:</td>
<td width="30">
<select name='pil' class="text">
<option value=0></option>
<option value='1' <? if ($pil==1) { echo "selected"; } ?>>Nama  WNI</option>
<option value='3' <? if ($pil==3) { echo "selected"; } ?>>No KTP</option>
<option value='4' <? if ($pil==4) { echo "selected"; } ?>>No Pasport</option>
 
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
 <a href="#" OnClick="JavaScript:Ajax('ajax_input','penampungan/form.php?kode_perwakilan=<?=$kode_perwakilan?>')">
<img src="disk.png" border="0">&nbsp;Tambah Data
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
			<td  align="left" valign="top" class="ewTableHeader">NAMA WNI/TKI</td>
			<td  align="left" valign="top" class="ewTableHeader">JENIS KELAMIN</td>
			<td  align="left" valign="top" class="ewTableHeader">NO KTP</td>
			<td  align="left" valign="top" class="ewTableHeader">NO PASPORT</td>
			<td  align="left" valign="top" class="ewTableHeader">ALAMAT</td>
			<td  align="left" valign="top" class="ewTableHeader">DAERAH ASAL</td>
			<td  align="left" valign="top" class="ewTableHeader">KATEGORI</td>
 
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="9" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	

				   	 $nama=str_replace("'","",$list_arr_satuan[$i]['nama']);
				$alamat_ind=str_replace("'","",$list_arr_satuan[$i]['alamat_ind']);
				$tlp=str_replace("'","",$list_arr_satuan[$i]['tlp']);
				$alamat_ln=str_replace("'","",$list_arr_satuan[$i]['alamat_ln']);
				$tlp_ln=str_replace("'","",$list_arr_satuan[$i]['tlp_ln']);

				?>
				
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_wni'];?>', '<?=$nama;?>', '<?=$alamat_ind;?>', '<?=$tlp;?>', '<?=$alamat_ln;?>', '<?=$tlp_ln;?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>
				
			 
					 <td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['nama']);?> </td>
					<td align="left" class="tdatacontent"> 
					<? if ($list_arr_satuan[$i]['jk']==1){ echo "Perempuan"; } ?>
					<? if ($list_arr_satuan[$i]['jk']==2){ echo "Laki-Laki"; } ?>			 
					</td>
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['no_paspor'];?></td>
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['kode_wni']);?> </td>
					
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['alamat_ind'];?></td>
					 <td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['nama_kabupaten'];?></td>
					 <td align="left" class="tdatacontent"> 
								<? if ($list_arr_satuan[$i]['kode_sumber']==1 or $list_arr_satuan[$i]['kode_sumber']==2){ echo "WNI NON TKI"; } ?>
								<? if ($list_arr_satuan[$i]['kode_sumber']==3 or $list_arr_satuan[$i]['kode_sumber']==4 or $list_arr_satuan[$i]['kode_sumber']==5 or $list_arr_satuan[$i]['kode_sumber']==6){ echo "TKI"; } ?>
					 
					
					</td>

					 
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
</div>

<script>
function GetPengaduan(kode_wni,nama ) {
    
    window.opener.document.getElementById('kode_wni').value=kode_wni;
	 window.opener.document.getElementById('nama').value=nama;
 
    window.close();
    //    alert(KodeDepartemen);
}



function doPaging(hal) {
  frm.action="list_tki_penampungan.php";
  frm.submit();
}


function submit(){
  frm.action="list_tki_penampungan.php";
  frm.submit();
}

// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX

function cari_kab(prop_id)
{
//alert(prop_id);
if (prop_id != '') {
	http.open('get', 'list_tki_penampungan.php?get_prop=1&no_prop='+prop_id);
	http.onreadystatechange = handlechoice_kab; 
	http.send(null);
	} 
}
function handlechoice_kab(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		 var a = response.split('^/&');
		document.getElementById('ajax_kabupaten').innerHTML = a[0];
		//frmCreate.nama_lengkap.focus();
    }
}
function cari_kec(prop_id,kab_id)
{
//alert(prop_id+'  -- '+kab_id);
if (prop_id != '') {
	http.open('get', 'list_tki_penampungan.php?get_kec=1&no_prop='+prop_id+'&no_kab='+kab_id);
	http.onreadystatechange = handlechoice_kec; 
	http.send(null);
	} 
}
function handlechoice_kec(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		 var a = response.split('^/&');
		document.getElementById('ajax_kecamatan').innerHTML = a[0];
		//frmCreate.nama_lengkap.focus();
    }
}
function cari_kec2(prop_id,kab_id,kec_id)
{
//alert(prop_id+'  -- '+kab_id);
if (prop_id != '') {
	http.open('get', 'list_tki_penampungan.php?get_kec=1&no_prop='+prop_id+'&no_kab='+kab_id+'&no_kec='+kec_id);
	http.onreadystatechange = handlechoice_kec2; 
	http.send(null);
	} 
}

function handlechoice_kec2(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		 var a = response.split('^/&');
		document.getElementById('ajax_kecamatan2').innerHTML = a[0];
		//frmCreate.nama_lengkap.focus();
    }
}

//-->
function cari_jenis(prop_id)
{
//alert(prop_id);
if (prop_id != '') {
	http.open('get', 'list_tki_penampungan.php?get_jenis=1&no_prop='+prop_id);
	http.onreadystatechange = handlechoice_jenis; 
	http.send(null);
	} 
}
function handlechoice_jenis(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		 var a = response.split('^/&');
		document.getElementById('ajax_sektor').innerHTML = a[0];
		document.getElementById('ajax_jenis_wni').innerHTML = a[1];
		//frmCreate.nama_lengkap.focus();
    }
}
function cari_jenis2(prop_id)
{
//alert(prop_id);
if (prop_id != '') {
	http.open('get', 'list_tki_penampungan.php?get_jenis_sektor=1&no_prop='+prop_id);
	http.onreadystatechange = handlechoice_jenis_sektor; 
	http.send(null);
	} 
}
function handlechoice_jenis_sektor(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		 var a = response.split('^/&');
	 
		document.getElementById('ajax_jenis_wni').innerHTML = a[0];
		//frmCreate.nama_lengkap.focus();
    }
}
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX
// JAVA SCRIPT AJAX


//CEK FORM
//CEK FORM
//CEK FORM
function checkFrm(theForm){
with (theForm){
	 if (kode_perwakilan.value == "") 
		{ 
			alert ("Silahkan Pilih Perwakilan !"); 
			kode_perwakilan.focus();
			return false; 
		}
	else if (kode_wni.value == "") 
		{ 
			alert ("Silahkan isi No.Paspor WNI !"); 
			kode_wni.focus();
			return false; 
		}
 
	 else if (nama.value == "") 
		{ 
			alert ("Silahkan isi Nama WNI !"); 
			nama.focus();
			return false; 
		}

	 
 
	else if (jk.value == "") 
		{ 
			alert ("Silahkan Pilih Jenis Kelamin !"); 
			jk.focus();
			return false; 
		}

   else if (kode_klasifikasi_wni.value == "") 
		{ 
			alert ("Silahkan Pilih Jenis Klasifikasi WNI !"); 
			kode_klasifikasi_wni.focus();
			return false; 
		}
	  
   else if (kode_jenis.value == "") 
	 		{ 
			alert ("Silahkan Pilih Jenis WNI !"); 
			kode_jenis.focus();
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
 


</script>