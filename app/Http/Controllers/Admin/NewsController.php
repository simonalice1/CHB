<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateCategoriesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Requests\Admin\StoreNewsRequest;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
    {
        $news=News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {

        //show template
        //$news = News::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $image = $request->file('picture');
        $input['picture'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $img = Image::make($image->getRealPath());

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 666, true);
        }

        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['picture']);

        $destinationPath = public_path('/uploads/');
        $image->move($destinationPath, $input['picture']);


        $news = News::create([
            'name'=> $request->name,
            'description' => $request->description,
            'picture'  =>  $input['picture']

        ]);

        return redirect('/admin/news');

    }

    /**
     * Show the form for editing new.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $new = News::findOrFail($id);

        return view('admin.news.edit', compact('new'));
    }

    /**
     * Update new in storage.
     *
     * @param UpdateCategoriesRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {

        $new = News::findOrFail($id);
        $new->update($request->all());



        return redirect()->route('admin.news.index');
    }


    /**
     * Remove new from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index');
    }

    /**
     * Delete all selected new at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = News::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore new from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $news = News::onlyTrashed()->findOrFail($id);
        $news->restore();

        return redirect()->route('admin.news.index');
    }

    /**
     * Permanently delete new from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $news = News::onlyTrashed()->findOrFail($id);
        $news->forceDelete();

        return redirect()->route('admin.news.index');
    }


}
