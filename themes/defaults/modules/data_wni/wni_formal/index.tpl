<HTML>
<HEAD>
<!-- #BeginEditable "TITLE" -->
<title><!--{$TITLE}--></title>

<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/preload.css" type="text/css">
<script language="JavaScript" type="text/javascript">

n=document.layers
ie=document.all

//Hides the layer onload
function hideIt(){
	if(ie || n){
		if(n) document.divLoadCont.display="none"
		else divLoadCont.style.display="none"
	} else {
		document.getElementById('divLoadCont').style.display='none';
	}
}

</script>
<div id="divLoadCont">
	<table width="100%" height="95%" align="center" valign="middle">
		<tr><td width="100%" height="100%" align="center" valign="middle">
			<img src="<!--{$HREF_IMG_PATH}-->/ajax-lob.gif" align="absmiddle"> Sedang Memuat....
		</td></tr>
	</table>
</div>

<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/default.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/global.js"></SCRIPT>
<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/dhtmlgoodies_calendar.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/tw-ajax.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/tw-sack.js"></SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- #EndEditable -->

</HEAD>

<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">

<div id="add-search-box">
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;" <!--{if $OPT==1}--> DISABLED <!--{/if}-->><span><img src="<!--{$HREF_IMG_PATH}-->/icon/details.gif" align="absmiddle"> <!--{$BTN_NEW}--></span></a>
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Pencarian Data</span></a>
</div>
		
		<DIV ID="_menuEntry1_1" style="top:10px;width:100%;display:none;position:absolute;">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> Data TKI Formal</td></tr> 
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> Form Tambah/Ubah Data</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
		<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php">
		<TABLE id="table-add-box">

				<TR>
					<TD>Id</TD>
					<TD><!--{if $EDIT_VAL==0}-->
					<INPUT TYPE="text" NAME="id" value="(OTOMATIS OLEH SISTEM)" size="35" readOnly class="text_disabled">
				 
					<!--{else}-->
					<INPUT TYPE="text" NAME="id" value="<!--{$EDIT_ID}-->" size="35" readOnly class="text_disabled">
					<!--{/if}-->
					</TD>			
				</TR>

				 

				<TR>
					<TD>Perwakilan <font color="#ff0000">*</font></TD>
					<TD>
					 


					<!--{if ($JENIS_USER_SES==1)}-->

								<select name="kode_perwakilan" > 
								<option value=""> Pilih Perwakilan </option>
								<!--{section name=x loop=$DATA_PWK}-->

								<!--{if ($OPT==1)}-->

									<!--{if trim($DATA_PWK[x].kode_perwakilan) == $EDIT_KODE_PERWAKILAN}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{/if}-->

								<!--{else}-->

									<!--{if  ($DATA_PWK[x].kode_perwakilan) == $KODE_PW_SES}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{/if}-->
								<!--{/if}-->

								<!--{/section}-->
								</SELECT>	

						<!--{else}-->
 
								<select name="kode_perwakilan" > 
						<option value=""> Pilih Perwakilan </option>
								<!--{section name=x loop=$DATA_PWK}-->

								<!--{if ($OPT==1)}-->

									<!--{if trim($DATA_PWK[x].kode_perwakilan) == $EDIT_KODE_PERWAKILAN}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  disabled> <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{/if}-->

								<!--{else}-->

									<!--{if  trim($DATA_PWK[x].kode_perwakilan) == trim($KODE_PW_SES)}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  disabled> <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{/if}-->

								<!--{/if}-->

								<!--{/section}-->
								</SELECT>

						<!--{/if}-->


					</TD>
				</TR>
 

				<TR>
					<TD>No.KTP</TD>
					<TD><INPUT TYPE="text" NAME="no_paspor" value="<!--{$EDIT_NO_PASPOR}-->" size="35"></TD>
				</TR>

				<TR>
					<TD>No.Paspor <font color="#ff0000">*</font></TD>
					<TD><div id="ajax_cek_id"><INPUT TYPE="text" NAME="kode_wni" value="<!--{$EDIT_KODE_WNI}-->" size="35" OnChange="JavaScript:Ajax('ajax_cek_id','<!--{$HREF_HOME_PATH_AJAX}-->/cek.php?kode_wni='+frmCreate.kode_wni.value+'&id='+frmCreate.id.value)"> 					
					</div>
					
					
					</TD>
				</TR>
 
	
				<TR>
					<TD>Nama WNI <font color="#ff0000">*</font></TD>
					<TD><INPUT TYPE="text" NAME="nama" value="<!--{$EDIT_NAMA}-->" size="35"></TD>
				</TR>

			<TR>
					<TD>Agama</TD>
					<TD>
						<select name="kode_agama"  > 
						<option value=""> Pilih Agama </option>
						<!--{section name=x loop=$DATA_AGAMA}-->
						<!--{if trim($DATA_AGAMA[x].kode_agama) == $EDIT_KODE_AGAMA}-->
						<option value="<!--{$DATA_AGAMA[x].kode_agama}-->" selected > <!--{$DATA_AGAMA[x].nama_agama}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_AGAMA[x].kode_agama}-->"  > <!--{$DATA_AGAMA[x].nama_agama}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>				
					</TD>	
				</TR>
				<TR>
					<TD>Tempat Lahir</TD>
					<TD><INPUT TYPE="text" NAME="tempat_lahir" value="<!--{$EDIT_TEMPAT_LAHIR}-->" size="35"></TD>
				</TR>
				<TR>
					<TD>Tanggal Lahir</TD>
					<TD>
					<!--{if $EDIT_VAL==0}-->

							 <input type="text" name="tanggal" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{else}-->
								 <input type="text" name="tanggal" value="<!--{$EDIT_TGL_LAHIR}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{/if}-->
					</TD>	
				</TR>

				<TR>
					<TD>Jenis Kelamin <font color="#ff0000">*</font></TD>
					<TD>
					
						<select name="jk"  > 
						<option value="">[Pilih Jenis Kelamin]</option>						 
						<option value="1"   <!--{if  ($EDIT_JK  == 1)}--> selected <!--{/if}--> > Perempuan </option>
						<option value="2"   <!--{if  ($EDIT_JK  == 2)}--> selected <!--{/if}--> > Laki-Laki </option>						 
						</select>										
					 </TD>
				</TR>	

					<TR>
					<TD colspan="2"><u>Daerah Asal</u></TD>
				</TR>
 
				<TR>
					<TD>Propinsi</TD>
					<TD>
						<select name="no_propinsi" onchange="cari_kab(this.value);"> 
						<option value=""> Pilih Provinsi </option>
						<!--{section name=x loop=$DATA_PROPINSI}-->
						<!--{if trim($DATA_PROPINSI[x].no_propinsi) == $EDIT_NO_PROP}-->
						<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>				
					</TD>	
				</TR>
				<TR>
					<TD>Kabupaten</TD>
					<TD>
					<div id="ajax_kabupaten">
					<select name="id_kab" > 
						<option value="">[Pilih Kabupaten]</option>
						<!--{section name=x loop=$DATA_KABUPATEN}-->
						<!--{if trim($DATA_KABUPATEN[x].id_kabupaten) == $EDIT_ID_KAB}-->
						<option value="<!--{$DATA_KABUPATEN[x].id_kabupaten}-->" selected > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_KABUPATEN[x].id_kabupaten}-->"  > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>										
					</div></TD>
				</TR>	
				 	

				<TR>
					<TD>Alamat di Dalam Negeri</TD>
					<TD><INPUT TYPE="text" NAME="alamat" value="<!--{$EDIT_ALAMAT}-->" size="35"></TD>
				</TR>	

			<TR>
					<TD>No.Telp di Dalam Negeri</TD>
					<TD><INPUT TYPE="text" NAME="tlp" value="<!--{$EDIT_TLP}-->" size="35"></TD>
				</TR>	
				<TR>
					<TD>Alamat di Luar Negeri</TD>
					<TD><INPUT TYPE="text" NAME="alamat_ln" value="<!--{$EDIT_ALAMAT_LN}-->" size="35"></TD>
				</TR>	

			<TR>
					<TD>No.Telp di Luar Negeri</TD>
					<TD><INPUT TYPE="text" NAME="tlp_ln" value="<!--{$EDIT_TLP_LN}-->" size="35"></TD>
				</TR>	
 <TR>
					<TD>Lama Tinggal di Luar Negeri</TD>
					<TD><INPUT TYPE="text" NAME="lama_tinggal" value="<!--{$EDIT_LAMA_TINGGAL}-->" size="35"></TD>
				</TR>	
				 	

			 <TR>
					<TD>Sektor Pekerjaan</TD>
					<TD>
				 
						<select name="kode_sektor"  onchange="cari_jenis(this.value);" > 
						<option value="">[Pilih Sektor Pekerjaan]</option>
						<!--{section name=x loop=$DATA_SEKTOR}-->
						<!--{if trim($DATA_SEKTOR[x].kode_sektor) == $EDIT_KODE_SEKTOR}-->
						<option value="<!--{$DATA_SEKTOR[x].kode_sektor}-->" selected > <!--{$DATA_SEKTOR[x].nama_sektor}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_SEKTOR[x].kode_sektor}-->"  > <!--{$DATA_SEKTOR[x].nama_sektor}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>										
				 </TD>
				</TR>	

				<TR>
					<TD>Jenis Formal <font color="#ff0000">*</font></TD>
					<TD>
				 <div id="ajax_jenis">
					<select name="kode_jenis_wni" > 
						<option value="">[Pilih Jenis Formal]</option>
						<!--{section name=x loop=$DATA_JNS_WNI}-->
						<!--{if trim($DATA_JNS_WNI[x].kode_jenis_formal) == $EDIT_KODE_JENIS}-->
						<option value="<!--{$DATA_JNS_WNI[x].kode_jenis_formal}-->" selected > <!--{$DATA_JNS_WNI[x].nama_formal}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_JNS_WNI[x].kode_jenis_formal}-->"  > <!--{$DATA_JNS_WNI[x].nama_formal}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>	
					</div>

				 </TD>
				</TR>	

				<TR><td height="40"></td>
					<TD>
					 
				 
					<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
					<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
					<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
					<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
					<INPUT TYPE="hidden" name="op" value="0">
					<a class="button" href="#" onclick="this.blur();return checkFrm(frmCreate);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$SUBMIT}--></span></a>
					<a class="button" href="#" onclick="this.blur();document.frmCreate.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$RESET}--></span></a>					
					</TD>
				</TR>
				
				
					<TR><td  colspan="2"> <font color="#ff0000"> Keterangan * Wajib Diisi</font></td>
					 
					</tr>
					
			</TABLE>
		</FORM>
		</td></tr>
		</table>
		</DIV>	
		
	<DIV ID="_menuEntry2_1" style="top:10px;width:100%;position:absolute;">
	<TABLE WIDTH="100%" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="2">
		<!--DIVIDER HERE-->
		<TR>
			<TD>
		<DIV ID="_menuEdit_1">

		<div id="panel-box">
		<div id="title-box2">Pencarian Data</div>
		<div id="title-box-close"><img src="<!--{$HREF_IMG_PATH}-->/icon/close.gif" onClick="document.getElementById('_menuEdit_1').style.display='none';" align="absmiddle" class="imgLink" title="Close"></div>
		<div id="panel-content">
		
		<FORM METHOD=GET ACTION="" NAME="frmList1">
		<TABLE id="table-search-box">							
				<!--{if ($JENIS_USER_SES=='1')}-->
							<TR>
								<TD>Perwakilan</TD>
								<TD><select name="kode_perwakilan_cari" > 
									<option value=""> Pilih Perwakilan </option>
									<!--{section name=x loop=$DATA_PWK}-->
									<!--{if trim($DATA_PWK[x].kode_perwakilan) == $EDIT_KODE_PERWAKILAN}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{/if}-->
									<!--{/section}-->
									</select>		</TD>
							</TR>
					<!--{/if}-->		
							
							<TR>
								<TD>No. Paspor WNI</TD>
								<TD><INPUT TYPE="text" NAME="no_paspor_cari" size="30"></TD>
							</TR>
							<TR>
								<TD>Nama WNI </TD>
								<TD><INPUT TYPE="text" NAME="nama_wni_cari" size="30"></TD>
							</TR>
							 
			<TR><TD></TD>
				<TD>
				<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
				<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
				<INPUT TYPE="hidden" name="search" value="1">
				<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
				<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
				<INPUT TYPE="hidden" name="op" value="0">
				<CENTER>
				<a class="button" href="#" onclick="this.blur(); document.frmList1.submit(); document.frmCreate.page.value='1';" onSubmit="frmCreate.page.value='1'; return false;"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle">Cari</span></a>
				<a class="button" href="#" onclick="this.blur();document.frmList1.reset(); document.frmList1.nama_propinsi.focus();"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$RESET}--></span></a>					
				</CENTER>
				</TD>
			</TR>
			</TABLE>
			</FORM>
			</div></div>	
		</DIV>
		
		<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> Data TKI Formal</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> Daftar TKI Formal</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
	<tr>
											<th class="tdatahead" align="left">No</TH>
											<th class="tdatahead" align="left">No. Paspor</TH>
											<th class="tdatahead" align="left">No. KTP</TH>
											
											<th class="tdatahead" align="left">Nama WNI</TH>
											<th class="tdatahead" align="left">Daerah Asal</TH>
											<th class="tdatahead" align="left">Alamat</TH>
											<th class="tdatahead" align="left">Perwakilan</TH>
											<th class="tdatahead" align="left">Jenis WNI</TH>
											<th class="tdatahead" COLSPAN="2"><!--{$ACTION}--></th>
			</tr>
			</thead>
			<tbody>
			<!--{section name=x loop=$DATA_TB}-->										
			<tr class='<!--{cycle values="alt,alt3"}-->'>
											<td width="17" class="tdatacontent-first-col"> <!--{$smarty.section.x.index+$COUNT_VIEW}-->.</TD>
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].kode_wni}--> </TD>
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].no_paspor}--> </TD>											
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].nama}--> </TD>
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].nama_kabupaten}--> </TD>
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].alamat}--> </TD>
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].nm_perwakilan}--> </TD>
											<TD class="tdatacontent"  > <!--{$DATA_TB[x].nama_jenis}--> </TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$EDIT}-->" onclick="return checkEdit('<!--{$SELF}-->?opt=1&id=<!--{$DATA_TB[x].id}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$DELETE}-->" onclick="return checkDelete('engine.php?op=2&id=<!--{$DATA_TB[x].id}--> &mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
										</TR>
										<!--{sectionelse}-->
										<TR>
											<TD class="tdatacontent" COLSPAN="10" align="center">Maaf, Data masih kosong</TD>
										</TR>
			<!--{/section}-->
			</tbody>
		</table>
<div id="panel-footer">
<table width="100%">
<tr class="text-regular">
<td width="20">Tampilkan</td>
<td width="35"><INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
		<SELECT NAME="limit" onchange="this.form.page.value='1'; this.form.submit();" class="text-paging">
		<!--{section name=x loop=$LISTVAL}-->
		<OPTION VALUE = "<!--{$LISTVAL[x]}-->" <!--{if $LISTVAL[x]==$LIMIT}--> SELECTED <!--{/if}-->> <!--{$LISTVAL[x]}--> </OPTION>
		<!--{/section}-->
		</SELECT></td>
<td>Baris : <!--{$COUNT_VIEW}--> - <!--{$COUNT_ALL}--> Dari <!--{$COUNT}--></td>
<td align="right"><!--{$NEXT_PREV}--></td>
</tr>
</table>
</div>				
		</td></tr>
		</table>
		
		</form>

	<div id="div-bg-note-trans"><img src="<!--{$HREF_IMG_PATH}-->/layout/note.png"></div>

	</DIV>
</BODY>
</HTML>