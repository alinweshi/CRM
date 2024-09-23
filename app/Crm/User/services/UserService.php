<?php

Namespace Crm\User\Services;
use Crm\User\Models\User;
use Crm\User\Events\UserCreation;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;


class UserService{
     const Token_Name="personal token";
    public function __construct(private CreateUserRequest $CreateUserRequest){}
    public function getUsers()
    {
    return User::all();

}
    public function getUserById($id)
    {
        return User::find( $id);
    }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getUserByPhone($phone)
    {
    return User::where('phone', $phone)->first();
    }
    public function createuser(CreateUserRequest $request){
        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "password"=>Hash::make('password'),
        ]);

          event(new UserCreation($user));
          return response()->json([
            "user"=>$user,
            "Token"=>$user->createToken(self::Token_Name)->plainTextToken,
          ]);
        // $user = new User();
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->phone = $request->input('phone');
        // $user->password = $request->input('password');
        // $user->save();
    }
}
?>
