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

    <title>Form Unit</title>

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
        <button type="button" class="btn btn-default"onclick="location.href='{{ url('teknisi') }}';">&larr; Kembali</button>
        <button type="button" class="btn btn-primary">Cetak</button>
      </p>
      <br>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default address">
            <div class="panel-body">
              <br>
              <center>
                <img class="img-responsive" alt="Responsive image" src="{{ URL::asset('assets/img/sid.svg') }}" style="max-width:120px">
                <h3>Formulir Penambahan Teknisi</h3>
                <p>
                  {{-- Bagian Sistem Informasi dan Data --}}
                </p>
              </center>
              <hr>
              <form class="form-horizontal" id="input-form" action="{{ url('store-teknisi') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Teknisi</label>
                  <div class="col-sm-9">
                    <h1 class="text-uppercase">{{ $kode_teknisi }}</h1>
                    <input hidden type="text" name="kode_teknisi" id="kode_unit" class="span6" value="{{ $kode_teknisi }}"/>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Teknisi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_teknisi" id="nama_teknisi" class="span6" autofocus/>
                    @if ($errors->has('nama_teknisi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('nama_teknisi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="user_teknisi" style="text-transform:lowercase" id="user_teknisi" class="span6" minlength="3" maxlength="3"/>
                    @if ($errors->has('user_teknisi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('user_teknisi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" style="text-transform:lowercase" id="password" class="span6" />
                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Konfirmasi Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password_confirmation" style="text-transform:lowercase" id="password_confirm" class="span6" />
                    @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
              <br>
            </div>
          </div>
          <h5 class="text-center">
            {{-- <a href="close.html">Kembali</a> --}}
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