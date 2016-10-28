<?php /* Smarty version 2.6.18, created on 2016-10-19 09:58:21
         compiled from defaults/modules/kehadiran/verifikasi_kehadiran//index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'defaults/modules/kehadiran/verifikasi_kehadiran//index.tpl', 438, false),array('modifier', 'date_format', 'defaults/modules/kehadiran/verifikasi_kehadiran//index.tpl', 443, false),)), $this); ?>
<HTML>
<HEAD>
<!-- #BeginEditable "TITLE" -->
<title><?php echo $this->_tpl_vars['TITLE']; ?>
</title>
<STYLE>{
    {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

ul, ol {
    list-style-type: none;
}
p, label {
   background: #c3daf9 url("../images/layout/bg000000.gif") repeat-x scroll 0 0;
    color: #083772;
    font-size: 11px;  
}
.container-wrapper {
    margin: 7% auto;
    overflow: hidden;
    position: relative;
    width: 100%;
}
input.tab-menu-radio {
    display: none;
}
label.tab-menu {
    cursor: pointer;
    display: inline-block;
    float: left;
    padding: 10px 30px;
}
.tab-content {
    background-color: #eef2f8 none repeat scroll 0 0;
    border-top: #eef2f8 none repeat scroll 0 0;
    clear: both;
  //  padding: 20px;
   // position: relative;
  //  top: -3px;
    width: 100%;
}
.tab-menu-radio:checked + label {
    background-color: #eef2f8 none repeat scroll 0 0;
    color: #000000;
    transition: all 1s ease 0s;
}
.tab-content .tab {
    height: 0;
    opacity: 0;
}
#tab-menu1:checked ~ .tab-content .tab-1, #tab-menu2:checked ~ .tab-content .tab-2, #tab-menu3:checked ~ .tab-content .tab-3 {
    height: auto;
    opacity: 1;
    transition: opacity 1s ease 0s;
}




pre.code {
    border: 1px solid #999;
    background-color: #FF9;
    padding: 1em;
    margin: 0;
}

input.time-hh-mm {
    border: 1px solid #929aa9;
    font-size: 12px;
    width: 55px;
}

</STYLE>   
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['HREF_CSS_PATH']; ?>
/preload.css" type="text/css">
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
			<img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/ajax-lob.gif" align="absmiddle"> Sedang Memuat....
		</td></tr>
	</table>
</div>

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['HREF_CSS_PATH']; ?>
/default.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<?php echo $this->_tpl_vars['HREF_JS_PATH']; ?>
/global.js"></SCRIPT>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['HREF_CSS_PATH']; ?>
/dhtmlgoodies_calendar.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<?php echo $this->_tpl_vars['HREF_JS_PATH']; ?>
/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="<?php echo $this->_tpl_vars['HREF_JS_PATH']; ?>
/tw-ajax.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="<?php echo $this->_tpl_vars['HREF_JS_PATH']; ?>
/tw-sack.js"></SCRIPT>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- #EndEditable -->
</HEAD>

<body class="contentPage" onLoad="hideIt(); <?php if ($this->_tpl_vars['OPT'] == 1): ?>showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<?php else: ?>hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<?php endif; ?>">
<!--tombol_tambah -->
<div id="add-search-box">
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;" <?php if ($this->_tpl_vars['OPT'] == 1): ?> DISABLED <?php endif; ?>><span><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/details.gif" align="absmiddle"> <?php echo $this->_tpl_vars['BTN_NEW']; ?>
</span></a>
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/search.png" align="absmiddle"> Pencarian Data</span></a>
</div>
<!--tombol_tambah  -->

<!--form_tambah -->
<DIV ID="_menuEntry1_1" style="top:10px;width:100%;display:none;position:absolute;">
                            
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> Tambah Data Kehadiran</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/layout/form.gif" align="absmiddle" border="0"> Form Tambah/Ubah Data</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php" enctype="multipart/form-data">
		<TABLE id="table-add-box">
				
					<?php if ($this->_tpl_vars['EDIT_VAL'] == 0): ?>
                                        <INPUT TYPE="hidden" NAME="id" value="(OTOMATIS OLEH SISTEM)" size="35" readOnly class="text_disabled">
					<?php else: ?>
                                        <INPUT TYPE="hidden" NAME="id" value="<?php echo $this->_tpl_vars['EDIT_ID']; ?>
" size="35" readOnly class="text_disabled">
					<?php endif; ?>
			<TR>
                                <TD>Cabang <font color="#ff0000">*</font></TD> 
				<TD>:

					<?php if (( $this->_tpl_vars['JENIS_USER_SES'] == 1 )): ?>

								<select name="kode_cabang" >
								<option value=""> Pilih Cabang </option>
								<?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['DATA_CABANG']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>

								<?php if (( $this->_tpl_vars['OPT'] == 1 )): ?>

									<?php if (trim ( $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id'] ) == $this->_tpl_vars['EDIT_KODE_CABANG']): ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
" selected > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php else: ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
"  > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php endif; ?>

								<?php else: ?>

									<?php if (( $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['kode_cabang'] ) == $this->_tpl_vars['KODE_PW_SES']): ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
" selected > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php else: ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
"  > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php endif; ?>
								<?php endif; ?>

								<?php endfor; endif; ?>
								</SELECT>

						<?php else: ?>

					<select name="kode_cabang" >
						<option value=""> Pilih Cabang </option>
								<?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['DATA_CABANG']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>

								<?php if (( $this->_tpl_vars['OPT'] == 1 )): ?>

									<?php if (trim ( $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id'] ) == $this->_tpl_vars['EDIT_KODE_CABANG']): ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
" selected > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php else: ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
"  disabled> <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php endif; ?>

								<?php else: ?>

									<?php if (trim ( $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id'] ) == trim ( $this->_tpl_vars['KODE_PW_SES'] )): ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
" selected > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php else: ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
"  disabled> <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php endif; ?>

								<?php endif; ?>

								<?php endfor; endif; ?>
								</SELECT>

						<?php endif; ?>
				</TD>
			</TR>
                        <TR>
                                <TD>Nama Karyawan<font color="#ff0000">*</font> </TD>
                                <TD>: 
                                    <INPUT TYPE="text" NAME="r_pegawai__nama" readonly  id="r_pegawai__nama"  size="35" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__NAMA']; ?>
">
                                    <INPUT TYPE="text" NAME="r_pnpt__finger_print" readonly id="r_pnpt__finger_print" size="35" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__FINGERPRINT']; ?>
" >
                                    <INPUT TYPE="text" NAME="r_pnpt__shift" readonly id="r_pnpt__shift" size="35" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__ID_SHIFT']; ?>
" >
                                    <INPUT name="ButtonDepartemen" type="button" class="button" style="cursor: hand;" onclick="goPemberikerja()" value=" ... " />
                                </TD>
                                
                        </TR>
                        <TR>
				<TD>Tgl Hari Kerja  <font color="#ff0000">*</font></TD>
                                <TD>:
                                <?php if ($this->_tpl_vars['EDIT_VAL'] == 0): ?>
                                <input type="text" NAME="t_abs__tgl" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__TGL']; ?>
">
							 <img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.t_abs__tgl,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">
					<?php else: ?>
								 <input type="text" name="t_abs__tgl" value="<?php echo $this->_tpl_vars['EDIT_R_PEGAWAI__TGL_MASUK']; ?>
" >
							 <img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.t_abs__tgl,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">
					<?php endif; ?>
                                
                                
                                </TD>
			</TR>       
				
                 
                               
                                <TR>
                                    <TD >Jam Masuk Kerja</TD>
                                    <TD>: <input type="time" name="t_abs__jam_masuk" min="9:00" max="18:00" step="1800" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__JAM_MASUK']; ?>
"/>
                                       
                                </TR>
                                <TR>
                                     <TD >Jam Keluar Kerja</TD>    
                                     <TD>: <input type="time" name="t_abs__jam_keluar" min="9:00" max="18:00" step="1800" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__JAM_KELUAR']; ?>
"/>
                                       
                                         
                                        </TD>
                                </TR>
                                <TR>
                                    <TD >Jumlah Jam Kerja</TD>    
                                    <TD>: <input type="time" name="t_abs__worktime"  value="<?php echo $this->_tpl_vars['EDIT_T_ABS__WORKTIME']; ?>
"/>
                                        
                                        </TD>
                                </TR>
                                
                                <TR>
                                    <TD>Jam Datang lebih Awal</TD>    
                                    <TD>: <input type="time" name="t_abs__early"  value="<?php echo $this->_tpl_vars['EDIT_T_ABS__EARLY']; ?>
"/>
                                         
                                    </TD>
                                </TR>
                                
                                <TR>
                                <TD>Jam Datang Terlambat</TD>    
                                <TD>: <INPUT type="time" name="t_abs__lately"  value="<?php echo $this->_tpl_vars['EDIT_T_ABS__LATELY']; ?>
"/>
                                         
                                 </TD>
                                </TR>
                                
                                <TR>
                                    <TD>Jam Kerja Kurang</TD>    
                                    <TD>: 
                                        <INPUT type="time" name="t_abs__lesstime"  value="<?php echo $this->_tpl_vars['EDIT_T_ABS__LESSTIME']; ?>
"/>
                                         
                                    </TD>
                                </TR>
                                
                                <TR>
                                    <TD >Jam Kerja Lebih </TD>    
                                    <TD>:  <INPUT type="time" name="t_abs__overtime"  value="<?php echo $this->_tpl_vars['EDIT_T_ABS__OVERTIME']; ?>
"/>
                                          
                                    </TD>
                                </TR>
                                <TR>
                                <TD >Keterangan Kehadiran</TD>
                                <TD>:
                                        <select name="t_abs__status" >
                                            <OPTION value="">[Pilih Keterangan]</OPTION>
                                             <OPTION value="1" <?php if ($this->_tpl_vars['EDIT_T_ABS__STATUS'] == '1'): ?> selected <?php endif; ?> >HADIR</OPTION>
                                            <OPTION value="2" <?php if ($this->_tpl_vars['EDIT_T_ABS__STATUS'] == '2'): ?> selected <?php endif; ?> >SAKIT</OPTION>
                                            <OPTION value="3" <?php if ($this->_tpl_vars['EDIT_T_ABS__STATUS'] == '3'): ?> selected <?php endif; ?>>IZIN</OPTION>
                                            <OPTION value="4" <?php if ($this->_tpl_vars['EDIT_T_ABS__STATUS'] == '4'): ?> selected <?php endif; ?>>ALFA</OPTION>
                                            <OPTION value="5" <?php if ($this->_tpl_vars['EDIT_T_ABS__STATUS'] == '5'): ?> selected <?php endif; ?>>DINAS LUAR KOTA</OPTION>
                                             <OPTION value="6" <?php if ($this->_tpl_vars['EDIT_T_ABS__STATUS'] == '6'): ?> selected <?php endif; ?>>CUTI</OPTION>
					
                                        </select>      
                                </TD>
                                </TR>
                                
                                <TR>
                                    <TD>Catatan</TD> 
                                    <TD>:    
                                       <textarea rows="5" cols="50" NAME="t_abs__catatan"  size="12" ><?php echo $this->_tpl_vars['EDIT_T_ABS__CATATAN']; ?>
</textarea>
                                    </TD>
                        </TR>
                                <INPUT TYPE="hidden" name="t_abs__id" value="<?php echo $this->_tpl_vars['EDIT_T_ABS__ID']; ?>
"> 
                                <TR><TD height="40"></TD>
					<TD>
                                           
					<INPUT TYPE="hidden" name="mod_id" value="<?php echo $this->_tpl_vars['MOD_ID']; ?>
">
					<INPUT TYPE="hidden" name="limit" value="<?php echo $this->_tpl_vars['LIMIT']; ?>
">
					<INPUT TYPE="hidden" name="SORT" value="<?php echo $this->_tpl_vars['SORT']; ?>
">
					<INPUT TYPE="hidden" name="page" value="<?php echo $this->_tpl_vars['page']; ?>
">
					<INPUT TYPE="hidden" name="op" value="0">
                                     
					<a class="button" href="#" onclick="this.blur();return checkFrm(frmCreate);"><span><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/blank.gif" align="absmiddle"><?php echo $this->_tpl_vars['SUBMIT']; ?>
</span></a>
					<a class="button" href="#" onclick="this.blur();document.frmCreate.reset(); resetFrm(frmCreate); "><span><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/blank.gif" align="absmiddle"><?php echo $this->_tpl_vars['RESET']; ?>
</span></a>
					</TD>
				</TR>
					<TR><td  colspan="2"> <font color="#ff0000"> Keterangan * Wajib Diisi</font></td>

					</tr>
                
			</TABLE>
		</FORM>
		</td></tr>
		</table>
		</DIV>
		
<!--form_tambah_tutup-->                              	
<DIV ID="_menuEntry2_1" style="top:10px;width:100%;position:absolute;">
	<TABLE WIDTH="100%" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="2">
		<!--DIVIDER HERE-->
		<TR>
			<TD>
		<DIV ID="_menuEdit_1">
<!--form_cari--> 
<div id="panel-box">
		<div id="title-box2">Pencarian Data</div>
		<div id="title-box-close"><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/close.gif" onClick="document.getElementById('_menuEdit_1').style.display='none';" align="absmiddle" class="imgLink" title="Close"></div>
		<div id="panel-content">
		
		<FORM METHOD=GET ACTION="" NAME="frmList1">
		<TABLE id="table-search-box">	
		<?php if (( $this->_tpl_vars['JENIS_USER_SES'] == '1' )): ?>
							<TR>
								<TD>Perwakilan</TD>
								<TD><select name="kode_perwakilan_cari" > 
									<option value=""> [Pilih Perwakilan] </option>
									<?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['DATA_CABANG']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
									<?php if (trim ( $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id'] ) == $this->_tpl_vars['EDIT_KODE_CABANG']): ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
" selected > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php else: ?>
									<option value="<?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__id']; ?>
"  > <?php echo $this->_tpl_vars['DATA_CABANG'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
 </option>
									<?php endif; ?>
									<?php endfor; endif; ?>
									</select>		</TD>
							</TR>
					<?php endif; ?>	
							
							
							<TR>
								<TD>Nama Karyawan </TD>
								<TD><INPUT TYPE="text" NAME="nama_karyawan_cari" size="30"></TD>
							</TR>
                                                        <TR>
								<TD> ID finger </TD>
								<TD><INPUT TYPE="text" NAME="idfinger_cari" size="30"></TD>
							</TR>
                                                        <TR>
							<TD>Periode</TD>
							<TD>							
							<SELECT name="bulan"   > 
								<OPTION VALUE="" selected>[Pilih Bulan]</OPTION>
                                                                <OPTION value="01" <?php if ($this->_tpl_vars['BULAN_SES'] == 01): ?>selected<?php endif; ?>>Januari</OPTION>
								<OPTION VALUE="02"<?php if ($this->_tpl_vars['BULAN_SES'] == 02): ?>selected<?php endif; ?>  >Februari</OPTION>
								<OPTION VALUE="03"<?php if ($this->_tpl_vars['BULAN_SES'] == 03): ?>selected<?php endif; ?>  >Maret</OPTION>
								<OPTION VALUE="04"<?php if ($this->_tpl_vars['BULAN_SES'] == 04): ?>selected<?php endif; ?>  >April</OPTION>
								<OPTION VALUE="05"<?php if ($this->_tpl_vars['BULAN_SES'] == 05): ?>selected<?php endif; ?> >Mei</OPTION>
								<OPTION VALUE="06"<?php if ($this->_tpl_vars['BULAN_SES'] == 06): ?>selected<?php endif; ?>  >Juni</OPTION>
								<OPTION VALUE="07"<?php if ($this->_tpl_vars['BULAN_SES'] == 07): ?>selected<?php endif; ?>  >Juli</OPTION>
								<OPTION VALUE="08"<?php if ($this->_tpl_vars['BULAN_SES'] == 08): ?>selected<?php endif; ?>  >Agustus</OPTION>
								<OPTION VALUE="09"<?php if ($this->_tpl_vars['BULAN_SES'] == 09): ?>selected<?php endif; ?>  >September</OPTION>
								<OPTION VALUE="10"<?php if ($this->_tpl_vars['BULAN_SES'] == 10): ?>selected<?php endif; ?>  >Oktober</OPTION>
								<OPTION VALUE="11"<?php if ($this->_tpl_vars['BULAN_SES'] == 11): ?>selected<?php endif; ?>  >November</OPTION>
								<OPTION VALUE="12"<?php if ($this->_tpl_vars['BULAN_SES'] == 12): ?>selected<?php endif; ?>  >Desember</OPTION>				 
						</SELECT> 


							<SELECT name="tahun" > 
						<OPTION VALUE="" selected>[Pilih Tahun]</OPTION>
						<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)2010;
$this->_sections['foo']['loop'] = is_array($_loop=2021) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
 							  <?php if (( $this->_sections['foo']['index'] ) == $this->_tpl_vars['TAHUN_SES']): ?>
								 <option value="<?php echo $this->_sections['foo']['index']; ?>
"  selected><?php echo $this->_sections['foo']['index']; ?>
</option>
							  <?php else: ?>
									 <option value="<?php echo $this->_sections['foo']['index']; ?>
"   ><?php echo $this->_sections['foo']['index']; ?>
</option>
							 <?php endif; ?> 
						<?php endfor; endif; ?>
						</SELECT> 
						 </TD></TR>
                                                        
                                                        			 
			<TR><TD></TD>
				<TD>
				<INPUT TYPE="hidden" name="mod_id" value="<?php echo $this->_tpl_vars['MOD_ID']; ?>
">
				<INPUT TYPE="hidden" name="limit" value="<?php echo $this->_tpl_vars['LIMIT']; ?>
">
				<INPUT TYPE="hidden" name="search" value="1">
				<INPUT TYPE="hidden" name="SORT" value="<?php echo $this->_tpl_vars['SORT']; ?>
">
				<INPUT TYPE="hidden" name="page" value="<?php echo $this->_tpl_vars['page']; ?>
">
				<INPUT TYPE="hidden" name="op" value="0">
				<CENTER>
				<a class="button" href="#" onclick="this.blur(); document.frmList1.submit(); document.frmCreate.page.value='1';" onSubmit="frmCreate.page.value='1'; return false;"><span><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/blank.gif" align="absmiddle">Cari</span></a>
				<a class="button" href="#" onclick="this.blur();document.frmList1.reset(); document.frmList1.nama_propinsi.focus();"><span><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/blank.gif" align="absmiddle"><?php echo $this->_tpl_vars['RESET']; ?>
</span></a>					
				</CENTER>
				</TD>
			</TR>
			</TABLE>
			</FORM>
			</div></div>
<!--form_cari--> 			
		</DIV>
		
		<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat">Verifikasi Kehadiran HRD</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" >
		<tr><td class="thead"><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/layout/columns.gif" align="absmiddle" border="0"> Verifikasi Kehadiran HRD</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
		<tr>
                                        						<th class="tdatahead" align="left">NO</TH>
                                                                                        <th class="tdatahead" align="left">ID FINGER</TH>
											<th class="tdatahead" align="left" width="10%">NAMA KARYAWAN</TH>
											<th class="tdatahead" align="left">CABANG</TH>											
											<th class="tdatahead" align="left" >TGL MASUK</TH>
                                                                                        <th class="tdatahead" align="left" >JAM MASUK</TH>
                                                                                        <th class="tdatahead" align="left" >JAM KELUAR</TH>
                                                                                        <th class="tdatahead" align="left" >EARLY</TH>
                                                                                        <th class="tdatahead" align="left" >LATELY</TH>
                                                                                        <th class="tdatahead" align="left" >WORKTIME</TH>
                                                                                        <th class="tdatahead" align="left" >OVERTIME</TH>
                                                                                        <th class="tdatahead" align="left" >LESSTIME</TH>
                                                                                        <th class="tdatahead" align="left" >KETERANGAN</TH>
											<th class="tdatahead" COLSPAN="2"><?php echo $this->_tpl_vars['ACTION']; ?>
</th>
			</tr>
			</thead>
			<tbody>
			<?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['DATA_TB']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
			<tr class='<?php echo smarty_function_cycle(array('values' => "alt,alt3"), $this);?>
'>
											<td width="17" class="tdatacontent-first-col"> <?php echo $this->_sections['x']['index']+$this->_tpl_vars['COUNT_VIEW']; ?>
.</TD>
											<TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['r_pnpt__finger_print']; ?>
 </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['r_pegawai__nama']; ?>
 </TD>
											<TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['r_cabang__nama']; ?>
  </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo ((is_array($_tmp=$this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__tgl'])) ? $this->_run_mod_handler('date_format', true, $_tmp, " %e %B , %Y") : smarty_modifier_date_format($_tmp, " %e %B , %Y")); ?>
 </TD> 
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__jam_masuk']; ?>
 </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__jam_keluar']; ?>
 </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__early']; ?>
 </TD>
                                                                                       <TD class="tdatacontent"  > 
                                                                                           <?php if (( $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__lately'] ) > '00:00:00'): ?>
                                                                                           <font color="#ff0000"><?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__lately']; ?>
 </font>
                                                                                           <?php else: ?>
                                                                                              <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__lately']; ?>
   
                                                                                            <?php endif; ?>
                                                                                       </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__worktime']; ?>
 </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__overtime']; ?>
 </TD>
                                                                                        <TD class="tdatacontent"  > <?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__lesstime']; ?>
 </TD>
                                                                                         <TD class="tdatacontent"  > 
                                            <?php if (( $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__status'] ) == 1): ?>
                                                     <font color="#green">Hadir</font> 
                                            <?php elseif (( $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__status'] ) == 2): ?>
                                                      <font color="#ff0000">Sakit</font>
                                            <?php elseif (( $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__status'] ) == 3): ?>  
                                                       <font color="ff0000">Izin</font>
                                            <?php elseif (( $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__status'] ) == 4): ?>  
                                                      <font color="#ff0000">Alfa</font> 
                                            <?php elseif (( $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__status'] ) == 5): ?>  
                                                  <font color="#ff0000">Dinas Luar Kota</font>   
                                                    <?php else: ?>  
                                                     <font color="#ff0000">Cuti</font>   
                                            <?php endif; ?>  
                                          
                                          
                                         

                                                                                         </TD>
                                                                                       <TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<?php echo $this->_tpl_vars['EDIT']; ?>
" onclick="return checkEdit('<?php echo $this->_tpl_vars['SELF']; ?>
?opt=1&id=<?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__id']; ?>
&mod_id=<?php echo $this->_tpl_vars['MOD_ID']; ?>
&<?php echo $this->_tpl_vars['STR_COMPLETER_']; ?>
');" class="imgLink"></TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<?php echo $this->_tpl_vars['DELETE']; ?>
" onclick="return checkDelete('engine.php?op=2&id=<?php echo $this->_tpl_vars['DATA_TB'][$this->_sections['x']['index']]['t_abs__id']; ?>
 &mod_id=<?php echo $this->_tpl_vars['MOD_ID']; ?>
&<?php echo $this->_tpl_vars['STR_COMPLETER_']; ?>
');" class="imgLink"></TD>
										</TR>
										<?php endfor; else: ?>
										<TR>
											<TD class="tdatacontent" COLSPAN="14" align="center">Maaf, Data masih kosong</TD>
										</TR>
			<?php endif; ?>
			</tbody>
		</table>
<div id="panel-footer">
    <!--halaman -->
 <table width="100%">
                    <tr class="text-regular">
                    <td width="20">Tampilkan</td>
                    <td width="35"><INPUT TYPE="hidden" name="mod_id" value="<?php echo $this->_tpl_vars['MOD_ID']; ?>
">
                    <INPUT TYPE="hidden" name="idfinger_cari" value="<?php echo $this->_tpl_vars['ID_FINGER_CARI']; ?>
">
                    <INPUT TYPE="hidden" name="nama_karyawan_cari" value="<?php echo $this->_tpl_vars['NAMA_KARYAWAN_CARI']; ?>
">
               
                                    <SELECT NAME="limit" onchange="this.form.page.value='1'; this.form.submit();" class="text-paging">
                                    <?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['LISTVAL']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
                                    <OPTION VALUE = "<?php echo $this->_tpl_vars['LISTVAL'][$this->_sections['x']['index']]; ?>
" <?php if ($this->_tpl_vars['LISTVAL'][$this->_sections['x']['index']] == $this->_tpl_vars['LIMIT']): ?> SELECTED <?php endif; ?>> <?php echo $this->_tpl_vars['LISTVAL'][$this->_sections['x']['index']]; ?>
 </OPTION>
                                    <?php endfor; endif; ?>
                                    </SELECT></td>
                    <td>Baris : <?php echo $this->_tpl_vars['COUNT_VIEW']; ?>
 - <?php echo $this->_tpl_vars['COUNT_ALL']; ?>
 Dari <?php echo $this->_tpl_vars['COUNT']; ?>
</td>
                    <td align="right"><?php echo $this->_tpl_vars['NEXT_PREV']; ?>
</td>
                    </tr>
                    </table>
    <!--halaman -->
</div>
		</td></tr>
		</table>
		
		</form>

	<div id="div-bg-note-trans"><img src="<?php echo $this->_tpl_vars['HREF_IMG_PATH']; ?>
/layout/note.png"></div>

	</DIV>
</BODY>
</HTML>