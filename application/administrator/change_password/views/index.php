<div class="card">
    <div class="card-body">
        <div class="panel">
            <div class="panel-hdr">
                <h2>
                    Change Password
                </h2>
            </div>
            <form onsubmit="return false" id="ubah-profile">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10 col-xs-12">
                                <input type="text" disabled readonly class="form-control col-md-5" name="username" data-validation="required" value="<?= !empty($result['username']) ? $result['username'] : '' ?>">
                                <input type="hidden" readonly class="form-control col-md-5" name="id_user" data-validation="required" value="<?= !empty($result['user_id']) ? $result['user_id'] : '' ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10 col-xs-12">
                                <input type="password" class="form-control col-md-5" name="old_password" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10 col-xs-12">
                                <input type="password" class="form-control col-md-5" name="new_password" value="" data-validation="length" data-validation-length="5-20">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Retype New Password</label>
                            <div class="col-sm-10 col-xs-12">
                                <input type="password" class="form-control col-md-5" name="re_new_password" value="" data-validation="length, confirmation" data-validation-length="5-20" data-validation-confirm="new_password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btn-submit" class="btn btn-primary waves-effect waves-themed float-left">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>