                    
                    
                    <section class="row">
                        <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Bukti Pelunasan Daftar Ulang</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_struk_daftarulang" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_struk_daftarulang">
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
                                <div class="card-header">
                                    <h5 class="card-title">Kartu Keluarga (KK)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_kk" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_kk">
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
                                <div class="card-header">
                                    <h5 class="card-title">Akte Kelahiran</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_akte" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_akte">
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
                                <div class="card-header">
                                    <h5 class="card-title">KTP Ayah</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_ktp_ayah" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_ktp_ayah">
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
                                <div class="card-header">
                                    <h5 class="card-title">KTP Ibu</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_ktp_ibu" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_ktp_ibu">
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
                                <div class="card-header">
                                    <h5 class="card-title">KTP Wali (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_ktp_wali" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_ktp_wali">
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
                                <div class="card-header">
                                    <h5 class="card-title">Surat Sehat</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_sehat" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_surat_sehat">
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
                                <div class="card-header">
                                    <h5 class="card-title">Surat Pernyataan</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_pernyataan" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_surat_pernyataan">
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
                                <div class="card-header">
                                    <h5 class="card-title">Surat Sanggup Membiayai</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_kesanggupan" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_surat_kesanggupan">
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
                                <div class="card-header">
                                    <h5 class="card-title">Surat Patuh Tata Tertib</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_tatatertib" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_surat_tatatertib">
                                                    <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg,application/pdf,image/x-eps" required>
                                                    <button class="btn btn-danger" type="button" id="btnSave_surat_tatatertib" onClick="save('surat_tatatertib')">Upload</button>
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
                                <div class="card-header">
                                    <h5 class="card-title">Surat Tidak Pindah Jurusan</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_surat_tidakpindahjurusan" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_surat_tidakpindahjurusan">
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
                                <div class="card-header">
                                    <h5 class="card-title">KIP-Kartu Indonesia Pintar (Tidak Wajib)</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_kip" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_kip">
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
                                <div class="card-header">
                                    <h5 class="card-title">ASKES / BPJS</h5>
                                </div>
                                <div class="card-body">                                    
                                    <div class="col-md-12 mb-2">
                                        <form action="#" id="form_bpjs" enctype="multipart/form-data">
                                            <div class="form-group">                                                    
                                                <div class="input-group" id="result_bpjs">
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