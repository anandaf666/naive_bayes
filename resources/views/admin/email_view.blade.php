<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
                <form action="{{url('kirim_email', $data->id)}}" method="POST">

                    @csrf
                <div style="padding: 15px">
                    <label>Ucapan</label>
                    <input type="text"  style="color: black" name="greeting" required="">
                </div>
                <div style="padding: 15px">
                    <label>Body</label>
                    <input type="text" name="body" style="color: black" >
                </div>
                <div style="padding: 15px">
                    <label>Aksi Text</label>
                    <input type="text" name="aksiteks" style="color: black" >
                </div>
                <div style="padding: 15px">
                    <label>Aksi URL</label>
                    <input type="text" name="aksiurl" style="color: black" >
                </div>
                <div style="padding: 15px">
                    <label>Bagian Akhir</label>
                    <input type="text" name="bagianakhir" style="color: black" >
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