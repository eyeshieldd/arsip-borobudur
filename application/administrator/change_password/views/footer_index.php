<script>
    jQuery(document).ready(function() {

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        var responsiveHelper_dt_basic = [];

        $.validate({
            lang: 'id',
            modules: 'security'
        });

    })
    $("#ubah-profile").submit(function() {
        if (!$('#ubah-profile').isValid()) {
            $('#ubah-profile #btn-submit').html('Save Changes');
            $('#ubah-profile #btn-submit').attr('disabled', false);
            return;
        }
        $.confirm({
            title: 'Ubah Password?',
            content: 'Apakah Anda yakin akan merubah password?',
            type: 'red',
            buttons: {
                ya: {
                    btnClass: 'btn-red',
                    action: function() {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo site_url('change_password/update_password'); ?>',
                            data: $('#ubah-profile').serialize(),
                            dataType: 'JSON',
                            timeout: 5000,
                            success: function(data) {
                                if (data.status) {
                                    notif.success(data.pesan, "Berhasil");
                                    $('#ubah-profile')[0].reset();
                                } else {
                                    notif.error(data.pesan, "Gagal");
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alertajax.error(textStatus, jqXHR.status);
                            }
                        });
                    }
                },
                batal: function() {}
            }
        });
    });
</script>