<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model(array('Grafik_model', 'Mixing_model', 'HPProduksi_model', 'BProduksi_model', 'StokProduksi_model' ));


        //check authentication
        $this->auth();
    }

    public function index()
        
    {
        $data['models'] = $this->Grafik_model->get_all();
        // $data['ampas_sa'] = $this->Grafik_model->get_by_ampas_sa();
        // $data['ampas_sk'] = $this->Grafik_model->get_by_ampas_sk();
        // $data['gelondongan_sa'] = $this->Grafik_model->get_by_gelondongan_sa();
        // $data['gelondongan_sk'] = $this->Grafik_model->get_by_gelondongan_sk();
        // $data['karton_sa'] = $this->Grafik_model->get_by_karton_sa();
        // $data['karton_sk'] = $this->Grafik_model->get_by_karton_sk();
        // $data['karton_sa']['karton_sk'] = $this->Grafik_model->get_by_karton();
        //load template and view page
        $data['mixing'] = $this->Mixing_model->get_by_target_total();
        $data['formula1'] = $this->HPProduksi_model->get_by_formula1();
        $data['formula2'] = $this->HPProduksi_model->get_by_formula2();
        $data['biaya_produksi'] = $this->BProduksi_model->get_by_target_total();
        $data['stok_produksi'] = $this->StokProduksi_model->get_by_target_total();
         
        $this->template->set_navbar('templates/navbar');
        $this->template->load('main', 'Grafik/index', $data);
    }
    
    public function viewada()
    {
        //load template and view page
        $this->template->set_navbar('templates/navbar');
    }

    private function auth()
    {
        if($this->session->userdata('is_logged_in'))
        {
            return TRUE;
        } else {
            redirect('user');
        }
    }

}


