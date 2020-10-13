 
 @extends('layouts.app',
            [
                'checkPoint' => 'users',
                'pageTitle'=>'Users',
                'mainPage'=> 'Data Users'
            ]
        )
@section('content')
@php
    $all = $data['all'];
    $divisi = $data['divisi'];
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
 
              <div class="btn-group pull-right">
               <button type="button" class="btn btn-primary btn-xs tambahUsers" data-toggle="modal" data-target="#form_modal">
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
                             <th>Foto</th>
                             <th>Nama</th>
                             <th>Email</th>
                             <th>Password</th>
                             <th>Divisi</th>
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
                                 <td><img alt src='{{$foto}}' class='media-object' style="height: 10%"></td>
                                 <td>{{$row->nama}}</td>
                                 <td>{{$row->email}}</td>
                                 <td>{{$row->password}}</td>
                                 <td>{{$row["divisi_append"]["nama_divisi"]}}</td>
                                 <td>
                                    <a href="#" class="btn btn-warning btn-xs float-right ml-1 EditUsers" data-toggle="modal" data-target="#form_modal" data-id="{{$row->uid}}" title="Edit"><i class="fa fa-edit"></i></a>

                                     <button type="button" rel="tooltip" class="btn btn-xs btn-danger btnHapus-users" data-original-title="Hapus" title="Hapus" id="{{$row->uid}}"><i class="fa fa-trash-o"></i></button>
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
                 <input type="hidden" id="url" name="url" value="{{url("users_edit")}}" class="form-control" >
                 <div class="row">
                  <div class="col-lg-6">
                      <section class="panel">
                          <div class="panel-body">
                           <div class="form-group">
                              <label for="nama">Nama Users</label>
                              <input type="text" id="nama" name="nama" class="form-control" required>
                              <small id="nama" class="form-text text-muted">Please Insert Your Name</small>
                            </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6">
                      <section class="panel">
                          <div class="panel-body">
                           <div class="form-group">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <select name="id_jk" id="id_jk" class="form-control">
                                 <option class="form-control" value="P">Pria</option>
                                 <option class="form-control" value="W">Wanita</option>
                              </select>
                              <small id="id_jk" class="form-text text-muted">Please Select Your Gender</small>
                            </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6">
                      <section class="panel">
                          <div class="panel-body">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" id="email" name="email" class="form-control" required>
                              <small id="email" class="form-text text-muted">Please Insert Your Email</small>
                            </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6">
                      <section class="panel">
                          <div class="panel-body">
                           <div class="form-group">
                              <label for="password">Password </label>
                              <input type="password" id="password" name="password" class="form-control">
                              <small id="txt_password" class="form-text text-muted">Please Insert Your Password</small>
                            </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6">
                      <section class="panel">
                          <div class="panel-body">
                           <div class="form-group">
                              <label for="divisi">Divisi</label>
                              <select name="uid_divisi" id="uid_divisi" class="form-control select2">
                                 <option class="form-control" value="0">Pilih Divisi</option>
                                 @foreach ($divisi as $item)
                                     <option value="{{$item->uid}}">{{$item->nama_divisi}}</option>
                                 {{-- @endphp --}}
                                 @endforeach
                              </select>
                              <small id="divisi" class="form-text text-muted">Please Insert Your Divisi</small>
                            </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6">
                      <section class="panel">
                          <div class="panel-body">
                           <div class="form-group">
                              <label for="l_foto">Foto</label><br>
                              <img id='image-preview' src='{{asset('images/no_image.png')}}' width='70px' alt='' class='img-thumbnail' /> 
                             

                              <input type='file' class='form-control' name='foto' id='foto' accept='image/png, image/jpeg, image/jpg' onChange='previewImage(this);'>
                              {!! $errors->first('images', '<small class="text-danger">:message</small>') !!}
                              <small id="l_foto" class="form-text text-muted">Please Insert Your Images</small>
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
 
     <script>
       
      function previewImage() {
         document.getElementById("image-preview").style.display = "block";
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("foto").files[0]);
         oFReader.onload = function(oFREvent) {
         document.getElementById("image-preview").src = oFREvent.target.result;
         };
      };
        //  Tambah Users
       $("body").on("click", ".tambahUsers" , function(){
       $('#judulModal').html('Tambah Data Users');
       $('.modal-footer button[type=submit]').html('Save');
       $("#nama_users").attr("required", true);
       $("#password").attr("required", true);
       $('.modal-body form').attr('action', 'users_input');
       
        $('#nama').val('');
        $('#id_jk').val('');
        $('#email').val('');
        $('#uid_divisi').val(0).change();
        $('#image-preview').attr("src", "images/no_image.png")
        });
    
        $('.EditUsers').on('click', function(){
        $('#judulModal').html('Edit Data Users');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action', 'users_update')
            $("#txt_password").html("<font color='red'>If Your Changes Password, Please Insert Your Password, If Not Let Be It.</font>")
        const id = $(this).data('id');
        const url = $("#url").val()
        $.ajax({
            type: "GET",
            url : url,
            data :  'uid='+ id,
                success: function(data){
                    $('#nama').val(data.nama);
                    $('#id_jk').val(data.id_jk);
                    $('#email').val(data.email);
                        $('#uid_divisi').val(data.uid_divisi).change();
                        $('#uid').val(data.uid);
                        if(data.foto != ''){
                            $('#image-preview').attr('src', "images/" + data.foto)
                        }
                        else{
                            $('#image-preview').attr("src", "images/no_image.png")
                        }
                }
            });
        });
    
        // Hapus Users
        
    $(".btnHapus-users").click(function(){
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
                document.location.href = 'users_delete/'+id;
            });
            } 
            else {
                swal("Dibatalkan", "Anda membatalkan untuk menghapus data", "error");
            }
        })
    });
    
        </script>
    @endsection