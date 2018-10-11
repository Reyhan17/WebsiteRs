<?php
  class M_data extends CI_Model{
	   function tampil_data(){
         $res = $this->db->get('berita');

         return $res->result_array();
	   }

	   function input_data($table, $data){
		     $res = $this->db->insert($table,$data);

         return $res;
	   }


     function code_otomatis(){
            $this->db->select('RIGHT(berita.id_berita,3) as kode', FALSE);
            $this->db->order_by('id_berita', 'desc');

            $query = $this->db->get('berita');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }

            $kodemax = str_pad($kode,3,"00",STR_PAD_LEFT);
            $kodejadi  = "BRT".$kodemax;
            return $kodejadi;

        }
  }
 ?>
