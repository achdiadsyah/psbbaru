<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {
    
    
    public function __construct()
    {
		parent::__construct();
        check_login();
        check_payment();

        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
    }

	public function index()
	{
        $get = $this->M_Peserta->get($this->session->userdata['id']);
        if ($get->s_biodata == 0){
            $data = [
                'title'     => 'Biodata Peserta',
                'content'   => 'biodata/index',
                'costum_js' => 'biodata/js'
            ];
        } else {
            $data = [
                'title'     => 'Biodata Peserta',
                'content'   => 'biodata/form',
                'costum_js'   => 'biodata/js-full'
            ];
        }

        echo $this->template->views($data);
	}

    public function ajax_add()
    {
        if ($this->input->is_ajax_request() == true) {
            $checksum = $this->input->post('checksum');
            
            $status_ayah = $this->input->post('status_ayah');
            $status_ibu = $this->input->post('status_ibu');
            
            if ($status_ayah == 'meninggal'){
                $nama_ayah = "Alm. ".strtoupper($this->input->post('nama_ayah'));
                $file_ktp_ayah = "no_image.jpg";
            } else {
                $nama_ayah = strtoupper($this->input->post('nama_ayah'));
                $file_ktp_ayah = "";
            }

            if ($status_ayah == 'meninggal'){
                $nama_ibu = "Almh. ".strtoupper($this->input->post('nama_ibu'));
                $file_ktp_ibu = "no_image.jpg";
            } else {
                $nama_ibu = strtoupper($this->input->post('nama_ibu'));
                $file_ktp_ibu = "";
            }

            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $configqr['cacheable']    = true; //boolean, the default is true
            $configqr['cachedir']     = './uploads/qr/'; //string, the default is application/cache/
            $configqr['errorlog']     = './uploads/qr/'; //string, the default is application/logs/
            $configqr['imagedir']     = './uploads/qr/'; //direktori penyimpanan qr code
            $configqr['quality']      = true; //boolean, the default is true
            $configqr['size']         = '1024'; //interger, the default is 1024
            $configqr['black']        = array(224,255,255); // array, default is array(255,255,255)
            $configqr['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($configqr);
        
            $qrname = $checksum.'.png'; //buat name dari qr code sesuai dengan nim
        
            $params['data'] = $checksum; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$configqr['imagedir'].$qrname;
            $this->ciqrcode->generate($params);

            $data = [
                'nik'                       => $this->input->post('nik'),
                'no_telepon'                => $this->input->post('no_telepon'),
                'minat'                     => $this->input->post('minat'),
                'email'                     => $this->input->post('email'),
                'nama'                      => strtoupper($this->input->post('nama')),
                'nisn'                      => $this->input->post('nisn'),
                'tempat_lahir'              => $this->input->post('tempat_lahir'),
                'tanggal_lahir'             => $this->input->post('tanggal_lahir'),
                'jenis_kelamin'             => $this->input->post('jenis_kelamin'),
                'anak_ke'                   => $this->input->post('anak_ke'),
                'dari_saudara'              => $this->input->post('dari_saudara'),
                'hobi'                      => $this->input->post('hobi'),
                'cita_cita'                 => $this->input->post('cita_cita'),
                'alamat'                    => strtoupper($this->input->post('alamat')),
                'desa'                      => $this->input->post('desa'),
                'kecamatan'                 => $this->input->post('kecamatan'),
                'kabupaten'                 => $this->input->post('kabupaten'),
                'provinsi'                  => $this->input->post('provinsi'),
                'kode_pos'                  => $this->input->post('kode_pos'),
                'asal_sekolah'              => strtoupper($this->input->post('asal_sekolah')),
                'npsn_sekolah_asal'         => $this->input->post('npsn_sekolah_asal'),
                'alamat_sekolah_asal'       => $this->input->post('alamat_sekolah_asal'),
                'jenis_sekolah_asal'        => $this->input->post('jenis_sekolah_asal'),
                'tahun_lulus'               => $this->input->post('tahun_lulus'),
                'nama_ayah'                 => $nama_ayah,
                'pekerjaan_ayah'            => strtoupper($this->input->post('pekerjaan_ayah')),
                'penghasilan_ayah'          => $this->input->post('penghasilan_ayah'),
                'pendidikan_ayah'           => $this->input->post('pendidikan_ayah'),
                'no_telepon_ayah'           => $this->input->post('no_telepon_ayah'),
                'status_ayah'               => $this->input->post('status_ayah'),
                'nama_ibu'                  => $nama_ibu,
                'pekerjaan_ibu'             => strtoupper($this->input->post('pekerjaan_ibu')),
                'penghasilan_ibu'           => $this->input->post('penghasilan_ibu'),
                'pendidikan_ibu'            => $this->input->post('pendidikan_ibu'),
                'no_telepon_ibu'            => $this->input->post('no_telepon_ibu'),
                'status_ibu'                => $this->input->post('status_ibu'),
                'nama_wali'                 => strtoupper($this->input->post('nama_wali')),
                'no_telepon_wali'           => $this->input->post('no_telepon_wali'),
                'status_wali'               => $this->input->post('status_wali'),
                'prestasi_1'                => $this->input->post('prestasi_1'),
                'prestasi_2'                => $this->input->post('prestasi_2'),
                'prestasi_3'                => $this->input->post('prestasi_3'),
                'prestasi_4'                => $this->input->post('prestasi_4'),
                'prestasi_5'                => $this->input->post('prestasi_5'),
                's_biodata'                 => '1',
            ];
            $this->M_Peserta->update_checksum($checksum, $data);
            $data2 = [
                'ktp_ayah' => $file_ktp_ayah,
                'ktp_ibu' => $file_ktp_ibu
            ];
            $this->M_Filepsb->update($data['nik'], $data2);
        } else {
            exit('Error');
        }
    }

    public function ajax_get()
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Peserta->get($this->session->userdata['id']);

            $data = [
                'checksum'                  => $get->checksum,
                'nik'                       => $get->nik,
                'minat'                     => $get->minat,
                'no_telepon'                => $get->no_telepon,
                'email'                     => $get->email,
                'nama'                      => $get->nama,
                'nisn'                      => $get->nisn,
                'tempat_lahir'              => $get->tempat_lahir,
                'tanggal_lahir'             => date_indo($get->tanggal_lahir),
                'jenis_kelamin'             => jenis_kelamin($get->jenis_kelamin),
                'anak_ke'                   => $get->anak_ke,
                'dari_saudara'              => $get->dari_saudara,
                'hobi'                      => $get->hobi,
                'cita_cita'                 => $get->cita_cita,
                'alamat'                    => $get->alamat,
                'desa'                      => what_desa($get->desa),
                'kecamatan'                 => what_kecamatan($get->kecamatan),
                'kabupaten'                 => what_kabupaten($get->kabupaten),
                'provinsi'                  => what_provinsi($get->provinsi),
                'kode_pos'                  => $get->kode_pos,
                'asal_sekolah'              => $get->asal_sekolah,
                'npsn_sekolah_asal'         => $get->npsn_sekolah_asal,
                'alamat_sekolah_asal'       => $get->alamat_sekolah_asal,
                'jenis_sekolah_asal'        => $get->jenis_sekolah_asal,
                'tahun_lulus'               => $get->tahun_lulus,
                'nama_ayah'                 => $get->nama_ayah,
                'pekerjaan_ayah'            => $get->pekerjaan_ayah,
                'penghasilan_ayah'          => $get->penghasilan_ayah,
                'pendidikan_ayah'           => $get->pendidikan_ayah,
                'no_telepon_ayah'           => $get->no_telepon_ayah,
                'status_ayah'               => $get->status_ayah,
                'nama_ibu'                  => $get->nama_ibu,
                'pekerjaan_ibu'             => $get->pekerjaan_ibu,
                'penghasilan_ibu'           => $get->penghasilan_ibu,
                'pendidikan_ibu'            => $get->pendidikan_ibu,
                'no_telepon_ibu'            => $get->no_telepon_ibu,
                'status_ibu'                => $get->status_ibu,
                'nama_wali'                 => $get->nama_wali,
                'no_telepon_wali'           => $get->no_telepon_wali,
                'status_wali'               => $get->status_wali,
                'prestasi_1'                => $get->prestasi_1,
                'prestasi_2'                => $get->prestasi_2,
                'prestasi_3'                => $get->prestasi_3,
                'prestasi_4'                => $get->prestasi_4,
                'prestasi_5'                => $get->prestasi_5,
            ];

            echo json_encode($data);
        } else {
            exit('Error');
        }
    }

    public function ajax_biodata()
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Peserta->get($this->session->userdata['id']);

            $data = [
                'checksum'                  => $get->checksum,
                'nik'                       => $get->nik,
                'nama'                      => $get->nama,
                'no_telepon'                => $get->no_telepon,
            ];
            echo json_encode($data);
        } else {
            exit('Error');
        }
    }
}
