<?php 
class ajax extends CI_Controller
{
    public function suspend()
    {
      $id=$this->input->post('id');  
      $this->load->model('ajax_model');
      if($this->ajax_model->suspend($id))
      {
          $p="User has been suspended ..";
      }
      else{
          $p="something went wrong";
      }
      echo $p;
    }
     public function paid()
    {
      $id=$this->input->post('id');  
      $this->load->model('ajax_model');
      if($this->ajax_model->approve($id))
      {
          $p="User has been approved ..";
      }
      else{
          $p="something went wrong";
      }
      echo $p;
    }
    
    public function approvel()
    {
      $id=$this->input->post('id');  
      $this->load->model('ajax_model');
      if($this->ajax_model->approve_id($id))
      {
          $p="User has been approved ..";
      }
      else{
          $p="something went wrong";
      }
      echo $p;
    }
    
     public function unsuspend()
    {
      $id=$this->input->post('id');  
      $this->load->model('ajax_model');
      if($this->ajax_model->unsuspend($id))
      {
          $p="User has been unsuspended ..";
      }
      else{
          $p="something went wrong";
      }
      echo $p;
    }
    
    public function delete()
    {
        $id=$this->input->post('id');
        $this->load->model('ajax_model');
        if($this->ajax_model->delete($id))
        {
            $p="User has been deleted ..";
        }
        else{
            $p="something went wrong";
        }
        echo $p;
    }
    public function refer_count()
    {
         $id=$this->input->post('id');
        $this->load->model('ajax_model');
        $data=$this->ajax_model->refer_count($id);
        
            echo $data;
        
    }

}