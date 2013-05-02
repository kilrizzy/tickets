<?php

class FilesController extends BaseController {

    /**
     * File Repository
     *
     * @var File
     */
    protected $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $files = $this->file->all();

        return View::make('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, File::$rules);

        if ($validation->passes())
        {
            $this->file->create($input);

            return Redirect::route('files.index');
        }

        return Redirect::route('files.create')
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
        $file = $this->file->findOrFail($id);

        return View::make('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $file = $this->file->find($id);

        if (is_null($file))
        {
            return Redirect::route('files.index');
        }

        return View::make('files.edit', compact('file'));
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
        $validation = Validator::make($input, File::$rules);

        if ($validation->passes())
        {
            $file = $this->file->find($id);
            $file->update($input);

            return Redirect::route('files.show', $id);
        }

        return Redirect::route('files.edit', $id)
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
        $this->file->find($id)->delete();

        return Redirect::route('files.index');
    }

}