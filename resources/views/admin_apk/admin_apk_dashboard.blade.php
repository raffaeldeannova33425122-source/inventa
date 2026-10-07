<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Akun Admin UKM</title>
    <style>
        :root {
            --blue-900: #00288e;
            --blue-800: #0b2f9c;
            --blue-700: #1e40af;
            --blue-100: #eaedff;
            --blue-50: #f2f3ff;
            --navy: #131b2e;
            --muted: #444653;
            --muted-2: #757684;
            --border: #dfe3f5;
            --green: #00563a;
            --green-soft: rgba(111, 251, 190, 0.30);
            --green-strong: #4edea3;
            --orange: #9d4300;
            --orange-soft: #ffdbca;
            --gray-200: #c4c5d5;
            --bg: #f5f5fa;
            --white: #ffffff;
            --shadow: 0 1px 2px rgba(31, 41, 55, 0.08);
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100%;
            background: var(--bg);
            color: var(--navy);
            font-family: Inter, "Segoe UI", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            justify-content: center;
        }

        .page-shell {
            width: 100%;
            max-width: 1600px;
            min-height: 100vh;
            display: flex;
            background: #f4f3f8;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #0a2a9d 0%, #0d2a9a 100%);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 22px 16px 14px;
            position: relative;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 6px 18px;
            min-height: 74px;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: rgba(255,255,255,0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 0 2px rgba(0,0,0,0.10);
        }

        .brand-mark svg {
            width: 18px;
            height: 18px;
            display: block;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1;
        }

        .brand-text .title {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .brand-text .subtitle {
            margin-top: 4px;
            font-size: 10px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            opacity: 0.9;
        }

        .menu {
            margin-top: 12px;
            padding-top: 14px;
            color: rgba(255,255,255,0.92);
        }

        .menu-title {
            font-size: 12px;
            line-height: 1;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.8;
            margin: 0 0 14px 12px;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            height: 42px;
            padding: 0 12px 0 12px;
            border-radius: 6px;
            color: rgba(255,255,255,0.9);
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
        }

        .nav-item.active {
            background: rgba(255,255,255,0.18);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.08);
        }

        .nav-icon {
            width: 14px;
            height: 14px;
            border-radius: 3px;
            background: rgba(255,255,255,0.25);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.2);
        }

        .nav-item.active .nav-icon {
            background: rgba(255,255,255,0.45);
        }

        .nav-item span {
            display: inline-block;
            transform: translateY(-1px);
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.12);
            padding-top: 16px;
        }

        .user-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 12px 10px;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .user-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
        }

        .user-name {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .user-role {
            font-size: 10px;
            opacity: 0.75;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .user-toggle {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            background: rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .user-toggle svg {
            width: 14px;
            height: 14px;
            display: block;
        }

        .main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            padding: 0 0 0 0;
            background: #f8f7fb;
        }

        .topbar {
            background: rgba(255,255,255,0.9);
            border-bottom: 1px solid rgba(90, 95, 120, 0.1);
            padding: 18px 22px 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .crumb {
            font-size: 14px;
            letter-spacing: 0.01em;
            color: var(--navy);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .crumb .brand-word {
            font-weight: 900;
            letter-spacing: 0.02em;
            color: var(--navy);
        }

        .crumb .slash {
            color: var(--muted-2);
            font-weight: 700;
        }

        .crumb .portal {
            color: var(--muted);
            opacity: 0.8;
            font-weight: 600;
        }

        .search-box {
            flex: 1;
            max-width: 430px;
            height: 38px;
            background: #f0f1f7;
            border-radius: 10px;
            border: 1px solid rgba(117,118,132,0.12);
            display: flex;
            align-items: center;
            padding: 0 14px 0 12px;
            gap: 10px;
        }

        .search-box .search-ico {
            width: 16px;
            height: 16px;
            border: 2px solid #6e7181;
            border-radius: 50%;
            position: relative;
            flex-shrink: 0;
        }

        .search-box .search-ico::after {
            content: "";
            position: absolute;
            width: 8px;
            height: 2px;
            background: #6e7181;
            right: -5px;
            bottom: -1px;
            transform: rotate(45deg);
            border-radius: 2px;
        }

        .search-box input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font: inherit;
            font-size: 14px;
            color: var(--navy);
        }

        .search-box input::placeholder {
            color: var(--muted-2);
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .top-icon-btn {
            border: none;
            background: transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .top-icon-btn:hover {
            transform: translateY(-1px);
        }

        .bell-btn {
            width: 30px;
            height: 30px;
            color: var(--navy);
        }

        .bell-btn svg {
            width: 30px;
            height: 30px;
            display: block;
        }

        .profile-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 6px 10px 6px 8px;
            border-radius: 999px;
            background: rgba(12, 62, 181, 0.06);
            border: 1px solid rgba(12, 62, 181, 0.08);
            color: var(--navy);
        }

        .profile-btn .profile-avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d2b9d, #3f7af9);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 0 2px rgba(255,255,255,0.85);
        }

        .profile-btn .profile-avatar svg {
            width: 14px;
            height: 14px;
            display: block;
        }

        .profile-btn .caret {
            width: 8px;
            height: 8px;
            border-left: 2px solid var(--navy);
            border-bottom: 2px solid var(--navy);
            transform: rotate(-45deg) translateY(-1px);
            display: inline-block;
        }

        .content {
            padding: 28px 26px 26px 32px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .header-panel {
            background: rgba(255,255,255,0.7);
            border: 1px solid rgba(137, 145, 171, 0.14);
            border-radius: 12px;
            padding: 20px 24px 16px;
            box-shadow: var(--shadow);
        }

        .header-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 700;
            margin-bottom: 8px;
        }

        .eyebrow .bullet {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--blue-900);
        }

        .title-group {
            max-width: 760px;
        }

        h1 {
            margin: 0;
            font-size: clamp(2.2rem, 3vw, 4rem);
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: -0.04em;
            color: var(--navy);
        }

        .subhead {
            margin-top: 8px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            max-width: 650px;
        }

        .action-toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid transparent;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            line-height: 1;
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .btn-light {
            background: #e8ebff;
            color: var(--navy);
            border-color: rgba(15, 23, 42, 0.04);
        }

        .btn-primary {
            background: var(--blue-900);
            color: white;
            border-color: rgba(0,0,0,0.08);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .btn .mini-icon {
            width: 12px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            display: inline-block;
            opacity: 0.9;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 14px;
        }

        .stat-card {
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(137,145,171,0.12);
            border-radius: 12px;
            min-height: 120px;
            padding: 18px 16px 14px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            box-shadow: var(--shadow);
        }

        .stat-card .label {
            display: block;
            color: var(--muted);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .stat-card .value {
            display: flex;
            align-items: baseline;
            gap: 6px;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
        }

        .stat-card .value .number {
            font-size: 42px;
            letter-spacing: -0.06em;
        }

        .stat-card .value .unit {
            font-size: 13px;
            color: var(--muted);
            font-weight: 500;
            padding-top: 10px;
        }

        .stat-card .badge-line {
            margin-top: 8px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-weight: 700;
            font-size: 12px;
            color: var(--green);
        }

        .dot-green {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green-strong);
            display: inline-block;
        }

        .badge-gray {
            width: 10px;
            height: 10px;
            border-radius: 2px;
            background: var(--muted);
            opacity: 0.9;
            display: inline-block;
        }

        .stat-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            background: #e8ebff;
            display: flex;
            align-items: center;
            justify-content: center;
            align-self: center;
            margin-left: 10px;
            position: relative;
        }

        .icon-users::before,
        .icon-check::before,
        .icon-hourglass::before,
        .icon-off::before {
            content: "";
            position: absolute;
            display: block;
        }

        .icon-users::before {
            width: 26px;
            height: 18px;
            background: var(--blue-900);
            border-radius: 6px 6px 4px 4px;
            top: 17px;
            left: 12px;
            box-shadow:
                0 -10px 0 0 var(--blue-900),
                -8px 4px 0 0 var(--blue-900),
                8px 4px 0 0 var(--blue-900);
        }

        .icon-check::before {
            width: 20px;
            height: 20px;
            background: var(--green);
            clip-path: polygon(10% 56%, 0 68%, 42% 100%, 100% 18%, 88% 8%, 41% 72%);
            top: 15px;
            left: 16px;
        }

        .icon-hourglass::before {
            width: 18px;
            height: 22px;
            top: 15px;
            left: 17px;
            background: var(--orange);
            clip-path: polygon(0 0, 100% 0, 66% 46%, 100% 100%, 0 100%, 34% 54%);
            border-radius: 3px;
            box-shadow: inset 0 0 0 2px rgba(255,255,255,0.08);
        }

        .icon-off::before {
            width: 17px;
            height: 17px;
            border-radius: 4px;
            background: var(--muted-2);
            top: 18px;
            left: 18px;
        }

        .stat-card.green .stat-icon-box { background: rgba(111, 251, 190, 0.25); }
        .stat-card.orange .stat-icon-box { background: rgba(255, 219, 202, 0.9); }
        .stat-card.gray .stat-icon-box { background: rgba(154, 160, 179, 0.18); }

        .stat-card.green .badge-line { color: var(--green); }
        .stat-card.orange .badge-line { color: var(--orange); }
        .stat-card.gray .badge-line { color: var(--muted); }

        .main-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(240px, 0.56fr);
            gap: 18px;
            align-items: start;
            margin-top: 2px;
        }

        .table-panel {
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(137,145,171,0.12);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .filters {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 12px 8px;
            flex-wrap: wrap;
        }

        .search-field {
            flex: 1 1 250px;
            min-width: 200px;
        }

        .input-shell {
            position: relative;
            height: 38px;
            background: #f1f2fa;
            border-radius: 8px;
            border: 1px solid rgba(117,118,132,0.1);
        }

        .input-shell input {
            border: none;
            background: transparent;
            width: 100%;
            height: 100%;
            padding: 0 12px 0 38px;
            font: inherit;
            color: var(--navy);
            outline: none;
        }

        .input-shell .search-mini {
            position: absolute;
            left: 12px;
            top: 50%;
            width: 12px;
            height: 12px;
            border: 2px solid var(--muted-2);
            border-radius: 50%;
            transform: translateY(-50%);
        }

        .input-shell .search-mini::after {
            content: "";
            position: absolute;
            width: 6px;
            height: 2px;
            background: var(--muted-2);
            right: -5px;
            bottom: -1px;
            border-radius: 2px;
            transform: rotate(35deg);
        }

        .select-box {
            position: relative;
            min-width: 160px;
            height: 38px;
            background: #f1f2fa;
            border-radius: 8px;
            border: 1px solid rgba(117,118,132,0.1);
            display: flex;
            align-items: center;
            padding: 0 34px 0 12px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 500;
        }

        .select-box::after {
            content: "";
            position: absolute;
            right: 12px;
            width: 7px;
            height: 7px;
            border-right: 2px solid var(--muted-2);
            border-bottom: 2px solid var(--muted-2);
            transform: rotate(45deg) translateY(-2px);
        }

        .table-wrap {
            overflow: auto;
            border-top: 1px solid rgba(117,118,132,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 980px;
        }

        thead th {
            background: #eef0ff;
            color: var(--muted);
            font-size: 11px;
            letter-spacing: 0.11em;
            text-transform: uppercase;
            text-align: left;
            font-weight: 800;
            padding: 16px 12px;
            border-bottom: 1px solid rgba(117,118,132,0.08);
        }

        tbody td {
            padding: 12px 12px;
            border-bottom: 1px solid rgba(117,118,132,0.08);
            vertical-align: middle;
            font-size: 13px;
            color: var(--navy);
        }

        tbody tr:nth-child(even) td {
            background: rgba(242, 243, 255, 0.18);
        }

        .check-col {
            width: 36px;
        }

        .check-col .checkbox {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid #72758a;
            background: white;
            display: inline-block;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 180px;
        }

        .avatar-36 {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: white;
            letter-spacing: 0.02em;
        }

        .avatar-36.orange { background: #f1c4a3; color: #8a3d00; }
        .avatar-36.blue { background: #3a5bd8; }
        .avatar-36.gray { background: #d9dfe9; color: #47506a; }
        .avatar-36.green { background: #a3c7ff; color: #163c78; }

        .user-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .user-info strong {
            font-size: 14px;
            font-weight: 700;
        }

        .user-info small {
            font-size: 11px;
            color: var(--muted);
        }

        .unit-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #edf0ff;
            border-radius: 8px;
            padding: 5px 8px;
            border: 1px solid rgba(66,90,170,0.06);
            min-height: 30px;
            min-width: 96px;
            font-size: 12px;
            font-weight: 600;
            color: var(--navy);
        }

        .unit-badge .mini-square {
            width: 10px;
            height: 10px;
            border-radius: 2px;
            background: var(--blue-900);
        }

        .contact {
            font-size: 12px;
            line-height: 1.5;
            color: var(--navy);
            font-weight: 500;
        }

        .contact small {
            display: block;
            color: var(--muted-2);
            font-size: 11px;
            margin-top: 2px;
        }

        .date {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
            font-family: "JetBrains Mono", monospace;
            font-weight: 600;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px 5px 8px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pill.green {
            background: rgba(111, 251, 190, 0.22);
            color: var(--green);
        }

        .status-pill.orange {
            background: rgba(255, 219, 202, 0.7);
            color: var(--orange);
        }

        .status-pill.gray {
            background: rgba(117, 118, 132, 0.12);
            color: var(--muted);
        }

        .status-pill .small-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
            display: inline-block;
        }

        .toggle {
            position: relative;
            display: inline-flex;
            width: 44px;
            height: 24px;
            border-radius: 999px;
            background: #ced0dc;
            align-items: center;
            padding: 2px;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,0.05);
        }

        .toggle::before {
            content: "";
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 1px 3px rgba(15,23,42,0.12);
            transform: translateX(0);
            transition: 0.2s ease;
        }

        .toggle.on {
            background: var(--blue-900);
        }

        .toggle.on::before {
            transform: translateX(20px);
        }

        .table-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
        }

        .mini-btn {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            border: 1px solid transparent;
            background: rgba(17,24,39,0.04);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .mini-btn svg {
            width: 14px;
            height: 14px;
            display: block;
        }

        .mini-btn.edit {
            background: rgba(31, 94, 255, 0.12);
            border-color: rgba(31, 94, 255, 0.12);
            color: #1e5eff;
        }

        .mini-btn.delete {
            background: rgba(220, 38, 38, 0.1);
            border-color: rgba(220, 38, 38, 0.18);
            color: #dc2626;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px 18px;
            color: var(--muted);
            font-size: 13px;
        }

        .pagination .meta {
            color: var(--muted);
        }

        .pagination .pager {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .page-number {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: var(--navy);
            background: #eef0ff;
        }

        .page-number.active {
            background: var(--blue-900);
            color: white;
        }

        .side-panel {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .side-card {
            background: #edf1ff;
            border: 1px solid rgba(137,145,171,0.12);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 16px 16px 14px;
        }

        .side-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 10px;
        }

        .side-header .mini-square {
            width: 18px;
            height: 18px;
            background: var(--blue-900);
            border-radius: 5px;
            display: inline-block;
            opacity: 0.9;
        }

        .side-sub {
            color: var(--muted-2);
            font-size: 11px;
            letter-spacing: 0.02em;
            margin-bottom: 10px;
        }

        .policy-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
            color: var(--navy);
        }

        .policy-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.5;
            font-size: 13px;
        }

        .policy-item .small-square {
            width: 10px;
            height: 10px;
            border-radius: 3px;
            background: var(--blue-900);
            opacity: 0.55;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .progress-box {
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-size: 12px;
            color: var(--muted);
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: rgba(25, 86, 255, 0.12);
            border-radius: 999px;
            overflow: hidden;
            margin-top: 10px;
        }

        .progress-bar span {
            display: block;
            height: 100%;
            width: 70.8%;
            background: linear-gradient(90deg, #4ca5ff, #3a5bd8);
            border-radius: inherit;
        }

        .criteria-card {
            background: rgba(255,255,255,0.68);
            border: 1px solid rgba(137,145,171,0.12);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 16px 16px 12px;
        }

        .criteria-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 8px;
        }

        .criteria-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 12px;
            line-height: 1.5;
            color: var(--navy);
        }

        .criteria-item .small-square {
            width: 10px;
            height: 10px;
            border-radius: 3px;
            background: #1b8d55;
            margin-top: 4px;
            flex-shrink: 0;
        }

        .criteria-item:nth-child(2) .small-square { background: #3fbf8f; }
        .criteria-item:nth-child(3) .small-square { background: #7e7e88; }
        .criteria-item:nth-child(4) .small-square { background: #756bc5; }

        .criteria-item a {
            color: var(--blue-900);
            text-decoration: none;
        }

        .side-footer {
            background: rgba(255,255,255,0.68);
            border: 1px solid rgba(137,145,171,0.12);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 14px 16px 16px;
        }

        .activity-box {
            background: rgba(255,255,255,0.5);
            border-radius: 10px;
            padding: 10px 12px;
            margin-top: 10px;
            color: var(--navy);
            font-size: 12px;
            line-height: 1.6;
            border: 1px solid rgba(117,118,132,0.08);
        }

        .button-row {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .small-btn {
            width: 100%;
            height: 36px;
            border-radius: 8px;
            border: 1px solid transparent;
            background: var(--blue-900);
            color: white;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        @media (max-width: 1180px) {
            .main-grid {
                grid-template-columns: 1fr;
            }

            .side-panel {
                order: 2;
            }
        }

        @media (max-width: 900px) {
            .page-shell {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .stats-row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 570px) {
            .topbar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: none;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .header-row {
                flex-direction: column;
            }

            .action-toolbar {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-mark" aria-label="Inventa logo">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <rect x="3.5" y="4.5" width="17" height="15" rx="3" fill="#00288E"/>
                        <path d="M8 9.5H16" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M8 13.5H16" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M9 18.5H15" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <div class="title">Inventa</div>
                    <div class="subtitle">Admin Aplikasi</div>
                </div>
            </div>

            <div class="menu">
                <div class="menu-title">Menu Utama</div>
                <nav class="nav">
                    <a href="#" class="nav-item">
                        <span class="nav-icon" style="border-radius: 4px; background: rgba(255,255,255,0.14);"></span>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="nav-item active">
                        <span class="nav-icon" style="border-radius: 4px; background: rgba(255,255,255,0.18);"></span>
                        <span>Manajemen Admin UKM</span>
                    </a>
                    <a href="#" class="nav-item">
                        <span class="nav-icon" style="border-radius: 4px; background: rgba(255,255,255,0.14);"></span>
                        <span>Master Data</span>
                    </a>
                    <a href="#" class="nav-item">
                        <span class="nav-icon" style="border-radius: 4px; background: rgba(255,255,255,0.14);"></span>
                        <span>Log Sistem</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <div class="user-box">
                    <div class="user-meta">
                        <div class="user-avatar">SA</div>
                        <div>
                            <div class="user-name">Super Admin</div>
                            <div class="user-role">Admin Aplikasi</div>
                        </div>
                    </div>
                    <div class="user-toggle" aria-label="Logout">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M9 7V5.5C9 4.67 9.67 4 10.5 4H17.5C18.33 4 19 4.67 19 5.5V18.5C19 19.33 18.33 20 17.5 20H10.5C9.67 20 9 19.33 9 18.5V17" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 12H4" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M7 9L4 12L7 15" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="crumb">
                    <span class="brand-word">INVENTA</span>
                    <span class="slash">/</span>
                    <span class="portal">Admin Portal</span>
                </div>
                <div class="search-box">
                    <span class="search-ico"></span>
                    <input type="text" placeholder="Cari UKM, inventaris, log aktivitas..." />
                </div>
                <div class="top-actions">
                    <button class="top-icon-btn bell-btn" aria-label="Notifikasi" type="button">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12 3.5C8.6 3.5 6 6.1 6 9.5V12.2L4.5 15.2C4.2 15.8 4.6 16.5 5.3 16.5H18.7C19.4 16.5 19.8 15.8 19.5 15.2L18 12.2V9.5C18 6.1 15.4 3.5 12 3.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M10 18.2C10.5 19.1 11.1 19.5 12 19.5C12.9 19.5 13.5 19.1 14 18.2H10Z" fill="currentColor"/>
                        </svg>
                    </button>

                    <button class="profile-btn" type="button" aria-label="Profil pengguna">
                        <span class="profile-avatar">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="white"/>
                                <path d="M5.5 18.5C6.7 16.5 9 15.2 12 15.2C15 15.2 17.3 16.5 18.5 18.5" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <span class="caret" aria-hidden="true"></span>
                    </button>
                </div>
            </header>

            <section class="content">
                <div class="header-panel">
                    <div class="header-row">
                        <div class="title-group">
                            <div class="eyebrow"><span class="bullet"></span> Otoritas Pusat • Hak Akses</div>
                            <h1>Manajemen Akun Admin UKM</h1>
                            <div class="subhead">Kelola kredensial, hak akses delegasi, dan status verifikasi penanggung jawab inventaris tiap Unit Kegiatan Mahasiswa (UKM).</div>
                        </div>

                        <div class="action-toolbar">
                            <button class="btn btn-light">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M12 3V14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    <path d="M8 18L12 22L16 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 9.5V18C4 19.1 4.9 20 6 20H18C19.1 20 20 19.1 20 18V9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                                Ekspor Data
                            </button>
                            <button class="btn btn-light">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M4 7.5C4 6.1 5.1 5 6.5 5H17.5C18.9 5 20 6.1 20 7.5V16.5C20 17.9 18.9 19 17.5 19H6.5C5.1 19 4 17.9 4 16.5V7.5Z" stroke="currentColor" stroke-width="1.8"/>
                                    <path d="M8 9.5H16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    <path d="M8 12.5H13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    <path d="M8 15.5H11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                                Kirim Undangan Admin UKM
                            </button>
                            <button class="btn btn-primary">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M12 5V19" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                                    <path d="M5 12H19" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                                Tambah Admin UKM
                            </button>
                        </div>
                    </div>
                </div>

                <div class="stats-row">
                    <div class="stat-card">
                        <div>
                            <span class="label">Total Akun Admin</span>
                            <div class="value"><span class="number">34</span> <span class="unit">Personel</span></div>
                            <div class="badge-line"><span class="dot-green"></span> 34 Lembaga UKM Aktif</div>
                        </div>
                        <div class="stat-icon-box icon-users"></div>
                    </div>

                    <div class="stat-card green">
                        <div>
                            <span class="label">Terverifikasi</span>
                            <div class="value"><span class="number">29</span> <span class="unit" style="color: var(--green);">85.3%</span></div>
                            <div class="badge-line"><span class="dot-green"></span> Akses Penuh Logistik</div>
                        </div>
                        <div class="stat-icon-box icon-check"></div>
                    </div>

                    <div class="stat-card orange">
                        <div>
                            <span class="label">Menunggu Verifikasi</span>
                            <div class="value"><span class="number" style="color: var(--orange);">5</span> <span class="unit" style="color: var(--orange);">Perlu Tinjauan</span></div>
                            <div class="badge-line"><span class="dot-green" style="background: var(--orange);"></span> Menunggu SK Kemahasiswaan</div>
                        </div>
                        <div class="stat-icon-box icon-hourglass"></div>
                    </div>

                    <div class="stat-card gray">
                        <div>
                            <span class="label">Akun Dinonaktifkan</span>
                            <div class="value"><span class="number">0</span></div>
                            <div class="badge-line"><span class="badge-gray"></span> Tidak Ada Pelanggaran</div>
                        </div>
                        <div class="stat-icon-box icon-off"></div>
                    </div>
                </div>

                <div class="main-grid">
                    <div class="table-panel">
                        <div class="filters">
                            <div class="search-field input-shell">
                                <span class="search-mini"></span>
                                <input type="text" placeholder="Cari Nama Admin, NIM, atau UKM..." />
                            </div>
                            <div class="select-box">Filter UKM (Semua)</div>
                            <div class="select-box">Filter Status (Semua Status)</div>
                            <div class="select-box" style="min-width: 150px;">Urutkan: Terkini</div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="check-col"><span class="checkbox"></span></th>
                                        <th>Nama Admin & NIM</th>
                                        <th>UKM Naungan</th>
                                        <th>Kontak / Email</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Status Verifikasi</th>
                                        <th>Status Aktif</th>
                                        <th style="text-align:right;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="check-col"><span class="checkbox"></span></td>
                                        <td>
                                            <div class="user-cell">
                                                <div class="avatar-36 blue">AH</div>
                                                <div class="user-info">
                                                    <strong>Achmad Hanafi</strong>
                                                    <small>NIM: 2105346081</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="unit-badge"><span class="mini-square"></span> UKM Fotografi</span></td>
                                        <td>
                                            <div class="contact">achmad.h@polines.ac.id<small>+62 812-4455-8901</small></div>
                                        </td>
                                        <td class="date">14 Agu<br>2024</td>
                                        <td><span class="status-pill green"><span class="small-dot"></span> Terverifikasi</span></td>
                                        <td><span class="toggle on"></span></td>
                                        <td>
                                            <div class="table-actions">
                                                <span class="mini-btn edit" aria-label="Edit" title="Edit">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25Z" fill="currentColor" opacity="0.15"/>
                                                        <path d="M14.06 6.19L17.81 9.94M3 17.25V21H6.75L20.4 7.35C21.2 6.55 21.2 5.29 20.4 4.49L19.51 3.6C18.71 2.8 17.45 2.8 16.65 3.6L3 17.25Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                <span class="mini-btn delete" aria-label="Delete" title="Delete">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M4 7H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M9 7V5.5C9 4.67 9.67 4 10.5 4H13.5C14.33 4 15 4.67 15 5.5V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M7 7L7.7 18.2C7.78 19.2 8.68 20 9.68 20H14.32C15.32 20 16.22 19.2 16.3 18.2L17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M14 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="check-col"><span class="checkbox"></span></td>
                                        <td>
                                            <div class="user-cell">
                                                <div class="avatar-36 orange">HR</div>
                                                <div class="user-info">
                                                    <strong>Haqqi Raya</strong>
                                                    <small>NIM: 2105346092</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="unit-badge"><span class="mini-square"></span> UKM Musik</span></td>
                                        <td>
                                            <div class="contact">haqqi.raya@polines.ac.id<small>+62 821-8899-2310</small></div>
                                        </td>
                                        <td class="date">18 Agu<br>2024</td>
                                        <td><span class="status-pill green"><span class="small-dot"></span> Terverifikasi</span></td>
                                        <td><span class="toggle on"></span></td>
                                        <td>
                                            <div class="table-actions">
                                                <span class="mini-btn edit" aria-label="Edit" title="Edit">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25Z" fill="currentColor" opacity="0.15"/>
                                                        <path d="M14.06 6.19L17.81 9.94M3 17.25V21H6.75L20.4 7.35C21.2 6.55 21.2 5.29 20.4 4.49L19.51 3.6C18.71 2.8 17.45 2.8 16.65 3.6L3 17.25Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                <span class="mini-btn delete" aria-label="Delete" title="Delete">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M4 7H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M9 7V5.5C9 4.67 9.67 4 10.5 4H13.5C14.33 4 15 4.67 15 5.5V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M7 7L7.7 18.2C7.78 19.2 8.68 20 9.68 20H14.32C15.32 20 16.22 19.2 16.3 18.2L17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M14 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="check-col"><span class="checkbox"></span></td>
                                        <td>
                                            <div class="user-cell">
                                                <div class="avatar-36 gray">RP</div>
                                                <div class="user-info">
                                                    <strong>Rafid A. Pratama</strong>
                                                    <small>NIM: 2205346104</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="unit-badge"><span class="mini-square"></span> UKM Olahraga</span></td>
                                        <td>
                                            <div class="contact">rafid.p@polines.ac.id<small>+62 856-1122-4478</small></div>
                                        </td>
                                        <td class="date">02 Sep<br>2024</td>
                                        <td><span class="status-pill orange"><span class="small-dot"></span> Menunggu Verif</span></td>
                                        <td><span class="toggle"></span></td>
                                        <td>
                                            <div class="table-actions">
                                                <span class="mini-btn edit" aria-label="Edit" title="Edit">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25Z" fill="currentColor" opacity="0.15"/>
                                                        <path d="M14.06 6.19L17.81 9.94M3 17.25V21H6.75L20.4 7.35C21.2 6.55 21.2 5.29 20.4 4.49L19.51 3.6C18.71 2.8 17.45 2.8 16.65 3.6L3 17.25Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                <span class="mini-btn delete" aria-label="Delete" title="Delete">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M4 7H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M9 7V5.5C9 4.67 9.67 4 10.5 4H13.5C14.33 4 15 4.67 15 5.5V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M7 7L7.7 18.2C7.78 19.2 8.68 20 9.68 20H14.32C15.32 20 16.22 19.2 16.3 18.2L17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M14 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="check-col"><span class="checkbox"></span></td>
                                        <td>
                                            <div class="user-cell">
                                                <div class="avatar-36 blue">RD</div>
                                                <div class="user-info">
                                                    <strong>Raffael Devanova</strong>
                                                    <small>NIM: 2205346115</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="unit-badge"><span class="mini-square"></span> Teater & Seni</span></td>
                                        <td>
                                            <div class="contact">raffael.d@polines.ac.id<small>+62 813-7722-9011</small></div>
                                        </td>
                                        <td class="date">05 Sep<br>2024</td>
                                        <td><span class="status-pill green"><span class="small-dot"></span> Terverifikasi</span></td>
                                        <td><span class="toggle on"></span></td>
                                        <td>
                                            <div class="table-actions">
                                                <span class="mini-btn edit" aria-label="Edit" title="Edit">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25Z" fill="currentColor" opacity="0.15"/>
                                                        <path d="M14.06 6.19L17.81 9.94M3 17.25V21H6.75L20.4 7.35C21.2 6.55 21.2 5.29 20.4 4.49L19.51 3.6C18.71 2.8 17.45 2.8 16.65 3.6L3 17.25Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                <span class="mini-btn delete" aria-label="Delete" title="Delete">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M4 7H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M9 7V5.5C9 4.67 9.67 4 10.5 4H13.5C14.33 4 15 4.67 15 5.5V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M7 7L7.7 18.2C7.78 19.2 8.68 20 9.68 20H14.32C15.32 20 16.22 19.2 16.3 18.2L17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M14 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="check-col"><span class="checkbox"></span></td>
                                        <td>
                                            <div class="user-cell">
                                                <div class="avatar-36 green">DW</div>
                                                <div class="user-info">
                                                    <strong>Dimas Wicaksono</strong>
                                                    <small>NIM: 2105346077</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="unit-badge"><span class="mini-square"></span> UKM Robotika</span></td>
                                        <td>
                                            <div class="contact">dimas.w@polines.ac.id<small>+62 899-4433-2211</small></div>
                                        </td>
                                        <td class="date">10 Sep<br>2024</td>
                                        <td><span class="status-pill green"><span class="small-dot"></span> Terverifikasi</span></td>
                                        <td><span class="toggle on"></span></td>
                                        <td>
                                            <div class="table-actions">
                                                <span class="mini-btn edit" aria-label="Edit" title="Edit">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25Z" fill="currentColor" opacity="0.15"/>
                                                        <path d="M14.06 6.19L17.81 9.94M3 17.25V21H6.75L20.4 7.35C21.2 6.55 21.2 5.29 20.4 4.49L19.51 3.6C18.71 2.8 17.45 2.8 16.65 3.6L3 17.25Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                <span class="mini-btn delete" aria-label="Delete" title="Delete">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M4 7H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M9 7V5.5C9 4.67 9.67 4 10.5 4H13.5C14.33 4 15 4.67 15 5.5V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M7 7L7.7 18.2C7.78 19.2 8.68 20 9.68 20H14.32C15.32 20 16.22 19.2 16.3 18.2L17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                        <path d="M14 11V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination">
                            <div class="meta">Menampilkan <b>5</b> dari <b>34</b> Akun Admin</div>
                            <div class="pager">
                                <span class="page-number active">1</span>
                                <span class="page-number">2</span>
                                <span class="page-number">3</span>
                                <span class="page-number">...</span>
                                <span class="page-number">7</span>
                            </div>
                        </div>
                    </div>

                    <aside class="side-panel">
                        <div class="side-card">
                            <div class="side-header"><span class="mini-square"></span> Kebijakan Akun Admin UKM</div>
                            <div class="side-sub">SOP Kemahasiswaan • 2026</div>
                            <div class="policy-list">
                                <div class="policy-item"><span class="small-square"></span> Tiap UKM berhak mendaftarkan maksimal 2 penanggung jawab aset resmi bersifat kepengurusan kemahasiswaan aktif.</div>
                            </div>
                        </div>

                        <div class="criteria-card">
                            <div class="side-header" style="margin-bottom: 4px;"><span class="mini-square"></span> Kriteria Otorisasi</div>
                            <div class="criteria-list">
                                <div class="criteria-item"><span class="small-square"></span> SK Pengurus Remaja Mahasiswa</div>
                                <div class="criteria-item"><span class="small-square"></span> Email Institusi SSO aktif <a href="#">@polines.ac.id</a></div>
                                <div class="criteria-item"><span class="small-square"></span> Bebas Tanggungan Kerusakan Aset Inventaris</div>
                                <div class="criteria-item"><span class="small-square"></span><a href="#">Baca Regulasi Lengkap</a></div>
                            </div>
                        </div>

                        <div class="side-footer">
                            <div class="side-header" style="margin-bottom: 8px;"><span class="mini-square"></span> Aktivitas Verifikasi Terkini</div>
                            <div class="activity-box">Ada 5 permohonan delegasi menunggu tanda tangan Supir Admin sebelum dapat menerbitkan reserti logistik.</div>
                            <div class="button-row">
                                <button class="small-btn">Buka Antrean Verifikasi</button>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
