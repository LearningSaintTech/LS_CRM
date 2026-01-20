<?php

// namespace App;
namespace App\Traits;
use App\Models\BLog;
use App\Models\Websites;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Str;


trait BlogTraits
{
    public function bloglist()
    {
        return view('blog.index');
    }

    public function blogdata()
    {
        $blogs = Blog::orderBy('created_at', 'desc');

        return DataTables::of($blogs)
            ->addColumn('slug', function ($blog) {
                return e($blog->url);
            })
            ->addColumn('title', function ($blog) {
                return e($blog->title);
            })
            ->addColumn('description', function ($blog) {
                // Optionally truncate long text for display
                return Str::limit(strip_tags($blog->meta_title), 100, '...');
            })
            ->addColumn('status', function ($blog) {
                return $blog->status === 'Active'
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($blog) {
                $editUrl = route('blog.edit', ['id' => $blog->id]);
                $deleteUrl = route('blog.destroy', ['id' => $blog->id]);

                return '
                <div class="text-end">
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm me-1">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button data-id="' . $blog->id . '" 
                            class="btn btn-danger btn-sm delete-blog">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            ';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function blogedit(Request $request)
    {
        $blog = BLog::where('id', $request->id)->first();
        $websites = Websites::orderBy('created_at', 'desc')->get();
        return view('blog.addEdit', compact('blog', 'websites'));
    }


    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('tinymce', 'public');
            return response()->json(['location' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'No file uploaded'], 422);
    }

    public function insertblog(Request $request)
    {

        $rows = 5;
        for ($i = 1; $i <= $rows; $i++) {
            for ($j = $i; $j < $rows; $j++) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp";
            }
            for ($k = 1; $k <= (2 * $i - 1); $k++) {
                echo "*";
            }
            echo "<br>";
        }


        $strdata = 10;
        for ($i =1; $i <= $strdata; $i++){
            for($j = $i; $j < $strdata; $j++){
                echo "&nbsp;&nbsp;";
            }
             for ($K = 1; $k <=(2* $i -1); $k++){
                echo "*";
             }
             echo "<br>";

        }

    }



}
