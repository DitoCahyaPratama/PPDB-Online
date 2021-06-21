<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("info");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $validated = $request->validated();

        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/educations'), $image);

        $info = Info::create(array_merge(
            $validated,
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
                'slug' => Str::slug($request->title),
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('education.index')
            ->with('success', 'Edukasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::find($id);
        return view('pages.educations.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::find($id);
        return view('pages.educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->hasFile('image')){
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);
            //fungsi eloquent untuk update data
            $education = Education::find($id)->update(array_merge(
                $validator->validated(),
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => Str::slug($request->title),
                ],
            ));

            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('education.index')
                ->with('success', 'Edukasi berhasil diperbarui');
        }else{
            $allowedfileExtension = ['jpg', 'png', 'jpeg', 'svg'];
            $file = $request->file('image');
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);

            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/educations'), $image);
                //fungsi eloquent untuk update data
                $education = Education::find($id)->update(array_merge(
                    $validator->validated(),
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'image' => $image,
                        'slug' => Str::slug($request->title),
                    ],
                ));

                //jika data berhasil ditambahkan, akan kembali ke halaman utama
                return redirect()->route('education.index')
                    ->with('success', 'Edukasi berhasil diperbarui');
            }else{
                //jika data berhasil ditambahkan, akan kembali ke halaman utama
                return redirect()->route('education.index')
                    ->with('danger', 'Edukasi gagal diperbarui, gunakan format jpg, png, jpeg atau svg');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::find($id)->delete();
        return redirect()->route('education.index')
            -> with('success', 'Edukasi berhasil dihapus');
    }

    public function publicView(){
        $education = Education::paginate(8);
        return view('pages.education', compact(['education']));
    }

    public function publicDetailView($id){
        $education = Education::where('slug','=',$id)->get()->first();
        return view('pages.detail_education', compact('education'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $education = Education::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(10);

        $education->appends($request->only(['_token', 'search']));

        // Return the search view with the resluts compacted
        return view('pages.educations.index', compact(['education']));
    }

    public function publicSearch(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $education = Education::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(8);

        $education->appends($request->only(['_token', 'search']));

        // Return the search view with the resluts compacted
        return view('pages.education', compact('education'));
    }
}
