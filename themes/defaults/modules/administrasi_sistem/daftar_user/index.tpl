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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- #EndEditable -->
</HEAD>

<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<div id="add-search-box" style="right:-105px;">
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;" <!--{if $OPT==1}--> DISABLED <!--{/if}-->><span><img src="<!--{$HREF_IMG_PATH}-->/icon/details.gif" align="absmiddle"> <!--{$BTN_NEW}--></span></a>
</div>

		<DIV ID="_menuEntry1_1" style="display:none;margin-top:12px;position:absolute;">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> <!--{$TABLE_CAPTION}--></td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> <!--{$FORM_NAME}--></td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
					<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php">
                                            
                                            
                <TABLE id="table-add-box" width="100%" >	
                     
				<TR>
					<TD width="100"><!--{$TB_CODE}--></TD>
					<TD><!--{if $EDIT_VAL==0}-->
					<INPUT TYPE="text" NAME="user_id" size="27">
					<!--{else}-->
					<INPUT TYPE="text" NAME="user_id" value="<!--{$EDIT_USER_ID}-->" size="27" readOnly class="text_disabled">
					<!--{/if}-->
					</TD>			
				</TR>
				<TR>
					<TD>Sandi</TD>
					<TD><INPUT TYPE="password" NAME="user_password" value="<!--{$EDIT_USER_PASSWORD}-->" size="27" maxlength="10"></TD>
				</TR>
                                <TR>
                                        <TD>Level</TD>
                                        <TD><select name="jns_user"  onChange="cari(this.value);">
                                        <option value="">[Pilih Level Pengguna]</option>
                                        <option value="1" <!--{if $EDIT_LEVEL== '1'}--> selected <!--{/if}-->>Pusat</option>
                                        <option value="2" <!--{if $EDIT_LEVEL== '2'}--> selected <!--{/if}-->>Cabang</option> 
                                        </select>
                                            
                                         
                                        </TD>
                                </TR>

                                <TR><TD class="login_txt" align="left"> Cabang</TD>
                                <TD> 
                                 <div id="ajax_instansi"> 
                                         <select name="kode_cabang"> 
                                         <option value="">[Pilih Cabang]</option> 
                                         <!--{section name=x loop=$DATA_CABANG}-->
                                

									<!--{if trim($DATA_CABANG[x].r_cabang__id) == $EDIT_KODE_CABANG}-->
									<option value="<!--{$DATA_CABANG[x].r_cabang__id}-->" selected > <!--{$DATA_CABANG[x].r_cabang__nama}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_CABANG[x].r_cabang__id}-->"  disabled> <!--{$DATA_CABANG[x].r_cabang__nama}--> </option>
									<!--{/if}-->
                                                                        <!--{/section}-->
								</SELECT>
                                         
                                 </div>
                                 </TD>
                                 </TR>
                                     <TR>
                                <TD>Cari Pegawai<font color="#ff0000">*</font> </TD> 
                                <TD><INPUT name="ButtonDepartemen" type="button" class="button" style="cursor: hand;" onclick="goPemberikerja()" value=" ... " /></TD>
                        </TR> 
                                <TR>
                                        <TD>Nama <font color="#ff0000">*</font> </TD>
                                         <TD>
                                         <INPUT TYPE="text" NAME="user_first_name" readonly  id="r_pegawai__nama"  size="35" value="<!--{$EDIT_USER_FIRST_NAME|upper}-->" size="27" maxlength="50">
                                         <INPUT TYPE="hidden" NAME="user_last_name" readonly  id="r_pegawai__nama2"  size="35" value="<!--{$EDIT_USER_LAST_NAME|upper}-->" size="27" maxlength="50">
                                        </TD> 
                               </TR>
                        
                                <TR>
                                        <TD>NIP <font color="#ff0000">*</font> </TD>
                                        <TD><INPUT TYPE="text" NAME="id_pegawai" readonly id="r_pnpt__nip" size="35" value="<!--{$EDIT_ID_PEGAWAI}-->" ></TD>
                                         <TD>
				<TR>
					<TD>Status Pengguna</TD>
					<TD><SELECT name="user_status">
							<OPTION value="">[PILIH]</OPTION>
							<OPTION value="1" <!--{if $EDIT_USER_STATUS == 1}-->selected<!--{/if}-->>Aktif</OPTION>
							<OPTION value="0" <!--{if $EDIT_USER_STATUS == 0}-->selected<!--{/if}-->>Tidak Aktif</OPTION>
						</SELECT>
					</TD>
				</TR>
 
				
				
                                
                                <tr>
				<td>Group</td>
				<td>
					<select name="group_user" >
					<option value="">[Pilih Group Pengguna]</option>
					<option value="1"  <!--{if $EDIT_LEVEL == 1}--> selected <!--{/if}-->>HR STAFF</option>
					<option value="2" <!--{if $EDIT_LEVEL == 2}--> selected <!--{/if}-->>HR SVP CABANG</option>
                                        <option value="2" <!--{if $EDIT_LEVEL == 3}--> selected <!--{/if}-->>BOM</option>
                                        <option value="2" <!--{if $EDIT_LEVEL == 4}--> selected <!--{/if}-->>HR STAFF PUSAT</option>
                                        <option value="2" <!--{if $EDIT_LEVEL == 5}--> selected <!--{/if}-->>HR SPV PUSAT</option>
                                        <option value="2" <!--{if $EDIT_LEVEL == 6}--> selected <!--{/if}-->>HR MGR PUSAT</option>
					</select>
				</TD>
				</TR>

			

				<TR>
					<TD>Alamat</TD>
                                        <TD><textarea rows="5" cols="20" NAME="user_address" id="r_pegawai__nama_jalan" value="<!--{$EDIT_USER_ADDRESS}-->">
                                                
                                        </textarea>
                                        </TD>
				</TR>
				<TR>
					<TD>Telepon</TD>
					<TD><INPUT TYPE="text" NAME="user_telp" id="r_pegawai__tlp_kantor" value="<!--{$EDIT_USER_TELP}-->" size="27"></TD>
				</TR>
	
				<TR>
					<TD>Jenis Kelamin</TD>
					<TD>
                                            <INPUT TYPE="text" NAME="user_gender" id="r_pegawai__jk" value="<!--{$EDIT_USER_GENDER}-->" size="27">
					</TD>
				</TR>
				<TR>
					<TD>Email</TD>
					<TD><INPUT TYPE="text" NAME="user_email" id="r_pegawai__tlp_rumah" value="<!--{$EDIT_USER_EMAIL}-->" size="27"></TD>
				</TR>
                             
				
			</TABLE>
			<TABLE id="table-add-box" width="100%" >
                        
				 
                        
                        
                        
                         </TR>
                         
                        
                       
                            
                                
                        </TR>
				
				
                                <TR>
					<TD COLSPAN="2" ALIGN="left">
					<INPUT TYPE="hidden" name="user_id_foo" value="<!--{$EDIT_USER_ID}-->">
					<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
					<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
					<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
					<INPUT TYPE="hidden" name="op" value="0">
					<a class="button" href="#" onclick="this.blur();return checkFrm(frmCreate);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$SUBMIT}--></span></a>
					<a class="button" href="#" onclick="this.blur();document.frmCreate.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$RESET}--></span></a>					
					</TD>
				</TR>
                                        </table>
                                
				<hr size="1" style="color:#FFF;" width="100%">
				
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
								<TD WIDTH="170"><!--{$TB_CODE}--></TD>
								<TD><INPUT TYPE="text" NAME="user_id" size="25"></TD>
							</TR>
							<TR>
								<TD><!--{$TB_NAME}--></TD>
								<TD><INPUT TYPE="text" NAME="user_first_name" size="25"></TD>
							</TR>
							<TR><TD COLSPAN="2"></TD></TR>
							<TR>
								<TD></TD><TD>
								<INPUT TYPE="hidden" name="mod_id" value="<!--{$PATH}-->">
								<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
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
		<tr><td class="tcat"> <!--{$TABLE_CAPTION}--></td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> <!--{$TABLE_NAME}--></td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
		<tr>
		<th class="tdatahead">No Urut</th>
										<TH class="tdatahead" align="left" ><!--{$TB_CODE}--></TH>
										<TH class="tdatahead" align="left"><!--{$TB_NAME}--></TH>
										<TH class="tdatahead" align="left">Status</TH>
										<TH COLSPAN="3" class="tdatahead" align="left"><!--{$ACTION}--></TH>
									</TR>
									<!--{section name=x loop=$DATA_TB}-->
									<tr class='<!--{cycle values="alt,alt3"}-->'>
									<td width="40" class="tdatacontent-first-col"><!--{$smarty.section.x.index+$COUNT_VIEW}--></td>
										<TD class="tdatacontent" nowrap>&nbsp; <!--{$DATA_TB[x].user_id|upper}--></TD>
										<TD class="tdatacontent" nowrap>&nbsp;<!--{$DATA_TB[x].full_name|upper}--> </TD>
										<TD class="tdatacontent" nowrap>&nbsp;<!--{if $DATA_TB[x].user_active_status == 1}-->Aktif<!--{else}-->Tidak Aktif&nbsp;&nbsp;<!--{/if}--> </TD>
										<TD width="20" class="tdatacontent" ALIGN="CENTER"><!--{if $DATA_TB[x].user_active_status == 1}--><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/green_light.png" WIDTH="16" HEIGHT="16" BORDER=0><!--{else}--><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/red_light.png" WIDTH="16" HEIGHT="16" BORDER=0><!--{/if}--> </TD>
										<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER="0" ALT="<!--{$EDIT}-->" onClick="return checkEdit('<!--{$SELF}-->?opt=1&user_id=<!--{$DATA_TB[x].user_id}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
										<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER="0" ALT="<!--{$DELETE}-->" onClick="return checkDelete('engine.php?op=2&user_id=<!--{$DATA_TB[x].user_id}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>										
									</TR>
									<!--{sectionelse}-->
									<TR>
										<TD COLSPAN="5" align="center" class="tdatacontent">Maaf, Data masih kosong</TD>
									</TR>
									<!--{/section}-->
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
<td>Baris : <!--{$COUNT_VIEW}--> - <!--{$COUNT_ALL}--> dari <!--{$COUNT}--></td>
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
