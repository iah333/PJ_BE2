<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Trang Chủ - PhoneStore</title>
    
    <style>
        .navbar-custom {
            background-color: #515154;
        }
        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.6);
            transition: color 0.3s ease;
        }
        .navbar-custom .nav-link:hover {
            color: rgba(255, 255, 255, 1);
        }
        .navbar-brand img {
            height: 40px;
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PhoneStore">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
            
                </ul>
            </div>
        </div>
    </nav>

    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Ảnh 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('img/banner_AiPsr_PC.png') }}" class="d-block w-100" alt="Sản phẩm 1">
                
            </div>
            <!-- Ảnh 2 -->
            <div class="carousel-item">
                <img src="{{ asset('img/banner_Macbookair_M4-MN_PC.png') }}" class="d-block w-100" alt="Sản phẩm 2">
                
            </div>
            <!-- Ảnh 3 -->
            <div class="carousel-item">
                <img src="{{ asset('img/banner_AiPsr_PC.png') }}" class="d-block w-100" alt="Sản phẩm 3">
                
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Trước</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Tiếp</span>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>