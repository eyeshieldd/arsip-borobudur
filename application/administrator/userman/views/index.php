<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">User Manager</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow">
                <table id="tuser" class="display nowrap table table-hover table-condensed" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="25%">Username</th>
                            <th width="35%">Nama Lengkap</th>
                            <th>Hak Akses</th>
                            <th width="8%">Status</th>
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
<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" onsubmit="return false">
                    <div class="form-group">
                        <label class="control-label">Full Name</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Retype Password</label>
                        <input type="password" class="form-control" name="repassword">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Group</label>
                        <select class="form-control" name="group_id">
                                <option></option>
                                <?php
                                    if(isset($rs_user_group) && !empty($rs_user_group)){
                                        foreach ($rs_user_group as $vugroup) {
                                            echo'<option value="'.$vugroup['group_id'].'">'.$vugroup['group_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Deactived</option>
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
<div id="modal-ubah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-edit" onsubmit="return false">
                    <input type="hidden" name="user_id">
                    <div class="form-group">
                        <label class="control-label">Full Name</label>
                        <input type="text" disabled="disabled" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" disabled="disabled" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Retype Password</label>
                        <input type="password" class="form-control" name="repassword">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" disabled="disabled" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Group</label>
                        <select class="form-control" name="group_id">
                                <option></option>
                                <?php
                                    if(isset($rs_user_group) && !empty($rs_user_group)){
                                        foreach ($rs_user_group as $vugroup) {
                                            echo'<option value="'.$vugroup['group_id'].'">'.$vugroup['group_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Deactived</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect" id="tombol-simpan-ubah">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>