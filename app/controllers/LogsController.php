<?php

class LogsController extends BaseController {

    /**
     * Log Repository
     *
     * @var Log
     */
    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $logs = $this->log->all();

        return View::make('logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Log::$rules);

        if ($validation->passes())
        {
            $this->log->create($input);

            return Redirect::route('logs.index');
        }

        return Redirect::route('logs.create')
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
        $log = $this->log->findOrFail($id);

        return View::make('logs.show', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $log = $this->log->find($id);

        if (is_null($log))
        {
            return Redirect::route('logs.index');
        }

        return View::make('logs.edit', compact('log'));
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
        $validation = Validator::make($input, Log::$rules);

        if ($validation->passes())
        {
            $log = $this->log->find($id);
            $log->update($input);

            return Redirect::route('logs.show', $id);
        }

        return Redirect::route('logs.edit', $id)
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
        $this->log->find($id)->delete();

        return Redirect::route('logs.index');
    }

}