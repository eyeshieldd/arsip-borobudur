<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Post</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Post</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url('post')?>">All Post</a></li>
            <li class="breadcrumb-item active">Detail Post</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <a href="<?= site_url('post') ?>" class="btn float-right hidden-sm-down btn-success"><i class="fas fa-arrow-left"></i> Back</a>        
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" id="form-tambah" onsubmit="return false">
                    <div class="form-group">
                        <label class="control-label">Title *</label>
                        <input type="text" readonly class="form-control" name="post_title" value="<?= $post->post_title; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug *</label>
                        <input type="text" readonly class="form-control" name="post_slug" value="<?= $post->post_slug; ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="control-label">Channel *</label>                           
                            <input type="text" readonly class="form-control" name="post_slug" value="<?= $post->channel_id; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label">Category</label>
                            <input type="text" readonly class="form-control" name="post_slug" value="<?= $post->categories_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Post Content</label>                        
                        <textarea readonly class="textarea_editor form-control" name="post_content" rows="15"><?= $post->post_content; ?></textarea>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label">Post Status</label>
                        <input type="text" readonly class="form-control" name="post_slug" value="<?= $post->post_status; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Title</label>
                        <input type="text" readonly class="form-control" name="meta_title" value="<?= $post->meta_title; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <input type="text" readonly class="form-control" name="meta_description" value="<?= $post->meta_description; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Keyword</label>
                        <input type="text" readonly class="form-control" name="meta_keyword" value="<?= $post->meta_keyword; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>