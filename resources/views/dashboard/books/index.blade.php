@extends('layouts.master')

@section('css')
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
                dom: 'lBfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('books.index') }}",
                    data: function(d) {
                        d.filterCategory = $('#categoryFilter').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'cover',
                        name: 'cover',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'user',
                        name: 'user',
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            $('#categoryFilter').on('change', function() {
                table.draw();
            });
        });
    </script>

    <script type="text/javascript">
        var editModal = document.getElementById('edit-modal')
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget

            var id = button.getAttribute('data-bs-id')
            var title = button.getAttribute('data-bs-title')
            var author = button.getAttribute('data-bs-user-id')
            var categoryId = button.getAttribute('data-bs-category-id')
            var categoryName = button.getAttribute('data-bs-category-name')
            var description = button.getAttribute('data-bs-description')
            var quantity = button.getAttribute('data-bs-quantity')

            var titleInput = editModal.querySelector('.modal-body input#title')
            var authorInput = editModal.querySelector('form input#user_id')
            var categoryInput = editModal.querySelector('.modal-body select#book_category_id')
            var descriptionInput = editModal.querySelector('.modal-body textarea#description')
            var quantityInput = editModal.querySelector('.modal-body input#quantity')

            var form = editModal.querySelector('form#edit-form')
            form.action = `{{ route('books.index') }}/${id}`

            titleInput.value = title
            authorInput.value = author
            descriptionInput.textContent = description
            quantityInput.value = quantity
            categoryInput.value = categoryId
        })
    </script>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row pb-3">
                            <div class="col-md-2">
                                <h4 class="mt-0 header-title">Data Buku</h4>
                                <p class="text-muted font-14 mb-3">
                                    Daftar Koleksi Buku DigiLib.
                                </p>
                            </div>
                            <div class="col-md-10">
                                <div class="btn-group-vertical mb-2 float-end">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#create-modal" type="button"
                                        class="btn btn-primary">Tambah
                                        Buku</a>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-2">
                                <form action="#">
                                    <label for="categoryFilter">Filter Kategori:</label>
                                    <select class="form-select" id="categoryFilter">
                                        <option value="">Semua Kategori</option>
                                        @foreach ($bookCategories as $id => $category)
                                            <option value="{{ $id }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-10">
                            </div>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive table-responsive ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- end row -->

    </div>

    <!-- Create Modal -->
    @include('dashboard.books.partials.create-modal')

    <!-- Edit Modal -->
    @include('dashboard.books.partials.edit-modal')
@endsection
