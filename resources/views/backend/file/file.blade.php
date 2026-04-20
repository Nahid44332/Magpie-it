@extends('backend.master')
@section('content')
    <style>
        :root {
            --bg: #0b1220;
            --panel: #0f1a2a;
            --muted: #a6b0c3;
            --accent: #6c63ff;
            --border: rgba(255, 255, 255, 0.08);
        }

        body {
            background: #081028;
            color: #e6eef8;
            font-family: "Inter", sans-serif;
        }

        /* Upload Area */
        .file-container {
            background: #111a2e;
            border: 2px dashed var(--accent);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            transition: 0.3s;
        }

        /* Improved File Card */
        .file-card {
            background: #0f172a;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 15px;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .file-card:hover {
            transform: translateY(-8px);
            border-color: var(--accent);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
        }

        /* Preview/Thumbnail */
        .file-preview {
            width: 100%;
            height: 140px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .file-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .file-preview i {
            font-size: 3.5rem;
            opacity: 0.8;
        }

        /* Filename styling */
        .file-name {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5px;
        }

        .file-meta {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 15px;
        }

        /* Action Buttons in Card */
        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }

        .btn-circle {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border: 1px solid var(--border);
            transition: 0.2s;
            font-size: 13px;
        }

        .btn-circle:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        .btn-del-card:hover {
            background: #dc3545;
            border-color: #dc3545;
        }

        .badge-count {
            background: var(--accent);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 12px;
        }
        a {
            text-decoration: none;
        }
    </style>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="color:var(--accent); font-weight:700; margin:0;">
                <i class="fas fa-folder-open me-2"></i> File Manager
            </h3>
            <div class="badge-count">{{ count($files ?? []) }} Files</div>
        </div>

        <div class="file-container">
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"
                class="row g-3 align-items-center">
                @csrf
                <div class="col-md-10">
                    <input type="file" name="file" class="form-control bg-dark text-white border-0" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-accent w-100" style="color: white">
                        <i class="fas fa-cloud-upload-alt me-2"></i> Upload
                    </button>
                </div>
            </form>
        </div>

        <div class="row g-4">
            @isset($files)
                @foreach ($files as $file)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <div class="file-card">
                            <div class="file-preview">
                                @php
                                    $ext = strtolower($file->extension);
                                    $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg']);
                                @endphp

                                @if ($isImage)
                                    <img src="{{ asset($file->path) }}" alt="Preview">
                                @else
                                    @php
                                        $icon = 'fa-file-alt text-primary';
                                        if ($ext == 'pdf') {
                                            $icon = 'fa-file-pdf text-danger';
                                        }
                                        if ($ext == 'zip' || $ext == 'rar') {
                                            $icon = 'fa-file-archive text-warning';
                                        }
                                        if ($ext == 'xls' || $ext == 'xlsx') {
                                            $icon = 'fa-file-excel text-success';
                                        }
                                    @endphp
                                    <i class="fas {{ $icon }}"></i>
                                @endif
                            </div>

                            <span class="file-name" title="{{ $file->filename }}">{{ $file->filename }}</span>
                            <div class="file-meta">
                                <span class="text-uppercase me-2">{{ $ext }}</span>
                                <span>• {{ $file->created_at->format('d M, Y') }}</span>
                            </div>

                            <div class="card-actions">
                                <button type="button" class="btn-circle"
                                    onclick="viewFile('{{ asset($file->path) }}', '{{ $ext }}')" title="View">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>

                                <a href="{{ asset($file->path) }}" download class="btn-circle" title="Download">
                                    <i class="fas fa-download"></i>
                                </a>

                                <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-circle btn-del-card"
                                        onclick="return confirm('মামা, ডিলিট করবেন?')" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fas fa-cloud-upload-alt fa-3x mb-3 muted"></i>
                    <p class="muted">ফাইল খুঁজে পাওয়া যায়নি। নতুন ফাইল আপলোড করুন।</p>
                </div>
            @endisset
        </div>
    </div>

    <div class="modal fade" id="viewFileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background:#0f172a; border: 1px solid var(--border);">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white">File Preview</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-4" id="modalFileContent">
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewFile(url, ext) {
            let content = '';
            const imgExts = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];

            if (imgExts.includes(ext.toLowerCase())) {
                content = `<img src="${url}" class="img-fluid rounded shadow-lg">`;
            } else {
                content = `<div class="p-5">
                        <i class="fas fa-file-alt fa-4x mb-3" style="color:var(--accent)"></i>
                        <h4 class="text-white">প্রিভিউ পাওয়া যায়নি</h4>
                        <p class="text-muted">এই ফরম্যাটের ফাইল (${ext.toUpperCase()}) সরাসরি প্রিভিউ করা যাচ্ছে না। দয়া করে ডাউনলোড করুন।</p>
                        <a href="${url}" class="btn btn-accent mt-3" download>Download File</a>
                       </div>`;
            }

            document.getElementById('modalFileContent').innerHTML = content;
            var myModal = new bootstrap.Modal(document.getElementById('viewFileModal'));
            myModal.show();
        }
    </script>
@endsection
