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
            $('#tambah-pelunasan-link').click(function(e) {
                $("#tambah-pelunasan").delay(100).fadeIn(100);
                $("#hapus-pelunasan").fadeOut(100);
                $("#early-bird").fadeOut(100);
                $("#normal").fadeOut(100);
                $("#belum-lunas").fadeOut(100);
                $('#hapus-pelunasan-link').removeClass('active');
                $('#early-bird-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $('#belum-lunas-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#hapus-pelunasan-link').click(function(e) {
                $("#hapus-pelunasan").delay(100).fadeIn(100);
                $("#tambah-pelunasan").fadeOut(100);
                $("#early-bird").fadeOut(100);
                $("#normal").fadeOut(100);
                $("#belum-lunas").fadeOut(100);
                $('#tambah-pelunasan-link').removeClass('active');
                $('#early-bird-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $('#belum-lunas-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#early-bird-link').click(function(e) {
                $("#early-bird").delay(100).fadeIn(100);
                $("#hapus-pelunasan").fadeOut(100);
                $("#tambah-pelunasan").fadeOut(100);
                $("#normal").fadeOut(100);
                $("#belum-lunas").fadeOut(100);
                $('#hapus-pelunasan-link').removeClass('active');
                $('#tambah-pelunasan-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $('#belum-lunas-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#belum-lunas-link').click(function(e) {
                $("#belum-lunas").delay(100).fadeIn(100);
                $("#hapus-pelunasan").fadeOut(100);
                $("#early-bird").fadeOut(100);
                $("#tambah-pelunasan").fadeOut(100);
                $("#normal").fadeOut(100);
                $('#hapus-pelunasan-link').removeClass('active');
                $('#early-bird-link').removeClass('active');
                $('#tambah-pelunasan-link').removeClass('active');
                $('#normal-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

            //SUBMIT PELUNASAN
                $("#tambah-pelunasan").submit(function (e) {
                    e.preventDefault();
                    form = $("#tambah-pelunasan").serialize();
                    $.ajax({
                        type: "POST",
                        url : "<?php echo base_url('HistoryMaker/insertPelunasan') ;?>",
                        data: form,
                        async: true,
                        datatype: 'text',
                        success : function (data) {
                            reloadBelumLunas();
                            reloadSudahLunas();
                            alert(data);
                        },
                        error: function(e) {
                            alert(e);
                        }
                    });

                })

            //DELETE PELUNASAN
            $("#hapus-pelunasan").submit(function (e) {
                e.preventDefault();
                form = $("#hapus-pelunasan").serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php  echo base_url('HistoryMaker/deletePelunasan'); ?>",
                    data: form,
                    async:true,
                    dataType : 'text',
                    success: function(data){
                        reloadBelumLunas();
                        reloadSudahLunas();
                        alert(data);
                    }

                });
            });
            //RELOAD SUDAH LUNAS
            reloadSudahLunas();
            function reloadSudahLunas() {
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('HistoryMaker/querySudahLunas')?>',
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
                                    '<td>'+data[i].line+'</td>'+
                                    '</tr>';
                            }
                            $("#tbody-lunas").html(html);
                        }else{
                            $("#tbody-lunas").html("");
                        }

                        $('#table-lunas').DataTable();
                    },
                    error: function(e) {
                        alert(e);
                    }

                });
            }

            //RELOAD BELUM LUNAS
            reloadBelumLunas();
            function reloadBelumLunas() {
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('HistoryMaker/queryBelumLunas')?>',
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
                                    '<td>'+data[i].line+'</td>'+
                                    '</tr>';
                            }
                            $("#tbody-belum-lunas").html(html);
                        }else{
                            $("#tbody-belum-lunas").html("");
                        }

                        $('#table-belum-lunas').DataTable();
                    }

                });
            }

            //EXPORT LUNAS
            $("#exportSudahLunas").click(function () {
                window.location.href = "<?php echo base_url('HistoryMaker/exportSudahLunas')?>";
            });
			
			//EXPORT LUNAS
            $("#exportBelumLunas").click(function () {
                window.location.href = "<?php echo base_url('HistoryMaker/exportBelumLunas')?>";
            });
        });



    </script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active" id="tambah-pelunasan-link">Tambah Pelunasan</a>
                <a href="#" class="list-group-item list-group-item-action" id="hapus-pelunasan-link">Hapus Pelunasan</a>
                <a href="#" class="list-group-item list-group-item-action" id="early-bird-link">Data Mahasiswa Lunas</a>
                <a href="#" class="list-group-item list-group-item-action" id="belum-lunas-link">Data Mahasiswa Belum Lunas</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form id="tambah-pelunasan" role="form" style="display: block;" method="post" href="#">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Tambah Pelunasan</h4>
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
                        <button type="submit" name="submitTambah" class="btn btn-primary col-md-3 offset-1" id="submitTambah" href="#">Submit</button>
                    </form>
                    <form id="hapus-pelunasan" role="form" style="display: none;" method="post" href="#">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Hapus Pelunasan</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="judul" class="col-1  col-form-label">NRP*</label>
                                    <div class="col-8">
                                        <input id="nrp" name="nrp" placeholder="NRP" class="form-control here" maxlength="9" minlength="9" required="required" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submitHapus" class="btn btn-danger col-md-3 offset-1" id="submitHapus" href="#">Submit</button>
                    </form>
                    <form id="early-bird" role="form" style="display: none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <h4 class="col-md-8">Daftar Mahasiswa Lunas </h4>
                                    <button class="btn btn-primary col-md-2" type="button" id="exportSudahLunas">Export</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-lunas" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                        <th>LINE</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-lunas">
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                        <th>LINE</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form id="belum-lunas" role="form" style="display: none;">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Daftar Mahasiswa Belum Lunas</h4>
								<button class="btn btn-primary col-md-2" type="button" id="exportBelumLunas">Export</button>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-belum-lunas" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                        <th>LINE</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-belum-lunas">
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>NRP</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>JURUSAN</th>
                                        <th>LINE</th>
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
