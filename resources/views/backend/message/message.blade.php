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

        @media (max-width: 768px) {
            body {
                display: block;
                /* flex remove for mobile */
                overflow-x: hidden;
                /* horizontal scroll বন্ধ */
            }

            .main {
                width: 100%;
                overflow-x: hidden;
            }
        }

        @media (max-width: 768px) {
            .table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }

        @media (max-width: 576px) {
            .modal-dialog {
                margin: 10px;
            }

            .profile-container {
                margin: 30px 10px;
            }
        }
    </style>
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3> Contact Messages</h3>
        </div>

        <div class="card card-dark">
            <table class="table table-dark table-bordered align-middle text-center mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th width="28%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                            <<td>
                                @if ($message->status == 1)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-danger">Unread</span>
                                @endif
                                </td>
                                <td class="d-flex justify-content-center flex-wrap gap-2">
                                    @if ($message->status == 0)
                                        <a href="{{ route('messages.status', $message->id) }}"
                                            class="btn btn-sm btn-outline-success">Mark Read</a>
                                    @else
                                        <a href="{{ route('messages.status', $message->id) }}"
                                            class="btn btn-sm btn-outline-warning">Mark Unread</a>
                                    @endif

                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                        data-bs-target="#replyModal{{ $message->id }}">Reply</button>
                                    <a href="{{ route('messages.delete', $message->id) }}"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('মামা, নিশ্চিত তো? ডিলিট করে দেব?')">
                                        Delete
                                    </a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Reply Modal Example -->
        <div class="modal fade mt-5" id="replyModal1" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-custom">
                        <h5 class="text-color h3 fw-semibold"> Reply to Nusrat Jahan</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control reply-textarea" rows="4" placeholder="Type your reply..."></textarea>

                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn send-reply-btn px-4">Send Reply</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="replyModal2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-danger">
                        <h5 class="text-danger fw-semibold">✉️ Reply to Hasan Ahmed</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control bg-dark text-light border-danger" rows="4" placeholder="Type your reply..."></textarea>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-danger px-4">Send Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
