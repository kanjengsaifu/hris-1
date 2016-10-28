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
		<tr><td class="tcat"> DATA PENYAMPAIAN DOKUMEN PENGADILAN DARI KEDUTAAN ASING</td></tr> 
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> Form Tambah/Ubah Data</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
		<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php">
		<TABLE id="table-add-box">

				<TR>
					<TD>Kode Penyampaian</TD>
					<TD><!--{if $EDIT_VAL==0}-->
					<INPUT TYPE="text" NAME="id" value="(OTOMATIS OLEH SISTEM)" size="35" readOnly class="text_disabled">
				 
					<!--{else}-->
					<INPUT TYPE="text" NAME="id" value="<!--{$ID}-->" size="35" readOnly class="text_disabled">
					<!--{/if}-->
					</TD>			
				</TR>
				

				<TR>
					<TD>Perwakilan Asing</TD>
					<TD><select name="kode_perwakilan_asing" > 
						<option value=""> Pilih Perwakilan Asing</option>
						<!--{section name=x loop=$DATA_PWK}-->
						<!--{if trim($DATA_PWK[x].kode_perwakilan_asing) == $KODE_PERWAKILAN_ASING}-->
						<option value="<!--{$DATA_PWK[x].kode_perwakilan_asing}-->" selected > <!--{$DATA_PWK[x].nama_perwakilan}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_PWK[x].kode_perwakilan_asing}-->"  > <!--{$DATA_PWK[x].nama_perwakilan}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select> </TD>
				</TR>


				<<TR>
					<TD>Nama Terpanggil</TD>
					<TD>
						 <INPUT TYPE="text" NAME="nama_terpanggil" id="nama_terpanggil"  size="35" value="<!--{$NAMA_TERPANGGIL}-->">  
					</TD>	
				</TR>

				<TR>
					<TD>Tujuan Pengadilan</TD>
					<TD><select name="kode_asal" onChange="cari_item_detail(frmCreate.kode_asal.value, frmCreate.no_propinsi.value);" > 
						<option value=""> Pilih Asal Pengadilan </option>
						<option value="1" <!--{if ($KODE_ASAL==1)}--> selected <!--{/if}--> >PN </option>
						<option value="2"  <!--{if ($KODE_ASAL==2)}--> selected <!--{/if}--> >PT </option>
						<option value="3"  <!--{if ($KODE_ASAL==3)}--> selected <!--{/if}--> >PA </option>						 
						</select> </TD>
				</TR>
				
				<TR>
					<TD>Propinsi</TD>
					<TD> 	<select name="no_propinsi" onChange="cari_item_detail(frmCreate.kode_asal.value, frmCreate.no_propinsi.value);" > 
						<option value=""> Pilih Provinsi </option>
						<!--{section name=x loop=$DATA_PROPINSI}-->
						<!--{if trim($DATA_PROPINSI[x].no_propinsi) == $NO_PROPINSI}-->
						<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>			</TD>
				</TR>
				<TR>
					<TD>Pengadilan</TD>
					<TD>
						<div id="ajax_pengadilan">
								<select name="kode_pn"> 
								<option value=""> Pilih Pengadilan </option>
								<!--{section name=x loop=$DATA_JNS_WNI}-->
								<!--{if trim($DATA_JNS_WNI[x].kode_pn) == $KODE_PN}-->
								<option value="<!--{$DATA_JNS_WNI[x].kode_pn}-->" selected > <!--{$DATA_JNS_WNI[x].nama_pn}--> </option>
								<!--{else}-->
								<option value="<!--{$DATA_JNS_WNI[x].kode_pn}-->"  > <!--{$DATA_JNS_WNI[x].nama_pn}--> </option>
								<!--{/if}-->
								<!--{/section}-->
								</select>
						</div>
					</TD>	
				</TR>


				<TR>
					<TD>No Nota</TD>
					<TD>
						 <INPUT TYPE="text" NAME="no_nota" id="no_nota"  size="35" value="<!--{$NO_NOTA}-->">  
					</TD>	
				</TR>

				<TR>
					<TD>No Surat Keluar</TD>
					<TD>
						 <INPUT TYPE="text" NAME="no_surat_keluar"   id="no_surat_keluar"  size="35" value="<!--{$NO_SURAT_KELUAR}-->">   
					</TD>	
				</TR>



				<TR>
					<TD>Tanggal Surat Keluar</TD>
					<TD>
					<!--{if $EDIT_VAL==0}-->

							 <input type="text" name="tgl_surat_keluar"  value="<!--{$smarty.now|date_format:"%Y-%m-%d"}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tgl_surat_keluar,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{else}-->
							 <input type="text" name="tgl_surat_keluar" value="<!--{$TGL_SURAT_KELUAR}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tgl_surat_keluar,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{/if}-->
					</TD>	
				</TR>

				<TR>
					<TD>No Surat Balasan</TD>
					<TD>
						 <INPUT TYPE="text" NAME="no_surat_balasan"   id="no_surat_balasan"  size="35" value="<!--{$NO_SURAT_BALASAN}-->">   
					</TD>	
				</TR>



				
				 <TR>
					<TD>No Surat Diplomatik</TD>
					<TD>
						 <INPUT TYPE="text" NAME="no_surat_diplomatik"   id="no_surat_diplomatik"  size="35" value="<!--{$NO_SURAT_DIPLOMATIK}-->">   
					</TD>	
				</TR>

				 <TR>
					<TD>Keterangan</TD>
					<TD><textarea cols="50" rows="3" name="keterangan"><!--{$KETERANGAN}--></textarea> </TD>
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
		
			


			<TR>
								<TD>Perwakilan Asing</TD>
								<TD><select name="kode_perwakilan_asing_cari" style="width:250px" >
									<option value=""> Pilih Perwakilan Asing</option>
									<!--{section name=x loop=$DATA_PWK}-->
									<!--{if trim($DATA_PWK[x].kode_perwakilan_asing) == $EDIT_KODE_PERWAKILAN_ASING}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan_asing}-->" selected > <!--{$DATA_PWK[x].nama_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan_asing}-->"  > <!--{$DATA_PWK[x].nama_perwakilan}--> </option>
									<!--{/if}-->
									<!--{/section}-->
									</select>		</TD>
							</TR>
							
						
						 

							<TR>
								<TD>Nama </TD>
								<TD><INPUT TYPE="text" NAME="nama_wni_cari" size="30"></TD>
							</TR>
							 
							   <TR>
								<TD>Tahun</TD>
								<TD> 
								<select name="tahun_cari">
								<option value="1000"></option>
								<option value="2005" <!--{if ($TAHUN_SES==2005)}-->  selected <!--{/if}--> >2005</option>
								<option value="2006" <!--{if ($TAHUN_SES==2006)}-->  selected <!--{/if}--> >2006</option>
								<option value="2007" <!--{if ($TAHUN_SES==2007)}-->  selected <!--{/if}--> >2007</option>
								 <option value="2008" <!--{if ($TAHUN_SES==2008)}-->  selected <!--{/if}--> >2008</option>

								<option value="2009" <!--{if ($TAHUN_SES==2009)}-->  selected <!--{/if}--> >2009</option>
								<option value="2010"  <!--{if ($TAHUN_SES==2010)}-->  selected <!--{/if}--> >2010</option>
								<option value="2011"  <!--{if ($TAHUN_SES==2011)}-->  selected <!--{/if}--> >2011</option>
								<option value="2012"  <!--{if ($TAHUN_SES==2012)}-->  selected <!--{/if}-->>2012</option>
								<option value="2013"  <!--{if ($TAHUN_SES==2013)}-->  selected <!--{/if}-->>2013</option>
								<option value="2014"  <!--{if ($TAHUN_SES==2014)}-->  selected <!--{/if}-->>2014</option>
								<option value="2015"  <!--{if ($TAHUN_SES==2015)}-->  selected <!--{/if}-->>2015</option>
								<option value="2016"  <!--{if ($TAHUN_SES==2016)}-->  selected <!--{/if}-->>2016</option>
								<option value="2017"  <!--{if ($TAHUN_SES==2017)}-->  selected <!--{/if}-->>2017</option>
								<option value="2018"  <!--{if ($TAHUN_SES==2018)}-->  selected <!--{/if}-->>2018</option>
								<option value="2019"  <!--{if ($TAHUN_SES==2019)}-->  selected <!--{/if}-->>2019</option>
								<option value="2020"  <!--{if ($TAHUN_SES==2020)}-->  selected <!--{/if}-->>2020</option>
								</select>
								
								</TD>
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
		<tr><td class="tcat"> Data Penyampaian Dokumen Pengadilan</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> Daftar Penyampaian Dokumen Pengadilan Dari Kedutaan Asing</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
		<tr>
											<th class="tdatahead" align="left">No</TH>
											<th class="tdatahead" align="left">Perwakilan Asing</TH>
											<th class="tdatahead" align="left">Nama Terpangil</TH>
											<th class="tdatahead" align="left">Asal (PN/PT/PA)</TH>
											<th class="tdatahead" align="left">No Surat Keluar</TH>
											<th class="tdatahead" align="left">Tanggal Surat Keluar</TH>
											<th class="tdatahead" align="left">No Surat Balasan</TH>
											
										 

											 <th class="tdatahead" COLSPAN="2"><!--{$ACTION}--></th>
			</tr>
			</thead>
			<tbody>
			<!--{section name=x loop=$DATA_TB}-->										
			<tr class='<!--{cycle values="alt,alt3"}-->'>
											<td width="17" class="tdatacontent-first-col"> <!--{$smarty.section.x.index+$COUNT_VIEW}-->.</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_perwakilan}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_terpanggil}--> </TD>

											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_pn}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].no_surat_keluar}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].tanggal_tl}-->
														<!--{if ($DATA_TB[x].bulan_tl==1)}--> Januari <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==2)}--> Februari <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==3)}--> Maret <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==4)}--> April <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==5)}--> Mei <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==6)}--> Juni <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==7)}--> Juli <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==8)}--> Agustus <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==9)}--> September <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==10)}--> Oktober <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==11)}--> November <!--{/if}-->
														<!--{if ($DATA_TB[x].bulan_tl==12)}--> Desember <!--{/if}-->
														<!--{$DATA_TB[x].tahun_tl}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].no_surat_balasan}--> </TD>
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

<INPUT TYPE="hidden" name="kode_perwakilan_asing_cari" value="<!--{$KODE_PERWAKILAN_ASING_CARI}-->">
<INPUT TYPE="hidden" name="nama_wni_cari" value="<!--{$NAMA_WNI_CARI}-->">
<INPUT TYPE="hidden" name="tahun_cari" value="<!--{$TAHUN_CARI}-->">

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