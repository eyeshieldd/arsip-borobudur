<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Post</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Post</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url('post')?>">All Post</a></li>
            <li class="breadcrumb-item active">Edit Post</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
    <button class="btn float-right hidden-sm-down btn-success" id="tombol-update"><i class="mdi mdi-plus-circle"></i> Update Data</button>        
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <form method="post" id="form-edit" onsubmit="return false">
                    <input type="hidden" class="form-control" name="post_id" value="<?= $post['post_id']; ?>">
                    <div class="form-group">
                        <label class="control-label">Title *</label>
                        <input type="text" class="form-control" name="post_title" value="<?= $post['post_title']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug *</label>
                        <input type="text" disabled="disabled" class="form-control" name="post_slug" value="<?= $post['post_slug']; ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="control-label">Channel *</label>
                            <select class="form-control" name="channel_id">
                                <?php
                                    if(isset($rs_channel) && !empty($rs_channel)){
                                        foreach ($rs_channel as $vchannel) {
                                            echo'<option value="'.$vchannel['channel_id'].'" ';
                                            echo ($post['channel_id'] == $vchannel['channel_id']) ? "selected" : "";
                                            echo '>'.$vchannel['channel_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label">Category</label>
                            <select class="form-control" name="categories_id">
                                <?php
                                    if(isset($rs_categories) && !empty($rs_categories)){
                                        foreach ($rs_categories as $vcategories) {
                                            echo'<option value="'.$vcategories['categories_id'].'" ';
                                            echo ($post['categories_id'] == $vcategories['categories_id']) ? "selected" : "";
                                            echo '>'. $vcategories['categories_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>                          
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="textarea_editor form-control" name="post_content" rows="15" placeholder="Enter text ..."><?= $post['post_content']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tags</label>
                        <select name="post_tags[]" class="select2 mb-2 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                <?php                                    
                                    if(isset($rs_tags) && !empty($rs_tags)){
                                        foreach ($rs_tags as $vtags) {
                                            echo '<option value="'.$vtags['tags_id'].'" ';
                                            if (!empty($tags)) {
                                                foreach ($tags as $dttags) {
                                                    echo ($dttags['tags_id'] == $vtags['tags_id']) ? "selected" : "";
                                                }      
                                            } else {
                                                echo "Data tidak ada";
                                            }
                                            echo '>'. $vtags['tags_name'].'</option>';
                                        }
                                    }
                                ?>                                
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label class="control-label">Post Status</label>
                        <select class="form-control" name="post_status">
                            <!-- <option value="draft">Draft</option>
                            <option value="publish">Publish</option> -->                      
                            <option value="draft" <?= $post['post_status'] == 'draft' ? "selected" : "" ?>>Draft</option>
                            <option value="publish" <?= $post['post_status'] == 'publish' ? "selected" : "" ?>>Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="<?= $post['meta_title']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" value="<?= $post['meta_description']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Keyword</label>
                        <input type="text" class="form-control" name="meta_keyword" value="<?= $post['meta_keyword']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

