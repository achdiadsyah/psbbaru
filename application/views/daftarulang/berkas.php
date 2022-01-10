                    
                                      
                    <section class="row">
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Bukti Pelunasan Daftar Ulang</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_struk_daftarulang" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="struk_daftarulang" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_struk_daftarulang">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_struk_daftarulang" onClick="save('struk_daftarulang')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Kartu Keluarga (KK)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_kk" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="kk" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_kk">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_kk" onClick="save('kk')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Akte Kelahiran</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_akte" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="akte" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_akte">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_akte" onClick="save('akte')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">KTP Ayah</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_ktp_ayah" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="ktp_ayah" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_ktp_ayah">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_ktp_ayah" onClick="save('ktp_ayah')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">KTP Ibu</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_ktp_ibu" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="ktp_ibu" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_ktp_ibu">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_ktp_ibu" onClick="save('ktp_ibu')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">KTP Wali (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_ktp_wali" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="ktp_wali" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_ktp_wali">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_ktp_wali" onClick="save('ktp_wali')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Surat Sehat</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_sehat" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="surat_sehat" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_surat_sehat">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_surat_sehat" onClick="save('surat_sehat')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Surat Pernyataan</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_pernyataan" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="surat_pernyataan" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_surat_pernyataan">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_surat_pernyataan" onClick="save('surat_pernyataan')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Surat Sanggup Membiayai</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_kesanggupan" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="surat_kesanggupan" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_surat_kesanggupan">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_surat_kesanggupan" onClick="save('surat_kesanggupan')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Surat Tidak Pindah Jurusan</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_tidakpindahjurusan" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="surat_tidakpindahjurusan" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_surat_tidakpindahjurusan">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_surat_tidakpindahjurusan" onClick="save('surat_tidakpindahjurusan')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">KIP-Kartu Indonesia Pintar (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_kip" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="kip" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_kip">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_kip" onClick="save('kip')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">ASKES / BPJS</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_bpjs" enctype="multipart/form-data">
                                            <input type="hidden" name="tujuan" id="tujuan" value="bpjs" required>
                                            <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                            <div class="form-group" id="result_bpjs">                                                    
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_bpjs" onClick="save('bpjs')">Upload</button>
                                                </div>
                                                <small class="text-muted">Maksimal 5 MB | Format JPG / JPEG / PNG / PDF</small>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>