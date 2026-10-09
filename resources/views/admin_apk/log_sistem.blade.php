<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Log Aktivitas Sistem • INVENTA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">

  @php
    /*
     |----------------------------------------------------------------------
     | DATA
     | Semua variabel di bawah bisa dikirim dari controller. Kalau tidak ada,
     | dipakai data contoh ini supaya tampilan tetap jalan.
     |
     | Format deskripsi: array potongan teks ['teks', 'jenis']
     |   jenis: ''     = teks biasa
     |          'obj'  = objek target (biru)
     |          'warn' = penekanan (oranye)
     | Format meta: array ['icon', 'teks']
     | Level: approval | pengajuan | inventory | user | maintenance | penolakan
     |----------------------------------------------------------------------
     */
    $logs = $logs ?? [
      [
        'waktu' => '26 Sep, 14:02:45', 'hash' => '#e4f901..b8', 'hash_color' => '#4EDEA3',
        'kategori' => 'Approval', 'level' => 'approval',
        'aktor' => 'Achmad Hanafi', 'peran' => 'Admin UKM Fotografi', 'aktor_utama' => false,
        'deskripsi' => [
          ['Menyetujui pengajuan peminjaman ', ''],
          ['Kamera DSLR Canon EOS 80D', 'obj'],
          [' oleh peminjam Raffael Deannova (NIM: 2104111)', ''],
        ],
        'meta' => [['i-clock', 'Durasi: 3 Hari (27-30 Sep)'], ['i-clipboard', 'Status Berkas: Lengkap']],
        'alasan' => null,
        'ref' => '#REQ-2024-0981', 'ip' => '10.15.22.40', 'lokasi' => 'Gedung PKM Lt. 2',
      ],
      [
        'waktu' => '26 Sep, 11:40:12', 'hash' => '#c172aa..41', 'hash_color' => '#B8C4FF',
        'kategori' => 'Pengajuan', 'level' => 'pengajuan',
        'aktor' => 'Raffael Deannova', 'peran' => 'Mahasiswa (NIM: 33425122)', 'aktor_utama' => false,
        'deskripsi' => [
          ['Mengajukan permohonan peminjaman unit ', ''],
          ['Kamera DSLR & Tripod', 'obj'],
          [' untuk kegiatan pameran UKM Fotografi', ''],
        ],
        'meta' => [['i-doc', 'Surat Rekomendasi Terlampir']],
        'alasan' => null,
        'ref' => '#REQ-2024-0981', 'ip' => '172.16.8.12', 'lokasi' => 'Edu-WiFi FH Lt. 1',
      ],
      [
        'waktu' => '25 Sep, 16:30:20', 'hash' => '#772bd9..10', 'hash_color' => '#B8C4FF',
        'kategori' => 'Inventory', 'level' => 'inventory',
        'aktor' => 'Haqqi Raya', 'peran' => 'Admin UKM Musik', 'aktor_utama' => false,
        'deskripsi' => [
          ['Menambahkan unit alat inventaris baru ke katalog UKM Musik: ', ''],
          ['Sound Mixer Audio Yamaha MG12XU', 'obj'],
          [' (Total 5 Unit Baru)', ''],
        ],
        'meta' => [['i-tag', 'Kategori: Audio Pro'], ['i-building', 'Sumber: Hibah Rektorat 2024']],
        'alasan' => null,
        'ref' => '#INV-MUS-042', 'ip' => '10.15.24.18', 'lokasi' => 'Studio Seni Kampus',
      ],
      [
        'waktu' => '25 Sep, 09:15:02', 'hash' => '#a910ec..6c', 'hash_color' => '#3755C3',
        'kategori' => 'User Mgmt', 'level' => 'user',
        'aktor' => 'Super Admin', 'peran' => 'Pusat Universitas', 'aktor_utama' => true,
        'deskripsi' => [
          ['Memverifikasi berkas SK Kepengurusan dan mengaktifkan kredensial akun ', ''],
          ['Admin UKM Olahraga', 'obj'],
          [' atas nama Rafid A.', ''],
        ],
        'meta' => [],
        'alasan' => null,
        'ref' => '#USR-ADM-003', 'ip' => '192.168.1.100', 'lokasi' => 'Biro Kemahasiswaan',
      ],
      [
        'waktu' => '24 Sep, 18:30:11', 'hash' => '#49ab28..fa', 'hash_color' => '#FFB690',
        'kategori' => 'Maintenance', 'level' => 'maintenance',
        'aktor' => 'Haqqi Raya', 'peran' => 'Admin UKM Musik', 'aktor_utama' => false,
        'deskripsi' => [
          ['Memperbarui status operasional unit ', ''],
          ['Mic Wireless Shure BLX24/PG58', 'obj'],
          [' menjadi ', ''],
          ['"Dalam Perbaikan"', 'warn'],
        ],
        'meta' => [['i-wrench', 'Gangguan: Noise receiver frekuensi 600MHz']],
        'alasan' => null,
        'ref' => '#INV-MUS-019', 'ip' => '10.15.24.18', 'lokasi' => 'Studio Seni Kampus',
      ],
      [
        'waktu' => '23 Sep, 08:05:44', 'hash' => '#92ef51..e2', 'hash_color' => '#BA1A1A',
        'kategori' => 'Penolakan', 'level' => 'penolakan',
        'aktor' => 'Rafid A.', 'peran' => 'Admin UKM Olahraga', 'aktor_utama' => false,
        'deskripsi' => [
          ['Menolak pengajuan sewa alat ', ''],
          ['Matras Senam Lantai (Set 8pcs)', 'obj'],
          [' oleh Siti Nurhaliza', ''],
        ],
        'meta' => [],
        'alasan' => 'Alasan Penolakan: Bentrok Jadwal Kompetisi POMDA Wilayah II',
        'ref' => '#REQ-2024-0974', 'ip' => '10.15.30.5', 'lokasi' => 'GOR Sport Center',
      ],
    ];

    $totalHariIni    = $totalHariIni    ?? 1248;
    $naikPersen      = $naikPersen      ?? 8.4;
    $totalApproval   = $totalApproval   ?? 342;
    $antreanAktif    = $antreanAktif    ?? 28;
    $totalPeringatan = $totalPeringatan ?? 14;
    $butuhInspeksi   = $butuhInspeksi   ?? 3;
    $persenPassword  = $persenPassword  ?? 100;
    $totalHalaman    = $totalHalaman    ?? 208;
    $periode         = $periode         ?? '2026/2027 Gasal';
    $tanggalHariIni  = $tanggalHariIni  ?? '26 Sep 2024';

    $kategori = $kategori ?? [
      ['key' => '',            'label' => 'Semua Aktivitas',  'jumlah' => 1248],
      ['key' => 'approval',    'label' => 'Approval',         'jumlah' => 342],
      ['key' => 'peminjaman',  'label' => 'Peminjaman',       'jumlah' => 589],
      ['key' => 'master',      'label' => 'Master Data',      'jumlah' => 214],
      ['key' => 'autentikasi', 'label' => 'Autentikasi & Akun','jumlah' => 103],
    ];
    $kategoriAktif = request('kategori', '');

    $menu = [
      ['label' => 'Dashboard',           'icon' => 'i-dash',  'href' => route('dashboard_admin_apk'), 'active' => false],
      ['label' => 'Manajemen Admin UKM', 'icon' => 'i-users', 'href' => route('manajemen_admin'),     'active' => false],
      ['label' => 'Master Data',         'icon' => 'i-db',    'href' => route('master_data'),         'active' => false],
      ['label' => 'Log Sistem',          'icon' => 'i-log',   'href' => route('log_sistem'),          'active' => true],
    ];
  @endphp

  <style>
    /* ===================== TOKENS ===================== */
    :root{
      --bg:#FAF8FF; --surface:#fff; --surface-2:#F2F3FF; --surface-3:#EAEDFF; --surface-4:#E2E7FF;
      --text:#131B2E; --muted:#444653; --subtle:#757684;
      --primary:#00288E; --primary-side:#1E40AF;
      --green:#00563A; --green-bg:rgba(111,251,190,.30); --green-dot:#4EDEA3;
      --orange:#9D4300; --orange-bg:#FFDBCA; --danger:#BA1A1A; --danger-bg:#FFDAD6; --danger-text:#93000A;
      --radius:8px; --sidebar-w:256px; --topbar-h:64px;
      --shadow:0 1px 2px rgba(0,0,0,.05);
      --f-body:'Inter',system-ui,sans-serif;
      --f-head:'Plus Jakarta Sans','Inter',system-ui,sans-serif;
      --f-mono:'JetBrains Mono',ui-monospace,monospace;
    }
    *,*::before,*::after{box-sizing:border-box}
    html{-webkit-text-size-adjust:100%}
    body{margin:0;background:var(--bg);color:var(--text);font-family:var(--f-body);font-size:14px;line-height:1.4}
    h1,h2,h3,p{margin:0}
    button{font:inherit;color:inherit;cursor:pointer;border:0;background:none}
    a{color:inherit;text-decoration:none}
    svg.i{width:1em;height:1em;flex:none;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
    .sr-only{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}

    /* ===================== SHELL ===================== */
    .app{display:grid;grid-template-columns:var(--sidebar-w) minmax(0,1fr);min-height:100vh}
    .sidebar{position:sticky;top:0;height:100vh;height:100dvh;background:var(--primary-side);color:#fff;
             display:flex;flex-direction:column;justify-content:space-between;box-shadow:0 1px 8px rgba(0,0,0,.08);z-index:60}
    .brand{height:var(--topbar-h);padding:0 16px;display:flex;align-items:center;gap:8px;background:rgba(0,40,142,.25)}
    .brand-logo{width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,.1);display:grid;place-items:center;font-size:19px;color:#DDE1FF}
    .brand b{display:block;font:700 16px/20px var(--f-head)}
    .brand small{display:block;font:600 10px/10px var(--f-mono);letter-spacing:.5px;text-transform:uppercase;color:#B8C4FF}
    .nav-title{padding:12px 20px 4px;font-size:11px;letter-spacing:.55px;text-transform:uppercase;color:rgba(184,196,255,.8)}
    .nav{padding:0 12px;display:flex;flex-direction:column;gap:2px;overflow-y:auto}
    .nav a{display:flex;align-items:center;gap:8px;padding:8px 12px;border-radius:8px;color:#B8C4FF;font-size:14px;transition:background .15s}
    .nav a:hover{background:rgba(255,255,255,.22);opacity:1}
    .nav a:focus-visible{background:rgba(255,255,255,.22);outline:2px solid rgba(255,255,255,.3);outline-offset:2px;opacity:1}
    .nav a.active{background:rgba(255,255,255,.15);color:#fff}
    .nav a.active:hover,.nav a.active:focus-visible{background:rgba(255,255,255,.28);opacity:1}
    .nav a .i{font-size:17px}
    .side-user{margin:0;padding:12px;background:rgba(0,40,142,.2)}
    .side-user-card{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:12px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08)}
    .side-user-card .meta{flex:1;min-width:0;display:flex;align-items:center;gap:8px;flex-wrap:wrap;line-height:1.2}
    .side-user-card b{display:inline-block;font-size:13px;font-weight:600;color:#fff}
    .side-user-card span{display:inline-flex;align-items:center;gap:6px;font-size:11px;color:#DDE6FF}
    .side-user-card span::before{content:"";width:6px;height:6px;border-radius:50%;background:#6FFBBE;display:inline-block}
    .side-user-card .out{padding:6px;border-radius:8px;color:#DDE6FF;font-size:14px;display:grid;place-items:center;background:rgba(255,255,255,.04);appearance:none;border:0;cursor:pointer}
    .logout-form{display:flex;align-items:center;justify-content:center;margin:0}

    .avatar{width:36px;height:36px;border-radius:10px;display:grid;place-items:center;flex:none;overflow:hidden;
            color:#fff;font:700 13px/1 var(--f-body);background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18)}

    .main-col{min-width:0;display:flex;flex-direction:column}
    .topbar{position:sticky;top:0;z-index:40;height:var(--topbar-h);padding:0 24px;display:flex;align-items:center;gap:16px;
            background:rgba(250,248,255,.85);backdrop-filter:blur(12px);box-shadow:0 1px 8px rgba(0,0,0,.04)}
    .burger{display:none;font-size:22px;padding:6px;border-radius:8px}
    .crumb{display:flex;gap:4px;font-size:13px;color:var(--muted);white-space:nowrap}
    .crumb b{color:var(--text);font-weight:600}
    .searchbox{position:relative;flex:1;max-width:576px;min-width:0}
    .searchbox .i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--muted);font-size:14px;pointer-events:none}
    .searchbox input{width:100%;padding:8px 12px 8px 36px;border:0;border-radius:8px;background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.03);
                     font:400 13px var(--f-body);color:var(--text);outline-offset:2px}
    .top-actions{margin-left:auto;display:flex;align-items:center;gap:12px}
    .chip{display:inline-flex;align-items:center;gap:4px;padding:4px 12px;border-radius:8px;background:var(--surface-3);
          font:600 12px/16px var(--f-body);color:var(--muted);white-space:nowrap}
    .icon-btn{position:relative;padding:6px;border-radius:8px;font-size:18px;color:var(--muted)}
    .icon-btn .dot{position:absolute;top:4px;right:4px;width:8px;height:8px;border-radius:50%;background:var(--danger)}
    .me{width:32px;height:32px;border-radius:12px;background:var(--primary);color:#fff;display:grid;place-items:center;font-size:14px}

    .content{width:100%;max-width:1440px;margin-inline:auto;padding:20px 24px 32px;display:flex;flex-direction:column;gap:20px}

    /* ===================== PAGE HEADER ===================== */
    .page-head{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-end;gap:16px}
    .page-head h1{font:700 clamp(22px,2.6vw,32px)/1.25 var(--f-head)}
    .page-head p{max-width:672px;margin-top:4px;color:var(--muted);line-height:1.6}
    .head-actions{display:flex;flex-wrap:wrap;gap:8px}
    .btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:8px 14px;border-radius:8px;box-shadow:var(--shadow);
         font:600 13px/16px var(--f-body);white-space:nowrap;transition:filter .15s}
    .btn:hover{filter:brightness(.96)}
    .btn-primary{background:var(--primary);color:#fff}
    .btn .i{font-size:14px}

    /* ===================== STATS ===================== */
    .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:12px}
    .stat{padding:14px 16px;background:var(--surface-2);border-radius:8px;display:flex;flex-direction:column;gap:2px}
    .stat-top{display:flex;justify-content:space-between;align-items:center;gap:8px}
    .stat .label{font:500 12px/16px var(--f-body);letter-spacing:.12px;color:var(--muted)}
    .stat .ico{font-size:16px}
    .stat strong{font:700 28px/34px var(--f-head)}
    .stat .hint{display:flex;align-items:center;gap:4px;font-size:13px;line-height:18px;color:var(--muted)}
    .stat .hint.mono{font:500 11px/16px var(--f-mono)}
    .t-green{color:var(--green)} .t-orange{color:var(--orange)} .t-primary{color:var(--primary-side)}

    /* ===================== TOOLBAR ===================== */
    .card{background:#fff;border-radius:8px;box-shadow:var(--shadow)}
    .toolbar{display:flex;flex-direction:column;gap:12px;padding:12px}
    .tool-row{display:flex;flex-wrap:wrap;gap:8px}
    .toolbar .searchbox{flex:1 1 260px;max-width:none}
    .toolbar .searchbox input{background:var(--surface-2);box-shadow:none}
    .select{position:relative;flex:0 1 auto}
    .select > .i:first-child{position:absolute;left:10px;top:50%;transform:translateY(-50%);font-size:14px;color:var(--muted);pointer-events:none}
    .select select{appearance:none;-webkit-appearance:none;max-width:100%;padding:8px 32px 8px 32px;border:0;border-radius:8px;background:var(--surface-2);
                   font:500 13px var(--f-body);color:var(--text);cursor:pointer}
    .select .chev{position:absolute;right:10px;top:50%;transform:translateY(-50%);font-size:12px;color:var(--muted);pointer-events:none}
    .pills{display:flex;flex-wrap:wrap;align-items:center;gap:6px}
    .pills .lbl{padding-right:4px;font:500 12px/16px var(--f-body);letter-spacing:.12px;color:var(--muted)}
    .pill{padding:4px 12px;border-radius:12px;background:var(--surface-3);color:var(--muted);font:500 12px/16px var(--f-body);letter-spacing:.12px;white-space:nowrap;transition:filter .15s}
    .pill:hover{filter:brightness(.95)}
    .pill.on{background:var(--primary);color:#fff}

    /* ===================== TABLE ===================== */
    .table-card{overflow:hidden}
    .table-wrap{overflow-x:auto}
    table{width:100%;border-collapse:collapse}
    thead th{padding:12px;background:var(--surface-2);text-align:left;font:700 11px/14px var(--f-body);letter-spacing:.55px;text-transform:uppercase;color:var(--muted);white-space:nowrap}
    tbody tr{border-top:1px solid var(--surface-2)}
    tbody tr:first-child{border-top:0}
    tbody tr:hover{background:rgba(242,243,255,.5)}
    tbody td{padding:12px;vertical-align:top}
    .c-right{text-align:right}

    .c-waktu{min-width:140px}
    .c-kat{min-width:120px}
    .c-aktor{min-width:150px}
    .c-desk{min-width:260px;width:36%}
    .c-ref{min-width:130px}
    .c-ip{min-width:120px}

    .time{font:500 12px/16px var(--f-mono);color:var(--text);white-space:nowrap}
    .hash{display:flex;align-items:center;gap:4px;font:400 11px/18px var(--f-mono);color:var(--muted)}
    .hash i{width:6px;height:6px;border-radius:50%;flex:none}

    .lv{display:inline-flex;align-items:center;gap:4px;padding:2px 8px;border-radius:4px;font:600 12px/16px var(--f-body);letter-spacing:.12px;white-space:nowrap}
    .lv::before{content:"";width:6px;height:6px;border-radius:50%;background:currentColor;flex:none}
    .lv-approval   {background:rgba(0,86,58,.10);color:var(--green)}
    .lv-pengajuan  {background:var(--surface-4);color:var(--primary)}
    .lv-inventory  {background:#DDE1FF;color:var(--primary)}
    .lv-user       {background:var(--surface-3);color:var(--primary-side)}
    .lv-maintenance{background:rgba(255,219,202,.40);color:var(--orange)}
    .lv-penolakan  {background:var(--danger-bg);color:var(--danger-text)}

    .actor b{display:block;font:600 13px/16px var(--f-body);color:var(--text)}
    .actor b.main{color:var(--primary)}
    .actor small{display:block;margin-top:2px;font:400 12px/18px var(--f-body);color:var(--muted)}

    .desc{font-size:14px;line-height:1.4;color:var(--text);overflow-wrap:anywhere}
    .desc .obj{color:var(--primary)}
    .desc .warn{color:var(--orange)}
    .meta{display:flex;flex-wrap:wrap;gap:4px 12px;margin-top:6px;font:400 12px/18px var(--f-body);color:var(--muted)}
    .meta span{display:inline-flex;align-items:center;gap:4px}
    .meta .i{font-size:12px}
    .alert{display:flex;align-items:flex-start;gap:4px;margin-top:6px;padding:4px 6px;border-radius:4px;background:rgba(255,218,214,.40);color:var(--danger-text);font:400 12px/18px var(--f-body)}
    .alert .i{font-size:14px;margin-top:2px}

    .ref{display:inline-block;padding:2px 4px;border-radius:2px;background:var(--surface-3);color:var(--primary);font:600 12px/16px var(--f-mono);word-break:break-all}
    .ip{font:500 12px/16px var(--f-mono);color:var(--muted)}
    .loc{margin-top:2px;font:400 11px/18px var(--f-body);color:var(--subtle)}
    .btn-detail{display:inline-flex;align-items:center;gap:2px;padding:4px 8px;border-radius:4px;background:var(--surface-3);color:var(--text);font:500 12px/16px var(--f-body);letter-spacing:.12px;white-space:nowrap;transition:filter .15s}
    .btn-detail:hover{filter:brightness(.95)}
    .btn-detail .i{font-size:11px}

    .empty{padding:32px;text-align:center;color:var(--muted)}

    /* pagination */
    .pager{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:8px;padding:12px;background:rgba(242,243,255,.5);font-size:13px;color:var(--muted)}
    .pager b{color:var(--text);font-weight:600}
    .pages{display:flex;flex-wrap:wrap;align-items:center;gap:4px}
    .pages a,.pages span{min-width:28px;height:28px;padding:0 8px;display:grid;place-items:center;border-radius:4px;background:#fff;box-shadow:var(--shadow);font:500 12px var(--f-body);color:var(--text)}
    .pages a.on{background:var(--primary);color:#fff;box-shadow:none}
    .pages .off{opacity:.4}
    .pages .gap{background:none;box-shadow:none;color:var(--subtle);padding:0 4px;min-width:0}

    /* mobile overlay */
    .scrim{display:none}

    /* ===================== RESPONSIVE ===================== */
    @media (max-width:1024px){
      .app{grid-template-columns:minmax(0,1fr)}
      .sidebar{position:fixed;inset:0 auto 0 0;width:min(var(--sidebar-w),82vw);transform:translateX(-100%);transition:transform .25s ease}
      body.nav-open .sidebar{transform:none}
      body.nav-open .scrim{display:block;position:fixed;inset:0;background:rgba(19,27,46,.45);z-index:50}
      .burger{display:inline-grid}
    }
    @media (max-width:900px){
      .topbar{padding:0 12px;gap:8px}
      .crumb{display:none}
      .chip{display:none}
      .content{padding:16px 12px 24px}
      .head-actions{width:100%}
      .head-actions .btn{flex:1 1 auto}
      /* tabel jadi kartu */
      thead{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0)}
      table,tbody{display:block}
      tbody tr{display:grid;grid-template-columns:1fr 1fr;gap:8px 12px;padding:12px;border-top:1px solid var(--surface-3);background:transparent!important}
      tbody td{padding:0;display:block;min-width:0;width:auto}
      td[data-label]::before{content:attr(data-label);display:block;margin-bottom:2px;font:700 10px/14px var(--f-body);letter-spacing:.5px;text-transform:uppercase;color:var(--subtle)}
      td.c-aktor,td.c-desk{grid-column:1/-1}
      td.c-aksi{grid-column:1/-1;text-align:right;border-top:1px solid var(--surface-3);padding-top:8px}
      td.c-aksi::before{display:none}
    }
    @media (max-width:480px){
      .stat{padding:12px}
      .stat strong{font-size:24px}
      .select{flex:1 1 calc(50% - 4px)}
      .select select{width:100%}
      .pills{flex-wrap:nowrap;overflow-x:auto;padding-bottom:4px;-webkit-overflow-scrolling:touch}
      .pager{justify-content:center;text-align:center}
    }
    @media (prefers-reduced-motion:reduce){*{transition:none!important}}
  </style>
</head>
<body>

{{-- ============ ICON SPRITE ============ --}}
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-menu" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></symbol>
  <symbol id="i-box" viewBox="0 0 24 24"><path d="M21 8 12 3 3 8v8l9 5 9-5Z"/><path d="m3 8 9 5 9-5M12 13v8"/></symbol>
  <symbol id="i-dash" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></symbol>
  <symbol id="i-users" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></symbol>
  <symbol id="i-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14a9 3 0 0 0 18 0V5"/><path d="M3 12a9 3 0 0 0 18 0"/></symbol>
  <symbol id="i-log" viewBox="0 0 24 24"><path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></symbol>
  <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></symbol>
  <symbol id="i-download" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></symbol>
  <symbol id="i-user" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></symbol>
  <symbol id="i-bell" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.94 1.94 0 0 0 3.4 0"/></symbol>
  <symbol id="i-down" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></symbol>
  <symbol id="i-left" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></symbol>
  <symbol id="i-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></symbol>
  <symbol id="i-out" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/></symbol>
  <symbol id="i-cap" viewBox="0 0 24 24"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></symbol>
  <symbol id="i-clipboard" viewBox="0 0 24 24"><rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2M9 14l2 2 4-4"/></symbol>
  <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></symbol>
  <symbol id="i-filter" viewBox="0 0 24 24"><path d="M3 6h18M7 12h10M10 18h4"/></symbol>
  <symbol id="i-trend" viewBox="0 0 24 24"><path d="m22 7-8.5 8.5-5-5L2 17"/><path d="M16 7h6v6"/></symbol>
  <symbol id="i-badge" viewBox="0 0 24 24"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></symbol>
  <symbol id="i-alert" viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4M12 17h.01"/></symbol>
  <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></symbol>
  <symbol id="i-lock" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></symbol>
  <symbol id="i-doc" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5Z"/><path d="M14 2v6h6M8 13h8M8 17h8"/></symbol>
  <symbol id="i-tag" viewBox="0 0 24 24"><path d="M12.59 2.59A2 2 0 0 0 11.17 2H4a2 2 0 0 0-2 2v7.17a2 2 0 0 0 .59 1.42l8.7 8.7a2.43 2.43 0 0 0 3.42 0l6.58-6.58a2.43 2.43 0 0 0 0-3.42Z"/><path d="M7 7h.01"/></symbol>
  <symbol id="i-building" viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M12 6h.01M16 6h.01M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/></symbol>
  <symbol id="i-wrench" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z"/></symbol>
</svg>

<div class="app">

  {{-- ============ SIDEBAR ============ --}}
  <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div>
      <div class="brand">
        <div class="brand-logo"><svg class="i"><use href="#i-box"/></svg></div>
        <div><b>INVENTA</b><small>Admin Aplikasi</small></div>
      </div>
      <div class="nav-title">Menu Utama</div>
      <nav class="nav">
        @foreach ($menu as $m)
          <a href="{{ $m['href'] }}" class="{{ $m['active'] ? 'active' : '' }}" @if($m['active']) aria-current="page" @endif>
            <svg class="i"><use href="#{{ $m['icon'] }}"/></svg>{{ $m['label'] }}
          </a>
        @endforeach
      </nav>
    </div>
    <div class="side-user">
      <div class="side-user-card">
        <div class="avatar" style="font-family:var(--f-head)">SA</div>
        <div class="meta"><b>Super Admin</b><br><span>Aktif</span></div>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
          @csrf
          <button type="submit" class="out" aria-label="Keluar" title="Keluar">
            <svg class="i"><use href="#i-out"/></svg>
          </button>
        </form>
      </div>
    </div>
  </aside>
  <div class="scrim" id="scrim"></div>

  {{-- ============ KOLOM UTAMA ============ --}}
  <div class="main-col">

    <header class="topbar">
      <button class="burger" id="burger" aria-label="Buka menu" aria-controls="sidebar"><svg class="i"><use href="#i-menu"/></svg></button>
      <div class="crumb"><b>INVENTA</b><span>/</span><span>Admin Portal</span></div>
      <div class="searchbox">
        <svg class="i"><use href="#i-search"/></svg>
        <input type="search" placeholder="Cari UKM, inventaris, log aktivitas..." aria-label="Pencarian global">
      </div>
      <div class="top-actions">
        <span class="chip"><svg class="i"><use href="#i-cap"/></svg>{{ $periode }}</span>
        <button class="icon-btn" aria-label="Notifikasi"><svg class="i"><use href="#i-bell"/></svg><span class="dot"></span></button>
        <div class="me" aria-label="Akun"><svg class="i"><use href="#i-user"/></svg></div>
      </div>
    </header>

    <main class="content">

      {{-- ---------- Header halaman ---------- --}}
      <section class="page-head">
        <div>
          <h1>Log Aktivitas Sistem</h1>
          <p>Pencatatan real-time immutable audit trail seluruh transaksi inventaris, otentikasi, dan aksi administratif lintas UKM universitas.</p>
        </div>
        <div class="head-actions">
          <a href="#" class="btn btn-primary"><svg class="i"><use href="#i-download"/></svg>Ekspor Audit Log (.CSV)</a>
        </div>
      </section>

      {{-- ---------- Statistik ---------- --}}
      <section class="stats" aria-label="Ringkasan">
        <div class="stat">
          <div class="stat-top"><span class="label">Total Aktivitas Hari Ini</span><svg class="i ico t-primary"><use href="#i-calendar"/></svg></div>
          <strong>{{ number_format($totalHariIni) }}</strong>
          <div class="hint t-green"><svg class="i"><use href="#i-trend"/></svg>+{{ $naikPersen }}% vs kemarin</div>
        </div>

        <div class="stat">
          <div class="stat-top"><span class="label">Verifikasi &amp; Approval</span><svg class="i ico t-green"><use href="#i-badge"/></svg></div>
          <strong>{{ number_format($totalApproval) }}</strong>
          <div class="hint">{{ $antreanAktif }} antrean aktif</div>
        </div>

        <div class="stat">
          <div class="stat-top"><span class="label">Peringatan</span><svg class="i ico t-orange"><use href="#i-alert"/></svg></div>
          <strong>{{ number_format($totalPeringatan) }}</strong>
          <div class="hint t-orange"><svg class="i"><use href="#i-info"/></svg>{{ $butuhInspeksi }} butuh inspeksi</div>
        </div>

        <div class="stat">
          <div class="stat-top"><span class="label">Password sudah diperbarui</span><svg class="i ico t-primary"><use href="#i-lock"/></svg></div>
          <strong>{{ $persenPassword }}%</strong>
          <div class="hint mono">Secured</div>
        </div>
      </section>

      {{-- ---------- Toolbar + tabel ---------- --}}
      <section style="display:flex;flex-direction:column;gap:12px;min-width:0">

        <form class="card toolbar" method="GET" action="{{ url()->current() }}" role="search">
          <div class="tool-row">
            <label class="searchbox">
              <span class="sr-only">Cari log</span>
              <svg class="i"><use href="#i-search"/></svg>
              <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari aktor, IP address, atau ID pengajuan...">
            </label>

            <div class="select">
              <svg class="i"><use href="#i-calendar"/></svg>
              <select name="tanggal" aria-label="Filter tanggal" onchange="this.form.submit()">
                <option value="hari_ini" @selected(request('tanggal','hari_ini') === 'hari_ini')>Hari ini ({{ $tanggalHariIni }})</option>
                <option value="7_hari"   @selected(request('tanggal') === '7_hari')>7 hari terakhir</option>
                <option value="30_hari"  @selected(request('tanggal') === '30_hari')>30 hari terakhir</option>
                <option value="semua"    @selected(request('tanggal') === 'semua')>Semua waktu</option>
              </select>
              <svg class="i chev"><use href="#i-down"/></svg>
            </div>

            <div class="select">
              <svg class="i"><use href="#i-filter"/></svg>
              <select name="level" aria-label="Filter level" onchange="this.form.submit()">
                <option value="">Semua Level</option>
                <option value="info"     @selected(request('level') === 'info')>Info</option>
                <option value="warning"  @selected(request('level') === 'warning')>Peringatan</option>
                <option value="critical" @selected(request('level') === 'critical')>Kritis</option>
              </select>
              <svg class="i chev"><use href="#i-down"/></svg>
            </div>
          </div>

          <div class="pills" role="group" aria-label="Filter kategori">
            <span class="lbl">Filter Kategori:</span>
            @foreach ($kategori as $k)
              <a href="{{ request()->fullUrlWithQuery(['kategori' => $k['key'] ?: null, 'page' => null]) }}"
                 class="pill {{ $kategoriAktif === $k['key'] ? 'on' : '' }}"
                 @if($kategoriAktif === $k['key']) aria-current="true" @endif>
                {{ $k['label'] }} ({{ number_format($k['jumlah']) }})
              </a>
            @endforeach
          </div>
        </form>

        <div class="card table-card">
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Waktu &amp; Hash</th>
                  <th>Kategori / Level</th>
                  <th>Aktor Eksekutor</th>
                  <th>Deskripsi Aktivitas &amp; Objek Target</th>
                  <th>Referensi</th>
                  <th>IP Origin</th>
                  <th class="c-right">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($logs as $l)
                  <tr>
                    <td class="c-waktu" data-label="Waktu &amp; Hash">
                      <div class="time">{{ $l['waktu'] }}</div>
                      <div class="hash"><i style="background:{{ $l['hash_color'] }}"></i>{{ $l['hash'] }}</div>
                    </td>

                    <td class="c-kat" data-label="Kategori / Level">
                      <span class="lv lv-{{ $l['level'] }}">{{ $l['kategori'] }}</span>
                    </td>

                    <td class="c-aktor actor" data-label="Aktor Eksekutor">
                      <b class="{{ $l['aktor_utama'] ? 'main' : '' }}">{{ $l['aktor'] }}</b>
                      <small>{{ $l['peran'] }}</small>
                    </td>

                    <td class="c-desk" data-label="Deskripsi Aktivitas">
                      <div class="desc">
                        @foreach ($l['deskripsi'] as [$teks, $jenis])<span class="{{ $jenis }}">{{ $teks }}</span>@endforeach
                      </div>
                      @if (!empty($l['meta']))
                        <div class="meta">
                          @foreach ($l['meta'] as [$ikon, $teks])
                            <span><svg class="i"><use href="#{{ $ikon }}"/></svg>{{ $teks }}</span>
                          @endforeach
                        </div>
                      @endif
                      @if (!empty($l['alasan']))
                        <div class="alert"><svg class="i"><use href="#i-info"/></svg><span>{{ $l['alasan'] }}</span></div>
                      @endif
                    </td>

                    <td class="c-ref" data-label="Referensi"><span class="ref">{{ $l['ref'] }}</span></td>

                    <td class="c-ip" data-label="IP Origin">
                      <div class="ip">{{ $l['ip'] }}</div>
                      <div class="loc">{{ $l['lokasi'] }}</div>
                    </td>

                    <td class="c-right c-aksi">
                      <a href="#" class="btn-detail" aria-label="Detail log {{ $l['ref'] }}">Detail<svg class="i"><use href="#i-right"/></svg></a>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="7" class="empty">Belum ada log aktivitas.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{-- pagination (ganti dengan {{ $paginator->links() }} jika memakai paginate()) --}}
          <div class="pager">
            <div>Menampilkan <b>{{ count($logs) }}</b> dari <b>{{ number_format($totalHariIni) }}</b> aktivitas</div>
            <nav class="pages" aria-label="Halaman">
              <span class="off" aria-hidden="true"><svg class="i"><use href="#i-left"/></svg></span>
              <a href="#" class="on" aria-current="page">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <span class="gap">…</span>
              <a href="#">{{ $totalHalaman }}</a>
              <a href="#" aria-label="Berikutnya"><svg class="i"><use href="#i-right"/></svg></a>
            </nav>
          </div>
        </div>
      </section>

    </main>
  </div>
</div>

<script>
  (function () {
    var body = document.body;
    document.getElementById('burger').addEventListener('click', function () { body.classList.toggle('nav-open'); });
    document.getElementById('scrim').addEventListener('click', function () { body.classList.remove('nav-open'); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') body.classList.remove('nav-open'); });
  })();
</script>
</body>
</html>