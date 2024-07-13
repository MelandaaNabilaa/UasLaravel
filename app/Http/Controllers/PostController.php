<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

public function update(Request $request, $id)
{
    $validate = $request->validate([
        'title => 'required|string|max:255',
        'content=> 'required|string',
        'image'=> 'nullable|file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048'
    ]);
    $post = Post::findOrFail($id);
    $post->title =$validate['title'];
    $post->content =$validate['content'];

    if ($request->hasFile('image')) {
        //Delete the old image
        if ($post->image){
            //Menggunakan Storage facade
            Storage::delete('public/' . $post->image);

            //alternatif dengan file facade
            //File::delete(storage_path('app/public/' . $post->image));
        }
        $post->image = $request->file('image')->store('images', 'public');
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

public function add(){
    return view('posts.add');
}

public function store(Request $request)
{
    $validate = $request->validate([
        'title => 'required|string|max:255',
        'content=> 'required|string',
        'image'=> 'required|file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048'
    ]);

    $post = new Post();
    $post->title =$validate['title'];
    $post->content =$validate['content'];

    if (array_key_exists('image', $validate)) {
        $post->image = $validate['image']->store('images', 'public');
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

public function index(): View
{
    //get posts
    $posts = Post::latest()->paginate(5);

    // kirim data post le view
    return view('posts.index',compact('posts'));
}

Route::get('/', function (){
    return view('posts.index');
});
//Route untuk resource post
Route::resource('/posts', PostController::class);

//Route untuk halaman statis
Route::get('/view', [PostController::class, 'view'])->name('posts.view');
Route::get('/add', [PostController::class, 'add'])->name('posts.add');
Route::get('/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/login', [PostController::class, 'login'])->name('posts.login');
?>

public function edit($code)
{
    $post = Post::findOrFail($code);
    return view('posts.edit, compact('post'));
}

public function view($code): view
{
    $post = Post::findOrFail($code);
    return view('posts.view', compact('post'));
}