	<? 
	
	global $mod_id;
	global $db;
	
	global $DB_TYPE;
	global $DB_NAME;
	global $_POST, $_GET;
	global $tbl_name_main;
	global $tbl_name_detail;	
	
	global $tmp_tbl_name_main;
	global $tmp_tbl_name_detail;
	$tb_import = &ADONewConnection($DB_TYPE);
	
	 $db->debug = true;
	  $tb_import->debug = true;
	$tb_import->Connect($_POST['hostname1'], $_POST['username1'], $_POST['password1'], $DB_NAME);
	//------------------------------------LOCAL CONFIG--------------------------------------//
 	$conn=mysql_connect($_POST['hostname1'],$_POST['username1'],$_POST['password1']);

  if(!$conn)
    {
  
	    Header("Location:index.php?status_error=1&mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);


    } else { 


			$SES_NO_PROP	= $_SESSION['SESSION_NO_PROPINSI'];
 
			$get_sql		= " SELECT * FROM tbl_form_jl_01_main  where no_propinsi=".$SES_NO_PROP; //localhost atw daerah
			$get_recordSet 	= $tb_import->Execute($get_sql);
			$count = $get_recordSet->RecordCount();
			
			if (@$count!='') {

				 $z=1;
				 while ($arr=$get_recordSet->FetchRow()) {

				 //cek apakah data sudah ada di server atw belum melalui id_auto_daerah
 
					 $sql_cek="select * from tbl_form_jl_01_main where id_auto_daerah=".sqlvalue(@$arr["id_fjl_01_main"], true)." AND no_propinsi=".sqlvalue(@$arr["no_propinsi"], true)." and no_kabupaten=".sqlvalue(@$arr["no_kabupaten"], true);
					 $rs_cari =   $tb_import->Execute($sql_cek); 
					 $id_auto_daerah = $rs_cari->fields['id_auto_daerah'];
					 $id_fjl_01_main_cek = $rs_cari->fields['id_fjl_01_main'];
 


							if ($id_auto_daerah !='') { //data sudah ada di pusat
								// script update DI PUSAT
								
								// script update DI PUSAT
		 
								$tmp_sql = " UPDATE tbl_form_jl_01_main  SET " ;
								$tmp_sql.= "  tanggal='".$arr[tanggal]."'," ;
								$tmp_sql.= "  no_propinsi='".$arr[no_propinsi]."'," ;
								$tmp_sql.= "  no_kabupaten='".$arr[no_kabupaten]."'," ;
								$tmp_sql.= "  id_jns_jln='".$arr[id_jns_jln]."' "  ;
								$tmp_sql.= "  where id_fjl_01_main ='".$id_fjl_01_main_cek."' " ;
								$tmp_sqlresult = $tb_import->Execute($tmp_sql);	
								 

								 $sql_del = "DELETE FROM tbl_form_jl_01_detail WHERE id_fjl_01_main='$id_fjl_01_main' ";
								 $tb_import->Execute($sql_del);

								 

							} else { //data belum ada simpan di server
								
								$sql_insert = " INSERT INTO `".$tbl_name_main."` (`tanggal`, `no_propinsi`, `no_kabupaten`, `id_jns_jln`) 
								 VALUES (".sqlvalue(@$arr["tanggal"], true).", 
								  ".sqlvalue(@$arr["no_propinsi"], false).", ".sqlvalue(@$arr["no_kabupaten"], false).", ".sqlvalue(@$arr["id_jns_jln"], false).")";
								 $sql_exec = $tb_import->Execute($sql_insert);


							}
								
								//CARI DI LOCAL/DAERAH
								$sql_detail	=  " SELECT * FROM `".$tbl_name_detail."` WHERE id_fjl_01_main='$arr[id_fjl_01_main]' ";
								$get_recordSet2	= $db->Execute($sql_detail);

								if($get_recordSet2->RecordCount()>0){
									 
									if ($id_auto_daerah !='') { //jika  data induk sudah ada 

										$sql_insert2 = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_01_main`, `no_ruas`, `nama_ruas`, `titik_pengenal_pangkal`, 
										`titik_pengenal_ujung`, `kecamatan_yg_dilalui`, `panjang`, `lebar`, `tanah`, `kerikil`, `penetrasi_macadam`, 
										`lain_lain`, `hot_mix`, `beton_semen`, `keterangan`) VALUES (
										 $id_fjl_01_main_cek , ".sqlvalue(@$get_recordSet2->fields["no_ruas"], true).", 
										".sqlvalue(@$get_recordSet2->fields["nama_ruas"], true).", ".sqlvalue(@$get_recordSet2->fields["titik_pengenal_pangkal"], true).", 
										".sqlvalue(@$get_recordSet2->fields["titik_pengenal_ujung"], true).", '" .get_data_kecamatan($get_recordSet2->fields["jml_kecamatan"])."', 
										".sqlvalue(@$get_recordSet2->fields["panjang"], false).", ".sqlvalue(@$get_recordSet2->fields["lebar"], false).", 
										".sqlvalue(@$get_recordSet2->fields["tanah"], false).", ".sqlvalue(@$get_recordSet2->fields["kerikil"], false).", 
										".sqlvalue(@$get_recordSet2->fields["penetrasi_macadam"], false).", ".sqlvalue(@$get_recordSet2->fields["lain_lain"], false).", 
										".sqlvalue(@$get_recordSet2->fields["hot_mix"], false).", ".sqlvalue(@$get_recordSet2->fields["beton_semen"], false).", ".sqlvalue(@$get_recordSet2->fields["keterangan"], true).")";
										$sql_exec2 = $tb_import->Execute($sql_insert2);


									} else {
										
										$sql_insert2 = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_01_main`, `no_ruas`, `nama_ruas`, `titik_pengenal_pangkal`, 
										`titik_pengenal_ujung`, `kecamatan_yg_dilalui`, `panjang`, `lebar`, `tanah`, `kerikil`, `penetrasi_macadam`, 
										`lain_lain`, `hot_mix`, `beton_semen`, `keterangan`) VALUES (
										(SELECT MAX(id_fjl_01_main) FROM ".$tbl_name_main."), ".sqlvalue(@$get_recordSet2->fields["no_ruas"], true).", 
										".sqlvalue(@$get_recordSet2->fields["nama_ruas"], true).", ".sqlvalue(@$get_recordSet2->fields["titik_pengenal_pangkal"], true).", 
										".sqlvalue(@$get_recordSet2->fields["titik_pengenal_ujung"], true).", '" .get_data_kecamatan($get_recordSet2->fields["jml_kecamatan"])."', 
										".sqlvalue(@$get_recordSet2->fields["panjang"], false).", ".sqlvalue(@$get_recordSet2->fields["lebar"], false).", 
										".sqlvalue(@$get_recordSet2->fields["tanah"], false).", ".sqlvalue(@$get_recordSet2->fields["kerikil"], false).", 
										".sqlvalue(@$get_recordSet2->fields["penetrasi_macadam"], false).", ".sqlvalue(@$get_recordSet2->fields["lain_lain"], false).", 
										".sqlvalue(@$get_recordSet2->fields["hot_mix"], false).", ".sqlvalue(@$get_recordSet2->fields["beton_semen"], false).", ".sqlvalue(@$get_recordSet2->fields["keterangan"], true).")";
										$sql_exec2 = $tb_import->Execute($sql_insert2);
 

									}



									
						}
					}

					 
					 
					$z++;
				}

				Header("Location:index.php?status_error=3&mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);
	} else {
			
			//echo "Tidak ada data yang akan di eksport";

			Header("Location:index.php?status_error=2&mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);


	
	}


	}

	?>