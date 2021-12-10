<?php 

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
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena pembayaran anda belum di setujui',
            'type' => 'info'
        ]);
        redirect ('pembayaran');
    } else if($x->s_payment == 0){
        $ci->session->set_flashdata([
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena pembayaran anda belum di setujui',
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
            'msg' => 'Anda Tidak dapat melanjutkan proses ini, karena anda tidak lulus seleksi berkas',
            'type' => 'info'
        ]);
        redirect ('dashboard');
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
        if ($x->jalur ==  "undangan"){
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
                        $data_up = [
                            'status'   => "1"
                        ];
                        $data_up2 = [
                            's_file'   => "1"
                        ];
                        $ci->M_Filepsb->update($nik, $data_up);
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
                        $data_up = [
                            'status'   => "1"
                        ];
                        $data_up2 = [
                            's_file'   => "1"
                        ];
                        $ci->M_Filepsb->update($nik, $data_up);
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

function check_open($date)
{
    $date_now = date("Y-m-d");

    if ($date_now >= $date) {
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
    
    if($jumlahCat <= "25" ){
        $result = [
            'ruang_cat'  => 'Ruang LAB 1',
            'sesi_cat'  => '08:00 - 10:00',
        ];
        return $result;
    } else if ($jumlahCat >= "25" && $jumlahCat <= "50"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 2',
            'sesi_cat'  => '08:00 - 10:00',
        ];
        return $result;

        // Masuk Sesi 2
    } else if ($jumlahCat >= "50" && $jumlahCat <= "75"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 1',
            'sesi_cat'  => '14:00 - 16:00',
        ];
        return $result;
    } else if ($jumlahCat >= "75" && $jumlahCat <= "100"){
        $result = [
            'ruang_cat'  => 'Ruang LAB 2',
            'sesi_cat'  => '14:00 - 16:00',
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
    
    if($jumlahLisan <= "10"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 1',
            'sesi_lisan'  => '10:00 - 12:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "10" && $jumlahLisan <= "20"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 2',
            'sesi_lisan'  => '10:00 - 12:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "20" && $jumlahLisan <= "30"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 3',
            'sesi_lisan'  => '10:00 - 12:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "30" && $jumlahLisan <= "40"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 4',
            'sesi_lisan'  => '10:00 - 12:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "40" && $jumlahLisan <= "50"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 5',
            'sesi_lisan'  => '10:00 - 12:00',
        ];
        return $result;

        // Masuk Sesi 2
    } else if ($jumlahLisan >= "50" && $jumlahLisan <= "60"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 1',
            'sesi_lisan'  => '16:00 - 18:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "60" && $jumlahLisan <= "70"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 2',
            'sesi_lisan'  => '16:00 - 18:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "70" && $jumlahLisan <= "80"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 3',
            'sesi_lisan'  => '16:00 - 18:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "80" && $jumlahLisan <= "90"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 4',
            'sesi_lisan'  => '16:00 - 18:00',
        ];
        return $result;
    } else if ($jumlahLisan >= "90" && $jumlahLisan <= "100"){
        $result = [
            'ruang_lisan'  => 'Ruang Lisan 5',
            'sesi_lisan'  => '16:00 - 18:00',
        ];
        return $result;
    } else {
        return FALSE;
    }
}




?>