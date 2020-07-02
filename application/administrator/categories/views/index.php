<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Categories</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Post</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body no-padding">
                <table id="tcategories" class="display nowrap table table-hover table-condensed" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="35%">Categories</th>
                            <th>Slug</th>
                            <th width="30%">Description</th>
                            <th width="10%">#</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modal-add" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Categories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" onsubmit="return false">
                    <div class="form-group">
                        <label class="control-label">Categories</label>
                        <input type="text" class="form-control" name="categories_name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Categories Description</label>
                        <input type="text" class="form-control" name="categories_description">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Parent Categories</label>
                        <select name="parent_categories" class="form-control">
                            <option value=""></option>
                            <?php
                                if(isset($rs_categories) && !empty($rs_categories)){
                                    foreach ($rs_categories as $vcat) {
                                        echo '<option value="'.$vcat['categories_id'].'">'.$vcat['categories_name'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect" id="tombol-simpan">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
