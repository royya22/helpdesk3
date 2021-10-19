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
  </head>
  <body class="dashboard">
    <!-- Begin page content -->
    <div class="container">
      <br>
      <p class="text-center">
        <button type="button" class="btn btn-default"onclick="location.href='{{ url()->previous() }}';">&larr; Kembali</button>
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
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Insiden</label>
                  <div class="col-sm-9">
                    <h1 class="text-uppercase">XXI0921A</h1>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control">
                    <small><span id="helpBlock" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Waktu</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <input type="time" class="form-control">
                      <div class="input-group-addon">WIB</div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Penyampaian (Alur)</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="plot" id="plot1" value="email" checked>
                        Melalui Surat Elektronik
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="plot" id="plot2" value="call">
                        Telepon
                      </label>
                    </div>
                    <div class="radio disabled">
                      <label>
                        <input type="radio" name="plot" id="plot3" value="walkin">
                        Disampaikan Langsung
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Lokasi Insiden</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-9">
                    <div class="well col-sm-4">
                      <span id="helpBlock" class="help-block">Hardware</span>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Kabel</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Listrik</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Switch</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Server</label>
                      </div>
                    </div>
                    <div class="well col-sm-4">
                      <span id="helpBlock" class="help-block">Software</span>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Email</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Antivirus</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">APK</label>
                      </div>
                    </div>
                    <div class="well col-sm-4">
                      <span id="helpBlock" class="help-block">Network</span>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Jaringan</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Pengerjaan</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="repair" id="repair1" value="come" checked>
                        Mendatangi
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="repair" id="repair2" value="remote">
                        <i>Remote Control</i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Analisis</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Solusi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Eskalasi?</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label>
                        <input type="radio" name="escalation" id="escalation1" value="yes">
                        Ya
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="escalation" id="escalation2" value="no" checked>
                        Tidak
                      </label>
                    </div>
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
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Ditangani Oleh</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>Catur</option>
                      <option>Rizal</option>
                      <option>Firly</option>
                      <option>Royya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Solusi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Inputkan</button>
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
    <script>window.jQuery || document.write('<script src="../assets/js/jquery.min.js"><\/script>')</script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>