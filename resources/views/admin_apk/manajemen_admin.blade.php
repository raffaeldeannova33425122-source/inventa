<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Manajemen Akun Admin UKM • INVENTA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">

  @php
    /*
     |----------------------------------------------------------------------
     | DATA
     | Semua variabel di bawah bisa dikirim dari controller. Kalau tidak ada,
     | dipakai data contoh ini supaya tampilan tetap jalan.
     |----------------------------------------------------------------------
     */
    $admins = $admins ?? [
      ['nama' => 'Achmad Hanafi',    'nim' => '2105346081', 'ukm' => 'Fotografi',    'email' => 'achmad.h@polines.ac.id',  'telp' => '+62 812-4455-8901', 'dibuat' => '14 Agu 2024', 'terverifikasi' => true,  'aktif' => true,  'foto' => null],
      ['nama' => 'Haqqi Raya',       'nim' => '2105346092', 'ukm' => 'Musik',        'email' => 'haqqi.raya@polines.ac.id','telp' => '+62 821-8899-2310', 'dibuat' => '18 Agu 2024', 'terverifikasi' => true,  'aktif' => true,  'foto' => null],
      ['nama' => 'Rafid A. Pratama', 'nim' => '2205346104', 'ukm' => 'Olahraga',     'email' => 'rafid.p@polines.ac.id',   'telp' => '+62 856-1122-4478', 'dibuat' => '02 Sep 2024', 'terverifikasi' => false, 'aktif' => false, 'foto' => null],
      ['nama' => 'Raffael Deannova', 'nim' => '2205346115', 'ukm' => 'Teater & Seni','email' => 'raffael.d@polines.ac.id', 'telp' => '+62 813-7722-9011', 'dibuat' => '05 Sep 2024', 'terverifikasi' => true,  'aktif' => true,  'foto' => null],
      ['nama' => 'Dimas Wicaksono',  'nim' => '2105346077', 'ukm' => 'Robotika',     'email' => 'dimas.w@polines.ac.id',   'telp' => '+62 899-4433-2211', 'dibuat' => '10 Sep 2024', 'terverifikasi' => true,  'aktif' => true,  'foto' => null],
    ];

    $totalAdmin      = $totalAdmin      ?? 34;
    $totalTerverif   = $totalTerverif   ?? 29;
    $totalMenunggu   = $totalMenunggu   ?? 5;
    $totalNonaktif   = $totalNonaktif   ?? 0;
    $slotTerpakai    = $slotTerpakai    ?? 34;
    $slotTotal       = $slotTotal       ?? 48;
    $periode         = $periode         ?? '2026/2027 Gasal';

    $persenTerverif  = $totalAdmin > 0 ? round($totalTerverif / $totalAdmin * 100, 1) : 0;
    $persenSlot      = $slotTotal  > 0 ? round($slotTerpakai  / $slotTotal  * 100, 1) : 0;

    $menu = [
      ['label' => 'Dashboard',           'icon' => 'i-dash',  'href' => route('dashboard_admin_apk'), 'active' => false],
      ['label' => 'Manajemen Admin UKM', 'icon' => 'i-users', 'href' => route('manajemen_admin'), 'active' => true],
      ['label' => 'Master Data',         'icon' => 'i-db',    'href' => route('master_data'), 'active' => false],
      ['label' => 'Log Sistem',          'icon' => 'i-log',   'href' => route('log_sistem'), 'active' => false],
    ];

    $warnaAvatar = ['#3755C3', '#9D4300', '#00563A', '#6B3FA0', '#B3261E'];
    $inisial = fn ($nama) => collect(preg_split('/\s+/', trim($nama)))
                              ->filter()->take(2)
                              ->map(fn ($k) => mb_strtoupper(mb_substr($k, 0, 1)))->implode('');
  @endphp

  <style>
    /* ===================== TOKENS ===================== */
    :root{
      --bg:#FAF8FF; --surface:#fff; --surface-2:#F2F3FF; --surface-3:#EAEDFF; --surface-4:#E2E7FF;
      --text:#131B2E; --muted:#444653; --subtle:#757684;
      --primary:#00288E; --primary-side:#1E40AF;
      --green:#00563A; --green-bg:rgba(111,251,190,.30); --green-dot:#4EDEA3;
      --orange:#9D4300; --orange-bg:#FFDBCA; --danger:#BA1A1A;
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
    .side-user-card{display:flex;align-items:center;gap:8px;padding:8px;border-radius:8px;background:rgba(255,255,255,.05)}
    .side-user-card .meta{flex:1;min-width:0}
    .side-user-card b{display:block;font-size:13px;font-weight:600}
    .side-user-card span{display:flex;align-items:center;gap:4px;font-size:11px;color:#B8C4FF}
    .side-user-card span::before{content:"";width:6px;height:6px;border-radius:50%;background:#6FFBBE}
    .side-user-card .out{padding:4px;border-radius:4px;color:#B8C4FF;font-size:14px;appearance:none;border:0;cursor:pointer;background:transparent;display:grid;place-items:center}
    .logout-form{display:flex;align-items:center;justify-content:center;margin:0}

    .avatar{width:36px;height:36px;border-radius:8px;display:grid;place-items:center;flex:none;overflow:hidden;
            color:#fff;font:700 13px/1 var(--f-body);background:#3755C3}
    .avatar img{width:100%;height:100%;object-fit:cover}

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
    .eyebrow{display:flex;align-items:center;gap:4px;font:600 12px/16px var(--f-mono);letter-spacing:.6px;text-transform:uppercase;color:var(--muted)}
    .eyebrow::before{content:"";width:8px;height:8px;border-radius:50%;background:var(--primary)}
    .page-head h1{font:700 clamp(20px,2.4vw,24px)/1.35 var(--f-head);margin-top:2px}
    .page-head p{max-width:672px;margin-top:2px;color:var(--muted)}
    .head-actions{display:flex;flex-wrap:wrap;gap:8px}
    .btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:8px 14px;border-radius:8px;box-shadow:var(--shadow);
         font:600 13px/16px var(--f-body);white-space:nowrap;transition:filter .15s}
    .btn:hover{filter:brightness(.96)}
    .btn-soft{background:var(--surface-4);color:var(--text)}
    .btn-primary{background:var(--primary);color:#fff}
    .btn-white{background:#fff;color:var(--text)}
    .btn .i{font-size:14px}

    /* ===================== STATS ===================== */
    .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:12px}
    .stat{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:16px;background:#fff;border-radius:8px;box-shadow:var(--shadow)}
    .stat .label{font:500 13px/18px var(--f-body);color:var(--muted)}
    .stat .num{display:flex;align-items:baseline;gap:4px;margin:2px 0}
    .stat .num strong{font:700 28px/34px var(--f-head)}
    .stat .num span{font-size:13px;color:var(--muted)}
    .stat .hint{display:flex;align-items:flex-start;gap:4px;font:600 12px/16px var(--f-body);letter-spacing:.12px}
    .stat .ico{width:48px;height:48px;flex:none;border-radius:8px;display:grid;place-items:center;font-size:22px}
    .t-green{color:var(--green)} .t-orange{color:var(--orange)} .t-muted{color:var(--muted)} .t-primary{color:var(--primary)}
    .dot-g{width:6px;height:6px;border-radius:50%;background:var(--green-dot);margin-top:5px;flex:none}

    /* ===================== MAIN GRID ===================== */
    .layout{display:grid;grid-template-columns:minmax(0,1fr) 320px;gap:20px;align-items:start}
    .col{display:flex;flex-direction:column;gap:12px;min-width:0}
    .card{background:#fff;border-radius:8px;box-shadow:var(--shadow)}

    /* toolbar */
    .toolbar{display:flex;flex-wrap:wrap;gap:8px;padding:12px}
    .toolbar .searchbox{flex:1 1 220px;max-width:none}
    .toolbar .searchbox input{background:var(--surface-2);box-shadow:none}
    .select{position:relative;flex:0 1 auto}
    .select select{appearance:none;-webkit-appearance:none;max-width:100%;padding:8px 32px 8px 12px;border:0;border-radius:8px;background:var(--surface-2);
                   font:500 13px var(--f-body);color:var(--text);cursor:pointer}
    .select .i{position:absolute;right:10px;top:50%;transform:translateY(-50%);font-size:12px;color:var(--subtle);pointer-events:none}
    .tool-btn{padding:8px 10px;border-radius:8px;background:var(--surface-2);color:var(--subtle);font-size:14px;display:grid;place-items:center}

    /* table */
    .table-card{overflow:hidden}
    .table-wrap{overflow-x:auto}
    table{width:100%;border-collapse:collapse}
    thead th{padding:12px;background:var(--surface-2);text-align:left;font:700 11px/14px var(--f-body);letter-spacing:.55px;text-transform:uppercase;color:var(--muted);white-space:nowrap}
    tbody td{padding:10px 12px;vertical-align:middle}
    tbody tr:nth-child(even){background:rgba(242,243,255,.35)}
    tbody tr:hover{background:rgba(242,243,255,.8)}
    .c-check{width:36px;padding-right:0!important}
    .c-center{text-align:center}
    .c-right{text-align:right}
    input[type=checkbox].cb{width:15px;height:15px;accent-color:var(--primary);cursor:pointer}
    .who{display:flex;align-items:center;gap:8px;min-width:170px}
    .who b{display:block;font:600 14px/20px var(--f-head)}
    .who small{display:block;font:400 11px/18px var(--f-mono);color:var(--muted)}
    .badge{display:inline-flex;align-items:center;gap:4px;padding:2px 8px;border-radius:8px;font:500 12px/16px var(--f-body);letter-spacing:.12px;background:var(--surface-3);color:var(--text)}
    .badge .i{color:var(--primary);font-size:12px}
    .badge.ok{background:var(--green-bg);color:var(--green);font-weight:600}
    .badge.ok::before{content:"";width:6px;height:6px;border-radius:50%;background:var(--green-dot)}
    .badge.wait{background:var(--orange-bg);color:var(--orange);font-weight:600}
    .badge.wait::before{content:"";width:6px;height:6px;border-radius:50%;background:var(--orange)}
    .mail{font:500 13px/18px var(--f-body);word-break:break-all}
    .tel,.date{font:500 11px/18px var(--f-mono);color:var(--muted)}
    .date{font-size:12px;line-height:16px;white-space:nowrap}

    /* switch */
    .switch{position:relative;display:inline-block;width:44px;height:24px}
    .switch input{position:absolute;inset:0;opacity:0;margin:0;cursor:pointer;z-index:1}
    .switch span{position:absolute;inset:0;border-radius:12px;background:#C4C5D5;transition:background .2s}
    .switch span::after{content:"";position:absolute;top:2px;left:2px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 2px rgba(0,0,0,.15);transition:transform .2s}
    .switch input:checked + span{background:var(--primary)}
    .switch input:checked + span::after{transform:translateX(20px)}
    .switch input:focus-visible + span{outline:2px solid var(--primary);outline-offset:2px}

    .row-actions{display:inline-flex;gap:2px}
    .row-actions button{padding:6px;border-radius:4px;color:var(--muted);font-size:15px}
    .row-actions button:hover{background:var(--surface-3)}
    .row-actions .del:hover{color:var(--danger)}

    .empty{padding:32px;text-align:center;color:var(--muted)}

    /* pagination */
    .pager{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:8px;padding:8px 12px;background:var(--surface-2);font-size:13px;color:var(--muted)}
    .pager b{color:var(--text);font-weight:600}
    .pages{display:flex;flex-wrap:wrap;align-items:center;gap:2px}
    .pages a,.pages span{min-width:32px;height:32px;display:grid;place-items:center;border-radius:4px;font:500 13px var(--f-body);color:var(--text)}
    .pages a.on{background:var(--primary);color:#fff;font-weight:600}
    .pages .off{opacity:.4}

    /* side panel */
    .panel{padding:20px;display:flex;flex-direction:column;gap:12px}
    .panel-head{display:flex;align-items:center;gap:8px}
    .panel-head .ico{width:36px;height:36px;border-radius:8px;background:#DDE1FF;color:var(--primary);display:grid;place-items:center;font-size:18px}
    .panel-head b{display:block;font:700 14px/20px var(--f-head)}
    .panel-head small{font:500 11px/16px var(--f-mono);color:var(--muted)}
    .note{display:flex;gap:6px;padding:12px;border-radius:8px;background:var(--surface-2);font-size:13px;line-height:1.4}
    .note .i{color:var(--primary);font-size:17px;margin-top:1px}
    .quota-row{display:flex;justify-content:space-between;gap:8px;font-size:13px;color:var(--muted)}
    .quota-row b{font:600 13px var(--f-mono);color:var(--text)}
    .bar{height:8px;border-radius:12px;background:var(--surface-3);overflow:hidden;margin:4px 0}
    .bar i{display:block;height:100%;background:var(--primary);border-radius:12px}
    .quota-note{text-align:right;font-size:11px;color:var(--muted)}
    .criteria h3{font:600 12px/16px var(--f-body);letter-spacing:.6px;text-transform:uppercase;color:var(--muted);margin-bottom:4px}
    .criteria ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:4px}
    .criteria li{display:flex;align-items:center;gap:4px;font-size:12px;color:var(--muted)}
    .criteria li .i{color:#003D27;font-size:14px}
    .link{display:flex;justify-content:center;align-items:center;gap:4px;padding-top:4px;color:var(--primary);font:500 13px var(--f-body)}
    .panel-warn{background:rgba(226,231,255,.6)}
    .panel-warn h3{display:flex;align-items:center;gap:4px;color:var(--orange);font:700 14px/20px var(--f-head)}
    .panel-warn p{font-size:13px;color:var(--muted)}

    /* mobile overlay */
    .scrim{display:none}

    /* ===================== RESPONSIVE ===================== */
    @media (max-width:1180px){
      .layout{grid-template-columns:minmax(0,1fr)}
      .side-col{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:12px}
    }
    @media (max-width:1024px){
      .app{grid-template-columns:minmax(0,1fr)}
      .sidebar{position:fixed;inset:0 auto 0 0;width:min(var(--sidebar-w),82vw);transform:translateX(-100%);transition:transform .25s ease}
      body.nav-open .sidebar{transform:none}
      body.nav-open .scrim{display:block;position:fixed;inset:0;background:rgba(19,27,46,.45);z-index:50}
      .burger{display:inline-grid}
    }
    @media (max-width:820px){
      .topbar{padding:0 12px;gap:8px}
      .crumb{display:none}
      .chip{display:none}
      .content{padding:16px 12px 24px}
      .head-actions{width:100%}
      .head-actions .btn{flex:1 1 auto}
      /* tabel jadi kartu */
      thead{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0)}
      table,tbody{display:block}
      tbody tr{display:grid;grid-template-columns:1fr 1fr;gap:8px 12px;padding:12px;border-bottom:1px solid var(--surface-3);background:transparent!important;position:relative}
      tbody td{padding:0;display:block;min-width:0}
      td[data-label]::before{content:attr(data-label);display:block;margin-bottom:2px;font:700 10px/14px var(--f-body);letter-spacing:.5px;text-transform:uppercase;color:var(--subtle)}
      .c-check{position:absolute;top:14px;right:12px;width:auto}
      td.c-nama{grid-column:1/-1;padding-right:28px}
      td.c-kontak{grid-column:1/-1}
      td.c-aksi{grid-column:1/-1;text-align:right;border-top:1px solid var(--surface-3);padding-top:8px}
      td.c-aksi::before{display:none}
      .c-center{text-align:left}
    }
    @media (max-width:480px){
      .stat{padding:12px}
      .stat .num strong{font-size:24px}
      .select{flex:1 1 calc(50% - 4px)}
      .select select{width:100%}
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
  <symbol id="i-mail" viewBox="0 0 24 24"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/></symbol>
  <symbol id="i-userplus" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6M22 11h-6"/></symbol>
  <symbol id="i-userx" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="m17 8 5 5M22 8l-5 5"/></symbol>
  <symbol id="i-user" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></symbol>
  <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></symbol>
  <symbol id="i-hourglass" viewBox="0 0 24 24"><path d="M5 22h14M5 2h14M17 22v-4.17a2 2 0 0 0-.59-1.42L12 12l-4.41 4.41A2 2 0 0 0 7 17.83V22M7 2v4.17a2 2 0 0 0 .59 1.42L12 12l4.41-4.41A2 2 0 0 0 17 6.17V2"/></symbol>
  <symbol id="i-building" viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M12 6h.01M16 6h.01M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/></symbol>
  <symbol id="i-pencil" viewBox="0 0 24 24"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></symbol>
  <symbol id="i-key" viewBox="0 0 24 24"><circle cx="7.5" cy="15.5" r="5.5"/><path d="m21 2-9.6 9.6M15.5 7.5l3 3L22 7l-3-3"/></symbol>
  <symbol id="i-trash" viewBox="0 0 24 24"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M10 11v6M14 11v6"/></symbol>
  <symbol id="i-bell" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.94 1.94 0 0 0 3.4 0"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M7 7h10v10M7 17 17 7"/></symbol>
  <symbol id="i-down" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></symbol>
  <symbol id="i-refresh" viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 15-6.7L21 8M21 3v5h-5M21 12a9 9 0 0 1-15 6.7L3 16M8 16H3v5"/></symbol>
  <symbol id="i-left" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></symbol>
  <symbol id="i-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></symbol>
  <symbol id="i-out" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/></symbol>
  <symbol id="i-cap" viewBox="0 0 24 24"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></symbol>
  <symbol id="i-clipboard" viewBox="0 0 24 24"><rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2M9 14l2 2 4-4"/></symbol>
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
        <div class="meta"><b>Super Admin</b><span>Aktif</span></div>
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
          <div class="eyebrow">Otoritas Pusat • Hak Akses</div>
          <h1>Manajemen Akun Admin UKM</h1>
          <p>Kelola kredensial, hak akses delegasi, dan status verifikasi penanggung jawab inventaris tiap Unit Kegiatan Mahasiswa (UKM).</p>
        </div>
        <div class="head-actions">
          <a href="#" class="btn btn-soft"><svg class="i"><use href="#i-download"/></svg>Ekspor Data</a>
          <a href="#" class="btn btn-soft"><svg class="i"><use href="#i-mail"/></svg>Kirim Undangan Admin UKM</a>
          <a href="#" class="btn btn-primary"><svg class="i"><use href="#i-userplus"/></svg>Tambah Admin UKM</a>
        </div>
      </section>

      {{-- ---------- Statistik ---------- --}}
      <section class="stats" aria-label="Ringkasan">
        <div class="stat">
          <div>
            <div class="label">Total Akun Admin</div>
            <div class="num"><strong>{{ $totalAdmin }}</strong><span>Personel</span></div>
            <div class="hint t-green"><svg class="i" style="margin-top:2px"><use href="#i-building"/></svg>{{ $totalAdmin }} Lembaga UKM Aktif</div>
          </div>
          <div class="ico" style="background:var(--surface-3);color:var(--primary)"><svg class="i"><use href="#i-users"/></svg></div>
        </div>

        <div class="stat">
          <div>
            <div class="label">Terverifikasi</div>
            <div class="num"><strong>{{ $totalTerverif }}</strong><span class="t-green" style="font-weight:600">{{ $persenTerverif }}%</span></div>
            <div class="hint t-green"><i class="dot-g"></i>Akses Penuh Logistik</div>
          </div>
          <div class="ico" style="background:var(--green-bg);color:var(--green)"><svg class="i"><use href="#i-shield"/></svg></div>
        </div>

        <div class="stat">
          <div>
            <div class="label">Menunggu Verifikasi</div>
            <div class="num t-orange"><strong>{{ $totalMenunggu }}</strong><span class="t-orange" style="font-weight:600">Perlu Tinjauan</span></div>
            <div class="hint t-orange"><svg class="i" style="margin-top:2px"><use href="#i-clock"/></svg>Menunggu SK Kemahasiswaan</div>
          </div>
          <div class="ico" style="background:var(--orange-bg);color:var(--orange)"><svg class="i"><use href="#i-hourglass"/></svg></div>
        </div>

        <div class="stat">
          <div>
            <div class="label">Akun Dinonaktifkan</div>
            <div class="num"><strong>{{ $totalNonaktif }}</strong></div>
            <div class="hint t-muted" style="font-weight:500"><svg class="i" style="margin-top:2px"><use href="#i-clipboard"/></svg>Tidak Ada Pelanggaran</div>
          </div>
          <div class="ico" style="background:var(--surface-4);color:var(--subtle)"><svg class="i"><use href="#i-userx"/></svg></div>
        </div>
      </section>

      {{-- ---------- Tabel + panel kanan ---------- --}}
      <section class="layout">

        <div class="col">
          {{-- toolbar --}}
          <form class="card toolbar" method="GET" action="#" role="search">
            <label class="searchbox">
              <span class="sr-only">Cari admin</span>
              <svg class="i"><use href="#i-search"/></svg>
              <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari Nama Admin, NIM, atau UKM...">
            </label>
            <div class="select">
              <select name="ukm" aria-label="Filter UKM" onchange="this.form.submit()">
                <option value="">Filter UKM (Semua)</option>
                @foreach (collect($admins)->pluck('ukm')->unique() as $u)
                  <option value="{{ $u }}" @selected(request('ukm') === $u)>UKM {{ $u }}</option>
                @endforeach
              </select>
              <svg class="i"><use href="#i-down"/></svg>
            </div>
            <div class="select">
              <select name="status" aria-label="Filter status" onchange="this.form.submit()">
                <option value="">Filter Status (Semua Status)</option>
                <option value="terverifikasi" @selected(request('status') === 'terverifikasi')>Terverifikasi</option>
                <option value="menunggu" @selected(request('status') === 'menunggu')>Menunggu Verifikasi</option>
              </select>
              <svg class="i"><use href="#i-down"/></svg>
            </div>
            <div class="select">
              <select name="sort" aria-label="Urutkan" onchange="this.form.submit()">
                <option value="terkini" @selected(request('sort','terkini') === 'terkini')>Urutkan: Terkini</option>
                <option value="nama" @selected(request('sort') === 'nama')>Urutkan: Nama</option>
              </select>
              <svg class="i"><use href="#i-down"/></svg>
            </div>
            <a href="{{ url()->current() }}" class="tool-btn" aria-label="Reset filter"><svg class="i"><use href="#i-refresh"/></svg></a>
          </form>

          {{-- tabel --}}
          <div class="card table-card">
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th class="c-check"><input type="checkbox" class="cb" id="check-all" aria-label="Pilih semua"></th>
                    <th>Nama Admin &amp; NIM</th>
                    <th>UKM Naungan</th>
                    <th>Kontak / Email</th>
                    <th>Tanggal Dibuat</th>
                    <th>Status Verifikasi</th>
                    <th class="c-center">Status Aktif</th>
                    <th class="c-right">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($admins as $i => $a)
                    <tr>
                      <td class="c-check"><input type="checkbox" class="cb row-check" aria-label="Pilih {{ $a['nama'] }}"></td>

                      <td class="c-nama">
                        <div class="who">
                          @if (!empty($a['foto']))
                            <div class="avatar"><img src="{{ $a['foto'] }}" alt="{{ $a['nama'] }}" loading="lazy"></div>
                          @else
                            <div class="avatar" style="background:{{ $warnaAvatar[$i % count($warnaAvatar)] }}">{{ $inisial($a['nama']) }}</div>
                          @endif
                          <div><b>{{ $a['nama'] }}</b><small>NIM: {{ $a['nim'] }}</small></div>
                        </div>
                      </td>

                      <td data-label="UKM Naungan">
                        <span class="badge"><svg class="i"><use href="#i-box"/></svg>UKM {{ $a['ukm'] }}</span>
                      </td>

                      <td class="c-kontak" data-label="Kontak / Email">
                        <div class="mail">{{ $a['email'] }}</div>
                        <div class="tel">{{ $a['telp'] }}</div>
                      </td>

                      <td data-label="Tanggal Dibuat"><span class="date">{{ $a['dibuat'] }}</span></td>

                      <td data-label="Status Verifikasi">
                        @if ($a['terverifikasi'])
                          <span class="badge ok">Terverifikasi</span>
                        @else
                          <span class="badge wait">Menunggu Verifikasi</span>
                        @endif
                      </td>

                      <td class="c-center" data-label="Status Aktif">
                        <label class="switch">
                          <span class="sr-only">Status aktif {{ $a['nama'] }}</span>
                          <input type="checkbox" @checked($a['aktif']) @disabled(!$a['terverifikasi'])>
                          <span></span>
                        </label>
                      </td>

                      <td class="c-right c-aksi">
                        <div class="row-actions">
                          <button type="button" title="Edit" aria-label="Edit {{ $a['nama'] }}"><svg class="i"><use href="#i-pencil"/></svg></button>
                          @if ($a['terverifikasi'])
                            <button type="button" title="Reset kata sandi / hak akses" aria-label="Hak akses {{ $a['nama'] }}"><svg class="i"><use href="#i-key"/></svg></button>
                          @endif
                          <button type="button" class="del" title="Hapus" aria-label="Hapus {{ $a['nama'] }}"><svg class="i"><use href="#i-trash"/></svg></button>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr><td colspan="8" class="empty">Belum ada akun admin UKM.</td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            {{-- pagination (ganti dengan {{ $paginator->links() }} jika memakai paginate()) --}}
            <div class="pager">
              <div>Menampilkan <b>{{ count($admins) }}</b> dari <b>{{ $totalAdmin }}</b> Akun Admin</div>
              <nav class="pages" aria-label="Halaman">
                <span class="off"><svg class="i"><use href="#i-left"/></svg></span>
                <a href="#" class="on" aria-current="page">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <span>…</span>
                <a href="#">7</a>
                <a href="#" aria-label="Berikutnya"><svg class="i"><use href="#i-right"/></svg></a>
              </nav>
            </div>
          </div>
        </div>

        {{-- panel kanan --}}
        <aside class="col side-col">
          <div class="card panel">
            <div class="panel-head">
              <div class="ico"><svg class="i"><use href="#i-shield"/></svg></div>
              <div><b>Kebijakan Akun Admin UKM</b><small>SOP Kemahasiswaan • 2026</small></div>
            </div>

            <div class="note">
              <svg class="i"><use href="#i-shield"/></svg>
              <p>Tiap UKM berhak mendaftarkan <b>maksimal 2 penanggung jawab aset resmi</b> bersertifikat kepengurusan kemahasiswaan aktif.</p>
            </div>

            <div>
              <div class="quota-row"><span>Kuota Slot Terisi Kampus</span><b>{{ $slotTerpakai }} / {{ $slotTotal }} Slot</b></div>
              <div class="bar" role="progressbar" aria-valuenow="{{ $persenSlot }}" aria-valuemin="0" aria-valuemax="100"><i style="width:{{ $persenSlot }}%"></i></div>
              <div class="quota-note">{{ $persenSlot }}% Kapasitas Terpakai</div>
            </div>

            <div class="criteria">
              <h3>Kriteria Otorisasi</h3>
              <ul>
                <li><svg class="i"><use href="#i-check"/></svg>SK Pengurus Resmi Kemahasiswaan</li>
                <li><svg class="i"><use href="#i-check"/></svg>Email Institusi SSO Aktif (@polines.ac.id)</li>
                <li><svg class="i"><use href="#i-check"/></svg>Bebas Tanggungan Kerusakan Alat Inventaris</li>
              </ul>
            </div>

            <a href="#" class="link">Baca Regulasi Lengkap <svg class="i"><use href="#i-arrow"/></svg></a>
          </div>

          <div class="card panel panel-warn">
            <h3><svg class="i"><use href="#i-clipboard"/></svg>Aktivitas Verifikasi Terkini</h3>
            <p>Ada <b>{{ $totalMenunggu }} permohonan delegasi</b> menunggu tanda tangan digital Super Admin sebelum dapat menerbitkan reservasi logistik pekan ini.</p>
            <a href="#" class="btn btn-white"><svg class="i"><use href="#i-check"/></svg>Buka Antrean Verifikasi</a>
          </div>
        </aside>

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

    var all = document.getElementById('check-all');
    if (all) all.addEventListener('change', function () {
      document.querySelectorAll('.row-check').forEach(function (c) { c.checked = all.checked; });
    });
  })();
</script>
</body>
</html>