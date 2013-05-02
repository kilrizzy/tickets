<?php

class SchedulesController extends BaseController {

    /**
     * Schedule Repository
     *
     * @var Schedule
     */
    protected $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $schedules = $this->schedule->all();

        return View::make('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Schedule::$rules);

        if ($validation->passes())
        {
            $this->schedule->create($input);

            return Redirect::route('schedules.index');
        }

        return Redirect::route('schedules.create')
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
        $schedule = $this->schedule->findOrFail($id);

        return View::make('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $schedule = $this->schedule->find($id);

        if (is_null($schedule))
        {
            return Redirect::route('schedules.index');
        }

        return View::make('schedules.edit', compact('schedule'));
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
        $validation = Validator::make($input, Schedule::$rules);

        if ($validation->passes())
        {
            $schedule = $this->schedule->find($id);
            $schedule->update($input);

            return Redirect::route('schedules.show', $id);
        }

        return Redirect::route('schedules.edit', $id)
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
        $this->schedule->find($id)->delete();

        return Redirect::route('schedules.index');
    }

}