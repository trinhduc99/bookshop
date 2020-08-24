<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategory;
use App\Product;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    use DeleteModelTrait;

    private $category;

    public function __construct(Category $category)
    {
        $this->middleware(['auth']);
        $this->category = $category;
    }

    public function index()
    {
        $htmlOptions = $this->getCategory($parentId = '');
        $categories = $this->category->all();
        return view('admin.category.index', compact('categories', 'htmlOptions'));
    }

    public function create()
    {
        $htmlOptions = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOptions'));
    }

    public function deleteView()
    {
        $categories = $this->category->onlyTrashed()->get();
        return view('admin.category.deleteView', compact('categories'));
    }

    public function deleteUpdate($id, $parent_id)
    {
        $category = $this->category->onlyTrashed()->where('id', $parent_id)->count();
        if (($category > 0)) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
        $this->category->withTrashed()->find($id)->restore();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $category = $this->category->create([
            'name' => $categoryRequest->name,
            'parent_id' => $categoryRequest->parent_id,
            'slug' => Str::slug($categoryRequest->name)
        ]);
        if ($category) {
            Alert::success('Danh mục đã được tạo thành công!', 'Successfully');
        } else {
            Alert::error('Tạo danh mục thất bại!', 'Vui lòng kiểm tra lại');
        }

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOptions = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOptions'));
    }

    public function update(UpdateCategory $categoryRequest, $id)
    {
        $category = Category::find($id)->update([
            'name' => $categoryRequest->name,
            'parent_id' => $categoryRequest->parent_id,
            'slug' => Str::slug($categoryRequest->name)
        ]);
        if ($category) {
            alert()->success('Cập nhật danh mục thành công', 'Successfully');
        } else {
            alert()->error('Cập nhật danh mục thất bại', 'Vui lòng kiểm tra lại!');
        }
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $product = Product::where('category_id', $id)->count();
        $category = Category::where('parent_id', $id)->count();
        if (($product > 0) || ($category > 0)) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
        $this->category->find($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        return $recursive->categoryRecursive($parentId);
    }
}


