<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class c_excel extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->model('fetch_data');
        $this->load->model('post_data');
        $this->load->model('sign_in');
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('upload/sample');
        $this->load->view('common/footer');
    }
    public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            // $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            $data['text1'] = $this->upload->display_errors();
            $this->load->view('common/header');
            $this->load->view('nav/top_nav');
            $this->load->view('exit/fail', $data);
            $this->load->view('common/footer');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();
            $passwordDef = "8c9a62171b4cb7af53484cefadf0590329e7c577";
            $accessLevel = 1;
            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'NIM' => $row['A'],
                        'KodeMagang'      => $row['B'],
                        'NamaMahasiswa'      => $row['C'],
                        'Jurusan'      => $row['D'],
                        'Angkatan'      => $row['E'],
                        'Status'      => $row['F'],
                        'password'      =>  $passwordDef,
                        'access_level'      => $accessLevel,
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('data_mahasiswa', $data);
            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            // $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            // redirect('import/');
            $data['text1'] = "Penginputan Data Berhasil";
            $this->load->view('common/header');
            $this->load->view('nav/top_nav');
            $this->load->view('exit/success', $data);
            $this->load->view('common/footer');
        }
    }
    public function export()
    {
        $codeJurusan = $this->uri->segment(2);
        $jurusan = null;
        if ($codeJurusan == 'ma') {
            $jurusan = 'Manajemen';
        } else if ($codeJurusan == 'ak') {
            $jurusan = 'Akuntansi';
        } else if ($codeJurusan == 'ti') {
            $jurusan = 'Teknik Informatika';
        } else if ($codeJurusan == 'si') {
            $jurusan = 'Sistem Informasi';
        } else if ($codeJurusan == 'bi') {
            $jurusan = 'Administrasi Bisnis';
        } else if ($codeJurusan == 'ik') {
            $jurusan = 'Ilmu Komunikasi';
        } else {
            $jurusan = null;
        }
        $siswa = $this->fetch_data->get_mhs_by('Jurusan', $jurusan)->result();
        // Load plugin PHPExcel nya    
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        // Panggil class PHPExcel nya    
        $excel = new PHPExcel();
        // Settingan awal fil excel    
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data Siswa")
            ->setSubject("Siswa")
            ->setDescription("Laporan Semua Data Siswa")
            ->setKeywords("Data Siswa");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel    
        $style_col = array(
            'font' => array('bold' => true),
            // Set font nya jadi bold      
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                // Set text jadi ditengah secara horizontal (center)        
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                // Set text jadi di tengah secara vertical (middle)      
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                // Set border top dengan garis tipis        
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                // Set border right dengan garis tipis        
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                // Set border bottom dengan garis tipis       
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
                // Set border left dengan garis tipis      
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel    
        $style_row = array('alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            // Set text jadi di tengah secara vertical (middle)      
        ),      'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            // Set border top dengan garis tipis        
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            // Set border right dengan garis tipis        
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            // Set border bottom dengan garis tipis        
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
            // Set border left dengan garis tipis      
        ));
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA");
        // Set kolom A1 dengan tulisan "DATA SISWA" 
        $excel->getActiveSheet()->mergeCells('A1:E1');
        // Set Merge Cell pada kolom A1 sampai E1    
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        // Set bold kolom A1   
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        // Set font size 15 untuk kolom A1   
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // Set text center untuk kolom A1    
        // Buat header tabel nya pada baris ke 3    
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
        // Set kolom A3 dengan tulisan "NO"    
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS");
        // Set kolom B3 dengan tulisan "NIS"   
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA");
        // Set kolom C3 dengan tulisan "NAMA" 
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN");
        // Set kolom D3 dengan tulisan "JENIS KELAMIN"  
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT");
        // Set kolom E3 dengan tulisan "ALAMAT"  
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header  
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $siswa = $this->fetch_data->fetch_list_mhs_export();
        $no = 1;
        // Untuk penomoran tabel, di awal set dengan 1   
        $numrow = 4;
        // Set baris pertama untuk isi tabel adalah baris ke 4    
        foreach ($siswa as $data) {
            // Lakukan looping pada variabel siswa      
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->NIM);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->NamaMahasiswa);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->Angkatan);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->Jurusan);
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)      
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $no++;
            // Tambah 1 setiap kali looping 
            $numrow++;
            // Tambah 1 setiap kali looping    
        }
        // Set width kolom    
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        // Set width kolom A    
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        // Set width kolom B    
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        // Set width kolom C    
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        // Set width kolom D    
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        // Set width kolom E       
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)  
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE   
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya    
        $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
        $excel->setActiveSheetIndex(0);
        // Proses file excel    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Siswa.xlsx"');
        // Set nama file excel nya    
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
