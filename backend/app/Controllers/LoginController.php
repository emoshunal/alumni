<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use \Firebase\JWT\JWT;

class LoginController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new UserModel();
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if(is_null($user)){
            return $this->respond(['error' => 'Username incorrect'], 401);
        }

        $pwd_verify = password_verify($password, $user['password']);

        if(!$pwd_verify){
                return $this->respond(['error' => 'Incorrect username or password'], 401);
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;
        $payload =array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience of the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT was issued
            "exp" => $exp, //Expiration time of the JWT
            "email" => $user['email'],
        );

        $token = JWT::encode($payload, $key,'HS256');

        $reponse = [
            'message' => 'Login successful',
            'token' => $token,
        ];

        return $this->respond($reponse, 200);

    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
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
        //
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
