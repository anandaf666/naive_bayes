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
                
            <div class="container" align="center" style="padding-top: 50px">
                @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('message')}}
            </div>
            @endif
                <form action="{{url('tambah_dokter_upload')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                <div style="padding: 15px">
                    <label>Nama Dokter</label>
                    <input type="text" name="nama" style="color: black" placeholder="Masukkan Nama">
                </div>
                <div style="padding: 15px">
                    <label>Kontak</label>
                    <input type="text" name="kontak" style="color: black" placeholder="Masukkan Nomer Kontak">
                </div>
                <div style="padding: 15px">
                    <label>Alamat</label>
                    <input type="text" name="alamat" style="color: black" placeholder="Masukkan alamat">
                </div>
                <div style="padding: 15px">
                    <label>Spesialis</label>
                    <select name="spesialis" placeholder="Spesialis" style="color: black">
                        <option value="Urologi">Urologi</option>
                        <option value="Penyakit Dalam">Penyakit Dalam</option>
                        <option value="Anak">Anak</option>
                        <option value="Bedah">Bedah</option>
                    </select>
                </div>
                <div style="padding: 15px">
                    <label>Gambar Dokter</label>
                    <input type="file" name="file">
                </div>
                <div style="padding: 15px">
                    <input type="submit" class="btn btn-success">
                </div>
            </div>
        </form>
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