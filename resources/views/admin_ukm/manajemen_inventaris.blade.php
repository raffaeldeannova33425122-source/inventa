{{-- resources/views/admin/inventaris/index.blade.php (contoh path) --}}
@php
    /* ------------------------------------------------------------------
     | Ikon (stroke, 24x24). Pakai: {!! $ic('search') !!}
     ------------------------------------------------------------------ */
    $paths = [
        'search'   => '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>',
        'plus'     => '<path d="M12 5v14M5 12h14"/>',
        'upload'   => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m17 8-5-5-5 5"/><path d="M12 3v12"/>',
        'download' => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/>',
        'qr'       => '<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><path d="M14 14h3v3M21 14v.01M14 21h3M21 17v4h-3"/>',
        'chev-d'   => '<path d="m6 9 6 6 6-6"/>',
        'chev-l'   => '<path d="m15 18-6-6 6-6"/>',
        'chev-r'   => '<path d="m9 18 6-6-6-6"/>',
        'sliders'  => '<path d="M4 21v-7M4 10V3M12 21v-9M12 8V3M20 21v-5M20 12V3M1 14h6M9 8h6M17 16h6"/>',
        'shield'   => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>',
        'shield-ok'=> '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'rack'     => '<rect x="4" y="2" width="16" height="20" rx="1.5"/><path d="M4 9h16M4 15h16"/>',
        'refresh'  => '<path d="M3 12a9 9 0 0 1 15-6.7L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-15 6.7L3 16"/><path d="M3 21v-5h5"/>',
        'history'  => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/>',
        'edit'     => '<path d="M17 3a2.85 2.85 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/>',
        'trash'    => '<path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>',
        'bell'     => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>',
        'user'     => '<circle cx="12" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/>',
        'camera'   => '<path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/>',
        'menu'     => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'x'        => '<path d="M18 6 6 18M6 6l12 12"/>',
        'check-c'  => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'clipboard'=> '<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 12h6M9 16h6"/>',
        'box'      => '<path d="M21 8v13H3V8"/><path d="M1 3h22v5H1z"/><path d="M10 12h4"/>',
        'borrow'   => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M12 16V8M8.5 11.5 12 8l3.5 3.5"/>',
        'wrench'   => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94z"/>',
        'badge'    => '<path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.78 4.78 4 4 0 0 1-6.74 0 4 4 0 0 1-4.78-4.78 4 4 0 0 1 0-6.74z"/><path d="m9 12 2 2 4-4"/>',
        'layers'   => '<path d="m12 2 10 5-10 5L2 7z"/><path d="m2 17 10 5 10-5"/><path d="m2 12 10 5 10-5"/>',
        'arrow-r'  => '<path d="M5 12h14M12 5l7 7-7 7"/>',
        'cap'      => '<path d="m22 10-10-5L2 10l10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
        'logout'   => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/>',
        'doc-check'=> '<path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
        'settings' => '<path d="M4 21v-7M4 10V3M12 21v-9M12 8V3M20 21v-5M20 12V3M1 14h6M9 8h6M17 16h6"/>',
    ];
    $ic = fn (string $n, int $s = 16) =>
        '<svg class="ic" width="'.$s.'" height="'.$s.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
        .'stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($paths[$n] ?? '').'</svg>';

    /* ------------------------------------------------------------------
     | DATA (ganti dengan data dari controller, mis. $alat, $kategori, dst.)
     ------------------------------------------------------------------ */
    $kategori = $kategori ?? [
        ['label' => 'Semua',                       'jumlah' => 48, 'aktif' => true],
        ['label' => 'Kamera DSLR & Mirrorless',    'jumlah' => 18],
        ['label' => 'Lensa & Optik',               'jumlah' => 14],
        ['label' => 'Lighting & Strobe',           'jumlah' => 9],
        ['label' => 'Tripod & Stabilizer',         'jumlah' => 7],
    ];

    $alat = $alat ?? [
        ['kode' => 'DKM-CAM-001', 'nama' => 'Kamera DSLR Canon EOS 80D',   'deskripsi' => 'Body + EF-S 18-135mm IS USM Kit', 'kategori' => 'Fotografi', 'status' => 'ready',       'catatan' => null,            'lokasi' => 'Lemari A - Rak 1',  'lokasi_ket' => 'Drybox Optik',    'foto' => 'dkm-cam-001.jpg'],
        ['kode' => 'DKM-CAM-002', 'nama' => 'Sony Alpha A7 Mark III',      'deskripsi' => 'Body Only Full Frame 24.2 MP',    'kategori' => 'Fotografi', 'status' => 'dipinjam',    'catatan' => 'Rina Amelia',   'lokasi' => 'Lemari A - Rak 1',  'lokasi_ket' => 'Drybox Optik',    'foto' => 'dkm-cam-002.jpg'],
        ['kode' => 'DKM-TRP-001', 'nama' => 'Tripod Manfrotto 055 Aluminium', 'deskripsi' => '3-Section Heavy Duty Support',  'kategori' => 'Fotografi', 'status' => 'ready',       'catatan' => null,            'lokasi' => 'Lemari B - Rak 3',  'lokasi_ket' => 'Aksesoris Berat', 'foto' => 'dkm-trp-001.jpg'],
        ['kode' => 'DKM-LNS-001', 'nama' => 'Lensa Canon EF 50mm f/1.8 STM', 'deskripsi' => 'Prime Portrait Aperture Lens',  'kategori' => 'Fotografi', 'status' => 'ready',       'catatan' => null,            'lokasi' => 'Lemari A - Rak 2',  'lokasi_ket' => 'Drybox Optik',    'foto' => 'dkm-lns-001.jpg'],
        ['kode' => 'DKM-LGT-001', 'nama' => 'Godox SL-60W LED Video Light',   'deskripsi' => '+ Softbox Bowens Mount 60x90cm','kategori' => 'Fotografi', 'status' => 'maintenance', 'catatan' => 'Ganti fuse lampu', 'lokasi' => 'Meja Servis Lab', 'lokasi_ket' => null,               'foto' => 'dkm-lgt-001.jpg'],
        ['kode' => 'DKM-AUD-001', 'nama' => 'Rode Wireless GO II Dual',       'deskripsi' => 'Dual Channel Wireless Lav Kit', 'kategori' => 'Fotografi', 'status' => 'ready',       'catatan' => null,            'lokasi' => 'Lemari C - Rak 1',  'lokasi_ket' => 'Audio',           'foto' => 'dkm-aud-001.jpg'],
    ];

    $statusMap = [
        'ready'       => ['label' => 'Ready',       'class' => 'is-ready'],
        'dipinjam'    => ['label' => 'Dipinjam',    'class' => 'is-borrowed'],
        'maintenance' => ['label' => 'Maintenance', 'class' => 'is-maint'],
    ];

    $stok = $stok ?? [
        ['label' => 'Fotografi', 'terisi' => 22, 'total' => 24, 'warna' => '#00288E'],
        ['label' => 'Elektronik', 'terisi' => 16, 'total' => 20, 'warna' => '#3755C3'],
        ['label' => 'Musik',      'terisi' => 10, 'total' => 15, 'warna' => '#003D27'],
    ];

    $integritas = $integritas ?? 94;
    $ringC = 2 * M_PI * 26; // keliling lingkaran r=26
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Inventaris Alat · INVENTA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600;700&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">

    <style>
        /* ============================ TOKENS ============================ */
        :root{
            --primary:#00288E; --primary-2:#1E40AF; --primary-3:#3755C3;
            --bg:#FAF8FF; --surface:#fff; --surface-2:#F2F3FF; --surface-3:#E2E7FF;
            --ink:#131B2E; --ink-2:#444653; --line:#DAE2FD;
            --ok:#003D27; --ok-bg:rgba(0,86,58,.15);
            --warn:#9D4300; --warn-bg:#FFDBCA; --warn-ink:#783200;
            --info:#1E40AF;
            --radius:8px; --radius-sm:4px;
            --shadow:0 1px 2px rgba(0,0,0,.05);
            --sb-w:256px; --header-h:64px; --gap:clamp(10px,1.6vw,16px);
            --pad:clamp(12px,2.4vw,24px);
            --f-body:'Inter',system-ui,sans-serif;
            --f-head:'Plus Jakarta Sans','Inter',system-ui,sans-serif;
            --f-mono:'JetBrains Mono',ui-monospace,monospace;
        }
        *,*::before,*::after{box-sizing:border-box}
        html{-webkit-text-size-adjust:100%}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:var(--f-body);font-size:14px;line-height:1.45}
        button{font:inherit;color:inherit;cursor:pointer;border:0;background:none;padding:0}
        a{color:inherit;text-decoration:none}
        .ic{flex:none;display:block}
        .mono{font-family:var(--f-mono)}
        .sr-only{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}

        /* ============================ SHELL ============================ */
        .app{display:grid;grid-template-columns:var(--sb-w) minmax(0,1fr);min-height:100vh;min-height:100dvh}
        .content{min-width:0;display:flex;flex-direction:column}

        /* ---------- Sidebar ---------- */
        .sidebar{
            position:sticky;top:0;height:100vh;height:100dvh;background:var(--primary-2);color:#DDE1FF;
            display:flex;flex-direction:column;justify-content:space-between;
            box-shadow:0 1px 8px rgba(0,0,0,.08);z-index:60;overflow-y:auto
        }
        .sb-brand{height:var(--header-h);padding:0 16px;display:flex;align-items:center;gap:10px;background:rgba(0,40,142,.25);flex:none}
        .sb-logo{width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,.1);display:grid;place-items:center;flex:none}
        .sb-brand b{display:block;color:#fff;font:700 16px/20px var(--f-head)}
        .sb-brand small{display:block;color:#B8C4FF;font:500 10px/12px var(--f-mono);letter-spacing:.5px;text-transform:uppercase}
        .sb-close{margin-left:auto;display:none;color:#fff;padding:6px}
        .sb-section{padding:12px 12px 6px;color:rgba(184,196,255,.8);font:600 11px/14px var(--f-body);letter-spacing:.55px;text-transform:uppercase}
        .sb-nav{padding:0 12px;display:flex;flex-direction:column;gap:4px}
        .sb-link{display:flex;align-items:center;justify-content:space-between;gap:8px;padding:8px 12px;border-radius:4px;color:#DDE1FF;font:400 14px/20px Inter,system-ui,sans-serif;text-decoration:none;white-space:nowrap;transition:background .15s;min-width:0}
        .sb-link:hover{background:rgba(255,255,255,.1)}
        .sb-link .l{display:flex;align-items:center;gap:12px;min-width:0}
        .sb-link .l svg{display:block;flex:none}
        .sb-link .tx{white-space:normal;line-height:20px}
        .sb-link.is-active{background:rgba(255,255,255,.2);color:#fff;font-weight:600}
        .sb-badge{padding:2px 6px;border-radius:2px;font:600 12px/16px Inter,system-ui,sans-serif;color:#fff;background:#FD761A;flex:none}
        .sb-badge.soft{background:rgba(255,255,255,.2);color:#DDE1FF;font-family:var(--f-mono)}
        .sb-sep{height:1px;background:rgba(255,255,255,.12);margin:6px 12px}
        .sb-user{margin:12px;padding:8px;border-radius:8px;background:rgba(255,255,255,.07);display:flex;align-items:center;gap:8px}
        .sb-user .av{width:36px;height:36px;border-radius:8px;background:var(--primary-3);color:#fff;display:grid;place-items:center;font:700 13px var(--f-head);flex:none}
        .sb-user .nm{flex:1;min-width:0}
        .sb-user .nm b{display:block;color:#fff;font-size:13px;line-height:16px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
        .sb-user .nm small{display:flex;align-items:center;gap:4px;color:#B8C4FF;font-size:11px}
        .sb-user .nm small::before{content:"";width:6px;height:6px;border-radius:50%;background:#6FFBBE}
        .sb-user button{color:#B8C4FF;padding:4px;border-radius:4px}
        .sb-user button:hover{background:rgba(255,255,255,.12)}
        .scrim{display:none}

        /* ---------- Header ---------- */
        .topbar{
            position:sticky;top:0;z-index:40;height:var(--header-h);padding:0 var(--pad);
            display:flex;align-items:center;gap:12px;
            background:rgba(255,255,255,.95);backdrop-filter:blur(12px);box-shadow:0 1px 8px rgba(0,0,0,.04)
        }
        .burger{display:none;padding:8px;margin-left:-8px;border-radius:6px;color:var(--ink)}
        .burger:hover{background:var(--surface-2)}
        .ukm-switch{display:flex;align-items:center;gap:8px;padding:6px 12px;border-radius:var(--radius-sm);background:var(--surface-2);font:600 13px/16px var(--f-body);min-width:0;max-width:260px}
        .ukm-switch .ic:first-child{color:var(--primary)}
        .ukm-switch span{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;min-width:0}
        .top-search{flex:1 1 220px;max-width:420px;margin-left:auto;display:flex;align-items:center;gap:8px;padding:7px 12px;border-radius:var(--radius-sm);background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.06);color:var(--ink-2)}
        .top-search input{flex:1;min-width:0;border:0;outline:0;background:none;font:400 13px var(--f-body);color:var(--ink)}
        .top-right{display:flex;align-items:center;gap:12px;flex:none}
        .periode{display:flex;align-items:center;gap:6px;padding:6px 12px;border-radius:var(--radius);background:#EAEDFF;color:var(--ink-2);font:600 12px/16px var(--f-body);white-space:nowrap}
        .icon-btn{position:relative;width:36px;height:36px;border-radius:var(--radius-sm);background:var(--surface-2);display:grid;place-items:center;color:var(--ink-2)}
        .icon-btn i{position:absolute;top:7px;right:8px;width:8px;height:8px;border-radius:50%;background:var(--warn)}
        .me{display:flex;align-items:center;gap:8px;padding-left:4px}
        .me .who{text-align:right;line-height:1.25}
        .me .who b{display:block;font-size:13px;font-weight:600;white-space:nowrap}
        .me .who small{display:block;color:var(--ink-2);font-size:12px;font-weight:500}
        .me .av{width:32px;height:32px;border-radius:12px;background:var(--primary);color:#fff;display:grid;place-items:center;flex:none}

        /* ---------- Main ---------- */
        .main{padding:var(--pad);display:flex;flex-direction:column;gap:var(--gap);min-width:0}

        .page-head{display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:12px 16px}
        .page-head .txt{flex:1 1 320px;min-width:0}
        .crumb{display:flex;flex-wrap:wrap;gap:4px;font:500 12px/16px var(--f-mono);color:var(--ink-2)}
        .crumb b{color:var(--primary);font-weight:600}
        .crumb .cur{color:var(--ink)}
        .page-head h1{margin:2px 0 4px;font:700 clamp(20px,2.4vw,24px)/1.3 var(--f-head);color:var(--ink)}
        .page-head p{margin:0;color:var(--ink-2);font-size:14px;max-width:62ch}
        .actions{display:flex;flex-wrap:wrap;gap:8px;flex:0 1 auto}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:8px 12px;min-height:34px;border-radius:var(--radius-sm);background:#fff;box-shadow:var(--shadow);font:500 13px/16px var(--f-body);color:var(--ink);white-space:nowrap;transition:filter .15s, background .15s}
        .btn:hover{background:var(--surface-2)}
        .btn .ic{color:var(--ink-2)} .btn.qr .ic{color:var(--primary)}
        .btn.primary{background:var(--primary);color:#fff;font-weight:600;box-shadow:0 2px 4px -2px rgba(0,0,0,.1),0 4px 6px -1px rgba(0,0,0,.1)}
        .btn.primary:hover{filter:brightness(1.12)} .btn.primary .ic{color:#fff}

        /* ---------- KPI ---------- */
        .kpis{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:var(--gap)}
        .kpi{position:relative;overflow:hidden;background:#fff;border-radius:var(--radius);box-shadow:var(--shadow);padding:clamp(12px,1.6vw,20px);display:flex;flex-direction:column;justify-content:space-between;gap:12px;min-width:0}
        .kpi::after{content:"";position:absolute;right:-24px;top:-16px;width:96px;height:96px;border-radius:12px;background:var(--tint);pointer-events:none}
        .kpi-top{display:flex;align-items:center;justify-content:space-between;gap:8px;position:relative;z-index:1}
        .kpi-top .lbl{color:var(--ink-2);font:500 13px/18px var(--f-body)}
        .kpi-ico{width:36px;height:36px;border-radius:var(--radius-sm);display:grid;place-items:center;flex:none;background:var(--ico-bg);color:var(--ico)}
        .kpi-val{display:flex;align-items:baseline;gap:6px;flex-wrap:wrap}
        .kpi-val b{font:700 clamp(22px,2.6vw,28px)/1.2 var(--f-head);color:var(--num)}
        .kpi-val span{color:var(--ink-2);font:500 13px var(--f-body)}
        .kpi-foot{display:flex;align-items:center;justify-content:space-between;gap:8px;flex-wrap:wrap;margin-top:2px;font:500 12px/16px var(--f-mono);color:var(--ink-2)}
        .kpi-foot .dot{display:inline-block;width:6px;height:6px;border-radius:50%;background:var(--num);margin-right:6px;vertical-align:middle}
        .kpi-foot.pct{font-family:var(--f-body);letter-spacing:.12px}
        .kpi-foot.pct b{color:var(--ok);font-weight:600;margin-right:4px}
        .kpi-foot.pct em{font:500 12px var(--f-mono);color:var(--ok);font-style:normal}
        .kpi.k1{--tint:rgba(0,40,142,.05);--ico-bg:#E2E7FF;--ico:#00288E;--num:#131B2E}
        .kpi.k2{--tint:rgba(0,86,58,.10);--ico-bg:rgba(0,86,58,.15);--ico:#003D27;--num:#003D27}
        .kpi.k3{--tint:rgba(30,64,175,.10);--ico-bg:#E2E7FF;--ico:#1E40AF;--num:#1E40AF}
        .kpi.k4{--tint:rgba(157,67,0,.10);--ico-bg:#FFDBCA;--ico:#783200;--num:#9D4300}
        .kpi.k4 .kpi-foot{color:var(--warn)}

        /* ---------- Panel: filter + tabel ---------- */
        .panel{background:#fff;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;min-width:0}
        .filters{padding:12px;display:flex;flex-direction:column;gap:12px}
        .filter-row{display:flex;flex-wrap:wrap;gap:8px}
        .search{flex:1 1 240px;max-width:576px;position:relative;min-width:0}
        .search .ic{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--ink-2);pointer-events:none}
        .search input{width:100%;height:40px;padding:0 12px 0 38px;border:0;outline:0;border-radius:var(--radius-sm);background:var(--surface-2);box-shadow:inset 0 2px 4px rgba(0,0,0,.05);font:400 13px var(--f-body);color:var(--ink)}
        .search input:focus{box-shadow:inset 0 2px 4px rgba(0,0,0,.05),0 0 0 2px rgba(0,40,142,.25)}
        .selects{display:flex;flex-wrap:wrap;gap:6px;margin-left:auto}
        .select{display:inline-flex;align-items:center;gap:6px;height:40px;padding:0 12px;border-radius:var(--radius-sm);background:var(--surface-2);font:500 13px var(--f-body);color:var(--ink);white-space:nowrap}
        .select .ic{color:var(--ink-2)}
        .select:hover,.square:hover{background:var(--surface-3)}
        .square{width:40px;height:40px;display:grid;place-items:center;border-radius:var(--radius-sm);background:var(--surface-2);color:var(--ink-2)}
        .pills{display:flex;gap:6px;overflow-x:auto;padding:2px 0 4px;scrollbar-width:thin;-webkit-overflow-scrolling:touch}
        .pill{flex:none;padding:6px 12px;border-radius:12px;background:var(--surface-2);color:var(--ink-2);font:500 12px/16px var(--f-body);letter-spacing:.12px;white-space:nowrap;transition:background .15s}
        .pill:hover{background:var(--surface-3)}
        .pill.is-active{background:var(--primary);color:#fff;font-weight:600;box-shadow:var(--shadow)}

        /* ---------- Tabel (grid, tanpa scroll horizontal) ---------- */
        .tbl{--cols:36px 124px minmax(0,2.6fr) 104px 138px minmax(0,1.5fr) 112px;font-size:13px}
        .tr{display:grid;grid-template-columns:var(--cols);align-items:center;column-gap:12px;padding:10px 12px}
        .tr.th{background:var(--surface-2);padding-top:12px;padding-bottom:12px;color:var(--ink-2);font:700 11px/14px var(--f-body);letter-spacing:.55px;text-transform:uppercase}
        .tr.th .c-act{text-align:right}
        .tr.row{border-top:1px solid var(--surface-2);transition:background .12s}
        .tr.row:hover{background:rgba(242,243,255,.55)}
        .tr.row[hidden]{display:none}
        .c-chk input{width:16px;height:16px;accent-color:var(--primary);margin:0;cursor:pointer}
        .c-kode{display:flex;align-items:center;gap:6px;min-width:0}
        .qr-tag{width:20px;height:28px;border-radius:2px;background:var(--surface-3);color:var(--primary);display:grid;place-items:center;flex:none}
        .kode{font:600 12px/16px var(--f-mono);color:var(--ink);overflow-wrap:anywhere}
        .c-prod{display:flex;align-items:center;gap:12px;min-width:0}
        .thumb{width:48px;height:48px;border-radius:var(--radius-sm);background:var(--surface-3);box-shadow:0 1px 2px rgba(0,0,0,.05);overflow:hidden;flex:none;display:grid;place-items:center;color:var(--primary)}
        .thumb img{width:100%;height:100%;object-fit:cover;display:block}
        .nm{min-width:0}
        .nm b{display:block;font:600 15px/22px var(--f-head);color:var(--ink);overflow-wrap:anywhere}
        .nm span{display:block;color:var(--ink-2);font-size:13px;line-height:18px}
        .nm .chip{display:none;margin-top:4px}
        .chip{display:inline-block;padding:2px 8px;border-radius:12px;background:var(--surface-3);color:var(--primary);font:500 12px/16px var(--f-body);letter-spacing:.12px;white-space:nowrap}
        .badge{display:inline-flex;align-items:center;gap:6px;padding:4px 10px;border-radius:12px;font:600 12px/16px var(--f-body);letter-spacing:.12px;white-space:nowrap}
        .badge::before{content:"";width:8px;height:8px;border-radius:50%;background:currentColor}
        .badge.is-ready{background:var(--ok-bg);color:var(--ok)}
        .badge.is-borrowed{background:var(--surface-3);color:var(--info)}
        .badge.is-maint{background:var(--warn-bg);color:var(--warn-ink)}
        .st-note{display:block;margin-top:3px;padding-left:2px;font:500 11px/16px var(--f-mono);color:var(--ink-2)}
        .st-note.warn{color:var(--warn)}
        .c-loc{display:flex;align-items:flex-start;gap:6px;min-width:0;color:var(--ink);line-height:18px}
        .c-loc .ic{margin-top:3px;color:var(--ink-2)}
        .c-loc small{display:block;color:var(--ink-2);font:500 12px/16px var(--f-mono)}
        .c-loc.warn,.c-loc.warn .ic{color:var(--warn)}
        .c-act{display:flex;justify-content:flex-end;gap:2px}
        .act{width:32px;height:32px;border-radius:2px;display:grid;place-items:center;color:var(--ink-2)}
        .act:hover{background:var(--surface-3);color:var(--primary)}
        .act.del:hover{background:#FFDAD6;color:#BA1A1A}
        .empty{padding:32px 12px;text-align:center;color:var(--ink-2);display:none}

        .pager{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px 16px;padding:12px;background:rgba(242,243,255,.4);border-top:1px solid var(--surface-2)}
        .pager .info{font:500 12px/16px var(--f-body);letter-spacing:.12px;color:var(--ink-2)}
        .pager .info b{color:var(--ink);font-weight:500}
        .pages{display:flex;align-items:center;gap:4px;margin-left:auto}
        .pg{min-width:32px;height:32px;padding:0 6px;display:grid;place-items:center;border-radius:2px;background:#fff;font:500 12px var(--f-body);color:var(--ink)}
        .pg:hover{background:var(--surface-3)}
        .pg.is-active{background:var(--primary);color:#fff;font-weight:600;box-shadow:var(--shadow)}
        .pg.is-off{color:#C4C5D5;pointer-events:none}
        .pages .dots{padding:0 4px;font:500 12px var(--f-mono);color:var(--ink-2)}

        /* ---------- Widget bawah ---------- */
        .widgets{display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,290px),1fr));gap:var(--gap);align-items:stretch}
        .card{background:#fff;border-radius:var(--radius);box-shadow:var(--shadow);padding:clamp(14px,1.8vw,20px);display:flex;flex-direction:column;gap:16px;min-width:0}
        .card-head{display:flex;align-items:center;justify-content:space-between;gap:12px}
        .card-head h3{margin:0;font:600 16px/24px var(--f-head)}
        .card-head p{margin:0;color:var(--ink-2);font-size:13px;line-height:18px}
        .card-head .ic{color:var(--primary)}
        .bars{display:flex;flex-direction:column;gap:14px}
        .bar-top{display:flex;align-items:baseline;justify-content:space-between;gap:8px;margin-bottom:4px}
        .bar-top b{font:500 13px/18px var(--f-body)}
        .bar-top span{font:600 12px/16px var(--f-mono);white-space:nowrap}
        .bar{height:8px;border-radius:12px;background:var(--surface-3);overflow:hidden}
        .bar i{display:block;height:100%;border-radius:12px;background:var(--c);width:var(--w)}
        .batch{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px}
        .batch button{text-align:left;padding:10px;border-radius:var(--radius-sm);background:var(--surface-2);display:flex;flex-direction:column;gap:4px;transition:background .15s}
        .batch button:hover{background:var(--surface-3)}
        .batch b{font:600 13px/16px var(--f-body)}
        .batch span{color:var(--ink-2);font-size:12.5px;line-height:17px}
        .sync{display:flex;align-items:center;gap:6px;margin-top:auto;color:var(--ink-2);font:500 12px/16px var(--f-body);letter-spacing:.12px}
        .sync .ic{color:var(--ok)}
        .card.tint{background:rgba(226,231,255,.6)}
        .card.tint .badge-ico{width:32px;height:32px;border-radius:12px;background:var(--primary);color:#fff;display:grid;place-items:center}
        .ring-box{display:flex;align-items:center;gap:12px;padding:12px;background:#fff;border-radius:var(--radius)}
        .ring{position:relative;width:64px;height:64px;flex:none}
        .ring svg{transform:rotate(-90deg);display:block}
        .ring span{position:absolute;inset:0;display:grid;place-items:center;font:700 12px var(--f-mono)}
        .ring-box b{display:block;font:600 13px/16px var(--f-body)}
        .ring-box p{margin:2px 0 0;color:var(--ink-2);font-size:13px;line-height:18px}
        .tint-foot{display:flex;align-items:center;justify-content:space-between;gap:8px;flex-wrap:wrap;margin-top:auto}
        .tint-foot a{display:inline-flex;align-items:center;gap:4px;color:var(--primary);font:600 12px/16px var(--f-body);letter-spacing:.12px}
        .tint-foot a:hover{text-decoration:underline}
        .tint-foot span{font:500 12px var(--f-mono);color:var(--ink-2)}

        /* ============================ RESPONSIVE ============================ */

        /* Laptop kecil / tablet landscape */
        @media (max-width:1180px){
            :root{--sb-w:216px}
            .periode{display:none}
            .tbl{--cols:34px 112px minmax(0,2.4fr) 100px minmax(0,1.5fr) 104px}
            .tr .c-kat{display:none}
            .nm .chip{display:inline-block}
            .kpi-foot .hide-md{display:none}
        }

        /* Tablet: sidebar jadi drawer */
        @media (max-width:900px){
            .app{grid-template-columns:minmax(0,1fr)}
            .sidebar{position:fixed;inset:0 auto 0 0;width:min(284px,86vw);transform:translateX(-102%);transition:transform .25s ease;box-shadow:none}
            body.nav-open .sidebar{transform:none;box-shadow:6px 0 24px rgba(0,0,0,.25)}
            .scrim{display:block;position:fixed;inset:0;z-index:55;background:rgba(19,27,46,.45);opacity:0;pointer-events:none;transition:opacity .2s}
            body.nav-open .scrim{opacity:1;pointer-events:auto}
            body.nav-open{overflow:hidden}
            .burger,.sb-close{display:inline-flex}
            .kpis{grid-template-columns:repeat(2,minmax(0,1fr))}
            .me .who{display:none}
        }

        /* Mobile besar */
        @media (max-width:700px){
            .ukm-switch{max-width:46vw}
            .top-search{flex:0 0 auto;max-width:none;margin-left:auto;padding:0;width:36px;height:36px;justify-content:center;background:var(--surface-2);box-shadow:none}
            .top-search input{display:none}
            .actions{width:100%}
            .actions .btn{flex:1 1 auto}
            .actions .btn.primary{flex:1 1 100%;order:-1}
            .selects{margin-left:0;width:100%}
            .selects .select{flex:1 1 auto;justify-content:center}
            .selects .square{flex:none}
            .search{max-width:none;flex-basis:100%}
        }

        /* Mobile: baris tabel jadi kartu */
        @media (max-width:640px){
            .tr.th{display:none}
            .tr.row{
                grid-template-columns:28px minmax(0,auto) minmax(0,1fr) auto;
                grid-template-areas:"chk prod prod act" "chk kode status status" "chk loc loc loc";
                row-gap:8px;column-gap:8px;padding:12px
            }
            .tr.row .c-chk{grid-area:chk;align-self:start;padding-top:14px}
            .tr.row .c-prod{grid-area:prod}
            .tr.row .c-act{grid-area:act;align-self:start}
            .tr.row .c-kode{grid-area:kode}
            .tr.row .c-status{grid-area:status;display:flex;align-items:center;gap:8px;flex-wrap:wrap;justify-self:end}
            .tr.row .c-loc{grid-area:loc;padding-top:2px}
            .st-note{margin-top:0}
            .c-act .act.hist{display:none}
            .thumb{width:44px;height:44px}
            .nm b{font-size:14px;line-height:20px}
            .pager{justify-content:center}
            .pages{margin:0}
            .pages .pg.mid,.pages .dots{display:none}
        }

        /* KPI satu kolom di layar sangat kecil */
        @media (max-width:380px){
            .kpis{grid-template-columns:minmax(0,1fr)}
            .batch{grid-template-columns:minmax(0,1fr)}
            .ukm-switch{max-width:40vw}
        }

        @media (prefers-reduced-motion:reduce){*{transition:none !important}}
    </style>
</head>
<body>
<div class="app">

    {{-- ========================== SIDEBAR ========================== --}}
    <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
        <div>
            <div class="sb-brand">
                <div class="sb-logo"><svg class="ic" style="width:19px;height:19px" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M2.75 18.3333C2.24583 18.3333 1.81424 18.1538 1.45521 17.7948C1.09618 17.4358 0.916667 17.0042 0.916667 16.5V6.16458C0.641667 5.99653 0.420139 5.77882 0.252083 5.51146C0.0840278 5.2441 0 4.93472 0 4.58333V1.83333C0 1.32917 0.179514 0.897569 0.538542 0.538542C0.897569 0.179514 1.32917 0 1.83333 0H16.5C17.0042 0 17.4358 0.179514 17.7948 0.538542C18.1538 0.897569 18.3333 1.32917 18.3333 1.83333V4.58333C18.3333 4.93472 18.2493 5.2441 18.0812 5.51146C17.9132 5.77882 17.6917 5.99653 17.4167 6.16458V16.5C17.4167 17.0042 17.2372 17.4358 16.8781 17.7948C16.5191 18.1538 16.0875 18.3333 15.5833 18.3333H2.75V18.3333M2.75 6.41667V16.5V16.5V16.5H15.5833V16.5V16.5V6.41667H2.75V6.41667M1.83333 4.58333H16.5V4.58333V4.58333V1.83333V1.83333V1.83333H1.83333V1.83333V1.83333V4.58333V4.58333V4.58333V4.58333M6.41667 11H11.9167V9.16667H6.41667V11V11M9.16667 11.4583V11.4583V11.4583V11.4583V11.4583V11.4583V11.4583V11.4583V11.4583V11.4583" fill="#DDE1FF"/></svg></div>
                <div>
                    <b>INVENTA</b>
                    <small>Admin UKM</small>
                </div>
                <button class="sb-close" type="button" data-nav-close aria-label="Tutup menu">{!! $ic('x', 20) !!}</button>
            </div>

            <div class="sb-section">Manajemen Operasional</div>
            <nav class="sb-nav">
                <a href="{{ route('approval_page') }}" class="sb-link">
                    <span class="l">
                        <svg class="ic" style="width:17px;height:17px" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M8.33333 16.6667C7.18056 16.6667 6.09722 16.4479 5.08333 16.0104C4.06944 15.5729 3.1875 14.9792 2.4375 14.2292C1.6875 13.4792 1.09375 12.5972 0.65625 11.5833C0.21875 10.5694 0 9.48611 0 8.33333C0 7.18056 0.21875 6.09722 0.65625 5.08333C1.09375 4.06944 1.6875 3.1875 2.4375 2.4375C3.1875 1.6875 4.06944 1.09375 5.08333 0.65625C6.09722 0.21875 7.18056 0 8.33333 0C9.23611 0 10.0903 0.131944 10.8958 0.395833C11.7014 0.659722 12.4444 1.02778 13.125 1.5L11.9167 2.72917C11.3889 2.39583 10.8264 2.13542 10.2292 1.94792C9.63194 1.76042 9 1.66667 8.33333 1.66667C6.48611 1.66667 4.91319 2.31597 3.61458 3.61458C2.31597 4.91319 1.66667 6.48611 1.66667 8.33333C1.66667 10.1806 2.31597 11.7535 3.61458 13.0521C4.91319 14.3507 6.48611 15 8.33333 15C10.1806 15 11.7535 14.3507 13.0521 13.0521C14.3507 11.7535 15 10.1806 15 8.33333C15 8.08333 14.9861 7.83333 14.9583 7.58333C14.9306 7.33333 14.8889 7.09028 14.8333 6.85417L16.1875 5.5C16.3403 5.94444 16.4583 6.40278 16.5417 6.875C16.625 7.34722 16.6667 7.83333 16.6667 8.33333C16.6667 9.48611 16.4479 10.5694 16.0104 11.5833C15.5729 12.5972 14.9792 13.4792 14.2292 14.2292C13.4792 14.9792 12.5972 15.5729 11.5833 16.0104C10.5694 16.4479 9.48611 16.6667 8.33333 16.6667V16.6667M7.16667 12.1667L3.625 8.625L4.79167 7.45833L7.16667 9.83333L15.5 1.47917L16.6667 2.64583L7.16667 12.1667V12.1667" fill="#DDE1FF"/>
                        </svg>
                        <span class="tx">Antrian Approval</span>
                    </span>
                    <span class="sb-badge">3 Pending</span>
                </a>
                <a href="{{ route('peminjaman_aktif') }}" class="sb-link">
                    <span class="l">
                        <svg class="ic" style="width:15px;height:17px" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M1.66667 16.6667C1.20833 16.6667 0.815972 16.5035 0.489583 16.1771C0.163194 15.8507 0 15.4583 0 15V3.33333C0 2.875 0.163194 2.48264 0.489583 2.15625C0.815972 1.82986 1.20833 1.66667 1.66667 1.66667H5.16667C5.34722 1.16667 5.64931 0.763889 6.07292 0.458333C6.49653 0.152778 6.97222 0 7.5 0C8.02778 0 8.50347 0.152778 8.92708 0.458333C9.35069 0.763889 9.65278 1.16667 9.83333 1.66667H13.3333C13.7917 1.66667 14.184 1.82986 14.5104 2.15625C14.8368 2.48264 15 2.875 15 3.33333V15C15 15.4583 14.8368 15.8507 14.5104 16.1771C14.184 16.5035 13.7917 16.6667 13.3333 16.6667H1.66667V16.6667M1.66667 15H13.3333V15V15V3.33333V3.33333V3.33333H1.66667V3.33333V3.33333V15V15V15V15M3.33333 13.3333H9.16667V11.6667H3.33333V13.3333V13.3333M3.33333 10H11.6667V8.33333H3.33333V10V10M3.33333 6.66667H11.6667V5H3.33333V6.66667V6.66667M7.5 2.70833C7.68056 2.70833 7.82986 2.64931 7.94792 2.53125C8.06597 2.41319 8.125 2.26389 8.125 2.08333C8.125 1.90278 8.06597 1.75347 7.94792 1.63542C7.82986 1.51736 7.68056 1.45833 7.5 1.45833C7.31944 1.45833 7.17014 1.51736 7.05208 1.63542C6.93403 1.75347 6.875 1.90278 6.875 2.08333C6.875 2.26389 6.93403 2.41319 7.05208 2.53125C7.17014 2.64931 7.31944 2.70833 7.5 2.70833V2.70833M1.66667 15V15V15V3.33333V3.33333V3.33333V3.33333V3.33333V3.33333V15V15V15V15V15" fill="#DDE1FF"/>
                        </svg>
                        <span class="tx">Peminjaman Aktif</span>
                    </span>
                </a>
                <a href="{{ route('manajemen_inventaris') }}" class="sb-link is-active" aria-current="page">
                    <span class="l">
                        <svg class="ic" style="width:17px;height:14px" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6.66667 5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5V5M1.66667 13.3333C1.20833 13.3333 0.815972 13.1701 0.489583 12.8438C0.163194 12.5174 0 12.125 0 11.6667V1.66667C0 1.20833 0.163194 0.815972 0.489583 0.489583C0.815972 0.163194 1.20833 0 1.66667 0H15C15.4583 0 15.8507 0.163194 16.1771 0.489583C16.5035 0.815972 16.6667 1.20833 16.6667 1.66667H1.66667V1.66667V1.66667V11.6667V11.6667V11.6667H3.33333V13.3333H1.66667V13.3333M15 11.6667V5V5V5H11.6667V5V5V11.6667V11.6667V11.6667H15V11.6667V11.6667V11.6667M11.25 13.3333C10.9028 13.3333 10.6076 13.2118 10.3646 12.9688C10.1215 12.7257 10 12.4306 10 12.0833V4.58333C10 4.23611 10.1215 3.94097 10.3646 3.69792C10.6076 3.45486 10.9028 3.33333 11.25 3.33333H15.4167C15.7639 3.33333 16.059 3.45486 16.3021 3.69792C16.5451 3.94097 16.6667 4.23611 16.6667 4.58333V12.0833C16.6667 12.4306 16.5451 12.7257 16.3021 12.9688C16.059 13.2118 15.7639 13.3333 15.4167 13.3333H11.25V13.3333M13.3333 7.08333C13.5139 7.08333 13.6632 7.02083 13.7812 6.89583C13.8993 6.77083 13.9583 6.625 13.9583 6.45833C13.9583 6.27778 13.8993 6.12847 13.7812 6.01042C13.6632 5.89236 13.5139 5.83333 13.3333 5.83333C13.1667 5.83333 13.0208 5.89236 12.8958 6.01042C12.7708 6.12847 12.7083 6.27778 12.7083 6.45833C12.7083 6.625 12.7708 6.77083 12.8958 6.89583C13.0208 7.02083 13.1667 7.08333 13.3333 7.08333V7.08333M5.41667 13.3333L5 11.875C4.73611 11.6389 4.53125 11.3611 4.38542 11.0417C4.23958 10.7222 4.16667 10.375 4.16667 10C4.16667 9.625 4.23958 9.27778 4.38542 8.95833C4.53125 8.63889 4.73611 8.36111 5 8.125L5.41667 6.66667H7.91667L8.33333 8.125C8.59722 8.36111 8.80208 8.63889 8.94792 8.95833C9.09375 9.27778 9.16667 9.625 9.16667 10C9.16667 10.375 9.09375 10.7222 8.94792 11.0417C8.80208 11.3611 8.59722 11.6389 8.33333 11.875L7.91667 13.3333H5.41667V13.3333M6.66667 11.25C7.02778 11.25 7.32639 11.1285 7.5625 10.8854C7.79861 10.6424 7.91667 10.3472 7.91667 10C7.91667 9.65278 7.79167 9.35764 7.54167 9.11458C7.29167 8.87153 7 8.75 6.66667 8.75C6.33333 8.75 6.04167 8.86806 5.79167 9.10417C5.54167 9.34028 5.41667 9.63889 5.41667 10C5.41667 10.3611 5.53472 10.6597 5.77083 10.8958C6.00694 11.1319 6.30556 11.25 6.66667 11.25V11.25M13.3333 8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333" fill="white"/></svg>
                        <span class="tx">Manajemen Inventaris</span>
                    </span>
                    <span class="sb-badge soft">48 Item</span>
                </a>
            </nav>

            <div class="sb-sep"></div>
            <div class="sb-section" style="padding-top:6px">Organisasi</div>
            <nav class="sb-nav">
                <a href="{{ route('profil_ukm') }}" class="sb-link">
                    <span class="l">
                        <svg class="ic" style="width:15px;height:15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6.66667 15V10H8.33333V11.6667H15V13.3333H8.33333V15H6.66667V15M0 13.3333V11.6667H5V13.3333H0V13.3333M3.33333 10V8.33333H0V6.66667H3.33333V5H5V10H3.33333V10M6.66667 8.33333V6.66667H15V8.33333H6.66667V8.33333M10 5V0H11.6667V1.66667H15V3.33333H11.6667V5H10V5M0 3.33333V1.66667H8.33333V3.33333H0V3.33333" fill="#DDE1FF"/></svg>
                        <span class="tx">Profil UKM &amp; Pengaturan</span>
                    </span>
                </a>
            </nav>
        </div>

        <div class="sb-user">
            <div class="av">SA</div>
            <div class="nm"><b>Admin UKM</b><small>Aktif</small></div>
            <button type="button" aria-label="Keluar" onclick="window.location.href='{{ url('/') }}'"><svg class="ic" style="width:14px;height:14px" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1.5 13.5C1.0875 13.5 0.734375 13.3531 0.440625 13.0594C0.146875 12.7656 0 12.4125 0 12V1.5C0 1.0875 0.146875 0.734375 0.440625 0.440625C0.734375 0.146875 1.0875 0 1.5 0H6.75V1.5H1.5V1.5V1.5V12V12V12H6.75V13.5H1.5V13.5M9.75 10.5L8.71875 9.4125L10.6313 7.5H4.5V6H10.6313L8.71875 4.0875L9.75 3L13.5 6.75L9.75 10.5V10.5" fill="#B8C4FF"/></svg></button>
        </div>
    </aside>
    <div class="scrim" data-nav-close></div>

    {{-- ========================== KONTEN ========================== --}}
    <div class="content">

        {{-- Header --}}
        <header class="topbar">
            <button class="burger" type="button" data-nav-open aria-label="Buka menu" aria-controls="sidebar">{!! $ic('menu', 22) !!}</button>

            <button class="ukm-switch" type="button">
                {!! $ic('camera', 16) !!}
                <span>UKM Fotografi &amp; Videografi</span>
                {!! $ic('chev-d', 12) !!}
            </button>

            <label class="top-search">
                {!! $ic('search', 16) !!}
                <input type="search" placeholder="Cari nomor permohonan, aset...">
            </label>

            <div class="top-right">
                <div class="periode">{!! $ic('cap', 15) !!} 2026/2027 Gasal</div>
                <button class="icon-btn" type="button" aria-label="Notifikasi">{!! $ic('bell', 17) !!}<i></i></button>
                <div class="me">
                    <div class="who"><b>Achmad Hanafi</b><small>Admin UKM</small></div>
                    <div class="av">{!! $ic('user', 15) !!}</div>
                </div>
            </div>
        </header>

        <main class="main">

            {{-- Page header --}}
            <section class="page-head">
                <div class="txt">
                    <div class="crumb"><b>UKM-FOTO</b><span>/</span><span>LOGISTIK &amp; PERLENGKAPAN</span><span>/</span><span class="cur">INVENTARIS FISIK</span></div>
                    <h1>Manajemen Inventaris Alat</h1>
                    <p>Katalog master alat, pelacakan unit fisik, nomor seri, status ketersediaan, dan jadwal perawatan inventaris UKM Fotografi.</p>
                </div>
                <div class="actions">
                    <button class="btn" type="button">{!! $ic('upload', 15) !!} Impor CSV/Excel</button>
                    <button class="btn qr" type="button">{!! $ic('qr', 15) !!} Cetak Barcode / Label QR</button>
                    <button class="btn primary" type="button">{!! $ic('plus', 14) !!} Tambah Alat Baru</button>
                </div>
            </section>

            {{-- KPI --}}
            <section class="kpis" aria-label="Ringkasan inventaris">
                <article class="kpi k1">
                    <div class="kpi-top"><span class="lbl">Total Aset Alat</span><span class="kpi-ico">{!! $ic('box', 17) !!}</span></div>
                    <div>
                        <div class="kpi-val"><b>48</b><span>Unit Fisik</span></div>
                        <div class="kpi-foot"><span><i class="dot"></i>12 Tipe Peralatan Terdaftar</span></div>
                    </div>
                </article>
                <article class="kpi k2">
                    <div class="kpi-top"><span class="lbl">Siap Digunakan</span><span class="kpi-ico">{!! $ic('check-c', 17) !!}</span></div>
                    <div>
                        <div class="kpi-val"><b>31</b><span>Unit</span></div>
                        <div class="kpi-foot pct"><span><b>64.5%</b>Tingkat Ketersediaan</span><em>Optimal</em></div>
                    </div>
                </article>
                <article class="kpi k3">
                    <div class="kpi-top"><span class="lbl">Sedang Dipinjam</span><span class="kpi-ico">{!! $ic('borrow', 16) !!}</span></div>
                    <div>
                        <div class="kpi-val"><b>14</b><span>Unit Beredar</span></div>
                        <div class="kpi-foot"><span><i class="dot"></i>4 UKM &amp; 3 Kepanitiaan Aktif</span></div>
                    </div>
                </article>
                <article class="kpi k4">
                    <div class="kpi-top"><span class="lbl">Perbaikan / Kalibrasi</span><span class="kpi-ico">{!! $ic('wrench', 17) !!}</span></div>
                    <div>
                        <div class="kpi-val"><b>3</b><span>Unit</span></div>
                        <div class="kpi-foot"><span><i class="dot"></i>Sedang di bengkel servis resmi</span></div>
                    </div>
                </article>
            </section>

            {{-- Filter + tabel --}}
            <section class="panel">
                <div class="filters">
                    <div class="filter-row">
                        <label class="search">
                            {!! $ic('search', 15) !!}
                            <input id="q" type="search" placeholder="Cari nama alat, kode inventaris, nomor seri..." autocomplete="off">
                        </label>
                        <div class="selects">
                            <button class="select" type="button">{!! $ic('sliders', 14) !!} Status: Semua {!! $ic('chev-d', 11) !!}</button>
                            <button class="select" type="button">{!! $ic('shield', 14) !!} Kondisi: Semua {!! $ic('chev-d', 11) !!}</button>
                            <button class="select" type="button">{!! $ic('rack', 14) !!} Lokasi Rak {!! $ic('chev-d', 11) !!}</button>
                            <button class="square" type="button" aria-label="Reset filter" id="reset">{!! $ic('refresh', 15) !!}</button>
                        </div>
                    </div>

                    <div class="pills" role="tablist" aria-label="Kategori">
                        @foreach ($kategori as $k)
                            <button type="button" role="tab" class="pill {{ !empty($k['aktif']) ? 'is-active' : '' }}">
                                {{ $k['label'] }} ({{ $k['jumlah'] }})
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="tbl" role="table" aria-label="Daftar inventaris alat">
                    <div class="tr th" role="row">
                        <div class="c-chk"></div>
                        <div role="columnheader">Kode &amp; QR</div>
                        <div role="columnheader">Foto &amp; Nama Alat</div>
                        <div role="columnheader" class="c-kat">Kategori</div>
                        <div role="columnheader">Status Ketersediaan</div>
                        <div role="columnheader">Lokasi Rak</div>
                        <div role="columnheader" class="c-act">Aksi</div>
                    </div>

                    @foreach ($alat as $a)
                        @php $st = $statusMap[$a['status']] ?? $statusMap['ready']; @endphp
                        <div class="tr row" role="row" data-search="{{ strtolower($a['kode'].' '.$a['nama'].' '.$a['deskripsi'].' '.$a['lokasi']) }}">
                            <div class="c-chk"><input type="checkbox" aria-label="Pilih {{ $a['nama'] }}"></div>

                            <div class="c-kode">
                                <span class="qr-tag">{!! $ic('qr', 13) !!}</span>
                                <span class="kode">{{ $a['kode'] }}</span>
                            </div>

                            <div class="c-prod">
                                <div class="thumb">
                                    @if (!empty($a['foto']))
                                        <img src="{{ asset('images/inventaris/'.$a['foto']) }}" alt="{{ $a['nama'] }}" loading="lazy"
                                             onerror="this.remove()">
                                    @else
                                        {!! $ic('camera', 20) !!}
                                    @endif
                                </div>
                                <div class="nm">
                                    <b>{{ $a['nama'] }}</b>
                                    <span>{{ $a['deskripsi'] }}</span>
                                    <em class="chip" style="font-style:normal">{{ $a['kategori'] }}</em>
                                </div>
                            </div>

                            <div class="c-kat"><span class="chip">{{ $a['kategori'] }}</span></div>

                            <div class="c-status">
                                <span class="badge {{ $st['class'] }}">{{ $st['label'] }}</span>
                                @if (!empty($a['catatan']))
                                    <span class="st-note {{ $a['status'] === 'maintenance' ? 'warn' : '' }}">{{ $a['catatan'] }}</span>
                                @endif
                            </div>

                            <div class="c-loc {{ $a['status'] === 'maintenance' ? 'warn' : '' }}">
                                {!! $ic($a['status'] === 'maintenance' ? 'wrench' : 'rack', 13) !!}
                                <div>
                                    {{ $a['lokasi'] }}
                                    @if (!empty($a['lokasi_ket']))<small>({{ $a['lokasi_ket'] }})</small>@endif
                                </div>
                            </div>

                            <div class="c-act">
                                <button class="act hist" type="button" aria-label="Riwayat" title="Riwayat">{!! $ic('history', 15) !!}</button>
                                <button class="act" type="button" aria-label="Ubah" title="Ubah">{!! $ic('edit', 15) !!}</button>
                                <button class="act del" type="button" aria-label="Hapus" title="Hapus">{!! $ic('trash', 15) !!}</button>
                            </div>
                        </div>
                    @endforeach

                    <div class="empty" id="empty">Tidak ada alat yang cocok dengan pencarian.</div>
                </div>

                <div class="pager">
                    <div class="info">Menampilkan <b>1 - {{ count($alat) }}</b> dari <b>48</b> alat</div>
                    <nav class="pages" aria-label="Halaman">
                        <a href="#" class="pg is-off" aria-label="Sebelumnya">{!! $ic('chev-l', 14) !!}</a>
                        <a href="#" class="pg is-active" aria-current="page">1</a>
                        <a href="#" class="pg mid">2</a>
                        <a href="#" class="pg mid">3</a>
                        <span class="dots">...</span>
                        <a href="#" class="pg mid">8</a>
                        <a href="#" class="pg" aria-label="Berikutnya">{!! $ic('chev-r', 14) !!}</a>
                    </nav>
                </div>
            </section>

            {{-- Widget bawah --}}
            <section class="widgets">
                <article class="card">
                    <div class="card-head">
                        <div><h3>Ringkasan Stok</h3><p>Kepadatan unit simpanan alat</p></div>
                        {!! $ic('rack', 18) !!}
                    </div>
                    <div class="bars">
                        @foreach ($stok as $s)
                            @php $p = round($s['terisi'] / max($s['total'], 1) * 100); @endphp
                            <div>
                                <div class="bar-top">
                                    <b>{{ $s['label'] }}</b>
                                    <span style="color:{{ $s['warna'] }}">{{ $s['terisi'] }} / {{ $s['total'] }} Unit ({{ $p }}%)</span>
                                </div>
                                <div class="bar" role="progressbar" aria-valuenow="{{ $p }}" aria-valuemin="0" aria-valuemax="100">
                                    <i style="--w:{{ $p }}%;--c:{{ $s['warna'] }}"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>

                <article class="card">
                    <div class="card-head">
                        <div><h3>Operasi Cepat Batch</h3><p>Tindakan massal inventaris aktif</p></div>
                        {!! $ic('layers', 18) !!}
                    </div>
                    <div class="batch">
                        <button type="button">{!! $ic('qr', 17) !!}<b>Audit Barcode Masal</b><span>Validasi stok fisik via scanner</span></button>
                        <button type="button"><span style="color:var(--warn)">{!! $ic('wrench', 17) !!}</span><b>Buat SPK Servis</b><span>Kirim ke teknisi resmi</span></button>
                        <button type="button"><span style="color:var(--ok)">{!! $ic('doc-check', 17) !!}</span><b>Log Opname Bulanan</b><span>Laporan berkala ke BEM</span></button>
                        <button type="button"><span style="color:var(--info)">{!! $ic('download', 17) !!}</span><b>Unduh Rekap PDF</b><span>Dokumen BAP inventaris</span></button>
                    </div>
                    <div class="sync">{!! $ic('shield-ok', 14) !!} Terakhir sinkronisasi database: Hari ini 09:30 WIB</div>
                </article>

                <article class="card tint">
                    <div class="card-head">
                        <div><h3>Status Integritas Alat</h3><p>Siklus kalibrasi &amp; masa pakai</p></div>
                        <span class="badge-ico">{!! $ic('badge', 17) !!}</span>
                    </div>
                    <div class="ring-box">
                        <div class="ring">
                            <svg width="64" height="64" viewBox="0 0 64 64">
                                <circle cx="32" cy="32" r="26" fill="none" stroke="#E2E7FF" stroke-width="6"/>
                                <circle cx="32" cy="32" r="26" fill="none" stroke="#00288E" stroke-width="6" stroke-linecap="round"
                                        stroke-dasharray="{{ round($ringC * $integritas / 100, 2) }} {{ round($ringC, 2) }}"/>
                            </svg>
                            <span>{{ $integritas }}%</span>
                        </div>
                        <div>
                            <b>Kelayakan Operasional</b>
                            <p>45 dari 48 unit dalam kondisi prima &amp; siap liputan event kampus.</p>
                        </div>
                    </div>
                    <div class="tint-foot">
                        <a href="#">Lihat Log Kerusakan &amp; Servis {!! $ic('arrow-r', 12) !!}</a>
                        <span>v2.4.0</span>
                    </div>
                </article>
            </section>

        </main>
    </div>
</div>

<script>
    (function () {
        var body = document.body;

        /* Drawer sidebar (tablet & mobile) */
        document.querySelectorAll('[data-nav-open]').forEach(function (b) {
            b.addEventListener('click', function () { body.classList.add('nav-open'); });
        });
        document.querySelectorAll('[data-nav-close]').forEach(function (b) {
            b.addEventListener('click', function () { body.classList.remove('nav-open'); });
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') body.classList.remove('nav-open'); });
        window.matchMedia('(min-width: 901px)').addEventListener('change', function (m) {
            if (m.matches) body.classList.remove('nav-open');
        });

        /* Pill kategori (visual) */
        var pills = document.querySelectorAll('.pill');
        pills.forEach(function (p) {
            p.addEventListener('click', function () {
                pills.forEach(function (x) { x.classList.remove('is-active'); });
                p.classList.add('is-active');
            });
        });

        /* Pencarian cepat di baris yang tampil */
        var q = document.getElementById('q'), rows = document.querySelectorAll('.tr.row'), empty = document.getElementById('empty');
        function filter() {
            var v = q.value.trim().toLowerCase(), n = 0;
            rows.forEach(function (r) {
                var ok = !v || r.dataset.search.indexOf(v) > -1;
                r.hidden = !ok; if (ok) n++;
            });
            empty.style.display = n ? 'none' : 'block';
        }
        q.addEventListener('input', filter);
        document.getElementById('reset').addEventListener('click', function () { q.value = ''; filter(); });
    })();
</script>
</body>
</html>