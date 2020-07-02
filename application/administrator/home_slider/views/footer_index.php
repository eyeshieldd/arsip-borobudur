<script>
   jQuery(document).ready(function() {

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        var responsiveHelper_dt_basic = [];

        /* Set DataTable */
        dtslider = $("#tslider").DataTable({
            "ajax": {
                "url": "<?=site_url('home_slider/get_list');?>",
                "type": "POST"
            },
            "sDom": dom_full,
            "serverSide": true,
            "bFilter": false,
            "paging": true,
            "autoWidth":         true,
            "buttons": [{
                "text": '<i class="fa fa-plus"></i> &nbsp; Add Image',
                "className": 'btn waves-effect waves-light btn-info btn-block',
                action: function(e, dt, node, config) {
                    $('#modal-add').modal('show');
                    $('#form-tambah [name="title"]').focus();
                }
            }],
            "columns": [
                {"data": "image_url",},
                {"data": "title", "className" : "text-justify"},
                {"data": "is_active", "className" : "text-center"},
                {"data": "aksi"}
            ],
            "columnDefs": [
                { targets: 0,
                  render: function(data) {
                    return '<img src="'+data+'" class="img-fluid">';
                    // return '<img src="'+data+'" class="gambar">'
                  }
                }   
              ]
        });

        // tombol simpan
        $('#tombol-simpan').click(function (){
            var modal = '#modal-add';
            var form = '#form-tambah';

            if (!$(form).isValid()) {
                $(form + ' #tombol-submit').attr('disabled', false);
                return;
            }

            var form_upload = new FormData(document.querySelector("#form-tambah"));

            $.ajax({
                url: "<?php echo site_url('home_slider/proses_tambah_data') ?>",
                type: "POST",
                data: form_upload,
                contentType: false,
                processData: false,
                timeout: 5000,
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status)
                    {
                        notif.success(data.pesan, "Berhasil");
                        $(modal).modal('hide');
                        $(form)[0].reset();
                        dtslider.ajax.reload(null, false);
                    } else {
                        notif.error(data.pesan,'Gagal');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  alertajax.error(textStatus, jqXHR.status);
                }
            });
            $(form + ' #tombol-submit').attr('disabled', false);
        })

        // tombol simpan
        $('#tombol-ubah').click(function (){
            var modal = '#modal-ubah';
            var form = '#form-edit';

            if (!$(form).isValid()) {
                $(form + ' #tombol-ubah').attr('disabled', false);
                return;
            }

            $.ajax({
                url: "<?php echo site_url('home_slider/proses_ubah_data') ?>",
                type: "POST",
                data: $(form).serialize(),
                timeout: 5000,
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status)
                    {
                        notif.success(data.pesan, "Berhasil");
                        $(modal).modal('hide');
                        $(form)[0].reset();
                        dtslider.ajax.reload(null, false);
                    } else {
                        notif.error(data.pesan,'Gagal');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alertajax.error(textStatus, jqXHR.status);
                }
            });
            $(form + ' #tombol-ubah').attr('disabled', false);
        })

        // tombol ubah
        $('#tslider').on('click', '.ubah-data', function () {
            /* var modal dan form */
            var modal = '#modal-ubah';
            var form = '#form-edit';
            var data_id = $(this).attr('data-id');
            $.ajax({
                url: "<?= site_url('home_slider/get_detail_data') ?>",
                type: "POST",
                data: "data_id=" + data_id,
                timeout: 5000,
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status) /* if success close modal and reload ajax table */
                    {
                        $(form + ' [name="slider_id"]').val(data.data.slider_id);
                        $(form + ' [name="title"]').val(data.data.title);
                        $(form + ' [name="caption"]').val(data.data.caption);
                        $(form + ' [name="status"]').val(data.data.is_active);
                        $('#image-preview').attr('src', data.data.image_url);
                        $('#text-mdb').html(data.data.username);
                        $('#text-mdd').html(data.data.mdd);

                        $(modal).modal('show');
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
        $('#tslider').on('click', '.hapus-data', function () {

            /* var modal dan form */
            var data_id = $(this).attr('data-id');
            $.confirm({
                title: 'Hapus data?',
                content: 'Apakah Anda yakin akan menghapus data ini?',
                type:'red',
                buttons: {
                    ya: {
                        btnClass: 'btn-red',
                        action:function () {
                            $.ajax({
                                type: 'post',
                                url: '<?php echo site_url('home_slider/proses_hapus_data'); ?>',
                                data: 'data_id=' + data_id,
                                dataType: 'JSON',
                                timeout: 5000,
                                success: function (data) {
                                    if (data.status) {
                                        notif.success(data.pesan, "Berhasil");
                                        dtslider.ajax.reload(null, false);
                                    } else {
                                        notif.error(data.pesan, "Gagal");
                                        dtslider.ajax.reload(null, false);
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    dtslider.ajax.reload(null, false);
                                    alertajax.error(textStatus, jqXHR.status);
                                }
                            });
                        }
                    },
                    batal:function(){}
                }
            });
        });

        $('#modal-tambah').on('hidden.bs.modal', function(e) {
            $(this).find('#form-tambah')[0].reset();
        });

        $('#modal-ubah').on('hidden.bs.modal', function(e) {
            $(this).find('#form-edit')[0].reset();
        });

          $.validate({
            lang: 'id'
          });

    })
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>