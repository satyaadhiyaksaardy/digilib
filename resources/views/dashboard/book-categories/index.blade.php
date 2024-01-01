@extends('layouts.master')

@section('css')
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet"
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

    <!-- Datatables init -->
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('book-categories.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        width: '5%'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '75%'
                    },
                    {
                        data: 'books_count',
                        name: 'books_count',
                        width: '10%'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        width: '10%'
                    },
                ],
            });
        });
    </script>

    <!-- Modal -->
    <script type="text/javascript">
        var editModal = document.getElementById('edit-modal')
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')
            var name = button.getAttribute('data-bs-name')
            var nameInput = editModal.querySelector('.modal-body input#name')
            var form = editModal.querySelector('form#edit-form')

            form.action = `{{ route('book-categories.index') }}/${id}`
            nameInput.value = name
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
                                <h4 class="mt-0 header-title">Data Kategori Buku</h4>
                                <p class="text-muted font-14 mb-3">
                                    Daftar Kategori Buku di DigiLib.
                                </p>
                            </div>
                            <div class="col-md-10">
                                <div class="btn-group-vertical mb-2 float-end">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#create-modal" type="button"
                                        class="btn btn-primary">Tambah
                                        Kategori</a>
                                </div>
                            </div>
                        </div>

                        @if ($uncategorizedBooksCount > 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <strong>Info!</strong> Terdapat <strong>{{ $uncategorizedBooksCount }}</strong>
                                        buku
                                        yang belum dikategorikan.
                                        <a href="{{ route('books.index') }}" class="alert-link">Klik disini</a> untuk
                                        mengkategorikan buku.
                                    </div>
                                </div>
                            </div>
                        @endif

                        <table id="datatable" class="table table-bordered dt-responsive table-responsive ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah Buku</th>
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
    @include('dashboard.book-categories.partials.create-modal')

    <!-- Edit Modal -->
    @include('dashboard.book-categories.partials.edit-modal')
@endsection
