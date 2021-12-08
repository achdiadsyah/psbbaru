                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url(); ?>" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Beranda</span>
                                </a>
                            </li>

                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Informasi</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('home/biaya'); ?>"
                                                    class='submenu-link'>Biaya Pendaftaran</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('home/alur'); ?>"
                                                    class='submenu-link'>Alur Pendaftaran</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('home/contact_us'); ?>"
                                                    class='submenu-link'>Hubungi Kami</a>

                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Download</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('assets/images/brosur.pdf'); ?>"
                                                    class='submenu-link' download>Download Brosur</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('assets/images/booklet.pdf'); ?>"
                                                    class='submenu-link' download>Download Booklet</a>

                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-megaphone-fill"></i>
                                    <span>Pengumuman Kelulusan</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('pengumuman/reguler'); ?>"
                                                    class='submenu-link'>Jalur Reguler</a>
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('pengumuman/undangan'); ?>"
                                                    class='submenu-link'>Jalur Undangan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php if(check_open(psb_detail("buka_daftar_undangan"), psb_detail("tutup_daftar_ulang_reguler")) == "Open"): ?>
                            <li
                                class="menu-item mr-5 float-right">
                                <a href="<?= base_url('auth/register'); ?>" class='menu-link'>
                                    <i class="bi bi-person-fill"></i>
                                    <span>Daftar</span>
                                </a>
                            </li>
                            <li
                                class="menu-item mr-5 float-right">
                                <a href="<?= base_url('auth/login'); ?>" class='menu-link'>
                                    <i class="bi bi-person-fill"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>