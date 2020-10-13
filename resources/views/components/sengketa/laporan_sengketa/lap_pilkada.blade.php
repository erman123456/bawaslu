
@extends('layouts.app',
            [
                'checkPoint' => 'lap_pilkada',
                'pageTitle'=>'lap_pilkada',
                'mainPage'=>'Data Lapran Pilkada',
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
               <button type="button" class="btn btn-primary btn-xs tambahLapPilkada" data-toggle="modal" data-target="#form_modal">
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
                             <th>file</th>
                             <th width="100px">Aksi</th>
                         </tr>
                     </thead>
                         <tbody>
                             @php $no=0; @endphp
                             @foreach ($all as $row)
                             @php $no++;  @endphp
                             <tr>
                                 <td>{{$no}}</td>
                                 <td>{{$row->tanggal}}</td>
                                 <td  class='text-center'><?php  if($row->file) { ?> 
                                    <a href="{{route('lap_pilkada.download_lap_pilkada', $row->uid)}}" class="btn btn-label-right"><i class="fa fa-download"> Download</i></a> <?php } else{ echo "Data Tidak Tersedia"; } ?> </td>
                                 <td>
                                    <a href="#" class="btn btn-warning btn-xs float-right ml-1 EditLapPilkada" data-toggle="modal" data-target="#form_modal" data-id="{{$row->uid}}" title="Edit"><i class="fa fa-edit"></i></a>

                                     <button type="button" rel="tooltip" class="btn btn-xs btn-danger btnHapus-lap_pilkada" data-original-title="Hapus" title="Hapus" id="{{$row->uid}}"><i class="fa fa-trash-o"></i></button>
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
               <input type="hidden" id="url" name="url" value="{{url("lap_pilkada_edit")}}" class="form-control" >
               <div class="row"> 
                <div class="col-lg-5">
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
                <div class="col-lg-7">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" id="file" name="file" class="form-control" >
                                <small id="l_file" class="form-text text-muted">If Your File doesn't Exists, Please Insert Your file</small>
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
$("body").on("click", ".tambahLapPilkada" , function(){
   $('#judulModal').html('Tambah Data Pilkada');
   $('.modal-footer button[type=submit]').html('Save');
   $('.modal-body form').attr('action', 'lap_pilkada_input');
    $("#file").attr("required", true);
});

$('.EditLapPilkada').on('click', function(){
   $('#judulModal').html('Edit Data Pilkada');
   $('.modal-footer button[type=submit]').html('Edit');
   $('.modal-body form').attr('action', 'lap_pilkada_update')

   const id = $(this).data('id');
   const url = $("#url").val()
   $.ajax({
      type: "GET",
      url : url,
      data :  'uid='+ id,
         success: function(data){
            console.log(data);
            $('#tanggal').val(data.tanggal).change();
            $('#uid').val(data.uid);
         }
    });
});

$("body").on("click" , ".btnHapus-lap_pilkada", function(){
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
			document.location.href = 'lap_pilkada_delete/'+id;
		});
		} 
		else {
			swal("Dibatalkan", "Anda membatalkan untuk menghapus data", "error");
		}
	})
}); 
    </script>
@endsection
