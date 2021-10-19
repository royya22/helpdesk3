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
    <title>Daftar Antrian Tiket</title>
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
    <!-- Tablesorter: required for bootstrap -->
    <link rel="stylesheet" href="assets/css/theme.bootstrap.css">
    <script src="assets/js/jquery.tablesorter.js"></script>
    <script src="assets/js/jquery.tablesorter.widgets.js"></script>
    <!-- Tablesorter: optional -->
    <link rel="stylesheet" href="assets/js/jquery.tablesorter.pager.css">
    <script src="assets/js/jquery.tablesorter.pager.js"></script>
    <script id="js">$(function() {
      // NOTE: $.tablesorter.theme.bootstrap is ALREADY INCLUDED in the jquery.tablesorter.widgets.js
      // file; it is included here to show how you can modify the default classes
      $.tablesorter.themes.bootstrap = {
        // these classes are added to the table. To see other table classes available,
        // look here: http://getbootstrap.com/css/#tables
        table        : 'table table-bordered table-striped',
        caption      : 'caption',
        // header class names
        header       : 'bootstrap-header', // give the header a gradient background (theme.bootstrap_2.css)
        sortNone     : '',
        sortAsc      : '',
        sortDesc     : '',
        active       : '', // applied when column is sorted
        hover        : '', // custom css required - a defined bootstrap style may not override other classes
        // icon class names
        icons        : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
        iconSortNone : 'bootstrap-icon-unsorted', // class name added to icon when column is not sorted
        iconSortAsc  : 'icon-chevron-up glyphicon glyphicon-chevron-up', // class name added to icon when column has ascending sort
        iconSortDesc : 'icon-chevron-down glyphicon glyphicon-chevron-down', // class name added to icon when column has descending sort
        filterRow    : '', // filter row class
        footerRow    : '',
        footerCells  : '',
        even         : '', // even row zebra striping
        odd          : ''  // odd row zebra striping
      };
      
      // call the tablesorter plugin and apply the uitheme widget
      $("table").tablesorter({
        // this will apply the bootstrap theme if "uitheme" widget is included
        // the widgetOptions.uitheme is no longer required to be set
        theme : "bootstrap",
      
        widthFixed: true,
      
        headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
      
        // widget code contained in the jquery.tablesorter.widgets.js file
        // use the zebra stripe widget if you plan on hiding any rows (filter widget)
        widgets : [ "uitheme", "filter", "zebra" ],
      
        widgetOptions : {
          // using the default zebra striping class name, so it actually isn't included in the theme variable above
          // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
          zebra : ["even", "odd"],
      
          // reset filters button
          filter_reset : ".reset"
      
          // set the uitheme widget to use the bootstrap theme class names
          // this is no longer required, if theme is set
          // ,uitheme : "bootstrap"
      
        }
      })
      .tablesorterPager({
      
        // target the pager markup - see the HTML block below
        container: $(".ts-pager"),
      
        // target the pager page select dropdown - choose a page
        cssGoto  : ".pagenum",
      
        // remove rows from the table to speed up the sort of large tables.
        // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
        removeRows: false,
      
        // output string - default is '{page}/{totalPages}';
        // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
        output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
      
      });
      
      });
    </script>
    <script>
      $(function(){
      
        // filter button demo code
        $('button.filter').click(function(){
          var col = $(this).data('column'),
            txt = $(this).data('filter');
          $('table').find('.tablesorter-filter').val('').eq(col).val(txt);
          $('table').trigger('search', false);
          return false;
        });
      
        // toggle zebra widget
        $('button.zebra').click(function(){
          var t = $(this).hasClass('btn-success');
      //      if (t) {
            // removing classes applied by the zebra widget
            // you shouldn't ever need to use this code, it is only for this demo
      //        $('table').find('tr').removeClass('odd even');
      //      }
          $('table')
            .toggleClass('table-striped')[0]
            .config.widgets = (t) ? ["uitheme", "filter"] : ["uitheme", "filter", "zebra"];
          $(this)
            .toggleClass('btn-danger btn-success')
            .find('i')
            .toggleClass('icon-ok icon-remove glyphicon-ok glyphicon-remove').end()
            .find('span')
            .text(t ? 'disabled' : 'enabled');
          $('table').trigger('refreshWidgets', [false]);
          return false;
        });
      });
    </script>
    <script type="text/javascript">
      $(function() {
        // call the tablesorter plugin
        $("table").tablesorter({
          theme : 'blue',

          dateFormat : "mmddyyyy", // set the default date format

          // or to change the format for specific columns, add the dateFormat to the headers option:
          headers: {
            0: { sorter: "shortDate" } //, dateFormat will parsed as the default above
            // 1: { sorter: "shortDate", dateFormat: "ddmmyyyy" }, // set day first format; set using class names
            // 2: { sorter: "shortDate", dateFormat: "yyyymmdd" }  // set year first format; set using data attributes (jQuery data)
          }

        });
      });
    </script>
  </head>
  <body class="background">
    <!-- Begin page content -->
    <div class="container-fluid">
      <div class="page-header">
        <h1 class="text-uppercase text-center">Daftar Antrian Tiket</h1>
      </div>
      <div id="demo" class="table-responsive">
        <table class="tablesorter">
          <thead>
            <tr>
              <th class="col-md-1"><b>ID Form</b></th>
              <th class="sorter-shortDate dateFormat-ddmmyyyy"><b>Tanggal Laporan</b></th>
              <th class="col-md-1"><b>Nama Pemohon</b></th>
              <th class="col-md-2 filter-select filter-exact" data-placeholder="---"><b>Unit/ Bagian</b></th>
              <th class="col-md-2"><b>Ruangan</b></th>
              <th class="col-md-1 filter-select filter-exact" data-placeholder="---"><b>Subyek</b></th>
              <th class="col-md-2"><b>Deskripsi</b></th>
              <th class="col-md-1 filter-select filter-exact" data-placeholder="---"><b>Status</b></th>
              <th class="col-md-1"><b>Keterangan</b></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="9" class="ts-pager form-horizontal">
                <button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
                <button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
                <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                <button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
                <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
                <select class="pagesize input-mini" title="Select page size">
                  <option selected="selected" value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                </select>
                <select class="pagenum input-mini" title="Select page number"></select>
                <div class="btn-group" style="float:right" role="group" aria-label="...">
                  <!-- use the filter_reset : '.reset' option or include data-filter="" using the filter button demo code to reset the filters -->
                  <button type="button" class="reset btn btn-primary" data-column="0" data-filter=""><i class="icon-white icon-refresh glyphicon glyphicon-refresh"></i> &nbsp; Atur Ulang</button>
                  <button type="button" class="zebra btn btn-success hidden"><i class="icon-white icon-ok glyphicon glyphicon-ok"></i> &nbsp; <span>enabled</span></button>
                </div>
              </th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($laporan as $laporan)
              <tr>
                <td>{{ $laporan->kode_permohonan }}</td>
                <td>{{ $laporan->created_at }}</td>
                <td>{{ $laporan->nama_pemohon }}</td>
                <td>{{ $laporan->k_unit->nama_unit }}</td>
                <td>{{ $laporan->ruangan }}</td>
                <td>{{ $laporan->k_subjek->subjek }}</td>
                <td>{{ $laporan->deskripsi }}</td>
                <td><span style="display: inline-block; width: 100px;height: 20px;" class="label 
                    <?php 
                      if ($laporan->status == "1") {
                        echo "label-danger";
                    ?>"><p style="margin-top: 3px;color: white;font-weight: bold">Open</p><?php
                      }elseif ($laporan->status == "2") {
                        echo "label-warning";
                    ?>"><p style="margin-top: 3px;color: white;font-weight: bold">Pending</p><?php
                      } elseif ($laporan->status == "3") {
                        echo "label-success";
                    ?>"><p style="margin-top: 3px;color: white;font-weight: bold">Close</p><?php
                      }
                    ?>
                  </span></td>
                <td>
                  <?php 
                    if ($laporan->status == "3") {
                      echo $laporan->keterangan_close;
                    }elseif ($laporan->status == "2") {
                      echo $laporan->keterangan_pending;
                    }elseif ($laporan->status == "1") {
                      echo "-";
                    } 
                  ?>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <h5 class="text-center">
        <a href="{{ url('/') }}">Kembali ke Beranda</a>
      </h5>
    </div>
  </body>
</html>