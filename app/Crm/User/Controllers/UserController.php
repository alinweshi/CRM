<?php

namespace Crm\User\Controllers;

use Crm\User\Models\User;
use Crm\User\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
        //
    }
    public function index()
    {
        $this->userService->getUsers();
    }
    public function getbyid($id)
    {
        $this->userService->getUserById($id);
    }
    public function getUserByEmail($email)
    {
        $this->userService->getUserByEmail($email);
    }
    public function getUserByPhone($phone)
    {
        $this->userService->getUserByPhone($phone);
    }
    public function create(CreateUserRequest $request)
    {
         return $this->userService->createuser( $request);
    }
}
