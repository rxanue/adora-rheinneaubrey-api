<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #080d0c;
            --bg-soft: #0d1413;
            --card: #101817;
            --card-light: #131d1c;

            --primary: #49d9b1;
            --primary-dark: #27b995;
            --primary-soft: rgba(73, 217, 177, 0.10);

            --white: #f3f8f6;
            --text: #e7efec;
            --text-soft: #a2b2ad;
            --text-muted: #64736e;

            --border: rgba(130, 169, 157, 0.14);

            --green: #49d9b1;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            padding: 45px 25px;

            color: var(--text);

            background:
                radial-gradient(
                    circle at 10% 0%,
                    rgba(73, 217, 177, 0.08),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 100%,
                    rgba(39, 185, 149, 0.06),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #080d0c,
                    #0a100f 50%,
                    #070b0a
                );

            overflow-x: hidden;
        }


        /* =========================
           BACKGROUND EFFECTS
        ========================== */

        body::before {
            content: "";

            position: fixed;
            top: -180px;
            right: -100px;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            border: 1px solid rgba(73, 217, 177, 0.06);

            box-shadow:
                0 0 100px rgba(73, 217, 177, 0.025);

            pointer-events: none;
            z-index: -1;
        }

        body::after {
            content: "";

            position: fixed;
            bottom: -220px;
            left: -120px;

            width: 480px;
            height: 480px;

            border-radius: 50%;

            border: 1px solid rgba(73, 217, 177, 0.05);

            pointer-events: none;
            z-index: -1;
        }


        /* =========================
           MAIN CONTAINER
        ========================== */

        .container {
            width: 100%;
            max-width: 1160px;

            margin: auto;
            padding: 34px;

            background:
                linear-gradient(
                    145deg,
                    rgba(18, 28, 27, 0.97),
                    rgba(10, 16, 15, 0.98)
                );

            border: 1px solid var(--border);
            border-radius: 24px;

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.45),
                0 0 0 1px rgba(255, 255, 255, 0.01);

            animation: containerAppear 0.7s ease forwards;
        }

        @keyframes containerAppear {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        /* =========================
           HEADER
        ========================== */

        .top-section {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 25px;
            margin-bottom: 28px;
        }

        .title-area {
            display: flex;
            align-items: center;
            gap: 16px;
        }


        /* Main icon */

        .main-icon {
            position: relative;

            width: 56px;
            height: 56px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            color: var(--primary);

            background:
                linear-gradient(
                    145deg,
                    rgba(73, 217, 177, 0.15),
                    rgba(73, 217, 177, 0.04)
                );

            border: 1px solid rgba(73, 217, 177, 0.20);

            box-shadow:
                0 0 30px rgba(73, 217, 177, 0.07);

            font-size: 23px;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .main-icon:hover {
            transform: translateY(-3px);

            box-shadow:
                0 0 35px rgba(73, 217, 177, 0.16);
        }

        .main-icon::after {
            content: "";

            position: absolute;

            width: 7px;
            height: 7px;

            top: -3px;
            right: -3px;

            border-radius: 50%;

            background: var(--primary);

            box-shadow:
                0 0 0 4px rgba(73, 217, 177, 0.08),
                0 0 12px rgba(73, 217, 177, 0.5);
        }


        /* Heading */

        .title-content h2 {
            font-size: 27px;
            font-weight: 700;

            letter-spacing: -0.8px;

            color: var(--white);
        }

        .title-content p {
            margin-top: 5px;

            font-size: 13px;
            font-weight: 400;

            color: var(--text-muted);
        }


        /* =========================
           USER COUNTER
        ========================== */

        .counter {
            display: flex;
            align-items: center;
            gap: 9px;

            padding: 10px 15px;

            border: 1px solid rgba(73, 217, 177, 0.15);
            border-radius: 10px;

            background: rgba(73, 217, 177, 0.06);

            color: var(--primary);

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
        }

        .counter-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: var(--primary);

            box-shadow:
                0 0 8px rgba(73, 217, 177, 0.7);
        }


        /* =========================
           TABLE CARD
        ========================== */

        .table-card {
            overflow: hidden;

            background: rgba(8, 13, 12, 0.72);

            border: 1px solid var(--border);
            border-radius: 18px;

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.015);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }


        /* =========================
           TABLE
        ========================== */

        table {
            width: 100%;
            min-width: 760px;

            border-collapse: collapse;
        }


        /* Table header */

        th {
            padding: 16px 22px;

            text-align: left;

            background:
                rgba(255, 255, 255, 0.018);

            border-bottom: 1px solid var(--border);

            color: #6f807a;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        th:first-child {
            padding-left: 24px;
        }


        /* =========================
           TABLE ROWS
        ========================== */

        tbody tr {
            position: relative;

            transition:
                background 0.25s ease,
                transform 0.25s ease;
        }

        tbody tr:not(:last-child) {
            border-bottom: 1px solid rgba(130, 169, 157, 0.09);
        }

        tbody tr:hover {
            background:
                linear-gradient(
                    90deg,
                    rgba(73, 217, 177, 0.055),
                    rgba(73, 217, 177, 0.015),
                    transparent
                );

            transform: translateX(3px);
        }


        /* Green hover indicator */

        tbody tr::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 2px;

            background: var(--primary);

            box-shadow:
                0 0 12px rgba(73, 217, 177, 0.55);

            opacity: 0;

            transition: opacity 0.25s ease;
        }

        tbody tr:hover::before {
            opacity: 1;
        }


        /* Table cells */

        td {
            padding: 18px 22px;

            color: var(--text-soft);

            font-size: 13.5px;
            font-weight: 500;

            transition: color 0.2s ease;
        }

        td:first-child {
            padding-left: 24px;
        }

        tbody tr:hover td {
            color: var(--text);
        }


        /* =========================
           ID
        ========================== */

        .id-badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 38px;
            height: 27px;

            padding: 0 9px;

            border-radius: 8px;

            border: 1px solid rgba(73, 217, 177, 0.12);

            background: rgba(73, 217, 177, 0.055);

            color: var(--primary);

            font-size: 11px;
            font-weight: 700;

            transition:
                background 0.25s ease,
                transform 0.25s ease;
        }

        tbody tr:hover .id-badge {
            background: rgba(73, 217, 177, 0.11);

            transform: translateY(-2px);
        }


        /* =========================
           AVATAR
        ========================== */

        .name-cell {
            display: flex;
            align-items: center;
            gap: 12px;

            color: var(--text);

            font-weight: 650;
        }

        .avatar {
            position: relative;

            width: 39px;
            height: 39px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    rgba(73, 217, 177, 0.18),
                    rgba(73, 217, 177, 0.05)
                );

            border: 1px solid rgba(73, 217, 177, 0.17);

            color: var(--primary);

            font-size: 12px;
            font-weight: 700;

            transition:
                transform 0.3s ease,
                background 0.3s ease,
                box-shadow 0.3s ease;
        }

        .avatar::after {
            content: "";

            position: absolute;

            right: -3px;
            bottom: -3px;

            width: 7px;
            height: 7px;

            border: 2px solid #0c1211;

            border-radius: 50%;

            background: var(--green);

            box-shadow:
                0 0 7px rgba(73, 217, 177, 0.5);
        }

        tbody tr:hover .avatar {
            transform: translateY(-3px) rotate(-2deg);

            background:
                rgba(73, 217, 177, 0.14);

            box-shadow:
                0 0 18px rgba(73, 217, 177, 0.10);
        }


        /* =========================
           EMAIL
        ========================== */

        .email {
            color: #81918c;

            transition: color 0.25s ease;
        }

        tbody tr:hover .email {
            color: var(--primary);
        }


        /* =========================
           USERNAME
        ========================== */

        .username {
            display: inline-flex;
            align-items: center;

            padding: 7px 11px;

            border-radius: 8px;

            border: 1px solid rgba(130, 169, 157, 0.11);

            background: rgba(255, 255, 255, 0.025);

            color: #8d9b96;

            font-size: 11.5px;
            font-weight: 600;

            transition:
                background 0.25s ease,
                border-color 0.25s ease,
                color 0.25s ease,
                transform 0.25s ease;
        }

        tbody tr:hover .username {
            background: rgba(73, 217, 177, 0.07);

            border-color: rgba(73, 217, 177, 0.15);

            color: var(--primary);

            transform: translateY(-1px);
        }


        /* =========================
           EMPTY STATE
        ========================== */

        .empty {
            padding: 60px 20px !important;

            text-align: center;

            color: var(--text-muted);

            font-size: 14px;
        }

        .empty::before {
            content: "○";

            display: block;

            margin-bottom: 10px;

            color: #43514d;

            font-size: 30px;
        }


        /* =========================
           FOOTER
        ========================== */

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-top: 17px;
            padding: 0 4px;

            color: #52615c;

            font-size: 11.5px;
            font-weight: 500;
        }

        .connection {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--green);

            box-shadow:
                0 0 0 4px rgba(73, 217, 177, 0.07),
                0 0 10px rgba(73, 217, 177, 0.45);
        }

        .footer-right {
            color: #46534f;
        }


        /* =========================
           SCROLLBAR
        ========================== */

        .table-wrapper::-webkit-scrollbar {
            height: 7px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: #0a100f;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #263b36;
            border-radius: 20px;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background: #34564d;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 760px) {

            body {
                padding: 20px 12px;
            }

            .container {
                padding: 20px;

                border-radius: 20px;
            }

            .top-section {
                align-items: flex-start;

                margin-bottom: 22px;
            }

            .main-icon {
                width: 48px;
                height: 48px;

                border-radius: 14px;

                font-size: 20px;
            }

            .title-content h2 {
                font-size: 21px;
            }

            .title-content p {
                font-size: 11.5px;
            }

            .counter {
                display: none;
            }

            .table-card {
                border-radius: 15px;
            }

            th,
            td {
                padding: 15px 16px;
            }

            td:first-child,
            th:first-child {
                padding-left: 18px;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;

                gap: 9px;
            }
        }


        /* =========================
           SMALL MOBILE
        ========================== */

        @media (max-width: 480px) {

            .container {
                padding: 16px;
            }

            .title-area {
                gap: 11px;
            }

            .title-content h2 {
                font-size: 19px;
            }

            .title-content p {
                font-size: 10.5px;
            }
        }

    </style>
</head>


<body>


    <div class="container">

        <!-- HEADER -->

        <div class="top-section">

            <div class="title-area">

                <div class="main-icon">
                    👥
                </div>

                <div class="title-content">

                    <h2>Registered Users</h2>

                    <p>
                        Manage and view all registered accounts
                    </p>

                </div>

            </div>


            <?php if (!empty($users)): ?>

                <div class="counter">

                    <span class="counter-dot"></span>

                    <?= count($users); ?> Users

                </div>

            <?php endif; ?>

        </div>


        <!-- USER TABLE -->

        <div class="table-card">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>First Name</th>

                            <th>Last Name</th>

                            <th>Email</th>

                            <th>Username</th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php if (!empty($users)): ?>

                            <?php foreach ($users as $user): ?>

                                <tr>


                                    <!-- ID -->

                                    <td>

                                        <span class="id-badge">

                                            #<?= html_escape($user['id'] ?? ''); ?>

                                        </span>

                                    </td>


                                    <!-- FIRST NAME -->

                                    <td>

                                        <div class="name-cell">

                                            <div class="avatar">

                                                <?= strtoupper(
                                                    substr(
                                                        $user['firstname'] ?? 'U',
                                                        0,
                                                        1
                                                    )
                                                ); ?>

                                            </div>

                                            <?= html_escape(
                                                $user['firstname'] ?? ''
                                            ); ?>

                                        </div>

                                    </td>


                                    <!-- LAST NAME -->

                                    <td>

                                        <?= html_escape(
                                            $user['lastname'] ?? ''
                                        ); ?>

                                    </td>


                                    <!-- EMAIL -->

                                    <td>

                                        <span class="email">

                                            <?= html_escape(
                                                $user['email'] ?? ''
                                            ); ?>

                                        </span>

                                    </td>


                                    <!-- USERNAME -->

                                    <td>

                                        <span class="username">

                                            @<?= html_escape(
                                                $user['username'] ?? ''
                                            ); ?>

                                        </span>

                                    </td>


                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>


                            <tr>

                                <td
                                    colspan="5"
                                    class="empty"
                                >
                                    No users found in the database.
                                </td>

                            </tr>


                        <?php endif; ?>


                    </tbody>

                </table>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="footer">

            <div class="connection">

                <span class="status-dot"></span>

                User database connected

            </div>


            <div class="footer-right">

                Registered Accounts

            </div>

        </div>


    </div>


</body>

</html>