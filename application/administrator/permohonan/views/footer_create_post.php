<script>
	jQuery(document).ready(function() {
		$('.textarea_editor').wysihtml5();

		// For select 2
        $('.select2').select2();

        // tombol simpan
        $('#tombol-simpan').click(function (){
            var modal = '#modal-add';
            var form = '#form-tambah';

            $(form + ' #tombol-simpan').attr('disabled', true);

            if (!$(form).isValid()) {
                $(form + ' #tombol-simpan').attr('disabled', false);
                return;
            }

            $.ajax({
                url: "<?php echo site_url('post/save_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status)
                    {
                        window.location.href = "<?=site_url('post')?>";
                    } else {
                        notif.error(data.pesan,'Gagal');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  alertajax.error(textStatus, jqXHR.status);
                }
            });
            $(form + ' #tombol-simpan').attr('disabled', false);
        })

	})
</script>