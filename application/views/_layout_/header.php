           
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/logo.png" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">
                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                    <?php if(!$this->session->has_userdata('id')): ?>

                        <?php $this->view('_layout_/nav_no_session'); ?>

                    <?php elseif($this->session->has_userdata('id')): ?>
                        <?php $user = $this->M_Peserta->get($this->session->userdata['id']); ?>

                        <?php if($user->jalur == "undangan"): ?>
                            <?php $this->view('_layout_/nav_with_session_udg'); ?>
                        <?php elseif($user->jalur == "reguler"): ?>
                            <?php $this->view('_layout_/nav_with_session_reg'); ?>
                        <?php endif; ?>

                    <?php endif; ?>
            </header>