
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://setjen.mpr.go.id/img/setjen-min.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/offcanvas/">

    <title>Master Teknisi</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
  </head>

  <body class="dashboard">

    @section('menu')
      <?php $menu = "teknisi"; ?>
    @endsection
    
    @include('dashboard.header')

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-left">

        @include('dashboard.menu')

        <div class="col-xs-12 col-sm-9">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary" data-toggle="offcanvas">Menu</button>
          </p>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default address">
                <br>
                <div class="panel-heading">
                  <h3 class="panel-title">Teknisi
                    @if (Session::get('username') == 'bsid')
                      &nbsp; <small><a href="{{ url('create-teknisi') }}"><span class="label label-info">+ Tambah Teknisi</span></a> &nbsp; <a class="label label-info" href="{{ url('cetak-teknisi') }}" target="_blank" style="float: right;color: white"><span class="glyphicon glyphicon-print" aria-hidden="true" style="color: white"></span> &nbsp;  Cetak</a></small></h3>
                    @endif
                </div>
                <br>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table id="myTablee" class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID Teknisi</th>
                          <th>Nama Teknisi</th>
                          <th>Jan</th>
                          <th>Feb</th>
                          <th>Mar</th>
                          <th>Apr</th>
                          <th>Mei</th>
                          <th>Jun</th>
                          <th>Jul</th>
                          <th>Agu</th>
                          <th>Sep</th>
                          <th>Okt</th>
                          <th>Nov</th>
                          <th>Des</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr class="success">
                          <th colspan="2">Total</th>

                            <?php for ($i=1; $i < 14; $i++) { 
                              echo "<th>".$totalv[$i]."</th>";
                            } ?>

                        </tr>
                      </tfoot>
                      <tbody>
                        <?php $a = 1 ?>
                        @foreach ($teknisi as $teknisi)
                          <tr>
                            <th scope="row">{{ $teknisi->kode_teknisi }}</th>
                            <td>@if (Session::get('username') == 'bsid')<a href="{{ url('detail-teknisi', $teknisi->id_teknisi) }}">{{ $teknisi->nama_teknisi }}</a>@else {{ $teknisi->nama_teknisi }} @endif</td>
                            
                            <?php for ($i=1; $i < 13; $i++) {  ?>
                              <td>{{ $laporan[$a][$i] }}</td>
                            <?php } ?>

                            <td>{{ $totalh[$a] }}</td>

                            <?php $a++; ?>

                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <p style="margin:0">
                    {{-- <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp; Cetak</button> --}}
                  </p>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="assets/js/offcanvas.js"></script>
    <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.dataTables.bootstrap.js') }}"></script>
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>
