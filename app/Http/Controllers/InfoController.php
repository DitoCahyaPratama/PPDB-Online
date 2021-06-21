<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Http\Requests\InfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $info=Info::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.pages.info_pages',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('pages.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoRequest $request)
    {
        try {
            $validated = $request->validated();
            $imagename = !$request->hasFile('image') ? null : $request->file('image')->store('upload/info', 'public');
            $info = Info::create(array_merge(
                $validated,
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' =>  $imagename,
                    'slug' => Str::slug($request->title),
                ],
            ));

            return redirect()->route('info.home')->with([
                'successful_message' => 'Data telah ditambahkan',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('info.home')->with([
                'failed_message' => $th->getMessage(),
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::find($id);
        return view('admin.pages.info_detail_pages', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::find($id);
        return view('admin.pages.info_update_pages', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoRequest $request, $id)
    {
        try {
            if(!$request->hasFile('image')){
                $validated = $request->validated();
                //fungsi eloquent untuk update data
                $education = Info::find($id)->update(array_merge(
                    $validated,
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'slug' => Str::slug($request->title),
                    ],
                ));
                return redirect()->route('info.home')->with([
                    'successful_message' => 'Data telah diperbarui',
                ]);
            }else{
                $allowedfileExtension = ['jpg', 'png', 'jpeg', 'svg'];
                $file = $request->file('image');
                $validated = $request->validated();
    
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
    
                if ($check) {
                    $imagename = $request->file('image')->store('upload/info', 'public');
                    $education = Info::find($id)->update(array_merge(
                        $validated,
                        [
                            'title' => $request->title,
                            'description' => $request->description,
                            'image' => $imagename,
                            'slug' => Str::slug($request->title),
                        ],
                    ));
    
                    return redirect()->route('info.home')->with([
                        'successful_message' => 'Data telah diperbarui',
                    ]);
                }else{
                    return redirect()->route('info.home')->with([
                        'failed_message' => 'Data gagal diperbarui',
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('info.home')->with([
                'failed_message' => $th->getMessage(),
            ]);
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
        try {
            Info::find($id)->delete();
            return redirect()->route('info.home')->with([
                'successful_message' => 'Data berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('info.home')->with([
                'failed_message' => $th->getMessage(),
            ]);
        }
        
    }

    public function search(Request $request){
        $search = $request->input('search');
        $info = Info::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(5);
        return view('admin.pages.info_pages', compact(['info']));
    }

}
