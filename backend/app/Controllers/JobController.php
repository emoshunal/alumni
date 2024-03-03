<?php

namespace App\Controllers;

use App\Models\JobModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class JobController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $job = new JobModel();
        return $this->respond($job->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = [
            'title' => 'required',
            'description' =>'required|min_length[5]',
            'company' =>'required',
            'location' =>'required',
        ];

        if($this->validate($rules)){
            $job = new JobModel();
            $data = [
                'title' =>$this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'company' => $this->request->getVar('company'),
                'location' => $this->request->getVar('location'),
                'verified' => false,
                'posted_by' => 'Admin Default'
            ];
            $job->save($data);

            return $this->respondCreated($data, 200);
        }else{
            return $this->fail($this->validator->getErrors());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
