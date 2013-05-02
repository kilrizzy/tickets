<?php

class Schedule_timesController extends BaseController {

    /**
     * Schedule_time Repository
     *
     * @var Schedule_time
     */
    protected $schedule_time;

    public function __construct(Schedule_time $schedule_time)
    {
        $this->schedule_time = $schedule_time;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $schedule_times = $this->schedule_time->all();

        return View::make('schedule_times.index', compact('schedule_times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('schedule_times.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Schedule_time::$rules);

        if ($validation->passes())
        {
            $this->schedule_time->create($input);

            return Redirect::route('schedule_times.index');
        }

        return Redirect::route('schedule_times.create')
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
        $schedule_time = $this->schedule_time->findOrFail($id);

        return View::make('schedule_times.show', compact('schedule_time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $schedule_time = $this->schedule_time->find($id);

        if (is_null($schedule_time))
        {
            return Redirect::route('schedule_times.index');
        }

        return View::make('schedule_times.edit', compact('schedule_time'));
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
        $validation = Validator::make($input, Schedule_time::$rules);

        if ($validation->passes())
        {
            $schedule_time = $this->schedule_time->find($id);
            $schedule_time->update($input);

            return Redirect::route('schedule_times.show', $id);
        }

        return Redirect::route('schedule_times.edit', $id)
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
        $this->schedule_time->find($id)->delete();

        return Redirect::route('schedule_times.index');
    }

}