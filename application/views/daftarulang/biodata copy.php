                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">     
                                    <center>
                                        <h4>Sedang perbaikan sistem</h4>
                                        <h5>Silahkan kembali lagi, pada jam 15:00 WIB Tanggal <?= date_indo(psb_detail('buka_daftar_ulang_undangan')); ?></h5>

                                        <br>
                                        <p>Atau Lanjutkan upload berkas kelengkapan terlebih dahulu</p>
                                        <a href="<?= base_url('daftarulang/berkas'); ?>" class="btn btn-primary">Lengkapi Berkas</a>
                                    </center>                               
                                </div>
                            </div>
                        </div>
                    </section>