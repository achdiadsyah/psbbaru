                    <div class="modal fade" id="modalImage" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content-nobg">
                                <div class="modal-body">
                                    <img id="img_link" alt="popup" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Berkas Siswa
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_kk" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Scan Kartu Keluarga</label>
                                                    <div class="input-group" id="result_kk">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_kk" onClick="save('kk')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_akte" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Scan Akte Kelahiran</label>
                                                    <div class="input-group" id="result_akte">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_akte" onClick="save('akte')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_ktp_ayah" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>KTP (AYAH)</label>
                                                    <div class="input-group" id="result_ktp_ayah">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_ktp_ayah" onClick="save('ktp_ayah')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_ktp_ibu" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>KTP (IBU)</label>
                                                    <div class="input-group" id="result_ktp_ibu">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_ktp_ibu" onClick="save('ktp_ibu')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_ktp_wali" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>KTP (WALI SANTRI)</label>
                                                    <div class="input-group" id="result_ktp_wali">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_ktp_wali" onClick="save('ktp_wali')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_bpjs" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Kartu BPJS</label>
                                                    <div class="input-group" id="result_bpjs">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_bpjs" onClick="save('bpjs')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>