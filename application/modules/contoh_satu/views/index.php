<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#modal-tambah" type="button"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah Data</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tcontoh" class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Tanggal Beli</th>
                            <th>Status</th>
                            <th width="8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div id="modal-tambah" data-backdrop="static" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4> 
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-tambah">
                <?php $this->load->view('_form')?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" id="tombol-submit" class="btn btn-info waves-effect">Simpan</button>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>

<!-- sample modal content -->
<div id="modal-ubah" data-backdrop="static" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Ubah Data</h4> 
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-ubah">
                    <input type="hidden" name="id" value="">
                <?php $this->load->view('_form')?>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-left">Terakhir diubah <span id="text-mdd"></span> <br> Oleh <span id="text-mdb"></span></p>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Tutup</button>
                        <button type="button" id="tombol-ubah" class="btn btn-info waves-effect">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
