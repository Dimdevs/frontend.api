<?php

namespace App\Http\Controllers\Admin;

// Library Local
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

// Model
use App\Models\Colleger;
use App\Models\Course;

// HELPER
use App\Helpers\Media;

class CollegerController extends Controller
{
    public $view = 'admin.pages.colleger.';
    public $route = 'admin.collegers.';
    public $title = 'Data Mahasiswa';
    public $path = 'uploads/mahasiswa/';
    public $model;

    public function __construct(Colleger $model)
    {
        $this->model = $model;
        View::share('route', $this->route);
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    use Media;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = $this->model->all();
        return view($this->view.'index' , compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'gender' => 'required|string|in:Laki - Laki,Perempuan',
            'address' => 'required|string'
        ]);

        $uploads = $this->uploads($input['image'], $this->path);

        $result = $this->model->create([
            'name' => $input['name'],
            'address' => $input['address'],
            'gender' => $input['gender'],
            'image' => $uploads['filePath'],
        ]);

        if(isset($request->course)) {
            foreach ($request->course as $value) {
                Course::create([
                    'colleger_id' => $result->id,
                    'name' => $value
                ]);
            }
        }

        if($result) {
            Alert::success('Created' , 'Buat ' . $this->title . ' Berhasil');
            return redirect()->route($this->route.'index');
        }
        Alert::error('Created' , 'Buat ' . $this->title . ' Gagal');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->model->with('course')->where('id' , $id)->first();
        return view($this->view. 'detail' , compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->model->with('course')->where('id' , $id)->first();
        return view($this->view. 'edit' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'file|mimes:png,jpg,jpeg',
            'gender' => 'required|string|in:Laki - Laki,Perempuan',
            'address' => 'required|string'
        ]);


        $data = $this->model->where('id' , $id)->first();

        if($request->image) {
            $imageBefore = $data->image;
            $remove = $this->removeImage(basename($data->image), $this->path);
            $uploads = $this->uploads($input['image'], $this->path);
            $result = $this->model->where('id' , $id)->update([
                'name' => $input['name'],
                'address' => $input['address'],
                'gender' => $input['gender'],
                'image' => $uploads['filePath'],
            ]);
        } else {
            $result = $this->model->where('id' , $id)->update([
                'name' => $input['name'],
                'address' => $input['address'],
                'gender' => $input['gender'],
            ]);
        }

        if(isset($request->course)) {
            Course::where('colleger_id', $id)->forceDelete();
            foreach ($request->course as $value) {
                Course::create([
                    'colleger_id' => $id,
                    'name' => $value
                ]);
            }
        }

        if($result) {
            Alert::success('Updated' , 'Buat ' . $this->title . ' Berhasil');
            return redirect()->route($this->route.'index');
        }
        Alert::error('Updated' , 'Buat ' . $this->title . ' Gagal');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $result = $this->model->with('course')->find($id);

            if (!$result) {
                return response()->json(['message' => 'Data ' . $this->title . ' tidak ditemukan'], 404);
            }

            if($result->image) {
                $imageBefore = $result->image;
                $this->removeImage(basename($result->image), $this->path);
            }

            $deleted = $result->delete();

            if ($deleted) {
                return response()->json(['message' => 'Hapus ' . $this->title . ' beserta relasinya berhasil'], 200);
            } else {
                return response()->json(['message' => 'Hapus ' . $this->title . ' beserta relasinya gagal'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
