                    
                    <section class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="<?= base_url('auth/do_forgetpass'); ?>" method="post" id="form-lupapassword">
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
                                                    <label>Nomor Whatsapp</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Nomor Whatsapp" id="no_telepon" name="no_telepon" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
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
                                        <li>Masukkan Nomor Whatsapp anda dan Nomor NIK anda</li>
                                        <li>Jika Benar maka anda akan di arahkan ke laman pergantian password</li>
                                        <li>Simpanlah dengan aman, dan jaga kerahasiaan akun anda.</li>
                                        <li>Lakukan Logout setiap kali selesai mengakses portal PSB</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>