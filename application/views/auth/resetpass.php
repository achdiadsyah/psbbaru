                    
                    <section class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" method="POST" id="form-lupapassword">
                                        <input type="hidden" name="checksum" id="checksum" value="<?= $checksum; ?>">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>New Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="New Password" id="password1" name="password1" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Confirm New Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="Confirm Password" id="password2" name="password2" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button class="btn btn-primary me-1 mb-1" onCLick="save()" id="btnSave">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>