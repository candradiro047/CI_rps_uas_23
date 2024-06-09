<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rps_model');
    }

    public function index()
    {
        $data['title'] = 'Halaman RPS';
        $data['rps'] = $this->rps_model->get_data('tbl_mhs')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('rps', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah RPS';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_rps');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_matkul' => $this->input->post('nama_matkul'),
                'kode' => $this->input->post('kode'),
                'sks' => $this->input->post('sks'),
            );

            $this->rps_model->insert_data($data, 'tbl_mhs');
            $this->session->set_flashdata('pesan', '<div 
            class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>RPS Berhasil di Tambahkan!</strong> Silahkan Cek Dibawah !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('rps');
        }
    }

    public function edit($id_rps)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_rps' => $id_rps,
                'nama_matkul' => $this->input->post('nama_matkul'),
                'kode' => $this->input->post('kode'),
                'sks' => $this->input->post('sks'),
            );
            $this->rps_model->UPDATE_data($data, 'tbl_mhs');
            $this->session->set_flashdata('pesan', '<div 
            class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>RPS Berhasil di Edit</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('rps');
        }
    }

    public function print()
    {
        $data['rps'] = $this->rps_model->get_data('tbl_mhs')->result();
        $this->load->view('print_rps', $data);

    }

    public function pdf()
    {
        $this->load->libraries("dompdf_gen.php");

        $data['rps'] = $this->rps_model->get_data('tbl_mhs')->result();
        $this->load->view('cetak_rps', '$data');

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->dompdf->set_paper($paper_size, $orientation);
        
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('cetak_rps.pdf', array('Attachment' =>0));
    }







    public function _rules()
    {
        $this->form_validation->set_rules('nama_matkul', 'Nama Matkul', 'required', array(
            'required' => '%s Wajib di isi !'
        ));

        $this->form_validation->set_rules('kode', 'Kode', 'required', array(
            'required' => '%s Wajib di isi !'
        ));

        $this->form_validation->set_rules('sks', 'Sks', 'required', array(
            'required' => '%s Wajib di isi !'
        ));
    }

    public function delete($id)
    {
        $where = array('id_rps' => $id);

        $this->rps_model->DELETE($where, 'tbl_mhs');
        $this->session->set_flashdata('pesan', '<div 
            class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>RPS Berhasil di Hapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
        redirect('rps');
    }

}

/* End of file Rps.php */
/* Location: ./application/controllers/Rps.php */
?>
