<?php 

class M_data extends CI_Model{
	function tampil_data(){

		return $this->db->get('user'); //mengambil data dari tabel user pada database
    }
    
    function input_data($data,$table){ 
		$this->db->insert($table,$data); //memasukan data pada tabel database
    }
    
    function hapus_data($where,$table){ //menghapus data berdasarkan yang dipilih pada tabel di database
        $this->db->where($where); //memeilih data berdasarkan data field yang dipilih
        $this->db->delete($table); //menghapus tabel 
    }

    function edit_data($where,$table){ //mengedit data berdasarkan data pada tabel di database
        return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table){ //mengupdate data pada table di database
		$this->db->where($where);
		$this->db->update($table,$data);
    }	
    
}