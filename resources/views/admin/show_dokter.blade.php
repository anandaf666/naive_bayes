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
                        <th>Nama Dokter</th>
                        <th>Kontak</th>
                        <th>Alamat</th> 
                        <th>Spesials</th>
                        <th>Gambar</th> 
                        <th>Disetujui</th>
                        <th>Dibatalkan</th>
                    </tr>
                    @foreach ($dokter as $dokters)
                    <tr align="center">
            
                            
                        
                        <td >{{$dokters->nama}}</td>
                        <td>{{$dokters->kontak}}</td>
                        <td>{{$dokters->alamat}}</td>
                        <td>{{$dokters->spesialis}}</td>
                        <td><img height="75px" width="75px" src="gambar_dokter/{{$dokters->gambar}}"></td>
                        <td><a class="btn btn-success ml-lg-3"
                            href="{{url('update_dokter', $dokters->id)}}">edit</a></td>
                        <td><a class="btn btn-danger ml-lg-3" onclick="return confirm('Apakah anda yakin')"
                            href="{{url('hapus_dokter', $dokters->id)}}">Hapus</a></td>
                        @endforeach
                    </tr>
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