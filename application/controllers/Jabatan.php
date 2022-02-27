<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('M_jabatan');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['total_jabatan'] = $this->db->get('tbl_jabatan')->num_rows();
        $jabatan = $this->db->get('tbl_jabatan')->result();
        $data['jabatan'] = json_encode($jabatan);
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Jabatan/Index', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function save(){
        $data = $this->input->post();
        $cek_jabatan = $this->db->get_where('tbl_jabatan', ['jabatan_nama' => $data['Jabatan']])->num_rows();
        if ($cek_jabatan === 0) {
            $data = array(
                'jabatan_id'        => '',
                'jabatan_nama'      => $data['Jabatan']
            );

            $this->M_jabatan->save($data,'tbl_jabatan');

            $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                Data Jabatan<span class="font-weight-semibold"> Berhasil</span> Disimpan
                </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Jabatan<span class="font-weight-semibold"> Gagal</span> Disimpan, Data Jabatan Sudah Tersedia
            </div>');
        }

        redirect('Jabatan');
    }

    public function update($ID){
        $data = $this->input->post();
        $cek_jabatan = $this->db->get_where('tbl_jabatan', ['jabatan_nama' => $data['Jabatan']])->num_rows();
        if ($cek_jabatan === 0) {
            $data = array(
                'jabatan_nama'      => $data['Jabatan']
            );

            $this->M_jabatan->update($ID, $data);

            $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                Data Jabatan<span class="font-weight-semibold"> Berhasil</span> Diupdate
                </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Jabatan<span class="font-weight-semibold"> Gagal</span> Diupdate, Data Jabatan Sudah Tersedia
            </div>');
        }   

        redirect('Jabatan');
    }

    public function Delete($ID=null){
        if (!isset($ID)) show_404();
        if ($this->M_jabatan->delete($ID)) {
      
        $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data jabatan<span class="font-weight-semibold"> Berhasil</span> Dihapus
            </div>');
        redirect('Jabatan');
        }
    }
}