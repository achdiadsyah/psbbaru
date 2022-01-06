
<?php

ob_start();
$pdf = new Pdf('P', 'in', 'A4', true, 'UTF-8', false);
$pdf->SetTitle($title.'-'.$output->checksum);
$pdf->SetTopMargin(2);
$pdf->setFooterMargin(2);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set font
$pdf->SetFont('helvetica', '', 10, '', true);

$pdf->SetAuthor('Ruhul Islam Anak Bangsa');

if ($output->jalur == "reguler"){
    $cat = "<b>".$output->ruang_cat."</b> - Pukul : ".$output->sesi_cat;
} elseif ($output->jalur == "undangan") {
    $cat = "<b>Tidak Ada Ujian Komputer</b>";
}

// Lembar Formulir
$pdf->AddPage();
// set JPEG quality
$pdf->setJPEGQuality(75);
$header = '<p><img src="'.$assetsurl.'images/header-formulir-lulus.jpg"></img></p>';
$pdf->writeHTML($header, true, false, false, false, '');
$formulir = ' 
    
    <h3 align="center" style="line-height: 1.1em;">DATA PRIBADI SISWA/SANTRI</h3>
    <h4 align="center">NOMOR INDUK : ______________</h4>
    
    <table cellpadding="1">
        <p><b>I. KETERANGAN TENTANG SISWA</b></p>
        <tr>
            <td width="50mm">1. Nama Lengkap</td>
            <td width="2mm">:</td>
            <td width="90mm"><b>'.$output->nama.'</b></td>
        </tr>
        <tr>
            <td width="50mm">2. Nama Panggilan</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_panggilan.'</td>
        </tr>
        <tr>
            <td>3. NISN</td>
            <td>:</td>
            <td>'.$output->nisn.'</td>
        </tr>
        <tr>
            <td>4. Jenis Kelamin</td>
            <td>:</td>
            <td>'.jenis_kelamin($output->jenis_kelamin).'</td>
        </tr>
        <tr>
            <td>5. Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>'.$output->tempat_lahir.', '.date_indo($output->tanggal_lahir).'</td>
        </tr>
        <tr>
            <td>6. NIK (KTP)</td>
            <td>:</td>
            <td>'.$output->nik.'</td>
        </tr>
        <tr>
            <td>7. No KK</td>
            <td>:</td>
            <td>'.$output->nomor_kk.'</td>
        </tr>
        <tr>
            <td>8. No AKTE</td>
            <td>:</td>
            <td>'.$output->nomor_akte.'</td>
        </tr>
        <tr>
            <td>9. Agama</td>
            <td>:</td>
            <td>'.$output->agama.'</td>
        </tr>        
        <tr>
            <td>10. Alamat Domisili </td>
            <td>:</td>
            <td width="160mm">'.$output->alamat.'</td>
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
            <td width="28mm">Warga Negasa</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->negara.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kode Pos</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->kode_pos.'</td>
        </tr>
        <p></p>
        <tr>
            <td>11. Anak Ke / Dari Saudara</td>
            <td>:</td>
            <td>'.'Anak Ke '.$output->anak_ke.' Dari '.$output->dari_saudara.' Bersaudara'.'</td>
        </tr>
        <tr>
            <td>12. Jumlah Saudara Kandung</td>
            <td>:</td>
            <td>'.$output->dari_saudara.'</td>
        </tr>
        <tr>
            <td>13. Jumlah Saudara Tiri</td>
            <td>:</td>
            <td>'.$output->saudara_tiri.'</td>
        </tr>
        <tr>
            <td>14. Jumlah Saudara Angkat</td>
            <td>:</td>
            <td>'.$output->saudara_angkat.'</td>
        </tr>
        <tr>
            <td>15. Yatim/Piatu/Yatim Piatu</td>
            <td>:</td>
            <td>'.is_yatim($output->status_ayah).' '.is_piatu($output->status_ibu).'</td>
        </tr>

        <br />
        <p><b>II. KETERANGAN KESEHATAN</b></p>
        <tr>
            <td>16. Golongan Darah</td>
            <td>:</td>
            <td>'.$output->golongan_darah.'</td>
        </tr>
        <tr>
            <td>17. Penyakit Pernah di derita</td>
            <td>:</td>
            <td>'.$output->penyakit_pernah.'</td>
        </tr>
        <tr>
            <td>18. Penyakit Sekarang di derita</td>
            <td>:</td>
            <td>'.$output->penyakit_sekarang.'</td>
        </tr>
        <tr>
            <td>19. Kelainan Jasmani</td>
            <td>:</td>
            <td>'.$output->kelainan_jasmani.'</td>
        </tr>
        <tr>
            <td>20. Tinggi Badan</td>
            <td>:</td>
            <td>'.$output->tinggi.' Cm</td>
        </tr>
        <tr>
            <td>21. Berat Badan</td>
            <td>:</td>
            <td>'.$output->berat_badan.' Kg</td>
        </tr>
    </table>
<br />
';
$pdf->writeHTML($formulir, true, false, false, false, '');
$pdf->endPage();
// Lembar Formulir
$pdf->AddPage();
$formulir2 = '
    <table cellpadding="1">
        <p><b>III. KETERANGAN PENDIDIKAN</b></p>
        <tr>
            <td width="50mm">22. Data Asal Sekolah</td>
            <td width="2mm">:</td>
            <td width="160mm"><b>'.$output->asal_sekolah.'</b></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">NPSN</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->npsn_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Alamat</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->alamat_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kategori</td>
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
        <tr>
            <td>23. Pindahan Dari</td>
            <td>:</td>
            <td width="160mm">-</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Alasan Pindah</td>
            <td width="2mm">:</td>
            <td width="90mm">-</td>
        </tr>

        <tr>
            <td>24. Di Terima di Madrasah/Sekolah ini</td>
            <td>:</td>
            <td width="160mm">-</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kelas</td>
            <td width="2mm">:</td>
            <td width="90mm">-</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Tanggal</td>
            <td width="2mm">:</td>
            <td width="90mm">-</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Program</td>
            <td width="2mm">:</td>
            <td width="90mm">-</td>
        </tr>
        <p></p>
        <p><b>IV. KETERANGAN TENTANG ORANG TUA</b></p>
        <tr>
            <td width="50mm">25. Nama Orang Tua</td>
            <td width="2mm">:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_ibu.'</td>
        </tr>
        <p></p>
        <tr>
            <td>26. Pekerjaan Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pekerjaan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pekerjaan_ibu.'</td>
        </tr>
        <p></p>
        <tr>
            <td>27. Penghasilan Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->penghasilan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->penghasilan_ibu.'</td>
        </tr>
        <p></p>
        <tr>
            <td>28. Pendidikan Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pendidikan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pendidikan_ibu.'</td>
        </tr>
        <p></p>
        <tr>
            <td>29. Alamat Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->alamat_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->alamat_ibu.'</td>
        </tr>
        <p></p>
        <tr>
            <td>30. No Telepon Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->no_telepon_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->no_telepon_ibu.'</td>
        </tr>
        <p></p>
        <tr>
            <td>31. Data Wali Santri</td>
            <td>:</td>
            <td width="28mm">Nama</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_wali.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Status Hubungan</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->status_wali.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Alamat</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->alamat_wali.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">No Telp</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->no_telepon_wali.'</td>
        </tr>
        <p></p>
        <p><b>V. KEGEMARAN DAN KETERAMPILAN SISWA</b></p>
        <tr>
            <td>32. Kesenian</td>
            <td>:</td>
            <td>'.$output->kesenian.'</td>
        </tr>        
        <tr>
            <td>33. Olahraga</td>
            <td>:</td>
            <td>'.$output->olah_raga.'</td>
        </tr>        
        <tr>
            <td>34. Organisasi</td>
            <td>:</td>
            <td>'.$output->organisasi.'</td>
        </tr>
    </table>

';

$pdf->writeHTML($formulir2, true, false, false, false, '');
$tandatangan = '
    
    <table>
        <tbody>
        <tr>
            <td>
                &nbsp;
            </td>
            <td width="90mm" align="center">
                Darul Imarah, '.date_indo(date('Y-m-d', strtotime($output->tanggal_daftar))).'<br / />
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

// Lembar Vaidasi
$pdf->AddPage();
// set JPEG quality
$pdf->setJPEGQuality(75);
$header = '<p><img src="'.$assetsurl.'images/header-formulir-lulus.jpg"></img></p>';
$pdf->writeHTML($header, true, false, false, false, '');


$validasi = '

    <style>
    table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    table tr:nth-child(even){background-color: #f2f2f2;}

    table tr:hover {background-color: #ddd;}

    table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
    }
    </style>
    <h3 align="center" style="line-height: 1.1em;">VALIDASI BERKAS SISWA</h3>
    <table class="table table-striped" cellpadding="1" width="100%">
        <thead>
            <tr>
                <td>Keterangan</td>                
                <td>File Name</td>                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1. Pas Photo</td>                
                <td>'.is_uploaded($output->pasphoto).'</td>                
            </tr>
        </tbody>
    </table>        
';

$pdf->writeHTML($validasi, true, false, false, false, '');
$pdf->endPage();
 
$pdf->Output('PSB-RIAB-'.$output->no_ujian.'.pdf', 'I');
exit;
?>