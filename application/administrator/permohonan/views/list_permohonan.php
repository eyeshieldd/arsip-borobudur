<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Permohonan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url('permohonan')?>">All Permohonan</a></li>
            <li class="breadcrumb-item active">Detail Permohonan</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <a href="<?= site_url('permohonan') ?>" class="btn float-right hidden-sm-down btn-success"><i class="fas fa-arrow-left"></i> Back</a>        
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <table width="100%" class="table table-condensed table-striped">
                    <tr>
                        <td width="25%">Nomor Permohonan</td>
                        <td>: <?= $permohonan['nomor_layanan']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pemohon</td>
                        <td>: <?= $permohonan['nama_pemohon']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Permohonan</td>
                        <td>: <?=date('H:i:s d M Y', strtotime($permohonan['created_at']))?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $permohonan['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $permohonan['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>: <?= $permohonan['telepon']; ?></td>
                    </tr>
                    <tr>
                        <td>Identitas</td>
                        <td>
                            :&nbsp;<?= $permohonan['identitas']; ?>
                            <?php if (file_exists($permohonan['gambar_identitas'])) { ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url()."/permohonan/download_identitas/".$permohonan['permohonan_id']; ?>"><i class="fa fa-file"></i>&nbsp;File</a>
                            <?php } else { ?>
                                <?php echo "- file identias tidak tersedia"; ?>
                            <?php } ?>
                        </td>
                    </tr>                    
                    <tr>
                        <td>Status Pemohon</td>
                        <td>: <?= $permohonan['status']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Layanan</td>
                        <td>: <?= $permohonan['jenis_layanan']; ?></td>
                    </tr>
                    <tr>
                        <td>Permohonan Arsip</td>
                        <td>
                            <?php
                            if(!empty($rs_permohonan_kode)){
                                echo '<ol>';
                                foreach ($rs_permohonan_kode as $varsip) {
                                    echo '<li>'.$varsip['kode_arsip'].'</li>';
                                }
                                echo '</ol>';
                            }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Surat Permohonan</td>
                        <td>
                            <?php if (file_exists($permohonan['gambar_permohonan'])) { ?>
                            :&nbsp;<a class="btn btn-sm btn-primary" href="<?php echo site_url()."/permohonan/download_permohonan/".$permohonan['permohonan_id']; ?>"><i class="fa fa-file"></i>&nbsp;File</a>
                            <?php } else { ?>
                                :&nbsp;<?php echo "surat permohonan tidak tersedia"; ?>
                            <?php } ?>
                        </td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modal-identitas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">File Identitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?php if (file_exists($permohonan['gambar_permohonan'])) { ?>
                    <img class="rounded img-thumbnail" src="<?php echo base_url() .$permohonan['gambar_identitas']; ?>" style="width: 100%; max-width: 200px;"/>
                <?php } else { ?>                            
                    <img class="rounded img-thumbnail" src="<?php echo base_url() .$not_found; ?>"/>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>