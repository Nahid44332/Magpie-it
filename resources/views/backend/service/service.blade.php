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

        .modal-header-custom {
            border-bottom: 2px solid #6C63FF;
            /* border color changed */
        }

        .card-dark {
            background-color: #151a24;
            border: 2px solid #6C63FF;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(108, 99, 255, 0.2);
            transition: 0.3s;
        }

        .card-dark:hover {
            box-shadow: 0 0 25px rgba(108, 99, 255, 0.4);
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

        .btn-update {
            background-color: #ff9800;
            color: #fff;
            border: none;
            transition: 0.3s;
        }

        .btn-update:hover {
            background-color: #e68900;
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

        .table img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Team Intro Card */
        .team-intro-card {
            background-color: #151a24;
            border: 2px solid #6C63FF;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 0 15px rgba(108, 99, 255, 0.2);
        }

        .team-intro-card h5 {
            color: #6C63FF;
            margin-bottom: 15px;
        }

        h2,
        h4,
        h5 {
            color: #6C63FF;
        }

        .btn-custom {
            background-color: #6C63FF;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #4e49b8;
            transform: scale(1.05);
        }

        .service-card {
            background: #12132b;
            border: 1px solid #6C63FF;
            border-radius: 8px;
            padding: 15px;
            min-height: 220px;
            text-align: center;
            margin-bottom: 20px;
            transition: 0.3s;
            max-width: 300px;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 0 22px rgba(108, 99, 255, 0.35);
        }

        .form-control,
        .form-select {
            background-color: #0f1022;
            border: 1px solid #4641B3;
            color: #fff;
        }

        .form-control:focus {
            border-color: #6C63FF;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
        }

        .modal-content {
            background-color: #12132b;
            border: 1px solid #6C63FF;
            color: #fff;
        }

        .btn-close {
            filter: invert(1);
        }

        table {
            color: #fff;
        }

        th,
        td {
            vertical-align: middle !important;
        }

        /* castom */
        :root {
            --bg: #0b1220;
            --panel: #0f1a2a;
            --muted: #a6b0c3;
            --accent: #6C63FF;
            --accent2: #4641B3;
            --glass: rgba(255, 255, 255, 0.03);
        }


        .modal-header-custom {
            border-bottom: 2px solid #6C63FF;
            /* border color changed */
        }

        .card-dark {
            background-color: #151a24;
            border: 2px solid #6C63FF;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(108, 99, 255, 0.2);
            transition: 0.3s;
        }

        .card-dark:hover {
            box-shadow: 0 0 25px rgba(108, 99, 255, 0.4);
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

        .btn-update {
            background-color: #ff9800;
            color: #fff;
            border: none;
            transition: 0.3s;
        }

        .btn-update:hover {
            background-color: #e68900;
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

        .table img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Team Intro Card */
        .team-intro-card {
            background-color: #151a24;
            border: 2px solid #6C63FF;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 0 15px rgba(108, 99, 255, 0.2);
        }

        .team-intro-card h5 {
            color: #6C63FF;
            margin-bottom: 15px;
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
    </style>

    <!-- Main -->

    <div class=" py-4">
        <!-- ======================= SERVICES SECTION ======================= -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4> Manage Services</h4>
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addFullServiceModal">
                <i class="bi bi-plus-circle"></i> Add Service
            </button>
        </div>

        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-2">
                    <div class="service-card">

                        <i class="{{ $service->icon }} fs-2 text-primary"></i>
                        <h5>{{ $service->title }}</h5>
                        <p>{{ $service->short_description }}</p>

                        <div class="d-flex justify-content-center gap-2 mt-2">

                            <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editServiceModal" data-id="{{ $service->id }}"
                                data-title="{{ $service->title }}" data-icon="{{ $service->icon }}"
                                data-description="{{ $service->short_description }}">
                                <i class="bi bi-pencil"></i>
                            </button>

                            {{-- <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteServiceModal" data-id="{{ $service->id }}">
                                <i class="bi bi-trash"></i>
                            </button> --}}

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Add Service Modal -->
    <!-- ======================= ADD FULL SERVICE MODAL ======================= -->
    <div class="modal fade mt-5" id="addFullServiceModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">➕ Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('/admin/service/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            <!-- Basic Info -->
                            <h6 class="fw-bold text-primary">Basic Info</h6>

                            <div class="col-md-6">
                                <label>Service Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label>Icon Class</label>
                                <input type="text" name="icon" class="form-control" placeholder="bi bi-code-slash">
                            </div>

                            <div class="col-12">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control" rows="2"></textarea>
                            </div>

                            <!-- Section Info -->
                            <h6 class="fw-bold text-danger mt-4">Section Info</h6>

                            <div class="col-md-6">
                                <label>Header Title</label>
                                <input type="text" name="header_title" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Header Description</label>
                                <input type="text" name="header_description" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Section Description</label>
                                <input type="text" name="section_description" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Service Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="col-12">
                                <label>Full Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <!-- Features -->
                            <h6 class="fw-bold text-warning mt-4">Service Features</h6>

                            <div class="col-md-6">
                                <label for="">Performance Analytics</label>
                                <input type="text" name="performance_analytics" class="form-control"
                                    placeholder="Performance Analytics">
                            </div>
                            <div class="col-md-6">
                                <label for="">Target Audience Research</label>
                                <input type="text" name="target_audience_research" class="form-control"
                                    placeholder="Target Audience Research">
                            </div>
                            <div class="col-md-6">
                                <label for="">Content Creation</label>
                                <input type="text" name="content_creation" class="form-control"
                                    placeholder="Content Creation">
                            </div>
                            <div class="col-md-6">
                                <label for="">Social Media Management</label>
                                <input type="text" name="social_media_management" class="form-control"
                                    placeholder="Social Media Management">
                            </div>

                            <!-- Process -->
                            <h6 class="fw-bold text-info mt-4">Process Steps</h6>

                            <div class="col-md-6">
                                <label for="">Strategy Development</label>
                                <textarea name="strategy_development" class="form-control" rows="2" placeholder="Process Step 1"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Implementation</label>
                                <textarea name="implementation" class="form-control" rows="2" placeholder="Process Step 2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Optimization</label>
                                <textarea name="optimization" class="form-control" rows="2" placeholder="Process Step 3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Results & Reporting</label>
                                <textarea name="results_reporting" class="form-control" rows="2" placeholder="Process Step 4"></textarea>
                            </div>

                            <!-- Sidebar Info -->
                            <h6 class="fw-bold text-success mt-4">Sidebar Info</h6>

                            <div class="col-md-6">
                                <label for="">Duration</label>
                                <input type="text" name="duration" class="form-control" placeholder="Duration">
                            </div>

                            <div class="col-md-6">
                                <label for="">Delivery</label>
                                <input type="text" name="delivery" class="form-control" placeholder="Delivery">
                            </div>

                            <div class="col-md-6">
                                <label for="">Team Size</label>
                                <input type="text" name="team_size" class="form-control" placeholder="Team Size">
                            </div>

                            <div class="col-md-6">
                                <label for="">Support</label>
                                <input type="text" name="support" class="form-control" placeholder="Support">
                            </div>

                        </div>

                        <div class="modal-footer border-0 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-custom">Save Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">✏️ Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/service/update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label>Service Title</label>
                                <input type="text" name="title" id="edit_title" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Icon Class</label>
                                <input type="text" name="icon" id="edit_icon" class="form-control">
                            </div>

                            <div class="col-12">
                                <label>Description</label>
                                <textarea name="short_description" id="edit_description" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="modal-footer border-0">
                            <button class="btn btn-custom">Update Service</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ======================= SERVICE DETAILS SECTION ======================= -->
    <div class=" py-4">

        <div class="card card-dark p-3">
            <div class="table-responsive">
                <table class="table table-dark table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service Title</th>
                            <th>Duration</th>
                            <th>Delivery</th>
                            <th>Support</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->sidebar->duration }}</td>
                                <td>{{ $service->sidebar->delivery }}</td>
                                <td>{{ $service->sidebar->support }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewServiceDetailsModal" data-title="{{ $service->title }}"
                                        data-section_header="{{ $service->section_header }}"
                                        data-icon="{{ $service->icon }}"
                                        data-short_description="{{ $service->short_description }}"
                                        data-description="{{ $service->description }}"
                                        data-header_title="{{ $service->header_title }}"
                                        data-header_description="{{ $service->header_description }}"
                                        data-section_description="{{ $service->section_description }}"
                                        data-image="{{ asset($service->image) }}"
                                        data-performance_analytics="{{ $service->features->performance_analytics }}"
                                        data-target_audience_research="{{ $service->features->target_audience_research }}"
                                        data-content_creation="{{ $service->features->content_creation }}"
                                        data-social_media_management="{{ $service->features->social_media_management }}"
                                        data-strategy_development="{{ $service->process->strategy_development }}"
                                        data-implementation="{{ optional($service->process)->implementation }}"
                                        data-optimization="{{ optional($service->process)->optimization }}"
                                        data-results_reporting="{{ optional($service->process)->results_reporting }}"
                                        data-duration="{{ optional($service->sidebar)->duration }}"
                                        data-delivery="{{ optional($service->sidebar)->delivery }}"
                                        data-team_size="{{ $service->sidebar->team_size }}"
                                        data-support="{{ optional($service->sidebar)->support }}">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning editBtn" data-bs-toggle="modal"
                                        data-bs-target="#editServiceDetailsModal" data-id="{{ $service->id }}"
                                        data-title="{{ $service->title }}" data-icon="{{ $service->icon }}"
                                        data-short_description="{{ $service->short_description }}"
                                        data-description="{{ $service->description }}"
                                        data-header_title="{{ $service->header_title }}"
                                        data-header_description="{{ $service->header_description }}"
                                        data-section_description="{{ $service->section_description }}"
                                        data-performance_analytics="{{ $service->features->performance_analytics }}"
                                        data-target_audience_research="{{ $service->features->target_audience_research }}"
                                        data-content_creation="{{ $service->features->content_creation }}"
                                        data-social_media_management="{{ $service->features->social_media_management }}"
                                        data-strategy_development="{{ $service->process->strategy_development }}"
                                        data-implementation="{{ $service->process->implementation }}"
                                        data-optimization="{{ $service->process->optimization }}"
                                        data-results_reporting="{{ $service->process->results_reporting }}"
                                        data-duration="{{ $service->sidebar->duration }}"
                                        data-delivery="{{ $service->sidebar->delivery }}"
                                        data-team_size="{{ $service->sidebar->team_size }}"
                                        data-support="{{ $service->sidebar->support }}"
                                        data-image="{{ asset('backend/images/service/' . $service->image) }}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger deleteBtn" data-bs-toggle="modal"
                                        data-bs-target="#deleteServiceModal" id="someInput" data-id="{{ $service->id }}"
                                         ><i class="bi bi-trash"></i>Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- View Service Details Modal -->
    <div class="modal fade mt-5" id="viewServiceDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">👁 View Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="row g-3">

                            <!-- Basic Info -->
                            <h6 class="fw-bold text-primary">Basic Info</h6>

                            <div class="col-md-6">
                                <label>Service Title</label>
                                <input type="text" id="title" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Icon Class</label>
                                <input type="text" id="icon" class="form-control" readonly>
                            </div>

                            <div class="col-12">
                                <label>Short Description</label>
                                <textarea id="short_description" class="form-control" rows="2" readonly></textarea>
                            </div>


                            <!-- Section Info -->
                            <h6 class="fw-bold text-danger mt-4">Section Info</h6>

                            <div class="col-md-6">
                                <label>Header Title</label>
                                <input type="text" id="view_header_title" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Header Description</label>
                                <input type="text" id="view_header_description" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Section Description</label>
                                <input type="text" id="view_section_description" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Service Image</label>
                                <img id="view_image" class="img-fluid rounded border p-1" height="200" width="200">
                            </div>

                            <div class="col-12">
                                <label>Full Description</label>
                                <textarea id="view_description" class="form-control" rows="3" readonly></textarea>
                            </div>


                            <!-- Service Features -->
                            <h6 class="fw-bold text-warning mt-4">Service Features</h6>

                            <div class="col-md-6">
                                <label>Performance Analytics</label>
                                <input type="text" id="view_performance_analytics" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Target Audience Research</label>
                                <input type="text" id="view_target_audience_research" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Content Creation</label>
                                <input type="text" id="view_content_creation" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Social Media Management</label>
                                <input type="text" id="view_social_media_management" class="form-control" readonly>
                            </div>


                            <!-- Process -->
                            <h6 class="fw-bold text-info mt-4">Process Steps</h6>

                            <div class="col-md-6">
                                <label>Strategy Development</label>
                                <textarea id="view_strategy_development" class="form-control" rows="2" readonly></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Implementation</label>
                                <textarea id="view_implementation" class="form-control" rows="2" readonly></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Optimization</label>
                                <textarea id="view_optimization" class="form-control" rows="2" readonly></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Results & Reporting</label>
                                <textarea id="view_results_reporting" class="form-control" rows="2" readonly></textarea>
                            </div>


                            <!-- Sidebar Info -->
                            <h6 class="fw-bold text-success mt-4">Sidebar Info</h6>

                            <div class="col-md-6">
                                <label>Duration</label>
                                <input type="text" id="view_duration" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Delivery</label>
                                <input type="text" id="view_delivery" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Team Size</label>
                                <input type="text" id="view_team_size" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Support</label>
                                <input type="text" id="view_support" class="form-control" readonly>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="modal-footer border-0">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- ======================= EDIT SERVICE MODAL ======================= -->
    <div class="modal fade mt-5" id="editServiceDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-primary">✏️ Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('/admin/service-details/update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            <!-- Basic Info -->
                            <h6 class="fw-bold text-primary">Basic Info</h6>
                            <input type="hidden" id="edit_details_id" name="id">

                            <div class="col-md-6">
                                <label>Service Title</label>
                                <input type="text" id="edit_details_title" name="title" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Icon Class</label>
                                <input type="text" id="edit_details_icon" name="icon" class="form-control">
                            </div>

                            <div class="col-12">
                                <label>Short Description</label>
                                <textarea id="edit_short_description" name="short_description" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="col-12">
                                <label>Full Description</label>
                                <textarea id="edit_details_description" name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <!-- Section Info -->
                            <h6 class="fw-bold text-danger mt-4">Section Info</h6>

                            <div class="col-md-6">
                                <label>Header Title</label>
                                <input type="text" id="edit_header_title" name="header_title" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Header Description</label>
                                <input type="text" id="edit_header_description" name="header_description"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Section Description</label>
                                <input type="text" id="edit_section_description" name="section_description"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Service Image</label>
                                <input type="file" name="image" class="form-control">
                                <img id="edit_image" class="img-fluid mt-2 rounded border p-1" width="120">
                            </div>

                            <!-- Service Features -->
                            <h6 class="fw-bold text-warning mt-4">Service Features</h6>

                            <div class="col-md-6">
                                <label>Performance Analytics</label>
                                <input type="text" id="edit_performance_analytics" name="performance_analytics"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Target Audience Research</label>
                                <input type="text" id="edit_target_audience_research" name="target_audience_research"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Content Creation</label>
                                <input type="text" id="edit_content_creation" name="content_creation"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Social Media Management</label>
                                <input type="text" id="edit_social_media_management" name="social_media_management"
                                    class="form-control">
                            </div>

                            <!-- Process -->
                            <h6 class="fw-bold text-info mt-4">Process Steps</h6>

                            <div class="col-md-6">
                                <label>Strategy Development</label>
                                <textarea id="edit_strategy_development" name="strategy_development" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Implementation</label>
                                <textarea id="edit_implementation" name="implementation" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Optimization</label>
                                <textarea id="edit_optimization" name="optimization" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Results & Reporting</label>
                                <textarea id="edit_results_reporting" name="results_reporting" class="form-control" rows="2"></textarea>
                            </div>

                            <!-- Sidebar Info -->
                            <h6 class="fw-bold text-success mt-4">Sidebar Info</h6>

                            <div class="col-md-6">
                                <label>Duration</label>
                                <input type="text" id="edit_duration" name="duration" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Delivery</label>
                                <input type="text" id="edit_delivery" name="delivery" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Team Size</label>
                                <input type="text" id="edit_team_size" name="team_size" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Support</label>
                                <input type="text" id="edit_support" name="support" class="form-control">
                            </div>

                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Service Details Modal -->
    <<div class="modal fade" id="deleteServiceModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-body">
                <i class="bi bi-exclamation-triangle text-danger fs-2"></i>
                <p>Are you sure you want to delete this service?</p>

                <!-- Hidden input ধরে রাখবে ID -->
                <input type="hidden" id="delete_id">

                <div class="d-flex justify-content-around mt-3">
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger btn-sm" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            once: true
        });

        // User dropdown
        const userMenu = document.querySelector('.user-menu');
        const userTrigger = userMenu.querySelector('.user-trigger');
        userTrigger.addEventListener('click', () => userMenu.classList.toggle('active'));
        document.addEventListener('click', e => {
            if (!userMenu.contains(e.target)) userMenu.classList.remove('active');
        });


        // Mobile sidebar toggle
        const sidebar = document.querySelector('.sidebar');
        const toggleBtn = document.querySelector('.mobile-sidebar-toggle');
        const overlay = document.querySelector('.overlay');

        toggleBtn.addEventListener('click', e => {
            e.stopPropagation();
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        // Click overlay closes sidebar
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });

        // Prevent sidebar click from closing
        sidebar.addEventListener('click', e => e.stopPropagation());

        // Ensure sidebar reset on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
        });
        AOS.init({
            duration: 700,
            once: true
        });
    </script>
    <script>
        var editModal = document.getElementById('editServiceModal')

        editModal.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget

            var id = button.getAttribute('data-id')
            var title = button.getAttribute('data-title')
            var icon = button.getAttribute('data-icon')
            var description = button.getAttribute('data-description')

            document.getElementById('edit_id').value = id
            document.getElementById('edit_title').value = title
            document.getElementById('edit_icon').value = icon
            document.getElementById('edit_description').value = description

        })
    </script>
    <script>
        var modal = document.getElementById('viewServiceDetailsModal')

        modal.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget

            document.getElementById('title').value = button.getAttribute('data-title')
            document.getElementById('icon').value = button.getAttribute('data-icon')
            document.getElementById('short_description').value = button.getAttribute(
                'data-short_description')
            document.getElementById('view_description').value = button.getAttribute('data-description')
            document.getElementById('view_header_title').value = button.getAttribute('data-header_title')
            document.getElementById('view_header_description').value = button.getAttribute(
                'data-header_description')
            document.getElementById('view_section_description').value = button.getAttribute(
                'data-section_description')

            document.getElementById('view_image').src = '/backend/images/service/' + button.getAttribute(
                'data-image');

            document.getElementById('view_performance_analytics').value = button.getAttribute(
                'data-performance_analytics')
            document.getElementById('view_target_audience_research').value = button.getAttribute(
                'data-target_audience_research')
            document.getElementById('view_content_creation').value = button.getAttribute('data-content_creation')
            document.getElementById('view_social_media_management').value = button.getAttribute(
                'data-social_media_management')

            document.getElementById('view_strategy_development').value = button.getAttribute(
                'data-strategy_development')
            document.getElementById('view_implementation').value = button.getAttribute('data-implementation')
            document.getElementById('view_optimization').value = button.getAttribute('data-optimization')
            document.getElementById('view_results_reporting').value = button.getAttribute('data-results_reporting')

            document.getElementById('view_duration').value = button.getAttribute('data-duration')
            document.getElementById('view_delivery').value = button.getAttribute('data-delivery')
            document.getElementById('view_team_size').value = button.getAttribute('data-team_size')
            document.getElementById('view_support').value = button.getAttribute('data-support')

        })
    </script>
    <script>
        document.querySelectorAll('.editBtn').forEach(button => {

            button.addEventListener('click', function() {


                document.getElementById('edit_details_id').value = this.dataset.id
                document.getElementById('edit_details_title').value = this.dataset.title
                document.getElementById('edit_details_icon').value = this.dataset.icon
                document.getElementById('edit_short_description').value = this.dataset.short_description
                document.getElementById('edit_details_description').value = this.dataset.description

                document.getElementById('edit_header_title').value = this.dataset.header_title
                document.getElementById('edit_header_description').value = this.dataset.header_description
                document.getElementById('edit_section_description').value = this.dataset.section_description

                document.getElementById('edit_performance_analytics').value = this.dataset
                    .performance_analytics
                document.getElementById('edit_target_audience_research').value = this.dataset
                    .target_audience_research
                document.getElementById('edit_content_creation').value = this.dataset.content_creation
                document.getElementById('edit_social_media_management').value = this.dataset
                    .social_media_management

                document.getElementById('edit_strategy_development').value = this.dataset
                    .strategy_development
                document.getElementById('edit_implementation').value = this.dataset.implementation
                document.getElementById('edit_optimization').value = this.dataset.optimization
                document.getElementById('edit_results_reporting').value = this.dataset.results_reporting

                document.getElementById('edit_duration').value = this.dataset.duration
                document.getElementById('edit_delivery').value = this.dataset.delivery
                document.getElementById('edit_team_size').value = this.dataset.team_size
                document.getElementById('edit_support').value = this.dataset.support

                document.getElementById('edit_image').src = this.dataset.image
            })
        })
    </script>

    <script>
       document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.deleteBtn');
    const deleteIdInput = document.getElementById('delete_id');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    if (!deleteIdInput || !confirmDeleteBtn) {
        console.error('Modal elements missing!');
        return;
    }

    // যখন যেকোনো delete button click হবে
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            console.log("Delete ID:", id); // Debug
            deleteIdInput.value = id;      // Hidden input এ set করো
        });
    });

    // Modal এর confirm delete button click হলে form submit বা redirect
    confirmDeleteBtn.addEventListener('click', () => {
        const id = deleteIdInput.value;
        if (!id) return;

        // Laravel route call (form submit or fetch)
        // এখানে simplest: window.location.href
        window.location.href = `/admin/service-details/delete/${id}`;
    });
});
    </script>
@endpush
