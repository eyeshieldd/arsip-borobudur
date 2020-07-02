<script>
    jQuery(document).ready(function() {
        /* Set DataTable */
        dtpost = $("#tpost").DataTable({
            "ajax": {
                "url": "<?= site_url('post/get_list_post'); ?>",
                "type": "POST"
            },
            "serverSide": false,
            "bFilter": true,
            "paging": true,
            "columns": [{
                    "data": "post_title"
                },
                {
                    "data": "channel_name"
                },
                {
                    "data": "post_status"
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
                url: "<?php echo site_url('post/add_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        notif.success(data.pesan, "Berhasil");
                        $('#modal-add').modal('hide');
                        $(form)[0].reset();
                        dtpost.ajax.reload(null, false);
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

        // tombol lihat
        $('#tpost').on('click', '.lihat-data', function() {
            var modal = '#modal-detail';

            /* var modal dan form */
            var data_id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo site_url('post/get_detail') ?>",
                type: "POST",
                data: 'data_id=' + data_id,
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        $('#post_title').html(data.data.post_title);
                        $('#channel_name').html(data.data.channel_name);
                        $('#post_status').html(data.data.post_status);
                        $('#modal-detail').modal('show');
                    } else {
                        notif.error(data.pesan, 'Gagal');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alertajax.error(textStatus, jqXHR.status);
                }
            });
        });

        // button edit
        $('#tpost').on('click', '.edit-data', function() {
            /* var modal dan form */
            var modal = '#modal-ubah';
            var form = '#form-ubah';
            var data_id = $(this).attr('data-id');
            $.ajax({
                url: "<?= site_url('post/get_detail') ?>",
                type: "POST",
                data: "data_id=" + data_id,
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) /* if success close modal and reload ajax table */ {
                        $(form + ' [name="post_id"]').val(data.data.arsitek_id);
                        $(form + ' [name="post_title"]').val(data.data.arsitek_id);
                        $(form + ' [name="channel"]').val(data.data.nama_arsitek);
                        $(form + ' [name="status"]').val(data.data.level);
                        $('#text-mdb').html(data.data.username);
                        $('#text-mdd').html(data.data.mdd);

                        $("#modal-ubah").modal('show');
                    } else {
                        notif.error(data.pesan, 'Gagal');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alertajax.error(textStatus, jqXHR.status);
                }
            })
        });

        // tombol hapus
        $('#tpost').on('click', '.hapus-data', function() {
            /* var modal dan form */
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
                                url: '<?php echo site_url('post/delete_process'); ?>',
                                data: 'data_id=' + data_id,
                                dataType: 'JSON',
                                timeout: 5000,
                                success: function(data) {
                                    if (data.status) {
                                        notif.success(data.pesan, "Berhasil");
                                        dtpost.ajax.reload(null, false);
                                    } else {
                                        notif.error(data.pesan, "Gagal");
                                        dtpost.ajax.reload(null, false);
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    dtpost.ajax.reload(null, false);
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