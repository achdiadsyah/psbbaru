                    
                    
                    <input type="hidden" name="sesnik" id="sesnik" value="<?= $this->session->userdata['nik']; ?>" required>    
                    
                    
                    <section class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Pas Photo (3X4)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_pasphoto" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="pasphoto" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_pasphoto">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_pasphoto" onClick="save('pasphoto')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">SK Rangking (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_sk" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="sk" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_sk">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps">
                                                    <button class="btn btn-danger" type="button" id="btnSave_sk" onClick="save('sk')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Raport Semester 1</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_raport_1" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="raport_1" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_raport_1">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_raport_1" onClick="save('raport_1')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Raport Semester 2</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_raport_2" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="raport_2" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_raport_2">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_raport_2" onClick="save('raport_2')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Raport Semester 3</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_raport_3" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="raport_3" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_raport_3">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_raport_3" onClick="save('raport_3')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Raport Semester 4</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_raport_4" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="raport_4" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_raport_4">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_raport_4" onClick="save('raport_4')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">SERTIFIKAT PRESTASI 1 (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_sertifikat_1" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="sertifikat_1" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_sertifikat_1">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps">
                                                    <button class="btn btn-danger" type="button" id="btnSave_sertifikat_1" onClick="save('sertifikat_1')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">SERTIFIKAT PRESTASI 2 (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_sertifikat_2" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="sertifikat_2" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_sertifikat_2">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps">
                                                    <button class="btn btn-danger" type="button" id="btnSave_sertifikat_2" onClick="save('sertifikat_2')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">SERTIFIKAT PRESTASI 3 (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_sertifikat_3" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="sertifikat_3" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_sertifikat_3">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps">
                                                    <button class="btn btn-danger" type="button" id="btnSave_sertifikat_3" onClick="save('sertifikat_3')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">SERTIFIKAT PRESTASI 4 (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_sertifikat_4" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="sertifikat_4" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_sertifikat_4">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps">
                                                    <button class="btn btn-danger" type="button" id="btnSave_sertifikat_4" onClick="save('sertifikat_4')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">SERTIFIKAT PRESTASI 5 (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_sertifikat_5" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="sertifikat_5" required>    
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>    
                                            <div class="form-group" id="result_sertifikat_5">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps">
                                                    <button class="btn btn-danger" type="button" id="btnSave_sertifikat_5" onClick="save('sertifikat_5')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>