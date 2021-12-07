                    
                    <section class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="<?= base_url('auth/do_login'); ?>" method="post">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>NIK</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" placeholder="NIK" id="nik" name="nik" minlength="16" maxlength="16" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
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
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Login</button>
                                                    <a href="<?= base_url('auth/forgetpass'); ?>" class="btn btn-danger me-1 mb-1">Lupa Password</a>
                                                </div>
                                                <p><small class="text-muted">Belum Punya Akun ?, <a href="<?= base_url('auth/register'); ?>">Silahkan Daftar</a></small></p>
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
                                        <li>Pastikan NIK dan Password Anda Benar</li>
                                        <li>Hubungi kami di menu <a href="<?= base_url('home/contact_us'); ?>"><b>Hubungi Kami</b></a> Jika anda lupa password</li>
                                        <li>Jaga Kerahasiaan akun anda</li>
                                        <li>Lakukan Logout setiap kali selesai mengakses portal PSB</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>