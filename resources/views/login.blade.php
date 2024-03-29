<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Form Helpdesk">
    <meta name="author" content="BSID">
    <link rel="icon" href="https://setjen.mpr.go.id/img/setjen-min.png">
    <title>Silahkan Masuk</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="background">
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1 class="text-uppercase text-center">Halaman Login</h1>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          
          <form id="input-form" action="{{ url('cek-login') }}" method="post">
            {!! csrf_field() !!}
            <div class="panel panel-default address">
              <div class="panel-body">
                <?php 
                if(isset($_GET['pesan'])){
                  if($_GET['pesan']=="gagal1"){
                    echo "<div class='alert'>Username tidak ditemukan!</div>";
                  }else if($_GET['pesan']=="gagal2"){
                    echo "<div class='alert'>Username dan Password tidak sesuai!</div>";
                  }
                }
                ?>
                <br>
                <b>ID Pengguna</b>
                <input name="user" type="text" class="form-control input-lg" placeholder="Username">
                <br>
                <b>Kata Sandi</b>
                <input name="pass" type="password" class="form-control input-lg" placeholder="Password">
                <br>
                <p class="text-muted">Selalu jaga data dan kerahasiaan</p>
              </div>
            </div>
            <p>
              <button type="submit" class="btn btn-default btn-block text-uppercase">Masuk</button>
            </p>
            <br>
            <h5 class="text-center">
              <a href="{{ url('/') }}">Kembali ke Beranda</a>
            </h5>
          </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>