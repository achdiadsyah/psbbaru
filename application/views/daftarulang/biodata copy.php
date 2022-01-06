                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h5 id="nama"></h5>
                                        <span id="nik"></span>
                                    </center>    
                                    <form id="form-biodata" class="form" method="POST">                                        
                                        <input type="hidden" name="s_biodata_ulang" id="s_biodata_ulang" value="1" required>
                                        <div class="divider">
                                            <div class="divider-text">
                                                <b>Data Diri</b>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nomor Akte Kelahiran</label>
                                                    <input type="text" id="nomor_akte" name="nomor_akte" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nomor KK (Kartu Keluarga)</label>
                                                    <input type="number" id="nomor_kk" name="nomor_kk" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nama Panggilan Sehari hari</label>
                                                    <input type="text" id="nama_panggilan" name="nama_panggilan" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Agama (Sesuai KK / KTP)</label>
                                                    <input type="text" id="agama" name="agama" value="Islam" class="form-control" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Kewarganegaraan</label>
                                                    <input type="text" id="negara" name="negara" value="Indonesia" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="divider">
                                            <div class="divider-text">
                                                <b>Kegemaran / Bakat diri</b>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Bahasa Sehari Hari di rumah</label>
                                                    <input type="text" id="bahasa_seharihari" name="bahasa_seharihari"  placeholder="Ex: Bahasa Aceh/Bahasa Inggris" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Bidang Kesenian</label>
                                                    <input type="text" id="kesenian" name="kesenian" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Bidang Olah Raga</label>
                                                    <input type="text" id="olah_raga" name="olah_raga" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Organisasi / Kemasyarakatan</label>
                                                    <input type="text" id="organisasi" name="organisasi" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divider">
                                            <div class="divider-text">
                                                <b>Data Jasmani Diri</b>
                                            </div>
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Golongan Darah</label>
                                                    <select name="golongan_darah" id="golongan_darah" class="form-select" required>
                                                        <option value="">Silahkan Pilih</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="AB">AB</option>
                                                        <option value="O">O</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Penyakit Yang Pernah Diderita</label>
                                                    <input type="text" id="penyakit_pernah" name="penyakit_pernah" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Penyakit Yang Sedang Diderita</label>
                                                    <input type="text" id="penyakit_sekarang" name="penyakit_sekarang" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Kelainan Jasmani</label>
                                                    <input type="text" id="kelainan_jasmani" name="kelainan_jasmani" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tinggi Badan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" id="tinggi" name="tinggi" class="form-control" required>
                                                        <span class="input-group-text" id="basic-addon2">CM</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Berat Badan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" id="berat_badan" name="berat_badan" class="form-control" required>
                                                        <span class="input-group-text" id="basic-addon2">KG</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="divider">
                                            <div class="divider-text">
                                                <b>Data Keluarga / Saudara</b>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Sudara Tiri</label>
                                                    <input type="number" id="saudara_tiri" name="saudara_tiri" value="0" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Sudara Angkat</label>
                                                    <input type="number" id="saudara_angkat" name="saudara_angkat" value="0" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>NIK (KTP) Ayah</label>
                                                    <input type="number" id="nik_ayah" name="nik_ayah" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Agama Ayah</label>
                                                    <input type="text" id="agama_ayah" name="agama_ayah" value="Islam" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Domisili Ayah</label>
                                                    <select class="form-select sel_dom_ayah" required>
                                                        <option value="">Silahkan Pilih</option>
                                                        <option value="sama">Sama Dengan Pendaftar</option>    
                                                        <option value="beda">Beda Alamat</option>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row d-none" id="domisili_ayah">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Alamat Lengkap Tempat Tinggal (AYAH)</label>
                                                    <input type="text" id="alamat_ayah" name="alamat_ayah" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>NIK (KTP) IBU</label>
                                                    <input type="number" id="nik_ibu" name="nik_ibu" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Agama Ibu</label>
                                                    <input type="text" id="agama_ibu" name="agama_ibu" value="Islam" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Domisili Ibu</label>
                                                    <select class="form-select sel_dom_ibu" required>
                                                        <option value="">Silahkan Pilih</option>
                                                        <option value="sama">Sama Dengan Pendaftar</option>    
                                                        <option value="beda">Beda Alamat</option>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-none" id="domisili_ibu">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Alamat Lengkap Tempat Tinggal (IBU)</label>
                                                    <input type="text" id="alamat_ibu" name="alamat_ibu" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">    
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Nama Wali</label>
                                                    <input type="text" name="nama_wali" class="form-control nama_wali" readonly required>
                                                </div>
                                            </div>                                    

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Domisili Wali</label>
                                                    <select class="form-select sel_dom_wali" required>
                                                        <option value="">Silahkan Pilih</option>
                                                        <option value="sama">Sama Dengan Pendaftar</option>    
                                                        <option value="beda">Beda Alamat</option>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-none" id="domisili_wali">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Alamat Lengkap Tempat Tinggal (WALI)</label>
                                                    <input type="text" id="alamat_wali" name="alamat_wali" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                    </form>  
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn btn-primary me-1 mb-1 btnsave" onClick="save()">Save</button>
                                        </div>
                                    </div>                             
                                </div>
                            </div>
                        </div>
                    </section>