<?php
class Viewmodel extends CI_Model{
	public function services_data() {
		$this->db->select('*');
		$this->db->from('services');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function gallery_display($id) {
		$this->db->select('gallery.*, gallery_category.*');
		$this->db->from('gallery');
		$this->db->where('gallery_category.gal_category_short', $id);
		$this->db->join('gallery_category', 'gallery.gal_category = gallery_category.id', 'inner');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function fees_details() {
		$this->db->select('*');
		$this->db->from('feeschedule');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
}
?>