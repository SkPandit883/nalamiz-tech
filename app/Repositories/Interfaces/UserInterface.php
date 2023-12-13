<?php
namespace App\Repositories\Interfaces;


interface UserInterface {

 public function  store($request);
 public function  update($request,$id);
 public function  delete($id);
 public function  index();

}
