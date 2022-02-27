<?php 
class M_jabatan extends CI_Model{
	public function save($data){
        $this->db->insert('tbl_jabatan',$data);
    }

    public function update($ID, $Array){
        return $this->db->where('jabatan_id', $ID)->update('tbl_jabatan', $Array);
    }

    public function delete($ID){
        return $this->db->delete('tbl_jabatan', array("jabatan_id" => $ID));
    }
}
 ?>