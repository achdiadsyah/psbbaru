                    
                    <section class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h5>SYARAT-SYARAT PENDAFTARAN ULANG SANTRI BARU
                                            <br>UNDANGAN TAHUN PELAJARAN 2021/2022
                                        </h5>
                                        <hr>
                                    </center>
                                    <ol>
                                        <li>Pendaftaran Ulang Mulai Tanggal <?= date_indo(psb_detail('buka_daftar_ulang_undangan')); ?> s/d <?= date_indo(psb_detail('tutup_daftar_ulang_undangan')); ?> Pukul: 08.30 – 13.00 Setiap Hari Kerja.</li>
                                        <li>Total Biaya yang Harus Dilunasi Saat Pendaftaran Ulang <b>Rp. 11.200.000,- (Sebelas Juta Dua Ratus Ribu Rupiah)</b>, Dengan Rincian Sebagai Berikut :</li> 
                                            <table class="table table-striped mt-3 mb-3" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>Infak Pembangunan</td>
                                                        <td><?= rupiah("8000000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>Biaya Seragam Madrasah (Baju Almamater, Sepasang Pakaian Batik & Sepasang Pakaian Olahraga)</td>
                                                        <td><?= rupiah("800000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>Biaya Sumbangan Perpusatakaan</td>
                                                        <td><?= rupiah("100000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4.</td>
                                                        <td>Biaya Kestahan dan Obat</td>
                                                        <td><?= rupiah("150000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5.</td>
                                                        <td>Biaya Atribut Osismada (KTS, Bordir nama 3 pcs, Dasi Laki laki)</td>
                                                        <td><?= rupiah("100000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6.</td>
                                                        <td>Biaya Kegiatan Ekstrakulikuler</td>
                                                        <td><?= rupiah("250000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7.</td>
                                                        <td>Biaya Perawatan Air, Listrik, Sarana dan Prasarana</td>
                                                        <td><?= rupiah("150000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8.</td>
                                                        <td>Kitab / Buku Dayah</td>
                                                        <td><?= rupiah("150000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9.</td>
                                                        <td>Modul Matrikulasi</td>
                                                        <td><?= rupiah("100000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10.</td>
                                                        <td>Biaya Buka Tabungan Santri (TASRI)</td>
                                                        <td><?= rupiah("50000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>11.</td>
                                                        <td>Biaya Peretemuan Wali Santri</td>
                                                        <td><?= rupiah("100000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>12.</td>
                                                        <td>Biaya SPP Bulan Pertama</td>
                                                        <td><?= rupiah("650000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>13.</td>
                                                        <td>Biaya Konsumsi Bulan Pertama</td>
                                                        <td><?= rupiah("600000"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><b>Total</b></td>
                                                        <td><b><?= rupiah("11200000"); ?></b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <li>Semua Biaya di transfer ke :
                                            <ul>
                                                <li>BANK ACEH SYARI'AH</li>
                                                <li>A.N Madrasah Aliyah Ruhul Islam Anak Bangsa</li>
                                                <li>NO REG GIRO : 614 01.99 000077-7</li>
                                                <li><b>TIDAK MENERIMA UANG CASH / BAYAR DI DAYAH !</b></li>
                                            </ul>
                                        </li>
                                        <br>
                                        <li>Poin-poin berikut harap diupload ke website <b>psb.ruhulislam.com</b> di akun masing-masing
                                            <ol type="A">
                                                <li>Scan Bukti Transfer Biaya Daftar Ulang</li>
                                                <li>Scan KK (Kartu Keluarga)</li>
                                                <li>Scan KTP Ayah</li>
                                                <li>Scan KTP IBU</li>
                                                <li>Scan KTP WALI (Tidak Wajib)</li>
                                                <li>Scan Kartu ASKES / BPJS</li>
                                                <li>Scan Kartu NISN</li>
                                                <li>Scan Kartu KIP (Tidak Wajib)</li>
                                                <li>Scan Surat Sehat</li>
                                                <li>Scan Surat tidak pindah jurusan
                                                    <br> <a href="<?= base_url('assets/file/surattidakpindahjurusan.docx'); ?>" class="btn btn-sm btn-primary">Download Contoh Surat</a>
                                                </li>
                                                <br>
                                            </ol>
                                        </li>
                                        <br>
                                        <li>
                                            Berikut Berkas yang perlu di bawa ke Dayah :
                                            <ol type="A">
                                                <li>Bukti Transfer Daftar Ulang</li>
                                                <li>Surat Pernyataan Bersedia Mengikuti Tata Tertib Dayah</li>
                                                <li>Surat Kesanggupan Membiayai</li>
                                                <li>Surat Tidak Pindah Jurusan</li>
                                                <li>Bukti Cetak Kelulusan</li>
                                                <li>Pas Photo 3x4 = 5 Lembar (Latar Merah)</li>
                                                <li>Pas Photo 2x3 = 2 Lembar (Latar Merah)</li>
                                            </ol>
                                        </li>
                                        <br>
                                        <li>Saat pendaftaran ke dayah, calon siswa/santri tidak perlu hadir</li>
                                    </ol>
                                    <hr>
                                    <center>
                                        <h3>PENTING !!</h3>
                                        <p>Calon santri baru yang tidak mendaftar ulang sampai dengan tanggal <b><?= date_indo(psb_detail('tutup_daftar_ulang_undangan')); ?></b>, di anggap <b>Mengundurkan diri</b> </p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </section>