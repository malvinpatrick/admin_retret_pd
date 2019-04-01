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
            //Tab Artikel Admin
            $('#tambah-registrasi-link').click(function(e) {
                $("#tambah-registrasi").delay(100).fadeIn(100);
                $("#hapus-registrasi").fadeOut(100);
                $("#sudah-regis").fadeOut(100);
                $("#normal").fadeOut(100);
                $("#belum-regis").fadeOut(100);
                $('#hapus-registrasi-link').removeClass('active');
                $('#sudah-regis-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $('#belum-regis-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#hapus-registrasi-link').click(function(e) {
                $("#hapus-registrasi").delay(100).fadeIn(100);
                $("#tambah-registrasi").fadeOut(100);
                $("#sudah-regis").fadeOut(100);
                $("#normal").fadeOut(100);
                $("#belum-regis").fadeOut(100);
                $('#tambah-registrasi-link').removeClass('active');
                $('#sudah-regis-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $('#belum-regis-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#sudah-regis-link').click(function(e) {
                $("#sudah-regis").delay(100).fadeIn(100);
                $("#hapus-registrasi").fadeOut(100);
                $("#tambah-registrasi").fadeOut(100);
                $("#normal").fadeOut(100);
                $("#belum-regis").fadeOut(100);
                $('#hapus-registrasi-link').removeClass('active');
                $('#tambah-registrasi-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $('#belum-regis-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#belum-regis-link').click(function(e) {
                $("#belum-regis").delay(100).fadeIn(100);
                $("#hapus-registrasi").fadeOut(100);
                $("#sudah-regis").fadeOut(100);
                $("#tambah-registrasi").fadeOut(100);
                $("#normal").fadeOut(100);
                $('#hapus-registrasi-link').removeClass('active');
                $('#sudah-regis-link').removeClass('active');
                $('#tambah-registrasi-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

            //SUBMIT REGISTRASI
            $("#tambah-registrasi").submit(function (e) {
               e.preventDefault();
                form = $("#tambah-registrasi").serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php  echo base_url('HistoryMaker/insertRegistrasi'); ?>",
                    data: form,
                    async:true,
                    dataType : 'text',
                    success: function(data){
                        reloadBelumRegis();
                        reloadSudahRegis();
                        alert(data);
                    }

                });
            });

            //DELETE REGISTRASI
            $("#hapus-registrasi").submit(function (e) {
                e.preventDefault();
                form = $("#hapus-registrasi").serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php  echo base_url('HistoryMaker/deleteRegistrasi'); ?>",
                    data: form,
                    async:true,
                    dataType : 'text',
                    success: function(data){
                        reloadBelumRegis();
                        reloadSudahRegis();
                        alert(data);
                    }

                });
            });
            
            //EXPORT SUDAH REGIS
            $("#exportSudahRegis").click(function () {
                window.location.href = "<?php echo base_url('HistoryMaker/exportSudahRegis')?>";
            });

            //RELOAD SUDAH REGIS
            reloadSudahRegis();
            function reloadSudahRegis() {
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('HistoryMaker/querySudahRegis')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        if(data.length >= 0){
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                    '<td>'+data[i].nama+'</td>'+
                                    '<td>'+data[i].nrp+'</td>'+
                                    '<td>'+data[i].jk+'</td>'+
                                    '<td>'+data[i].jurusan+'</td>'+
                                    '</tr>';
                            }
                            $("#tbody-sudah-regis").html(html);
                        }else{
                            $("#tbody-sudah-regis").html("");
                        }

                        $('#table-sudah-regis').DataTable();
                    }

                });
            }

            //RELOAD BELUM REGIS
            reloadBelumRegis();
            function reloadBelumRegis() {
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('HistoryMaker/queryBelumRegis')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        if(data.length > 0){
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                    '<td>'+data[i].nama+'</td>'+
                                    '<td>'+data[i].nrp+'</td>'+
                                    '<td>'+data[i].jk+'</td>'+
                                    '<td>'+data[i].jurusan+'</td>'+
                                    '</tr>';
                            }
                            $("#tbody-belum-regis").html(html);
                        }else{
                            $("#tbody-belum-regis").html("");
                        }

                        $('#table-belum-regis').DataTable();
                    }

                });
            }

        });



    </script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active" id="tambah-registrasi-link">Tambah Registrasi</a>
                <a href="#" class="list-group-item list-group-item-action" id="hapus-registrasi-link">Hapus Registrasi</a>
                <a href="#" class="list-group-item list-group-item-action" id="sudah-regis-link">Data Sudah Registrasi</a>
                <a href="#" class="list-group-item list-group-item-action" id="belum-regis-link">Data Belum Registrasi</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form id="tambah-registrasi" role="form" style="display: block;" method="post" href="#">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Tambah Registrasi Ulang</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="judul" class="col-1  col-form-label">NRP*</label>
                                    <div class="col-8">
                                        <input id="nrp-insert" name="nrp-insert" placeholder="NRP" class="form-control here" maxlength="9" minlength="9" required="required" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submitTambah" class="btn btn-primary col-md-3 offset-1" id="submitTambah" value="Submit">
                    </form>
                    <form id="hapus-registrasi" role="form" style="display: none;" method="post" href="#">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Hapus Registrasi Ulang</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="judul" class="col-1  col-form-label">NRP*</label>
                                    <div class="col-8">
                                        <input id="nrp-delete" name="nrp-delete" placeholder="NRP" class="form-control here" maxlength="9" minlength="9" required="required" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submitHapus" class="btn btn-danger col-md-3 offset-1" id="submitHapus" href="#">Submit</button>
                    </form>
                    <form id="sudah-regis" role="form" style="display: none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <h4 class="col-md-8">Daftar Mahasiswa yang Sudah Registrasi Ulang </h4>
                                    <button class="btn btn-primary col-md-2" type="button" id="exportSudahRegis">Export</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-sudah-regis" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-sudah-regis">
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form id="belum-regis" role="form" style="display: none;">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Daftar Mahasiswa yang Belum Registrasi Ulang</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-belum-regis" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-belum-regis">
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
