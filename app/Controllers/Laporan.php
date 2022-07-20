<?php

namespace App\Controllers;

require "../vendor/autoload.php";

use Dompdf\Dompdf;

use App\Models\DataModel;
use App\Models\MedicineModel;
use App\Models\PersediaanModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Config\Services;
use CodeIgniter\Database\Config;
use CodeIgniter\Validation\StrictRules\Rules;

class Laporan extends BaseController
{
    protected $medicineModel;
    protected $dataModel;
    protected $persediaanModel;
    public function __construct()
    {
        $this->medicineModel = new MedicineModel();
        $this->dataModel = new DataModel();
        $this->persediaanModel = new PersediaanModel();
    }
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }
        $medicine = $this->medicineModel->getDaftarObat();
        // dd($medicine);
        $category = $this->medicineModel->getKategori();
        $type = $this->medicineModel->getType();
        // $countMed = $this->medicineModel->getCountMed();
        $countMed = $this->medicineModel->getCountDaftarObat();
        $countCategory = $this->medicineModel->getCountCategory();
        $countType = $this->medicineModel->getCountType();

        $data = [
            'title' => 'REKAP DATA OBAT',
            'medicine' => $medicine,
            'category' => $category,
            'type' => $type,
            'countmed' => $countMed,
            'countcategory' => $countCategory,
            'counttype' => $countType
        ];
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();


        // load HTML content
        // $dompdf->loadHtml(view('masterdata/daftarObat', $data));
        $dompdf->loadHtml(view('laporan/laporan', $data));
        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
