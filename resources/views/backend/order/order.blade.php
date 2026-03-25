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
    
@endsection