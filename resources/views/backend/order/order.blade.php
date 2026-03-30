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

        .status-dropdown {
            background: #0F1A2A;
            color: #fff;
            border: 1px solid #4641B3;
            cursor: pointer;
        }

        .status-dropdown:focus {
            border-color: #6C63FF;
            box-shadow: 0 0 8px rgba(108, 99, 255, .3);
        }
    </style>
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <h4>Order List</h4>
        </div>
        <div class="card card-dark p-4">

            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Whatsapp</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                               <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->whatsapp }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->subject }}</td>
                                <td>{{ $order->message }}</td>
                                <td>
                                    <form action="{{ route('order.status', $order->id) }}" method="POST">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()"
                                            class="form-select form-select-sm status-dropdown">

                                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending
                                            </option>

                                            <option value="In Progress" {{ $order->status == 'In Progress' ? 'selected' : '' }}>In
                                                Progress</option>

                                            <option value="Complete" {{ $order->status == 'Complete' ? 'selected' : '' }}>
                                                Complete</option>

                                            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                                Delivered</option>

                                        </select>

                                    </form>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
