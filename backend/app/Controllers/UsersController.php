<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UsersController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
 
        $users = new UserModel();
        return $this->respond($users->findAll());
     
    }
     /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */

    public function alumniList(){
        $users = new UserModel();
        return $this->respond($users->alumniListModel());

    }
    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {  
        $model = new UserModel();
        $data = [
            'message' => 'success',
            'userId' => $model->find($id)
        ];
      
        if($data['userId'] == null){
            return $this->failNotFound('Data not exist', 404);
        }

        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $rules = [
            'email' => 'required|valid_email|is_unique[user.email]',
            'name' => 'required',
            'course' => 'required',
            'batch' => 'required',
            'email' => 'required',
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'role' => $this->request->getVar('role'),
                'employment' => $this->request->getVar('employment'),
                'course' => $this->request->getVar('course'),
                'batch' => $this->request->getVar('batch'),
                'email' => $this->request->getVar('email'),
                'status' => 'Active',
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);

            return $this->respond(['message' => 'Successfully Created']);
        }else{
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs',
            ];
            return $this->respond($response , 409);
           
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = [
            'name' => 'required',
            'course' => 'required',
            'employment' => 'required',
            'batch' => 'required',
            'email' => 'required',
            'password' => 'required|min_length[5]',
            'confirm_password' => 'required|min_length[5]'
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'role' => 'Alumni',
                'employment' => $this->request->getVar('employment'),
                'course' => $this->request->getVar('course'),
                'batch' => $this->request->getVar('batch'),
                'email' => $this->request->getVar('email'),
                'status' => 'Unverified',
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);

            return $this->respond(['message' => 'Successfully Registered']);
        }else{
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response , 409);
           
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
        $rules = [
            
            'name' => 'required',
            'course' => 'required',
            'batch' => 'required',
            'email' => 'required|valid_email|',
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'role' => $this->request->getVar('role'),
                'employment' => $this->request->getVar('employment'),
                'course' => $this->request->getVar('course'),
                'batch' => $this->request->getVar('batch'),
                'email' => $this->request->getVar('email'),
                'status' => 'Active',
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->update($id,$data);

            return $this->respond(['message' => 'Successfully Updated']);
        }else{
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs',
            ];
            return $this->respond($response , 409);
           
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $model = new UserModel();
        $model->delete($id);

        $response = [
            'message' => 'Data deleted'
        ];

        return $this->respondDeleted($response, 200);
    }
}
