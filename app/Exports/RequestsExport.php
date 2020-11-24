<?php

namespace App\Exports;

use App\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RequestsExport implements FromView
{
    public function view(): View
    {
        return view('requests.export', [
            'reqs' => Request::all()
        ]);
    }
}
