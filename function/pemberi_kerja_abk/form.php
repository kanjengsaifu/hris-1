 <?php
  require_once('../../includes/config.conf.php');
 require_once('../../includes/db.conf.php');
 require_once('../../adodb/adodb.inc.php');
 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_wni'])
{ $kode_wni = $_POST['kode_wni'];
}else{ $kode_wni = $_GET['kode_wni'];}
 
$sql_pw="select upper(nama) as nama,kode_perwakilan  from tbl_wni where kode_wni='$kode_wni'";
$rs_pw	= $db->execute($sql_pw);
$nama=$rs_pw->fields['nama'];
$kode_perwakilan=$rs_pw->fields['kode_perwakilan'];
?>
 
<br><br> 
<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>
<tr><td colspan="5" align="center" class="judul"><strong>DATA PEMBERI KERJA UNTUK <?=$nama?> </strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>

<FORM NAME="frmCreate" METHOD="POST" ACTION="pemberi_kerja_abk/engine.php">
		 <TABLE id="table-add-box">

				<TR>
					<TD>Id</TD>
					<TD> 
					<INPUT TYPE="text" NAME="kode_kerja_tki" value="(OTOMATIS OLEH SISTEM)" size="35" readOnly class="text_disabled">			 
 					 
					</TD>			
				</TR>
  
				<TR>
					<TD>Nama Agensi</TD>
					<TD>

						<select name="kode_agency">
							<option value="">[Pilih Nama Agensi] </option>
 
						 
							 <? 
									$sql_agency = "SELECT  *  FROM tbl_mast_agency_pelayaran  order by nama_agency ";

									$rs_propinsi=$db->Execute($sql_agency);
									while(!$rs_propinsi->EOF):   ?>
									     <option value="<?=$rs_propinsi->fields['kode_agency'];?>"><?=$rs_propinsi->fields['nama_agency'];?></option> 
									 <? 
									$rs_propinsi->MoveNext();
									endwhile;
									?>

 						</select>


					</div>
					 </TD>
				</TR>

				  <TR>
					<TD>Nama Kapal</TD>
					<TD><INPUT TYPE="text" NAME="nama_kapal" size="35"></TD>
				</TR>
  
  
				<TR>
					<TD>Periode Bekerja</TD>
					<TD>
 
							  <input type="text" name="tgl_awal" >
							 <img src="<?=$HREF_THEME?>/defaults/images/icon/calendar.png" onclick="displayCalendar(document.frmCreate.tgl_awal,'yyyy-mm-dd',this)" class="imgLink" align="absmiddle" title="Show Calendar List">  


							  s/d 
  

							 	<input type="text" name="tgl_akhir" >
							 <img src="<?=$HREF_THEME?>/defaults/images/icon/calendar.png" onclick="displayCalendar(document.frmCreate.tgl_akhir,'yyyy-mm-dd',this)" class="imgLink" align="absmiddle" title="Show Calendar List">  
 
					</TD>	
				</TR>
 
				
				 <TR><td height="40"></td>
					<TD>			 
					<INPUT TYPE="hidden" name="kode_wni" value="<?=$kode_wni?>" >	 	
					<INPUT TYPE="hidden" name="kode_perwakilan" value="<?=$kode_perwakilan?>" >	
					<input type="button" value="SIMPAN" name="SIMPAN" onclick="return checkFrm(frmCreate);" > 
					<input type="button" value="BATAL" name="BATAL" onclick="window.location='list_pemberi_kerja_abk2.php?kode_wni=<?=$kode_wni?>';"> 
					</TD>
				</TR>
 
			</TABLE>


		</FORM>