@extends('layouts.app')

@section('title', 'Barokah Net')

@section('content')

@section('carousel')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel" id="homepage">
        <div class="header-carousel-item">
            <img src="{{ asset('img/gambar2.jpg') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-lg-0 col-xl-5"></div>
                        <div class="col-xl-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Selamat Datang Di BarokahNet
                                </h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">Semoga Semakin Barokah
                                </h1>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn
                                        More</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                    <h2 class="text-white me-2">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href="#"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-carousel-item">
            <img src="{{ asset('img/gambar_(6).jpg') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Selamat Datang Di BarokahNet
                                </h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">Semoga Semakin Barokah
                                </h1>
                                <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy...
                                </p>
                                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn
                                        More</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h2 class="text-white me-2">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href="#"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
@endsection


<!-- Abvout Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">Tentang Kami</h4>
                    <h1 class="display-5 mb-4">Menghadirkan Koneksi Tercepat dan Terpercaya untuk Anda</h1>
                    <p class="mb-4">Sebagai perusahan swasta yang bergerak di bidang layanan Internet (ISP) dengan
                        biaya murah dan terjangkau BarokahNet hadir untuk memenuhi kebutuhan masyarakat yang selama ini
                        sulit mendapatkan akses internet. Semoga kehadiran layanan jaringan internet murah ini bisa
                        mempermudah banyak orang untuk mendapatkan akses internet dan menjawab semua kebutuhan
                        masyarakat di era modern.
                    </p>
                </div>
            </div>
            <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded position-relative overflow-hidden">
                    <img src="{{ asset('img/gambar4.jpg') }}" class="img-fluid rounded w-100" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- About End -->


<!-- Offer Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <!-- Kolom Gambar (Sekarang di Kiri) -->
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="bg-primary rounded position-relative overflow-hidden">
                    <img src="{{ asset('img/gambar_(8).jpg') }}" class="img-fluid rounded w-100" alt="">
                </div>
            </div>

            <!-- Kolom Teks (Sekarang di Kanan) -->
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">Visi </h4>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dignissimos repellat
                        est consectetur et qui optio. Consectetur assumenda officiis minus perferendis incidunt cumque,
                        impedit commodi corporis? Consequuntur hic, placeat cupiditate nulla libero, voluptatibus optio
                        illo quidem, soluta voluptatem natus minima architecto nisi. Sequi omnis nisi totam provident,
                        neque expedita quisquam.
                    </p>
                </div>
                <div>
                    <h4 class="text-primary">Misi </h4>
                    <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta harum quod
                        exercitationem! Aut, rerum illo, dolorum reprehenderit dicta quibusdam tempora voluptate
                        perspiciatis perferendis quos provident dignissimos, ducimus error in nihil!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offer End -->

@endsection

@section('scripts')

@endsection
