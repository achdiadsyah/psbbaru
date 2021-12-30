                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php if(check_close(psb_detail("pengumuman_adm_undangan"), psb_detail("tutup_daftar_ulang_reguler")) == "Open"): ?>
                                        <?php if ($user->s_lulus_adm == "1"): ?>
                                            <div id="lulus">
                                                <center>
                                                    <p class="lead">Selamat!! Anda di nyatakan <br><span class="badge bg-success">LULUS</span></p>
                                                    <br/>
                                                    <p>Silahkan Lakukan Cetak Berkas, Pada Menu <a href="<?= base_url('cetak'); ?>">Cetak Berkas</a></p>
                                                    <p>Terima Kasih</p>
                                                </center>
                                            </div>
                                            
                                        <?php elseif ($user->s_lulus_adm == "0"): ?>
                                            <div id="nolulus">
                                                <center>
                                                    <p class="lead">Maaf :( Anda <br><span class="badge bg-danger">Tidak Lulus</span></p>
                                                    <br/>
                                                    <p>Jangan berkecil hati, hanya ALLAH yang tak pernah gagal. Wajarlah jika manusia pernah gagal.<br>
                                                    Oleh karena itu, jangan biarkan rasa kecewa menghentikan pikiran anda untuk menemukan penyebab kegagalan.
                                                    </p>
                                                    <h4>Jangan Berkecil hati, anda masih bisa mengikuti Test Jalur <b>REGULER</b></h4>
                                                    <p>Klik Tombol di bawah ini untuk beralih</p>
                                                    <button class="btn btn-primary btn-sm" onclick="alih_jalur('<?php echo $user->nik; ?>')">Saya Ingin Beralih Ke Reguler</button>
                                                </center>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <center>
                                            <p class="lead">Pengumuman Belum Di Buka</p>
                                            <p>Pengumuman Jalur Undangan Tanggal : <?= date_indo(psb_detail("pengumuman_undangan")); ?></p>
                                        </center>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>