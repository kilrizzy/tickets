<?php

class AddressesController extends BaseController {

    /**
     * Address Repository
     *
     * @var Address
     */
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $addresses = $this->address->all();

        return View::make('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Address::$rules);

        if ($validation->passes())
        {
            $this->address->create($input);

            return Redirect::route('addresses.index');
        }

        return Redirect::route('addresses.create')
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
        $address = $this->address->findOrFail($id);

        return View::make('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $address = $this->address->find($id);

        if (is_null($address))
        {
            return Redirect::route('addresses.index');
        }

        return View::make('addresses.edit', compact('address'));
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
        $validation = Validator::make($input, Address::$rules);

        if ($validation->passes())
        {
            $address = $this->address->find($id);
            $address->update($input);

            return Redirect::route('addresses.show', $id);
        }

        return Redirect::route('addresses.edit', $id)
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
        $this->address->find($id)->delete();

        return Redirect::route('addresses.index');
    }

}