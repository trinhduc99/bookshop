<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProduct;
use App\Product;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function deleteView()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.deleteView', compact('products'));
    }

    public function deleteUpdate($id, $category_id)
    {
        $product = Category::onlyTrashed()->where('id', $category_id)->count();
        if (($product > 0)) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
        Product::withTrashed()->find($id)->restore();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }


    public function create()
    {
        $htmlOptions = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOptions'));
    }

    public function store(ProductRequest $request)
    {
        $dataProductCreate = $this->insertDataProduct($request);
        $product = Product::create($dataProductCreate);
        if ($product) {
            alert()->success('Product Created', 'Successfully');
        } else {
            alert()->error('Product Created', 'Something went wrong!');
        }
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $htmlOptions = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOptions', 'product'));
    }

    public function update(UpdateProduct $request, $id)
    {
        $dataProductCreate = $this->insertDataProduct($request);
        $product = Product::find($id)->update($dataProductCreate);
        if ($product) {
            alert()->success('Product Updated', 'Successfully');
        } else {
            alert()->error('Product Updated', 'Something went wrong!');
        }
        return redirect()->route('products.index');
    }

    public function delete($id, Product $product)
    {
        return $this->deleteModelTrait($id, $product);
    }

    public function insertDataProduct($request)
    {
        try {
            $dataProductCreate = [
                'name' => $request->name,
                'name_author' => $request->name_author,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];
            $dataUploadImage = $this->storageUploadFile($request, 'feature_image_path', 'product');
            if (!empty($dataUploadImage)) {
                $dataProductCreate['image_path'] = $dataUploadImage['file_path'];
                $dataProductCreate['image_name'] = $dataUploadImage['file_name'];
            }
            return $dataProductCreate;
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' ------Line: ' . $exception->getLine());
        }
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $recursive = new Recursive($data);
        return $recursive->categoryRecursive($parentId);
    }
}
