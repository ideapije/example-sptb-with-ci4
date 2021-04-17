<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class ProjectController extends BaseController
{
    protected $phpWord;

    public function __construct()
    {
        $this->phpWord = new \PhpOffice\PhpWord\PhpWord();   
    }

	public function index()
	{	
		$data['title'] = 'Projects List';
		return view('projects/index', $data);
	}

    public function exportToDocs()
    {
        // Adding an empty Section to the document...
        $section = $this->phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        /*
        * Note: it's possible to customize font style of the Text element you add in three ways:
        * - inline;
        * - using named font style (new font style object will be implicitly created);
        * - using explicitly created font style object.
        */

        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $this->phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $filename = 'simple';
		
        $this->response->setHeader('Content-Type', 'application/msword')
        ->setHeader('Content-Disposition', 'attachment;filename="'. $filename .'.docx"')
        ->setHeader('Cache-Control', 'max-age=0');
        
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->phpWord, 'Word2007');
        $objWriter->save('php://output');
    }


}
