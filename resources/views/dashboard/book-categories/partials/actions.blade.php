<div class="col-md-2">
    <div class="btn-group-vertical mb-2">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Aksi <i class="mdi mdi-chevron-down"></i> </button>
        <div class="dropdown-menu" style="">
            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-modal"
                data-bs-name="{{ $bookCategories->name }}" data-bs-id="{{ $bookCategories->id }}">Edit</button>
            <a href="{{ route('book-categories.destroy', $bookCategories) }}" class="dropdown-item"
                data-confirm-delete="true">Hapus</a>
        </div>
    </div>
</div>
