<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    


    public function __construct(protected UserInterface $userRepository)
    {
        
    }


    public function index(){
        try {
            return $this->success($this->userRepository->index());
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        try {
            return $this->created($this->userRepository->store($request));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
         try {

            return $this->updated($this->userRepository->update($request,$id));

        } catch (\Throwable $th) {

            return $this->error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            return $this->deleted($this->userRepository->delete($id));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
