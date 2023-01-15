<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_not_login();
        
        
        $this->load->model(['Laporan_model', 'Data_siswa_model', 'Data_kelas_model', 'Data_petugas_model', 'Pembayaran_spp_model']);
    }

    public function index()
    {
        $data['data_pembayaran'] = $this->Laporan_model->tampil();
        $this->load->view('templates/header1');
        $this->load->view('laporan/index',$data);
        $this->load->view('templates/footer');
    }

    public function tampil_data()
    {
        
        $data['kelas'] = $this->Laporan_model->tampil_id();
        $this->load->view('templates/header1');
        $this->load->view('laporan/tampil',$data);
        $this->load->view('templates/footer');
    }

    public function laporan_kelas()
    {
        
        $data['data_pembayaran'] = $this->Laporan_model->tampil_kelas();
        $this->load->view('templates/header1');
        $this->load->view('laporan/index',$data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_siswa()
{
  
    $data['laporan'] = $this->Laporan_model->Laporan_admin();
    $data['grand_total'] = $this->Laporan_model->grand_total();
    
    $this->load->view('laporan/cetak_laporan_siswa',$data); 
  
}

public function ubah()
    {
        $id=$this->fungsi->user_login1()->id_siswa;
        $data['judul'] = "siswa";
        $data['siswa'] = $this->Data_siswa_model->tampil();
        $data_siswa = $this->Data_siswa_model->get_id($id);
        $data['ubah_siswa'] = $this->Data_siswa_model->get_id($id);

        $this->form_validation->set_rules('nis', 'nis', 'required|trim');
        
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        
        $this->form_validation->set_rules(
            'username',
            'username',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'min_length[5]|matches[pass2]',
            [
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]
        );
        
        

        if ($this->form_validation->run() == FALSE) {
            if ($data_siswa > 0) {
                $data['ubah_siswa'] = $this->Data_siswa_model->get_id($id);
                $this->load->view('templates/header1', $data);
                $this->load->view('laporan/ubah', $data);
                $this->load->view('templates/footer');
            } else {
                $pesan = "Data tidak ditemukan";
                $url = base_url('home1');
                echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
            }
        } else {
            $this->Data_siswa_model->ubah1();
            $pesan = "Data berhasil diupdate";
            $url = base_url('home1');
            echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }
// public function tampil()
//     {
//         $kelas = $this->input->post('kelas');
//         $result = $this->Laporan_model->nomor();
//         if (empty($result[0]['invoice_spp'])) {
//             $no = "INV-" . "000001";
//         } else {
//             $tgl = "INV-";
//             $urut = $result[0]['invoice_spp'];
//             $no1 = substr($urut, 4, 6);
//             $hsl = ((int) $no1) + 1;
//             $hsl1 = sprintf('%06s', $hsl); ///buat jadi 000005
//             $no = $tgl . $hsl1;
//         }
//         $data['siswa'] = $this->Laporan_model->tampil_siswa($kelas);
//         $data['tampil'] = $this->Data_siswa_model->tampil_data();
//         $this->form_validation->set_rules('total', 'Grand Total', 'required');
//         if ($this->form_validation->run() == FALSE) {
//             $this->load->view('templates/header', $data); //panggil data judul untuk di header
//             $this->load->view('laporan/tampil', $data);    //menampilkan data semua santri di halaman index yg ada di view dgn cara panggil $data
//             $this->load->view('templates/footer');
//         } else {
//             $this->Laporan_model->simpan($no);
//             $pesan = "Pembayaran SPP Berhasil";
//             $url = site_url('laporan');
//             echo "<script>
//     				alert('$pesan');
//     				location= '$url';
//     			  </script>";
//         }
//     }

//     public function hapus()
//     {
//         $id = $this->input->post('id');
//         $this->Laporan_model->hapus($id);
//         $pesan = "Data berhasil dihapus";
//         $url = site_url('laporan/data_pembayaran');
//         echo "<script>
// 					alert('$pesan');
// 					location= '$url';
// 				  </script>";
//     }
  

    // public function ubah($id)
    // {
    //     $data['jenis'] = $this->Jenis_model->tampil_spp();
    //     $data['siswa'] = $this->Siswa_model->tampil_data();

    //     $pemasukan = $this->Laporan_model->get_id($id);

    //     $this->form_validation->set_rules('invoice', 'Invoice', 'required');
    //     $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
    //     $this->form_validation->set_rules('total', 'Total', 'required|numeric');
    //     $this->form_validation->set_rules('jenis', 'Jenis Pemasukan', 'required');
    //     $this->form_validation->set_rules('siswa', 'Siswa', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         if ($pemasukan > 0) {
    //             $data['ubah_pemasukan'] = $pemasukan;
    //             $this->load->view('template/header', $data); //panggil data judul untuk di header
    //             $this->load->view('pembayaran/ubah', $data);    //menampilkan data semua santri di halaman index yg ada di view dgn cara panggil $data
    //             $this->load->view('template/footer');
    //         } else {
    //             $pesan = "Data tidak ditemukan";
    //             $url = base_url('pembayaran_spp');
    //             echo "<script>
    //                 alert('$pesan');
    //                 location='$url';
    //             </script>";
    //         }
    //     } else {
    //         $this->Pembayaran_spp_model->ubah();
    //         $this->Pembayaran_spp_model->ubah_kas();
    //         $this->Pembayaran_spp_model->ubah_pendapatan();
    //         $pesan = "Data berhasil diupdate";
    //         $url = site_url('pembayaran_spp');
    //         echo "<script>
    // 				alert('$pesan');
    // 				location= '$url';
    // 			  </script>";
    //     }
    // }
}
