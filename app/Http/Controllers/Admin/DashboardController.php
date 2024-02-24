<?php

namespace App\Http\Controllers\Admin;

// Library Local
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

// Library Installer
use RealRashid\SweetAlert\Facades\Alert;

// Models
use App\Models\Company;
use App\Models\Colleger;
use App\Models\User;

class DashboardController extends Controller
{
    public $view = 'admin.pages.dashboard.';
    public $route = 'admin.dashboard.';
    public $title = 'Dashboard ';
    public $title_company = 'Perusahaan';


    public function __construct()
    {
        // $this->middleware('roles:super_admin');
        View::share('title', $this->title);
        View::share('route', $this->route);
        View::share('view', $this->view);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::all();
        $collergers = Colleger::all();
        return view($this->view . 'index' , [
            'datas' => $datas,
            'collergers' => $collergers
        ]);
    }
}
