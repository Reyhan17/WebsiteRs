<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');

	}

	public function index(){
    $data['id'] = $this->m_data->tampil_data()->result();
		$this->load->view('lihat_berita',$data);
    $this->m_data->input_data($data,'berita');
	}

  function input_berita(){
    $data['kodeunik'] = $this->m_data->code_otomatis();

		$data = array(
			'id_berita' => $this->input->post('id'),
			'judul_berita' => $this->input->post('judul'),
			'isi_berita' => $this->input->post('isi'),
			'author_berita' => $this->input->post('author')
			);

    $data = $this->m_data->input_data('berita', $data);

    redirect(base_url(),'refresh');


	}
}
