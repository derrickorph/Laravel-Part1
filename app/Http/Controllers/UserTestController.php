<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class UserTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Utilisateur::where('statut', 0)->get();
        return view('datatable.userTest', compact('tests'));
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
    public function store(UtilisateurRequest $request, Utilisateur $test)
    {
        try {
            if ($request->ajax()) {
                $test = Utilisateur::create($request->all());
                return Response::json([
                    'status' => 200,
                    'alert' => "Modification effectuée avec succès",
                    'data' => $test
                ], 200);
                // return redirect('test')->with('alert', "Enregistrement effectué");

                }
            } catch (Exception $e) {
        }
    }
    public function uploadFile()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUserById( $id)
    {
        $test= Utilisateur::find($id);
        return Response::json($test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(UtilisateurRequest $request)
    {
        // $test->name=$request->name;
        // $test->firstname=$request->firstname;
        // $test->email=$request->email;
        // $test->save();
        try {
            if ($request->ajax()) {
                // $test = Utilisateur::findOrFail($request->id);
                // $test->name=$request->name;
                // $test->firstname=$request->firstname;
                // $test->email=$request->email;
                // $test->save();


                $test = Utilisateur::find($request->id);
                $test->name=$request->name;
                $test->firstname=$request->firstname;
                $test->email=$request->email;
                $test->save();

                return Response::json([
                    'status' => 200,
                    'alert' => "Modification effectuée avec succès",
                    'data' => $test
                ], 200);


                }
            } catch (Exception $e) {
                Log::alert($e);
        }
        // $test->update($request->all());
        // return redirect('test')->with('alert', "Modification effectuée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Utilisateur $test)
    {
        try {
            if ($request->ajax()) {
                $test = Utilisateur::where('id', $test->id)->update(['statut' => 1]);
                return Response::json([
                    'status' => 200,
                    'data' => $test
                ], 200);

            }
        }
        catch (Exception $e) {
        }
    }
    // public function alert(Utilisateur $test)
    // {
    //     return view('datatable.destroyUser', compact('test'));
    // }
}
