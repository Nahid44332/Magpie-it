@extends('backend.master')
@section('content')
    <style>
        :root {
            --bg: #0b1220;
            --panel: #151a24;
            --accent: #6C63FF;
            --accent2: #4641B3;
        }

        body {
            background: #081028;
            color: #fff;
            font-family: Inter, sans-serif;
            padding: 30px;
        }

        /* Card Shadow */
        .card-dark {
            background: var(--panel);
            border: 2px solid var(--accent);
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(108, 99, 255, 0.25);
            transition: 0.3s;
        }

        .card-dark:hover {
            box-shadow: 0 0 35px rgba(108, 99, 255, 0.45);
        }

        /* Buttons */
        .btn-custom {
            background: linear-gradient(90deg, #a267ff, #6C63FF);
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background: var(--accent2);
        }

        /* Table */
        .table-dark th {
            background: #20232d;
            color: #6C63FF;
        }

        /* Modal */
        .modal-content {
            background: #151a24;
            border: 2px solid #6C63FF;
            color: #fff;
            border-radius: 12px;
        }

        .form-control {
            background: #0F1A2A;
            color: #fff;
            border: 1px solid #4641B3;
        }

        .form-control:focus {
            border-color: #6C63FF;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        }

        img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        a {
            text-decoration: none;
        }
    </style>
    </head>

    <body>

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
                <h3>Manage Banner</h3>
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus-circle"></i> Add Banner
                </button>
            </div>

            <div class="card card-dark p-3">
                <div class="table-responsive">
                    <table class="table table-dark table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Projects</th>
                                <th>Clients %</th>
                                <th>Team</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->subtitle }}</td>
                                    <td>{{ $banner->projects_completed }}</td>
                                    <td>{{ $banner->client_satisfaction }}</td>
                                    <td>{{ $banner->team_members }}</td>
                                    <td><img src="{{ asset('backend/images/banner/' . $banner->image) }}"></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-warning editBtn" data-id="{{ $banner->id }}"
                                            data-title="{{ $banner->title }}" data-subtitle="{{ $banner->subtitle }}"
                                            data-projects="{{ $banner->projects_completed }}"
                                            data-clients="{{ $banner->client_satisfaction }}"
                                            data-team="{{ $banner->team_members }}"
                                            data-image="{{ asset('backend/images/banner/' . $banner->image) }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- ADD MODAL -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5>Add Banner</h5>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ url('/admin/banner/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Title</label>
                                    <input class="form-control" name="title">
                                </div>
                                <div class="col-md-6">
                                    <label>Sub Title</label>
                                    <input class="form-control" name="subtitle">
                                </div>
                                <div class="col-md-4">
                                    <label>Projects Completed</label>
                                    <input type="number" class="form-control" name="projects_completed">
                                </div>
                                <div class="col-md-4">
                                    <label>Client Satisfaction</label>
                                    <input type="number" class="form-control" name="client_satisfaction">
                                </div>
                                <div class="col-md-4">
                                    <label>Team Members</label>
                                    <input type="number" class="form-control" name="team_members">
                                </div>
                                <div class="col-md-4">
                                    <label>Banner Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-custom">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- EDIT MODAL -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5>Edit Banner</h5>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="editForm" action="{{ url('/admin/banner/update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit_id">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Title</label>
                                    <input class="form-control" id="edit_title" name="title">
                                </div>
                                <div class="col-md-6">
                                    <label>Sub Title</label>
                                    <input class="form-control" id="edit_subtitle" name="subtitle">
                                </div>
                                <div class="col-md-4">
                                    <label>Projects Completed</label>
                                    <input type="number" class="form-control" id="edit_projects" name="projects_completed">
                                </div>
                                <div class="col-md-4">
                                    <label>Client Satisfaction</label>
                                    <input type="number" class="form-control" id="edit_clients" name="client_satisfaction">
                                </div>
                                <div class="col-md-4">
                                    <label>Team Members</label>
                                    <input type="number" class="form-control" id="edit_team" name="team_members">
                                </div>
                                <div class="col-md-6">
                                    <label>Banner Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <img id="edit_image_preview" class="mt-2"
                                        style="width: 80px; height: 80px; border-radius: 8px;">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-custom">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- DELETE MODAL -->
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content text-center">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <i class="bi bi-exclamation-triangle text-danger fs-2"></i>
                            <p class="mt-2">Delete this banner?</p>
                            <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editModal');
            const editButtons = document.querySelectorAll('.editBtn');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const title = this.dataset.title;
                    const subtitle = this.dataset.subtitle;
                    const projects = this.dataset.projects;
                    const clients = this.dataset.clients;
                    const team = this.dataset.team;
                    const image = this.dataset.image;

                    // Form field গুলোতে ডেটা সেট করো
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_title').value = title;
                    document.getElementById('edit_subtitle').value = subtitle;
                    document.getElementById('edit_projects').value = projects;
                    document.getElementById('edit_clients').value = clients;
                    document.getElementById('edit_team').value = team;
                    document.getElementById('edit_image_preview').src = image;

                    // ফর্মের action URL আপডেট করো
                    document.getElementById('editForm').action = `/admin/banner/update/${id}`;
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-outline-danger');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const tr = this.closest('tr');
                    const id = tr.querySelector('.editBtn').dataset.id;

                    // Form action set
                    deleteForm.action = `/admin/banner/delete/${id}`;
                });
            });
        });
    </script>
@endpush
