<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Peserta');
        $this->load->model('M_Filepsb');
        $this->load->model('M_Chat');
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
        $nama               = strtoupper($this->input->post('nama'));
        $no_telepon         = $this->input->post('no_telepon');
        $password           = $this->input->post('password');
        $s_akademik         = $this->input->post('s_akademik');
        $jalur              = $this->input->post('jalur');
        
        $check              = $this->M_Peserta->get_by_nik($nik)->num_rows();

        if ($check >= 1){
            $this->session->set_flashdata([
                'msg'   => 'NIK Anda Sudah pernah di gunakan.',
                'type'  => 'warning'
            ]);
            redirect('auth/register');
        } else {


            if ($jalur == "reguler"){

                $data = [
                    'nik'               =>  $nik,
                    'checksum'          =>  my_checksum($nik),
                    'nama'              =>  strtoupper($nama),
                    'no_telepon'        =>  $no_telepon,
                    'password'          =>  password_hash($password, PASSWORD_DEFAULT),
                    'jalur_awal'        =>  $jalur,
                    'jalur'             =>  $jalur,
                    'ujian_via'         =>  'offline',
                    's_akademik'        =>  '0',
                    's_payment'         =>  '0',
                    's_biodata'         =>  '0',
                    's_file'            =>  '0',
                    's_lulus_adm'       =>  '1',
                    's_lulus'           =>  '0',
                    'tanggal_daftar'    =>  date("Y-m-d H:i:s")
                ];

                $data2 = [
                    'nik'               => $nik,
                ];

                $pesan_wa = "Assalamualaikum..".urldecode('%0A').
                "Sdr/i "."*".$nama."*".urldecode('%0A').
                "Jalur : *REGULER*".urldecode('%0A%0A').
                "Terima Kasih, sudah mendaftar di *Ruhul Islam Anak Bangsa*".urldecode('%0A').
                "Silahkan kembali *LOGIN* untuk melakukan pembayaran sebesesar :".urldecode('%0A%0A').
                "NOMINAL : *".rupiah(psb_detail('biaya_psb'))."*".urldecode('%0A').
                "BANK : *".psb_detail('nama_bank')."*".urldecode('%0A').
                "NO REK : *".psb_detail('no_rekening')."*".urldecode('%0A').
                "A/N : *".psb_detail('nama_rekening')."*".urldecode('%0A').
                "BERITA : *PSB-".$nik."*".urldecode('%0A%0A').
                "Lakukan Pembayaran sebelum 3x24 Jam".urldecode('%0A').
                "Segera *Upload Bukti Pembayaran* jika sudah melakukan transfer".urldecode('%0A%0A').
                "https://psb.ruhulislam.com/auth/login".urldecode('%0A').
                "Terima Kasih";

                $pesan_grup = "*INFO!! PENDAFTAR BARU*".urldecode('%0A%0A').
                "Nama : *".$nama."*".urldecode('%0A').
                "NIK : *".$nik."*".urldecode('%0A').
                "Jalur : *REGULER*".urldecode('%0A').
                "No WA : *".$no_telepon."*";

                $msg = "Berhasil Mendaftar (Jalur Reguler), Silahkan Login untuk melanjutkan";

            } else if($jalur == "undangan"){

                if ($kode_undangan == psb_detail('kode_jalur_undangan')){
                    $data = [
                        'nik'               =>  $nik,
                        'checksum'          =>  my_checksum($nik),
                        'nama'              =>  strtoupper($nama),
                        'no_telepon'        =>  $no_telepon,
                        'password'          =>  password_hash($password, PASSWORD_DEFAULT),
                        'jalur_awal'        =>  $jalur,
                        'jalur'             =>  $jalur,
                        'ujian_via'         =>  NULL,
                        's_akademik'        =>  $s_akademik,
                        's_payment'         =>  '1',
                        's_biodata'         =>  '0',
                        's_file'            =>  '0',
                        's_lulus_adm'       =>  '0',
                        's_lulus'           =>  '0',
                        'tanggal_daftar'    =>  date("Y-m-d H:i:s")
                    ];
    
                    $data2 = [
                        'nik'               => $nik,
                    ];
    
                    $pesan_wa = "Assalamualaikum..".urldecode('%0A').
                    "Sdr/i "."*".$nama."*".urldecode('%0A').
                    "Jalur : *UNDANGAN*".urldecode('%0A%0A').
                    "Terima Kasih, sudah mendaftar di *Ruhul Islam Anak Bangsa*".urldecode('%0A').
                    "Silahkan kembali *LOGIN* untuk mengisi kelengkapan biodata dan upload berkas.".urldecode('%0A%0A').
                    "https://psb.ruhulislam.com/auth/login".urldecode('%0A').
                    "Terima Kasih";
    
                    $pesan_grup = "*INFO!! PENDAFTAR BARU*".urldecode('%0A%0A').
                    "Nama : *".$nama."*".urldecode('%0A').
                    "NIK : *".$nik."*".urldecode('%0A').
                    "Jalur : *UNDANGAN*".urldecode('%0A').
                    "No WA : *".$no_telepon."*";
    
                    $msg = "Berhasil Mendaftar (Jalur Undangan), Silahkan Login untuk melanjutkan";
                } else {
                    $this->session->set_flashdata([
                        'msg'   => 'Gagal Melakukan Pendaftaran, Kode Undangan Salah',
                        'type'  => 'warning'
                    ]);
                    redirect('auth/register');
                }

            }

            $data3 = [
                'no_telepon'    => $no_telepon,
                'pesan'         => $pesan_wa,
                'type'          => 'Text',
                'status_proses' => 'pending'
            ];

            $data4 = [
                'no_telepon'    => $this->config->item('WAgroupAdmin'),
                'pesan'         => $pesan_grup,
                'type'          => 'TextGroup',
                'status_proses' => 'pending'
            ];
            
            $insert = $this->M_Peserta->insert($data);
            $insert2 = $this->M_Filepsb->insert($data2);
            $insert3 = $this->M_Chat->insert($data3);
            $insert4 = $this->M_Chat->insert($data4);

            if ($insert && $insert2 && $insert3 && $insert4){
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
        $get                = $this->M_Peserta->get_by_nik($nik)->row();

        if ($nik == $get->nik && $no_telepon == $get->no_telepon){

            $date = md5(date('Y-m-d'));

            $pesan_wa = "Link Reset Password PSB Ruhul Islam Anak Bangsa".urldecode('%0A%0A').
            "https://psb.ruhulislam.com/auth/resetpass/".$get->checksum."/".$date.urldecode('%0A%0A').
            "Berlaku 1 Hari";

            $data = [
                'no_telepon'    => $get->no_telepon,
                'pesan'         => $pesan_wa,
                'type'          => 'Text',
                'status_proses' => 'pending'
            ];
            $this->M_Chat->insert($data);

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

    public function resetpass($checksum = NULL, $date = NULL)
    {
        $get = $this->M_Peserta->get_by_checksum($checksum)->row();
        if ($get){
            $date_now = md5(date('Y-m-d'));

            if ($date == $date_now){
                if ($checksum == $get->checksum){
                    $data = [
                        'title'     => 'Reset Password',
                        'content'   => 'auth/resetpass',
                        'checksum'  => $checksum,
                        'costum_js' => 'auth/js-resetpass',
                    ];
                    echo $this->template->views($data);
                } else {
                    $this->session->set_flashdata([
                        'msg'   => 'Token Reset Password Sudah tidak berlaku',
                        'type'  => 'error'
                    ]);
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata([
                    'msg'   => 'Token Reset Password Sudah tidak berlaku',
                    'type'  => 'error'
                ]);
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata([
                'msg'   => 'Token Reset Password Sudah tidak berlaku',
                'type'  => 'error'
            ]);
            redirect('auth/login');
        }
    }

    public function do_resetpass()
    {
        $checksum   = $this->input->post('checksum');
        $password1  = $this->input->post('password1');

        $data = [
            'password'  =>  password_hash($password1, PASSWORD_DEFAULT),
        ];

        $update = $this->M_Peserta->update_checksum($checksum, $data);

        if($update){
            echo json_encode(array("status" => "success", "msg" => "Berhasil Update Password"));
        } else {
            echo json_encode(array("status" => "error", "msg" => "Gagal Update Password"));
        }
        
    }


    // Logout Function
	public function logout()
	{
		$this->session->sess_destroy();
        redirect('home');
	}
}
