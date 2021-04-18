<?php

namespace App\Controllers;

use App\Models\SptbModel;

class ProjectController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Projects List';
        return view('projects/index', $data);
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
