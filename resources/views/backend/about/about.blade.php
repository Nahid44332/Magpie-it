@extends('backend.master')
@section('content')
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <style>
        :root {
            --bg: #0b1220;
            --panel: #151a24;
            --accent: #6C63FF;
            --accent2: #4641B3;
        }

        body {
            background: var(--bg);
            color: #fff;
            font-family: 'Inter', sans-serif;
        }

        .card-dark {
            background: var(--panel);
            border: 1px solid var(--accent);
            border-radius: 16px;
            box-shadow: 0 0 25px rgba(108, 99, 255, 0.25);
            transition: 0.3s ease;
            padding: 30px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(90deg, #a267ff, #6C63FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 25px;
        }

        .form-control {
            background: #0F1A2A;
            border: 1px solid #4641B3;
            color: #fff;
        }

        .form-control:focus {
            background: #0F1A2A;
            border-color: #6C63FF;
            box-shadow: 0 0 10px rgba(108, 99, 255, 0.4);
            color: #fff;
        }

        label {
            margin-bottom: 6px;
            font-size: 14px;
            color: #bbb;
        }

        .btn-custom {
            background: linear-gradient(90deg, #a267ff, #6C63FF);
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            color: #fff;
            transition: .3s;
        }

        .btn-custom:hover {
            background: var(--accent2);
        }

        .remove-item {
            background: #ff4d4d;
            border: none;
            padding: 5px 10px;
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 28px;
        }

        a {
            text-decoration: none;
        }

        /* ===== Summernote Dark Fix ===== */

        .note-editor.note-frame {
            background: #0F1A2A;
            border: 1px solid #4641B3;
            border-radius: 10px;
        }

        .note-toolbar {
            background: #151a24 !important;
            border-bottom: 1px solid #4641B3;
        }

        .note-btn {
            background: #0F1A2A !important;
            color: #fff !important;
            border: 1px solid #4641B3 !important;
        }

        .note-btn:hover {
            background: #6C63FF !important;
            color: #fff !important;
        }

        .note-editable {
            background: #0F1A2A !important;
            color: #fff !important;
        }

        .note-statusbar {
            background: #151a24 !important;
            border-top: 1px solid #4641B3;
        }

        .note-dropdown-menu {
            background: #151a24 !important;
            color: #fff;
        }

        .note-dropdown-item:hover {
            background: #6C63FF !important;
            color: #fff !important;
        }

        .custom-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-box {
            background: #151a24;
            padding: 30px;
            border-radius: 16px;
            width: 400px;
            border: 1px solid #6C63FF;
            transform: scale(0.7);
            opacity: 0;
            transition: 0.3s ease;
        }

        .custom-modal.active {
            display: flex;
        }

        .custom-modal.active .modal-box {
            transform: scale(1);
            opacity: 1;
        }
    </style>

    <div class="container py-5">
        <div class="card-dark">

            <h3 class="section-title">Update About Section</h3>

            <form action="{{ url('/admin/about/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <!-- About Title -->
                    <div class="col-md-12 mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $abouts->title }}" class="form-control">
                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" id="summernote" rows="4" class="form-control">{{ $abouts->description }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="col-md-6 mb-3">
                        <label>About Image</label>
                        <input type="file" name="image" class="form-control">
                        <div class="mt-3">
                            <img src="{{ asset('backend/images/abouts/' . $abouts->image) }}" alt="" height="100"
                                width="100">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Experience Years</label>
                        <input type="number" name="years_of_expertise" value="{{ $abouts->years_of_expertise }}"
                            class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Happy Clients</label>
                        <input type="number" name="happy_client" value="{{ $abouts->happy_client }}" class="form-control">
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn-custom">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr class="my-5">

    <div class="card-dark">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="section-title m-0">Why Choose Us Cards</h3>
            <button class="btn-custom" id="openAddModal">+ Add Card</button>
        </div>

        <div class="row" id="cardList">
            @foreach ($whyus as $item)
        <div class="col-md-4 mb-4 card-item" data-id="{{$item->id}}">
            <div class="p-4 card-inner" style="background:#0F1A2A;border:1px solid #4641B3;border-radius:12px;">
                <i class="{{$item->icon}}"></i>
                <h5>{{$item->title}}</h5>
                <p>{{$item->description}}</p>
                <h4>{{$item->count}}</h4>
                <small>{{$item->count_title}}</small>

                <div class="mt-3">
                    <button class="btn btn-sm btn-info editBtn">Edit</button>
                    <button class="btn btn-sm btn-danger deleteBtn">Delete</button>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>

    <div class="custom-modal" id="cardModal">
        <div class="modal-box">
            <h4 id="modalTitle">Add Card</h4>

            <form id="cardForm">
                @csrf
                <input type="hidden" id="cardId">

                <input type="text" name="icon" placeholder="Icon Class" class="form-control mb-2">
                <input type="text" name="title" placeholder="Title" class="form-control mb-2">
                <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
                <input type="text" name="count" placeholder="Count" class="form-control mb-2">
                <input type="text" name="count_title" placeholder="Count Title" class="form-control mb-2">

                <div class="text-end mt-3">
                    <button type="submit" class="btn-custom">Save</button>
                    <button type="button" class="btn btn-secondary" id="closeModal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250,
                placeholder: 'Write your description here...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            function openModal() {
                $('#cardModal').addClass('active');
            }

            function closeModal() {
                $('#cardModal').removeClass('active');
                $('#cardForm')[0].reset();
                $('#cardId').val('');
            }

            $('#openAddModal').click(function() {
                $('#modalTitle').text('Add Card');
                openModal();
            });

            $('#closeModal').click(function() {
                closeModal();
            });

            // Save / Update

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $('#cardForm').submit(function(e) {
                e.preventDefault();

                let id = $('#cardId').val();
                let url = id ?
                    "/admin/whyus/update/" + id :
                    "/admin/whyus/store";

                $.post(url, $(this).serialize(), function(data) {
                    location.reload();
                });
            });

            // Edit
            $('.editBtn').click(function() {
                let parent = $(this).closest('.card-item');
                let id = parent.data('id');

                $('#cardId').val(id);
                $('#modalTitle').text('Edit Card');

                $('input[name=icon]').val(parent.find('i').attr('class'));
                $('input[name=title]').val(parent.find('h5').text());
                $('textarea[name=description]').val(parent.find('p').text());
                $('input[name=count]').val(parent.find('h4').text());
                $('input[name=count_title]').val(parent.find('small').text());

                openModal();
            });

            // Delete
            $('.deleteBtn').click(function() {
                if (confirm('Delete this card?')) {
                    let id = $(this).closest('.card-item').data('id');
                    $.ajax({
                        url: "/admin/whyus/delete/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });

        });
    </script>
@endpush
