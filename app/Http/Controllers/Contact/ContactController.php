<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests\Contact\ContactCreateRequest;
use App\Http\Requests\Contact\ContactEditRequest;
use App\Repositories\Contact\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\User
 */
class ContactController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $contact;

    /**
     * @param UserRepository $user
     */
    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->contact->getByPage(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return mixed
     */
    public function store(ContactCreateRequest $request)
    {
        return $this->contact->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->contact->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserEditRequest   $request
     * @param                   $id
     *
     * @return mixed
     */
    public function update(ContactEditRequest $request, $id)
    {
        return $this->contact->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->contact->delete($id);
    }
}
