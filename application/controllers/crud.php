// fungsi create, read, update, delete
<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data'); //menampilkan model data
                $this->load->helper('url'); //memunculkan url 
	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result(); //mengambil data dari database field user
		$this->load->view('v_tampil',$data); //menampilkan tampilan data
    }
    
    function tambah(){
		$this->load->view('v_input'); //menampilkan tampilan data
    }
    
    function tambah_aksi(){
		$nama = $this->input->post('nama'); //memasukan data variable nama ke database field nama
		$alamat = $this->input->post('alamat'); //memasukan data variable alamat ke database field alamat
		$pekerjaan = $this->input->post('pekerjaan'); //memasukan data variable pekerjaan ke database field pekerjaan
 
		$data = array( //mengubah data yang dimasukan di field menjadi variable yang akan dimasukan di database
			'nama' => $nama,
			'alamat' => $alamat, 
			'pekerjaan' => $pekerjaan 
			);
		$this->m_data->input_data($data,'user'); //menginput data pada array ke database
		redirect('crud/index'); //mereload tampilan
    }

    function hapus($id){  //menghapus data berdasarkan id
		$where = array('id' => $id); //menentukan lokasi berdasarkan id
		$this->m_data->hapus_data($where,'user'); //menghapus data di database 
		redirect('crud/index'); //mereload tampilan
    }

    function edit($id){ //mengeit data berdasarkan id
        $where = array('id' => $id); //menentukan data yang akan diedit berdasarkan id
        $data['user'] = $this->m_data->edit_data($where,'user')->result(); //memunculkan field yang akan diedit berdasarkan data di database
        $this->load->view('v_edit',$data); //memunculkan index view edit
    }

    function update(){
        $id = $this->input->post('id'); //mengupdate data variable id ke field database id 
        $nama = $this->input->post('nama'); //mengupdate data nama id ke field database nama 
        $alamat = $this->input->post('alamat'); //mengupdate data alamat id ke field database alamat 
        $pekerjaan = $this->input->post('pekerjaan'); //mengupdate data alamat pekerjaan ke field database pekerjaan 
     
        $data = array(
            'nama' => $nama, //membuat data field nama menjadi variable nama
            'alamat' => $alamat, //membuat data field alamat menjadi variable alamat
            'pekerjaan' => $pekerjaan //membuat data field pekerjaan menjadi variable pekerjaan
        );
     
        $where = array( //menentukan data berdasarkan id
            'id' => $id 
        );
     
        $this->m_data->update_data($where,$data,'user'); //memasukan semua data yang diupdate berdasarkan id di database field user
        redirect('crud/index'); //mereload page
    }
}