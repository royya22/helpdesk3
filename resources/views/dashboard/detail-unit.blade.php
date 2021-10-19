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

    <title>Detail Unit/Bagian</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ URL::asset('assets/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ URL::asset('assets/js/ie-emulation-modes-warning.js') }}"></script>
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
        
      </p>
      <br>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default address">
            <div class="panel-body">
              <br>
              <div class="row">
                <div class="col-md-4">
                  <center>
                    <img class="img-responsive" alt="Responsive image" src="{{ URL::asset('assets/img/sid.svg') }}" style="max-width:120px">
                  </center>
                </div>
                <div class="col-md-8">
                  <br>
                  <p class="text-center text-uppercase"><br>
                    <b>Bagian Sistem Informasi dan Data</b><br>
                    Biro Hubungan Masyarakat dan Sistem Informasi<br>
                    Setjen MPR RI
                  </p>
                </div>
                <div class="col-md-12">
                  <br><hr><br>
                </div>
                <div class="col-md-4">
                  <div class="well">
                    <div class="vertical center">
                      <button type="button" class="btn btn-default" style="margin:3;" onclick="location.href='{{ url()->previous() }}';">Kembali</button>
                      <button type="button" class="btn btn-primary" style="margin:3px;" onclick="location.href='{{ url('edit-unit',$data->id_unit) }}';">Edit</button>
                      <a class="btn btn-danger" title="Hapus Unit" href="{{ url('delete-unit',$data->id_unit) }}" style="margin:3px;" onclick="return confirm('Apakah anda yakin mau menghapus data ini ?')">Hapus</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  {{-- <img src="https://cdn-icons-png.flaticon.com/512/3572/3572055.png" class="status"> --}}
                    <small>Nama Unit/Bagian</small>
                    <h1>{{ $data->nama_unit }}</h1>
                    {{-- <p>{{ $data->created_at }}</p> --}}
                    <hr>
                    <br>
                    <p>
                      <small> Kode Unit </small> <br>
                      <span style="font-size:24px">{{ $data->kode_unit }}</span>
                    </p>
                    <br>
                    
                    <br>
                </div>
              </div>
              <br>
            </div>
          </div>
          <h5 class="text-center">
            {{-- <a href="{{ url('unit') }}">Kembali</a> --}}
          </h5>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{ URL::asset('assets/js/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{{ URL::asset('assets/js/holder.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ URL::asset('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>