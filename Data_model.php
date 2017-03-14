<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function pagedata($a)
{
if($a==1){
$this->db->select('users.*,authorities.*');
$this->db->from('users');
    $this->db->join('authorities','authorities.authorityId=users.authorityId');
//$this->db->where('id',$a);


return       $this->db->get()->result_array();

}
elseif ($a==2){
    $this->db->select('*');
    $this->db->from('authorities');

//$this->db->where('id',$a);


    return       $this->db->get()->result_array();

}
elseif ($a==3)
$this->db->select('*');    	$this->db->from('categories_pros');

//$this->db->where('id',$a);


return       $this->db->get()->result_array();


}

    function getauthority(){
        $this->db->select('*');
        $this->db->from('authorities');

//$this->db->where('id',$a);


        return       $this->db->get()->result_array();
    }
    function removeuser($a)
    {

        $this->db->where('id', $a);
        $this->db->delete('users');
        redirect('admin/user/data?page=1');

    }

    function getuserlogindata($a)
    {
        $this->db->select('users.*,authorities.*');
        $this->db->from('users');
        $this->db->join('authorities','authorities.authorityId=users.authorityId');
        $this->db->where('id',$a);


        return       $this->db->get()->result_array();
    }
    function getloginfo($nm,$ps){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userName',$nm);
        $this->db->where('password',$ps);
        return       $this->db->get()->result_array();


    }
    function blockuser($id){
        $ad=$this->session->userdata('name');
        $data['updated_by']=$ad;
        $data['enabled'] = 0;
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        redirect('admin/user/data?page=1');

    }

    function unblockuser($id){
        $ad=$this->session->userdata('name');
        $data['updated_by']=$ad;
    $data['enabled'] = 1;
    $this->db->where('id',$id);
    $this->db->update('users',$data);
        redirect('admin/user/data?page=1');

    }
    function getproeditdata($id){

        if($this->input->post('action') == 'edit-user'){
            /*$this->form_validation->set_rules('firstName', 'Contact\'s First Name', 'required');
             $this->form_validation->set_rules('lastName', 'Contact\'s Last Name', 'required');
             $this->form_validation->set_rules('phome', 'Contact\'s Phone Number', 'required');
             $this->form_validation->set_rules('userContactEmail', 'Contact\'s  Email Address', 'required|match[userEmail]');*/
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|valid_email|is_unique[homeowners.email]');
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|is_unique[homeowners.email_address]');
            //$this->form_validation->set_rules('mdate', 'Medical Date', 'required');
            //$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.userName]');

            $this->form_validation->set_rules('password', 'Your Password having 5 character', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $ad=$this->session->userdata('name');
                $data['updated_by']=$ad;
                $data['userName'] = $this->input->post('username');
                $data['password'] = $this->input->post('password');
                $data['authorityId'] = $this->input->post('authority');

                $this->db->where('id',$id);
                $this->db->update('users',$data);
                $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('admin/user/data?page=1');
            }
        }
    }
    function getcreatedata(){

        if($this->input->post('action') == 'create_user'){
            /*$this->form_validation->set_rules('firstName', 'Contact\'s First Name', 'required');
             $this->form_validation->set_rules('lastName', 'Contact\'s Last Name', 'required');
             $this->form_validation->set_rules('phome', 'Contact\'s Phone Number', 'required');
             $this->form_validation->set_rules('userContactEmail', 'Contact\'s  Email Address', 'required|match[userEmail]');*/
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|valid_email|is_unique[homeowners.email]');
            //$this->form_validation->set_rules('mdate', 'Medical Date', 'required');
            $this->form_validation->set_rules('username', 'Your Email id*', 'required|is_unique[users.userName]');

            $this->form_validation->set_rules('password', 'Your Password having 5 character', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
               $data['userName'] = $this->input->post('username');
                $data['password'] = $this->input->post('password');
                $data['authorityId']=$this->input->post('authority');
                $data['enabled']='1';
                $this->db->insert('users',$data);
                $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('admin/user/data?page=1');
            }
        }
    }
}