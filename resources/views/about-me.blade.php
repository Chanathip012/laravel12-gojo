<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>About Me</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        :root {
            --neon-pink: #102a07;
            --neon-cyan: #030519;
            --neon-purple: #caed06;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #05010d;
            font-family: 'Segoe UI', sans-serif;
            color: #ea0b0b;
        }

        /* ===== HEADER เต็มจอด้านบน ===== */
        .hero-header {
            position: relative;
            width: 100%;
            padding: 70px 20px 60px;
            text-align: center;
            overflow: hidden;
            background: radial-gradient(circle at 50% 0%, #1a0b33 0%, #05010d 70%);
            border-bottom: 1px solid rgba(212, 47, 88, 0.4);
            box-shadow: 0 4px 30px rgba(84, 187, 190, 0.15);
        }

        /* ลายกริดเฉพาะใน header */
        .hero-header::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(226, 235, 235, 0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 246, 255, 0.07) 1px, transparent 1px);
            background-size: 40px 40px;
            -webkit-mask-image: linear-gradient(to bottom, #000, transparent);
            mask-image: linear-gradient(to bottom, #000, transparent);
        }

        .hero-header>* {
            position: relative;
            z-index: 1;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--neon-pink);
            box-shadow:
                0 0 10px var(--neon-pink),
                0 0 25px rgba(255, 47, 208, 0.6);
            margin-bottom: 22px;
        }

        .hero-header h1 {
            color: #ffffff;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow:
                0 0 6px var(--neon-cyan),
                0 0 18px rgba(0, 246, 255, 0.6);
            margin-bottom: 8px;
        }

        .hero-header .student-id {
            color: var(--neon-purple);
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
        }

        .scroll-hint {
            margin-top: 30px;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            color: rgba(232, 232, 255, 0.5);
            letter-spacing: 2px;
            animation: bounce 1.8s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
                opacity: 0.5;
            }

            50% {
                transform: translateY(6px);
                opacity: 1;
            }
        }

        /* ===== ผลงานเต็มจอด้านล่าง ===== */
        .portfolio-section {
            width: 100%;
            padding: 60px 20px 80px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .portfolio-section h2 {
            color: #ffffff;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 40px;
        }

        .portfolio-section h2::before {
            content: "> ";
            color: var(--neon-pink);
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .portfolio-card {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            overflow: hidden;
            background: rgba(10, 5, 20, 0.9);
            border: 1px solid rgba(0, 246, 255, 0.35);
            border-radius: 12px;
            text-decoration: none;
            color: #e8e8ff;
            transition: 0.25s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-6px);
            border-color: var(--neon-pink);
            box-shadow:
                0 0 10px var(--neon-pink),
                0 0 30px rgba(255, 47, 208, 0.4);
            color: #de0a0a;
        }

        .portfolio-card .icon-img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            display: block;
            filter: saturate(1.1) contrast(1.05);
        }

        .portfolio-card .label {
            font-weight: 700;
            text-align: center;
            padding: 14px 12px;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .side-images {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .side-images img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid var(--neon-cyan);
            box-shadow:
                0 0 6px rgba(0, 0, 0, 0.5),
                0 0 16px rgba(233, 171, 15, 0.25);
            transition: 0.2s;
        }

        .side-images img:hover {
            border-color: var(--neon-pink);
            box-shadow:
                0 0 8px var(--neon-pink),
                0 0 20px rgba(231, 61, 9, 0.5);
            transform: translateY(-3px);
        }

        @media (max-width: 900px) {
            .header-row {
                flex-direction: column;
            }

            .side-images {
                flex-direction: row;
            }
        }

        @media (max-width: 992px) {
            .portfolio-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .hero-header {
                padding: 50px 16px 40px;
            }

            .portfolio-section {
                padding: 40px 16px 60px;
            }
        }
    </style>
</head>

<body>

<div class="hero-header">
    <div class="header-row">
        <div class="side-images">
            <img src="{{ asset('assets/img/1.jpg.jpg') }}" alt="">
            <img src="{{ asset('assets/img/images (6).jpg') }}" alt="">
        </div>

        <div class="profile-block">
            <img src="{{ asset('assets/img/o.jpg.jpg') }}" alt="รูปโปรไฟล์" class="profile-img">
            <h1 class="h3">ชนาธิป ปัญโย</h1>
            <p class="student-id">รหัสนักศึกษา: 68122420012</p>
        </div>

        <div class="side-images">
            <img src="{{ asset('assets/img/images (8).jpg') }}" alt="">
            <img src="{{ asset('assets/img/images (9).jpg') }}" alt="">
        </div>
    </div>
    <div class="scroll-hint text-center"></div>
</div>

    
    <div class="portfolio-section">
        <h2 class="h5">งานที่เคยทำ</h2>
        <div class="portfolio-grid">
            <a href="/gallery" class="portfolio-card">
                <img src="{{ asset('assets/img/images (10).jpg') }}" alt="" class="icon-img">
                <span class="label">EP02 Hero avengers</span>
            </a>

            <a href="/active/index" class="portfolio-card">
                <img src="{{ asset('assets/img/images (11).jpg') }}" alt="" class="icon-img">
                <span class="label">EP03 Active Bootstrap</span>
            </a>

            <a href="/weights" class="portfolio-card">
                <img src="{{ asset('assets/img/images (12).jpg') }}" alt="" class="icon-img">
                <span class="label">EP07 Weight</span>
            </a>

            <a href="/login" class="portfolio-card">
                <img src="{{ asset('assets/img/images (13).jpg') }}" alt="" class="icon-img">
                <span class="label">EP08 Auth (Login)</span>
            </a>
        </div>
    </div>

</body>

</html>
