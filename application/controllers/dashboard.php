<?php
	class dashboard extends CI_Controller{
		public function register(){

            if($this->session->userdata('logged_in')){
                redirect();
            }

			echo "hi ".$_POST['email']." your password is ".$_POST['pass'];

		}
		public function signin(){

            if($this->session->userdata('logged_in')){
                redirect();
            }
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required|callback_checklogin');
			if($this->form_validation->run()==false){
				echo 'error';
				$this->load->view('dashboard/login');
			}else{
				redirect(base_url('index.php/home'),'refresh');
			}

		}
		public function company(){
			if($this->input->is_ajax_request()){
				$data=$this->company_model->viewcomp($this->input->post('cid'));
				echo json_encode($data);
			}
			else{
				if($this->session->userdata('type')!='Admin'){
					redirect('dashboard');
				}
				$data['cdata']=array(
					'cid'=>'',
					'cname'=>'',
					'cemail'=>'',
					'cwelcome'=>'',
					'cabout'=>'',
					'curl'=>''
				);
				if(!empty($_POST)){
					$data['cdata']=$this->company_model->viewcomp($this->input->post('cid'));
				}
				$data['company']=$this->company_model->viewcomp();
			//	print_r($data);
			//	exit();
				$this->load->view('dashboard/templates/header');
				$this->load->view('dashboard/users',$data);
				$this->load->view('dashboard/templates/footer');
			}
		}
		public function messages($indexno=0){

			if($this->input->is_ajax_request()){
				$type=$this->session->userdata('type');
				if($type=='Admin'){
					if(!empty($_POST)){
						$data=$this->amessage_model->view($this->input->post('amid'));
					}
					echo json_encode($data);
				}
				else if($type=='Company'){
					if(!empty($_POST)){
						$data=$this->cmessage_model->view($this->input->post('cmid'));
					}
					echo json_encode($data);
				}
			}
			else{
				$type=$this->session->userdata('type');
				//exit();
				if($type=='Admin'){

					$data['mdata']=array(
						'amid'=>'',
						'amname'=>'',
						'amemail'=>'',
						'amsubject'=>'',
						'ammsg'=>''
					);
					$config['base_url'] = base_url().'dashboard/messages/';
					$config['total_rows'] = $this->amessage_model->countnum();
					$config['per_page'] = 3;
					$config['uri_segment'] = 3;
					$config['first_tag_open'] = '<div class="btn btn-success">';
					$config['first_tag_close'] = '</div>';

					$this->pagination->initialize($config);
					$data['message']=$this->amessage_model->view(FALSE,$config['per_page'],$indexno);
				}
				else if($type=='Company'){

					$data['mdata']=array(
						'cmid'=>'',
						'cmname'=>'',
						'cmemail'=>'',
						'cmsubject'=>'',
						'cmmsg'=>''
					);
					$config['base_url'] = base_url().'dashboard/messages/';
					$config['total_rows'] = $this->cmessage_model->countnum();
					$config['per_page'] = 3;
					$config['uri_segment'] = 3;
					$config['first_tag_open'] = '<div class="btn btn-success">';
					$config['first_tag_close'] = '</div>';

					$this->pagination->initialize($config);
					$data['message']=$this->cmessage_model->view(FALSE,$config['per_page'],$indexno);
				}/*
				else{
				$this->load->view('dashboard/templates/header');
				$this->load->view('dashboard/messages');
				$this->load->view('dashboard/templates/footer');
				}*/
			//	print_r($data);
			//	exit();
				$this->load->view('dashboard/templates/header');
				$this->load->view('dashboard/messages',$data);
				$this->load->view('dashboard/templates/footer');
			}
		}
		public function customer(){
			if($this->session->userdata('type')!='Company'){
				redirect('dashboard');
			}
			$data['cudata']=array(
				'cuid'=>'',
				'cuname'=>'',
				'cuemail'=>''
			);
			if(!empty($_POST)){
				$data['cudata']=$this->customer_model->viewcus($this->input->post('cuid'));
			}
			$data['customer']=$this->customer_model->viewcus();
		//	print_r($data);
		//	exit();
			$this->load->view('dashboard/templates/header');
			$this->load->view('dashboard/users',$data);
			$this->load->view('dashboard/templates/footer');
		}
		public function service(){
			if($this->session->userdata('type')!='Company'){
				redirect('dashboard');
			}
			$data['sdata']=array(
				'sid'=>'',
				'sname'=>'',
				'svenue'=>'',
				'sprice'=>'',
				'sdescription'=>''
			);
			if(!empty($_POST)){
				$data['sdata']=$this->service_model->viewser($this->input->post('sid'));
				echo json_encode($data['sdata']);
			}
			else{
				$data['service']=$this->service_model->viewser();
			
				//print_r($data);
				//exit();
				$this->load->view('dashboard/templates/header');
				$this->load->view('dashboard/service',$data);
				$this->load->view('dashboard/templates/footer');
			}
		}
		public function view($page='index'){
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            if(file_exists(APPPATH.'views/dashboard/'.$page.'.php')){
            		if($this->session->userdata('type')=='Company'){
						$data['calendar']=$this->calendar_model->generate(date('Y'),date('m'));
						$data['calendarnum']=$this->calendar_model->countnum();
						$data['servicenum']=$this->service_model->countnum();
						$data['cunum']=$this->customer_model->countnum();
					}
					else if($this->session->userdata('type')=='Admin'){
						$data['company']=$this->company_model->viewcomp();
						$data['cosnum']=$this->company_model->countnum();
						$data['msgnum']=$this->amessage_model->countnum();
					}
					$this->load->view('dashboard/templates/header');
					$this->load->view('dashboard/'.$page,$data);
					$this->load->view('dashboard/templates/footer');
			}
			else{
				show_404();
			}
		}
		public function calendar($year=null,$month=null){
        date_default_timezone_set("Asia/Manila"); 
			/*$conf=array(
				'start_day'=>'monday',
				'show_next_prev'=>true,
				'next_prev_url'=>base_url().'dashboard/calendar'
			);
			$this->load->library('calendar',$conf);
			echo $this->calendar->generate($year,$month);
			exit();*/
			if($this->session->userdata('type')!='Company'){
				redirect('dashboard');
			}
			$data['customer']=$this->customer_model->viewcus();
			$data['service']=$this->service_model->viewser();
			if(!$year){
				$year=date('Y');
			}
			if(!$month){
				$month=date('m');
			}

			if($this->input->is_ajax_request()){
				$this->calendar_model->addsched(
					$this->input->post('eid'),
					$this->input->post('date'),
					$this->input->post('time'),
					$this->input->post('details'),
					$this->input->post('sid'),
					$this->input->post('cid'),
					$this->input->post('cuid')
				);

			}/*
			if($day= $this->input->post('day')){
				echo $this->input->post('day');
				exit();
				$this->calendar_model->addsched("$year-$month-$day",
				$this->input->post('details'));
			}*/
			$data['calendar']=$this->calendar_model->generate($year,$month);
			if(!$this->input->is_ajax_request()){		
					$this->load->view('dashboard/templates/header');
					$this->load->view('dashboard/forms',$data);
					$this->load->view('dashboard/templates/footer');

			}else
					echo $data['calendar'];		

		}
	}