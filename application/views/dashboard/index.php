                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <p>Assalamua'laikum, <?= $user->nama; ?></p>                       
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Proses Pendaftaran Anda</h4>
                                        </div>
                                        <div class="card-body">
                                            <table width="100%" class="table table-striped">
                                                <tr>
                                                    <td>Jalur Pilihan</td>
                                                    <?php if($user->jalur == "reguler"): ?>
                                                    <td><span class="badge bg-success">Reguler</span></td>
                                                    <?php elseif($user->jalur == "undangan"): ?>
                                                    <td><span class="badge bg-primary">Undangan</span></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Status Akademik Pilihan</td>
                                                    <td><span class="badge bg-info"><?= what_akademik($user->s_akademik); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Pembayaran & Konfirmasi</td>
                                                    <?php if ($user->s_payment == 0): ?>
                                                    <td><a href="<?= base_url('pembayaran'); ?>"><span class="badge bg-danger">Belum</span></a></td>
                                                    <?php elseif ($user->s_payment == 1): ?>
                                                    <td><span class="badge bg-success">Sudah</span></td>    
                                                    <?php elseif ($user->s_payment == 2): ?>
                                                    <td><span class="badge bg-warning">Di Tolak</span></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Mengisi Biodata</td>
                                                    <?php if ($user->s_biodata == 0): ?>
                                                    <td><a href="<?= base_url('biodata'); ?>"><span class="badge bg-danger">Belum</span></a></td>
                                                    <?php else: ?>
                                                    <td><span class="badge bg-success">Sudah</span></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Upload Berkas</td>
                                                    <?php if ($user->s_file == 0): ?>
                                                    <td><a href="<?= base_url('berkas'); ?>"><span class="badge bg-danger">Belum</span></a></td>
                                                    <?php else: ?>
                                                    <td><span class="badge bg-success">Sudah</span></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Pilih Jadwal</td>
                                                    <?php if ($user->jadwal_ujian == NULL): ?>
                                                    <td><a href="<?= base_url('cetak'); ?>"><span class="badge bg-danger">Belum</span></a></td>
                                                    <?php else: ?>
                                                    <td><span class="badge bg-success">Sudah</span></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Penentuan Nomor Ujian</td>
                                                    <?php if ($user->no_ujian == ''): ?>
                                                    <td><span class="badge bg-danger">Belum</span></td>
                                                    <?php else: ?>
                                                    <td><span class="badge bg-success"><?= $user->no_ujian; ?></span></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Cetak Kartu Ujian</td>
                                                    <?php if ($user->s_cetak == 0): ?>
                                                    <td><a href="<?= base_url('cetak'); ?>"><span class="badge bg-danger">Belum</span></a></td>
                                                    <?php else: ?>
                                                    <td><a href="<?= base_url('cetak'); ?>"><span class="badge bg-success">Sudah</span></a></td>
                                                    <?php endif; ?>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Tanggal dan Jadwal Anda</h4>
                                        </div>
                                        <div class="card-body">
                                            <table width="100%" class="table table-striped">
                                                <tr>
                                                    <td>Tanggal Ujian Anda</td>

                                                    <?php if ($user->jadwal_ujian == NULL): ?>
                                                        <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                    <?php else: ?>
                                                        <td><?= longdate_indo($user->jadwal_ujian); ?></td>
                                                    <?php endif; ?>
                                                </tr>
                                                
                                                <?php if ($user->jalur !== "undangan"): ?>
                                                <tr>
                                                    <td>Ruang Ujian CAT</td>
                                                    <?php if ($user->ruang_cat == ""): ?>
                                                    <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                    <?php else: ?>
                                                    <td><?= $user->ruang_cat; ?></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td>Sesi Ujian CAT</td>
                                                    <?php if ($user->jalur == "undangan"): ?>
                                                    <td><span class="badge bg-success">Tidak Ada Ujian</span></td>
                                                    <?php elseif($user->jalur == "reguler"): ?>
                                                        <?php if ($user->sesi_cat == ""): ?>
                                                        <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                        <?php else: ?>
                                                        <td><?= $user->sesi_cat." WIB"; ?></td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tr>

                                                <?php if ($user->jalur !== "undangan"): ?>
                                                <tr>
                                                    <td>Ruang Ujian Lisan</td>
                                                    <?php if ($user->ruang_lisan == ""): ?>
                                                    <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                    <?php else: ?>
                                                    <td><?= $user->ruang_lisan; ?></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td>Sesi Ujian Lisan</td>
                                                    <?php if ($user->sesi_lisan == ""): ?>
                                                    <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                    <?php else: ?>
                                                    <td><?= $user->sesi_lisan." WIB"; ?></td>
                                                    <?php endif; ?>
                                                </tr>

                                                <?php if ($user->jalur == "undangan"): ?>
                                                <tr>
                                                    <td>Lokasi Ujian Anda</td>
                                                    <?php if ($user->ujian_via == NULL): ?>
                                                    <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                    <?php else: ?>
                                                        <?php if ($user->ujian_via == "offline"): ?>
                                                            <td><span class="badge bg-info">Offline - Di Kampus</span></td>
                                                        <?php elseif ($user->ujian_via == "online"): ?>
                                                            <td><span class="badge bg-info">Online - Zoom / Google Meet</span></td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endif; ?>    



                                                <?php if ($user->jalur == "undangan"): ?>
                                                <tr>
                                                    <td>Pengumuman Seleksi Adm (Undangan)</td>
                                                    <td><?= longdate_indo(psb_detail('pengumuman_adm_undangan')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pengumuman Jalur Undangan</td>
                                                    <td><?= longdate_indo(psb_detail('pengumuman_undangan')); ?></td>
                                                </tr>
                                                <?php elseif($user->jalur == "reguler"): ?>
                                                <tr>
                                                    <td>Pengumuman Jalur Reguler</td>
                                                    <td><?= longdate_indo(psb_detail('pengumuman_reguler')); ?></td>
                                                </tr>
                                                <?php endif; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>