<?php

class AccountsController extends BaseController {

    /**
     * Account Repository
     *
     * @var Account
     */
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accounts = $this->account->all();

        return View::make('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Account::$rules);

        if ($validation->passes())
        {
            $this->account->create($input);

            return Redirect::route('accounts.index');
        }

        return Redirect::route('accounts.create')
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
        $account = $this->account->findOrFail($id);

        return View::make('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $account = $this->account->find($id);

        if (is_null($account))
        {
            return Redirect::route('accounts.index');
        }

        return View::make('accounts.edit', compact('account'));
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
        $validation = Validator::make($input, Account::$rules);

        if ($validation->passes())
        {
            $account = $this->account->find($id);
            $account->update($input);

            return Redirect::route('accounts.show', $id);
        }

        return Redirect::route('accounts.edit', $id)
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
        $this->account->find($id)->delete();

        return Redirect::route('accounts.index');
    }

}