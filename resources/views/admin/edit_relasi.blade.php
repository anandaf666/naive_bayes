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
                <form action="{{url('edit_relasi', $data->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold" for="penyakit_id">NAMA PENYAKIT</label>
                        <select class="form-control" name ="penyakit_id" id="penyakit_id"  style="color: white">
                            <option disabled value  style="color: white"><b>Pilih Nama Penyakit</b></option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->id}}"  style="color: white">{{ $item->nama_penyakit}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="font-weight-bold" for="gejala_id">NAMA GEJALA</label>
                        <select class="form-control" name ="gejala_id" id="gejala_id"  style="color: white">
                            <option disabled value style="color: white"><b>Pilih Nama Gejala</b></option>
                            @foreach ($gejala as $item)
                                <option value="{{ $item->id}}"  style="color: white">{{ $item->nama_gejala}}</option>
                            @endforeach
                        </select>
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