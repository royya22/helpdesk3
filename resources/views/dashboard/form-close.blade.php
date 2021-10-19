
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

    <title>Detail Tiket</title>
    
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
        {{-- <button type="button" class="btn btn-default"onclick="location.href='{{ url('open') }}';">&larr; Kembali</button>
        <button type="button" class="btn btn-primary">Cetak</button> --}}
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
                  <p class="text-center text-uppercase">
                    <u><b>Formulir Perbaikan Jaringan dan Internet</b></u><br>
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
                    <address>
                      <u><strong>{{ $data->nama_pemohon }}</strong></u><br>
                      {{ $data->unit }}<br>
                      <abbr title="Phone">Kontak:</abbr> 
                      <a href="#">{{ $data->no_tlp }}</a>
                    </address>
                  </div>
                </div>
                <div class="col-md-8">
                  {{-- <img src="https://cdn-icons-png.flaticon.com/512/3572/3572055.png" class="status"> --}}
                    <small>ID Formulir:</small>
                    <h1>{{ $data->kode_permohonan }}</h1>
                    <p>{{ $data->created_at }}</p>
                    <hr>
                    {{-- <br>
                    <p>
                      <b>Subjek: </b><br>
                      <span style="font-size:24px">BSID01 - {{ $data->subjek }}</span>
                    </p> --}}
                    <br>
                    <p>
                      <b>Deskripsi: </b><br>
                      <span>{{ $data->deskripsi }}</span>
                    </p>
                    <br>
                    
                    <p>
                      <b>Teknisi: </b><br>
                      <span>BSID23 - Rizal Muslim</span>
                    </p>
                    <br>
                    <form class="form-horizontal" id="input-form" action="{{ url('store-close',$data->id_laporan) }}" method="post">
                      {!! csrf_field() !!}
                      <p>
                        <label class="control-label">Keterangan Close</label>
                        <div>
                        <textarea name="keterangan_close" id="keterangan_close" class="form-control" rows="3" style="resize: none;" autofocus></textarea>
                        @if ($errors->has('keterangan_close'))
                          <span class="help-block">
                            <strong style="color: red">{{ $errors->first('keterangan_close') }}</strong>
                          </span>
                        @endif
                        </div>
                      </p>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="button" class="btn btn-default"onclick="location.href='{{ url()->previous() }}';">Kembali</button>
                          <button type="submit" class="btn btn-primary">Close</button>
                        </div>
                      </div>
                    </form>
                    <br>
                </div>
              </div>
              <br>
            </div>
          </div>
          <h5 class="text-center">
            {{-- <a href="{{ url('close') }}">Kembali</a> --}}
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