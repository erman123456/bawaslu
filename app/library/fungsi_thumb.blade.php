<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Fungsi_thumb extends Model
{
function UploadFoto($fupload_name){
  //direktori gambar
	$vdir_upload = "../public/images/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

	$ext= end(explode('.', $_FILES['fupload']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}

  
	//identitas file asli
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 350 pixel
	//Set ukuran gambar hasil perubahan
	$dst_width = 250;
	$dst_height = ($dst_width/$src_width)*$src_height;   

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		imagepng($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		imagegif($im,$vdir_upload . "small_" . $fupload_name);
	}

	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}

function UploadGaleri1($fupload_name){
  //direktori gambar
	$vdir_upload = "../../../images/img_galeri/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);

	$ext= end(explode('.', $_FILES['fupload2']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}

  
	//identitas file asli
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 350 pixel
	//Set ukuran gambar hasil perubahan
	$dst_width = 250;
	$dst_height = ($dst_width/$src_width)*$src_height;   

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		imagepng($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		imagegif($im,$vdir_upload . "small_" . $fupload_name);
	}

	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}

function UploadGaleri2($fupload_name){
	//direktori gambar
	$vdir_upload = "../../../images/img_galeri/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload3"]["tmp_name"], $vfile_upload);

	$ext= end(explode('.', $_FILES['fupload3']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}

  
	//identitas file asli
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 350 pixel
	//Set ukuran gambar hasil perubahan
	$dst_width = 250;
	$dst_height = ($dst_width/$src_width)*$src_height;   

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		imagepng($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		imagegif($im,$vdir_upload . "small_" . $fupload_name);
	}

	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}

function UploadGaleri3($fupload_name){
  //direktori gambar
	$vdir_upload = "../../../images/img_galeri/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload4"]["tmp_name"], $vfile_upload);

	$ext= end(explode('.', $_FILES['fupload4']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}

  
	//identitas file asli
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 350 pixel
	//Set ukuran gambar hasil perubahan
	$dst_width = 250;
	$dst_height = ($dst_width/$src_width)*$src_height;   

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		imagepng($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		imagegif($im,$vdir_upload . "small_" . $fupload_name);
	}

	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}
function UploadberkasPegawai($fupload_name){

	$vdir_upload = "../../../berkas/berkas/";

	$vfile_upload = $vdir_upload . $fupload_name;



	//Simpan gambar dalam ukuran sebenarnya

	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

}
function UploadberkasPegawai2($fupload_name){

	$vdir_upload = "../../../berkas/berkas/";

	$vfile_upload = $vdir_upload . $fupload_name;
	
	//Simpan gambar dalam ukuran sebenarnya

	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

}
function UploadPegawai($fupload_name){
	$vdir_upload = "../../../../images/img_pegawai/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);

	$ext= end(explode('.', $_FILES['fupload2']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}

  
	//identitas file asli
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 350 pixel
	//Set ukuran gambar hasil perubahan
	$dst_height = 350;
	$dst_width = ($dst_height/$src_height)*$src_width;  
	
	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		imagepng($im,$vdir_upload . "small_" . $fupload_name);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		imagegif($im,$vdir_upload . "small_" . $fupload_name);
	}

	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}



function UploadPendidikanPegawai($fupload_name){
	$vdir_upload = "../../../berkas/pendidikan/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadKursusPegawai($fupload_name){
	$vdir_upload = "../../../berkas/kursus/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadPengeluaran($fupload_name){
	$vdir_upload = "../../../files_keuangan/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadTugas($fupload_name){
	$vdir_upload = "../../../files/tugas/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadPekerjaan($fupload_name, $nama_input){
	
	$vdir_upload = "../../../berkas/";
	
	$vdir_upload2 = "../../../berkas/";	

	if (!is_dir($vdir_upload2)) {
		mkdir($vdir_upload2);
	}

	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES[$nama_input]["tmp_name"], $vfile_upload);
}

function UploadPekerjaan2($fupload_name, $id_pegawai, $nama_input){
	
	$vdir_upload = "../../../berkas/$id_pegawai/";
	
	$vdir_upload2 = "../../../berkas/$id_pegawai";	

	if (!is_dir($vdir_upload2)) {
		mkdir($vdir_upload2);
	}

	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES[$nama_input]["tmp_name"], $vfile_upload);
}

function UploadArtikel($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../images/img_artikel/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);
  
	$ext= end(explode('.', $_FILES['fupload2']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}
  
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
}


function UploadPengumuman($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../files/file_pengumuman/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload3"]["tmp_name"], $vfile_upload);
}

function UploadDiklat($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../berkas/diklat/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadPindah($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../../berkas/pindah/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadBerhenti($fupload_name){
	//direktori gambar
  $vdir_upload = "../../../../berkas/berhenti/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadMeninggal($fupload_name){
	//direktori gambar
  $vdir_upload = "../../../../berkas/meninggal/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadKeteranganAbsensi($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../berkas_absensi/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadTestimoni($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../images/img_testimoni/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);
  
	$ext= end(explode('.', $_FILES['fupload2']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}
  
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
}

function UploadIcon($fupload_name){
	 //direktori gambar
	$vdir_upload = "../../../images/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  
	$ext= end(explode('.', $_FILES['fupload']['name']));
	//identitas file asli
	//untuk membuat ukuran small
	if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG" || $ext=="JPEG")
	{
		$im_src = imagecreatefromjpeg($vfile_upload);
	}
	else if($ext=="png" || $ext=="PNG")
	{
		$im_src = imagecreatefrompng($vfile_upload);
	}
	else if($ext=="gif" || $ext=="GIF")
	{
		$im_src = imagecreatefromgif($vfile_upload);
	}
  
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
}
}
?>
