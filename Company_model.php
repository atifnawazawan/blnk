<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    public function get_companies(){
        $this->db->select('*')->from('companies');
        return $this->db->get()->result_array();
    }
    public function get_location(){
    }
    public function get_pagerecord($page){
        if($page=='loc'){

            $this->db->select('*')->from('work_location');
        }
        if($page=='shovown') {
            $this->db->select('*')->from('shovel_owner');
        }

        if($page=='expens') {
            $this->db->select('*')->from('total_expense');
        }
        if($page=='showok') {
            $this->db->select('shovel_work.*,shovel_owner.owner_name')->from('shovel_work')->join('shovel_owner','shovel_work.shovel_owner_id=shovel_owner.shovel_owner_id');
        }
        if($page=='paytake') {
            $this->db->select('*')->from('payment_taker');
        }
        if($page=='paydet') {
            $this->db->select('*')->from('payments_details');
        }
        return $this->db->get()->result_array();

    }
    public function get_diesel(){
        $this->db->select('diesel_invoice.*,shovel_owner.owner_name')->from('diesel_invoice')->join('shovel_owner','diesel_invoice.shovel_owner_id=shovel_owner.shovel_owner_id');;
        return $this->db->get()->result_array();
    }

    function getcreatedata(){

        if($this->input->post('action') == 'add_company'){
            $this->form_validation->set_rules('companyname', 'Unique Company name ', 'required|is_unique[companies.comp_name]');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['comp_name'] = $this->input->post('companyname');
                $data['add_by'] =$_SESSION['name'];
                $this->db->insert('companies',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=1');
            }
        }
        if($this->input->post('action') == 'add_location'){
            $this->form_validation->set_rules('locationname', 'Unique Location name ', 'required|is_unique[work_location.location_name]');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['location_name'] = $this->input->post('locationname');
                $data['add_by'] =$_SESSION['name'];
                $this->db->insert('work_location',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=loc');
            }
        }
        if($this->input->post('action') == 'add_paytake'){
            $this->form_validation->set_rules('paytakename', 'Unique taker name ', 'required|is_unique[payment_taker.name]');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['name'] = $this->input->post('paytakename');
                $data['add_by'] =$_SESSION['name'];
                $this->db->insert('payment_taker',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=paytake');
            }
        }
        if($this->input->post('action') == 'add_owner'){
            $this->form_validation->set_rules('ownername', 'Unique owner name ', 'required|is_unique[shovel_owner.owner_name]');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['owner_name'] = $this->input->post('ownername');
                $data['add_by'] =$_SESSION['name'];
                $this->db->insert('shovel_owner',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=shovown');
            }
        }
        if($this->input->post('action') == 'add_expense_data'){
            $this->form_validation->set_rules('inv', 'Unique invoice no. ', 'required|is_unique[total_expense.Inv_no]');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['add_by'] =$_SESSION['name'];
               // $data['comp_id']=$this->input->post('compid');
                $data['date']=$this->input->post('date');
                //  $data['month_year']=$this->input->post('');
                $data['Details']=$this->input->post('detail');
                $data['Inv_no']=$this->input->post('inv');
                $data['Gallon']=$this->input->post('gallon');
                $data['rate']=$this->input->post('rate');
                $data['total_amount']=$this->input->post('totamount');

                $this->db->insert('total_expense',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=expens');
                echo "madina";
            }
        }
        if($this->input->post('action') == 'add_paymentdetail_data'){
            $this->form_validation->set_rules('detail', 'Detail ', 'required');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['add_by'] =$_SESSION['name'];
                // $data['comp_id']=$this->input->post('compid');
                $data['date']=$this->input->post('date');
                //  $data['month_year']=$this->input->post('');
                $data['details']=$this->input->post('detail');
                $data['trip_m3_hour']=$this->input->post('trip');
                $data['gallon']=$this->input->post('gallon');
                $data['rate']=$this->input->post('rate');
                $data['total_amount']=$this->input->post('totamount');

                $this->db->insert('payments_details',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=paydet');
                echo "madina";
            }
        }
        if($this->input->post('action') == 'add_shovelwork_data'){
            $this->form_validation->set_rules('detail', 'Detail ', 'required');
            $this->form_validation->set_rules('shoown', 'Shovel Owner', 'required');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                $data['add_by'] =$_SESSION['name'];
                // $data['comp_id']=$this->input->post('compid');
                $data['date']=$this->input->post('date');
                //  $data['month_year']=$this->input->post('');
                $data['details']=$this->input->post('detail');
                $data['hours']=$this->input->post('hour');
                $data['rate']=$this->input->post('rate');
                $data['total_amount']=$this->input->post('totamount');
                $data['shovel_owner_id']=$this->input->post('shoown');
                $this->db->insert('shovel_work',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=showok');
                echo "madina";
            }
        }
    }
    function company_data($a)
    {
        $this->db->select('*');
        $this->db->from('companies');
        $this->db->where('comp_id',$a);


        return       $this->db->get()->result_array();
    }
    function location_data($a)
    {
        $this->db->select('*');
        $this->db->from('work_location');
        $this->db->where('location_id',$a);


        return       $this->db->get()->result_array();
    }

    function getproeditdata($id){

        if($this->input->post('action') == 'edit-company'){
            /*$this->form_validation->set_rules('firstName', 'Contact\'s First Name', 'required');
             $this->form_validation->set_rules('lastName', 'Contact\'s Last Name', 'required');
             $this->form_validation->set_rules('phome', 'Contact\'s Phone Number', 'required');
             $this->form_validation->set_rules('userContactEmail', 'Contact\'s  Email Address', 'required|match[userEmail]');*/
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|valid_email|is_unique[homeowners.email]');
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|is_unique[homeowners.email_address]');
            //$this->form_validation->set_rules('mdate', 'Medical Date', 'required');
            //$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.userName]');


            $ad=$this->session->userdata('name');
            $data['add_by']=$ad;
            $data['comp_name'] = $this->input->post('compname');
            //  $data['']
            $this->db->where('comp_id',$id);
            $this->db->update('companies',$data);
            $id =  urlencode(base64_encode($this->db->insert_id()));
            redirect('data/companies?page=1');

        }
    }
    function edit_record_model($id){

        if($this->input->post('action') == 'edit-location'){
            /*$this->form_validation->set_rules('firstName', 'Contact\'s First Name', 'required');
             $this->form_validation->set_rules('lastName', 'Contact\'s Last Name', 'required');
             $this->form_validation->set_rules('phome', 'Contact\'s Phone Number', 'required');
             $this->form_validation->set_rules('userContactEmail', 'Contact\'s  Email Address', 'required|match[userEmail]');*/
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|valid_email|is_unique[homeowners.email]');
            //$this->form_validation->set_rules('email', 'Your Email id*', 'required|is_unique[homeowners.email_address]');
            //$this->form_validation->set_rules('mdate', 'Medical Date', 'required');
            //$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.userName]');


            $ad=$this->session->userdata('name');
            $data['add_by']=$ad;
            $data['location_name'] = $this->input->post('locationname');
            //  $data['']
            $this->db->where('location_id',$id);
            $this->db->update('work_location',$data);
            $id =  urlencode(base64_encode($this->db->insert_id()));
            redirect('data/companies?page=loc');

        }
    }

    function add_details(){

        if($this->input->post('action') == 'add_company_data'){
            $this->form_validation->set_rules('detail', 'detail', 'required');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                // $data['comp_name'] = $this->input->post('companyname');
                $data['add_by'] =$_SESSION['name'];
                $data['comp_id']=$this->input->post('compid');
                $data['date']=$this->input->post('date');
                //  $data['month_year']=$this->input->post('');
                $data['details']=$this->input->post('detail');
                $data['timesheet_no']=$this->input->post('trip');
                $data['trip_m3_hour']=$this->input->post('timesheet');
                $data['rate']=$this->input->post('rate');
                $data['totalamount']=$this->input->post('totamount');

                $this->db->insert('comp_record',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=1');
                echo "madina";
            }
        }
        if($this->input->post('action') == 'add_diesel_data'){
            $this->form_validation->set_rules('detail', 'detail', 'required');
            $this->form_validation->set_rules('shoown', 'Shovel owner', 'required');


            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
            else{
                // $data['comp_name'] = $this->input->post('companyname');
                $data['add_by'] =$_SESSION['name'];
               // $data['comp_id']=$this->input->post('compid');
                $data['date']=$this->input->post('date');
                //  $data['month_year']=$this->input->post('');
                $data['details']=$this->input->post('detail');
                $data['invoice_no']=$this->input->post('invo');
                $data['gallon']=$this->input->post('gallon');
                $data['rate']=$this->input->post('rate');
                $data['total_amount']=$this->input->post('totamount');
                $data['shovel_owner_id']=$this->input->post('shoown');

                $this->db->insert('diesel_invoice',$data);
                // $id =  urlencode(base64_encode($this->db->insert_id()));
                redirect('data/companies?page=diesel');
                echo "madina";
            }
        }
        else{
            echo "baghe madina";

        }
    }
    function view_companydata($id){
        $this->db->select('*');
        $this->db->from('comp_record');
        $this->db->where('comp_id',$id);
        return $this->db->get()->result_array();
    }

}