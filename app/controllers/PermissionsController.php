<?php

class PermissionsController extends BaseController {

    /**
     * Permission Repository
     *
     * @var Permission
     */
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permissions = $this->permission->all();

        return View::make('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Permission::$rules);

        if ($validation->passes())
        {
            $this->permission->create($input);

            return Redirect::route('permissions.index');
        }

        return Redirect::route('permissions.create')
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permission->findOrFail($id);

        return View::make('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permission->find($id);

        if (is_null($permission))
        {
            return Redirect::route('permissions.index');
        }

        return View::make('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Permission::$rules);

        if ($validation->passes())
        {
            $permission = $this->permission->find($id);
            $permission->update($input);

            return Redirect::route('permissions.show', $id);
        }

        return Redirect::route('permissions.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->permission->find($id)->delete();

        return Redirect::route('permissions.index');
    }

}