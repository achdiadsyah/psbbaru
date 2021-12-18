<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
    }

    public function index()
    {
        $this->login();
    }

    // Login Function
	public function login()
	{
		$data = [
            'title'     => 'Login',
            'content'   => 'auth/login'
        ];
        echo $this->template->views($data);
	}

    public function do_login()
    {
        $payload = [
            'nik'       => $this->input->post('nik'),
            'password'  => $this->input->post('password')
        ];
        
        $user = $this->M_Peserta->get_by_nik($payload['nik'])->row();
        // Jika User Ada
        if($user) {
            // Cek Password
            if(password_verify($payload['password'], $user->password)){
                $data = [
                    'id' => $user->id,
                    'nik' => $user->nik,
                ];
                $this->session->sess_expiration = '14400';
                $this->session->set_userdata($data);
                redirect('dashboard');                  
            } else {
                $this->session->set_flashdata([
                    'msg'   => 'Username / Password Salah',
                    'type'  => 'warning'
                ]);
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata([
                'msg'   => 'Username / Password Salah',
                'type'  => 'warning'
            ]);
            redirect('auth/login');
        }
    }

    // REGISTER FUNCTION
	public function register()
	{
		$data = [
            'title'     => 'Daftar',
            'content'   => 'auth/register',
            'costum_js' => 'auth/js-register'
        ];
        echo $this->template->views($data);
	}

    public function do_register()
    {
        $kode_undangan      = $this->input->post('kode_undangan');
        $nik                = $this->input->post('nik');
        $nama               = $this->input->post('nama');
        $no_telepon         = $this->input->post('no_telepon');
        $password           = $this->input->post('password');
        $s_akademik         = $this->input->post('s_akademik');
        
        $check              = $this->M_Peserta->get_by_nik($nik)->num_rows();

        if ($check >= 1){
            $this->session->set_flashdata([
                'msg'   => 'NIK Anda Sudah pernah di gunakan.',
                'type'  => 'warning'
            ]);
            redirect('auth/register');
        } else {

            if ($kode_undangan == psb_detail('kode_jalur_undangan')){
                $data = [
                    'nik'               =>  $nik,
                    'checksum'          =>  my_checksum($nik),
                    'nama'              =>  strtoupper($nama),
                    'no_telepon'        =>  $no_telepon,
                    'password'          =>  password_hash($password, PASSWORD_DEFAULT),
                    'jalur'             =>  'undangan',
                    'ujian_via'         =>  NULL,
                    'jadwal_ujian'      =>  psb_detail("tes_undangan"),
                    'ruang_lisan'       =>  'RUANG-UNDANGAN',
                    'sesi_lisan'        =>  '08:00 - 12:00',
                    's_akademik'        =>  $s_akademik,
                    's_payment'         =>  '1',
                    's_biodata'         =>  '0',
                    's_file'            =>  '0',
                    's_lulus_adm'       =>  '0',
                    's_lulus'           =>  '0',
                    'tanggal_daftar'    =>  date("Y-m-d H:i:s")
                ];

                $data2 = [
                    'nik'           => $nik,
                    'struk'         => "undangan.jpg",
                    'status'        => '0'
                ];

                $msg = "Berhasil Mendaftar (Jalur Undangan), Silahkan Login untuk melanjutkan";
            } else if ($kode_undangan !== psb_detail('kode_jalur_undangan')){
                $data = [
                    'nik'               =>  $nik,
                    'checksum'          =>  my_checksum($nik),
                    'nama'              =>  strtoupper($nama),
                    'no_telepon'        =>  $no_telepon,
                    'password'          =>  password_hash($password, PASSWORD_DEFAULT),
                    'jalur'             =>  'reguler',
                    'ujian_via'         =>  NULL,
                    's_akademik'        =>  '0',
                    's_payment'         =>  '0',
                    's_biodata'         =>  '0',
                    's_file'            =>  '0',
                    's_lulus_adm'       =>  '1',
                    's_lulus'           =>  '0',
                    'tanggal_daftar'    =>  date("Y-m-d H:i:s")
                ];

                $data2 = [
                    'nik'           => $nik,
                    'struk'         => "-",
                    'status'        => '0'
                ];

                $msg = "Berhasil Mendaftar (Jalur Reguler), Silahkan Login untuk melanjutkan";
    
            } 
            
            $insert = $this->M_Peserta->insert($data);
            $insert2 = $this->M_Filepsb->insert($data2);
            if ($insert && $insert2){
                $this->session->set_flashdata([
                    'msg'   => $msg,
                    'type'  => 'success'
                ]);
                redirect('auth/login');
            } else {
                $this->session->set_flashdata([
                    'msg'   => 'Gagal Melakukan Pendaftaran',
                    'type'  => 'error'
                ]);
                redirect('auth/register');
            }
        }
        
    }


    // Forget Password Function
	public function forgetpass()
	{
		$data = [
            'title'     => 'Lupa Password',
            'content'   => 'auth/forgetpass'
        ];
        echo $this->template->views($data);
	}

    public function do_forgetpass()
    {
        $nik                = $this->input->post('nik');
        $no_telepon         = $this->input->post('no_telepon');
        
        $check              = $this->M_Peserta->get_by_nik($nik)->num_rows();

        if ($check >= 1){
            $this->session->set_flashdata([
                'msg'   => 'Link untuk reset password akan di kirimkan ke whatsapp anda.',
                'type'  => 'success'
            ]);
            redirect('auth/forgetpass');
        } else {
            $this->session->set_flashdata([
                'msg'   => 'Data Yang anda masukkan salah, Periksa kembali',
                'type'  => 'error'
            ]);
            redirect('auth/forgetpass');
        }
    }


    // Logout Function
	public function logout()
	{
		$this->session->sess_destroy();
        redirect('home');
	}
}
