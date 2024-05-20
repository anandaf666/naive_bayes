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
                <form action="{{url('tambah_solusi_upload')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold" for="penyakit_id">NAMA PENYAKIT</label>
                        <select class="form-control" name ="penyakit_id" id="penyakit_id" style="color: white">
                            <option disabled value><b>Pilih Nama Penyakit</b></option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_penyakit}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>solusi:</strong>
                <input type="text" name="solusi" class="form-control" placeholder="Name" style="color: white">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
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