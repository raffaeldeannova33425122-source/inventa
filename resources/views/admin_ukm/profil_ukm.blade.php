<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil UKM &amp; Pengaturan</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6ff;
            color: #1a1f36;
        }
        .wrap {
            max-width: 980px;
            margin: 48px auto;
            padding: 32px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(13, 32, 91, 0.08);
        }
        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }
        .badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: #edf2ff;
            color: #1e3a8a;
            font-size: 12px;
            font-weight: 700;
        }
        h1 {
            margin: 0;
            font-size: 32px;
        }
        p {
            margin: 0 0 26px;
            color: #48506b;
            line-height: 1.7;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }
        .card {
            padding: 20px;
            border-radius: 16px;
            background: #f8faff;
            border: 1px solid #dfe8ff;
        }
        .card h2 {
            margin: 0 0 8px;
            font-size: 18px;
        }
        .card span {
            display: block;
            color: #5f6b89;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="top">
            <div>
                <div class="badge">Admin UKM</div>
                <h1>Profil UKM &amp; Pengaturan</h1>
            </div>
        </div>

        <p>Kelola data organisasi, informasi profil, serta pengaturan operasional UKM agar informasi dan akses pengguna tetap konsisten.</p>

        <div class="grid">
            <div class="card">
                <h2>Identitas UKM</h2>
                <span>Nama UKM, bidang, dan deskripsi program.</span>
            </div>
            <div class="card">
                <h2>Kontak &amp; Admin</h2>
                <span>Penanggung jawab, email, dan telepon organisasi.</span>
            </div>
            <div class="card">
                <h2>Pengaturan</h2>
                <span>Periode aktif, kebijakan akses, dan aturan peminjaman.</span>
            </div>
        </div>
    </div>
</body>
</html>
