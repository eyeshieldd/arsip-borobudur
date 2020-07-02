<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Post</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Post</a></li>
            <li class="breadcrumb-item active">Post</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <table id="tpost" class="display nowrap table table-hover table-condensed" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="25%">Post</th>
                            <th width="20%">Channel</th>
                            <th width="10%">Status</th>
                            <th width="10%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Tampil Data -->
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>Post Title: </td>
                            <td id="post_title"></td>
                        </tr>
                        <tr>
                            <td>Channel: </td>
                            <td id="channel_name"></td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            <td id="post_status"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit post -->
<div id="modal-ubah" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></i> Ubah Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /.box-header -->
            <form class="pl-3 pr-3 text-left" id="form-ubah" onsubmit="return false">
                <input type="hidden" name="post_id">
                <?php $this->load->view('post/_form'); ?>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <!-- Id tombol-simpan di ubah ke tombol-ubah -->
                    <button type="submit" class="btn btn-info waves-effect" id="tombol-simpan">Save</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>