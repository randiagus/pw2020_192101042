<?php
    class About extends Controller{
        public function index($nama = 'Fajar', $pekerjaan = 'Dosen') {
            $data['nama'] = $nama;
            $data['pekerjaan'] = $pekerjaan;
            $this->view('about/index');
        }

        public function page() {
            $this->view('about/page');
        }
    }
?>

//baru sampai halaman 15 bagian pertemuan 8 bagian 2