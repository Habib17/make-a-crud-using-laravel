<?php

namespace App\Repositories\Contact;

use App\Contracts\Crudable;
use App\Contracts\Paginable;
use App\Contracts\Searchable;
use App\Entities\Contact;
use App\Repositories\AbstractRepository;

/**
 * Class UserRepository
 *
 * @package App\Repositories\User
 */
class ContactRepository extends AbstractRepository implements Crudable, Paginable, Searchable
{

    /**
     * @param User $user
     */
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

    /**
     * @param int   $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $columns = ['*'])
    {
        // query to sql
        return parent::find($id, $columns);
    }

    /**
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'name'     => e($data['name']),
            'email'    => e($data['email']),
            'address'    => e($data['address']),
            'number'    => e($data['number'])
        ]);

    }

    /**
     * @param       $id
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, [
            'name'     => e($data['name']),
            'email'    => e($data['email']),
            'address'    => e($data['address']),
            'number'    => e($data['number'])
        ]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * @param int    $limit
     * @param int    $page
     * @param array  $column
     * @param string $field
     * @param string $search
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
        return parent::getByPage($limit, $page, $column, 'name', $search);
    }

    /**
     * @param string $query
     * @param int    $page
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($query, $page = 1)
    {
        // query to aql
        return parent::likeSearch('name', $query);
    }

}