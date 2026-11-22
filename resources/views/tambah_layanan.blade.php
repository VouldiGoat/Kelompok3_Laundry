<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Layanan - Laundry Azzam</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">

    <style>
        /* Form tambah layanan */
        .form-page-header {
            margin-bottom: 26px;
        }

        .form-page-header h1 {
            color: #23783b;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .form-page-header p {
            color: #6b7280;
            font-size: 13px;
        }

        .service-form-card {
            background: #e2f2e5;
            border-radius: 18px;
            padding: 30px;
        }

        .service-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px 28px;
        }

        .service-form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .service-form-group label {
            color: #23783b;
            font-size: 13px;
            font-weight: 600;
        }

        .service-form-group input,
        .service-form-group select,
        .service-form-group textarea {
            width: 100%;
            min-height: 46px;
            padding: 12px 14px;
            border: 1px solid #d1e7d7;
            border-radius: 10px;
            background: #ffffff;
            color: #233328;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        .service-form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .service-form-group input:focus,
        .service-form-group select:focus,
        .service-form-group textarea:focus {
            border-color: #3f9a4b;
            box-shadow: 0 0 0 3px rgba(63, 154, 75, 0.10);
        }

        .service-form-full {
            grid-column: 1 / -1;
        }

        .form-error {
            color: #dc2626;
            font-size: 11px;
        }

        .form-alert {
            padding: 12px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .form-alert-error {
            background: #fef3f2;
            color: #b42318;
            border: 1px solid #fecdca;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 25px;
        }

        .btn-save {
            background: #2e7d32;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 28px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save:hover {
            background: #256b29;
        }

        .btn-cancel {
            background: #ffddca;
            color: #8b2500;
            border-radius: 8px;
            padding: 12px 27px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: #ffd0b5;
        }

        @media (max-width: 700px) {
            .service-form-grid {
                grid-template-columns: 1fr;
            }

            .service-form-full {
                grid-column: auto;
            }

            .service-form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-save,
            .btn-cancel {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    {{-- SIDEBAR --}}
    @include('partials.sidebar', ['active' => 'layanan'])

    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">
            <div class="user-pill">
                <span>
                    {{ session('admin_username', 'Admin') }}
                </span>
            </div>
        </header>


        {{-- PAGE HEADER --}}
        <section class="form-page-header">

            <h1>Tambah Layanan</h1>

            <p>Isi data berikut lalu simpan.</p>

        </section>


        {{-- ERROR VALIDASI --}}
        @if ($errors->any())

            <div class="form-alert form-alert-error">

                <strong>Periksa kembali data yang dimasukkan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        {{-- FORM CARD --}}
        <section class="service-form-card">

            <form
                action="{{ route('layanan.store') }}"
                method="POST"
            >

                @csrf

                <div class="service-form-grid">

                    {{-- NAMA LAYANAN --}}
                    <div class="service-form-group">

                        <label for="services_name">
                            Nama Layanan
                        </label>

                        <input
                            type="text"
                            id="services_name"
                            name="services_name"
                            value="{{ old('services_name') }}"
                            placeholder="Contoh: Cuci Kering"
                            maxlength="100"
                            required
                        >

                        @error('services_name')
                            <small class="form-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="service-form-group">

                        <label for="description">
                            Deskripsi Layanan
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Jelaskan informasi layanan..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <small class="form-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- HARGA --}}
                    <div class="service-form-group">

                        <label for="price">
                            Harga (Rp)
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            placeholder="Contoh: 10000"
                            min="0"
                            max="9999999999.99"
                            step="0.01"
                            required
                        >

                        @error('price')
                            <small class="form-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- STATUS --}}
                    <div class="service-form-group">

                        <label for="is_active">
                            Status Layanan
                        </label>

                        <select
                            name="is_active"
                            id="is_active"
                            required
                        >

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option
                                value="1"
                                @selected(old('is_active', '1') == '1')
                            >
                                Aktif
                            </option>

                            <option
                                value="0"
                                @selected(old('is_active') == '0')
                            >
                                Tidak Aktif
                            </option>

                        </select>

                        @error('is_active')
                            <small class="form-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>


                {{-- TOMBOL --}}
                <div class="form-actions">

                    <button type="submit" class="btn-save">
                        Simpan
                    </button>

                    <a
                        href="{{ route('layanan') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </section>

    </main>

</div>

</body>
</html>
