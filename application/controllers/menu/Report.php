<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Model
        $this->load->model('ReportModels');

        // Pembatas Hak Akses
        is_logged_in();
    }

    public function index()
    {
        if (isset($_GET['filter']) && !empty($this->input->get('filter'))) { // Cek apakah User telah memilih Filter & Klik Tombol Tampilkan
            $filter = $this->input->get('filter'); // Ambil Data Filter yang dipilih oleh User

            if ($filter == '1') { // Jika Filter-nya berdasarkan Tanggal
                $date = $this->input->get('tanggal');

                $keterangan = 'Laporan Transaksi Tanggal ' . date('d-m-y', strtotime($date));
                $url_cetak = 'menu/report/report_pdf?filter=1&tanggal=' . $date;
                $transaksi = $this->ReportModels->view_by_date($date); // Panggil Fungsi view_by_date dari Model
            } else if ($filter == '2') { // Jika Filter-nya berdasarkan Bulan & Tahun
                $month = $this->input->get('bulan');
                $year = $this->input->get('tahun');
                $name_month = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $keterangan = 'Laporan Transaksi Bulan ' . $name_month[$month] . ' ' . $year;
                $url_cetak = 'menu/report/report_pdf?filter=2&bulan=' . $month . '&tahun=' . $year;
                $transaksi = $this->ReportModels->view_by_month($month, $year); // Panggil Fungsi view_by_month dari Model
            } else { // Jika Filter-nya berdasarkan Tahun
                $year = $this->input->get('tahun');

                $keterangan = 'Laporan Transaksi Tahun ' . $year;
                $url_cetak = 'menu/report/report_pdf?filter=3&tahun=' . $year;
                $transaksi = $this->ReportModels->view_by_year($year); // Panggil Fungsi view_by_year dari Model
            }
        } else { // Jika User tidak memilih Filter & Klik Tombol Tampilkan
            $keterangan = 'Laporan Transaksi';
            $url_cetak = 'menu/report/report_pdf';
            $transaksi = $this->ReportModels->view_all(); // Panggil Fungsi view_all dari Model
        }

        $data['title'] = 'Generate Laporan';
        $data['keterangan'] = $keterangan;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;
        $data['option_year'] = $this->ReportModels->option_year();
        $this->load->view('menu/report/v_report', $data);
    }

    public function report_pdf()
    {
        if (isset($_GET['filter']) && !empty($this->input->get('filter'))) { // Cek apakah User telah memilih Filter & Klik Tombol Tampilkan
            $filter = $this->input->get('filter'); // Ambil Data Filter yang dipilih oleh User

            if ($filter == '1') { // Jika Filter-nya berdasarkan Tanggal
                $date = $this->input->get('tanggal');

                $keterangan = 'Laporan Transaksi Tanggal ' . date('d-m-y', strtotime($date));
                $transaksi = $this->ReportModels->view_by_date($date); // Panggil Fungsi view_by_date dari Model
            } else if ($filter == '2') { // If Filter by Month & Year
                $month = $this->input->get('bulan');
                $year = $this->input->get('tahun');
                $name_month = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $keterangan = 'Laporan Transaksi Bulan ' . $name_month[$month] . ' ' . $year;
                $transaksi = $this->ReportModels->view_by_month($month, $year); // Call the Model view_by_month Function
            } else { // If Filter by Year
                $year = $this->input->get('tahun');

                $keterangan = 'Laporan Transaksi Tahun ' . $year;
                $transaksi = $this->ReportModels->view_by_year($year); // Call the Model View_by_year Function
            }
        } else { // If the User does not select Filter & Click the Show button
            $keterangan = 'Laporan Transaksi';
            $transaksi = $this->ReportModels->view_all(); // Call the Model View_all Function
        }

        $data['keterangan'] = $keterangan;
        $data['transaksi'] = $transaksi;

        $html = $this->load->view('menu/report/v_pdf', $data, true);
        $filename = 'Laporan SPP - ' . time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape'); // Generate SPP Report in PDF Format
    }
}

/* End of file report.php */
/* Location: ./application/controllers/menu/report.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/