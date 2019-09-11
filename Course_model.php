<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	//bu method yeni meni verilenler bazasindaki table adini bu veraybila at;
	public $tableName = "course";

	//burada deyilir get bazadaki butun verilenleri getir mene;
	public function get_all(){
     return $this->db->get($this->tableName)->result();
	}


	public function insert($data = array()){//burda deyilirki kontrolerde gelen verileri yaz databazaya nece yazim kontrlerdeki methodun parametresinnen gelen verilenleri
	return $this->db->insert($this->tableName, $data);//buradan yaz
	 
	}


	public function update($id, $data = array()){//burada array elemeliyik ki kontrollerde bunlari bir array  icinde clss verey
     return $this->db->where("id", $id)->update($this->tableName, $data);//burada deyshikliy eleyecem amma deyir neyi deyisecem($this->tableName )tablosundaki id olani deyishecem amma where sorgusuyla $data parametresini deyisecem
	}


	public function delete($id){
	//melumati sil haradan delete($this->tableName) nece silim id-di parametresin-nen nece WHERE("id",$id) sorgusuyla eyer where olmassa butu melumatlar silinecek
     return $this->db->where("id", $id)->delete($this->tableName);
	}
	

	public function edit($id){
		return $this->db->where("id",$id)->get($this->tableName)->row();
	   }



	   public function update_view($id, $data = array()){//burada array elemeliyik ki kontrollerde bunlari bir array  icinde clss verey
		return $this->db->where("id", $id)->update($this->tableName, $data);/*burada deyshikliy eleyecem amma deyir neyi deyishecem($this->tableName )tablosundaki 
		id olani deyishecem amma hansi sorguyla ? where sorgusuyla $data parametresini deyisecem*/
	   }
}




?>