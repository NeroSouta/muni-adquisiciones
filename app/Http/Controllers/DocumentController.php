<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createdocument');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText($request->get('name'));
        $text = $section->addText($request->get('email'));
        $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
       
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('Appdividend.docx'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     public function generateDocx()
    {
        $templateWord = new TemplateProcessor(storage_path('Template.docx'));
        $name = 'Fabián';
        $date = '20/10/20';
        $street = 'Yungay 379';
        $city = 'Arica';

        $templateWord->setValue('name', $name);
        $templateWord->setValue('date', $date);
        $templateWord->setValue('street', $street);
        $templateWord->setValue('city', $city);

        $templateWord->saveAs('DocumentoNuevo.docx');

        header("Content-disposition: attachment;filename=DocumentoNuevo.docx; charset=iso-8859-1");
        echo file_get_contents('DocumentoNuevo.docx');

    
    }

    public function generar()
    {
        $templateProcessor = new TemplateProcessor(storage_path('Sample_07_TemplateCloneRow.docx'));
        // Variables on different parts of document
        $templateProcessor->setValue('weekday', date('l'));            // On section/content
        $templateProcessor->setValue('time', date('H:i'));             // On footer
        $templateProcessor->setValue('serverName', realpath(__DIR__)); // On header
        // Simple table
        $templateProcessor->cloneRow('rowValue', 10);
        $templateProcessor->setValue('rowValue#1', 'Sun');
        $templateProcessor->setValue('rowValue#2', 'Mercury');
        $templateProcessor->setValue('rowValue#3', 'Venus');
        $templateProcessor->setValue('rowValue#4', 'Earth');
        $templateProcessor->setValue('rowValue#5', 'Mars');
        $templateProcessor->setValue('rowValue#6', 'Jupiter');
        $templateProcessor->setValue('rowValue#7', 'Saturn');
        $templateProcessor->setValue('rowValue#8', 'Uranus');
        $templateProcessor->setValue('rowValue#9', 'Neptun');
        $templateProcessor->setValue('rowValue#10', 'Pluto');
        $templateProcessor->setValue('rowNumber#1', '1');
        $templateProcessor->setValue('rowNumber#2', '2');
        $templateProcessor->setValue('rowNumber#3', '3');
        $templateProcessor->setValue('rowNumber#4', '4');
        $templateProcessor->setValue('rowNumber#5', '5');
        $templateProcessor->setValue('rowNumber#6', '6');
        $templateProcessor->setValue('rowNumber#7', '7');
        $templateProcessor->setValue('rowNumber#8', '8');
        $templateProcessor->setValue('rowNumber#9', '9');
        $templateProcessor->setValue('rowNumber#10', '10');
        // Table with a spanned cell
        $values = array(
            array(
                'userId'        => 1,
                'userFirstName' => 'James',
                'userName'      => 'Taylor',
                'userPhone'     => '+1 428 889 773',
            ),
            array(
                'userId'        => 2,
                'userFirstName' => 'Robert',
                'userName'      => 'Bell',
                'userPhone'     => '+1 428 889 774',
            ),
            array(
                'userId'        => 3,
                'userFirstName' => 'Michael',
                'userName'      => 'Ray',
                'userPhone'     => '+1 428 889 775',
            ),
        );
        $templateProcessor->cloneRowAndSetValues('userId', $values);
        //this is equivalent to cloning and settings values with cloneRowAndSetValues
        // $templateProcessor->cloneRow('userId', 3);
        // $templateProcessor->setValue('userId#1', '1');
        // $templateProcessor->setValue('userFirstName#1', 'James');
        // $templateProcessor->setValue('userName#1', 'Taylor');
        // $templateProcessor->setValue('userPhone#1', '+1 428 889 773');
        // $templateProcessor->setValue('userId#2', '2');
        // $templateProcessor->setValue('userFirstName#2', 'Robert');
        // $templateProcessor->setValue('userName#2', 'Bell');
        // $templateProcessor->setValue('userPhone#2', '+1 428 889 774');
        // $templateProcessor->setValue('userId#3', '3');
        // $templateProcessor->setValue('userFirstName#3', 'Michael');
        // $templateProcessor->setValue('userName#3', 'Ray');
        // $templateProcessor->setValue('userPhone#3', '+1 428 889 775');
        $templateProcessor->saveAs('NuevoDocumento.docx');
        header("Content-disposition: attachment;filename=NuevoDocumento.docx; charset=iso-8859-1");
        echo file_get_contents('NuevoDocumento.docx');
    }

    public function generarplantilla()
    {
        $templateWord = new TemplateProcessor(storage_path('plantilla.docx'));
        // Variables on different parts of document

        $numeroDecreto = '1234';
        $fecha = '20/10/20';
        $DireccionSolicita = 'Dirección de Administración y Finanzas';
        $NombreL = 'SUMINISTRO DE MANTECIÓN Y REPARACION PARQUE VEHICULAR IMA';
        $CodigoL = '2585-159-LE18';



        $templateWord->setValue('numeroDecreto', $numeroDecreto);
        $templateWord->setValue('fecha', $fecha);
        $templateWord->setValue('DireccionSolicita', $DireccionSolicita);
        $templateWord->setValue('CodigoL', $CodigoL);
        $templateWord->setValue('NombreL', $NombreL);

        $values = array(
            array(
                'rowValue'        => 1,
                'CodigoServicio' => '81101605',
                'nombreServicio'      => 'Servicio de Mantención y Reparación de los Vehículos según Formulario Nº___ "Oferta Económica".',
            ),
            array(
                'rowValue'        => 2,
                'CodigoServicio' => '8110113',
                'nombreServicio'      => 'Servicio de herreros de Azeroth',
            ),
            array(
                'rowValue'        => 3,
                'CodigoServicio' => '81101604',
                'nombreServicio'      => 'Servicio de fabricación y mantención de sables de luz',
            ),
        );
        $templateWord->cloneRowAndSetValues('rowValue', $values);
    
        $templateWord->saveAs('plantillanueva.docx');
        header("Content-disposition: attachment;filename=plantillanueva.docx; charset=iso-8859-1");
        echo file_get_contents('plantillanueva.docx');
    }
    
}
