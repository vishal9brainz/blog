<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Datatables\UserDataTable;
class ad extends Controller

{
    public function get_users(UserDataTable $dataTable)
    {
       
    	
    	return $dataTable->render('index'); 
    }
}
