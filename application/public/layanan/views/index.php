<div class="container pt:60 pb:80">
  <h1 class="page-title text-uppercase">
    LAYANAN ARSIP
  </h1>
  <div class="mt-3 line-height-double">
    <div class="mt-3 line-height-double">
      <?php echo $content['post_content']; ?>
    </div>
    <div id="divnotif">
    </div>
    <form id="form_layanan" method="POST" onsubmit="return false" enctype="multipart/form-data">
      <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
      <div class="form-group">
        <label for="name">Nama *</label>
        <input class="form-control" type="text" id="name" name="nama" maxlength="255" />
      </div>
      <div class="form-group">
        <label for="email">Email *</label>
        <input class="form-control" type="text" id="email" name="email" maxlength="255" />
        <div class="help-block small text-muted">
          Masukkan alamat email yang valid agar kami dapat menghubungi Anda.
        </div>
      </div>
      <div class="form-group">
        <label for="address">Alamat *</label>
        <input class="form-control" type="text" id="address" name="alamat" maxlength="255" />
      </div>
      <div class="row">
        <div class="col-lg-5">
          <div class="form-group">
            <label for="telp">Telepon/Handphone *</label>
            <input class="form-control" type="numeric" id="telp" name="telp" maxlength="15" minlength="10"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-5">
          <div class="form-group">
            <label for="id">Identitas</label>
            <select class="form-control" id="id" name="identitas">
              <option disabled="disabled" selected>-Select-</option>
              <option value="ktp">KTP - Kartu Tanda Penduduk</option>
              <option value="sim">SIM - Surat Izin Mengemudi</option>
              <option value="kitas">KITAS - Kartu Izin Tinggal Sementara</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-5">
          <div class="form-group">
            <input type="file" name="file_identitas" id="file-id" class="form-input-file rounded muted bordered dashed" />
            <label for="file-id"><span>Choose a file…</span></label>
            <div class="block-hint text-muted small line-height-normal">Format yang diperbolehkan : jpeg, png, jpg.  Max filesize 1mb. Resolusi maks 4096x4096px</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-5">
          <div class="form-group">
            <label for="id">Status</label>
            <select class="form-control" id="id" name="status">
              <option disabled="disabled" selected>-Pilih-</option>
              <option value="umum">Umum</option>
              <option value="akademisi">Akademisi</option>
              <option value="instansi pemerintah">Instansi Pemerintah</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Jenis Layanan</label>
        <div class="form-check">
          <label class="form-check-label" for="layanan_info">
            <input class="form-check-input" type="radio" name="layanan" id="layanan_info" value="Permintaan Informasi" checked />
            Permintaan Informasi
            <i class="input-frame"></i>
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label" for="layanan_ruang_baca">
            <input class="form-check-input" type="radio" name="layanan" id="layanan_ruang_baca" value="Permintaan Akses Ruang Baca" />
            Permintaan Akses Ruang Baca
            <i class="input-frame"></i>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-5 col-lg-6">
          <div class="form-group has-actions">
            <label for="kode_arsip">Kode Arsip</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="kode_arsip[]" />
              <div class="input-group-append input-group-btn">
                <button type="button" class="btn btn-circle btn-danger btn-minus d-none" >
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-circle btn-primary btn-add" >
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
            <div class="help-block small text-muted">
            Masukkan kode arsip atau URL yang di dapat dari web.  Maksimal permohonan 5 kode arsip.
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-5">
          <div class="form-group">
            <label for="surat_permohonan">Upload Surat Permohonan</label>
            <input type="file" name="surat_permohonan" id="surat_permohonan" class="form-input-file rounded muted bordered dashed" />
            <label for="surat_permohonan"><span>Choose a file…</span></label>
            <div class="block-hint text-muted small line-height-normal">Format yang diperbolehkan : jpeg, png, jpg.  Max filesize 1mb. Resolusi maks 4096x4096px</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-5">
          <div class="form-group">
           <div class="g-recaptcha" data-sitekey="6Ley2r0UAAAAAEYDp_lftsea6zpQmSlEjEsi0USh" data-callback="enableSubmit" data-expired-callback="disableSubmit"></div>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary btn-lg px:50" disabled="disabled" id="tombol-submit">Kirim</button>
      </div>
    </form>
  </div>
</div>
