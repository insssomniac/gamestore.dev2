<?php


namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->orderBy('id')->get();
        return view('admin.news', ['news' => $news]);
    }

    public function create()
    {
        return view('admin.newsCreate');
    }

    public function edit(News $news)
    {
        return view('admin.newsEdit', ['news' => $news]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->text = $request->text;

        if (isset($_FILES ['image']['tmp_name'])) {
            $news->loadFile($_FILES ['image']['tmp_name']);
        }

        $news->save();
        return redirect()->route('admin.news');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $news = News::query()->find($id);
        $news->title = $request->title;
        $news->text = $request->text;

        if (!empty($_FILES ['image']['tmp_name'])) {
            $news->deleteImage($news->image);
            $news->loadFile($_FILES ['image']['tmp_name']);
        }

        $news->save();
        return redirect()->route('admin.news');
    }

    public function delete($id)
    {
        News::destroy($id);
        return redirect()->route('admin.news');
    }

}
