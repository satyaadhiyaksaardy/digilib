<div class="col-md-2">
    <div class="btn-group-vertical mb-2">
        <a href="{{ route('books.download', $book) }}" type="button" class="btn btn-success">Download</a>
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Aksi <i class="mdi mdi-chevron-down"></i> </button>
        <div class="dropdown-menu" style="">
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-modal"
                data-bs-id="{{ $book->id }}" data-bs-user-id="{{ $book->user_id }}"
                data-bs-title="{{ $book->title }}" data-bs-author="{{ $book->user->name }}"
                data-bs-description="{{ $book->description }}" data-bs-quantity="{{ $book->quantity }}"
                data-bs-category-id="{{ $book->bookCategory->id ?? '-' }}"
                data-bs-category-name="{{ $book->bookCategory->name ?? 'N/A' }}">Edit</a>
            <a href="{{ route('books.destroy', $book) }}" class="dropdown-item" data-confirm-delete="true">Hapus</a>
        </div>
    </div>
</div>
