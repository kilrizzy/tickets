<?php

class PrioritiesController extends BaseController {

    /**
     * Priority Repository
     *
     * @var Priority
     */
    protected $priority;

    public function __construct(Priority $priority)
    {
        $this->priority = $priority;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $priorities = $this->priority->all();

        return View::make('priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Priority::$rules);

        if ($validation->passes())
        {
            $this->priority->create($input);

            return Redirect::route('priorities.index');
        }

        return Redirect::route('priorities.create')
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
        $priority = $this->priority->findOrFail($id);

        return View::make('priorities.show', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $priority = $this->priority->find($id);

        if (is_null($priority))
        {
            return Redirect::route('priorities.index');
        }

        return View::make('priorities.edit', compact('priority'));
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
        $validation = Validator::make($input, Priority::$rules);

        if ($validation->passes())
        {
            $priority = $this->priority->find($id);
            $priority->update($input);

            return Redirect::route('priorities.show', $id);
        }

        return Redirect::route('priorities.edit', $id)
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
        $this->priority->find($id)->delete();

        return Redirect::route('priorities.index');
    }

}