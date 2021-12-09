
<?php

ob_start();
$pdf = new Pdf('P', '', 'A4', true, 'UTF-8', false);
$pdf->SetTitle($title);
$pdf->SetTopMargin(5);
$pdf->setFooterMargin(8);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set font
$pdf->SetFont('freeserif', '', 11);

$pdf->SetAuthor('Ruhul Islam Anak Bangsa');

// Lembar Kartu ujian
$pdf->AddPage();

$header = '<p><img src="'.$assetsurl.'header-kartuujian.png"></img></p>';
$pdf->writeHTML($header, true, false, false, false, '');
$pdf->Image($assetsurl.'psb-photo/'.$output->pasphoto, 172, 30, 28, '', '', '', '', false, 300);
$body = '
     <table width="100%">
          <tbody>
               <tr>
                    <td width="160">Asal Sekolah</td>
                    <td>: '.$output->asal_sekolah.'</td>
                    
               </tr>
               <br />
               <tr>
                    <td width="160"><strong>NOMOR UJIAN</strong></td>
                    <td><strong>: '.$output->no_ujian.'</strong></td>
               </tr>
               <tr>
                    <td width="160">Nama</td>
                    <td>: '.$output->nama.'</td>
               </tr>
               <tr>
                    <td width="160">Tempat/Tanggal Lahir</td>
                    <td>: '.$output->tempat_lahir.', '.date_indo($output->tanggal_lahir).'</td>
               </tr>
               <tr>
                    <td width="160">Jenis Kelamin</td>
                    <td>: '.$output->jenis_kelamin.'</td>
               </tr>
               <tr>
                    <td width="160">Pilihan Jurusan</td>
                    <td>: '.$output->jurusan.'</td>
               </tr>
                    
                    <p><strong>Waktu dan Tempat Pelaksanaan Ujian</strong></p>
               
               <tr>
                    <td width="160">Hari/Tanggal Ujian</td>
                    <td>: '.longdate_indo($output->jadwal_ujian).'</td>                
               </tr>
               <tr>
                    <td width="160">Lokasi</td>
                    <td>: Dayah Ruhul Islam Anak Bangsa</td>
               </tr>
               <tr>
                    <td width="160">Ruang Ujian Komputer</td>
                    <td>: <b>'.$output->ruang_cat.'</b> - Pukul : '.$output->sesi_cat.'</td>
               </tr>
               <tr>
                    <td width="160">Ruang Ujian Lisan (Wawancara)</td>
                    <td>: <b>'.$output->ruang_lisan.'</b> - Pukul : '.$output->sesi_lisan.'</td>
               </tr>
          </tbody>
     </table>
';
$pdf->writeHTML($body, true, false, true, false, '');
$pdf->StartTransform();
$pdf->Rotate(10, 70, 100);
$pdf->Image($assetsurl.'ttd.png', 110, 155, 55, '', '', '', '', false, 300);
$pdf->StopTransform();
$tanda_tangan = '
    <table width="100%">
        <tr>
            <td align="center">Wawancara</td>
            <td align="center">Ibadah</td>
            <td align="center">Baca Al-Quran</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td align="center">____________________</td>
            <td align="center">____________________</td>
            <td align="center">____________________</td>
        </tr>
        
     </table>
     <p></p>
     <table>
            <tr>
                <td></td>
                <td></td> 
                <td>
                    <br/>
                    Aceh Besar, '.date_indo($output->tanggal_daftar).'
                    <br/>
                    Ketua Panitia
                    <br />
                    <br />
                    <br />
                    <br />
                    <u>Rachmad Munazir</u>
                </td>               
            </tr>         
     </table>
     <p style="border: 1px solid black;"><b> Mekanisme calon santri yang akan mengikuti tes :</b>
     <ol>
          <li>Calon santri wajib hadir 30 menit sebelum jadwal tes dilaksanakan.</li>
          <li>Calon santri menyerahkan berkas yang telah disiapkan ke panitia di lokasi ujian.
            <ul>
                <li>Fotokopi rapor MTs/SMP semester 1,2,3 dan 4 yang telah di legalisir</li>
                <li>Surat Keterangan peringakat kelas dari sekolah/madrasah (Jika Ada)</li>
                <li>Melampirkan fotokopi sertifikat prestasi akademik dan non akademik (Jika Ada)</li>
                <li>Pas Photo Warna 3x4 sebanyak 3 Lembar</li>
                <li>Membawa Seluruh Berkas yang telah di cetak dan blangko wawancara wali santri yang telah di isi</li>
                <li>Membawa Slip kwitansi atau bukti pembayaran</li>
            </ul>
          </li>
          <li>Demi menghindari kerumunan massa, wali santri dilarang duduk berkelompok dan menciptakan kerumunan.</li>
          <li>Calon santri dan wali santri wajib berpakaian rapi :
            <ul>
                <li>Putra : Celana Kain, Kemeja/koko/batik dan peci</li>
                <li>Putri : Gamis atau Rok longgar, Baju minimal selutut, jelbab syar,i</li>
            </ul>
          </li>
     </ol>
     </p>
';
$pdf->writeHTML($tanda_tangan, true, false, false, false, '');
$pdf->endPage();

// Lembar Formulir
$pdf->AddPage();
$header = '<p><img src="'.$assetsurl.'header-formulir.png"></img></p>';
$pdf->writeHTML($header, true, false, false, false, '');
$pdf->Image($assetsurl.'psb-photo/'.$output->pasphoto, 172, 30, 28, '', '', '', '', false, 300);
$formulir = '   
    
    <h2 align="center" style="line-height: 1.1em;">'.$output->no_ujian.'</h2>
    <h3 align="center" style="line-height: 1.1em;">'.$output->jurusan.'</h3>

    <table cellpadding="1" class="table table-striped">
        <br />
        <tr>
            <td width="50mm">1. Nama</td>
            <td width="2mm">:</td>
            <td width="90mm"><b>'.$output->nama.'</b></td>
        </tr>
        <tr>
            <td>2. NISN</td>
            <td>:</td>
            <td>'.$output->nisn.'</td>
        </tr>
        <tr>
            <td>3. Tempat Lahir</td>
            <td>:</td>
            <td>'.$output->tempat_lahir.'</td>
        </tr>
            <tr>
            <td>4. Tanggal Lahir</td>
            <td>:</td>
            <td>'.date_indo($output->tanggal_lahir).'</td>
        </tr>
        <tr>
            <td>5. Jenis Kelamin</td>
            <td>:</td>
            <td>'.$output->jenis_kelamin.'</td>
        </tr>
        <tr>
            <td>6. Alamat </td>
            <td>:</td>
            <td width="160">'.$output->alamat.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Desa</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_desa($output->desa).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kecamatan</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_kecamatan($output->kecamatan).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kabupaten</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_kabupaten($output->kabupaten).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Provinsi</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_provinsi($output->provinsi).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kode Pos</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->kode_pos.'</td>
        </tr>
        <br />
        <tr>
            <td>7. Data Asal Sekolah</td>
            <td>:</td>
            <td width="28mm">Nama Sekolah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->asal_sekolah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Alamat Sekolah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->alamat_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kategori Sekolah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->jenis_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Tahun Lulus</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->tahun_lulus.'</td>
        </tr>
        <br />
        <tr>
            <td>8. Nama Orang Tua</td>
            <td>:</td>
            <td width="15mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>9. Pekerjaan Orang Tua</td>
            <td>:</td>
            <td width="15mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="52mm">'.$output->pekerjaan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="52mm">'.$output->pekerjaan_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>10. Penghasilan Orang Tua</td>
            <td>:</td>
            <td width="15mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="52mm">'.$output->penghasilan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="52mm">'.$output->penghasilan_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>11. No Telp </td>
            <td>:</td>
            <td width="15mm">Peserta</td>
            <td width="2mm">:</td>
            <td width="52mm">'.preg_replace("/^62/", "0", $output->no_telepon).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="52mm">'.preg_replace("/^62/", "0", $output->no_telepon_ayah).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="52mm">'.preg_replace("/^62/", "0", $output->no_telepon_ibu).'</td>
        </tr>
        <br />
        <tr>
            <td>12. Prestasi Non Akademik</td>
            <td>:</td>
            <td width="15mm">1</td>
            <td width="2mm">:</td>
            <td width="100mm">'.$output->prestasi_1.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">2</td>
            <td width="2mm">:</td>
            <td width="100mm">'.$output->prestasi_2.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="15mm">3</td>
            <td width="2mm">:</td>
            <td width="100mm">'.$output->prestasi_3.'</td>
        </tr>
    </table>
<br />
';
$pdf->writeHTML($formulir, true, false, false, false, '');

$tandatangan = '
    
    <table>
        <tbody>
        <tr>
            <td>
                
            </td>
            <td width="90mm" align="center">
                Aceh Besar, '.date_indo($output->tanggal_daftar).'<br / />
                <br />
                <br />
                <br />
                <br />
                ( '.$output->nama.' )
            </td>
        </tr>
        </tbody>
    </table>
';
$pdf->writeHTML($tandatangan, true, false, true, false, '');
$pdf->endPage();

// Lembar Blangko Orang Tua
$pdf->AddPage();
$blanko_ortu = '
<br/>
<h2 align="center">Blangko Wawancara Wali Santri</h2>
    <table style="border: 1px solid black; margin: auto; width: 100%;" cellpadding="1">
        <tbody>
            <tr>
                <td width="50mm"> Nama Orang Tua</td>
                <td width="2mm">:</td>
                <td width="137mm"><b>'.$output->nama_ayah.' & '.$output->nama_ibu.'</b></td>
            </tr>
            <tr>
                <td width="50mm"> Nama Calon Santri</td>
                <td width="2mm">:</td>
                <td width="137mm"><b>'.$output->nama.'</b></td>
            </tr>
            <tr>
                <td width="50mm"> Nomor Ujian</td>
                <td width="2mm">:</td>
                <td width="137mm"><b>'.$output->no_ujian.'</b></td>
            </tr>
            <tr>
                <td width="50mm"> Asal Sekolah</td>
                <td width="2mm">:</td>
                <td width="137mm"><b>'.$output->asal_sekolah.'</b></td>
            </tr>
            <tr>
                <td width="50mm"> Asal Kab/Kota</td>
                <td width="2mm">:</td>
                <td width="137mm"><b>'.what_kabupaten($output->kabupaten).'</b></td>
            </tr>
        </tbody>
    </table>
    <p>*) Silahkan Cetak Blangko ini, di isi, dan di kumpulkan pada saat mengikuti ujian.<br/>
    *) Beri Tanda Centang, jawaban, serta pendapat anda di kolom yang telah di sediakan.
    </p>
    <ol>
        <li>Apa Pekerjaan Bapak ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711; PNS</td>
                    <td>&#9711; Pegawai Swasta</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
        </li>
        <br/>
        <li>Apa Pekerjaan Ibu ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711; PNS</td>
                    <td>&#9711; Pegawai Swasta</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
        </li>
        <br/>
        <li>Berapa Pendapatan Bapak ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  &#x2190; 2 Juta</td>
                    <td>&#9711; 3 - 5 Juta</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
        </li>
        <br/>
        <li>Berapa Pendapatan Ibu ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  &#x2190; 2 Juta</td>
                    <td>&#9711; 3 - 5 Juta</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
        </li>
        <br/>
        <li>RIAB tahun ini memberlakukan biaya masuk sebesar <b>Rp.10.950.000,-</b>. Biaya tersebut sudah termasuk biaya spp, konsumsi untuk bulan pertama dan biaya tambahan lainnya yang sewaktu-waktu nantinya dibutuhkan. Bagaimana pendapat Bapak/Ibu terhadap biaya tersebut serta bagaimana komitmen Bapak/Ibu untuk melunasi biaya tersebut ? 
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  Setuju, Bayar Lunas</td>
                    <td>&#9711; Tidak Setuju Bayar Lunas</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
            <p style="border: 1px solid black;"> Pendapat Orang Tua :
            <br/>
            <br/>
            </p>                
        </li>
        <p></p>
        <li>RIAB memberlakukan penegakan aturan yang keras demi tegaknya kedisiplinan, di mana penegakan tersebut diawasi oleh kakak senior dan ustaz-ustazah. Bagaimana pendapat Bapak/Ibu mengenai hal tersebut ? 
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  Setuju</td>
                    <td>&#9711; Tidak Setuju</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
            <p style="border: 1px solid black;"> Pendapat Orang Tua :
            <br/>
            <br/>
            </p>
        </li>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <li>Bagaimana pendapat Bapak/Ibu apabila anak Bapak/Ibu melanggar aturan berat dan sampai harus dikembalikan kepada Bapak/Ibu ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  Setuju</td>
                    <td>&#9711; Tidak Setuju</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
            <p style="border: 1px solid black;"> Pendapat Orang Tua :
            <br/>
            <br/>
            </p>
        </li>
        <p></p>
        <li>Apa kendala Bapak/Ibu dalam mendidik anak di rumah? Lantas, bagaimana solusi yang Bapak/Ibu lakukan ?
            <p>Jawaban : ___________________________________________________________________________</p>
        </li>
        <br/>
        <li>Apakah Bapak/Ibu pernah mengajak anak untuk shalat berjamaah ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  Sekali-sekali</td>
                    <td>&#9711; Sering</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
        </li>
        <br/>
        <li>Apakah yang Bapak/Ibu lakukan apabila anak tidak mengerjakan shalat ?
            <p>Jawaban : ___________________________________________________________________________</p>
        </li>
        <br/>
        <li>Penyakit apa yang sering dialami oleh anak Bapak/Ibu ?
            <p>Jawaban : ___________________________________________________________________________</p>
        </li>
        <br/>
        <li>Berapa kali anak Bapak/Ibu di opname di rumah sakit ?
            <br/>
            <br/>
            <table width="100%">
                <tr>
                    <td>&#9711;  Sekali</td>
                    <td>&#9711; Tidak Pernah</td>
                    <td>&#9711; Lainnya...</td>
                </tr>
            </table>
        </li>
        <br/>
        <li>Apakah Bapak/Ibu juga mendaftarkan anak Bapak/Ibu di tempat lain selain di RIAB ?            
            <p>Jawaban : ___________________________________________________________________________</p>
        </li>
        <br/>
        <li>Bagaimana kalau anak Bapak/Ibu lulus di tempat lain ?            
            <p>Jawaban : ___________________________________________________________________________</p>
        </li>
    </ol>
';
$pdf->writeHTML($blanko_ortu, true, false, true, false, '');
$tandatangan = '
    <table>
        <tbody>
        <tr>
            <td width="290mm" align="center">Orang Tua / Wali
                <br />
                <br />
                <br />
                <br />
                (_____________________)
            </td>
        </tr>
        </tbody>
    </table>
';
$pdf->writeHTML($tandatangan, true, false, true, false, '');
$pdf->endPage();
 
$pdf->Output('PSB RIAB-'.$output->no_ujian.'.pdf', 'I');
exit;
?>