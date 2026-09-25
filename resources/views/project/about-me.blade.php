<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <!-- 1. ข้อมูลส่วนบุคคล -->
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="rounded-circle mb-3" width="150" height="150" style="object-fit: cover;">
                <h3 class="card-title">นายชนาธิป ปัญโย</h3>
                <p class="text-muted mb-4">รหัสนักศึกษา: 68122420012</p>

                <hr>

                <!-- 2. ลิงก์งานที่เคยทำ -->
                <h5 class="mb-3 text-start">ผลงานที่เคยทำ (Previous Works)</h5>
                <div class="list-group text-start">
                    <a href="{{ url('/gallery') }}" class="list-group-item list-group-item-action">
                        📌 EP02 Hero (/gallery)
                    </a>
                    <a href="{{ url('/active/index') }}" class="list-group-item list-group-item-action">
                        📌 EP03 Active Bootstrap (/active/index)
                    </a>
                    <a href="{{ url('/weights') }}" class="list-group-item list-group-item-action">
                        📌 EP07 Weight (/weights)
                    </a>
                    <a href="{{ url('/login') }}" class="list-group-item list-group-item-action list-group-item-primary">
                        🔐 EP08 Auth (Login)
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
