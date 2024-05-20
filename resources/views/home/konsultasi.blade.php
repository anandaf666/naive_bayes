<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="background-color: greenyellow; color:white;"
              href="{{url('janjisaya')}}">Janji</a>
            </li>
          <x-app-layout>
        </x-app-layout>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  <div class="container" align="center" style="padding-top: 50px">
    @if(session()->has('message'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>

    {{session()->get('message')}}
</div>
@endif
 
<form action="{{ route('home.hasil') }}" method="POST" enctype="multipart/form-data">
                        
  @csrf
  <table class="table table-bordered">
      <h1><bold>DAFTAR GEJALA</bold></h1>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NAMA GEJALA</th>
          <th scope="col">YA</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($gejala as $post)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $post->nama_gejala }}</td>
              <td><div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="gejala_id[]" value="{{ $post->id}}">
                  <label class="form-check-label" for="inlineCheckbox1"></label>
                </div></td>
          </tr>
        @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
            </div>
        @endforelse
      </tbody>
    </table>  
  <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">SIMPAN</button>
  <button type="reset" class="btn btn-outline-warning my-2 my-sm-0">RESET</button>
</form> 
<br>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>