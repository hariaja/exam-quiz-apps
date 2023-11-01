<?php

namespace App\Http\Controllers\Consoles\Masters;

use App\DataTables\Consoles\Masters\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Masters\CategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected CategoryService $categoryService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(CategoryDataTable $dataTable)
  {
    return $dataTable->render('consoles.masters.categories.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('consoles.masters.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CategoryRequest $request)
  {
    $this->categoryService->create($request->validated());
    return redirect(route('categories.index'))->withSuccess(trans('alert.create'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view('consoles.masters.categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CategoryRequest $request, Category $category)
  {
    $this->categoryService->update($category->id, $request->validated());
    return redirect(route('categories.index'))->withSuccess(trans('alert.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $this->categoryService->delete($category->id);
    return response()->json([
      'message' => trans('alert.delete')
    ]);
  }
}
