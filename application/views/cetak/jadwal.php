                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <p class="lead">Anda harus memilih jadwal ujian, sebelum mencetak kartu</p>
                                        <p>Jadwal hanya dapat di pilih sekali, dan tidak dapat di rubah <br>Pastikan anda memilih jadwal dengan benar</p>

                                        <p class="lead">Waktu Anda 15 Detik</p>
                                    </center>
                                    <form method="post" class="form-horizontal" id="form-jadwal">
                                        <div class="form-group">
                                            <label>Pilih Jurusan</label>
                                            <select name="jurusan" id="jurusan" class="form-select" required>
                                                <option value="">Pilih Jurusan</option>
                                                <?php if($user->jalur == "reguler"): ?>
                                                <option value="A">(IPA) - Ilmu Pengatahuan Alam</option>
                                                <option value="G">(MAK) - Ilmu Keagamaan</option>

                                                <?php elseif($user->jalur == "undangan"): ?>
                                                
                                                <option value="A-UDG">(IPA) - Ilmu Pengatahuan Alam</option>
                                                <option value="G-UDG">(MAK) - Ilmu Keagamaan</option>

                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal_ujian">Pilih Jadwal Ujian</label>
                                            <select name="jadwal_ujian" id="jadwal_ujian" class="form-control" required>
                                                
                                            </select>
                                        </div>
                                    </form>
                                    <div class="button-group mt-3">
                                        <button class="btn btn-primary lokasi" onClick="save()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>