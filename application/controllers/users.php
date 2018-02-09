<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {
    
        public function register(){
            //callback_ is use before the method specified for custom validation
            $this->form_validation->set_rules('rcname','Name','required|callback_check_cname_exists');
            $this->form_validation->set_rules('remail','Email','required|callback_check_remail_exists');
            $this->form_validation->set_rules('rpassword','Password','required');
            $this->form_validation->set_rules('rcpassword','Confirm Password','matches[rpassword]');
           
            if($this->form_validation->run()===FALSE){
                $this->load->view('dashboard/register');
            }else{//encrypt password
                $epass=md5($this->input->post('rpassword'));
                $this->user_model->register($epass);
                //set message
                $this->session->set_flashdata('user_registered','You are now registered and can log in');
                redirect('dashboard');
            }

        }
        public function check_cname_exists($cname){
            $this->form_validation->set_message('check_cname_exists','Company name already taken.');
            if($this->user_model->check_cname_exists($cname)){
                return true;
            }
            return false;
        }
        public function check_remail_exists($remail){
            $this->form_validation->set_message('check_remail_exists','Email already taken.');
            if($this->user_model->check_remail_exists($remail)){
                return true;
            }
            return false;
        }
    //login
        public function login(){
            //callback_ is use before the method specified for custom validation
            $this->form_validation->set_rules('lemail','Email','required');
            $this->form_validation->set_rules('lpassword','Password','required');

            if($this->form_validation->run()===FALSE){
                $this->load->view('dashboard/login');
            }else{
                $lemail=$this->input->post('lemail');
                $epass=md5($this->input->post('lpassword'));

                //login id
                $cid=$this->user_model->login($lemail,$epass);
            
                if($cid){
                    $this->session->set_flashdata('user_loggedin','You are now logged in');
                    redirect('dashboard');
                }
                else{
                    $this->session->set_flashdata('login_failed','Login is Invalid');
                    redirect('login');
                }
            }

        }
}