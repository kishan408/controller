<?php
class admin extends CI_Controller
{
    public function authinticate()
    {
          $uname=$this->input->post('uname');
          $pwd=$this->input->post('pwd');
         $this->load->model('admin_model');
         if($this->admin_model->auth($uname,$pwd))
         {
            redirect('admin/dashboard');
         }
         else{
             echo "failed";
             $this->load->view('welcome_message?Username or password not matched');
         }
        
    }
    public function dashboard()
    {
        $name='';
        $this->load->model('admin_model');
        $data=$this->admin_model->select_users();
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard',['users'=>$data,'name'=>$name]);
        $this->load->view('admin/footer');
    }
    public function all_users()
    {
        $name=$this->input->get('name');
        $id=$this->input->get('id');
        $this->load->model('ajax_model');
        $data=$this->ajax_model->refer_details($id);
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard',['users'=>$data,'name'=>$name]);
        $this->load->view('admin/footer');
    }
    public function account_management()
    {
         $this->load->view('admin/header');
        $this->load->view('admin/account_details');
        $this->load->view('admin/footer');
    }
    public function change_password()
    {
         $this->load->view('admin/header');
        $this->load->view('admin/password');
        $this->load->view('admin/footer');
    }
    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('welcome');
    }
    public function check_pass()
    {
        $pass=$this->input->post('op');
        $this->load->model('ajax_model');
        $num=$this->ajax_model->check_pass($pass);
        echo $num;
    }
    public function change_pass()
    {
        $new_p=$this->input->post('new_p');
        $con_p=$this->input->post('con_p');
        if($new_p==$con_p)
        {
        $this->load->model('admin_model');
        if($this->admin_model->change_pass($new_p))
        {
            $p="Password has been updated..";
        }
        else{
            $p="Something went wrong";
        }
        }
        else{
            $p="Password is not matching.";
        }
            echo $p;
        }
        public function pending_payments()
        {
            $this->load->model('ajax_model');
        $data=$this->ajax_model->pending_payment();
        
             $this->load->view('admin/header');
        $this->load->view('admin/pending_pement',['data'=>$data]);
        $this->load->view('admin/footer');
        }
}