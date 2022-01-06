<?php 

function cdn_file($path = NULL)
{
    return "https://cdn.ruhulislam.com/".$path;
}

function check_login()
{
    $ci = &get_instance();
    if (!$ci->session->has_userdata('id')) {
        $ci->session->set_flashdata([
            'msg' => 'Anda Belum Login, Silahkan login kembali',
            'type' => 'info'
        ]);
        redirect('home');
    }
}

function check_logout()
{
    $ci = &get_instance();
    if ($ci->session->has_userdata('id')) {
        redirect('dashboard');
    }
}

function check_payment()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);

    if($x->s_payment == 1){
        return true;
    } else if($x->s_payment == 2){
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena pembayaran anda di tolak',
            'type' => 'info'
        ]);
        redirect ('pembayaran');
    } else if($x->s_payment == 3){
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena pembayaran sedang di verifikasi',
            'type' => 'info'
        ]);
        redirect ('pembayaran');
    } else if($x->s_payment == 0){
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena belum upload bukti pembayaran',
            'type' => 'info'
        ]);
        redirect ('pembayaran');
    }

}

function check_biodata()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);

    if($x->s_biodata == 1){
        return true;
    } else if($x->s_biodata == 0){
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena belum melengkapi biodata',
            'type' => 'info'
        ]);
        redirect ('biodata');
    }

}

function check_lulus()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);

    if($x->s_lulus == 1){
        return true;
    } else if($x->s_lulus == 0){
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena anda tidak lulus',
            'type' => 'info'
        ]);
        redirect ('dashboard');
    }

}

function check_akses_pengumuman($from)
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);

    if($x->jalur == $from){
        return true;
    } else {
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini',
            'type' => 'info'
        ]);
        redirect ('dashboard');
    }

}

function check_lulus_adm()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);
    
    if($x->s_lulus_adm == 1){
        return true;
    } else if($x->s_lulus_adm == 0){
        $ci->session->set_flashdata([
            'msg' => 'Menu ini dibuka bagi peserta yang lulus seleksi berkas dan administrasi. <br>Pengumuman tanggal : '.date_indo(psb_detail('pengumuman_adm_undangan')),
            'type' => 'info'
        ]);
        redirect ('pengumuman/adm');
    }

}

function check_akses_biodata_ulang()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);
    
    if($x->s_biodata_ulang == 0){
        return true;
    } else if($x->s_biodata_ulang == 1){
        $ci->session->set_flashdata([
            'msg' => 'Biodata anda sudah lengkap, lanjut cetak berkas validasi',
            'type' => 'info'
        ]);
        redirect ('daftarulang/cetak');
    }

}

function check_biodata_ulang()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);
    
    if($x->s_biodata_ulang == 1){
        return true;
    } else if($x->s_biodata_ulang == 0){
        $ci->session->set_flashdata([
            'msg' => 'Biodata anda belum lengkap, lengkapi biodata anda',
            'type' => 'info'
        ]);
        redirect ('daftarulang/biodata');
    }

}

function check_daftar_ulang()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);
    
    if($x->s_biodata_ulang == 1 && $x->s_berkas_ulang == 1){
        $data_up2 = [
            's_daftar_ulang'   => "1"
        ];                       
        $ci->M_Peserta->update($x->id, $data_up2);
        return true;
    } else {
        
    }

}

function check_cetak()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $ci->load->model('M_Peserta');
	$x = $ci->M_Peserta->get($id);

    if($x->s_cetak == 0){
        return true;
    } else if($x->s_cetak == 1){
        return false;
    }

}

function check_berkas()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $nik = $ci->session->userdata['nik'];

    $ci->load->model('M_Peserta');
    $ci->load->model('M_Filepsb');
	
    $x = $ci->M_Peserta->get($id);
	$y = $ci->M_Filepsb->get_by_nik($nik)->result();

    if($x->s_file == 1){
        return true;
    } elseif($x->s_file == 0){
        if ($x->jalur ==  "undangan" && $x->s_akademik == 1){
            foreach ($y as $key) {
                if (           
                    $key->pasphoto !== "" &&
                    $key->sk !== "" &&
                    $key->surat_pernyataan !== "" &&
                    $key->surat_kesanggupan !== "" &&
                    $key->formulir_kepsek !== "" &&
                    $key->raport_1 !== "" &&
                    $key->raport_2 !== "" &&
                    $key->raport_3 !== "" &&
                    $key->raport_4 !== ""){                        
                        $data_up2 = [
                            's_file'   => "1"
                        ];                        
                        $ci->M_Peserta->update($id, $data_up2);
                        
                    } else {
                        $ci->session->set_flashdata([
                            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena belum melengkapi upload berkas',
                            'type' => 'info'
                        ]);
                        redirect ('berkas');
                    }
            }
        } else if ($x->jalur ==  "undangan" && $x->s_akademik == 2){
            foreach ($y as $key) {
                if (           
                    $key->pasphoto !== "" &&
                    $key->surat_pernyataan !== "" &&
                    $key->surat_kesanggupan !== "" &&
                    $key->formulir_kepsek !== "" &&
                    $key->raport_1 !== "" &&
                    $key->raport_2 !== "" &&
                    $key->raport_3 !== "" &&
                    $key->raport_4 !== ""){                        
                        $data_up2 = [
                            's_file'   => "1"
                        ];                       
                        $ci->M_Peserta->update($id, $data_up2);
                        
                    } else {
                        $ci->session->set_flashdata([
                            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena belum melengkapi upload berkas',
                            'type' => 'info'
                        ]);
                        redirect ('berkas');
                    }
            }
        } else {
            foreach ($y as $key) {
                if (           
                    $key->pasphoto !== "" &&
                    $key->raport_1 !== "" &&
                    $key->raport_2 !== "" &&
                    $key->raport_3 !== "" &&
                    $key->raport_4 !== ""){
                        $data_up2 = [
                            's_file'   => "1"
                        ];                        
                        $ci->M_Peserta->update($id, $data_up2);
                        
                    } else {
                        $ci->session->set_flashdata([
                            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena belum melengkapi upload berkas',
                            'type' => 'info'
                        ]);
                        redirect ('berkas');
                    }
            }
        }
    }

}

function check_berkas_akhir()
{
    $ci = &get_instance();
    $id = $ci->session->userdata['id'];
    $nik = $ci->session->userdata['nik'];

    $ci->load->model('M_Peserta');
    $ci->load->model('M_Filepsb');
	
    $x = $ci->M_Peserta->get($id);
	$y = $ci->M_Filepsb->get_by_nik($nik)->result();

    foreach ($y as $key) {
        if (            
            $key->struk_daftarulang !== "" &&
            $key->kk !== "" &&
            $key->akte !== "" &&
            $key->pasphoto !== "" &&           
            $key->surat_pernyataan !== "" &&
            $key->surat_kesanggupan !== "" &&
            $key->formulir_kepsek !== "" &&
            $key->raport_1 !== "" &&
            $key->raport_2 !== "" &&
            $key->raport_3 !== "" &&
            $key->raport_4 !== "" &&
            $key->surat_sehat !== "" &&
            $key->bpjs !== "" &&
            $key->surat_tidakpindahjurusan !== "" &&
            $key->ktp_ayah !== "" &&
            $key->ktp_ibu !== ""
            ){
                $data = [
                    'status'   => "1"
                ];

                $data2 = [
                    's_berkas_ulang'   => "1"
                ];
                
                $ci->M_Filepsb->update($nik, $data);
                $ci->M_Peserta->update_nik($nik, $data2);
                
            } else {
                $ci->session->set_flashdata([
                    'msg' => 'Anda Tidak dapat melanjutkan proses ini karena ada kewajiban yang belum anda lengkapi',
                    'type' => 'info'
                ]);
                redirect ('daftarulang/berkas');
            }
    }
}




function check_open($date)
{
    $date_now = date("Y-m-d");

    if ($date_now >= $date) {
        return "Open";
    } else {
        return "Close";
    }
}


function check_buka_menu($date)
{
    $ci = &get_instance();
    $date_now = date("Y-m-d");

    if ($date_now >= $date) {
        return TRUE;
    } else {
        $ci->session->set_flashdata([
            'msg' => 'Menu ini tidak dapat di akses, karena belum masuk jadwal aksesnya.',
            'type' => 'warning'
        ]);
        redirect ('dashboard');
    }
}

function check_close($dateA, $dateZ)
{
    $date_now = date("Y-m-d");

    if ($date_now >= $dateA && $date_now <= $dateZ) {
        return "Open";
    } else {
        return "Close";
    }
}

function my_checksum($value)
{
    $ci = &get_instance();
    $chk = $ci->config->item('secure_checksum');

    $x =  md5($value.$chk);

    return $x;

}

function jurusan($jurusan)
{
    switch ($jurusan)
    {
        case "A":
        return "Ilmu Pengatahuan Alam (IPA)";
        break;
        case "G":
        return "Ilmu Keagamaan (MAK)";
        break;
        case "A-UDG":
        return "Ilmu Pengatahuan Alam (IPA)";
        break;
        case "G-UDG":
        return "Ilmu Keagamaan (MAK)";
        break;
    }
}

function jenis_kelamin($jk)
{
    switch ($jk)
    {
        case "L":
        return "Laki - Laki";
        break;
        case "P":
        return "Perempuan";
        break;
    }
}

function psb_detail($name)
{
    $ci = &get_instance();
    $ci->load->model('M_Psbdetail');
	$payload = $ci->M_Psbdetail->get_detail();
    return $payload->$name;
}


function arr_jadwal_reguler()
{
    $array = array();
    
    $x1 = strtotime(psb_detail('buka_tes_reguler'));
    $x2 = strtotime(psb_detail('tutup_tes_reguler'));

    // Use for loop to store dates into array
    // 86400 sec = 24 hrs = 60*60*24 = 1 day
    for ($currentDate = $x1; $currentDate <= $x2;
        $currentDate += (86400)) {
        $Store = date('Y-m-d', $currentDate);
        $jadwal[] = $Store;
    }

    return $jadwal;
}

function sekolah_detail($name)
{
    $ci = &get_instance();
    $ci->load->model('M_Sekolahdetail');
	$payload = $ci->M_Sekolahdetail->get_detail();
    return $payload->$name;
}

function get_noujian($jurusan)
{
    $ci = &get_instance();
    $ci->load->model('M_Peserta');
	$urutan = $ci->M_Peserta->get_by_jurusan($jurusan)->num_rows();
    $urutan = $urutan + 1;

    $kode = sprintf("%03s", $urutan);
    $no_ujian = $jurusan."-".$kode;

    return $no_ujian;
}

function get_cat($tanggal)
{
    $ci = &get_instance();
    $ci->load->model('M_Peserta');
	$jumlahCat = $ci->M_Peserta->get_by_jadwal($tanggal)->num_rows();
    
    if($jumlahCat <= "40" ){
        $result = [
            'ruang_cat'  => 'Ruang LAB 1',
            'sesi_cat'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahCat > "40" && $jumlahCat <= "80"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 2',
            'sesi_cat'  => '08:00 - 09:30',
        ];
        return $result;

        // Masuk Sesi 2
    } else if ($jumlahCat > "80" && $jumlahCat <= "120"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 1',
            'sesi_cat'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahCat > "120" && $jumlahCat <= "160"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 2',
            'sesi_cat'  => '09:30 - 11:00',
        ];
        return $result;

        // Masuk Sesi 3
    } else if ($jumlahCat > "160" && $jumlahCat <= "200"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 1',
            'sesi_cat'  => '11:00 - 12:30',
        ];
        return $result;
    } else if ($jumlahCat > "200" && $jumlahCat <= "240"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 2',
            'sesi_cat'  => '11:00 - 12:30',
        ];
        return $result;
    } else {
        return FALSE;
    }
}

function get_lisan($tanggal)
{
    $ci = &get_instance();
    $ci->load->model('M_Peserta');
	$jumlahLisan = $ci->M_Peserta->get_by_jadwal($tanggal)->num_rows();
    

    // SESI 1
    if($jumlahLisan <= "8"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 1',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "8" && $jumlahLisan <= "16"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 2',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "16" && $jumlahLisan <= "24"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 3',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "24" && $jumlahLisan <= "32"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 4',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "32" && $jumlahLisan <= "40"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 5',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "40" && $jumlahLisan <= "48"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 6',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "48" && $jumlahLisan <= "56"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 7',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "56" && $jumlahLisan <= "64"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 8',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "64" && $jumlahLisan <= "72"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 9',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
    } else if ($jumlahLisan > "72" && $jumlahLisan <= "80"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 10',
            'sesi_lisan'  => '09:30 - 11:00',
        ];
        return $result;
        
    // Sesi 2
    } else if($jumlahLisan > "80" && $jumlahLisan <= "88"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 1',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "88" && $jumlahLisan <= "96"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 2',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "96" && $jumlahLisan <= "104"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 3',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "104" && $jumlahLisan <= "112"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 4',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "112" && $jumlahLisan <= "120"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 5',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "120" && $jumlahLisan <= "128"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 6',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "128" && $jumlahLisan <= "136"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 7',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "136" && $jumlahLisan <= "144"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 8',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "144" && $jumlahLisan <= "152"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 9',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    } else if ($jumlahLisan > "152" && $jumlahLisan <= "160"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 10',
            'sesi_lisan'  => '08:00 - 09:30',
        ];
        return $result;
    
    // SESI 3
    } else if($jumlahLisan > "160" && $jumlahLisan <= "168"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 1',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "168" && $jumlahLisan <= "176"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 2',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "176" && $jumlahLisan <= "184"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 3',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "184" && $jumlahLisan <= "192"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 4',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "192" && $jumlahLisan <= "200"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 5',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "200" && $jumlahLisan <= "208"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 6',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "208" && $jumlahLisan <= "216"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 7',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "216" && $jumlahLisan <= "224"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 8',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "224" && $jumlahLisan <= "232"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 9',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else if ($jumlahLisan > "232" && $jumlahLisan <= "240"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 10',
            'sesi_lisan'  => '13:30 - 15:00',
        ];
        return $result;
    } else  {
        return FALSE;
    }
}

function what_akademik($kode)
{
    switch ($kode)
        {
        case 0:
        return "REGULER";
        break;
        case 1:
        return "AKADEMIK";
        break;
        case 2:
        return "NON-AKADEMIK";
        break;
        }
}

function is_yatim($status)
{
    switch ($status)
    {
        case "masih":
        return "-";
        break;
        case "meninggal":
        return "Yatim";
        break;
    }
}

function is_piatu($status)
{
    switch ($status)
    {
        case "masih":
        return "-";
        break;
        case "meninggal":
        return "Piatu";
        break;
    }
}

function is_uploaded($data)
{
    if($data !== ""){
        return '<span style="color: rgb(0, 128, 64);"><b>Uploaded</b></span>';
    } else {
        return '<span style="color: rgb(255, 0, 0);"><b>File Not Found</b></span>';
    }
}
?>