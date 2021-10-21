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
    <title>Form Insiden</title>
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
  <body class="dashboard">
    <!-- Begin page content -->
    <div class="container">
      <br>
      <p class="text-center">
        <button type="button" class="btn btn-default"onclick="location.href='{{ url('insiden') }}';">&larr; Kembali</button>
        <button type="button" class="btn btn-primary">Cetak</button>
      </p>
      <br>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default address">
            <div class="panel-body">
              <br>
              <center>
                <img class="img-responsive" alt="Responsive image" src="assets/img/sid.svg" style="max-width:120px">
                <h3>Formulir Pencatatan Insiden</h3>
                <p>
                  Bagian Sistem Informasi dan Data
                </p>
              </center>
              <hr>
              <form class="form-horizontal" action="{{ url('store-insiden') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Insiden</label>
                  <div class="col-sm-9">
                    <h1 class="text-uppercase">{{ $kode_insiden }}</h1>
                    <input hidden type="text" name="kode_insiden" id="kode_insiden" class="span6" value="{{ $kode_insiden }}"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="tgl">
                    @if ($errors->has('tgl'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('tgl') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Waktu</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <input type="time" class="form-control" name="jam">
                      <div class="input-group-addon">WIB</div>
                    </div>
                    @if ($errors->has('jam'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('jam') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Penyampaian (Alur)</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="alur" id="alur" value="Melalui Surat Elektronik" checked>
                        Melalui Surat Elektronik
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="alur" id="alur" value="Telepon">
                        Telepon
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="alur" id="alur" value="Disampaikan Langsung">
                        Disampaikan Langsung
                      </label>
                    </div>
                    @if ($errors->has('alur'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('alur') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Lokasi Insiden</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;" name="lokasi"></textarea>
                    @if ($errors->has('lokasi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('lokasi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-9">
                    <select class="form-control" multiple="multiple" id="kategori" name="kategori[]">
                        <optgroup label="Hardware">
                          <option value="Kabel">Kabel</option>
                          <option value="Listrik">Listrik</option>
                          <option value="Switch">Switch</option>
                          <option value="Server">Server</option>
                        </optgroup>
                        <optgroup label="Software">
                          <option value="Email">Email</option>
                          <option value="Antivirus">Antivirus</option>
                          <option value="APK">APK</option>
                        </optgroup>
                        <optgroup label="Network">
                          <option value="Jaringan">Jaringan</option>
                        </optgroup>
                    </select>
                    @if ($errors->has('kategori'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('kategori') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;" name="deskripsi"></textarea>
                    @if ($errors->has('deskripsi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('deskripsi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Pengerjaan</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="pengerjaan" id="pengerjaan" value="Mendatangi" checked>
                        Mendatangi
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="pengerjaan" id="pengerjaan" value="Remote">
                        <i>Remote</i>
                      </label>
                    </div>
                    @if ($errors->has('pengerjaan'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('pengerjaan') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Analisis</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;" name="analisis"></textarea>
                    @if ($errors->has('analisis'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('analisis') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Solusi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;" name="solusi"></textarea>
                    @if ($errors->has('solusi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('solusi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Eskalasi?</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="eskalasi" id="eskalasi" value="Ya">
                        Ya
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="eskalasi" id="eskalasi" value="Tidak" checked>
                        Tidak
                      </label>
                    </div>
                    @if ($errors->has('eskalasi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('eskalasi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="status1" value="open" checked>
                        <i>Open</i>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="status2" value="pending">
                        <i>Pending</i>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="status3" value="close">
                        <i>Close</i>
                      </label>
                    </div>
                    @if ($errors->has('status'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Ditangani Oleh</label>
                  <div class="col-sm-9">
                    <select class="form-control" multiple="multiple" id="teknisi" name="teknisi[]">
                      <option value=""></option>
                      @foreach ($teknisi as $data)
                      <option value="{{ $data->kode_teknisi }}">{{ $data->nama_teknisi }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('teknisi'))
                      <span class="help-block">
                        <strong style="color: red">{{ $errors->first('teknisi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                {{-- <div class="form-group">
                  <label class="col-sm-3 control-label">Solusi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                  </div>
                </div> --}}
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
            $("#teknisi").select2({
                placeholder: "Please Select"
            });

            $("#kategori").select2({
                placeholder: "Please Select"
            });
        });
    </script>
  </body>
</html>