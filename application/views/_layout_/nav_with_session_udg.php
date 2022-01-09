<?php 
    $user = $this->M_Peserta->get($this->session->userdata['id']);
?>

                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url('dashboard'); ?>" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dahboard</span>
                                </a>
                            </li>

                            <?php if(check_close(psb_detail("pengumuman_adm_undangan"), psb_detail("tutup_daftar_reguler")) == "Open"): ?>
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url('pengumuman/adm'); ?>" class='menu-link'>
                                    <i class="bi bi-file-fill"></i>
                                    <span>Pengumuman ADM</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(check_close(psb_detail("pengumuman_undangan"), psb_detail("tutup_daftar_ulang_reguler")) == "Open"): ?>
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url('pengumuman/undangan'); ?>" class='menu-link'>
                                    <i class="bi bi-megaphone-fill"></i>
                                    <span>Pengumuman</span>
                                </a>
                            </li>

                                <?php if($user->s_lulus == "1" && $user->s_lulus_adm == "1"): ?>
                                <li
                                    class="menu-item  ">
                                    <a href="<?= base_url('daftarulang'); ?>" class='menu-link'>
                                        <i class="bi bi-chat-dots"></i>
                                        <span>Info Daftar Ulang</span>
                                    </a>
                                </li>
                                <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Kelengkapan</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">     
                                        <ul class="submenu-group">
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('daftarulang/berkas'); ?>"
                                                    class='submenu-link'>Berkas</a>
                                            </li>  
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('daftarulang/biodata'); ?>"
                                                    class='submenu-link'>Biodata</a>
                                            </li>                                              
                                        </ul>
                                    </div>
                                </div>

                                <li
                                    class="menu-item  ">
                                    <a href="<?= base_url('daftarulang/cetak'); ?>" class='menu-link'>
                                        <i class="bi bi-printer"></i>
                                        <span>Cetak</span>
                                    </a>
                                </li>
                            </li>
                                <?php endif; ?>
                            <?php else: ?>

                                <li
                                    class="menu-item  ">
                                    <a href="<?= base_url('biodata'); ?>" class='menu-link'>
                                        <i class="bi bi-pen-fill"></i>
                                        <span>Biodata</span>
                                    </a>
                                </li>

                                <li
                                    class="menu-item  ">
                                    <a href="<?= base_url('berkas'); ?>" class='menu-link'>
                                        <i class="bi bi-file-fill"></i>
                                        <span>Berkas & File</span>
                                    </a>
                                </li>

                                <li
                                    class="menu-item  ">
                                    <a href="<?= base_url('cetak'); ?>" class='menu-link'>
                                        <i class="bi bi-printer-fill"></i>
                                        <span>Cetak Kartu Ujian</span>
                                    </a>
                                </li>
                                
                            <?php endif; ?>
                            
                            <li
                                class="menu-item mr-5 float-right">
                                <a href="<?= base_url('auth/logout'); ?>" class='menu-link'>
                                    <i class="bi bi-person-fill"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>