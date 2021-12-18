                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <p class="lead">Anda harus memilih lokasi ujian, sebelum mencetak kartu</p>
                                        <p>Lokasi hanya dapat di pilih sekali, dan tidak dapat di rubah <br>Pastikan anda memilih lokasi ujian dengan benar</p>
                                    </center>
                                    <form method="post" class="form-horizontal" id="form-lokasi">
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
                                            <label for="ujian_via">Pilih Lokasi Ikut Ujian Wawancara</label>
                                            <select name="ujian_via" id="ujian_via" class="form-control" required>
                                                <option value="">Pilih Lokasi</option>
                                                <option value="online">ONLINE - Google Meet / Zoom</option>
                                                <option value="offline">OFFLINE - Datang Langsung Ke Dayah</option>
                                            </select>
                                        </div>
                                        <span id="result">
                                            
                                        </span>
                                    </form>
                                    <div class="button-group mt-3">
                                        <button class="btn btn-primary lokasi" onClick="save()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>