
@extends('layouts.app',
            [
                'checkPoint' => 'pemilu',
                'pageTitle'=>'pemilu',
                'mainPage'=>'Data pemilu',
            ]
        )
@section('content')
@php
    $all =$data['all'];
    // $pelanggaran =$data['pelanggaran'];
@endphp
   <section class="panel">
      @if (session('success'))
             <div class="col-12 alert alert-success" id="flash">{{session('success')}}</div>
         @endif
     <div class="panel-body">
        <div class="adv-table editable-table ">
           <div class="clearfix">
              <div class="btn-group">
              </div> 
              {{-- IF SUCCESS CREATE --}}
              @if ( session('status'))
              <div class="alert alert-success" id="success-alert">
                  {{ session('status')}}</div>
              @endif
 
              {{-- IF ERROR CREATE --}}
              @if ($errors->any())
              <div class="alert alert-danger" >
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <div class="btn-group pull-right">
               <button type="button" class="btn btn-primary btn-xs tambahPemilu" data-toggle="modal" data-target="#form_modal">
                  Tambah Data
               </button>
              </div>
           </div>
           <div class="space15"></div>
           <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered" id="example">
                     <thead class="thead-dark">
                         <tr class="text-center">
                             <th>No</th>
                             <th>Tanggal</th>
                             <th>Nomor Pemohon</th>
                             <th>Nik</th>
                             <th>Nama Pemohon</th>
                             <th>Jenis Kelamin</th>
                             <th>Alamat</th>
                             <th>Objek Sengketa</th>
                             <th>Keputusan Penyelesaian Sengketa</th>
                             <th>Tindak Lanjut Putusan</th>
                             <th width="90px">Aksi</th>
                         </tr>
                     </thead>
                         <tbody>
                             @php $no=0; @endphp
                             @foreach ($all as $row)
                             @php $no++; 
                             if($row->jk == 'P'){
                                 $jk= "Pria";
                             }
                             else{
                                 $jk="Wanita";
                             }
                             if($row->tindak_lanjut == null){
                                $tindak_lanjut="Belum Di Tindak Lanjuti";
                             }
                             else{
                                 $tindak_lanjut=$row->tindak_lanjut;
                             }
                             @endphp
                             <tr>
                                 <td>{{$no}}</td>
                                 <td>{{$row->tanggal}}</td>
                                 <td>{{$row->nomor_pemohon}}</td>
                                 <td>{{$row->nik}}</td>
                                 <td>{{$row->nama_pemohon}}</td>
                                 <td>{{$jk}}</td>
                                 <td>{{$row->alamat}}</td>
                                 <td>{{$row->objek_sengketa}}</td>
                                 <td  class='text-center'><?php  if($row->putusan_penyelesaian) { ?> 
                                    <a href="{{route('pemilu.putusan_penyelesaian_pemilu', $row->uid)}}" class="btn btn-label-right"><i class="fa fa-download"> Download</i></a> <?php } else{ echo "Data Tidak Tersedia"; } ?> </td>

                                 <td  class='text-center'><?php  if($row->tindak_lanjut) { ?>
                                    <a href="{{route('pemilu.tindak_lanjut_pemilu', $row->uid)}}" class="btn btn-label-right"><i class="fa fa-download"> Download</i> </a> <?php } else{ echo "Data Tidak Tersedia"; } ?> </td>
                                    
                                 
                                 <td>
                                    <a href="#" class="btn btn-warning btn-xs float-right ml-1 EditPemilu" data-toggle="modal" data-target="#form_modal" data-id="{{$row->uid}}" title="Edit"><i class="fa fa-edit"></i></a>

                                     <button type="button" rel="tooltip" class="btn btn-xs btn-danger btnHapus-pemilu" data-original-title="Hapus" title="Hapus" id="{{$row->uid}}"><i class="fa fa-trash-o"></i></button>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                 </table>
           </div>
        </div>
     </div>
  </section>
  <!-- page end-->

  <!-- Modal Tambah-->
  <div class="modal fade" id="form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <div class="" id="judulModal">Tambah Data
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
         </div>
         <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
               @csrf
               {{-- IF ERROR CREATE --}}
               @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
               <input type="hidden" id="uid" name="uid">
               <input type="hidden" id="url" name="url" value="{{url("pemilu_edit")}}" class="form-control" >
               <div class="row"> 
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                         <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?= date('Y-m-d') ?>"  class="input-append date dpYears">
                              <input type="text" readonly="" value="<?= date('Y-m-d') ?>" size="8" class="form-control" name="tanggal">
                              <span class="input-group-btn add-on">
                                <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                              </span>
                          </div>
                          {{-- <span class="help-block">Select date</span> --}}
                      </div>
                  </div>
                    </section>
                </div>  
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="l_nomor_pemohon">Nomor Sengketa</label>
                                <input type="text" id="nomor_pemohon" name="nomor_pemohon" class="form-control" required>
                                <small id="s_nomor_pemohon" class="form-text text-muted">Please Insert Your Number</small>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="l_objek_sengketa">Objek Sengketa</label>
                                <input type="text" id="objek_sengketa" name="objek_sengketa" class="form-control" required>
                                <small id="s_objek_sengketa" class="form-text text-muted">Please Insert Your Name</small>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="l_nik">Nik Pemohon</label>
                            <input type="number" id="nik" name="nik" class="form-control" required>
                            <small id="s_nik" class="form-text text-muted">Please Insert Your Number</small>
                        </div>
                    </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="l_nama_pemohon">Nama Pemohon</label>
                            <input type="text" id="nama_pemohon" name="nama_pemohon" class="form-control" required>
                            <small id="s_nama_pemohon" class="form-text text-muted">Please Insert Your Name</small>
                        </div>
                    </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option class="form-control" value="P">Pria</option>
                                    <option class="form-control" value="W">Wanita</option>
                                </select>
                                <small id="jk_ketua" class="form-text text-muted">Please Select Your Gender</small>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="l_alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" required>
                            <small id="s_alamat" class="form-text text-muted">Please Insert Your Address</small>
                        </div>
                    </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="file">Putusan Penyelesaian</label>
                                <input type="file" id="putusan_penyelesaian" name="putusan_penyelesaian" class="form-control" >
                                <small id="l_PutusanPenyelesaian" class="form-text text-muted">If Your PutusanPenyelesaian Exists, Please Insert Your Putusan Penyelesaian</small>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="file">Tindak Lanjut</label>
                                <input type="file" id="tindak_lanjut" name="tindak_lanjut" class="form-control" >
                                <small id="l_file" class="form-text text-muted">If Your File Exists, Please Insert Your file</small>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="l_pekerjaan">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" required>
                                <small id="s_pekerjaan" class="form-text text-muted">Please Insert Your Job</small>
                            </div>
                        </div>
                    </section>
                </div>
               
              </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
  </div>

   <script>
      

    function LaporanFoto() {
       document.getElementById("Foto").style.display = "block";
       var oFReader = new FileReader();
       oFReader.readAsDataURL(document.getElementById("foto").files[0]);
       oFReader.onload = function(oFREvent) {
       document.getElementById("Foto").src = oFREvent.target.result;
       };
    };
    
//  Tambah Paslon
$("body").on("click", ".tambahPemilu" , function(){
   $('#judulModal').html('Tambah Data pemilu');
   $('.modal-footer button[type=submit]').html('Save');
   $('.modal-body form').attr('action', 'pemilu_input');
    $("#tindak_lanjut").attr("required", true);
    $("#putusan_penyelesaian").attr("required", true);
    $('#nik').val('');
    $('#nomor_pemohon').val('');
    $('#nama_pemohon').val('');
    $('#alamat').val('');
    $('#pekerjaan').val('');
    $('#objek_sengketa').val('');
});

$('.EditPemilu').on('click', function(){
   $('#judulModal').html('Edit Data pemilu');
   $('.modal-footer button[type=submit]').html('Edit');
   $('.modal-body form').attr('action', 'pemilu_update')

   const id = $(this).data('id');
   const url = $("#url").val()
   $.ajax({
      type: "GET",
      url : url,
      data :  'uid='+ id,
         success: function(data){
            console.log(data);
            $('#tanggal').val(data.tanggal);
            $('#nomor_pemohon').val(data.nomor_pemohon);
            $('#nik').val(data.nik);
            $('#nama_pemohon').val(data.nama_pemohon);
            $('#alamat').val(data.alamat);
            $('#pekerjaan').val(data.pekerjaan);
            $('#objek_sengketa').val(data.objek_sengketa);
            $('#uid').val(data.uid);
         }
    });
});

$("body").on("click" , ".btnHapus-pemilu", function(){
	var id = this.id;
	swal({
		title: "Apakah Anda yakin ingin menghapus data ini?",
		text: "Data yang sudah dihapus tidak dapat dikembalikan kembali!",
		icon: "warning",
		buttons: [
			'Tidak!',
			'Ya'
		],
		dangerMode: true,
	}).then(function(isConfirm) {
		if (isConfirm) {
		swal({
			title: 'Berhasil!',
			text: 'Data tersebut telah dihapus',
			icon: 'success'
		}).then(function() {
			document.location.href = 'pemilu_delete/'+id;
		});
		} 
		else {
			swal("Dibatalkan", "Anda membatalkan untuk menghapus data", "error");
		}
	})
}); 

$("#uid_pelanggaran").change(function () {
      $.ajax({
         url: "{{ route('PenangananPelanggaran.cek') }}?uid_pelanggaran=" + $(this).val(),
         method :'GET',
         success: function (msg) {
            $("#tindakan_penanganan").html(msg.html);
         }
      });
});
    </script>
@endsection
