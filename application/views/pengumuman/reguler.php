                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php if(check_open(psb_detail("pengumuman_reguler"), psb_detail("tutup_daftar_ulang_reguler")) == "Open"): ?>
                                    
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