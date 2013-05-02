<?php

class StatusesController extends BaseController {

    /**
     * Status Repository
     *
     * @var Status
     */
    protected $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->status->all();

        return View::make('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Status::$rules);

        if ($validation->passes())
        {
            $this->status->create($input);

            return Redirect::route('statuses.index');
        }

        return Redirect::route('statuses.create')
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
        $status = $this->status->findOrFail($id);

        return View::make('statuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $status = $this->status->find($id);

        if (is_null($status))
        {
            return Redirect::route('statuses.index');
        }

        return View::make('statuses.edit', compact('status'));
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
        $validation = Validator::make($input, Status::$rules);

        if ($validation->passes())
        {
            $status = $this->status->find($id);
            $status->update($input);

            return Redirect::route('statuses.show', $id);
        }

        return Redirect::route('statuses.edit', $id)
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
        $this->status->find($id)->delete();

        return Redirect::route('statuses.index');
    }

}