<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Http::get(env('API_URL') . 'users');
        $users = json_decode($users, true);
        return view('admin.users', [
            "users" => $users,
        ]);
    }


//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         $users = Http::get('http://localhost:8080/sparkapi/v1/users');
//         $users = json_decode($users, true);
//         return view('admin.addCity', [
//             "users" => $users,
//         ]);
//     }

//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function changeACity()
//     {
//         $cities = Http::get('http://localhost:8080/sparkapi/v1/cities');
//         $cities = json_decode($cities, true);
//         return view('admin.changeACity', [
//             "cities" => $cities,
//         ]);
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $data = [
//             'city' => $request->input('city'),
//             'X' => $request->input('X'),
//             'Y' => $request->input('Y'),
//             'radius' => $request->input('radius'),
//         ];

//         Http::post("http://localhost:8080/sparkapi/v1/cities/", $data);
//         return redirect('/admin/cities');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSingleUser($userId)
    {
        $user = Http::get(env('API_URL') . 'users/' . $userId);
        $user = json_decode($user, true);
        return view('admin.showSingleUser', [
            "user" => $user,
        ]);
    }
}


//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
