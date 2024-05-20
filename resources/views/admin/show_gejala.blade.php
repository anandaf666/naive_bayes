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
                        <th>Nama Gejala</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($gejala as $item)
                    <tr align="center">
            
                            
                        
                        <td >{{$item->nama_gejala}}</td>
                        <td><a class="btn btn-success ml-lg-3"
                            href="{{url('update_gejala', $item->id)}}">edit</a></td>
                        <td><a class="btn btn-danger ml-lg-3" onclick="return confirm('Apakah anda yakin')"
                            href="{{url('hapus_gejala', $item->id)}}">Hapus</a></td>
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