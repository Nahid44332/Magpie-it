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
      <!-- KPI Cards -->
        <div class="cards-row mt-5" data-aos="fade-up">
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Save Products</div>
                        <div class="kpi">50.8K <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+28.4%</span></div>
                        <div class="kpi-sub muted">since last week</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-heart-fill" style="color:var(--accent)"></i></div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Stock Products</div>
                        <div class="kpi">23.6K <span
                                style="color:#e74c3c;font-size:13px;font-weight:600;margin-left:8px">-12.6%</span></div>
                        <div class="kpi-sub muted">current stock</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-bag-fill" style="color:#9ad0ff"></i></div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Sale Products</div>
                        <div class="kpi">756 <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+3.1%</span></div>
                        <div class="kpi-sub muted">monthly sales</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-cart-fill" style="color:#9ad0ff"></i></div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Average Revenue</div>
                        <div class="kpi">2.3K <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+11.3%</span></div>
                        <div class="kpi-sub muted">per user</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-cash-stack" style="color:#9ad0ff"></i></div>
                </div>
            </div>
        </div>

        <!-- Charts Panels -->
        <div class="panels" data-aos="fade-up">
            <div class="panel">
                <h5>Website Visitors</h5>
                <div class="donut-wrap d-flex">
                    <div style="width:280px">
                        <canvas id="donutChart"></canvas>
                    </div>
                    <div style="flex:1;padding-left:10px">
                        <div class="muted">Traffic Source</div>
                        <ul style="list-style:none;padding:0;margin-top:12px">
                            <li class="muted mb-2"><span
                                    style="display:inline-block;width:10px;height:10px;background:var(--accent);border-radius:50%;margin-right:8px"></span>
                                Organic <span class="float-end muted">80%</span></li>
                            <li class="muted mb-2"><span
                                    style="display:inline-block;width:10px;height:10px;background:#2bb7ff;border-radius:50%;margin-right:8px"></span>
                                Social <span class="float-end muted">60%</span></li>
                            <li class="muted mb-2"><span
                                    style="display:inline-block;width:10px;height:10px;background:#22c1c3;border-radius:50%;margin-right:8px"></span>
                                Direct <span class="float-end muted">50%</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h5>Revenue by customer type</h5>
                        <div style="font-size:20px;font-weight:700;color:#fff">$240.8K <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+14.8%</span></div>
                    </div>
                    <div class="muted">Jan 2024</div>
                </div>
                <div style="height:300px"><canvas id="stackedBar"></canvas></div>
            </div>
        </div>

        <!-- Lower Grid: Products & Tasks -->
        <div class="lower-grid" data-aos="fade-up">
            <div class="panel">
                <h5>Products</h5>
                <div class="products-list">
                    <div class="product-item">
                        <img src="{{asset('backend/assets/img/Screenshot_5.png')}}" alt="iPhone 14 Pro Max" class="product-img">
                        <div>
                            <div style="font-weight:600">iPhone 14 Pro Max</div>
                            <div class="muted">524 in stock</div>
                        </div>
                        <div class="ms-auto muted">$1,099.00</div>
                    </div>
                    <div class="product-item">
                        <img src="{{asset('backend/assets/img/Screenshot_5.png')}}" alt="Apple Watch S8" class="product-img">
                        <div>
                            <div style="font-weight:600">Apple Watch S8</div>
                            <div class="muted">320 in stock</div>
                        </div>
                        <div class="ms-auto muted">$799.00</div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <h5>Completed tasks over time</h5>
                <div class="d-flex gap-3 align-items-center mb-2">
                    <div style="font-size:28px;font-weight:700">257</div>
                    <div class="muted">
                        <span
                            style="background:#28a745;color:#fff;padding:4px 8px;border-radius:8px;font-weight:600">+16.8%</span>
                        this month
                    </div>
                </div>
                <div style="height:150px"><canvas id="lineChart"></canvas></div>
            </div>
        </div>
        <!-- Orders Table -->
        <div class="orders" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5>Orders Status</h5>
                <button class="btn btn-outline-light btn-sm">View All</button>
            </div>
            <table class="table align-middle text-white mb-0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Order</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Country</th>
                        <th class="text-end">Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1532</td>
                        <td>
                            <div style="font-weight:600">John Carter</div>
                            <div class="muted">hello@johncarter.com</div>
                        </td>
                        <td>Jan 30, 2024</td>
                        <td><span class="status-badge delivered">Delivered</span></td>
                        <td>United States</td>
                        <td class="text-end">$1,099.24</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1531</td>
                        <td>
                            <div style="font-weight:600">Sophie Moore</div>
                            <div class="muted">contact@sophiemoore.com</div>
                        </td>
                        <td>Jan 27, 2024</td>
                        <td><span class="status-badge canceled">Canceled</span></td>
                        <td>United Kingdom</td>
                        <td class="text-end">$5,870.32</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1530</td>
                        <td>
                            <div style="font-weight:600">Matt Cannon</div>
                            <div class="muted">info@mattcannon.com</div>
                        </td>
                        <td>Jan 24, 2024</td>
                        <td><span class="status-badge delivered">Delivered</span></td>
                        <td>Australia</td>
                        <td class="text-end">$13,899.48</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1529</td>
                        <td>
                            <div style="font-weight:600">Graham Hills</div>
                            <div class="muted">hi@grahamhills.com</div>
                        </td>
                        <td>Jan 21, 2024</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>India</td>
                        <td class="text-end">$1,569.12</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection