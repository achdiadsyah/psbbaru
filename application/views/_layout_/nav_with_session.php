<?php 
    $id = $this->session->userdata['id'];
    $user = $this->M_Peserta->get($id);
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

                            <li
                                class="menu-item  ">
                                <a href="<?= base_url('pembayaran'); ?>" class='menu-link'>
                                    <i class="bi bi-wallet-fill"></i>
                                    <span>Pembayaran</span>
                                </a>
                            </li>

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
                                    <span>Cetak Berkas</span>
                                </a>
                            </li>

                            <?php if($user->jalur == "reguler"): ?>
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url('pengumuman/reguler'); ?>" class='menu-link'>
                                    <i class="bi bi-megaphone-fill"></i>
                                    <span>Pengumuman</span>
                                </a>
                            </li>
                            <?php elseif($user->jalur == "undangan"): ?>
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url('pengumuman/undangan'); ?>" class='menu-link'>
                                    <i class="bi bi-megaphone-fill"></i>
                                    <span>Pengumuman</span>
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