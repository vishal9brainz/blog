<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Resources\User as UserResource;
class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \DB::table('users')->paginate(15);

        //$users->links();
        //dd($users->links());
        //$users=User::all()->paginate(5);
       return new JsonResponse([
            'success' => true,
            'Users' =>  UserResource::collection($users),
            'Paggination' =>
                [
                        'Total User'    =>$users->count(),
                        'Current Page'  =>$users->currentPage(),
                        'Next Page Url' =>(string) $users->nextPageUrl(),
                        'Previous Page' =>(string) $users->previousPageUrl(),
                        'Last Page'     =>$users->lastPage(),


                ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $users=new User;
      $users->name=$request->get('name');
      $users->email=$request->get('email');
      $users->password=bcrypt($request->get('password'));

      $users->save();

      return new JsonResponse([
            'success' => true,
            'Users' =>new UserResource($users),
        ]);

     /* return new UserResource($users);*/
      // return response()->json(array('suceess'=>'true','Message'=>'User Created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::findOrFail($id);
        return new UserResource($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $users=new User;
      $users=User::findOrFail($id);

      $users->name=$request->get('name');
      $users->email=$request->get('email');
      $users->password=bcrypt($request->get('name'));

      $users->save();

      return response()->json(array('suceess'=>'true','Message'=>'User Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::destroy($id);
        return response()->json(array('success'=>'tr
            ue','Message'=>'User Deleted'));


    }
}
