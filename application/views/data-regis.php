<!DOCTYPE html>
<html>
<head>
    <title>Admin HM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--TAMBAHAN DATATABLES-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            reloadTabel();

            //Reload Query Artikel
            function reloadTabel() {
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo site_url('HistoryMaker/reloadData')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        if(data.length >= 0){
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                    '<td>'+data[i].NRP+'</td>'+
                                    '<td>'+data[i].NAMA+'</td>'+
                                    '<td>'+data[i].JURUSAN+'</td>'+
                                    '<td>'+data[i].LINE+'</td>'+
                                    '<td>'+data[i].alergi+'</td>'+
                                    '</tr>';
                            }
                            $("#tbody-data").html(html);
                        }else{
                            $("#tbody-data").html("");
                        }
                        $('#example').DataTable();
                    }

                });
            }
			
			//EXPORT PENDAFTARAN
            $("#exportPendaftaran").click(function () {
                window.location.href = "<?php echo base_url('HistoryMaker/exportPendaftaran')?>";
            });
        });
    </script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active" id="daftar-mahasiswa-link">Daftar Mahasiswa</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div id="daftar-mahasiswa" role="form" style="display: block;" method="post" href="#">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Daftar Mahasiswa yang Daftar</h4>
								<button class="btn btn-primary col-md-2" type="button" id="exportPendaftaran">Export</button>
                                <hr>
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>ID Line</th>
                                <th>Alergi</th>
                            </tr>
                            </thead>
                            <tbody id="tbody-data">
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>ID Line</th>
                                <th>Alergi</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
