<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct(){
        // $this->product = new Product();
        $this->category = new Category();
    }

    // get infor

    public function index()
    {

        session()->put('active','categoryListView');

        $categories =  $this->category->getAllCategory();

        return view('pages.category.categoryList', compact('categories'));
    }

    // add category 

    public function create()
    {
        session()->put('active','categoryAdd');
        
        return view('pages.category.addCategory');
    }

    public function store(CategoryRequest $request)
    {
        $dataInsert = [
            'TenDMSP' => $request->name_category,
            'MoTa' => $request->des_category,
        ];
        
        $this->category->addCategory($dataInsert);   
        return back()->with('msgtrue', 'Thêm danh mục thành công !!!');
        
        // dd($request);
    }

    // update category

    public function edit($id=0, Request $request){

        if(!empty($id)){
            $categoryDetail = $this->category->getDetail($id);
            // dd($categoryDetail);
            if(!empty($categoryDetail[0])){
                $request->session()->put('id', $id);
                $categoryDetail = $categoryDetail[0];
            }else{
                return redirect()->route('categoryList')->with('msg', 'Danh mục này không tồn tại !!!');
            }
        }else{
            return redirect()->route('categoryList')->with('msg', 'Liên kết này không tồn tại !!!');
        }

        return view('pages.category.editCategory', compact('categoryDetail'));
    }

    public function update(CategoryRequest $request){
        
        // dd($request);

        $id =  session('id');
        if(empty($id)){
            return redirect()->route('categoryList')->with('msg', 'Liên kết này không tồn tại !!!');
        }

        $dataUpdate = [
            'TenDMSP' => $request->name_category,
            'MoTa' => $request->des_category
        ];
        $this->category->updateCategory($dataUpdate, $id);

        return redirect()->route('categoryList')->with('msgtrue', 'Cập nhật danh mục thành công !!!');
    }
    

    public function delete($id){
        if(!empty($id)){
            $categoryDetail = $this->category->getDetail($id);
            if(!empty($categoryDetail[0])){
                $deleteStatus = $this->category->deleteCategory($id);
                if($deleteStatus){
                    $msgtrue = 'Xóa danh mục thành công !!!';
                    return redirect()->route('categoryList')->with('msgtrue', $msgtrue);
                }else{
                    $msg = 'Bạn không thể xóa danh mục này . Hãy thử lại !!!';
            }
            }else{
                $msg = 'Danh mục này không tồn tại !!!';
            }
        }else{
            $msg = 'Liên kết này không tồn tại !!!';
        }
        return redirect()->route('categoryList')->with('msg', $msg);
    }

}
