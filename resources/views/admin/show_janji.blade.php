<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <style type="text/css">

    label{
        display: inline-block;
        width: 200px;
    }
    </style>
  @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->

      @include('admin.navbar');
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
                
            <div>
                <table>
                    <tr align="center">
                        <th>Nama Pasien</th>
                        <th>email</th>
                        <th>Kontak</th> 
                        <th>Dokter</th> 
                        <th>Tanggal</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Disetujui</th>
                        <th>Dibatalkan</th>
                        <th>Kirim Email</th>
                    </tr>
                    @foreach ($janji as $janjis)
                    <tr align="center">
            
                            
                        
                        <td >{{$janjis->nama}}</td>
                        <td>{{$janjis->email}}</td>
                        <td>{{$janjis->kontak}}</td>
                        <td>{{$janjis->dokter}}</td>
                        <td>{{$janjis->tanggal}}</td>
                        <td>{{$janjis->pesan}}</td>
                        <td>{{$janjis->status}}</td>
                        <td><a class="btn btn-success ml-lg-3" onclick="return confirm('Apakah anda yakin')"
                            href="{{url('disetujui', $janjis->id)}}">Disetujui</a></td>
                        <td><a class="btn btn-danger ml-lg-3" onclick="return confirm('Apakah anda yakin')"
                            href="{{url('dibatalkan', $janjis->id)}}">Batal</a></td>
                        <td><a class="btn btn-primary ml-lg-3" onclick="return confirm('Apakah anda yakin')"
                            href="{{url('email_view', $janjis->id)}}">Kirim Email</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>  
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    @include('admin.script');
    <!-- End custom js for this page -->
  </body>
</html>