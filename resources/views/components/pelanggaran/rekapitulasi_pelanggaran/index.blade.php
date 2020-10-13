@extends('layouts.app',
            [
                'checkPoint' => 'rekapitulasi_pelanggaran',
                'pageTitle'=>"rekapitulasi_pelanggaran$data[id_pilih]",
                'mainPage'=> 'Data rekapitulasi_pelanggaran',
            ]
        )
@section('content')
@php
    $all = $data['all'];
@endphp
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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            {{-- <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary tambahpelanggaran" data-toggle="modal" data-target="#form_modal">
                 Tambah Data
              </button>
            </div> --}}
         </div><hr>
         <div class="space15"></div>
         <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id="example">
                   <thead class="thead-dark">
                       <tr class="text-center">
                           <th>No</th>
                           <th>Nama Pelanggaran</th>
                           <th>Jumlah</th>
                       </tr>
                   </thead>
                       <tbody>
                           @php $no=0; @endphp
                           @foreach ($all as $row)
                           @php $no++; @endphp
                           <tr>
                               <td>{{$no}}</td>
                               <td>{{$row->nama_pelanggaran}}</td>
                               <td>{{$row->jumlah}}</td>
                               
                           </tr>
                           @endforeach
                       </tbody>
               </table>
         </div>
      </div>
   </div>
</section>
<!-- page end-->


@endsection
