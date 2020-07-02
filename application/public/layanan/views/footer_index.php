<script>
    jQuery(document).ready(function() {
    	$('#tombol-submit').click(function() {
    		var form = '#form_layanan';
            var identitasFile = document.getElementById('file-id');
            var permohonanFile = document.getElementById('surat_permohonan');
            var form_upload = new FormData(document.querySelector("#form_layanan"));

            $(form + ' #tombol-submit').attr('disabled', true);
            $(form + ' #tombol-submit').html('Proses Kirim...');

            $.ajax({
                url: "<?php echo site_url('layanan/is_valid_data') ?>",
                type: "POST",
                contentType: false,
                processData: false,
                data: form_upload,
                timeout: 30000,
                dataType: "JSON",
                success: function(data) {
                    if(data.status){
                        window.location.href = data.url;
                    } else {
                        if(data.pesan != ''){
                            $('#divnotif').html(data.pesan);
                        }
                        grecaptcha.reset();
                        $('html, body').animate({scrollTop:0}, 'slow');
                    }
                    $(form + ' #tombol-submit').attr('disabled', false);
                    $(form + ' #tombol-submit').html('Kirim');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $(form + ' #tombol-submit').attr('disabled', false);
                    $(form + ' #tombol-submit').html('Kirim');
                    alert("Data permohonan gagal disimpan.  Silakan kontak admin untuk memberitahu kesalahan ini. Kode kesalahan : " +textStatus);
                }
            });
        })
    })
</script>