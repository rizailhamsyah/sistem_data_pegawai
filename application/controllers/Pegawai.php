<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pegawai extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->library('upload');
        // $this->load->library('Excel');
        $this->load->model('M_pegawai');
        $this->load->model('M_jabatan');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index($num = '')
    {
        $data['title'] = "Data Pegawai";
        $data['total_pegawai'] = $this->db->get('tbl_pegawai')->num_rows();
        $total = $this->db->get('tbl_pegawai')->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Pegawai/index/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $total;
        $config['per_page'] = 6;
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination pagination-flat align-self-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item page-link">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item page-link">';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item page-link">';
        $config['first_tag_close'] = '</li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config); 
        $pegawai = $this->M_pegawai->select($config['per_page'], $from);
        $data['pegawai'] = json_encode($pegawai);
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Pegawai/Index', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->db->get('tbl_jabatan')->result();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Pegawai/Add', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function change($ID)
    {
        $data['title'] = "Update Data Pegawai";
        $data['jabatan'] = $this->db->get('tbl_jabatan')->result();
        $data['pegawai'] = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $ID])->row();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Pegawai/Update', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function save(){
        $data = $this->input->post();
        $cek_pegawai = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $data['NIP']])->num_rows();
        if ($cek_pegawai === 0) {
        $config['upload_path']      = './global_assets/images/Profile'; //path folder
        $config['allowed_types']    = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya
        $this->upload->initialize($config);
            
        if($this->upload->do_upload("Photo")){
            $file = $this->upload->data();
            $data['Photo'] =  $file['file_name'];
        }else{
            $data['Photo'] = 'avatar.png';
        }
        $data = array(
            'pegawai_id'            => '',
            'pegawai_nip'           => $data['NIP'],
            'pegawai_photo'         => $data['Photo'],
            'pegawai_nama'          => $data['Nama'],
            'pegawai_jk'            => $data['JK'],
            'pegawai_tpt_lahir'     => $data['Tempat_Lahir'],
            'pegawai_tgl_lahir'     => $data['Tanggal_Lahir'],
            'jabatan_id'            => $data['Jabatan'],
            'pegawai_agama'         => $data['Agama'],
            'pegawai_no_hp'         => $data['No_HP'],
            'pegawai_email'         => $data['Email'],
            'pegawai_tgl_masuk'     => $data['Tanggal_Masuk']
        );

        $this->M_pegawai->save($data,'tbl_pegawai');

        // Flashdata notifikasi
        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Pegawai<span class="font-weight-semibold"> Berhasil</span> Disimpan
            </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Pegawai<span class="font-weight-semibold"> Gagal</span> Disimpan, Data Pegawai Dengan NIP Tersebut Sudah Tersedia
            </div>');
        }

        redirect('Pegawai');
    }

    public function update($ID){
        $data = $this->input->post();
        $gambar = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $ID])->row();
        $config['upload_path']      = './global_assets/images/Profile';
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['encrypt_name']     = TRUE;
        $this->upload->initialize($config);
            
        if($this->upload->do_upload("Photo")){
            $file = $this->upload->data();
            $data['Photo'] =  $file['file_name'];
            if ($gambar->pegawai_photo != 'avatar.png') {
                unlink(base_url().'/global_assets/images/Profile/'.$gambar->pegawai_photo);
            }
        }else{
            $data['Photo'] = $gambar->pegawai_photo;
        }
        $data = array(
            'pegawai_photo'         => $data['Photo'],
            'pegawai_nama'          => $data['Nama'],
            'pegawai_jk'            => $data['JK'],
            'pegawai_tpt_lahir'     => $data['Tempat_Lahir'],
            'pegawai_tgl_lahir'     => $data['Tanggal_Lahir'],
            'jabatan_id'            => $data['Jabatan'],
            'pegawai_agama'         => $data['Agama'],
            'pegawai_no_hp'         => $data['No_HP'],
            'pegawai_email'         => $data['Email'],
            'pegawai_tgl_masuk'     => $data['Tanggal_Masuk']
        );

        $this->M_pegawai->update($ID, $data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Pegawai<span class="font-weight-semibold"> Berhasil</span> Diupdate
            </div>');

        redirect('Pegawai');
    }

    public function Delete($ID=null){
        if (!isset($ID)) show_404();
        if ($this->M_pegawai->delete($ID)) {
      
        $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Pegawai<span class="font-weight-semibold"> Berhasil</span> Dihapus
            </div>');
        redirect('Pegawai');
        }
    }

    public function import(){  
        $config['upload_path'] = './global_assets/import/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = 20048;
 
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('csv') ){
            echo $this->upload->display_errors();exit();
        }
        $fileName = $this->upload->data();   
        $inputFileName = './global_assets/import/'.$fileName['file_name'];
 
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        $spreadsheet = $reader->load($inputFileName);
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $numrow = 1;
        $baris = 1;
        foreach($sheet as $row){
        $nip = $row['A']; 
        $nama = $row['B']; 
        $jk = $row['C'];
        $tempat_lahir = $row['D'];
        $tanggal_lahir = $row['E'];
        $jabatan = $row['F'];
        $agama = $row['G'];
        $no_hp = $row['H'];
        $email = $row['I'];
        $tanggal_masuk = $row['J'];
        if($nip == "" && $nama == "" && $jk == "" && $tempat_lahir == "" && $tanggal_lahir == "" && $jabatan == "" && $agama == "" && $no_hp == "" && $email == "" && $tanggal_masuk == "")
          continue; 
        if($numrow > 1){
          $cek_pegawai = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $nip]);
          if ($cek_pegawai->num_rows() == 0) {
          $cek_jabatan = $this->db->get_where('tbl_jabatan', ['jabatan_nama' => $jabatan]);
          if ($cek_jabatan->num_rows() == 0) {
             $array = array(
                'jabatan_id'        => '',
                'jabatan_nama'      => $jabatan
            );
            $this->M_jabatan->save($array,'tbl_jabatan');
            $jabatan_id = $this->db->insert_id(); 
          } else{
            $data_jabatan = $cek_jabatan->row();
            $jabatan_id = $data_jabatan->jabatan_id;
          }
          
          $tanggallahir = date('Y-m-d', strtotime($tanggal_lahir));
          $tanggalmasuk = date('Y-m-d', strtotime($tanggal_masuk));
          
          $arr = array(
            'pegawai_id'            => '',
            'pegawai_nip'           => $nip,
            'pegawai_photo'         => 'avatar.png',
            'pegawai_nama'          => $nama,
            'pegawai_jk'            => $jk,
            'pegawai_tpt_lahir'     => $tempat_lahir,
            'pegawai_tgl_lahir'     => $tanggallahir,
            'jabatan_id'            => $jabatan_id,
            'pegawai_agama'         => $agama,
            'pegawai_no_hp'         => $no_hp,
            'pegawai_email'         => $email,
            'pegawai_tgl_masuk'     => $tanggalmasuk
            );
            // var_dump($arr); die();
          $this->M_pegawai->save($arr,'tbl_pegawai');
          $baris++;
          }
        }
        $numrow++; 
      }
        unlink($inputFileName);
        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Pegawai Sebanyak '.$baris.'<span class="font-weight-semibold"> Berhasil</span> Diimport
            </div>');

        redirect('Pegawai');
    }
}