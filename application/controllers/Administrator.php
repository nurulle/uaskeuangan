<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Model_app');
    }

    function index(){
        $this->template->load('Administrator/template','Administrator/view_home');
    }

    function home(){
       
        $this->template->load('Administrator/template','Administrator/view_home');
    }

    function identitaswebsite(){
      
		$this->template->load('Administrator/template','Administrator/mod_identitas/view_identitas');
		
	}

    function manajemenkeuangan(){
        
        $data['title'] = 'Manajemen Keuangan';
        $this->template->load('Administrator/template','Administrator/mod_keuangan/view_keuangan',$data);
    }

    function ambilData(){
        $data['masuk'] = $this->db->query("SELECT * FROM keuangan WHERE status='Masuk' ORDER BY id_keuangan DESC")->result_array();
        $data['keluar'] = $this->db->query("SELECT * FROM keuangan WHERE status='Keluar' ORDER BY id_keuangan DESC")->result_array();
        echo json_encode($data);
    }

    

    function tambah_keuangan(){
        $username = $this->input->post('username');
        $status = $this->input->post('status');
        $tgl = $this->input->post('date');
        $tujuan = $this->input->post('tujuan');
        $jumlah = $this->input->post('jumlah');

        $this->Model_app->insertBody($username, $status, $tgl, $tujuan, $jumlah);
        
        $results = [
            'tgl' => $tgl,
            'username' => $username,
            'status' => $status,
            'tujuan' => $tujuan,
            'jumlah' => $jumlah
        ];

        $this->session->set_flashdata('pesan',
            '<script>
                swal({
                    icon: "success",
                    title : "Data telah ditambahkan",
                    type : "success",
                    showConfirmButton: true
                })
            </script>'
        );

        echo json_encode($results);

    }

    function getDataEdit($id){
        $where = array('id_keuangan' => $id);
        $data['keuangan'] = $this->Model_app->edit_data($where, 'keuangan')->result();

        echo json_encode($data);
    }

    function ubah_keuangan(){
        $id_keuangan = $this->input->post('id_keuangan');
        $username = $this->input->post('username');
        $status = $this->input->post('status');
        $tgl = $this->input->post('date');
        $tujuan = $this->input->post('tujuan');
        $jumlah = $this->input->post('jumlah');

        $data = $this->Model_app->update_data($id_keuangan, $username, $status, $tgl, $tujuan, $jumlah);

        $results = [
            'tgl' => $tgl,
            'username' => $username,
            'status' => $status,
            'tujuan' => $tujuan,
            'jumlah' => $jumlah
        ];

        $this->session->set_flashdata('pesan',
            '<script>
                swal({
                    icon: "success",
                    title : "Data telah diubah",
                    type : "success",
                    showConfirmButton: true
                })
            </script>'
        );

        echo json_encode($results);
    }

    function hapus(){
        $id_keuangan = $this->input->post('id_keuangan');
        $data = $this->Model_app->hapus_data($id_keuangan);
        
        $this->session->set_flashdata('pesan',
            '<script>
                swal({
                    icon: "success",
                    title : "Data telah Terhapus",
                    type : "success",
                    showConfirmButton: true
                })
            </script>'
        );
        
        echo json_encode($data);
    }

}