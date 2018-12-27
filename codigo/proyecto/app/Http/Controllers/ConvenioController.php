<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{

    protected $redirect;

    public function __construct(Redirector $redirect)
    {
        $this->redirect = $redirect;
    }

    public function show()
    {
        return $this->redirect->route('registroConvenio');
    }
}
