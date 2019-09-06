<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class ReadExcel_model extends CI_Model
    {
        public function parse_file($file) {
            // $inputFileType = 'Xls';
            // $inputFileName = $file;
            //    $inputFileType = 'Xlsx';
            //    $inputFileType = 'Xml';
            //    $inputFileType = 'Ods';
            //    $inputFileType = 'Slk';
            //    $inputFileType = 'Gnumeric';
            //    $inputFileType = 'Csv';

            // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

               $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xml();
            //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
            //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Slk();
            //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Gnumeric();
            //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            
            /**  Create a new Reader of the type defined in $inputFileType  **/
            // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            /**  Advise the Reader that we only want to load cell data  **/
            // $reader->setReadDataOnly(true);
            /**  Load $inputFileName to a Spreadsheet Object  **/
            $spreadsheet = $reader->load($file);

            return $spreadsheet;
        }
    }
    