<?php
 
class Agenda_m extends CI_Model {
	public function get($id = null)
  {
    $this->db->from('tb_agenda');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function get_by_kode($kode = null)
  {
    $this->db->from('tb_agenda');
    $this->db->where('kode',$kode);
    $query = $this->db->get();
    return $query;
  }

  public function getLastMouth()
  {
    $this->db->from('tb_agenda');
    $this->db->like('tgl',date("Y-m"));
    $this->db->where('tgl >=',date("Y-m-d"));
    $this->db->order_by('tgl',"asc");
    $this->db->order_by('waktu_mulai',"asc");
    $query = $this->db->get();
    return $query;
  }

  public function getLast()
  {
    $this->db->from('tb_agenda');
    $this->db->where('tgl >=',date("Y-m-d"));
    $this->db->order_by('tgl',"asc");
    $this->db->order_by('waktu_mulai',"asc");
    $query = $this->db->get();
    return $query;
  }

  public function getThisDay()
  {
    $this->db->from('tb_agenda');
    $this->db->like('tgl',date("Y-m-d"));
    $this->db->order_by('tgl',"asc");
    $this->db->order_by('waktu_mulai',"asc");
    $query = $this->db->get();
    return $query;
  }


  // DATATABLES
  var $table = 'tb_agenda'; //nama tabel dari database
  var $column_order = array(null, 'kode','acara','tema'); //field yang ada di table user
  var $column_search = array('kode','acara','tema'); //field yang diizin untuk pencarian 
  var $order = array('tgl' => 'desc'); // default order 

  private function _get_datatables_query()
  {
    $this->db->from($this->table);
    $i = 0;
    foreach ($this->column_search as $item) // looping awal
    {
        if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
        {
            if($i===0) // looping awal
            {
                $this->db->group_start(); 
                $this->db->like($item, $_POST['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_POST['search']['value']);
            }
            if(count($this->column_search) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    }
     
    if(isset($_POST['order'])) 
    {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
	// DATATABLES
	
	function simpan($post)
	{
	  $params['id'] =  "";
	  $params['kode'] =  date("Ymd");
    $params['tgl'] =  $post['tgl'];
    $params['pimpinan'] =  $post['pimpinan'];
    $params['waktu_mulai'] =  $post['waktu_mulai'];
    $params['waktu_selesai'] =  $post['waktu_selesai'];
    $params['tempat'] =  $post['tempat'];
    $params['peserta'] =  $post['peserta'];
    $params['acara'] =  $post['acara'];
    $params['tema'] =  $post['tema'];
    $params['katakunci'] =  $post['katakunci'];
    $params['link'] =  $post['link'];
    $params['total_peserta'] =  $post['total_peserta'];
    $params['user_id'] =  $this->session->id;
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  $this->db->insert('tb_agenda',$params);
	}

  function update($post)
  {
    $params['id'] =  $post['id'];
    $params['tgl'] =  $post['tgl'];
    $params['pimpinan'] =  $post['pimpinan'];
    $params['waktu_mulai'] =  $post['waktu_mulai'];
    $params['waktu_selesai'] =  $post['waktu_selesai'];
    $params['tempat'] =  $post['tempat'];
    $params['peserta'] =  $post['peserta'];
    $params['acara'] =  $post['acara'];
    $params['tema'] =  $post['tema'];
    $params['katakunci'] =  $post['katakunci'];
    $params['link'] =  $post['link'];
    $params['total_peserta'] =  $post['total_peserta'];

    $this->db->where('id',$params['id']);
    $this->db->update('tb_agenda',$params);
  }

  function hapus($id){

    $this->db->where('id', $id);
    $this->db->delete('tb_agenda');

  }

	/*
		Untuk Kebutuhan Shopee
	*/

	public function getExternal($id = null)
  {
    $this->db->from('tb_agenda_external');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

	public function getExternalLast()
  {
    $this->db->from('tb_agenda_external');
    $this->db->where('tgl >=',date("Y-m-d"));
    $this->db->order_by('tgl',"asc");
    $this->db->order_by('waktu_mulai',"asc");
    $query = $this->db->get();
    return $query;
  }

	function updateExternal($post)
  {
    $params['id'] =  $post['id'];
    $params['tgl'] =  $post['tgl'];
    $params['pimpinan'] =  $post['pimpinan'];
    $params['waktu_mulai'] =  $post['waktu_mulai'];
    $params['waktu_selesai'] =  $post['waktu_selesai'];
    $params['tempat'] =  $post['tempat'];
    $params['peserta'] =  $post['peserta'];
    $params['acara'] =  $post['acara'];
    $params['tema'] =  $post['tema'];
    $params['total_peserta'] =  $post['total_peserta'];

    $this->db->where('id',$params['id']);
    $this->db->update('tb_agenda_external',$params);
  }

	function hapusExternal($id){

    $this->db->where('id', $id);
    $this->db->delete('tb_agenda_external');
  }

	
 
}
