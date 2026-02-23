@extends('backend.master')

@section('title', 'Manage Team')

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

        /* Profile Card */
        .profile-container {
            max-width: 600px;
            margin: 60px auto;
        }

        .profile-card {
            background: var(--panel);
            border: 2px solid #6C63FF;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            padding: 40px 30px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(108, 99, 255, 0.5);
            border-color: #4641B3;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #6C63FF;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .profile-name {
            color: #fff;
            font-weight: 700;
            font-size: 26px;
            margin-bottom: 8px;
        }

        .profile-email,
        .profile-phone,
        .profile-role {
            color: var(--muted);
            margin: 4px 0;
            font-size: 15px;
        }

        .edit-btn {
            background: #6C63FF;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 500;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .edit-btn:hover {
            background: #4641B3;
        }

        /* Save Changes button */
        .save-btn {
            background: #6C63FF;
            color: #fff;
            transition: background 0.3s ease;
        }

        .save-btn:hover {
            background: #4641B3;
        }

        h3 {
            font-weight: 700;
            color: #A4AEC1;
        }

        .card-dark {
            background-color: #0F1A2A;
            border: 2px solid #4641B3;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            transition: all 0.3s ease;
        }

        .card-dark:hover {
            box-shadow: 0 12px 30px rgba(108, 99, 255, 0.5);
        }

        .table thead th {
            color: #6B64E1;
        }

        .btn-outline-danger:hover {
            background-color: #DC3545;
            color: #fff;
        }

        .modal-content {
            background-color: #0F1A2A;
            border: 2px solid #4641B3;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            transition: all 0.3s ease;
        }

        .modal-content:hover {
            box-shadow: 0 12px 30px rgba(108, 99, 255, 0.5);
        }

        .form-control:focus {
            border-color: #4641B3;
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            ;
        }

        .btn-danger {
            background-color: #0F1A2A;
            border: none;
        }

        .btn-danger:hover {
            background-color: #0F1A2A;
        }

        .send-reply-btn {
            background-color: #6C63FF;
            color: #fff;
            border: none;
            transition: background 0.3s ease;
        }

        .send-reply-btn:hover {
            background-color: #4641B3;
        }

        /* Modal input focus effect */
        .modal-content .form-control:focus,
        .modal-content .form-select:focus {
            border-color: #6C63FF;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        }

        .reply-textarea {
            border: 2px solid #4641B3;
            background-color: #0F1A2A;
            /* dark background */
            color: #fff;
            /* text color */
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        .reply-textarea:focus {
            border-color: #6C63FF;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
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

        @media (max-width: 576px) {
            .navbar-top {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                padding-left: 50px;
                /* menu icon space */
            }

            .navbar-top h5 {
                font-size: 16px;
            }

            .user-trigger span {
                display: none;
                /* শুধু image থাকবে */
            }
        }

        @media (max-width: 576px) {
            .modal-dialog {
                margin: 10px;
            }
        }

        @media (max-width: 768px) {
            td .btn {
                margin-bottom: 5px;
                width: 100%;
            }
        }
    </style>
    <div class="container-fluid py-4">

        <!-- Team Intro Section -->
        <div class="team-intro-card">
            <form action="{{ url('/admin/team-intro/update') }}" method="POST">
                @csrf
                <h5 class="fw-bold text-light">Team Intro</h5>
                <input type="text" class="form-control mb-2" name="section_heading" value="{{ $teamIntro->section_heading }}"
                    placeholder="Section Heading">
                <textarea class="form-control mb-2" rows="3" name="intro_description" placeholder="Intro Text">{{ $teamIntro->intro_description }}</textarea>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control mb-2" name="team_mamber_count"
                            value="{{ $teamIntro->team_mamber_count }}" placeholder="Team Members Count">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control mb-2" name="departments_count"
                            value="{{ $teamIntro->departments_count }}" placeholder="Departments Count">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control mb-2" name="countries_count"
                            value="{{ $teamIntro->countries_count }}" placeholder="Countries Count">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-update">Update Intro</button>
                </div>
            </form>
        </div>

        <!-- Leader Form Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-light"> Manage Leader</h3>
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addLeaderModal">
                <i class="bi bi-plus-circle"></i> Add Leader
            </button>
        </div>

        <div class="card card-dark p-3 mb-4 table-responsive">
            <table class="table table-dark table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Social Links</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teamleaders as $leader)
                        <tr>
                        <td><img src="{{asset('backend/images/teamleader/'.$leader->image)}}" alt="Leader Photo"></td>
                        <td>{{$leader->name}}</td>
                        <td>{{$leader->position}}</td>
                        <td>{{$leader->email}}</td>
                        <td>
                            <a href="{{$leader->linkedin}}"><i class="bi bi-linkedin text-light"></i></a>
                            <a href="{{$leader->twitter}}"><i class="bi bi-twitter text-light"></i></a>
                            <a href="{{$leader->instagram}}"><i class="bi bi-instagram text-light"></i></a>
                            <a href="{{$leader->github}}"><i class="bi bi-github text-light"></i></a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#editLeaderModal"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteLeaderModal"><i class="bi bi-trash"></i> Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Team Members Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-light"> Manage Team Members</h3>
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                <i class="bi bi-plus-circle"></i> Add Member
            </button>
        </div>

        <div class="card card-dark p-3 table-responsive">
            <table class="table table-dark table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Social Links</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="assets/img/person/person-f-3.webp" alt="Sarah Chen"></td>
                        <td>Sarah Chen</td>
                        <td>Creative Director</td>
                        <td>sarah@magpieit.com</td>
                        <td>
                            <a href="#"><i class="bi bi-linkedin text-light"></i></a>
                            <a href="#"><i class="bi bi-twitter text-light"></i></a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"><i class="bi bi-trash"></i> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Leader Modal -->
    <div class="modal fade mt-5" id="addLeaderModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Leader</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/team-leader/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" class="form-control" name="position" placeholder="Enter position">
                            </div>
                            <div class="col-md-12">
                                <label>Bio</label>
                                <input type="text" class="form-control" name="bio" placeholder="Enter your bio">
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="col-md-6">
                                <label>Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>LinkedIn</label>
                                <input type="url" class="form-control" name="linkedin"
                                    placeholder="https://linkedin.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>Twitter</label>
                                <input type="url" class="form-control" name="twitter"
                                    placeholder="https://twitter.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>Instagram</label>
                                <input type="url" class="form-control" name="instagram"
                                    placeholder="https://instagram.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>GitHub</label>
                                <input type="url" class="form-control" name="github"
                                    placeholder="https://github.com/...">
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submnit" class="btn btn-custom">Save Leader</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Leader Modal -->
    <div class="modal fade mt-5" id="editLeaderModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5>Edit Leader</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="joun don">
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" class="form-control" name="position" value="Team Leader">
                            </div>
                            <div class="col-md-12">
                                <label>Bio</label>
                                <input type="text" class="form-control" name="bio" value="I am a developer">
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="john@team.com">
                            </div>
                            <div class="col-md-6">
                                <label>Photo</label>
                                <img src="" alt="">
                                <input type="file" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>LinkedIn</label>
                                <input type="url" class="form-control" name="linkedin" placeholder="https://linkedin.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>Twitter</label>
                                <input type="url" class="form-control" name="twitter" placeholder="https://twitter.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>Instagram</label>
                                <input type="url" class="form-control" name="instagram" placeholder="https://instagram.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>GitHub</label>
                                <input type="url" class="form-control" name="github" placeholder="https://github.com/...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-custom">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Leader Modal -->
    <div class="modal fade mt-5" id="deleteLeaderModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to delete <strong>John Doe</strong>?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Existing Member Modals -->
    <!-- Add Member Modal -->
    <div class="modal fade mt-5" id="addMemberModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Team Member</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" class="form-control" placeholder="Enter position">
                            </div>
                            <div class="col-md-12">
                                <label>Photo</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>LinkedIn</label>
                                <input type="url" class="form-control" placeholder="https://linkedin.com/...">
                            </div>
                            <div class="col-md-6">
                                <label>Twitter</label>
                                <input type="url" class="form-control" placeholder="https://twitter.com/...">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-custom px-4">Save Member</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Member Modal -->
    <div class="modal fade mt-5" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Team Member</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" value="Sarah Chen">
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" class="form-control" value="Creative Director">
                            </div>

                            <div class="col-md-12">
                                <label>Photo</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>LinkedIn</label>
                                <input type="url" class="form-control" value="https://linkedin.com/sarah">
                            </div>
                            <div class="col-md-6">
                                <label>Twitter</label>
                                <input type="url" class="form-control" value="https://twitter.com/sarah">
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

    <!-- Delete Member Modal -->
    <div class="modal fade mt-5" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to delete <strong>Sarah Chen</strong>?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection
