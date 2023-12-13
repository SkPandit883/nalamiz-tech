<?php
namespace App\Repositories\Implementation;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface
{

    public function __construct(protected User $model)
    {

    }

    public function index()
    {
        return UserResource::collection( $this->model->with('skill')->orderBy('id', 'desc')->select(['id', 'name', 'email', 'avatar'])->get());
    }

    public function store($request)
    {
        $user = $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
        ]);
        $user->skill()->create([
            'skill' => $request->skill,
        ]);
        return $user->load('skill');
    }
    public function update($request, $id)
    {
        $user = $this->model->findOrFail($id);
        $user->update([
            'name' => $request->name,
        ]);
        $user->skill()->update([
            'skill' => $request->skill,
        ]);
        return $user;

    }
    public function delete($id)
    {

        return $this->model->findOrFail($id)->delete();
    }

}
