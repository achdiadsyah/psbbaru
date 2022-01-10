                    
                    <?php 
                        $id = $this->session->userdata['id'];
                        $user = $this->M_Peserta->get($id);
                    ?>
                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h5>Sedang Perbaikan</h5>
                                    </center>
                                    <div class="button-group mt-3">
                                        <button class="btn btn-primary lokasi" onClick="save()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>