<SCRIPT LANGUAGE="JavaScript">
<!--

<?php if($_GET[opt]=="1") { ?> 
document.frmCreate.op.value = '1';
<?php } ?>

function checkPages(cond_1,cond_2){
if ((document.frmList.page.value > cond_1 )||(document.frmList.page.value <= '0' )) {
	document.frmList.page.value = cond_2;
	}
}

function check(str_msg, str_location){
	if(str_location == ''){
	if (confirm(str_msg)) return true; else return false;
	}else{
	if (confirm(str_msg)) return doNavigateContentOver(str_location,'mainFrame'); else return false;
	}
 }


var err = 0;
var err_ = 0;

function checkFrm(theForm){
with (theForm){
	 if (kode_cabang.value == "") 
		{ 
			alert ("Silahkan Pilih Cabang !"); 
			kode_cabang.focus();
			return false; 
		}
    
        if (r_pegawai__nama.value == "") 
		{ 
			alert ("Silahkan Pilih Nama karyawan Dan ID Finger Print !"); 
			r_pegawai__nama.focus();
			return false; 
		}

	if ( t_abs__tgl.value == "") 
		{ 
			alert ("Masukan Tgl Absennya !"); 
			 t_abs__tgl.focus();
			return false; 
		}	
                
                if (  t_abs__status.value == "") 
		{ 
			alert ("Masukan Keterangan !"); 
			  t_abs__status.focus();
			return false; 
		}
                 if (jenis_cuti.value == "") 
		{ 
			alert ("Jenis Cuti !"); 
			  jenis_cuti.focus();
			return false; 
		}
                
                
               
                                
	else
		{
			submit();
			return true;
		}
}
	
	
}
// --------------------CLOSE VALIDASI----//

function checkSubmit(){

<?php
if (substr($result->fields[idmod], 2,1)!="1"){
?>
	alert("<?php echo _ERR_NOT_AUTH_ENTRY ; ?>");
	doNavigateContentOver('index.php?mod_id=<?=$_GET[mod_id];?>','mainFrame');
	err_ = 1;

<?php } else { ?>
	err_ = 0;
<?php } ?>
}

function checkEdit(str_location){

	doNavigateContentOver(str_location,'mainFrame');

}

function checkDelete(str_location){

	return check('<?php echo _CONF_DELETE; ?>', str_location);

}
// --------------------

function resetFrm(theForm){
with(theForm){

	op.value = "0";
	}
	doNavigateContentOver('index.php?mod_id=<?=$_GET[mod_id];?>','mainFrame');
}

//function cari_kab(prop_id)
//{
////alert(prop_id);
//if (prop_id != '') {
//	http.open('get', 'index.php?get_prop=1&no_prop='+prop_id);
//	http.onreadystatechange = handlechoice_kab; 
//	http.send(null);
//	} 
//}
//
//function handlechoice_kab(){
//if(http.readyState == 4)
//	{ 
//		var response = http.responseText;
//		 var a = response.split('^/&');
//		document.getElementById('ajax_kabupaten').innerHTML = a[0];
//		//frmCreate.nama_lengkap.focus();
//    }
//}

//function cari_kec(prop_id,kab_id)
//{
////alert(prop_id+'  -- '+kab_id);
//if (prop_id != '') {
//	http.open('get', 'index.php?get_kec=1&no_prop='+prop_id+'&no_kab='+kab_id);
//	http.onreadystatechange = handlechoice_kec; 
//	http.send(null);
//	} 
//}
//
//function handlechoice_kec(){
//if(http.readyState == 4)
//	{ 
//		var response = http.responseText;
//		 var a = response.split('^/&');
//		document.getElementById('ajax_kecamatan').innerHTML = a[0];
//		//frmCreate.nama_lengkap.focus();
//    }
//}

//function cari_kec2(prop_id,kab_id,kec_id)
//{
////alert(prop_id+'  -- '+kab_id);
//if (prop_id != '') {
//	http.open('get', 'index.php?get_kec=1&no_prop='+prop_id+'&no_kab='+kab_id+'&no_kec='+kec_id);
//	http.onreadystatechange = handlechoice_kec2; 
//	http.send(null);
//	} 
//}
//
//function handlechoice_kec2(){
//if(http.readyState == 4)
//	{ 
//		var response = http.responseText;
//		 var a = response.split('^/&');
//		document.getElementById('ajax_kecamatan2').innerHTML = a[0];
//		//frmCreate.nama_lengkap.focus();
//    }
//}

//-->

function pilih_ext(subpenempatan_id)
{
//alert(subpenempatan_id);

if (subpenempatan_id != '') {
	http.open('get','index.php?get_subpenempatan=1&no_subpenempatan='+subpenempatan_id);
	http.onreadystatechange = handlechoice_subpenempatan;
	http.send(null);
	}
}
function handlechoice_subpenempatan(){
if(http.readyState == 4)
	{
		var response = http.responseText;
		var a = response.split('^/&');
		document.getElementById('ajax_subpenempatan').innerHTML = a[0];

    }
}


function goPemberikerja() 
{
   kode_cabang= document.frmCreate.kode_cabang.value;
    if(kode_cabang =='')
    {
        alert('Isi Dahulu Cabang!');
        return false;
    }else
    {
		kode_cabang= document.frmCreate.kode_cabang.value;
               var kode_cabang_encoded = base64_encode(kode_cabang);
		window.open('../../../function/list_absensi.php?q='+kode_cabang_encoded+'',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
    }
}


//decode encode base64 javascript
function base64_encode( str )
    {
        if (window.btoa) // Internet Explorer 10 and above
            return window.btoa(unescape(encodeURIComponent( str )));
        else
        {
            // Cross-Browser Method (compressed)
            // Create Base64 Object
            var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
            // Encode the String
            return Base64.encode(unescape(encodeURIComponent( str )));
        }
    }
function base64_decode( str )
    {
        if (window.atob) // Internet Explorer 10 and above
            return decodeURIComponent(escape(window.atob( str )));
        else
        {
            // Cross-Browser Method (compressed)
            // Create Base64 Object
            var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
            // Encode the String
            return decodeURIComponent(escape(Base64.decode( str )));
        }
    }
</SCRIPT>