<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataAlumni extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->uri->uri_string() !== 'login' && !$this->session->userdata('users_logged_in')) {
            $this->session->set_flashdata('error', 'Access denied. You need to login first!');
            redirect('user/login');
        };
        $this->load->model('Dataalumni_m', 'data_alumni');
    }
    public function index()
    {

        $data['content']     = 'webview/dataalumni/dataalumni_view';
        $data['content_js'] = 'webview/dataalumni/dataalumni_js';
        $this->load->view('_parts/wrapper', $data);
    }

    public function ExportPDF()
    {
        // Get filter values from the URL query string
        $sekolah = $this->input->get('sekolah');
        $tahun_kelulusan = $this->input->get('tahun');
        $status = $this->input->get('status');

        // Log filter values for debugging
        log_message('debug', 'Sekolah: ' . $sekolah);
        log_message('debug', 'Tahun Kelulusan: ' . $tahun_kelulusan);
        log_message('debug', 'Status: ' . $status);

        // Pass filters to the model method
        $list = $this->data_alumni->exportpdf($sekolah, $tahun_kelulusan, $status);

        $data['list'] = $list;

        $this->load->library('pdfgenerator');
        $this->pdfgenerator->generate($this->load->view('export/pdf_data_alumni', $data, true), 'laporan_data_alumni', 'A4', 'portrait');
    }

    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "DATA ALUMNI CTARSA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NAMA ALUMNI"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "SEKOLAH"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "TAHUN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F3', "INSTANSI"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $sekolah = $this->input->get('sekolah');
        $tahun_kelulusan = $this->input->get('tahun');
        $status = $this->input->get('status');

        // Log filter values for debugging
        log_message('debug', 'Sekolah: ' . $sekolah);
        log_message('debug', 'Tahun Kelulusan: ' . $tahun_kelulusan);
        log_message('debug', 'Status: ' . $status);

        // Pass filters to the model method
        $list = $this->data_alumni->exportpdf($sekolah, $tahun_kelulusan, $status);

        $data['list'] = $list;
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($list as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->name);
            $sheet->setCellValue('C' . $numrow, $data->school_name);
            $sheet->setCellValue('D' . $numrow, $data->year_graduate);
            $sheet->setCellValue('E' . $numrow, $data->student_status);
            $sheet->setCellValue('F' . $numrow, $data->institute);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(40); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(10); // Set width kolom E
        $sheet->getColumnDimension('F')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Data Alumni CTARSA");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }


    public function ajax_list()
    {
        $sekolah = $this->input->post('sekolah');
        $tahun_kelulusan = $this->input->post('tahun_kelulusan');
        $status = $this->input->post('status');

        // Log filter values for debugging
        log_message('debug', 'Sekolah: ' . $sekolah);
        log_message('debug', 'Tahun Kelulusan: ' . $tahun_kelulusan);
        log_message('debug', 'Status: ' . $status);

        // Pass filters to the model method
        $list = $this->data_alumni->get_datatables($sekolah, $tahun_kelulusan, $status);
        $data = array();
        $crs = "";
        $no = $_POST['start'];


        foreach ($list as $cat) {


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $cat->name;
            $row[] = $cat->school_name;
            $row[] = $cat->year_graduate;
            $row[] = $cat->student_status;
            $row[] = $cat->institute;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->data_alumni->count_all(),
            "recordsFiltered" => $this->data_alumni->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    // public function save()
    // {
    //     $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    //     $this->poling->save(
    //         array(

    //             'created'           => $date->format('Y-m-d H:i:s'),
    //             'id_capres'      => $this->input->post('capres'),
    //             'id_cawapres'      => $this->input->post('cawapres'),
    //         ),
    //         array('id' => $this->input->post('id_add'))
    //     );
    //     echo json_encode(array("status" => TRUE));
    // }
}
