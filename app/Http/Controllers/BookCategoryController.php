<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', BookCategory::class);

        if ($request->ajax()) {

            $query = BookCategory::withCount('books');

            return DataTables::eloquent($query)
                ->addColumn('DT_RowIndex', '')
                ->addColumn('action', fn($bookCategories) => view('dashboard.book-categories.partials.actions', ['bookCategories' => $bookCategories]))
                ->addIndexColumn()
                ->make(true);
        }

        confirmDelete('Hapus Kategori Buku', 'Apakah anda yakin ingin menghapus kategori buku ini?');

        $uncategorizedBooksCount = Book::uncategorized()->count();

        return view('dashboard.book-categories.index', compact('uncategorizedBooksCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookCategoryRequest $request)
    {
        BookCategory::create($request->validated());

        toast('Kategori buku berhasil ditambahkan.', 'success');
        return redirect()->route('book-categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookCategoryRequest $request, BookCategory $bookCategory)
    {
        $bookCategory->update($request->validated());

        toast('Kategori buku berhasil diperbarui.', 'success');
        return redirect()->route('book-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();

        toast('Kategori buku berhasil dihapus.', 'success');
        return redirect()->route('book-categories.index')->with('success', 'Kategori buku berhasil dihapus.');
    }
}
