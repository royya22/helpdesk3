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
    <title>Ganti Kata Sandi</title>
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
  <body class="dashboard">
    <!-- Begin page content -->
    <div class="container">
      <br>
      <p class="text-center">
        <button type="button" class="btn btn-default"onclick="location.href='{{ url('dashboard') }}';">&larr; Kembali</button>
      </p>
      <br>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default address">
            <div class="panel-body">
              <br>
              <center>
                <h3>Ganti Kata Sandi</h3>
                <p>
                  Jaga selalu privasi Anda
                </p>
              </center>
              <hr>
              <form>
                <div class="form-group">
                  <label>Kata Sandi Lama</label>
                  <input type="password" class="form-control input-lg" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Kata Sandi Baru</label>
                  <input type="password" class="form-control input-lg" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Ulangi Kata Sandi Baru</label>
                  <input type="password" class="form-control input-lg" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> &nbsp; Ubah Kata Sandi</button>
              </form>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/jquery.min.js"><\/script>')</script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>