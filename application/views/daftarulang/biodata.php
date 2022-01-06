                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h3>Perbaikan</h3>
                                        <h3>Kembali lagi dalam 2 Jam kedepan</h3>
                                    </center>                            
                                </div>
                            </div>
                        </div>
                    </section>