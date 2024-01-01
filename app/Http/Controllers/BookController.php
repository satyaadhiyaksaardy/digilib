<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\BookCategory;
use App\Models\User;
use App\Notifications\BookCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user();
            $filterCategory = $request->get('filterCategory');

            $query = Book::query();

            if ($user->is_admin) {
                $query->with('user', 'bookCategory');
            } else {
                $query->with('bookCategory')->where('user_id', $user->id);
            }

            if ($filterCategory) {
                if ($filterCategory === 'null') {
                    $query->whereNull('book_category_id');
                } else {
                    $query->whereHas('bookCategory', function ($query) use ($filterCategory) {
                        $query->where('id', $filterCategory);
                    });
                }
            }

            return DataTables::eloquent($query)
                ->addColumn('DT_RowIndex', '')
                ->addColumn('user', fn($book) => $book->user->name ?? 'N/A')
                ->addColumn('category', fn($book) => $book->bookCategory->name ?? 'N/A')
                ->addColumn('cover', fn($book) => view('dashboard.books.partials.cover', compact('book')))
                ->addColumn('file', fn($book) => route('books.download', $book))
                ->addColumn('action', fn($book) => view('dashboard.books.partials.actions', compact('book')))
                ->addIndexColumn()
                ->make(true);
        }

        confirmDelete('Hapus Buku', 'Apakah anda yakin ingin menghapus buku ini?');

        $bookCategories = BookCategory::pluck('name', 'id')->prepend('N/A', 'null');

        return view('dashboard.books.index', compact('bookCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $user = auth()->user();

        $request->validated();

        $book = $user->books()->create([
            'book_category_id' => $request->book_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'file_path' => basename(Storage::disk('local')->putFile('books', $request->file('file'))),
            'cover_path' => basename(Storage::disk('public')->putFile('covers', $request->file('cover'))),
        ]);

        // notify the user
        $user->notify(new BookCreated($book));

        // notify the admin
        $admin = User::where('is_admin', true)->get();
        Notification::send($admin, new BookCreated($book));

        toast('Buku berhasil ditambahkan.', 'success');
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->authorize('update', $book);

        $request->validated();

        if ($request->hasFile('file')) {
            if (Storage::disk('local')->exists('books/' . $book->file_path)) {
                Storage::disk('local')->delete('books/' . $book->file_path);
            }
            $book->file_path = basename(Storage::disk('local')->putFile('books', $request->file('file')));
        }

        if ($request->hasFile('cover')) {
            if (Storage::disk('public')->exists('covers/' . $book->cover_path)) {
                Storage::disk('public')->delete('covers/' . $book->cover_path);
            }
            $book->cover_path = basename(Storage::disk('public')->putFile('covers', $request->file('cover')));
        }

        $book->update([
            'book_category_id' => $request->book_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        toast('Buku berhasil diperbarui.', 'success');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        if (Storage::disk('local')->exists('books/' . $book->file_path)) {
            Storage::disk('local')->delete('books/' . $book->file_path);
        }

        if (Storage::disk('public')->exists('covers/' . $book->cover_path)) {
            Storage::disk('public')->delete('covers/' . $book->cover_path);
        }

        $book->delete();

        toast('Buku berhasil dihapus.', 'success');
        return redirect()->route('books.index');
    }

    /**
     * Download the book file.
     */
    public function download(Book $book)
    {
        $this->authorize('download', $book);

        if (!Storage::exists('books/' . $book->file_path)) {
            toast('Buku tidak ditemukan.', 'error');
            return redirect()->back();
        }

        return Storage::download('books/' . $book->file_path);
    }
}
