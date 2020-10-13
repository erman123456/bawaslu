     <!--sidebar start-->
     <aside>
        <div id="sidebar" class="nav-collapse ">
           <!-- sidebar menu start-->
           <ul class="sidebar-menu" id="nav-accordion">

             

           {{-- @if(Auth::user()->uid_divisi == 'd68c72c9-fdad-fd68-7289-f7489a80b32a') --}}
           
          <li class="@if($pageTitle == 'Dashboard') active @endif">
            <a href="{{url('dashboard')}}" class="@if($pageTitle == 'Dashboard') active @endif"> <i class="fa fa-dashboard"></i>Dashboard</a>
         </li> 
         {{-- @endif --}}
            @if(Auth::user()->uid_divisi == 'd68c72c9-fdad-fd68-7289-f7489a80b32a' or Auth::user()->uid_divisi == 'f3de8852-d83a-7e2a-6f62-4d3f48d4eef2')
           

            <li>
               <i class="fa fa-tasks"></i>
               <span>PENGAWASAN</span><br>
            </li> 
               
            <!--Data sengketa-->
            <li class="sub-menu ">
               <a href="javascript:;" class="@if($pageTitle == 'pengawasan1' OR $pageTitle == 'laporan_pengawasan1') active @endif">
                  <i class="fa fa-angle-double-right"></i>
                  <span>PILKADA</span>
               </a>
               <ul class="sub">
                  <li class="@if($pageTitle == 'pengawasan1') active @endif">
                     <a href="{{url('pengawasan/1')}}" class="@if($pageTitle == 'pengawasan1') active @endif"> <i class="fa fa-book"></i>Data Pengawasan</a>
                  </li>
                 
                 <li class="@if($pageTitle == 'laporan_pengawasan1') active @endif">
                     <a href="{{url('laporan_pengawasan/1')}}" class="@if($pageTitle == 'laporan_pengawasan1') active @endif"> <i class="fa fa-bar-chart-o"></i>Laporan Pengawasan</a>
                  </li>
               </ul>
            </li>

             
            <!--Data sengketa-->
            <li class="sub-menu ">
               <a href="javascript:;" class="@if($pageTitle == 'pengawasan2' OR $pageTitle == 'laporan_pengawasan2') active @endif">
                  <i class="fa fa-angle-double-right"></i>
                  <span>PEMILU</span>
               </a>
               <ul class="sub">
                  <li class="@if($pageTitle == 'pengawasan2') active @endif">
                     <a href="{{url('pengawasan/2')}}" class="@if($pageTitle == 'pengawasan2') active @endif"> <i class="fa fa-book"></i>Data Pengawasan</a>
                  </li>
                 
                 <li class="@if($pageTitle == 'laporan_pengawasan') active @endif">
                     <a href="{{url('laporan_pengawasan/2')}}" class="@if($pageTitle == 'laporan_pengawasan2') active @endif"> <i class="fa fa-bar-chart-o"></i>Laporan Pengawasan</a>
                  </li>
               </ul>
            </li>
           @endif
             <br>

           @if(Auth::user()->uid_divisi == 'd68c72c9-fdad-fd68-7289-f7489a80b32a' or Auth::user()->uid_divisi == 'e86cf841-7b93-7d39-ccb7-fb83e954ca3f')
           
           <li>
            <i class="fa fa-tasks"></i>
            <span>PELANGGARAN</span><br>
          </li>  

               <!--Data sengketa-->
               <li class="sub-menu ">
                  <a href="javascript:;" class="@if($pageTitle == 'pelanggaran1' OR $pageTitle == 'penanganan_pelanggaran1' OR $pageTitle == 'rekapitulasi_pelanggaran1'OR $pageTitle == 'laporan_pelanggaran1') active @endif">
                     <i class="fa fa-angle-double-right"></i>
                     <span>PILKADA</span>
                  </a>
                  <ul class="sub">
                     <li class="@if($pageTitle == 'pelanggaran1') active @endif">
                        <a href="{{url('pelanggaran/1')}}" class="@if($pageTitle == 'pelanggaran1') active @endif"> <i class="fa fa-book"></i>Data Pelanggaran</a>
                     </li>
                     
                    <li class="@if($pageTitle == 'penanganan_pelanggaran1') active @endif">
                        <a href="{{url('penanganan_pelanggaran/1')}}" class="@if($pageTitle == 'penanganan_pelanggaran1') active @endif"> <i class="fa fa-gavel"></i>Penanganan Pelanggaran</a>
                     </li>
                    <li class="@if($pageTitle == 'rekapitulasi_pelanggaran1') active @endif">
                        <a href="{{url('rekapitulasi_pelanggaran/1')}}" class="@if($pageTitle == 'rekapitulasi_pelanggaran1') active @endif"> <i class="fa fa-credit-card"></i>R. Temuan Pelanggaran</a>
                     </li>
                    
                    <li class="@if($pageTitle == 'laporan_pelanggaran1') active @endif">
                        <a href="{{url('laporan_pelanggaran/1?uid_pelanggaran=6892bfba-3f22-abbd-d9be-dec95fc6587c')}}" class="@if($pageTitle == 'laporan_pelanggaran1') active @endif"> <i class="fa fa-dashboard"></i>Laporan Akhir Divisi</a>
                     </li>
                  </ul>
               </li>

               <!--Data sengketa-->
               <li class="sub-menu ">
                  <a href="javascript:;" class="@if($pageTitle == 'pelanggaran2' OR $pageTitle == 'penanganan_pelanggaran2' OR $pageTitle == 'rekapitulasi_pelanggaran2'OR $pageTitle == 'laporan_pelanggaran2') active @endif">
                     <i class="fa fa-angle-double-right"></i>
                     <span>PEMILU</span>
                  </a>
                  <ul class="sub">
                     <li class="@if($pageTitle == 'pelanggaran2') active @endif">
                        <a href="{{url('pelanggaran/2')}}" class="@if($pageTitle == 'pelanggaran2') active @endif"> <i class="fa fa-book"></i>Data Pelanggaran</a>
                     </li>
                     
                    <li class="@if($pageTitle == 'penanganan_pelanggaran2') active @endif">
                        <a href="{{url('penanganan_pelanggaran/2')}}" class="@if($pageTitle == 'penanganan_pelanggaran2') active @endif"> <i class="fa fa-gavel"></i>Penanganan Pelanggaran</a>
                     </li>
                    <li class="@if($pageTitle == 'rekapitulasi_pelanggaran2') active @endif">
                        <a href="{{url('rekapitulasi_pelanggaran/2')}}" class="@if($pageTitle == 'rekapitulasi_pelanggaran2') active @endif"> <i class="fa fa-credit-card"></i>R. Temuan Pelanggaran</a>
                     </li>
                    
                    <li class="@if($pageTitle == 'laporan_pelanggaran2') active @endif">
                        <a href="{{url('laporan_pelanggaran/2?uid_pelanggaran=6892bfba-3f22-abbd-d9be-dec95fc6587c')}}" class="@if($pageTitle == 'laporan_pelanggaran2') active @endif"> <i class="fa fa-dashboard"></i>Laporan Akhir Divisi</a>
                     </li>
                  </ul>
               </li>
          
          @endif
         @if(Auth::user()->uid_divisi == 'd68c72c9-fdad-fd68-7289-f7489a80b32a' or Auth::user()->uid_divisi == '929e1a6b-b9f8-1998-2869-31560e0ba54c')
         
         <li>
            <i class="fa fa-tasks"></i>
            <span>SENGKETA</span><br>
          </li>   
               <!--Data pilkada-->
               <li class="sub-menu ">
                  <a href="javascript:;" class="@if( $pageTitle == 'sengketa1'OR $pageTitle == 'laporan_sengketa1') active @endif">
                     <i class="fa fa-angle-double-right"></i>
                     <span>PILKADA</span>
                  </a>
                  <ul class="sub">
                     <li class="@if($pageTitle == 'sengketa1') active @endif">
                        <a href="{{url('sengketa/1')}}" class="@if($pageTitle == 'sengketa1') active @endif"> <i class="fa fa-book"></i>Data Sengketa</a>
                     </li>
                     
                     <li class="@if($pageTitle == 'laporan_sengketa1') active @endif">
                        <a href="{{url('laporan_sengketa/1')}}" class="@if($pageTitle == 'laporan_sengketa1') active @endif"> <i class="fa fa-gavel"></i>Laporan Sengketa</a>
                     </li>
                  </ul>
               </li>
               <!--Data Pemilu-->
               <li class="sub-menu ">
                  <a href="javascript:;" class="@if( $pageTitle == 'sengketa2'OR $pageTitle == 'laporan_sengketa2') active @endif">
                     <i class="fa fa-angle-double-right"></i>
                     <span>PEMILU</span>
                  </a>
                  <ul class="sub">
                     <li class="@if($pageTitle == 'sengketa2') active @endif">
                        <a href="{{url('sengketa/2')}}" class="@if($pageTitle == 'sengketa2') active @endif"> <i class="fa fa-book"></i>Data Sengketa</a>
                     </li>
                     
                     <li class="@if($pageTitle == 'laporan_sengketa2') active @endif">
                        <a href="{{url('laporan_sengketa/2')}}" class="@if($pageTitle == 'laporan_sengketa2') active @endif"> <i class="fa fa-gavel"></i>Laporan Sengketa</a>
                     </li>
                  </ul>
               </li>

         @endif
           <br>
           @if(Auth::user()->uid_divisi == 'd68c72c9-fdad-fd68-7289-f7489a80b32a')
           <li class="@if($pageTitle == 'paslon') active @endif">
                <li>
                    <i class="fa fa-tasks"></i>
                    <span>Master Data</span><br>
              </li>
                 {{-- <li>
                     <a href="{{url('dapil')}}" class="@if($pageTitle == 'dapil') active @endif"> <i class="fa fa-book"></i>Data Dapil</a>
                </li>
                 <li>
                     <a href="{{url('wilayah')}}" class="@if($pageTitle == 'wilayah') active @endif"> <i class="fa fa-book"></i>Wilayah</a>
                </li>
                 <li>
                     <a href="{{url('lembaga')}}" class="@if($pageTitle == 'Lembaga') active @endif"> <i class="fa fa-book"></i>Lembaga</a>
                </li> --}}
                 <li>
                     <a href="{{url('divisi')}}" class="@if($pageTitle == 'Divisi') active @endif"> <i class="fa fa-users"></i>Divisi</a>
                </li>
                 <li>
                     <a href="{{url('users')}}" class="@if($pageTitle == 'Users') active @endif"> <i class="fa fa-users"></i>Users</a>
                </li>

@endif

           </ul>
           <!-- sidebar menu end-->
        </div>
     </aside>
     <!--sidebar end-->
     <!--main content start-->
     <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="panel">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}"> Dashboard</a></li>
                <li class="breadcrumb-item active">{{$mainPage}}</li>
                </ul>
            </div>
           <!-- page start-->
