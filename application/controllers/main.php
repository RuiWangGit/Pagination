<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // $this->output->enable_profiler();
		 $this->load->model('CSV');
		 
	}

	public function index(){
		// echo("dfsdf");
		// die;
		// $this->load->view("index" ) ;
		redirect('/show');

	}
	


	public function upload(){
		// echo('.......');
		// var_dump($_FILES);
		// die;
		// $this->load->model('CSV');
		$this->CSV->insert($_FILES);
		redirect('/show');

	}


	public function show() {
		// pagination	​
			$per_page = 5;
		 	$offset = 0;

			$current_page = 1;

			if(isset($_GET['page']) ) {
				$current_page = $_GET['page'];
				$offset = ($_GET['page'] - 1) * $per_page;
			}
			

			$posts = $this->CSV->fetch_record();
			$max_page_num = ceil($posts["total_rows"] / $per_page);

			$users = $this->CSV->fetch_all($offset, $per_page);

			$this->load->view( "result", array('total'=>$posts["total_rows"], "current_page"=>$current_page, 'max_page_num'=>$max_page_num, 'users'=>$users) );
			


			
			
	}


	public function render(){

			$per_page = 5;
			$offset = 0;
			$posts = $this->CSV->fetch_record();
			$max_page_num = ceil($posts["total_rows"] / $per_page);


			
			if ($_GET['action'] == "first" ){
					
					$offset = 0;
					$users = $this->CSV->fetch_all($offset, $per_page);
					$this->load->view( "result", array('total'=>$posts["total_rows"], "current_page"=>1, 'max_page_num'=>$max_page_num, 'users'=>$users) );
				

			}
			else if ( $_GET['action'] == 'last'){
					
					$offset = ($max_page_num -1)*$per_page;
					$users = $this->CSV->fetch_all($offset, $per_page);
					$this->load->view( "result", array('total'=>$posts["total_rows"],"current_page"=>$max_page_num, 'max_page_num'=>$max_page_num, 'users'=>$users) );


			}

			else if ( $_GET['action'] == "prev"){

					if( isset($_GET['page'] ) && $_GET['page'] >= 1 && $_GET['page'] <= $max_page_num ){
						$current_page = $_GET['page'];
						$offset = ($_GET['page'] - 1)*$per_page;
					} 
					else {
						$current_page = $_GET['page'] + 1;     // when current_page = 0, revert back to 1;
						$offset = ($_GET['page'] )*$per_page;
					}


					$users = $this->CSV->fetch_all($offset, $per_page);			
					$this->load->view( "result", array('total'=>$posts["total_rows"], "current_page"=>$current_page, 'max_page_num'=>$max_page_num, 'users'=>$users) );

			}	
			else if ( $_GET['action'] == 'next'){
					if(isset($_GET['page'])  && $_GET['page'] > 0 && $_GET['page'] <= $max_page_num ) {
							$current_page = $_GET['page'];
							$offset = ($_GET['page'] - 1) * $per_page;
					}
					else {
						$current_page = $_GET['page'] - 1;       //when current_page > total, revert back to total
						$offset = ($_GET['page'] - 2)*$per_page;
					}
					
					$users = $this->CSV->fetch_all($offset, $per_page);	
					$this->load->view( "result", array('total'=>$posts["total_rows"],"current_page"=>$current_page, 'max_page_num'=>$max_page_num, 'users'=>$users) );


			}

			else {

			}


	}

	
}

//end of main controller

