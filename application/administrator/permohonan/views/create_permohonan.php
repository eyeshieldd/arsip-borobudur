<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Permohonan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url('permohonan')?>">All Permohonan</a></li>
            <li class="breadcrumb-item active">Create Permohonan</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <button class="btn float-right hidden-sm-down btn-success" id="tombol-simpan"><i class="mdi mdi-plus-circle"></i> Save Permohonan</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <form method="post" id="form-tambah" onsubmit="return false">
                    <div class="form-group">
                        <label class="control-label">Nama *</label>
                        <input type="text" class="form-control" name="post_title">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email *</label>
                        <input type="text" class="form-control" name="post_slug">
                        <div class="help-block small text-muted">
                            Masukkan alamat email yang valid agar kami dapat menghubungi Anda.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat *</label>
                        <input type="text" class="form-control" name="post_slug">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telepon/Handphone *</label>
                        <input type="text" class="form-control" name="post_slug">
                    </div>                    
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="control-label">Identitas *</label>
                            <select class="form-control" id="id" name="identitas">
                              <option disabled="disabled" selected="">-Select-</option>
                              <option value="ktp">KTP - Kartu Tanda Penduduk</option>
                              <option value="sim">SIM - Surat Izin Mengemudi</option>
                              <option value="kitas">KITAS - Kartu Izin Tinggal Sementara</option>
                            </select>                         
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label">Telepon/Handphone *</label>
                            <select class="form-control" name="category_id">
                                <option></option>
                                <?php
                                    if(isset($rs_categories) && !empty($rs_categories)){
                                        foreach ($rs_categories as $vcategories) {
                                            echo'<option value="'.$vcategories['categories_id'].'">'.$vcategories['categories_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label">Identitas</label>
                        <select name="post_tags[]" class="select2 mb-2 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                <option></option>
                                <?php
                                    if(isset($rs_tags) && !empty($rs_tags)){
                                        foreach ($rs_tags as $vtags) {
                                            echo'<option value="'.$vtags['tags_id'].'">'.$vtags['tags_name'].'</option>';
                                        }
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select class="form-control" name="post_status">
                            <option value="draft">Draft</option>
                            <option value="publish">Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Layanan</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Kode Arsip</label>
                        <input type="text" class="form-control" name="meta_description">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Surat Permohonan</label>
                        <input type="text" class="form-control" name="meta_keyword">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>