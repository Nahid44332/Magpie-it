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

        .modal-header-custom {
            border-bottom: 2px solid #6C63FF;
            /* border color changed */
        }


        .modal-header-custom {
            border-bottom: 2px solid #6C63FF;
            /* border color changed */
        }

        h2,
        h3,
        h4,
        h5 {
            color: #4641B3;
            font-weight: 700;
        }

        /* === Service Form Card === */
        .user-form-container {
            background: #14152A;
            border: 2px solid #4641B3;
            border-radius: 12px;
            padding: 30px 25px;
            margin-bottom: 40px;
        }

        .user-form-container h5 {
            color: #fff;
            margin-bottom: 20px;
        }

        #serviceForm .form-control {
            background: #0f1120;
            border: 1px solid #4641B3;
            color: #fff;
        }

        #serviceForm .form-control::placeholder {
            color: #aaa;
        }

        #serviceForm .btn {
            background: #6c63ff;
            color: #fff;
            border-radius: 8px;
            padding: 10px 25px;
            transition: 0.3s;
        }

        #serviceForm .btn:hover {
            background: #4641B3;
        }

        /* === Table Styling === */
        .table-dark {
            background: #14152A;
            border: 2px solid #4641B3;
        }

        .table-dark th,
        .table-dark td {
            border-color: #4641B3;
            color: #fff;
        }

        .table-dark th {
            background: #0f1120;
        }

        .table-dark button {
            border-radius: 5px;
        }

        .table-dark tr:hover {
            background: rgba(70, 65, 179, 0.2);
            transform: scale(1.02);
            transition: 0.3s;
        }

        /* Delivery badges */
        .delivery span {
            display: inline-block;
            margin: 5px 10px 0 0;
            padding: 5px 12px;
            border-radius: 15px;
            background: #4641B3;
            font-size: 12px;
            color: #fff;
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
    <div class="mt-5">
        <h2 class="mb-4">Pricing Management</h2>

        <!-- Service Form -->
        <div class="user-form-container">
            <h5>Add / Update Service</h5>
            <form id="serviceForm" action="{{ url('/admin/pricing/store') }}" method="POST">
                @csrf
                <input type="hidden" id="serviceId">
                <div class="row g-3">
                    <!-- Service Name -->
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Package Title (Basic, Standard, Premium)" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="serviceName" name="subtitle"
                            placeholder="Sertive Title" required>
                    </div>

                    <!-- Service Price -->
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="servicePrice" name="price"
                            placeholder="Price (e.g. $30/month)" required>
                    </div>

                    <!-- Description -->
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="serviceDescription" name="description"
                            placeholder="Description" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="deliveryTime" name="delivery_time"
                            placeholder="Delivery-Time" required>
                    </div>

                    <!-- Service Add with Add More button -->
                    <div class="col-md-6">
                        <div id="techWrapper">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="features[]" placeholder="Service">
                                <button class="btn btn-outline-secondary addTechBtn" type="button">Add More</button>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-3 mb-4">
                        <button type="submit" class="btn btn-primary">Save package</button>
                    </div>
            </form>
        </div>

        <!-- Service List Table -->
        <div class="service-list-container table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Title</th>
                        <th>Subtitle</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Features</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="serviceTableBody">
                    @foreach ($pricing as $price)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $price->title }}</td>
                            <td>{{ $price->subtitle }}</td>
                            <td>{{ $price->price }}</td>
                            <td>{{ $price->description }}</td>
                            <td>
                                @if ($price->features)
                                    @foreach (json_decode($price->features) as $feature)
                                        <span class="badge bg-secondary">{{ $feature }}</span><br>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    {{-- <script>
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
    </script> --}}
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CRUD Script -->
    {{-- <script>
        let services = [];
        const form = document.getElementById('serviceForm');
        const tableBody = document.getElementById('serviceTableBody');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('serviceId').value;
            const title = document.getElementById('title').value;
            const subtitle = document.getElementById('serviceName').value;
            const price = document.getElementById('servicePrice').value;
            const description = document.getElementById('serviceDescription').value;
            const delivery = document.getElementById('deliveryTime').value;

            if (id) {
                // Update existing
                services[id] = {
                    name,
                    price,
                    description,
                    delivery
                };
            } else {
                // Add new
                services.push({
                    name,
                    price,
                    description,
                    delivery
                });
            }
            renderTable();
            form.reset();
            document.getElementById('serviceId').value = '';
        });

        function renderTable() {
            tableBody.innerHTML = '';
            services.forEach((service, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
          <td>${index + 1}</td>
          <td>${service.name}</td>
          <td>${service.price}</td>
          <td>${service.description}</td>
          <td>${service.delivery}</td>
          <td>
            <button class="btn btn-sm btn-primary me-1" onclick="editService(${index})"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-danger" onclick="deleteService(${index})"><i class="bi bi-trash"></i></button>
          </td>
        `;
                tableBody.appendChild(row);
            });
        }

        function editService(index) {
            const service = services[index];
            document.getElementById('serviceId').value = index;
            document.getElementById('serviceName').value = service.name;
            document.getElementById('servicePrice').value = service.price;
            document.getElementById('serviceDescription').value = service.description;
            document.getElementById('deliveryTime').value = service.delivery;
        }

        function deleteService(index) {
            if (confirm('Are you sure you want to delete this service?')) {
                services.splice(index, 1);
                renderTable();
            }
        }
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const wrapper = document.getElementById("techWrapper");

            wrapper.addEventListener("click", function(e) {

                if (e.target.classList.contains("addTechBtn")) {
                    const div = document.createElement("div");
                    div.classList.add("input-group", "mb-2");

                    div.innerHTML = `
        <input type="text" name="features[]" class="form-control" placeholder="Feature">
        <button class="btn btn-danger removeTechBtn" type="button">Remove</button>
      `;

                    wrapper.appendChild(div);
                }

                if (e.target.classList.contains("removeTechBtn")) {
                    e.target.parentElement.remove();
                }

            });
        });
    </script>
@endpush
