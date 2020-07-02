<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Login Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/operator/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- toast -->
    <link href="<?=base_url('assets/operator/plugins/toast-master/css/jquery.toast.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/operator/css/style.css')?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?=base_url('assets/operator/css/colors/blue.css')?>" id="theme" rel="stylesheet">
</head>

<body>
    <section id="wrapper">
        <div class="login-register">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal" id="login-form" method="post" onsubmit="return false">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                    <h3 class="box-title mb-3">Sign In</h3>
                    <div class="form-group ">
                        <label for="">Username / Nama Pengguna</label>
                        <div class="col-xs-12">
                            <input class="form-control" placeholder="" name="username" required="" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Password / Kata sandi</label>
                        <div class="col-xs-12">
                            <input class="form-control" placeholder="" required="" name="password" type="password">
                        </div>
                    </div>
                    <div class="form-group text-center mt-3">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="tombol-do-login" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="<?=base_url()?>" class="text-dark"><i class="fa fa-arrow-left"></i> Back to homepage</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </section>
    <script src="<?=base_url('assets/operator/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script type="text/javascript" src="<?=base_url('assets/operator/plugins/bootstrap/js/popper.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/operator/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- toast message -->
    <script type="text/javascript" src="<?=base_url('assets/operator/plugins/toast-master/js/jquery.toast.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script type="text/javascript" src="<?=base_url('assets/operator/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
    <script type="text/javascript" src="<?=base_url('assets/operator/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script type="text/javascript" src="<?=base_url('assets/operator/js/sidebarmenu.js')?>"></script>
    <!-- Form Validator -->
    <script type="text/javascript" src="<?php echo base_url('assets/global/jquery-form-validator-net/form-validator/jquery.form-validator.min.js') ?>"></script>
    <!--stickey kit -->
    <script src="<?=base_url('assets/operator/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url('assets/operator/js/custom.min.js')?>"></script>
    <script>
    var notif = {
        warning : function(message = "default text", header = "default header"){
            $.toast({
                heading: header,
                text: message,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'warning',
                loader: false,
                hideAfter: 3000,
                stack: 6
              });
        },
        error : function(message = "default error text", header = "default error header"){
            $.toast({
                heading: header,
                text: message,
                position: 'top-right',
                loaderBg:'#ef5350',
                icon: 'error',
                loader: false,
                hideAfter: 3000,
                stack: 6
              });
        }

    }
    $(document).ready(function() {
        $('#login-form [name="username"]').focus();
        $('#tombol-do-login').on('click', function() {
            if (!$(this).isValid()) {
                return false;
            }
            var form = '#login-form';
            $.ajax({
                type: 'post',
                url: '<?= site_url('auth/do_login'); ?>',
                data: $(form).serialize(),
                dataType: 'JSON',
                timeout: 5000,
                success: function(data) {
                    if (data.status) {
                        window.location.href = data.portal;
                    } else {
                        clear_form();
                         $('#txt-password').focus();
                        notif.error(data.pesan,'error');
                    }
                },
                error: function(data) {
                    clear_form();
                    notif.error('terjadi kesalahan saat menghubungkan ke server','error');
                }
            })
        })

        // validasi form
        $.validate({
            lang: 'id'
        });

    })

    function clear_form() {
        $('#login-form').find("input[name=password]").val("");
    }
    </script>
</body>

</html>