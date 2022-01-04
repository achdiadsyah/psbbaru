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
                                            <i class="bi bi-pen-fill"></i>
                                            <span>Daftar Ulang</span>
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
                                                    <a href="<?= base_url('daftarulang/biodata'); ?>"
                                                        class='submenu-link'>Biodata</a>
                                                </li>
                                                <li
                                                    class="submenu-item  ">
                                                    <a href="<?= base_url('daftarulang/berkas'); ?>"
                                                        class='submenu-link'>Berkas</a>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php $this->view('_layout_/nav_with_session'); ?>
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