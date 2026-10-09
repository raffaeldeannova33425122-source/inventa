<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard — Semua UKM • INVENTA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg:#FAF8FF; --surface:#fff; --surface-2:#F2F3FF; --surface-3:#EAEDFF; --surface-4:#E2E7FF;
      --text:#131B2E; --muted:#444653; --subtle:#757684;
      --primary:#00288E; --primary-side:#1E40AF; --green:#00563A; --orange:#9D4300; --danger:#BA1A1A;
      --radius:8px; --sidebar-w:256px; --topbar-h:64px; --shadow:0 1px 2px rgba(0,0,0,.05);
      --f-body:'Inter',system-ui,sans-serif; --f-head:'Plus Jakarta Sans','Inter',system-ui,sans-serif; --f-mono:'JetBrains Mono',ui-monospace,monospace;
    }
    *,*::before,*::after{box-sizing:border-box}
    html{-webkit-text-size-adjust:100%}
    body{margin:0;background:var(--bg);color:var(--text);font-family:var(--f-body);font-size:14px;line-height:1.4}
    h1,h2,h3,p{margin:0}
    a{color:inherit;text-decoration:none}
    button, input, select{font:inherit}
    svg.i{width:1em;height:1em;flex:none;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
    .sr-only{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}

    .app{display:grid;grid-template-columns:var(--sidebar-w) minmax(0,1fr);min-height:100vh}
    .sidebar{position:sticky;top:0;height:100vh;background:var(--primary-side);color:#fff;display:flex;flex-direction:column;justify-content:space-between;box-shadow:0 1px 8px rgba(0,0,0,.08);z-index:60}
    .brand{height:var(--topbar-h);padding:0 16px;display:flex;align-items:center;gap:8px;background:rgba(0,40,142,.25)}
    .brand-logo{width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,.1);display:grid;place-items:center;font-size:19px;color:#DDE1FF}
    .brand b{display:block;font:700 16px/20px var(--f-head)}
    .brand small{display:block;font:600 10px/10px var(--f-mono);letter-spacing:.5px;text-transform:uppercase;color:#B8C4FF}
    .nav-title{padding:12px 20px 4px;font-size:11px;letter-spacing:.55px;text-transform:uppercase;color:rgba(184,196,255,.8)}
    .nav{padding:0 12px;display:flex;flex-direction:column;gap:2px;overflow-y:auto}
    .nav a{display:flex;align-items:center;gap:8px;padding:8px 12px;border-radius:8px;color:#B8C4FF;font-size:14px;transition:background .15s}
    .nav a.active{background:rgba(255,255,255,.15);color:#fff}
    .nav a:hover{background:rgba(255,255,255,.22)}
    .nav a .i{font-size:17px}
    .side-user{margin:0;padding:12px;background:rgba(0,40,142,.2)}
    .side-user-card{display:flex;align-items:center;gap:8px;padding:8px;border-radius:8px;background:rgba(255,255,255,.05)}
    .avatar{width:36px;height:36px;border-radius:8px;display:grid;place-items:center;flex:none;color:#fff;font:700 13px/1 var(--f-body);background:#3755C3}
    .side-user-card .meta{flex:1;min-width:0}
    .side-user-card b{display:block;font-size:13px;font-weight:600}
    .side-user-card span{display:flex;align-items:center;gap:4px;font-size:11px;color:#B8C4FF}
    .side-user-card span::before{content:"";width:6px;height:6px;border-radius:50%;background:#6FFBBE;display:inline-block}
    .side-user-card .out{padding:4px;border-radius:4px;color:#B8C4FF;appearance:none;border:0;cursor:pointer;background:transparent;display:grid;place-items:center}
    .logout-form{display:flex;align-items:center;justify-content:center;margin:0}

    .main-col{min-width:0;display:flex;flex-direction:column}
    .topbar{position:sticky;top:0;z-index:40;height:var(--topbar-h);padding:0 24px;display:flex;align-items:center;gap:16px;background:rgba(250,248,255,.85);backdrop-filter:blur(12px);box-shadow:0 1px 8px rgba(0,0,0,.04)}
    .crumb{display:flex;gap:4px;font-size:13px;color:var(--muted);white-space:nowrap}
    .crumb b{color:var(--text);font-weight:600}
    .searchbox{position:relative;flex:1;max-width:576px;min-width:0}
    .searchbox .i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--muted);font-size:14px;pointer-events:none}
    .searchbox input{width:100%;padding:8px 12px 8px 36px;border:0;border-radius:8px;background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.03);font:400 13px var(--f-body);color:var(--text);outline-offset:2px}
    .top-actions{margin-left:auto;display:flex;align-items:center;gap:12px}
    .chip{display:inline-flex;align-items:center;gap:4px;padding:4px 12px;border-radius:8px;background:var(--surface-3);font:600 12px/16px var(--f-body);color:var(--muted);white-space:nowrap}
    .icon-btn{position:relative;padding:6px;border-radius:8px;font-size:18px;color:var(--muted);background:none;border:0}
    .icon-btn .dot{position:absolute;top:4px;right:4px;width:8px;height:8px;border-radius:50%;background:var(--danger)}
    .me{width:32px;height:32px;border-radius:12px;background:var(--primary);color:#fff;display:grid;place-items:center;font-size:14px}

    .content{width:100%;max-width:1440px;margin-inline:auto;padding:20px 24px 32px;display:flex;flex-direction:column;gap:20px}
    .page-head{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-end;gap:16px}
    .eyebrow{display:flex;align-items:center;gap:6px;font:600 12px/16px var(--f-mono);letter-spacing:.6px;text-transform:uppercase;color:var(--muted)}
    .eyebrow::before{content:"";width:8px;height:8px;border-radius:50%;background:var(--primary);display:inline-block}
    .page-head h1{font:700 clamp(20px,2.4vw,24px)/1.35 var(--f-head);margin-top:2px}
    .page-head p{max-width:720px;margin-top:2px;color:var(--muted)}
    .head-actions{display:flex;flex-wrap:wrap;gap:8px}
    .btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:8px 14px;border-radius:8px;box-shadow:var(--shadow);font:600 13px/16px var(--f-body);white-space:nowrap}
    .btn-soft{background:var(--surface-4);color:var(--text)}
    .btn-primary{background:var(--primary);color:#fff}

    .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:12px}
    .stat{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:16px;background:#fff;border-radius:8px;box-shadow:var(--shadow)}
    .stat .label{font:500 13px/18px var(--f-body);color:var(--muted)}
    .stat .num{display:flex;align-items:baseline;gap:4px;margin:2px 0}
    .stat strong{font:700 28px/34px var(--f-head)}
    .stat .num span{font-size:13px;color:var(--muted)}
    .stat .hint{display:flex;align-items:center;gap:4px;font:600 12px/16px var(--f-body);letter-spacing:.12px}
    .stat .ico{width:48px;height:48px;flex:none;border-radius:8px;display:grid;place-items:center;font-size:22px}
    .t-green{color:var(--green)}
    .t-orange{color:var(--orange)}

    .layout{display:grid;grid-template-columns:minmax(0,1fr) 320px;gap:20px;align-items:start}
    .col{display:flex;flex-direction:column;gap:12px;min-width:0}
    .card{background:#fff;border-radius:8px;box-shadow:var(--shadow)}

    .toolbar{display:flex;flex-wrap:wrap;gap:8px;padding:12px}
    .toolbar .searchbox{flex:1 1 220px;max-width:none}
    .toolbar .searchbox input{background:var(--surface-2);box-shadow:none}
    .select{position:relative;flex:0 1 auto}
    .select select{appearance:none;-webkit-appearance:none;max-width:100%;padding:8px 32px 8px 12px;border:0;border-radius:8px;background:var(--surface-2);font:500 13px var(--f-body);color:var(--text);cursor:pointer}
    .select .i{position:absolute;right:10px;top:50%;transform:translateY(-50%);font-size:12px;color:var(--subtle);pointer-events:none}

    .panels{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px}
    .mini-card{padding:16px;display:flex;flex-direction:column;gap:8px}
    .mini-card .top{display:flex;justify-content:space-between;align-items:center;gap:12px}
    .mini-card .label{font:500 13px/18px var(--f-body);color:var(--muted)}
    .mini-card .big{font:700 28px/34px var(--f-head)}
    .mini-card .small{font-size:13px;color:var(--muted)}
    .mini-card .dotline{height:8px;border-radius:12px;background:var(--surface-3);overflow:hidden}
    .mini-card .dotline > i{display:block;height:100%;background:#00288E;border-radius:12px}

    .panel{padding:20px;display:flex;flex-direction:column;gap:12px}
    .note{display:flex;gap:8px;padding:12px;border-radius:8px;background:var(--surface-2);font-size:13px;line-height:1.4}
    .note .i{color:var(--primary);font-size:17px;margin-top:1px}
    .panel-head{display:flex;align-items:center;gap:8px}
    .panel-head .ico{width:36px;height:36px;border-radius:8px;background:#DDE1FF;color:var(--primary);display:grid;place-items:center}
    .panel-head b{display:block;font:700 14px/20px var(--f-head)}
    .panel-head small{font:500 11px/16px var(--f-mono);color:var(--muted)}
    .quota-row{display:flex;justify-content:space-between;gap:8px;font-size:13px;color:var(--muted)}
    .quota-row b{font:600 13px var(--f-mono);color:var(--text)}
    .bar{height:8px;border-radius:12px;background:var(--surface-3);overflow:hidden;margin:4px 0}
    .bar i{display:block;height:100%;background:var(--primary);border-radius:12px}
    .criteria ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:6px}
    .criteria li{display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted)}
    .criteria li .i{color:var(--green);font-size:14px}

    .table-card{overflow:hidden}
    .table-wrap{overflow-x:auto}
    table{width:100%;border-collapse:collapse}
    thead th{padding:12px;background:var(--surface-2);text-align:left;font:700 11px/14px var(--f-body);letter-spacing:.55px;text-transform:uppercase;color:var(--muted);white-space:nowrap}
    tbody td{padding:10px 12px;vertical-align:middle}
    tbody tr:nth-child(even){background:rgba(242,243,255,.35)}
    .badge{display:inline-flex;align-items:center;gap:4px;padding:2px 8px;border-radius:8px;font:500 12px/16px var(--f-body);letter-spacing:.12px;background:var(--surface-3);color:var(--text)}
    .badge.ok{background:rgba(111,251,190,.30);color:var(--green);font-weight:600}
    .badge.wait{background:rgba(255,219,202,.7);color:var(--orange);font-weight:600}
    .empty{padding:32px;text-align:center;color:var(--muted)}

    @media (max-width:1024px){
      .app{grid-template-columns:minmax(0,1fr)}
      .sidebar{display:none}
      .content{padding:16px 12px 24px}
      .layout{grid-template-columns:minmax(0,1fr)}
    }
    @media (max-width:640px){
      .topbar{padding:0 12px;gap:8px}
      .crumb{display:none}
      .chip{display:none}
      .head-actions{width:100%}
      .head-actions .btn{flex:1 1 auto}
    }
  </style>
</head>
<body>
  <svg width="0" height="0" style="position:absolute" aria-hidden="true">
    <symbol id="i-menu" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></symbol>
    <symbol id="i-box" viewBox="0 0 24 24"><path d="M21 8 12 3 3 8v8l9 5 9-5Z"/><path d="m3 8 9 5 9-5M12 13v8"/></symbol>
    <symbol id="i-dash" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></symbol>
    <symbol id="i-users" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></symbol>
    <symbol id="i-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14a9 3 0 0 0 18 0V5"/><path d="M3 12a9 3 0 0 0 18 0"/></symbol>
    <symbol id="i-log" viewBox="0 0 24 24"><path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></symbol>
    <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></symbol>
    <symbol id="i-bell" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.94 1.94 0 0 0 3.4 0"/></symbol>
    <symbol id="i-user" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></symbol>
    <symbol id="i-out" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/></symbol>
    <symbol id="i-cap" viewBox="0 0 24 24"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></symbol>
    <symbol id="i-userplus" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6M22 11h-6"/></symbol>
    <symbol id="i-download" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></symbol>
    <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></symbol>
    <symbol id="i-building" viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M12 6h.01M16 6h.01M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></symbol>
    <symbol id="i-down" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></symbol>
    <symbol id="i-trash" viewBox="0 0 24 24"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M10 11v6M14 11v6"/></symbol>
    <symbol id="i-pencil" viewBox="0 0 24 24"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></symbol>
    <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M7 7h10v10M7 17 17 7"/></symbol>
  </svg>

  <div class="app">
    <aside class="sidebar" aria-label="Navigasi utama">
      <div>
        <div class="brand">
          <div class="brand-logo"><svg class="i"><use href="#i-box"/></svg></div>
          <div><b>INVENTA</b><small>Admin Aplikasi</small></div>
        </div>
        <div class="nav-title">Menu Utama</div>
        <nav class="nav">
          <a href="{{ route('dashboard_admin_apk') }}" class="active"><svg class="i"><use href="#i-dash"/></svg>Dashboard</a>
          <a href="{{ route('manajemen_admin') }}"><svg class="i"><use href="#i-users"/></svg>Manajemen Admin UKM</a>
          <a href="{{ route('master_data') }}"><svg class="i"><use href="#i-db"/></svg>Master Data</a>
          <a href="{{ route('log_sistem') }}"><svg class="i"><use href="#i-log"/></svg>Log Sistem</a>
        </nav>
      </div>
      <div class="side-user">
        <div class="side-user-card">
          <div class="avatar">SA</div>
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

    <div class="main-col">
      <header class="topbar">
        <button class="icon-btn" aria-label="Buka menu" style="display:none"><svg class="i"><use href="#i-menu"/></svg></button>
        <div class="crumb"><b>INVENTA</b><span>/</span><span>Admin Portal</span></div>
        <div class="searchbox">
          <svg class="i"><use href="#i-search"/></svg>
          <input type="search" placeholder="Cari UKM, inventaris, log aktivitas..." aria-label="Pencarian global">
        </div>
        <div class="top-actions">
          <span class="chip"><svg class="i"><use href="#i-cap"/></svg>2026/2027 Gasal</span>
          <button class="icon-btn" aria-label="Notifikasi"><svg class="i"><use href="#i-bell"/></svg><span class="dot"></span></button>
          <div class="me" aria-label="Akun"><svg class="i"><use href="#i-user"/></svg></div>
        </div>
      </header>

      <main class="content">
        <section class="page-head">
          <div>
            <div class="eyebrow">Konsolidasi Sistem Terpadu</div>
            <h1>Dashboard — Semua UKM</h1>
            <p>Monitoring agregat peredaran inventaris, status approval, dan kesehatan operasional UKM se-universitas secara real-time.</p>
          </div>
          <div class="head-actions">
            <a href="#" class="btn btn-soft"><svg class="i"><use href="#i-download"/></svg>Unduh Laporan</a>
            <a href="#" class="btn btn-primary"><svg class="i"><use href="#i-userplus"/></svg>Tambah Data Baru</a>
          </div>
        </section>

        <section class="stats" aria-label="Ringkasan dashboard">
          <div class="stat">
            <div>
              <div class="label">Total UKM Terdaftar</div>
              <div class="num"><strong>28</strong><span>Lembaga</span></div>
              <div class="hint t-green"><svg class="i"><use href="#i-building"/></svg>+2 UKM semester ini</div>
            </div>
            <div class="ico" style="background:var(--surface-3);color:var(--primary)"><svg class="i"><use href="#i-building"/></svg></div>
          </div>

          <div class="stat">
            <div>
              <div class="label">Total Aset Terdaftar</div>
              <div class="num"><strong>1,420</strong><span>Unit</span></div>
              <div class="hint t-green"><svg class="i"><use href="#i-shield"/></svg>88% status ready</div>
            </div>
            <div class="ico" style="background:var(--surface-3);color:var(--primary)"><svg class="i"><use href="#i-box"/></svg></div>
          </div>

          <div class="stat">
            <div>
              <div class="label">Akun Admin Aktif</div>
              <div class="num"><strong>34</strong><span>Personel</span></div>
              <div class="hint t-green"><svg class="i"><use href="#i-users"/></svg>29 terverifikasi</div>
            </div>
            <div class="ico" style="background:rgba(111,251,190,.30);color:var(--green)"><svg class="i"><use href="#i-users"/></svg></div>
          </div>

          <div class="stat">
            <div>
              <div class="label">Menunggu Verifikasi</div>
              <div class="num"><strong>5</strong><span class="t-orange" style="font-weight:600">Perlu Tinjauan</span></div>
              <div class="hint t-orange"><svg class="i"><use href="#i-clock"/></svg>Menunggu persetujuan</div>
            </div>
            <div class="ico" style="background:rgba(255,219,202,.7);color:var(--orange)"><svg class="i"><use href="#i-clock"/></svg></div>
          </div>
        </section>

        <section class="layout">
          <div class="col">
            <div class="card table-card">
              <div class="table-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>Ringkasan Kategori</th>
                      <th>Unit Aktif</th>
                      <th>Persentase</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Peralatan Laboratorium</td>
                      <td>420</td>
                      <td>72%</td>
                      <td><span class="badge ok">Normal</span></td>
                    </tr>
                    <tr>
                      <td>Perlengkapan Audio Visual</td>
                      <td>310</td>
                      <td>64%</td>
                      <td><span class="badge ok">Normal</span></td>
                    </tr>
                    <tr>
                      <td>Olahraga & Lapangan</td>
                      <td>180</td>
                      <td>48%</td>
                      <td><span class="badge wait">Review</span></td>
                    </tr>
                    <tr>
                      <td>Dokumentasi & Media</td>
                      <td>210</td>
                      <td>58%</td>
                      <td><span class="badge ok">Normal</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="panels">
              <div class="card mini-card">
                <div class="top">
                  <span class="label">Approval Proses</span>
                  <span class="badge ok">86%</span>
                </div>
                <div class="big">1,240</div>
                <div class="small">Permintaan divalidasi</div>
                <div class="dotline"><i style="width:86%"></i></div>
              </div>
              <div class="card mini-card">
                <div class="top">
                  <span class="label">Inventaris Butuh Perawatan</span>
                  <span class="badge wait">12</span>
                </div>
                <div class="big">12</div>
                <div class="small">Unit masuk jadwal servis</div>
                <div class="dotline"><i style="width:32%"></i></div>
              </div>
            </div>
          </div>

          <aside class="col">
            <div class="card panel">
              <div class="panel-head">
                <div class="ico"><svg class="i"><use href="#i-shield"/></svg></div>
                <div><b>Prioritas Operasional</b><small>Update real-time</small></div>
              </div>
              <div class="note">
                <svg class="i"><use href="#i-shield"/></svg>
                <p>Tiga UKM memerlukan koordinasi pengajuan aset baru sebelum minggu depan.</p>
              </div>
              <div>
                <div class="quota-row"><span>Kuota Slot Terisi Kampus</span><b>34 / 48</b></div>
                <div class="bar"><i style="width:71%"></i></div>
              </div>
              <div class="criteria">
                <ul>
                  <li><svg class="i"><use href="#i-check"/></svg>Dokumen pengurus lengkap</li>
                  <li><svg class="i"><use href="#i-check"/></svg>Verifikasi admin selesai</li>
                  <li><svg class="i"><use href="#i-check"/></svg>Peminjaman konsolidasi aktif</li>
                </ul>
              </div>
            </div>
          </aside>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
