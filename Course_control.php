<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_control extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		//burada  modeli cagirilir ki controlerde islesin
		$this->load->model("Course_model");
	    

	}
	
	//saytinAdi/ControllerAdi/MethodAdi/ParametreAdi/ParametreAdi
	 public function index()
	{ 
		$items = $this->Course_model->get_all();

		//datadan gelen melumatlari view gondermeki icin bir array hazirlayib gundermek icin bu sorguyu yazin
		$viewData = array("rows" => $items);	
		$this->load->view("Course_view",$viewData);
	}

	public function insert()
	{
		$to_title = $this->input->post("title");//burada yeni postan gelen veiler
		$insert = $this->Course_model->insert( //burada deyiremki bu model sorgusun at veraybila($insert) ve on gonder if'e
			//burada ise deyiremki inputdan gelen verileri at veraybila($to_title) oradanda array sekilinde gonder modele ve modelde gonedrsin databazaya
			array(
				"title"        => $to_title, 
				"isCompileted" => 0,
				"createdAt"    => date("Y-m-d H:i:s")
			    )
			);
        if($insert){//eyer insert ishi varsa qeyd ele ve yenide ridayrektid ele view'e qayit 
          redirect(base_url());
		}
	}


	public function delete($id){//view-den gelen sil melumatina burada parametreye baxaraq tesdiq ede
		//echo $this->uri->segment(3);   //burada deyirem ki url-de nece gorunur
	  $deleted = $this->Course_model->delete($id);//burada yeni view-den gelen sil melumati kontroler-deki method(delete)-den parametre id-ni al ve modele gonder silsin
	  redirect(base_url());//ve sonra meni view yonlendir
	}


	public function isComplietedSetter($id){
		$completed = ($this->input->post("completed") == "true") ? 1 : 0;	
		//burada deyirem (Course_model) update-sini kullan
		$this->Course_model->update($id, array( //burada bir array hazirlayib  ve burada ("isCompileted") deyerini ($completed) isimli bir deyere alinir
			"isCompileted" => $completed
		));
      
	}
	public function edit($id){
	
		$items = $this->Course_model->edit($id);
		//datadan gelen melumatlari view gondermeki icin bir array hazirlayib gundermek icin bu sorguyu yazin
		$viewData = array("rows" => $items);	
		$this->load->view("update_view",$viewData);
	}


	public function update_view($id){
		$title = $this->input->post("title");//buda edit sehifesinden gelen verileri postla update ele 
		//burada deyirem (Course_model) update-sini kullan ve kontrolerdeki posti model vastesiyle vertabaninda verilerde deyishikliy ele
		$this->Course_model->update($id, array( "title" => $title));
		redirect(base_url()); 
	}
}


