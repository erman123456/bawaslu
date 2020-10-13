
@extends('layouts.app',
   [
      'checkPoint' => 'Divisi',
      'pageTitle'=>'Divisi',
      'mainPage'=> 'Data Divisi'
   ]
)
@section('content')
@php 
   $all = $data['all'];
@endphp
<!-- page start-->
   <section class="panel">
     @if (session('success'))
            <div class="col-12 alert alert-success" id="flash">{{session('success')}}</div>
        @endif
    <div class="panel-body">
       <div class="adv-table editable-table ">
          <div class="clearfix">
             <div class="btn-group">
             </div> @if ( session('status'))
             <div class="alert alert-success" id="success-alert">
                 {{ session('status')}}</div>
             @endif
             <div class="pull-right">
               <button type="button" class="btn btn-primary tambahDivisi" data-toggle="modal" data-target="#form_modal">
                  Tambah Data
               </button>
             </div>
          </div><hr>
          <div class="space15"></div>
          <div class="table-responsive">
             <table class="table table-striped table-hover table-bordered" id="example">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Divisi</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                            @php $no=0; @endphp
                            @foreach ($all as $row)
                            @php $no++; @endphp
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$row->nama_divisi}}</td>
                                <td>
                                 <a href="#" class="btn btn-warning btn-xs float-right ml-1 EditDivisi" data-toggle="modal" data-target="#form_modal" data-id="{{$row->uid}}" title="Edit"><i class="fa fa-edit"></i></a>

                                     <button type="button" rel="tooltip" class="btn btn-xs btn-danger btnHapus-divisi" data-original-title="Hapus" title="Hapus" id="{{$row->uid}}"><i class="fa fa-trash-o"></i></button>
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
             <form action="" method="post">
                @csrf
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
                <input type="hidden" id="url" name="url" value="{{url("divisi_edit")}}" class="form-control" >
                <div class="form-group">
                   <label for="nama_divisi">Nama Divisi</label>
                   <input type="text" id="nama_divisi" name="nama_divisi" class="form-control">
                   <small id="nama_divisi" class="form-text text-muted">Please Insert Your Name</small>
                   </div>

                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save</button>
                </div>
             </form>
          </div>
       </div>
    </div>

    <script>

      //  Tambah Divisi
      $("body").on("click", ".tambahDivisi" , function(){
      $('#judulModal').html('Tambah Data Divisi');
      $('.modal-footer button[type=submit]').html('Save');
      $("#nama_divisi").attr("required", true);
      $('.modal-body form').attr('action', 'divisi_input')
      });
      
      $('.EditDivisi').on('click', function(){
      $('#judulModal').html('Edit Data Divisi');
      $("#nama_divisi").attr("required", true);
      $('.modal-footer button[type=submit]').html('Edit');
      $('.modal-body form').attr('action', 'divisi_update')
      
      const id = $(this).data('id');
      const url = $("#url").val()
         $.ajax({
            type: "GET",
            url : url,
            data :  'uid='+ id,
            success: function(data){
            console.log(data);
            $('#nama_divisi').val(data.nama_divisi);
            $('#uid').val(data.uid);
            }
         });
      });
      
      // haspus divisi
      
      $("body").on("click" , ".btnHapus-divisi", function(){
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
      document.location.href = 'divisi_delete/'+id;
      });
      } 
      else {
      swal("Dibatalkan", "Anda membatalkan untuk menghapus data", "error");
      }
      })
      });
      
      </script>
      @endsection