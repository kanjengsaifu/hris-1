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
			<img src="<!--{$HREF_IMG_PATH}-->/ajax-lob.gif" align="absmiddle">Sedang Memuat....
		</td></tr>
	</table>
</div>

<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/default.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/global.js"></SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- #EndEditable -->
</HEAD>

<!--{if $SEARCH_BOX==1}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->showAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{else}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{/if}-->

<div style="left:10;top:10;float:left;position:absolute;">
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Pencarian Data</span></a>
<!--{if $SEARCH_YEAR<>""}-->
<a class="button" href="#" onClick = "window.open('<!--{$FILES}-->');"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/print.gif" align="absmiddle"> &nbsp;Cetak</span></a>
<!--{/if}-->
</div>

	<DIV ID="_menuEntry2_1" style="width:100%;top:25px;position:absolute;">
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
							<TD>
					 
								<SELECT name="kode_perwakilan"  style="width:200px" > 				  
								<OPTION VALUE="" selected>[Pilih Perwakilan Asing]</OPTION>
								<!--{section name=x loop=$DATA_INSTANSI}-->						 
									<!--{if ($DATA_INSTANSI[x].kode_perwakilan_asing) == $SES_PERWAKILAN}-->
									<option value="<!--{$DATA_INSTANSI[x].kode_perwakilan_asing}-->" selected  > <!--{$DATA_INSTANSI[x].nama_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_INSTANSI[x].kode_perwakilan_asing}-->"  > <!--{$DATA_INSTANSI[x].nama_perwakilan}--> </option>
									<!--{/if}-->
									<!--{/section}-->
								</SELECT>
	
							</TD>
							</TR>


							<TR>
							<TD>Periode</TD>
							<TD>							
							<SELECT name="bulan"   > 
								<OPTION VALUE="" selected>[Pilih Bulan]</OPTION>
								<OPTION VALUE="01"  >Januari</OPTION>
								<OPTION VALUE="02"  >Februari</OPTION>
								<OPTION VALUE="03"  >Maret</OPTION>
								<OPTION VALUE="04"  >April</OPTION>
								<OPTION VALUE="05"  >Mei</OPTION>
								<OPTION VALUE="06"  >Juni</OPTION>
								<OPTION VALUE="07"  >Juli</OPTION>
								<OPTION VALUE="08"  >Agustus</OPTION>
								<OPTION VALUE="09"  >September</OPTION>
								<OPTION VALUE="10"  >Oktober</OPTION>
								<OPTION VALUE="11"  >November</OPTION>
								<OPTION VALUE="12"  >Desember</OPTION>				 
						</SELECT> 


							<SELECT name="tahun" > 
								<OPTION VALUE="" selected>[Pilih Tahun]</OPTION>
								<!--{section name=foo start=2010 loop=2021 step=1}-->
									  <!--{if ($smarty.section.foo.index) == $SES_TAHUN}-->
										 <option value="<!--{$smarty.section.foo.index}-->"  selected><!--{$smarty.section.foo.index}--></option>
									  <!--{else}-->
											 <option value="<!--{$smarty.section.foo.index}-->"   ><!--{$smarty.section.foo.index}--></option>
									 <!--{/if}--> 
								<!--{/section}-->
							</SELECT> 
						 </TD>
 
							</TR>

							<TR>
							<TD>Nama</TD>
							<TD>
					  	<INPUT TYPE="text" NAME="nama"    id="nama"  size="35" > 
					  
	
							</TD>
							</TR>



 
							<TR>
								<TD></TD>
								<TD>
								<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
								<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
								<INPUT TYPE="hidden" name="search" value="1">
								<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
								<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
								<INPUT TYPE="hidden" name="op" value="0">
								<a class="button" href="#" onclick="this.blur();document.frmList1.submit(); document.frmList1.page.value='1';"  onSubmit="frmList1.page.value='1';"><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> Cari</span></a>
								<a class="button" href="#" onclick="this.blur();document.frmList1.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$RESET}--></span></a>					
								</TD>
							</TR>	
						</TABLE>
			</FORM>
			</div></div>	
		</DIV>
														
		<!--{if $SEARCH<>""}--><br>
		<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat">LAPORAN PENANGANAN KASUS STAF LOKAL</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">		
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%" >

				
									<TR>
									<TD COLSPAN="2">
											<table width="100%" class="tbheader" border=0>	
				<!--{if ($NM_PERWAKILAN !='') }-->
											<tr><td class="tdatacontent"  width="100" >PERWAKILAN</td><td width="5"> : </td><td colspan="2"><!--{$NM_PERWAKILAN}--> &nbsp;</td></tr>
				<!--{/if}-->

					<!--{if ($BULAN !='' or  $TAHUN !='' ) }-->


											<tr><td class="tdatacontent"  >PERIODE </td><td> : </td><td>
											<!--{if ($BULAN==1)}--> Januari <!--{/if}--> 
											<!--{if ($BULAN==2)}--> Februari <!--{/if}--> 
											<!--{if ($BULAN==3)}--> Maret <!--{/if}--> 
											<!--{if ($BULAN==4)}--> April <!--{/if}--> 
											<!--{if ($BULAN==5)}--> Mei <!--{/if}--> 
											<!--{if ($BULAN==6)}--> Juni <!--{/if}--> 
											<!--{if ($BULAN==7)}--> Juli <!--{/if}--> 
											<!--{if ($BULAN==8)}--> Agustus <!--{/if}--> 
											<!--{if ($BULAN==9)}--> September <!--{/if}--> 
											<!--{if ($BULAN==10)}--> Oktober <!--{/if}--> 
											<!--{if ($BULAN==11)}--> November <!--{/if}--> 
											<!--{if ($BULAN==11)}--> Desember <!--{/if}--> 	

											<!--{$TAHUN}--> &nbsp;</td></tr>
				<!--{/if}-->

			 
											</table>
										   </TD>
											</TR>
			


								<TR>
									<TD COLSPAN="2">
										<TABLE ALIGN="CENTER" WIDTH="100%"  cellspacing="1" cellpadding="2">										
										<thead>									 
										<TR>
											<TH class="tdatahead" align="left">NAMA</TH>
											<TH class="tdatahead" align="left">JENIS KELAMIN</TH>
											<TH class="tdatahead" align="left">USIA</TH>
											<TH class="tdatahead" align="left">NO PENGADUAN</TH>
											<TH class="tdatahead" align="left">TANGGAL PENGADUAN</TH>
											<TH class="tdatahead" align="left">ALAMAT</TH>
											<TH class="tdatahead" align="left">PERWAKILAN ASING</TH>
											<TH class="tdatahead" align="left" >PERMASALAHAN</TH>
											<TH class="tdatahead" align="left">KETERANGAN</TH>
										</TR>
										</thead>
									 	
										<tbody>									
										<!--{section name=x loop=$DATA_TB}-->
										<TR onmouseover="setPointer(this, <!--{$INITSET[x]}-->, 'over', '<!--{$ROW_CLASSNAME[x]}-->', '#CCFFCC', '#FFCC99');" onmouseout="setPointer(this, <!--{$INITSET[x]}-->, 'out', '<!--{$ROW_CLASSNAME[x]}-->', '#CCFFCC', '#FFCC99');" onmousedown="setPointer(this, <!--{$INITSET[x]}-->, 'click', '<!--{$ROW_CLASSNAME[x]}-->', '#CCFFCC', '#FFCC99');">
										 
											<TD class="tdatacontent"   nowrap>
										  <!--{$DATA_TB[x].nama}-->  <BR> 
											</TD>
											<TD class="tdatacontent"   nowrap>
										  <!--{if ($DATA_TB[x].jk==1)}--> Perempuan <!--{/if}--> 
										   <!--{if ($DATA_TB[x].jk==2)}--> Laki-Laki  <!--{/if}-->   

											</TD>

											<TD class="tdatacontent"    >
										  <!--{$DATA_TB[x].usia}-->  <BR> 
											</TD>

											<TD class="tdatacontent"    >
										  <!--{$DATA_TB[x].kode_form_pengaduan}-->  <BR> 
											</TD>
 
											<TD class="tdatacontent"   nowrap>
													 <!--{$DATA_TB[x].tanggal_tl}-->
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
													 <!--{$DATA_TB[x].tahun_tl}-->														
										   </TD>
	<TD class="tdatacontent"   nowrap><!--{$DATA_TB[x].alamat}--></TD>
										   	<TD class="tdatacontent"   nowrap><!--{$DATA_TB[x].nm_perwakilan}--></TD>


											<TD class="tdatacontent" nowrap> <b><!--{$DATA_TB[x].kronologis_permasalahan}-->   </b></TD>
										 
										 
											<TD class="tdatacontent" align="right" nowrap><!--{$DATA_TB[x].keterangan}--></TD>

										</TR> 
											 

										<!--{sectionelse}-->
										<TR>
											<TD class="tdatacontent" COLSPAN="16" align="center">Maaf, Data Masih Kosong</TD>
										</TR>
										<!--{/section}-->
										</tbody>
									</TABLE></TD> 
										 

								</TR>	
							</TABLE></TD>	
								</TR>	
							</TABLE>


									<div style="position:relative;float:right;margin-top:20;"><INPUT TYPE="text" NAME="print_desc" class="text_transparent" style="background:transparant;border:0;">
									&nbsp;&nbsp;
									<IMG SRC="<!--{$HREF_IMG_PATH}-->/print.png" style="cursor:pointer" align="absmiddle" onMouseOver="document.frmList.print_desc.value='Print';" onMouseOut="document.frmList.print_desc.value='';" 
									onClick = "window.open('<!--{$FILES}-->');">							
									</div>
					</FORM>


					<!--{/if}-->

	</DIV>

</BODY>
</HTML>