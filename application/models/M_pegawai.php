<?php 
class M_pegawai extends CI_Model{
    public function select($number, $offset){
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_jabatan','tbl_jabatan.jabatan_id=tbl_pegawai.jabatan_id');
        $this->db->limit($number, $offset);
        $data = $this->db->get();
        return $data->result();
    }
	public function save($data){
        $this->db->insert('tbl_pegawai',$data);
    }

    public function update($ID, $Array){
        return $this->db->where('pegawai_id', $ID)->update('tbl_pegawai', $Array);
    }

    public function delete($ID){
        return $this->db->delete('tbl_pegawai', array("pegawai_id" => $ID));
    }
}
 ?>