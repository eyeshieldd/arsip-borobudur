<script>
    jQuery(document).ready(function() {
        /* Set DataTable */
        dtuser = $("#tuser").DataTable({
            "ajax": {
                "url": "<?= site_url('userman/get_list_user'); ?>",
                "type": "POST"
            },
            "sDom": dom_full,
            "serverSide": true,
            "bFilter": true,
            "paging": true,
            "buttons": [{
                "text": '<i class="fa fa-plus"></i> &nbsp; Add',
                "className": 'btn waves-effect waves-light btn-info btn-block',
                action: function(e, dt, node, config) {
                    $('#modal-add').modal('show');
                    $('#form-tambah [name="channel_name"]').focus();
                }
            }],
            "columns": [{
                    "data": "username"
                },
                {
                    "data": "nama_lengkap"
                },
                {
                    "data": "group_name"
                },
                {
                    "data": "status"
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
                url: "<?php echo site_url('userman/add_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        notif.success(data.pesan, "Berhasil");
                        $('#modal-add').modal('hide');
                        $(form)[0].reset();
                        dtuser.ajax.reload(null, false);
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

        // tombol simpan
        $('#tombol-simpan-ubah').click(function() {
            var modal = '#modal-ubah';
            var form = '#form-edit';

            if (!$(form).isValid()) {
                $(form + ' #tombol-simpan').attr('disabled', false);
                return;
            }

            $.ajax({
                url: "<?php echo site_url('userman/update_process') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        notif.success(data.pesan, "Berhasil");
                        $(modal).modal('hide');
                        $(form)[0].reset();
                        dtuser.ajax.reload(null, false);
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
        $('#tuser').on('click', '.edit-data', function () {
            /* var modal dan form */
            var modal = '#modal-ubah';
            var form = '#form-edit';
            var data_id = $(this).attr('data-id');
            $.ajax({
                url: "<?= site_url('userman/ubah_data') ?>",
                type: "POST",
                data: "data_id=" + data_id,
                timeout: 5000,
                dataType: "JSON",
                success: function (data)
                {
                        $(modal).modal('show');
                    if (data.status) /* if success close modal and reload ajax table */
                    {
                        $(form + ' [name="user_id"]').val(data.data.user_id);
                        $(form + ' [name="nama_lengkap"]').val(data.data.nama_lengkap);
                        $(form + ' [name="email"]').val(data.data.email);
                        $(form + ' [name="username"]').val(data.data.username);
                        $(form + ' [name="group_id"]').val(data.data.group_id);
                        $(form + ' [name="status"]').val(data.data.status);
                        $('#text-mdb').html(data.data.username);
                        $('#text-mdd').html(data.data.mdd);

                    } else {
                        notif.error(data.data.pesan,'Gagal');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                       alertajax.error(textStatus, jqXHR.status);
                }
            })
        });

        // tombol ubah
        $('#tuser').on('click', '.hapus-data', function() {

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
                                url: '<?php echo site_url('userman/delete_process'); ?>',
                                data: 'data_id=' + data_id,
                                dataType: 'JSON',
                                timeout: 5000,
                                success: function(data) {
                                    if (data.status) {
                                        notif.success(data.pesan, "Berhasil");
                                        dtuser.ajax.reload(null, false);
                                    } else {
                                        notif.error(data.pesan, "Gagal");
                                        dtuser.ajax.reload(null, false);
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    dtuser.ajax.reload(null, false);
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