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

                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    
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
                                        <?php if($user->jalur == "reguler"): ?>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_pasphoto" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Pas Photo (Layar Merah 3x4)</label>
                                                    <div class="input-group" id="result_pasphoto">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_pasphoto" onClick="save('pasphoto')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <?php elseif($user->jalur == "undangan"): ?>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_pasphoto" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Pas Photo (Layar Merah 3x4)</label>
                                                    <div class="input-group" id="result_pasphoto">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_pasphoto" onClick="save('pasphoto')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_surat_pernyataan" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Surat Pernyataan</label>
                                                    <div class="input-group" id="result_surat_pernyataan">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_surat_pernyataan" onClick="save('surat_pernyataan')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_surat_kesanggupan" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Surat Kesanggupan Membiayai</label>
                                                    <div class="input-group" id="result_surat_kesanggupan">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_surat_kesanggupan" onClick="save('surat_kesanggupan')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_formulir_kepsek" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Formulir Kepala Sekolah</label>
                                                    <div class="input-group" id="result_formulir_kepsek">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_formulir_kepsek" onClick="save('formulir_kepsek')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Raport Siswa
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_raport_1" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Raport Semester 1</label>
                                                    <div class="input-group" id="result_raport_1">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_raport_1" onClick="save('raport_1')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_raport_2" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Raport Semester 2</label>
                                                    <div class="input-group" id="result_raport_2">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_raport_2" onClick="save('raport_2')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_raport_3" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Raport Semester 3</label>
                                                    <div class="input-group" id="result_raport_3">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_raport_3" onClick="save('raport_3')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_raport_4" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Raport Semester 4</label>
                                                    <div class="input-group" id="result_raport_4">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_raport_4" onClick="save('raport_4')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Sertifikat Prestasi Siswa
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_sk" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Surat Keterangan Rangking</label>
                                                    <div class="input-group" id="result_sk">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_sk" onClick="save('sk')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_sertifikat_1" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Sertifikat 1</label>
                                                    <div class="input-group" id="result_sertifikat_1">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_sertifikat_1" onClick="save('sertifikat_1')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_sertifikat_2" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Sertifikat 2</label>
                                                    <div class="input-group" id="result_sertifikat_2">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_sertifikat_2" onClick="save('sertifikat_2')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_sertifikat_3" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Sertifikat 3</label>
                                                    <div class="input-group" id="result_sertifikat_3">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_sertifikat_3" onClick="save('sertifikat_3')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_sertifikat_4" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Sertifikat 4</label>
                                                    <div class="input-group" id="result_sertifikat_4">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_sertifikat_4" onClick="save('sertifikat_4')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <form action="#" id="form_sertifikat_5" enctype="multipart/form-data">
                                                <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                <div class="form-group">
                                                    <label>Sertifikat 5</label>
                                                    <div class="input-group" id="result_sertifikat_5">
                                                        <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                        <button class="btn btn-primary" type="button" id="btnSave_sertifikat_5" onClick="save('sertifikat_5')">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>