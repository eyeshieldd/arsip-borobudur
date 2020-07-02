<script>
    $(document).ready(function() {
        /* Set DataTable */        
        dtpermohonan = $("#tpermohonan").DataTable({
            "ajax": {
                "url": "<?= site_url('permohonan/get_list_permohonan'); ?>",
                "type": "POST"
            },            
            "serverSide": true,
            "bFilter": true,
            "paging": true,            
            "columns": [
                {
                    "data": "nomor_layanan"
                },
                {
                    "data": "nama_pemohon"
                },
                {
                    "data": "email"
                },
                {
                    "data": "status"
                },
                {
                    "data": "tanggal",                  
                },
                {
                    "data": "aksi",
                    "className": "text-center"
                }
            ]
        });        

        // tombol simpan         
        $('#tombol-simpan').click(function() {
            var modal = '#modal-add';
            var form = '#form-tambah';

            if (!$(form).isValid()) {
                $(form + ' #tombol-simpan').attr('disabled', false);
                return;
            }

            $.ajax({
                url: "<?php echo site_url('permohonan/add_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        notif.success(data.pesan, "Berhasil");
                        $('#modal-add').modal('hide');
                        $(form)[0].reset();
                        dtpermohonan.ajax.reload(null, false);
                    } else {
                        notif.error(data.pesan, 'Gagal');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alertajax.error(textStatus, jqXHR.status);
                }
            });
            $(form + ' #tombol-simpan').attr('disabled', false);
        })

        // tombol ubah        
        $('#tpermohonan').on('click', '.hapus-data', function() {
            var data_id = $(this).attr('data-id');
            $.confirm({
                title: 'Hapus data?',
                content: 'Apakah Anda yakin akan menghapus data ini?',
                type: 'red',
                buttons: {
                    ya: {
                        btnClass: 'btn-red',
                        action: function() {
                            $.ajax({
                                type: 'post',
                                url: '<?php echo site_url('permohonan/delete_process'); ?>',
                                data: 'data_id=' + data_id,
                                dataType: 'JSON',
                                timeout: 5000,
                                success: function(data) {
                                    if (data.status) {
                                        notif.success(data.pesan, "Berhasil");
                                        dtpermohonan.ajax.reload(null, false);
                                    } else {
                                        notif.error(data.pesan, "Gagal");
                                        dtpermohonan.ajax.reload(null, false);
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    dtpermohonan.ajax.reload(null, false);
                                    alertajax.error(textStatus, jqXHR.status);
                                }
                            });
                        }
                    },
                    batal: function() {}
                }
            });
        });
    })
</script>