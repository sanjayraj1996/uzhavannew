<?php
class Viewmodel extends CI_Model{
	public function country() {
		$this->db->select('a.r_univ_name, a.r_univ_name_short as univshort, b.id as idcountry, a.id, b.r_country_name, b.r_country_short as countryshort');
		$this->db->from('country b');
		$this->db->join('university a', 'a.r_country_id = b.id', 'left');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function training_menu() {
		$this->db->select('a.r_course_name, b.id as idtraining, a.id, b.r_training_category, b.r_training_short as trainingshort, a.r_course_short');
		$this->db->from('training_category b');
		$this->db->join('training a', 'a.r_category_id = b.id', 'left');
		$this->db->where('r_status', 1);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function country_title($id) {
		$this->db->select('*');
		$this->db->from('country');
		$this->db->where('r_country_short', $id);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret[0];
	}
	public function training_title($id) {
		$this->db->select('*');
		$this->db->from('training_category');
		$this->db->where('r_training_short', $id);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret[0];
	}
	public function university($id,$per_page,$page) {
		$this->db->select('university.*, country.r_country_name, country.r_currency_symbol, country.r_country_short, university_course.r_univ_course_name');
		$this->db->from('university');
		$this->db->where('country.r_country_short', $id);
		$this->db->join('country', 'university.r_country_id = country.id', 'inner');
		$this->db->join('university_course', 'university.r_course_id = university_course.id', 'inner');
		$this->db->limit($per_page,$page);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function university_count_data($id) {
		$this->db->select('count(university.id) as total_count');
		$this->db->from('university');
		$this->db->where('country.r_country_short', $id);
		$this->db->join('country', 'university.r_country_id = country.id', 'inner');
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->total_count;
	}
	public function university_single($id,$id2) {
		$this->db->select('university.*, country.r_country_name, country.r_currency_symbol, country.r_country_short, university_course.r_univ_course_name');
		$this->db->from('university');
		$this->db->where('university.r_univ_name_short', $id2);
		$this->db->where('country.r_country_short', $id);
		$this->db->join('country', 'university.r_country_id = country.id', 'inner');
		$this->db->join('university_course', 'university.r_course_id = university_course.id', 'inner');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret[0];
	}
	public function university_random($id) {
		$this->db->select('university.*, country.r_country_name, country.r_currency_symbol, country.r_country_short, university_course.r_univ_course_name');
		$this->db->where('r_country_id', $id);
		$this->db->limit(4);
		$this->db->from('university');
		$this->db->join('country', 'university.r_country_id = country.id', 'inner');
		$this->db->join('university_course', 'university.r_course_id = university_course.id', 'inner');
		$this->db->order_by('university.id','RANDOM');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function training($id,$per_page,$page) {
		$this->db->select('training.*, training_category.r_training_category, training_category.r_training_short');
		$this->db->from('training');
		$this->db->where('training_category.r_training_short', $id);
		$this->db->join('training_category', 'training.r_category_id = training_category.id', 'inner');
		$this->db->limit($per_page,$page);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function training_count_data($id) {
		$this->db->select('count(training.id) as total_count');
		$this->db->from('training');
		$this->db->where('training_category.r_training_short', $id);
		$this->db->join('training_category', 'training.r_category_id = training_category.id', 'inner');
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->total_count;
	}
	public function training_single($tcs,$trs) {
		$this->db->select('training.*, training_category.id as idtraining, training_category.r_training_category, training_category.r_training_short, training.r_course_short');
		$this->db->from('training');
		$this->db->where('training.r_course_short', $trs);
		$this->db->where('training_category.r_training_short', $tcs);
		$this->db->join('training_category', 'training_category.id = training.r_category_id', 'inner');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret[0];
	}
	public function training_random($id) {
		$this->db->select('training.*, training_category.id as idtraining, training_category.r_training_category, training_category.r_training_short as trainingshort');
		$this->db->where('training.r_category_id', $id);
		$this->db->from('training');
		$this->db->order_by('training.id','RANDOM');
		$this->db->join('training_category', 'training_category.id = training.r_category_id', 'inner');
		$this->db->limit(4);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function events($per_page,$page) {
		$this->db->select('*');
		$this->db->where('r_date > now() + INTERVAL 1 DAY');
		$this->db->from('events');
		$this->db->limit($per_page,$page);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function events_single($id) {
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret[0];
	}
	public function events_count_data() {	
		$this->db->query('SELECT * FROM `events` WHERE `r_date` > now() + INTERVAL 1 DAY;');
		$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 3, date('Y')));
		$this->db->where('r_date >', $date);
        $query = $this->db->get('events');
        return $query->num_rows();
	}
	public function faq() {
		$this->db->select('*');
		$this->db->from('faq');
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function services_role1() {
		$this->db->select('*');
		$this->db->from('services');
		$this->db->where('role', 1);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function services_role2() {
		$this->db->select('*');
		$this->db->from('services');
		$this->db->where('role', 2);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function job_category_abroad() {
		$this->db->select('*');
		$this->db->from('job_category');
		$this->db->where('job_type', 1);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
	public function job_category_domestic() {
		$this->db->select('*');
		$this->db->from('job_category');
		$this->db->where('job_type', 2);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret;
	}
}
?>