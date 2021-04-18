<?php

namespace App\Controllers;

use App\Models\SptbModel;

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

    /**
     * Show the form for creating project resource.
     */
    public function new()
    {
        $data['title'] = 'Tambah Proyek';

        return view('projects/new', $data);
    }

    /**
     * Store a newly created project in storage.
     */
    public function create()
    {
        if (! $this->validate($this->projectValidation())) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('message', lang('Message.error.project_create'));
            session()->setFlashData('errors', $this->validator->getErrors());

            return redirect()->back()->withInput();
        }

        $model = new SptbModel();

        $data = $this->projectInputData();

        if (! $model->save($data)) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('message', lang('Message.error.project_create'));

            return redirect()->back()->withInput();
        }

        session()->setFlashData('status', 'success');
        session()->setFlashData('message', lang('Message.success.project_create'));

        return redirect()->to('/');
    }

    /**
     * Show the form for creating project resource.
     */
    public function edit(int $id)
    {
        $model   = new SptbModel();
        $project = $model->find($id);
        if (! $project) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('message', lang('Message.error.project_not_found'));

            return redirect()->to('/');
        }

        $data['title']   = "Ubah Proyek $id";
        $data['project'] = $project;

        return view('projects/edit', $data);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(int $id)
    {
        if (! $this->validate($this->projectValidation())) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('message', lang('Message.error.project_update'));
            session()->setFlashData('errors', $this->validator->getErrors());

            return redirect()->back()->withInput();
        }

        $model = new SptbModel();

        $data = $this->projectInputData();

        $data['id'] = $id;
        if (! $model->save($data)) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('message', lang('Message.error.project_update'));

            return redirect()->back()->withInput();
        }

        session()->setFlashData('status', 'success');
        session()->setFlashData('message', lang('Message.success.project_update'));

        return redirect()->to('/');
    }

    /**
     * Remove the specified project from storage.
     */
    public function delete(int $id)
    {
        $model = new SptbModel();
        if (! $model->delete($id)) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('message', lang('Message.error.project_delete'));

            return redirect()->to('/');
        }

        session()->setFlashData('status', 'success');
        session()->setFlashData('message', lang('Message.success.project_delete'));

        return redirect()->to('/');
    }

    /**
     * Get the validation rules that apply to project resource.
     *
     * @return array
     */
    protected function projectValidation()
    {
        return [
            'departure_date' => 'required',
            'customer'       => 'required',
            'project'        => 'required',
            'type'           => 'required',
            'status'         => 'required|in_list[Backlog / TODO,On Progress,Done]',
        ];
    }

    /**
     * Get the input data of the project resource.
     *
     * @return array
     */
    public function projectInputData()
    {
        return [
            'departure_date' => $this->request->getPost('departure_date'),
            'customer'       => $this->request->getPost('customer'),
            'project'        => $this->request->getPost('project'),
            'type'           => $this->request->getPost('type'),
            'status'         => $this->request->getPost('status'),
        ];
    }
}
