<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class UserController extends Controller
{
    private $bread;

    /**
     * Data For Breadcrumbs
     */
     public function __construct()
     {
         $this->bread = [
             '0' => route('home'),
             'page-title' => 'User Management',
             'menu' => 'Dashboard',
             'submenu' => 'User',
             'active' => 'User Management'
         ];
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        $bread = $this->bread;
        if ($request->ajax()) {
          $users = User::all();

          return Datatables::of($users)
                  ->addColumn('action', function($data){
                    return view('layouts.partials.datatable._action', [
                        'model' => $data,
                        'form_url' => route('user.destroy', $data->id),
                        'edit_url' => route('user.edit', $data->id),
                    ]);
          })->make(true);
        }

        $html = $htmlBuilder
                ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
                ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name' ])
                ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'E-Mail'])
                ->addColumn(['data' => 'role', 'name' => 'role', 'title' => 'Role'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => 'false']);

        return view('pages.user.index', compact('bread', 'html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bread = $this->bread;
        $bread[0] = route('user.index');
        $select_role = ['manager' => 'Manager', 'supervisor' => 'Supervisor'];
        return view('pages.user.create', compact('bread', 'select_role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|string',
      ]);

      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role
      ]);

      notify()->flash('Done!', 'success', [
          'timer' => 1500,
          'text' => 'User successfully added',
      ]);

      return redirect()->route('user.index');
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
    public function edit($id)
    {
      $bread = $this->bread;
      $bread[0] = route('user.index');
      $select_role = ['manager' => 'Manager', 'supervisor' => 'Supervisor'];

      $user = User::findOrFail($id);

      return view('pages.user.edit', compact('bread', 'user', 'select_role'));
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
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|string',
      ]);

      $user = User::findOrFail($id);
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role
      ]);

      notify()->flash('Done!', 'success', [
          'timer' => 1500,
          'text' => 'User successfully edited',
      ]);

      return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(!User::destroy($id)) return redirect()->back();

      notify()->flash('Done!', 'success', [
          'timer' => 1500,
          'text' => 'User successfully deleted',
      ]);

      return redirect()->route('user.index');
    }
}
