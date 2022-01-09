                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php if(check_close(psb_detail("pengumuman_reguler"), psb_detail("tutup_daftar_ulang_reguler")) == "Open"): ?>
                                        <?php if ($user->s_lulus == "1"): ?>
                                            <div id="lulus">
                                                <center>
                                                    <p class="lead">Selamat!! Anda di nyatakan <br><span class="badge bg-success">LULUS SELEKSI REGULER</span></p>
                                                    <br/>
                                                    <p>Silahkan Lakukan Pendaftaran Ulang, Pada Menu <a href="<?= base_url('daftarulang'); ?>">Daftar Ulang</a></p>
                                                    <p>Terima Kasih</p>
                                                </center>
                                            </div>
                                        <?php elseif ($user->s_lulus == "0"): ?>
                                            <div id="nolulus">
                                                <center>
                                                    <p class="lead">Maaf :( Anda <br><span class="badge bg-danger">TIDAK LULUS</span></p>
                                                    <br/>
                                                    <p>Jangan berkecil hati, hanya ALLAH yang tak pernah gagal. Wajarlah jika manusia pernah gagal.<br>
                                                    Oleh karena itu, jangan biarkan rasa kecewa menghentikan pikiran anda untuk menemukan penyebab kegagalan.
                                                    </p>
                                                    <p>Semangat Terus, Terima Kasih sudah berpartisipasi</p>
                                                </center>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <center>
                                            <p class="lead">Pengumuman Belum Di Buka</p>
                                            <p>Pengumuman Jalur Reguler Tanggal : <?= date_indo(psb_detail("pengumuman_reguler")); ?></p>
                                        </center>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>