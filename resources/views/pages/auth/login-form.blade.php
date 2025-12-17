<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistem Manajemen</title>

  <link rel="shortcut icon" type="image/png" href="{{ asset('assets-admin/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets-admin/css/styles.min.css') }}" />

  {{-- CSS Kustom untuk Split-Screen Layout (Background Gambar di Kanan) --}}
  <style>
    /* Styling untuk panel deskripsi di sebelah kanan */
    .desc-panel {
        /* PENTING: Menggunakan Gambar Background */
        background-image: url('{{ asset('assets-admin/images/backgrounds/description-image.jpg') }}');
        /* GANTI PATH INI dengan lokasi gambar yang Anda inginkan (misalnya gambar bertema teknologi, kota, atau abstrak) */

        background-size: cover; /* Memastikan gambar menutupi seluruh area panel */
        background-position: center;

        /* Tambahkan Overlay Gelap agar teks PUTIH mudah dibaca */
        background-color: rgba(0, 0, 0, 0.5); /* Hitam 50% transparan */
        background-blend-mode: darken; /* Menggelapkan gambar dengan warna latar */

        color: white;
        padding: 40px;
        border-radius: 0 10px 10px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        height: 100%;
    }

    /* Penyesuaian padding untuk panel login */
    .login-panel {
        padding: 20px 40px;
    }

    /* Memastikan card utama memiliki bentuk persegi panjang lebar */
    .card-split {
        border-radius: 10px;
        overflow: hidden;
    }
  </style>

</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">

          <div class="col-xl-10 col-lg-11">
            <div class="card mb-0 card-split">
                <div class="row g-0">

                    {{-- SISI KIRI: FORM LOGIN --}}
                    <div class="col-lg-5 login-panel">
                        <div class="card-body p-0">

                            <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('assets-admin/images/logos/spm.png') }}" width="180" alt="">
                            </a>

                            <p class="text-center">Your Social Campaigns</p>
                            <form action ="{{ route('login.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Masukkan email">
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Masukkan password">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Remeber this Device
                                        </label>
                                    </div>
                                    <a class="text-primary fw-bold" href="#">Forgot Password ?</a>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>

                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an account</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- SISI KANAN: DESKRIPSI/PROMOSIONAL DENGAN GAMBAR BACKGROUND --}}
                    <div class="col-lg-7 d-none d-lg-block desc-panel">
                        <div>
                            <h1 class="fw-bold mb-4" style="font-size: 2.5rem;">Kelola Kampanye Anda Lebih Efisien</h1>
                            <p class="fs-5 mb-5">
                                Sistem Manajemen ini didesain untuk memberi Anda kendali penuh atas semua *platform* sosial, dari analitik hingga publikasi.
                            </p>
                            <ul class="list-unstyled text-center" style="font-size: 1.1rem;">
                                <li class="mb-2"><strong>📈 Peningkatan Performa:</strong> Lacak metrik secara *real-time*.</li>
                                <li class="mb-2"><strong>⏱️ Hemat Waktu:</strong> Jadwalkan konten secara massal.</li>
                                <li class="mb-2"><strong>📊 Keputusan Cerdas:</strong> Dapatkan laporan yang mudah dipahami.</li>
                            </ul>
                            <div class="mt-5">
                                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets-admin/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
