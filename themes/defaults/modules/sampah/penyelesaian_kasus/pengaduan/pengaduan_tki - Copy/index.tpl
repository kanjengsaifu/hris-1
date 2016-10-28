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
			<img src="<!--{$HREF_IMG_PATH}-->/ajax-lob.gif" align="absmiddle"> Loading Page....
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
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Search By</span></a>
</div>
		
		<DIV ID="_menuEntry1_1" style="top:10px;width:100%;display:none;position:absolute;">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> Data Pengaduan Kasus TKI</td></tr> 
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> Form Add/Edit Data</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
		<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php">
		<TABLE id="table-add-box" width="100%" >
				<TR>
					<TD width="15%">Kode Pengaduan</TD>
					<TD><!--{if $EDIT_VAL==0}-->
					<INPUT TYPE="text" NAME="kode_form_pengaduan"  size="35"   class="text_disabled"> 
					<!--{else}-->
					<INPUT TYPE="text" NAME="kode_form_pengaduan" value="<!--{$KODE_FORM_PENGADUAN}-->" size="35" readOnly class="text_disabled">
					<!--{/if}-->
					</TD>			
				</TR>

				<TR>
					<TD>Tanggal Pengaduan</TD>
					<TD>
					<!--{if $EDIT_VAL==0}-->
							 <input type="text" name="tanggal" value="<!--{$smarty.now|date_format:"%Y-%m-%d"}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{else}-->
								 <input type="text" name="tanggal" value="<!--{$TGL_PENGADUAN}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{/if}-->
					</TD>	
				</TR>

				
				 <TR>
					<TD>Sumber Informasi</TD>
					<TD><textarea cols="30" rows="2" name="sumber_informasi"><!--{$SUMBER_INFORMASI}--></textarea> </TD>
				</TR>


				<TR>
					 <TD>Pengaduan Melalui</TD>
						 <TD><select name="kode_via" >
							 <OPTION value=""> </OPTION>
							 <option value="1" 	<!--{if $KODE_VIA==1}-->  SELECTED <!--{/if}-->>Datang Langsung</option>
							 <option value="2" <!--{if $KODE_VIA==2}-->  SELECTED <!--{/if}--> >Telepon </option>
							  </select>
						 </TD>
				 </TR>


				 <TR>
					 <TD>Pengaduan Sebagai</TD>
						 <TD><select name="kode_jns_wni_pelapor" >
							 <OPTION value=""> </OPTION>
							 <option value="1" 	<!--{if $KODE_JNS_WNI_PELAPOR==1}-->  SELECTED <!--{/if}-->>Korban</option>
							 <option value="2" <!--{if $KODE_JNS_WNI_PELAPOR==2}-->  SELECTED <!--{/if}--> >Tersangka</option>
							  </select>
						 </TD>
				 </TR>


				 <TR>
					 <TD> Kasus</TD>
					 <TD> 
						 <input type="button" name="tambah" value="&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;"  onclick="this.blur();addRowToTable();" >
						  <input type="button" name="tambah" value="&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;" onclick="this.blur();removeRowFromTable();" >   
							
				
							<div id="ajax_cek" align="center">&nbsp;</div>
									<table width="50%" border=0>
												<tr>
												<th class="thead" width="25%" >Kasus</TH>
												<th class="thead"  >Jenis Kasus</TH>
												<th class="thead"  >Kategori Kasus</TH>											 
									     		 </tr>
									 </table>
									 <table id="tblItem">
									 <!--{if $EDIT_VAL==1}-->

									 <!--{section name=y loop=$DATA_TB3}-->
											
												 
										<tr>
												<td ><select name="kode_kasus_<!--{$smarty.section.y.index+$COUNT_VIEW2}-->" onchange="cari_nama(this.value,'<!--{$smarty.section.y.index+$COUNT_VIEW2}-->');"  > 
													<option value=""> </option>
													<!--{section name=z loop=$DATA_JNS_WNI}-->
													<!--{if trim($DATA_JNS_WNI[z].kode_kasus) == ($DATA_TB3[y].kode_kasus)}-->
													<option value="<!--{$DATA_JNS_WNI[z].kode_kasus}-->" selected > <!--{$DATA_JNS_WNI[z].nama_kasus}--> </option>
													<!--{else}-->
													<option value="<!--{$DATA_JNS_WNI[z].kode_kasus}-->"  > <!--{$DATA_JNS_WNI[z].nama_kasus}--> </option>
													<!--{/if}-->
													<!--{/section}-->
													</select>   </Td>
												<td >
												<DIV ID="ajax_cari_dina_<!--{$smarty.section.y.index+$COUNT_VIEW2}-->"> 
												 <input type="text" class="inputtext" name="jenis_kasus_<!--{$smarty.section.y.index+$COUNT_VIEW2}-->"  
												 <!--{if ($DATA_TB3[y].jenis_kasus==1)}--> value="Hukum" <!--{/if}-->
												  <!--{if ($DATA_TB3[y].jenis_kasus==2)}--> value="Non Hukum" <!--{/if}-->
												 > 
												</DIV></Td>
												<td >
												<DIV ID="ajax_cari_kategori_<!--{$smarty.section.y.index+$COUNT_VIEW2}-->"> 
												 <input type="text" class="inputtext" name="kategori_kasus_<!--{$smarty.section.y.index+$COUNT_VIEW2}-->"
												 <!--{if ($DATA_TB3[y].pil_kasus==1)}--> value="Pidana" <!--{/if}-->
												  <!--{if ($DATA_TB3[y].pil_kasus==2)}--> value="Perdata" <!--{/if}-->
												  > 
												</DIV> </td>											 
									     </tr>
									 <!--{/section}-->

									 <!--{/if}-->
									 </table>


					  </TD>
				 </TR>
				
				<TR>
					<TD>Perwakilan</TD>
					<TD><select name="kode_perwakilan" > 
						<option value=""> Pilih Perwakilan </option>
						<!--{section name=x loop=$DATA_PWK}-->
						<!--{if trim($DATA_PWK[x].kode_perwakilan) == $KODE_PERWAKILAN}-->
						<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select> </TD>
				</TR>


				<TR>
					<TD> TKI</TD>
					<TD>
						<INPUT TYPE="text" NAME="nama" readonly  id="nama"  size="35" value="<!--{$NAMA}-->"> 
						<INPUT TYPE="hidden" NAME="kode_wni" id="kode_wni"  size="35" value="<!--{$KODE_WNI}-->">
						 
						<input name="ButtonDepartemen" type="button" class="button" style="cursor: hand;" onclick="goPengaduan()" value=" ... " />
					</TD>
				</TR>
 

			<TR>
					<TD>Alamat Di Indonesia</TD>
					<TD>
						 <INPUT TYPE="text" NAME="alamat"  readonly  id="alamat"  size="35" value="<!--{$ALAMAT}-->">  
					</TD>	
				</TR>

			 <TR>
					<TD>Tlp Di Indonesia</TD>
					<TD>
						 <INPUT TYPE="text" NAME="tlp"  readonly  id="tlp"  size="35" value="<!--{$TLP}-->">  
					</TD>	
			 </TR>

			 
			<TR>
					<TD>Alamat Di Luar Negeri </TD>
					<TD>
						 <INPUT TYPE="text" NAME="alamat_ln"  readonly  id="alamat_ln"  size="35" value="<!--{$ALAMAT_LN}-->">  
					</TD>	
				</TR>

			 <TR>
					<TD>Tlp Di Luar Negeri </TD>
					<TD>
						 <INPUT TYPE="text" NAME="tlp_ln"  readonly  id="tlp_ln"  size="35" value="<!--{$TLP_LN}-->">  
					</TD>	
			 </TR>

			  <TR>
					<TD>Kronologis Permasalahan</TD>
					<TD><textarea cols="50" rows="3" name="kronologis_permasalahan"><!--{$KRONOLOGIS_PERMASALAHAN}--></textarea> </TD>
				</TR>
			
			 <TR>
					<TD>Bantuan</TD>
					<TD><textarea cols="50" rows="3" name="bantuan"> <!--{$BANTUAN}--></textarea> </TD>
				</TR>
 
  
				 <TR>
					<TD>Keterangan</TD>
					<TD><textarea cols="50" rows="3" name="keterangan"><!--{$KETERANGAN}--></textarea> </TD>
				</TR>

<TR> 
					<TD colspan="2">
						 <b>* (Diisi Jika melaporkan pemberi kerja) DATA REMBERI KERJA</b>
					</TD>	
				</TR>

				<TR>
					<TD>Nama Pemberi Kerja</TD>
					<TD><INPUT TYPE="text" NAME="nama_majikan" readonly  id="nama_majikan"  size="35" value="<!--{$NAMA_MAJIKAN}-->"> 
						<INPUT TYPE="hidden" NAME="kode_kerja_tki" id="kode_kerja_tki"  size="35" value="<!--{$KODE_KERJA_TKI}-->">
						 
						<input name="ButtonDepartemen" type="button" class="button" style="cursor: hand;" onclick="goKerja()" value=" ... " /></TD>	
				</TR>

			 


  
				<TR>
					<TD colspan="2">
						 <b>KELUARGA YANG BISA DIHUBUNGIN</b>
					</TD>	
				</TR>

				<TR>
					<TD> Nama Kontak Keluarga</TD>
					<TD>
						 <INPUT TYPE="text" NAME="nama_kontak_kel"   id="nama_kontak_kel"  size="35" value="<!--{$NAMA_KONTAK_KEL}-->">   
					</TD>	
				</TR>

				
				<TR>
					<TD> Alamat Kontak Keluarga</TD>
					<TD>
						 <INPUT TYPE="text" NAME="alamat_kel"   id="alamat_kel"  size="35" value="<!--{$ALAMAT_KEL}-->">   
					</TD>	
				</TR>

				<TR>
					<TD> Telepon Kontak Keluarga</TD>
					<TD>
						 <INPUT TYPE="text" NAME="tel_kel"   id="tel_kel"  size="35" value="<!--{$TEL_KEL}-->">   
					</TD>	
				</TR>


				<TR> 
					<TD colspan="2">
						 <b>* (Diisi Jika ada Pelapor) DATA PELAPOR</b>
					</TD>	
				</TR>

				<TR>
					<TD> No Identitas</TD>
					<TD>
						 <INPUT TYPE="text" NAME="no_identitas_pelapor"   id="no_identitas_pelapor"  size="35" value="<!--{$NO_IDENTITAS_PELAPOR}-->">   
					</TD>	
				</TR>

				
				<TR>
					<TD> Nama </TD>
					<TD>
						 <INPUT TYPE="text" NAME="nama_pelapor"   id="nama_pelapor"  size="35" value="<!--{$NAMA_PELAPOR}-->">   
					</TD>	
				</TR>


				
				<TR>
					<TD> Alamat Di Indonesia </TD>
					<TD> 
						 <INPUT TYPE="text" NAME="alamat_pelapor_ind"   id="alamat_pelapor_ind"  size="35" value="<!--{$ALAMAT_PELAPOR_IND_}-->">   
					</TD>	
				</TR>

				<TR>
					<TD> Telepon Di Indonesia </TD>
					<TD>
						 <INPUT TYPE="text" NAME="tlp_pelapor_ind"   id="tlp_pelapor_ind"  size="35" value="<!--{$TLP_PELAPOR_IND}-->">   
					</TD>	
				</TR>

				<TR>
					<TD> Alamat Di Luar Negeri </TD>
					<TD>
						 <INPUT TYPE="text" NAME="alamat_pelapor_ln"   id="alamat_pelapor_ln"  size="35" value="<!--{$ALAMAT_PELAPOR_LN}-->">   
					</TD>	
				</TR>

				<TR>
					<TD> Telepon Di Luar Negeri  </TD>
					<TD>
						 <INPUT TYPE="text" NAME="tlp_pelapor_ln"   id="tlp_pelapor_ln"  size="35" value="<!--{$TLP_PELAPOR_LN}-->">   
					</TD>	
				</TR>

				<TR>
					<TD> Hubungan Dengan Pelapor  </TD>
					<TD>
						 <INPUT TYPE="text" NAME="hub_dgn_pelapor"   id="hub_dgn_pelapor"  size="35" value="<!--{$HUB_DGN_PELAPOR}-->">   
					</TD>	
				</TR>
 

				<TR><td height="40"></td>
					<TD>
					  
					<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
					 <input type="hidden" name="jum_rows" id="jum_rows" value="<!--{$COUNT_ROW}-->" >
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
							
							<TR>
								<TD>No. Pasport TKI</TD>
								<TD><INPUT TYPE="text" NAME="kode_wni_cari" size="30"></TD>
							</TR>

							<TR>
								<TD>No. KTP TKI </TD>
								<TD><INPUT TYPE="text" NAME="no_pasport_cari" size="30"></TD>
							</TR>

							<TR>
								<TD>Nama TKI </TD>
								<TD><INPUT TYPE="text" NAME="nama_wni_cari" size="30"></TD>
							</TR>
							 

							 <TR>
								<TD>Tahun</TD>
								<TD><INPUT TYPE="text" NAME="tahun_cari" size="30"></TD>
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
				<a class="button" href="#" onclick="this.blur(); document.frmList1.submit(); document.frmCreate.page.value='1';" onSubmit="frmCreate.page.value='1'; return false;"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$SUBMIT}--></span></a>
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
		<tr><td class="tcat">Data Pengaduan Kasus WNI</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> Daftar  Pengaduan Kasus WNI</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
		<tr>
											<th class="tdatahead">No</TH>
											<th class="tdatahead">Perwakilan</TH>
											<th class="tdatahead">Kode Pengaduan</TH>
											<th class="tdatahead">Tanggal Pengaduan</TH>	
											<th class="tdatahead">Nama TKI</TH>
											<th class="tdatahead">No Paspor</TH>
											<th class="tdatahead">Daerah Asal</TH>
											<th class="tdatahead">Kasus</TH>											
									 

											 <th class="tdatahead" COLSPAN="2"><!--{$ACTION}--></th>
		 </tr>
			</thead>
			<tbody>
			<!--{section name=x loop=$DATA_TB}-->										
			<tr class='<!--{cycle values="alt,alt3"}-->'>
											<td width="17" class="tdatacontent-first-col"> <!--{$smarty.section.x.index+$COUNT_VIEW}-->.</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nm_perwakilan}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kode_form_pengaduan}--> </TD>
											 

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
														<!--{$DATA_TB[x].tahun_tl}-->  </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kode_wni}--> </TD>
										 
											<TD class="tdatacontent" nowrap><!--{$DATA_TB[x].nama_kabupaten}-->  </TD>
											<TD class="tdatacontent" nowrap> 
												<!--{section name=y loop=$DATA_TB2}-->
												<!--{if ($DATA_TB2[y].kode_form_pengaduan==$DATA_TB[x].kode_form_pengaduan)}-->													
													 - <!--{$DATA_TB2[y].nama_kasus}--> <BR>
												<!--{/if}-->
											<!--{/section}-->
	
											</TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$EDIT}-->" onclick="return checkEdit('<!--{$SELF}-->?opt=1&kode_form_pengaduan=<!--{$DATA_TB[x].kode_form_pengaduan}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$DELETE}-->" onclick="return checkDelete('engine.php?op=2&kode_form_pengaduan=<!--{$DATA_TB[x].kode_form_pengaduan}--> &mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
										</TR>
										<!--{sectionelse}-->
										<TR>
											<TD class="tdatacontent" COLSPAN="9" align="center">Sorry, your query has not been successful, please try again</TD>
										</TR>
			<!--{/section}-->
			</tbody>
		</table>
<div id="panel-footer">
<table width="100%">
<tr class="text-regular">
<td width="20">Show</td>
<td width="35"><INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
		<SELECT NAME="limit" onchange="this.form.page.value='1'; this.form.submit();" class="text-paging">
		<!--{section name=x loop=$LISTVAL}-->
		<OPTION VALUE = "<!--{$LISTVAL[x]}-->" <!--{if $LISTVAL[x]==$LIMIT}--> SELECTED <!--{/if}-->> <!--{$LISTVAL[x]}--> </OPTION>
		<!--{/section}-->
		</SELECT></td>
<td>Record : <!--{$COUNT_VIEW}--> - <!--{$COUNT_ALL}--> of <!--{$COUNT}--></td>
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