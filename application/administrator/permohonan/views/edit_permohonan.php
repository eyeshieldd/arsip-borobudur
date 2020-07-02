<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Permohonan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url('permohonan')?>">All Permohonan</a></li>
            <li class="breadcrumb-item active">Edit Permohonan</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <a href="<?= site_url('permohonan') ?>" class="btn float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i></i> Update Data</a>        
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <table width="100%" class="table table-condensed">
                    <tr>
                        <td width="40%">Nama Pemohon</td>
                        <td>Nama Pemohon</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <form method="post" id="form-tambah" onsubmit="return false">
                    <div class="form-group">
                        <label class="control-label">Nama Pemohon</label>
                        <input type="text" class="form-control" name="post_title" value="<?= $permohonan->nama_pemohon; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $permohonan->email; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $permohonan->alamat; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telepon/Handphone</label>
                        <input type="text" class="form-control" name="telepon" value="<?= $permohonan->telepon; ?>">
                    </div>                                        
                    <div class="form-group">
                        <label class="control-label">Identitas</label>                        
                        <input type="text" class="form-control" name="identitas" value="<?= $permohonan->identitas; ?>">                        
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gambar Identitas - Tampil Button Browse</label> <br>
                        <img class="img-thumbnail" style="height: 280px; width: 400px;" src="<?php echo base_url() . 'assets/image/identitas/'.$permohonan->gambar_identitas; ?>"/>  
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <input type="text" class="form-control" name="status" value="<?= $permohonan->status; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Layanan</label>
                        <input type="text" class="form-control" name="jenis_layanan" value="<?= $permohonan->jenis_layanan; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gambar Permohonan - Tampil Button Browse</label> <br>
                        <img class="img-thumbnail" style="height: 450px; width: 400px;" src="<?php echo base_url() . 'assets/image/permohonan/'.$permohonan->gambar_permohonan; ?>"/>
                        <!-- <input type="text" class="form-control" name="gambar_permohonan" value="<?= $permohonan->gambar_permohonan; ?>"> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

