                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <?php if($user->jalur == "reguler"): ?>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Upload Bukti Pembayaran</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <form action="#" id="form" enctype="multipart/form-data">
                                                        <input type="hidden" name="nik" id="nik" value="<?= $this->session->userdata['nik']; ?>" required>
                                                        <fieldset>
                                                            <div class="input-group d-none" id="input_file">
                                                                <input type="file" class="form-control" name="file" id="file" accept="image/x-png,image/jpg,image/jpeg" required>
                                                                <button class="btn btn-primary" type="button" id="btnSave" onClick="save()">Upload</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <p id="status_file" class="lead mx-auto"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Tata Cara Melakukan Pembayaran</h4>
                                        </div>
                                        <div class="card-body">
                                            <ol>
                                                <li>Lakukan Transfer / Pemindahan Dana Sebesar <b><?= rupiah(psb_detail("biaya_psb")); ?></b></li>
                                                <li>Tujuan Transfer
                                                    <ul>
                                                        <li>Bank : <b><?= psb_detail("nama_bank"); ?></b></li>
                                                        <li>NoRek : <b><?= psb_detail("no_rekening"); ?></b></li>
                                                        <li>A/N : <b><?= psb_detail("nama_rekening"); ?></b></li>
                                                        <li>Berita : <b>PSB-<?= $user->nik; ?></b></li>
                                                    </ul>
                                                </li>
                                                <li>Simpan Bukti Transfer</li>
                                                <li>Lakukan konfirmasi pembayaran dengan cara upload bukti transfer di menu yang telah di sediakan</li>
                                                <li>Tunggu hingga anda menerima notifikasi dari kami, bahwa pembayaran telah di terima</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif($user->jalur == "undangan"): ?>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <p class="lead">Peserta Jalur Undangan, Tidak ada metode pembayaran di temukan.</p>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>