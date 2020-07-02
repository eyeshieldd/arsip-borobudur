<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Home Slider</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <table id="tslider" class="display table table-hover table-condensed" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th width="25%">Image</th>
                            <th >Title</th>
                            <th width="10%">Active</th>
                            <th width="12%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modal-add" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" method="post" onsubmit="return false" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title *</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>Caption *</label>
                        <textarea class="form-control" name="caption" rows="4" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status *</label>
                        <select name="status" class="form-control">
                            <option></option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image *</label>
                        <input class="form-control" type="file" name="file_image">
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
<div id="modal-ubah" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="post" onsubmit="return false" enctype="multipart/form-data">
                    <input type="hidden" name="slider_id">
                    <div class="col-lg-12 col-md-12 mb-3"><img src="<?=base_url('assets/image/identitas/image-not-found.png')?>" id="image-preview" class="img-responsive radius"></div>
                    <div class="form-group">
                        <label>Title *</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>Caption *</label>
                        <textarea class="form-control" name="caption" rows="4" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status *</label>
                        <select name="status" class="form-control">
                            <option></option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect" id="tombol-ubah">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>