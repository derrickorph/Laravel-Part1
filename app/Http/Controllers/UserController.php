<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\UtilisateurRequest;
use App\Models\Utilisateur;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {


        return $dataTable->render('datatable.usersList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datatable.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UtilisateurRequest $request)
    {
        $request->Utilisateur::create($request->all());
        return redirect('/users')->with('message',"Modification effectuée");

        // return back()->with('alert', config('messages.countrycreated'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $user)
    {
        return view('datatable.viewUser',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $user)
    {
        return view('datatable.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UtilisateurRequest $request, Utilisateur $users)
    {
        $users->update($request->all());

        return back()->with('alert', config('messages.countryupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $user)
    {
        $user->delete();

        return redirect(route('datatable.usersList'));
    }
    public function alert(Utilisateur $user)
    {
        return view('datatable.destroy', ['utilisateur' => $user]);
    }
}
