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
                                                    <td><span  pan class="badge bg-success">Reguler</span></td>
                                                    <?php elseif($user->jalur == "undangan"): ?>
                                                    <td><span class="badge bg-primary">Undangan</span></td>
                                                    <?php endif; ?>
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
                                                    <td>Mengikuti Ujian CAT dan Lisan</td>
                                                    <td><a href="#"><span class="badge bg-danger">Belum</span></a></td>
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
                                                    <?php if ($user->jalur == "undangan"): ?>
                                                    <td><?= longdate_indo($user->jadwal_ujian); ?></td>
                                                    <?php elseif($user->jalur == "reguler"): ?>
                                                        <?php if ($user->jadwal_ujian == NULL): ?>
                                                        <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                        <?php else: ?>
                                                        <td><?= longdate_indo($user->jadwal_ujian); ?></td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                <td>Sesi Ujian CAT</td>
                                                    <?php if ($user->jalur == "undangan"): ?>
                                                    <td><span class="badge bg-success">Tidak Ada</span></td>
                                                    <?php elseif($user->jalur == "reguler"): ?>
                                                        <?php if ($user->sesi_cat == ""): ?>
                                                        <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                        <?php else: ?>
                                                        <td><?= $user->jadwal_ujian; ?></td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Sesi Ujian Lisan</td>
                                                    <?php if ($user->sesi_lisan == ""): ?>
                                                    <td><span class="badge bg-danger">Belum Pilih</span></td>
                                                    <?php else: ?>
                                                    <td><?= $user->sesi_lisan; ?></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td>Pengumuman Jalur Reguler</td>
                                                    <td><?= longdate_indo(psb_detail('pengumuman_reguler')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pengumuman Seleksi Adm (Undangan)</td>
                                                    <td><?= longdate_indo(psb_detail('pengumuman_adm_undangan')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pengumuman Jalur Undangan</td>
                                                    <td><?= longdate_indo(psb_detail('pengumuman_undangan')); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>