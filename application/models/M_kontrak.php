<?php 
class M_kontrak extends CI_Model{
    public function select(){
        $this->db->select('*');
        $this->db->from('tbl_kontrak');
        $this->db->join('tbl_pegawai','tbl_pegawai.pegawai_id=tbl_kontrak.pegawai_id');
        $data = $this->db->get();
        return $data->result();
    }
	public function save($data){
        $this->db->insert('tbl_kontrak',$data);
    }

    public function update($ID, $Array){
        return $this->db->where('kontrak_id', $ID)->update('tbl_kontrak', $Array);
    }

    public function delete($ID){
        return $this->db->delete('tbl_kontrak', array("kontrak_id" => $ID));
    }
}
 ?>