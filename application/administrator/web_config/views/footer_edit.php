<script>
    jQuery(document).ready(function() {
        // tombol simpan
        $('#tombol-simpan').click(function() {
            var modal = '#modal-add';
            var form = '#form-tambah';

            $(form + ' #tombol-simpan').attr('disabled', true);

            $.ajax({
                url: "<?php echo site_url('web_config/save_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        notif.success(data.pesan, "Berhasil");
                        dtpost.ajax.reload(null, false);
                        window.location.href = "<?= site_url('web_config') ?>";
                    } else {
                        notif.error(data.pesan, 'Gagal');
                        dtpost.ajax.reload(null, false);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alertajax.error(textStatus, jqXHR.status);
                }
            });
            $(form + ' #tombol-simpan').attr('disabled', false);
        })

    })
</script>