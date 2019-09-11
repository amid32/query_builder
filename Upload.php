<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
   public function __construct(){
      parent::__construct();
   }
	public function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
   }
   
   public function do_upload() {
      $config['upload_path']   = './uploads/img';
        $config['allowed_types'] = 'gif|jpg|png';
      //$config['allowed_types'] = '*';
      //$config['allowed_types'] = 'rar|zip|pdf';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_hight']     = 768;
      $this->load->library('upload',$config);
      if(! $this->upload->do_upload('userfile')) {
         $error = array('error' => $this->upload->display_errors("Error"));
         $this->load->view('upload_form', $error);         
         // $upload = $this->upload->do_upload('userfile');
         // if(!$upload){
         //    echo "success";
      }
      else {
         $data = array('upload_data' => $this->upload->data());
         $this->load->view('upload_success', $data);
         // echo "success";
      }
   }
}
?>


<!-- public function students_update($id){
	 	$isActive = $this->input->post("isActive");
	 	 $isActive = ($isActive == "on") ? 1 : 0;
	 	  $img_id = $_FILES["img_id"]["name"];
	 	$data = array(
        "IDN"             => $this->input->post("IDN"),
        "title"           => $this->input->post("title"),
        "phone"           => $this->input->post("phone"),
        "addres"          => $this->input->post("addres"),
        "email	"         => $this->input->post("email	"),
        "detail"          => $this->input->post("detail"),
        "categorie_id"    => $this->input->post("categorie_id"),
        "teacher_id"    => $this->input->post("teacher_id"),
        
        "img_id"         => $img_id,
          "isActive"      => $isActive	 		   
        );      
        $config['upload_path']          = 'uploads/students/';
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        $upload =  $this->upload->do_upload('img_id');
       
		return  $this->db->where("id",$id)->update("students",$data);
	} -->


