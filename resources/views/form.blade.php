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
    <title>Layanan Helpdesk Setjen MPR RI</title>
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
    <!-- css untuk select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!-- cdn bootstrap4 -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
  </head>
  <body class="background">
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <img src="assets/img/logo.png" style="width:72px;" class="pull-left">
        <h1 class="text-uppercase">LAYANAN HELPDESK SEKRETARIAT JENDERAL MPR RI</h1>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <br>
              <h2>Formulir Layanan</h2>
              <br>
              <form id="input-form" action="{{ url('store-laporan') }}" method="post">
                {!! csrf_field() !!}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-group-lg control-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                      <label>Nama Pemohon <span class="text-danger">*</span></label>
                      <input name="nama" type="text" value="{{ old('nama') }}" class="form-control" placeholder="Nama Pemohon">
                        @if ($errors->has('nama'))
                          <span class="help-block">
                            <strong style="color: red">{{ $errors->first('nama') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-lg">
                      <label>No Telp / Whatsapp <span class="text-danger">*</span></label>
                      <input name="no_tlp" value="{{ old('no_tlp') }}" type="text" class="form-control" placeholder="No Telp / Whatsapp">
                        @if ($errors->has('no_tlp'))
                          <span class="help-block">
                            <strong style="color: red">{{ $errors->first('no_tlp') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-lg">
                      <label>Unit/ Bagian <span class="text-danger">*</span></label>
                      <select id="unit" name="unit" class="form-control">
                        {{-- <option value=""></option> --}}
                        <option value="" disable="true" selected="true">--- Unit/Bagian ---</option>
                        @foreach ($biro as $biro => $unit)
                          <optgroup label="">
                          <optgroup label="{{$biro}}">

                          @foreach ($unit as $unit)
                            <option value="{{ $unit->kode_unit }}">{{ $unit->nama_unit }}</option>
                          @endforeach

                        @endforeach
                        
                        
                      </select>
                        @if ($errors->has('unit'))
                          <span class="help-block">
                            <strong style="color: red">{{ $errors->first('unit') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-lg">
                      <label>Lokasi / Ruangan <span class="text-danger">*</span></label>
                      <input name="ruangan" type="text" value="{{ old('ruangan') }}" class="form-control" placeholder="Lokasi / Ruangan">
                        @if ($errors->has('ruangan'))
                          <span class="help-block">
                            <strong style="color: red">{{ $errors->first('ruangan') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  {{-- <div class="form-group form-group-lg">
                    <label class="col-sm-3 control-label">Ditangani Oleh</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="teknisi" name="teknisi[]">
                        <option value=""></option>
                        @foreach ($teknisi as $data)
                        <option value="{{ $data->nama_teknisi }}">{{ $data->nama_teknisi }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> --}}
                  <div class="col-md-12">
                    <div class="form-group form-group-lg">
                      <label>Subyek dan Deskripsi <span class="text-danger">*</span></label>
                      <select name="subjek" class="form-control">

                        <option value="" disable="true" selected="true">--- Subjek ---</option>
                        @foreach ($subjek as $subjek)
                          <option value="{{ $subjek->kode_subjek }}">{{ $subjek->subjek }}</option>
                        @endforeach
                        
                      </select>
                      @if ($errors->has('subjek'))
                        <span class="help-block">
                          <strong style="color: red">{{ $errors->first('subjek') }}</strong>
                        </span>
                      @endif
                      <br>
                      <textarea name="deskripsi" class="form-control" rows="3" pattern="^((?!href).)*$" placeholder="Deskripsi Layanan / Keluhan / Gangguan">{{ old('deskripsi') }}</textarea>
                        @if ($errors->has('deskripsi'))
                          <span class="help-block">
                            <strong style="color: red">{{ $errors->first('deskripsi') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                </div>
                <br>
                <p>
                  <button type="submit" class="btn btn-primary btn-lg text-uppercase">Kirim Formulir</button>
                  &nbsp;  
                  <button type="button" class="btn btn-default btn-lg text-uppercase" onclick="location.href='laporan';">Lihat Laporan</button>
                </p>
                <br>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default address">
            <div class="panel-body">
              <br>
              <h4>Keterangan</h4>
              <br>
              <div class="well well-sm">
                <ul>
                  <li>Isi formulir dengan baik agar jelas informasinya</li>
                  <li>Permohonan diselesaikan oleh Bagian Sistem Informasi dan Data berdasarkan urutan antrian</li>
                  <li>Formulir wajib di isi, untuk memudahkan dalam pendataan</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default address">
            <div class="panel-body">
              <a href="https://api.whatsapp.com/send?phone=622157895285" target="_blank">
                <h3>
                  <span class="glyphicon glyphicon-phone purple" aria-hidden="true"></span> &nbsp; +62 21-5789-5285
                </h3>
              </a>
            </div>
          </div>
          
          <!-- 16:9 aspect ratio -->
          <div class="embed-responsive embed-responsive-16by9 videoplayback">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/oUNlZX_7eOY"></iframe>
          </div>
        </div>
      </div>
      <!-- Site footer -->
      <br>
      <footer class="footer">
        <p>&copy; 2021 Bharana Sistem, ID</p>
      </footer>
      <br>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- wajib jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <!-- js untuk bootstrap4  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // $("#teknisi").select2({
            //     placeholder: "--- Teknisi ---"
            // });

            // $("#unit").select2({
            //     placeholder: "--- Unit/Bagian ---"
            // });
        });
    </script>
  </body>
</html>