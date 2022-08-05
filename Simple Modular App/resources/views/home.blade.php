@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="contianer">

            <h3>Instansi</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Instansi">
                <label for="floatingInput">Instansi</label>
            </div>
            <button class="btn btn-primary">Simpan</button>

        </div>

        <div class="container mt-5">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                + Tambah
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('institute.store') }}" method="POST">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="namaInstansi" placeholder="Instansi"
                                        name="name">
                                    <label for="namaInstansi">Nama Instansi</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" style="height: 100px"
                                        name="description"></textarea>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Instansi</th>
                    <th>Deskripsi</th>
                </thead>
                <tbody>
                    @foreach ($institute as $institutes)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <form action="/institute/edit/{{ $institutes->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('patch')

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalUpdate" tabindex="-1"
                                        aria-labelledby="modalUpdate" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalUpdate">Edit Institute</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="namaInstansi" placeholder="Instansi"
                                                            name="name" value="{{ $institutes->name }}">
                                                        <label for="namaInstansi">Nama Instansi</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" style="height: 100px"
                                                            name="description">{{ $institutes->description }}</textarea>
                                                        <label for="deskripsi">Deskripsi</label>
                                                    </div>
                    
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="{{ $institutes->id }}" name="id">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Ubah Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <form action="/institute/delete/{{ $institutes->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDelete" tabindex="-1"
                                        aria-labelledby="modalDelete" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDelete">Delete Institute</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="{{ $institutes->id }}" name="id">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Hapus Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </td>
                            <td>{{ $institutes->name }}</td>
                            <td>{{ $institutes->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
