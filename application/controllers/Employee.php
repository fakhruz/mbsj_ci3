<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->library('encryption');
        $this->load->library("pagination");
    }

    function index(){
        $this->load->model('m_employee');

        $config["base_url"] = site_url('employee/index');
        $config["total_rows"] = $this->m_employee->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;

        /* This Application Must Be Used With BootStrap 3 *  */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $where = ["id <>" => 0];

        $data['employee'] = $this->m_employee->get($config["per_page"], $page, $where);

        $data["links"] = $this->pagination->create_links();
        $datav['content']=$this->load->view("employee/index.php", $data, true);

        $this->load->view('template/template1',$datav);
//        $this->benchmark->mark('ayam');

//        echo $this->benchmark->elapsed_time('monyet', 'ayam');
    }

    function test_email(){
        $dt = array(
            array(
                "from" => "fakhruz.amtis@gmail.com",
                "from_name" => "webmaster",
                "to" => "fakhruz85@gmail.com",
                "subject" =>"hang pasai pa",
                "message" => "test email ja, xda pa2 pun"
            )
        );


        $r=$this->func->sendMail($dt);
    }
}