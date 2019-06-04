<?php

namespace App\Domain\Admin\Datatables;
use App\User;
use App\Domain\Util\Datatables\UserBaseDatatableScope;

class UserDatatableScope extends UserBaseDatatableScope
{
    public function __construct()
        {
            $this->setHtml([
                [
                    'data'  => 'name',
                    'name'  => 'name',
                    'title' => 'Name',

                ],
                [
                    'data'  => 'email',
                    'name'  => 'email',
                    'title' => 'Email',

                ],
            ]);
        }
    public function query()
    {
            return datatables()->eloquent(User::query());
            ->addColumn('actions','action.store')
            ->make(true);
    }
}
