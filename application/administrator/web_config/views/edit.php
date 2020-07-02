<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Web Config</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Web Config</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('web_config') ?>">All Config</a></li>
            <li class="breadcrumb-item active">Update Config</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <button class="btn float-right hidden-sm-down btn-success" id="tombol-simpan"><i class="mdi mdi-plus-circle"></i> Save Config</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="active">
                        <a class="nav-link active" href="#web_config" role="tab" data-toggle="tab">Web Config</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#meta_config" role="tab" data-toggle="tab">Meta Config</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#smtp_config" role="tab" data-toggle="tab">SMTP Config</a>
                    </li>
                </ul>
                <form method="post" id="form-tambah">
                    <div class="tab-content">
                        <div class="tab-pane active" id="web_config">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label">Instagram URL *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['instagram_url']; ?>" value="<?php echo $value['instagram_url']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Facebook URL *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['facebook_url'];  ?>" value="<?php echo $value['facebook_url'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Twitter URL</label>
                                                <input type="text" class="form-control" name="<?php echo $name['twitter_url']; ?>" value="<?php echo $value['twitter_url'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Title Web</label>
                                                <input type="text" class="form-control" name="<?php echo $name['web_title']; ?>" value="<?php echo $value['web_title'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Footer Web</label>
                                                <input type="text" class="form-control" name="<?php echo $name['web_footer']; ?>" value="<?php echo $value['web_footer'];  ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label class="control-label">Company Name</label>
                                                <input type="text" class="form-control" name="<?php echo $name['company_name']; ?>" value="<?php echo $value['company_name'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Company Address</label>
                                                <input type="text" class="form-control" name="<?php echo $name['company_address']; ?>" value="<?php echo $value['company_address'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Company Email</label>
                                                <input type="text" class="form-control" name="<?php echo $name['company_email']; ?>" value="<?php echo $value['company_email'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Company Telp</label>
                                                <input type="text" class="form-control" name="<?php echo $name['company_telp']; ?>" value="<?php echo $value['company_telp'];  ?>">
                                            </div>                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- /web_config -->
                        <div class="tab-pane" id="meta_config">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">                        
                                            <div class="form-group">
                                                <label class="control-label">Meta Title *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['meta_title']; ?>" value="<?php echo $value['meta_title']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Description *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['meta_description'];  ?>" value="<?php echo $value['meta_description'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Tag</label>
                                                <input type="text" class="form-control" name="<?php echo $name['meta_tags']; ?>" value="<?php echo $value['meta_tags'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Image</label>
                                                <input type="text" class="form-control" name="<?php echo $name['meta_image']; ?>" value="<?php echo $value['meta_image'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Keywords</label>
                                                <input type="text" class="form-control" name="<?php echo $name['meta_keyword']; ?>" value="<?php echo $value['meta_keyword'];  ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label class="control-label">Meta Author</label>
                                                <input type="text" class="form-control" name="<?php echo $name['meta_author']; ?>" value="<?php echo $value['meta_author'];  ?>">
                                            </div>                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /meta_config -->
                        <div class="tab-pane" id="smtp_config">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label">Admin Email *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['admin_email']; ?>" value="<?php echo $value['admin_email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Protocol *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['protocol']; ?>" value="<?php echo $value['protocol']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Smtp Host *</label>
                                                <input type="text" class="form-control" name="<?php echo $name['smtp_host'];  ?>" value="<?php echo $value['smtp_host'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Smtp Port</label>
                                                <input type="text" class="form-control" name="<?php echo $name['smtp_port']; ?>" value="<?php echo $value['smtp_port'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Smtp User</label>
                                                <input type="text" class="form-control" name="<?php echo $name['smtp_user']; ?>" value="<?php echo $value['smtp_user'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Smtp Password</label>
                                                <input type="text" class="form-control" name="<?php echo $name['smtp_pass']; ?>" value="<?php echo $value['smtp_pass'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Crlf</label>
                                                <input type="text" class="form-control" name="<?php echo $name['crlf']; ?>" value="<?php echo $value['crlf'];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Newline</label>
                                                <input type="text" class="form-control" name="<?php echo $name['newline']; ?>" value="<?php echo $value['newline'];  ?>">
                                            </div>                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /smtp_config -->
                    </div>
                </form>
             </div>
        </div>
    </div>
</div> 