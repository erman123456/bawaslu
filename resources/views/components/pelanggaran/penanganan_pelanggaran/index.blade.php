
@extends('layouts.app',
            [
                'checkPoint' => 'penanganan_pelanggaran',
                'pageTitle'=>"penanganan_pelanggaran$data[id_pilih]",
                'mainPage'=>'Data Penanganan Pelanggaran',
            ]
        )
@section('content')
@php
    $all =$data['all'];
    $pelanggaran =$data['pelanggaran'];
    $id_pilih =$data['id_pilih'];
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
               <button type="button" class="btn btn-primary btn-xs tambahPenangananPelanggaran" data-toggle="modal" data-target="#form_modal">
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
                             <th>Jenis Pelanggaran</th>
                             <th>Keterangan</th>
                             <th>File</th>
                             <th width="90px">Aksi</th>
                         </tr>
                     </thead>
                         <tbody>
                             @php $no=0; @endphp
                             @foreach ($all as $row)
                             @php $no++; 
                             if($row->foto == ''){
                                $foto =  asset('images/no_image.png');
                             }
                             else{
                                $foto = asset("images/$row->foto");                 
                             }
                            
                             @endphp
                             <tr>
                                 <td>{{$no}}</td>
                                 <td>{{$row->tanggal}}</td>
                                 <td>{{$row["pelanggaran_append"]["nama_pelanggaran"]}}</td>
                                 <td>{{$row->keterangan}}</td>
                                 <td><a href="{{route('PenangananPelanggaran.download', $row->uid)}}" class="btn btn-label-right"><i class="fa fa-download"></i></td>
                                 <td>
                                    <a href="#" class="btn btn-warning btn-xs float-right ml-1 EditPenangananPelanggaran" data-toggle="modal" data-target="#form_modal" data-id="{{$row->uid}}" title="Edit"><i class="fa fa-edit"></i></a>

                                     <button type="button" rel="tooltip" class="btn btn-xs btn-danger btnHapus-PenangananPelanggaran" data-original-title="Hapus" title="Hapus" id="{{$row->uid}}"><i class="fa fa-trash-o"></i></button>
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
   <div class="modal-dialog">
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
               <input type="hidden" id="id_pilih" name="id_pilih" value="{{$id_pilih}}">
               <input type="hidden" id="url" name="url" value="{{url("penanganan_pelanggaran_edit")}}" class="form-control" >
               <div class="row"> 
                <div class="col-lg-6">
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
               
                <div class="col-lg-6">
                    <section class="panel">
                        <div class="panel-body">
                         <div class="form-group">
                            <label for="pelanggaran">Jenis Pelanggaran</label>
                            <select name="uid_pelanggaran" id="uid_pelanggaran" class="form-control modal_select2" required>
                              <option class="form-control" value="">Pilih Jenis Pelanggaran</option>
                               @foreach ($pelanggaran as $item)
                                   <option value="{{$item->uid}}">{{$item->nama_pelanggaran}}</option>
                               @endforeach
                            </select>
                            <small id="pelanggaran" class="form-text text-muted">Please Insert Your pelanggaran</small>
                          </div>
                        </div>
                    </section>
                 </div>
                 <div class="col-lg-6">
                    <section class="panel">
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" id="file" name="file" class="form-control" >
                        <small id="l_file" class="form-text text-muted">If Your File Exists, Please Insert Your file</small>
                    </div>
                    </div>
                    </section>
                </div>
               <div class="col-lg-6">
                   <section class="panel">
                    <div class="panel-body">
                     <div class="form-group">
                        <label for="keterangan">keterangan Laporan</label>
                        <textarea class="form-control" rows="5" placeholder="Silahkan Tulis keterangan Laporan Anda" name="keterangan" id="keterangan" required></textarea> 
                        <small id="s_keterangan" class="form-text text-muted">Please Insert Your Name</small>
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
$("body").on("click", ".tambahPenangananPelanggaran" , function(){
   $('#judulModal').html('Tambah Data Rekomendasi Kepala KPU');
   $('.modal-footer button[type=submit]').html('Save');
   $('.modal-body form').attr('action', "{{ route ('penanganan_pelanggaran_input')}}");
   
    $('#tanggal').val('');
    $('#nama_pelanggaran').val('');
    $('#keterangan').val('');
    $('#tindakan_penanganan').val('');
    $('#file').val('');
    $('#uid_pelanggaran').val('').change();
});

$('.EditPenangananPelanggaran').on('click', function(){
   $('#judulModal').html('Edit Data Rekomendasi Kepala KPU');
   $('.modal-footer button[type=submit]').html('Edit');
   $('.modal-body form').attr('action', "{{ route ('penanganan_pelanggaran_update')}}")

   const id = $(this).data('id');
   const url = $("#url").val()
   $.ajax({
      type: "GET",
      url : url,
      data :  'uid='+ id,
         success: function(data){
            console.log(data);
            $('#nama_pelanggaran').val(data.nama_pelanggaran);
            $('#keterangan').val(data.keterangan);
            $('#tindakan_penanganan').val(data.tindakan_penanganan);
            $('#uid_pelanggaran').val(data.uid_pelanggaran).change();
            $('#uid').val(data.uid);
				
			
         }
    });
});

// Hapus Rekomendasi Kepasla KPU

$("body").on("click" , ".btnHapus-PenangananPelanggaran", function(){
	var id = this.id;
    var id_pilih = $("#id_pilih").val();
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
			document.location.href = "{{ url ('penanganan_pelanggaran_delete')}}?uid="+id + "&id_pilih=" + id_pilih;
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
