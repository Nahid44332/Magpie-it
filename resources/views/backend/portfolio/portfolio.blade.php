@extends('backend.master')
@section('content')
    <style>
        :root {
            --bg: #0b1220;
            --panel: #0f1a2a;
            --muted: #a6b0c3;
            --accent: #6c63ff;
            --accent2: #4641B3;
            --glass: rgba(255, 255, 255, 0.03);
        }

        body {
            margin: 0;
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: #081028;
            color: #e6eef8;
            display: flex;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .muted {
            color: var(--muted);
            font-size: 13px;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            background: #081028;
            padding: 28px 20px;
            transition: transform 0.3s ease;
            z-index: 1100;
        }

        /* Desktop */
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0);
            }

            .main {
                margin-left: 260px;
                transition: margin 0.3s ease;
            }

            .mobile-sidebar-toggle {
                display: none;
            }
        }

        /* Mobile */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .mobile-sidebar-toggle {
                display: flex;
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 1200;
                flex-direction: column;
                justify-content: space-between;
                width: 30px;
                height: 22px;
                background: none;
                border: none;
                cursor: pointer;
            }

            .mobile-sidebar-toggle span {
                display: block;
                height: 4px;
                width: 100%;
                background: #fff;
                border-radius: 2px;
            }
        }

        /* Overlay for mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1000;
            transition: opacity 0.3s ease;
        }

        .overlay.show {
            display: block;
        }

        /* Brand & Menu */
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .brand h4 {
            margin: 0;
            color: #fff;
            font-weight: 700;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 500;
        }

        .menu a.active {
            color: var(--accent);
            background: linear-gradient(90deg, rgba(108, 99, 255, 0.12), rgba(70, 65, 179, 0.06));
        }

        .menu a:hover {
            color: var(--accent);
            background: rgba(108, 99, 255, 0.03);
        }

        .cta-get {
            margin-top: auto;
            padding: 10px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            color: #fff;
            background: linear-gradient(90deg, #a267ff, #6c63ff);
            box-shadow: 0 6px 18px rgba(108, 99, 255, 0.15);
            cursor: pointer;
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 28px;
            overflow: auto;
        }

        /* Navbar */
        .navbar-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 28px;
            background: #0B1739;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            z-index: 900;
            border-radius: 10px;
        }

        .navbar-top h5 {
            margin: 0;
            color: #fff;
            font-weight: 600;
        }

        .user-menu {
            position: relative;
            display: flex;
            align-items: center;
        }

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .user-trigger img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-trigger span {
            font-size: 14px;
            color: #ccc;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 100%;
            right: 0;
            background: #081028;
            border-radius: 8px;
            padding: 8px 0;
            display: none;
            flex-direction: column;
            min-width: 160px;
            z-index: 999;
        }

        .user-menu.active .dropdown-menu-custom {
            display: flex;
        }

        .dropdown-menu-custom a {
            padding: 10px 14px;
            color: #ccc;
            font-size: 14px;
            display: block;
        }

        .dropdown-menu-custom a:hover {
            background: #0B1739;
            color: #fff;
        }

        /* Footer */
        .footer {
            background: #0B1739;
            color: #a6b0c3;
            text-align: center;
            padding: 12px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.03);
            font-size: 13px;
        }

        #langSwitch {
            display: none;
        }

        .portfolio-card {
            background: #1a1a1a;
            border: 1px solid #6C63FF;
            border-radius: 12px;
            transition: all 0.4s ease;
            box-shadow: 0 0 12px rgba(108, 99, 255, 0.2);
        }

        .portfolio-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 22px rgba(108, 99, 255, 0.5);
        }

        .portfolio-img {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .portfolio-card:hover .portfolio-img {
            transform: scale(1.03);
        }

        .badges .badge {
            margin-right: 5px;
        }

        .btn-outline-info:hover {
            background-color: #6C63FF;
            color: #fff;
            border-color: #6C63FF;
            transition: 0.3s;
        }

        .btn-outline-danger:hover {
            background-color: #4641B3;
            border-color: #4641B3;
            color: #fff;
        }

        .card-dark {
            background-color: #151a24;
            border: 2px solid #6C63FF;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(108, 99, 255, 0.2);
        }

        .btn-custom {
            background-color: #6C63FF;
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #4641B3;
        }

        .table-dark th {
            background-color: #20232d;
            color: #6C63FF;
        }

        .modal-content {
            background-color: #151a24;
            border: 2px solid #6C63FF;
            border-radius: 10px;
            color: #fff;
            transition: 0.3s ease-in-out;
        }

        .form-control,
        .form-select {
            background-color: #0F1A2A;
            color: #fff;
            border: 1px solid #4641B3;
        }

        .form-control:focus {
            border-color: #6C63FF;
            box-shadow: 0 0 6px rgba(108, 99, 255, 0.3);
        }

        .modal-header {
            border-bottom: 2px solid #6C63FF;
        }


        :root {
            --bg: #0b1220;
            --panel: #0f1a2a;
            --muted: #a6b0c3;
            --accent: #6C63FF;
            --accent2: #4641B3;
            --glass: rgba(255, 255, 255, 0.03);
        }

        /* Portfolio Card Custom Size */
        .portfolio-card {
            max-width: 300px;
            /* width কমানো */
            padding: 15px;
            /* padding কমানো */
            margin: auto;
            /* center alignment */
            height: auto;
            /* auto height */
            transition: all 0.3s ease;
        }

        .portfolio-card img.portfolio-img {
            height: 150px;
            /* image height কমানো */
            object-fit: cover;
        }

        body {
            margin: 0;
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: var(--bg);
            color: #e6eef8;
        }

        /* ===== Buttons ===== */
        .btn-custom {
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: var(--accent2);
            box-shadow: 0 6px 18px rgba(108, 99, 255, 0.3);
        }

        .btn-outline-secondary,
        .btn-outline-warning,
        .btn-outline-danger {
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover,
        .btn-outline-warning:hover,
        .btn-outline-danger:hover {
            color: #fff;
            box-shadow: 0 6px 18px rgba(108, 99, 255, 0.3);
        }

        /* ===== Card ===== */
        .card-dark {
            background-color: var(--panel);
            border: 2px solid var(--accent);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            transition: all 0.3s ease;
        }

        .card-dark:hover {
            box-shadow: 0 12px 30px rgba(108, 99, 255, 0.5);
            border-color: var(--accent2);
        }

        /* ===== Table ===== */
        .table-dark {
            background-color: var(--panel);
            color: #e6eef8;
        }

        .table-dark th,
        .table-dark td {
            border-color: rgba(108, 99, 255, 0.2);
            vertical-align: middle;
            text-align: center;
            transition: all 0.3s ease;
        }

        .table-dark tr:hover {
            background: rgba(108, 99, 255, 0.05);
        }

        /* ===== Form Inputs ===== */
        .form-control,
        .form-select {
            background-color: #0F1A2A;
            color: #fff;
            border: 1px solid #4641B3;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        }

        /* ===== Modal ===== */
        .modal-content {
            background-color: var(--panel);
            border: 2px solid var(--accent);
            border-radius: 12px;
            color: #fff;
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            transition: all 0.3s ease;
        }

        .modal-content:hover {
            box-shadow: 0 12px 30px rgba(108, 99, 255, 0.5);
        }

        .modal-header,
        .modal-footer {
            border-color: var(--accent);
        }

        .btn-close-white {
            filter: invert(1);
        }

        /* ===== Images ===== */
        .table img,
        .card img {
            border-radius: 50%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .table img:hover,
        .card img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 18px rgba(108, 99, 255, 0.3);
        }

        /* ===== Headings ===== */
        h3.fw-bold {
            color: var(--accent);
        }

        label {
            font-weight: 500;
            color: #e6eef8;
        }

        /* ===== Small Links ===== */
        small a {
            color: var(--accent);
            text-decoration: underline;
            transition: 0.3s;
        }

        small a:hover {
            color: var(--accent2);
        }

        /* ===== Scrollbar ===== */
        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }


        /* ===== Responsive Sidebar ===== */
        @media (max-width:1200px) {
            .cards-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .panels {
                grid-template-columns: 1fr;
            }

            .lower-grid {
                grid-template-columns: 1fr;
            }
        }

        /* =========================
                                                           GLOBAL RESPONSIVE FIX
                                                        ========================= */
        img,
        canvas {
            max-width: 100%;
            height: auto;
        }

        /* =========================
                                                           MAIN CONTENT RESPONSIVE
                                                        ========================= */
        @media (max-width: 992px) {
            .main {
                padding: 20px;
            }
        }

        /* =========================
                                                           NAVBAR FIX
                                                        ========================= */
        @media (max-width: 576px) {
            .navbar-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        /* =========================
                                                           SIDEBAR MOBILE SAFE
                                                        ========================= */
        @media (max-width: 768px) {
            .sidebar {
                width: 240px;
            }
        }

        /* ===== MOBILE SIDEBAR SCROLL FIX ===== */
        @media (max-width: 768px) {
            .sidebar {
                height: 100vh;
                /* full screen height */
                overflow-y: auto;
                /* vertical scroll enable */
                -webkit-overflow-scrolling: touch;
                /* smooth mobile scroll */
            }
        }

        /* ===============================
                                                           GLOBAL MOBILE SCROLL FIX
                                                        ================================ */
        @media (max-width: 768px) {
            body {
                display: block;
                overflow-x: hidden;
            }
        }

        @media (max-width: 768px) {
            .portfolio-card {
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .modal-dialog {
                margin: 10px;
            }

            .modal-body {
                max-height: 70vh;
                overflow-y: auto;
            }
        }
    </style>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-light">Manage Portfolio</h3>
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                <i class="bi bi-plus-circle"></i> Add Portfolio
            </button>
        </div>

        <div class="row g-4">
            @if ($portfolios && $portfolios->count() > 0)
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4">
                        <div class="card portfolio-card p-3">
                            <img src="{{ asset($portfolio->main_image ?? 'default-image.jpg') }}"
                                alt="{{ $portfolio->title }}" class="portfolio-img img-fluid rounded">

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-light fw-semibold">{{ $portfolio->category }}</span>
                                <div class="rating text-warning">
                                    <i class="bi bi-star-fill"></i> <span>{{ $portfolio->rating ?? '0' }}</span>
                                </div>
                            </div>

                            <div class="mt-2">
                                <h5 class="text-white fw-bold">{{ $portfolio->title }}</h5>
                                <p class="text-light small mb-2">{{ $portfolio->description }}</p>

                                @php
                                    $colors = [
                                        'bg-primary',
                                        'bg-info',
                                        'bg-success',
                                        'bg-warning',
                                        'bg-danger',
                                        'bg-secondary',
                                    ];
                                    $techs = is_string($portfolio->technologies)
                                        ? json_decode($portfolio->technologies, true)
                                        : $portfolio->technologies;
                                @endphp

                                <div class="badges">
                                    @if (!empty($techs))
                                        @foreach ($techs as $index => $tech)
                                            <span class="badge {{ $colors[$index % count($colors)] }}">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn btn-outline-info btn-sm editPortfolioBtn" data-id="{{ $portfolio->id }}"
                                    data-title="{{ $portfolio->title }}" data-category="{{ $portfolio->category }}"
                                    data-description="{{ $portfolio->description }}"
                                    data-rating="{{ $portfolio->rating }}"
                                    data-technologies="{{ json_encode($portfolio->technologies) }}" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-outline-danger deletePortfolioBtn"
                                    data-id="{{ $portfolio->id }}">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center mt-5">
                    <p class="text-muted">No portfolio items found. Click "Add Portfolio" to create one.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Add Portfolio Modal -->
    <div class="modal fade mt-5" id="addPortfolioModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">Add New Portfolio</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="portfolioForm" action="{{ route('portfolio.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h6 class="text-info border-bottom border-secondary pb-2">Basic Information</h6>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter project title"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control"
                                    placeholder="e.g., Fintech, Web, App">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Client/Company Name</label>
                                <input type="text" name="company_name" class="form-control"
                                    placeholder="Enter company name">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Project Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Rating</label>
                                <input type="number" name="rating" class="form-control" placeholder="e.g., 4.8"
                                    step="0.1" min="0" max="5">
                            </div>

                            <div class="col-md-12 mt-4">
                                <h6 class="text-info border-bottom border-secondary pb-2">Technology Stack</h6>
                            </div>
                            <div class="col-md-12">
                                <div id="techWrapper">
                                    <div class="input-group mb-2">
                                        <input type="text" name="technologies[]" class="form-control"
                                            placeholder="Add Technology (e.g. Laravel, React, Swift)">
                                        <button class="btn btn-outline-info addTechBtn" type="button">Add More</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <h6 class="text-info border-bottom border-secondary pb-2">Media & External Links</h6>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Main Project Image</label>
                                <input type="file" name="main_image" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gallery Images</label>
                                <div id="galleryWrapper">
                                    <div class="input-group mb-2">
                                        <input type="file" name="image[]" class="form-control" multiple>
                                        <button class="btn btn-outline-info addGalleryBtn" type="button">Add
                                            More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Live Preview Link</label>
                                <input type="url" name="live_link" class="form-control"
                                    placeholder="https://example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Github Repository Link</label>
                                <input type="url" name="github_link" class="form-control"
                                    placeholder="https://github.com/username/repo">
                            </div>

                            <div class="col-md-12 mt-4">
                                <h6 class="text-info border-bottom border-secondary pb-2">Project Details</h6>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Short Description (for Card)</label>
                                <textarea class="form-control" name="description" rows="2"
                                    placeholder="This will show on the main portfolio card..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Project Overview</label>
                                <textarea class="form-control" name="overview" rows="3" placeholder="Deep dive into the project..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">The Challenge</label>
                                <textarea class="form-control" name="challenge" rows="3" placeholder="What problems did you face?"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">The Solution</label>
                                <textarea class="form-control" name="solution" rows="3" placeholder="How did you solve it?"></textarea>
                            </div>

                            <div class="col-md-12 mt-4">
                                <h6 class="text-info border-bottom border-secondary pb-2">Key Features</h6>
                            </div>
                            <div class="col-md-12">
                                <div id="featuresWrapper">
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[]" class="form-control"
                                            placeholder="Enter a key feature">
                                        <button class="btn btn-outline-info addFeatureBtn" type="button">Add
                                            More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-secondary">
                                <button type="button" class="btn btn-outline-light px-4"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" form="portfolioForm" class="btn btn-info px-4 text-white">Save
                                    Portfolio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Portfolio Modal -->
    <div class="modal fade mt-5" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-white">
                <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5>Edit Portfolio</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <input type="hidden" id="edit_id">
                            <div class="col-md-6">
                                <label>Project Title</label>
                                <input type="text" name="title" id="edit_title" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Category</label>
                                <input type="text" name="category" id="edit_category" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Rating</label>
                                <input type="number" name="rating" id="edit_rating" class="form-control"
                                    step="0.1">
                            </div>
                            <div class="col-md-12">
                                <label>Technologies</label>
                                <div id="editTechWrapper">
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2 addEditTechBtn">Add More
                                    Technology</button>
                            </div>
                            {{-- <div class="col-md-6">
                            <label>Live Project Link</label>
                            <input type="url" name="live_link" id="edit_live_link" class="form-control">
                        </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-info px-4 text-white">Update Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade mt-5" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to delete this project?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-light">Portfolio Details</h3>
        </div>

        <div class="card card-dark p-3">
            <div class="table-responsive">
                <table class="table table-dark table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Project Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Company name</th>
                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($portfolios && $portfolios->count() > 0)
                            @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td>
                                        <img src="{{ asset($portfolio->main_image) }}" alt="Preview" width="60"
                                            class="rounded">
                                    </td>
                                    <td>{{ $portfolio->title }}</td>
                                    <td>{{ $portfolio->category }}</td>
                                    <td>{{ $portfolio->date }}</td>
                                    <td>{{ $portfolio->company_name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-warning editDetailsBtn"
                                            data-id="{{ $portfolio->id }}"
                                            data-intro_title="{{ $portfolio->intro_title }}"
                                            data-intro_description="{{ $portfolio->intro_description }}"
                                            data-title="{{ $portfolio->title }}"
                                            data-category="{{ $portfolio->category }}"
                                            data-technologies="{{ json_encode($portfolio->technologies) }}"
                                            data-date="{{ $portfolio->date }}"
                                            data-company_name="{{ $portfolio->company_name }}"
                                            data-description="{{ $portfolio->description }}"
                                            data-live_link="{{ $portfolio->live_link }}"
                                            data-github_link="{{ $portfolio->github_link }}"
                                            data-overview="{{ $portfolio->overview }}"
                                            data-challenge="{{ $portfolio->challenge }}"
                                            data-solution="{{ $portfolio->solution }}"
                                            data-features="{{ json_encode($portfolio->features) }}"
                                            data-bs-toggle="modal" data-bs-target="#editDetailsModal">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger deletePortfolioBtn"
                                            data-id="{{ $portfolio->id }}">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No portfolio details available.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Portfolio Modal -->
    {{-- <div class="modal fade mt-5" id="addPortfolioDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Portfolio</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Portfolio Intro -->
                            <div class="col-md-6">
                                <label>Portfolio Intro Title</label>
                                <input type="text" class="form-control" placeholder="Enter intro title">
                            </div>
                            <div class="col-md-6">
                                <label>Portfolio Intro Description</label>
                                <input type="text" class="form-control" placeholder="Enter intro description">
                            </div>
                            <!-- Project Basic Info -->
                            <div class="col-md-6">
                                <label>Project Title</label>
                                <input type="text" class="form-control" placeholder="Enter project title">
                            </div>
                            <div class="col-md-6">
                                <label>Project Category</label>
                                <input type="text" class="form-control" placeholder="e.g., Fintech, Web, App">
                            </div>
                            <div class="col-md-12">
                                <label>Project Technology</label>
                                <div id="techWrapper">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="e.g., Fintech, Web, App">
                                        <button class="btn btn-outline-secondary addTechBtn" type="button">Add
                                            More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Company Name</label>
                                <input type="text" class="form-control" placeholder="Enter company name">
                            </div>
                            <!-- Description & Link -->
                            <div class="col-md-12">
                                <label>Project Description</label>
                                <textarea class="form-control" rows="3" placeholder="Short project description..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Live Link</label>
                                <input type="url" class="form-control" placeholder="https://example.com/project">
                            </div>
                            <div class="col-md-6">
                                <label>GithubLink</label>
                                <input type="url" class="form-control" placeholder="https://github.com/project">
                            </div>
                            <div class="col-md-6">
                                <label>Main Project Image</label>
                                <input type="file" class="form-control">
                            </div>
                            <!-- Gallery Images -->
                            <div class="col-md-6">
                                <label>Gallery Images</label>
                                <div id="galleryWrapper">
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control">
                                        <button class="btn btn-outline-secondary addGalleryBtn" type="button">Add
                                            More</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Detailed Sections -->
                            <div class="col-md-12">
                                <label>Project Overview</label>
                                <textarea class="form-control" rows="3" placeholder="Write project overview..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>The Challenge</label>
                                <textarea class="form-control" rows="3" placeholder="Describe the challenge..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>The Solution</label>
                                <textarea class="form-control" rows="3" placeholder="Describe the solution..."></textarea>
                            </div>
                            <!-- Key Features -->
                            <div class="col-md-12">
                                <label>Key Features</label>
                                <div id="featuresWrapper">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Feature 1">
                                        <button class="btn btn-outline-secondary addFeatureBtn" type="button">Add
                                            More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-custom px-4">Save Portfolio</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Edit Portfolio Modal -->
    <div class="modal fade mt-5" id="editDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Portfolio</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Portfolio Intro -->
                            <div class="col-md-6">
                                <label>Portfolio Intro Title</label>
                                <input type="text" class="form-control" value="Fintech Mobile Solution Intro">
                            </div>
                            <div class="col-md-6">
                                <label>Portfolio Intro Description</label>
                                <input type="text" class="form-control"
                                    value="Cras ultricies ligula sed magna dictum porta.">
                            </div>
                            <!-- Project Basic Info -->
                            <div class="col-md-6">
                                <label>Project Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="Fintech Mobile Solution">
                            </div>
                            <div class="col-md-6">
                                <label>Project Category</label>
                                <input type="text" name="category" id="category" class="form-control"
                                    value="Fintech">
                            </div>
                            <div class="col-md-12">
                                <label>Project Technology</label>
                                <div id="editTechWrapper">
                                    <div class="input-group mb-2 mt-2">
                                        <input type="text" class="form-control" value="Swift">
                                        <button class="btn btn-outline-secondary addEditTechBtn" type="button">Add
                                            More</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" value="Kotlin">
                                        <button class="btn btn-outline-danger removeEditTechBtn"
                                            type="button">Remove</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" value="Blockchain">
                                        <button class="btn btn-outline-danger removeEditTechBtn"
                                            type="button">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Date</label>
                                <input type="date" name="date" id="date" class="form-control"
                                    value="">
                            </div>
                            <div class="col-md-6">
                                <label>Company Name</label>
                                <input type="text" name="company_name" id="company_name" class="form-control"
                                    value="DigitalCraft Solutions">
                            </div>
                            <!-- Description & Link -->
                            <div class="col-md-12">
                                <label>Project Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Live Link</label>
                                <input type="url" name="live_link" id="live_link" class="form-control"
                                    value="https://projectwebsite.example.com">
                            </div>
                            <div class="col-md-6">
                                <label>Github Link</label>
                                <input type="url" name="github_link" id="github_link" class="form-control"
                                    value="https://github.com">
                            </div>
                            <div class="col-md-6">
                                <label>Main Project Image</label>
                                <input type="file" class="form-control">
                                <small class="text-white">Current: <a href="assets/img/portfolio/portfolio-12.webp"
                                        target="_blank">View Image</a></small>
                            </div>
                            <!-- Gallery Images -->
                            <div class="col-md-6">
                                <label>Gallery Images</label>
                                <div id="editGalleryWrapper">
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control">
                                        <small class="text-white ms-2">Current: <a
                                                href="assets/img/portfolio/portfolio-4.webp"
                                                target="_blank">View</a></small>&nbsp;&nbsp;
                                        <button class="btn btn-outline-danger removeGalleryBtn"
                                            type="button">Remove</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control">
                                        <small class="text-white ms-2">Current: <a
                                                href="assets/img/portfolio/portfolio-6.webp"
                                                target="_blank">View</a></small>&nbsp;&nbsp;
                                        <button class="btn btn-outline-danger removeGalleryBtn"
                                            type="button">Remove</button>
                                    </div>
                                    <button class="btn btn-outline-secondary addGalleryBtn" type="button">Add
                                        More</button>
                                </div>
                            </div>
                            <!-- Detailed Sections -->
                            <div class="col-md-12">
                                <label>Project Overview</label>
                                <textarea class="form-control" name="overview" id="overview" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>The Challenge</label>
                                <textarea class="form-control" name="challenge" id="challenge" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>The Solution</label>
                                <textarea class="form-control" name="solution" id="solution" rows="3"></textarea>
                            </div>
                            <!-- Key Features -->
                            <div class="col-md-12">
                                <label>Key Features</label>
                                <div id="editFeaturesWrapper">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" value="Real-time Data Visualization">
                                        <button class="btn btn-outline-danger removeFeatureBtn"
                                            type="button">Remove</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" value="User Role Management">
                                        <button class="btn btn-outline-danger removeFeatureBtn"
                                            type="button">Remove</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" value="Secure Authentication">
                                        <button class="btn btn-outline-danger removeFeatureBtn"
                                            type="button">Remove</button>
                                    </div>
                                    <button class="btn btn-outline-secondary addFeatureBtn" type="button">Add
                                        More</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-custom px-4">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade mt-5" id="deleteDetailsModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to delete this project?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Features Add/Remove (Add Modal)
            const featuresWrapper = document.getElementById("featuresWrapper");
            featuresWrapper.addEventListener("click", function(e) {
                if (e.target.classList.contains("addFeatureBtn")) {
                    e.preventDefault();
                    const div = document.createElement("div");
                    div.classList.add("input-group", "mb-2");
                    div.innerHTML =
                        `<input type="text" name="features[]" class="form-control" placeholder="Feature">
                     <button class="btn btn-outline-danger removeFeatureBtn" type="button">Remove</button>`;
                    featuresWrapper.appendChild(div);
                }
                if (e.target.classList.contains("removeFeatureBtn")) e.target.parentElement.remove();
            });

            // Gallery Add/Remove (Add Modal)
            const galleryWrapper = document.getElementById("galleryWrapper");
            galleryWrapper.addEventListener("click", function(e) {
                if (e.target.classList.contains("addGalleryBtn")) {
                    e.preventDefault();
                    const div = document.createElement("div");
                    div.classList.add("input-group", "mb-2");
                    div.innerHTML =
                        `<input type="file" name="image[]" class="form-control">
                     <button class="btn btn-outline-danger removeGalleryBtn" type="button">Remove</button>`;
                    galleryWrapper.appendChild(div);
                }
                if (e.target.classList.contains("removeGalleryBtn")) e.target.parentElement.remove();
            });

            // Technologies Add/Remove (Add Modal)
            const techWrapper = document.getElementById("techWrapper");
            techWrapper.addEventListener("click", function(e) {
                if (e.target.classList.contains("addTechBtn")) {
                    e.preventDefault();
                    const div = document.createElement("div");
                    div.classList.add("input-group", "mb-2");
                    div.innerHTML = `
                    <input type="text" name="technologies[]" class="form-control" placeholder="e.g., Laravel, React">
                    <button class="btn btn-outline-danger removeTechBtn" type="button">Remove</button>
                `;
                    techWrapper.appendChild(div);
                }
                if (e.target.classList.contains("removeTechBtn")) e.target.parentElement.remove();
            });

            // Edit Modal-এর জন্যও একইভাবে nameগুলো যোগ করুন...
            // Edit Features
            const editFeaturesWrapper = document.getElementById("editFeaturesWrapper");
            if (editFeaturesWrapper) {
                editFeaturesWrapper.addEventListener("click", function(e) {
                    if (e.target.classList.contains("addFeatureBtn")) {
                        e.preventDefault();
                        const div = document.createElement("div");
                        div.classList.add("input-group", "mb-2");
                        div.innerHTML =
                            `<input type="text" name="features[]" class="form-control" placeholder="Feature"><button class="btn btn-outline-danger removeFeatureBtn" type="button">Remove</button>`;
                        editFeaturesWrapper.insertBefore(div, e.target);
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editPortfolioBtn', function() {
                // ১. বেসিক ডেটা গেট করা
                let id = $(this).data('id');
                let title = $(this).data('title');
                let category = $(this).data('category');
                let description = $(this).data('description');
                let rating = $(this).data('rating');

                // ২. টেকনোলজি ডেটা রিসিভ করা (এটি অ্যারে হিসেবে আসবে)
                let technologies = $(this).data('technologies');

                // ৩. ফর্ম অ্যাকশন এবং বেসিক ফিল্ড সেট করা
                $('#editPortfolioForm').attr('action', '/admin/portfolio/update/' + id);
                $('#edit_title').val(title);
                $('#edit_category').val(category);
                $('#edit_description').val(description);
                $('#edit_rating').val(rating);

                // ৪. গুরুত্বপূর্ণ: আগের টেকনোলজি ফিল্ডগুলো পরিষ্কার করা
                $('#editTechWrapper').empty();

                // ৫. লুপ চালিয়ে আগের ডেটাগুলো ইনপুট ফিল্ডে বসানো
                if (technologies) {
                    // যদি ডেটা স্ট্রিং হিসেবে আসে তবে JSON parse করে নেওয়া
                    let techArray = (typeof technologies === 'string') ? JSON.parse(technologies) :
                        technologies;

                    $.each(techArray, function(index, value) {
                        $('#editTechWrapper').append(`
                        <div class="input-group mb-2">
                            <input type="text" name="technologies[]" class="form-control" value="${value}">
                            <button class="btn btn-outline-danger removeEditTech" type="button">Remove</button>
                        </div>
                    `);
                    });
                }
            });

            // ইডিট মোডালে নতুন ইনপুট অ্যাড করার বাটন
            $(document).on('click', '.addEditTechBtn', function() {
                $('#editTechWrapper').append(`
                <div class="input-group mb-2">
                    <input type="text" name="technologies[]" class="form-control" placeholder="Enter technology">
                    <button class="btn btn-outline-danger removeEditTech" type="button">Remove</button>
                </div>
            `);
            });

            // ইনপুট ফিল্ড রিমুভ করার বাটন
            $(document).on('click', '.removeEditTech', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editDetailsBtn', function() {
                // ১. সব ডেটা গেট করা
                let id = $(this).data('id');
                let intro_title = $(this).data('intro_title');
                let intro_description = $(this).data('intro_description');
                let title = $(this).data('title');
                let category = $(this).data('category');
                let technologies = $(this).data('technologies');
                let date = $(this).data('date');
                let company_name = $(this).data('company_name');
                let description = $(this).data('description');
                let live_link = $(this).data('live_link');
                let github_link = $(this).data('github_link');
                let overview = $(this).data('overview');
                let challenge = $(this).data('challenge');
                let solution = $(this).data('solution');
                let features = $(this).data('features'); // Features array

                // ২. বেসিক ফিল্ডগুলোতে ভ্যালু সেট করা
                $('#edit_intro_title').val(intro_title);
                $('#edit_intro_description').val(intro_description);
                $('#title').val(title);
                $('#category').val(category);
                $('#date').val(date);
                $('#company_name').val(company_name);
                $('#description').val(description);
                $('#live_link').val(live_link);
                $('#github_link').val(github_link);
                $('#overview').val(overview);
                $('#challenge').val(challenge);
                $('#solution').val(solution);

                // ৩. Technologies ডাইনামিক করা
                $('#editTechWrapper').empty();
                let techArray = (typeof technologies === 'string') ? JSON.parse(technologies) :
                    technologies;
                if (techArray) {
                    $.each(techArray, function(index, value) {
                        $('#editTechWrapper').append(`
                    <div class="input-group mb-2">
                        <input type="text" name="technologies[]" class="form-control" value="${value}">
                        <button class="btn btn-outline-danger removeEditInput" type="button">Remove</button>
                    </div>
                `);
                    });
                }

                // ৪. Features ডাইনামিক করা (আপনার প্রশ্নের মূল অংশ)
                $('#editFeaturesWrapper').empty();
                let featureArray = (typeof features === 'string') ? JSON.parse(features) : features;
                if (featureArray) {
                    $.each(featureArray, function(index, value) {
                        $('#editFeaturesWrapper').append(`
                    <div class="input-group mb-2">
                        <input type="text" name="features[]" class="form-control" value="${value}">
                        <button class="btn btn-outline-danger removeEditInput" type="button">Remove</button>
                    </div>
                `);
                    });
                }
            });

            // নতুন ফিচার যোগ করার বাটন
            $(document).on('click', '.addEditFeatureBtn', function() {
                $('#editFeaturesWrapper').append(`
            <div class="input-group mb-2">
                <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                <button class="btn btn-outline-danger removeEditInput" type="button">Remove</button>
            </div>
        `);
            });

            // ইনপুট রিমুভ করার কমন ফাংশন
            $(document).on('click', '.removeEditInput', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
    <script>
        $(document).on('click', '.deletePortfolioBtn', function() {
            let id = $(this).data('id');
           let url = "{{ route('portfolio.delete', '') }}/" + id; // আপনার রাউট অনুযায়ী পাথ ঠিক করে নিন
            let row = $(this).closest('tr');

            if (confirm('আপনি কি নিশ্চিত যে আপনি এটি ডিলিট করতে চান? সব ইমেজও ডিলিট হয়ে যাবে!')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            row.fadeOut(500, function() {
                                $(this).remove();
                            });
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('কিছু একটা সমস্যা হয়েছে, আবার চেষ্টা করুন।');
                    }
                });
            }
        });
    </script>
@endpush
