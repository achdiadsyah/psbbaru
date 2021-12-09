                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <p class="lead">Anda harus memilih lokasi ujian, sebelum mencetak kartu</p>
                                        <p>Lokasi hanya dapat di pilih sekali, dan tidak dapat di rubah <br>Pastikan anda memilih lokasi ujian dengan benar</p>
                                    </center>
                                    <form method="post" class="form-horizontal" id="form-lokasi">
                                        <div class="form-group">
                                            <label for="ujian_via">Pilih Lokasi Ikut Ujian Wawancara</label>
                                            <select name="ujian_via" id="ujian_via" class="form-control" required>
                                                <option value="">Pilih Lokasi</option>
                                                <option value="online">ONLINE - Google Meet / Zoom</option>
                                                <option value="offline">OFFLINE - Datang Langsung Ke Dayah</option>
                                            </select>
                                        </div>
                                        <span id="result">
                                            
                                        </span>
                                    </form>
                                    <div class="button-group mt-3">
                                        <button class="btn btn-primary lokasi" onClick="save()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>