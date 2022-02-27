<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('M_kontrak');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['title'] = "Data Kontrak";
        $data['total_kontrak'] = $this->db->get('tbl_kontrak')->num_rows();
        $kontrak = $this->M_kontrak->select();
        $data['kontrak'] = json_encode($kontrak);
        $data['pegawai'] = $this->db->get('tbl_pegawai')->result();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Kontrak/Index', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function save(){
        $data = $this->input->post();
        $pegawai = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $data['Pegawai']])->row();
        $MasaKerja = $data['Masa_Kerja'];
        $data = array(
            'kontrak_id'            => '',
            'pegawai_id'            => $data['Pegawai'],
            'kontrak_masa_kerja'    => $MasaKerja,
            'kontrak_tgl'           => $data['Tanggal_Kontrak']
        );

        $this->M_kontrak->save($data,'tbl_kontrak');

        $this->load->library('PHPMailer_load'); 
        $mail = $this->phpmailer_load->load();   
        $mail->isSMTP();  
        $mail->SMTPSecure = 'tls';
        $mail->Host = $this->config->item('Host'); 
        $mail->SMTPAuth = true; 
        $mail->Username = $this->config->item('Email');
        $mail->Password = $this->config->item('Password');
        $mail->Port = $this->config->item('Port');
        $mail->SMTPAutoTLS = false;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->setFrom('notif@abc.com', 'Selamat Anda Telah Dikontrak | PT. ABC Indonesia'); // Sumber email
        $mail->AddAddress($pegawai->pegawai_email ,'Pegawai');
        $mail->Subject = "Kontrak Pegawai PT. ABC Indonesia";
        $datas['Pegawai'] = $pegawai->pegawai_nama; 
        $datas['Kontrak'] = $MasaKerja;
        $mail->msgHtml($this->load->view('Email/Index', $datas, TRUE)); // Isi email dengan format HTML

        if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    
                } // Kirim email dengan cek kondisi

        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Kontrak<span class="font-weight-semibold"> Berhasil</span> Disimpan
            </div>');

        redirect('Kontrak');
    }

    public function update($ID){
        $data = $this->input->post();
        $data = array(
            'kontrak_masa_kerja'    => $data['Masa_Kerja']
        );

        $this->M_kontrak->update($ID, $data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Kontrak<span class="font-weight-semibold"> Berhasil</span> Diupdate
            </div>');

        redirect('Kontrak');
    }

    public function Delete($ID=null){
        if (!isset($ID)) show_404();
        if ($this->M_kontrak->delete($ID)) {
      
        $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Kontrak<span class="font-weight-semibold"> Berhasil</span> Dihapus
            </div>');
        redirect('Kontrak');
        }
    }
}