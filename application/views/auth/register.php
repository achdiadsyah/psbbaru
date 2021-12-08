                    
                    <section class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="<?= base_url('auth/do_register'); ?>" method="post">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>NIK <small>(Sesuai di KTP / KK)</small></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" placeholder="NIK" id="nik" name="nik" minlength="16" minlength="16" maxlength="16" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Nama</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>No WhatsApp</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" placeholder="Nomor Whatsapp" id="no_telepon" name="no_telepon" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kode Undangan</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Kode Peserta Undangan" id="kode_undangan" name="kode_undangan">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                        <p><small class="text-muted">Biarkan kosong, jika anda peserta reguler</small></p>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Register</button>
                                                </div>
                                                <p><small class="text-muted">Sudah Punya Akun ?, <a href="<?= base_url('auth/login'); ?>">Silahkan Login</a></small></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <p>Perhatian !</p>
                                    <ol>
                                        <li>Pastikan anda mengingat setiap detail NIK dan Password anda</li>
                                        <li>Hubungi kami di menu <a href="<?= base_url('home/contact_us'); ?>"><b>Hubungi Kami</b></a> Jika anda lupa password</li>
                                        <li>Jaga Kerahasiaan akun anda</li>
                                        <li>Lakukan Logout setiap kali selesai mengakses portal PSB</li>
                                        <li>Jika anda peserta jalur undangan wajib memasukkan kode yang di berikan</li>
                                        <li>Untuk mendapatkan <b>Kode Undangan</b>, harap hubungi panitia</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>