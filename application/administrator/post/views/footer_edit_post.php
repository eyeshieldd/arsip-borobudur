<script>
	jQuery(document).ready(function() {
		$('.textarea_editor').wysihtml5();

		// For select 2
        $('.select2').select2();

        // tombol update
        $('#tombol-update').click(function (){
            var modal = '#modal-add';
            var form = '#form-edit';

            $(form + ' #tombol-update').attr('disabled', true);

            if (!$(form).isValid()) {
                $(form + ' #tombol-update').attr('disabled', false);
                return;
            }

            $.ajax({
                url: "<?php echo site_url('post/update_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status)
                    {
                        notif.success(data.pesan, "Berhasil");
                    } else {
                        notif.error(data.pesan,'Gagal');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  alertajax.error(textStatus, jqXHR.status);
                }
            });
            $(form + ' #tombol-update').attr('disabled', false);
        })

	})
</script>