<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Permohonan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan</a></li>
            <li class="breadcrumb-item active">Permohonan</li>
        </ol>
    </div>  
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <table id="tpermohonan" class="display nowrap table table-hover table-condensed" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="12%">Nomor Layanan</th>
                            <th width="25%">Nama Pemohon</th>
                            <th>Email</th>
                            <th width="20%">Status</th>
                            <th width="10%">Tanggal</th>
                            <th width="15%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal detail permohonan -->
<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Permohonan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Tampil Data -->
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama Pemohon: </td>
                            <td id="nama_pemohon"></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>Alamat: </td>
                            <td id="alamat"></td>
                        </tr>
                        <tr>
                            <td>Telepon: </td>
                            <td id="telepon"></td>
                        </tr>
                        <tr>
                            <td>Identitas: </td>
                            <td id="identitas"></td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            <td id="status"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit permohonan -->
<div id="modal-ubah" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></i> Ubah Permohonan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /.box-header -->
            <form class="pl-3 pr-3 text-left" id="form-ubah" onsubmit="return false">
                <input type="hidden" name="permohonan_id">
                <?php $this->load->view('permohonan/_form'); ?>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <!-- Id tombol-simpan di ubah ke tombol-ubah -->
                    <button type="submit" class="btn btn-info waves-effect" id="tombol-update">Save</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal tambah permohonan -->
<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Permohonan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" onsubmit="return false">
                    <div class="form-group">
                        <label class="control-label">Nama Pemohon</label>
                        <input type="text" class="form-control" name="nama_pemohon">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telepon</label>
                        <input type="text" class="form-control" name="telepon">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Identitas</label>
                        <input type="text" class="form-control" name="identitas">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <input type="text" class="form-control" name="status">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect" id="tombol-simpan">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->