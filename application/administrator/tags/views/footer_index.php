<script>
    jQuery(document).ready(function() {
        /* Set DataTable */
        dttags = $("#ttags").DataTable({
            "ajax": {
                "url": "<?= site_url('tags/get_list_tags'); ?>",
                "type": "POST"
            },
            "sDom": dom_full,
            "serverSide": true,
            "bFilter": true,
            "paging": true,
            "buttons": [{
                "text": '<i class="fa fa-plus"></i> &nbsp; Add Tags',
                "className": 'btn waves-effect waves-light btn-info btn-block',
                action: function(e, dt, node, config) {
                    $('#modal-add').modal('show');
                    $('#form-tambah [name="tags_name"]').focus();
                }
            }],
            "columns": [{
                    "data": "tags_name"
                },
                {
                    "data": "tags_slug"
                },
                {
                    "data": "total",
                    "className": "text-center"
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
                url: "<?php echo site_url('tags/add_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        notif.success(data.pesan, "Berhasil");
                        $('#modal-add').modal('hide');
                        $(form)[0].reset();
                        dttags.ajax.reload(null, false);
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
        $('#ttags').on('click', '.hapus-data', function() {

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
                                url: '<?php echo site_url('tags/delete_process'); ?>',
                                data: 'data_id=' + data_id,
                                dataType: 'JSON',
                                timeout: 5000,
                                success: function(data) {
                                    if (data.status) {
                                        notif.success(data.pesan, "Berhasil");
                                        dttags.ajax.reload(null, false);
                                    } else {
                                        notif.error(data.pesan, "Gagal");
                                        dttags.ajax.reload(null, false);
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    dttags.ajax.reload(null, false);
                                    alertajax.error(textStatus, jqXHR.status);
                                }
                            });
                        }
                    },
                    batal: function() {}
                }
            });
        });

        $('#modal-add').on('hidden.bs.modal', function(e) {
            $(this).find('#form-tambah')[0].reset();
        });
    })
</script>