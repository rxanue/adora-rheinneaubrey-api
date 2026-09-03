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
            --bg: #070c0b;
            --bg-2: #0a1110;

            --panel: #0d1513;
            --panel-2: #101a18;

            --teal: #42d9b0;
            --teal-light: #63e5c1;
            --teal-dark: #1eb18d;

            --text: #e8f0ed;
            --text-soft: #9aa9a4;
            --text-muted: #5e706a;

            --border: rgba(113, 159, 146, 0.14);
            --border-light: rgba(113, 159, 146, 0.08);
        }


        /* =========================
           BASE
        ========================== */

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;

            padding: 42px 24px;

            font-family: "DM Sans", "Segoe UI", Arial, sans-serif;

            color: var(--text);

            background:
                radial-gradient(
                    circle at 12% 5%,
                    rgba(66, 217, 176, 0.075),
                    transparent 27%
                ),
                radial-gradient(
                    circle at 90% 85%,
                    rgba(66, 217, 176, 0.045),
                    transparent 28%
                ),
                linear-gradient(
                    145deg,
                    #060b0a 0%,
                    #09100e 50%,
                    #060a09 100%
                );

            overflow-x: hidden;
        }


        /* =========================
           BACKGROUND DECORATION
        ========================== */

        body::before {
            content: "";

            position: fixed;

            width: 520px;
            height: 520px;

            top: -300px;
            right: -160px;

            border: 1px solid rgba(66, 217, 176, 0.055);

            border-radius: 50%;

            box-shadow:
                0 0 100px rgba(66, 217, 176, 0.025);

            pointer-events: none;

            z-index: -1;
        }

        body::after {
            content: "";

            position: fixed;

            width: 430px;
            height: 430px;

            bottom: -270px;
            left: -170px;

            border: 1px solid rgba(66, 217, 176, 0.045);

            border-radius: 50%;

            pointer-events: none;

            z-index: -1;
        }


        /* =========================
           MAIN CONTAINER
        ========================== */

        .container {
            width: 100%;
            max-width: 1320px;

            margin: 0 auto;

            padding: 34px 38px 27px;

            background:
                linear-gradient(
                    145deg,
                    rgba(16, 26, 24, 0.97),
                    rgba(9, 15, 14, 0.98)
                );

            border: 1px solid var(--border);

            border-radius: 25px;

            box-shadow:
                0 35px 90px rgba(0, 0, 0, 0.42),
                inset 0 1px 0 rgba(255, 255, 255, 0.018);

            animation: containerIn 0.65s ease forwards;
        }

        @keyframes containerIn {
            from {
                opacity: 0;
                transform: translateY(18px);
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


        /* =========================
           INNOVATIVE USER ICON
        ========================== */

        .main-icon {
            position: relative;

            width: 57px;
            height: 57px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 17px;

            background:
                linear-gradient(
                    145deg,
                    rgba(66, 217, 176, 0.13),
                    rgba(66, 217, 176, 0.035)
                );

            border: 1px solid rgba(66, 217, 176, 0.20);

            box-shadow:
                0 0 28px rgba(66, 217, 176, 0.055);

            color: var(--teal);

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        .main-icon:hover {
            transform: translateY(-3px);

            border-color: rgba(66, 217, 176, 0.38);

            box-shadow:
                0 0 35px rgba(66, 217, 176, 0.12);
        }


        /* SVG icon */

        .main-icon svg {
            width: 28px;
            height: 28px;

            stroke: currentColor;

            fill: none;

            stroke-width: 1.55;

            stroke-linecap: round;
            stroke-linejoin: round;
        }


        /* Small live light */

        .main-icon::after {
            content: "";

            position: absolute;

            width: 7px;
            height: 7px;

            right: -3px;
            top: -3px;

            border-radius: 50%;

            background: var(--teal-light);

            box-shadow:
                0 0 0 4px rgba(66, 217, 176, 0.07),
                0 0 13px rgba(66, 217, 176, 0.60);
        }


        /* =========================
           TITLE
        ========================== */

        .title-content h2 {
            font-size: 27px;

            line-height: 1.15;

            font-weight: 700;

            letter-spacing: -0.8px;

            color: var(--text);
        }

        .title-content p {
            margin-top: 5px;

            font-size: 13px;

            color: var(--text-muted);
        }


        /* =========================
           HEADER META
        ========================== */

        .header-meta {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        /* Directory label */

        .directory-label {
            display: flex;

            align-items: center;

            gap: 7px;

            padding: 9px 12px;

            border: 1px solid var(--border-light);

            border-radius: 9px;

            color: #657771;

            background: rgba(255, 255, 255, 0.015);

            font-size: 10px;

            font-weight: 600;

            letter-spacing: 0.8px;

            text-transform: uppercase;
        }

        .directory-icon {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: var(--teal);

            box-shadow:
                0 0 8px rgba(66, 217, 176, 0.6);
        }


        /* User count */

        .counter {
            display: flex;

            align-items: center;

            gap: 8px;

            padding: 10px 14px;

            border: 1px solid rgba(66, 217, 176, 0.16);

            border-radius: 10px;

            background: rgba(66, 217, 176, 0.055);

            color: var(--teal);

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;
        }

        .counter-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: var(--teal);

            box-shadow:
                0 0 8px rgba(66, 217, 176, 0.65);
        }


        /* =========================
           TABLE CARD
        ========================== */

        .table-card {
            width: 100%;

            overflow: hidden;

            background:
                rgba(6, 11, 10, 0.72);

            border: 1px solid var(--border);

            border-radius: 19px;

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

            min-width: 800px;

            table-layout: fixed;

            border-collapse: collapse;
        }


        /* Exact column ratios */

        th:nth-child(1),
        td:nth-child(1) {
            width: 10%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 22%;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 17%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 27%;
        }

        th:nth-child(5),
        td:nth-child(5) {
            width: 24%;
        }


        /* =========================
           TABLE HEADER
        ========================== */

        th {
            height: 51px;

            padding: 0 22px;

            text-align: left;

            background:
                rgba(255, 255, 255, 0.018);

            border-bottom: 1px solid var(--border);

            color: #63746e;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1.15px;

            text-transform: uppercase;
        }

        th:first-child {
            padding-left: 25px;
        }


        /* =========================
           ROW
        ========================== */

        tbody tr {
            position: relative;

            height: 72px;

            transition:
                background 0.25s ease,
                transform 0.25s ease;
        }

        tbody tr:not(:last-child) {
            border-bottom: 1px solid var(--border-light);
        }

        tbody tr:hover {
            background:
                linear-gradient(
                    90deg,
                    rgba(66, 217, 176, 0.055),
                    rgba(66, 217, 176, 0.018),
                    transparent
                );

            transform: translateX(2px);
        }


        /* Hover indicator */

        tbody tr::before {
            content: "";

            position: absolute;

            top: 0;
            bottom: 0;
            left: 0;

            width: 2px;

            background: var(--teal);

            box-shadow:
                0 0 13px rgba(66, 217, 176, 0.50);

            opacity: 0;

            transition: opacity 0.25s ease;
        }

        tbody tr:hover::before {
            opacity: 1;
        }


        /* =========================
           TABLE CELLS
        ========================== */

        td {
            padding: 0 22px;

            color: var(--text-soft);

            font-size: 13.5px;

            font-weight: 500;

            vertical-align: middle;

            white-space: nowrap;
        }

        td:first-child {
            padding-left: 25px;
        }


        /* =========================
           ID BADGE
        ========================== */

        .id-badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 43px;

            height: 28px;

            padding: 0 9px;

            border-radius: 8px;

            border: 1px solid rgba(66, 217, 176, 0.13);

            background:
                rgba(66, 217, 176, 0.045);

            color: var(--teal);

            font-size: 11px;

            font-weight: 700;

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                border-color 0.25s ease;
        }

        tbody tr:hover .id-badge {
            transform: translateY(-1px);

            background:
                rgba(66, 217, 176, 0.09);

            border-color:
                rgba(66, 217, 176, 0.22);
        }


        /* =========================
           NAME
        ========================== */

        .name-cell {
            display: flex;

            align-items: center;

            gap: 12px;

            color: var(--text);

            font-weight: 650;
        }


        /* =========================
           AVATAR
        ========================== */

        .avatar {
            position: relative;

            width: 39px;
            height: 39px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    rgba(66, 217, 176, 0.15),
                    rgba(66, 217, 176, 0.035)
                );

            border: 1px solid rgba(66, 217, 176, 0.17);

            color: var(--teal);

            font-size: 12px;

            font-weight: 700;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                background 0.3s ease;
        }

        .avatar::after {
            content: "";

            position: absolute;

            width: 7px;
            height: 7px;

            right: -3px;
            bottom: -3px;

            border: 2px solid #0a100f;

            border-radius: 50%;

            background: var(--teal-light);

            box-shadow:
                0 0 8px rgba(66, 217, 176, 0.65);
        }

        tbody tr:hover .avatar {
            transform: translateY(-2px);

            background:
                rgba(66, 217, 176, 0.13);

            box-shadow:
                0 0 17px rgba(66, 217, 176, 0.09);
        }


        /* =========================
           EMAIL
        ========================== */

        .email {
            color: #82928c;

            transition: color 0.25s ease;
        }

        tbody tr:hover .email {
            color: var(--teal-light);
        }


        /* =========================
           USERNAME
        ========================== */

        .username {
            display: inline-flex;

            align-items: center;

            padding: 7px 11px;

            border: 1px solid rgba(113, 159, 146, 0.11);

            border-radius: 8px;

            background:
                rgba(255, 255, 255, 0.022);

            color: #84938e;

            font-size: 11.5px;

            font-weight: 600;

            transition:
                color 0.25s ease,
                background 0.25s ease,
                border-color 0.25s ease,
                transform 0.25s ease;
        }

        tbody tr:hover .username {
            color: var(--teal);

            background:
                rgba(66, 217, 176, 0.06);

            border-color:
                rgba(66, 217, 176, 0.17);

            transform: translateY(-1px);
        }


        /* =========================
           EMPTY STATE
        ========================== */

        .empty {
            height: 230px;

            padding: 20px !important;

            text-align: center;

            color: var(--text-muted);

            font-size: 13px;
        }

        .empty::before {
            content: "○";

            display: block;

            margin-bottom: 10px;

            color: #35443f;

            font-size: 29px;
        }


        /* =========================
           FOOTER
        ========================== */

        .footer {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-top: 16px;

            padding: 0 4px;

            color: #52615c;

            font-size: 11px;

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

            background: var(--teal);

            box-shadow:
                0 0 0 4px rgba(66, 217, 176, 0.055),
                0 0 10px rgba(66, 217, 176, 0.45);
        }

        .footer-right {
            color: #3f4e49;
        }


        /* =========================
           SCROLLBAR
        ========================== */

        .table-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: #080d0c;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #263b35;

            border-radius: 20px;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background: #34594d;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            body {
                padding: 25px 14px;
            }

            .container {
                padding: 25px 22px 22px;
            }

            .directory-label {
                display: none;
            }
        }


        @media (max-width: 650px) {

            .container {
                border-radius: 20px;
            }

            .top-section {
                align-items: flex-start;

                margin-bottom: 21px;
            }

            .main-icon {
                width: 49px;
                height: 49px;

                border-radius: 14px;
            }

            .main-icon svg {
                width: 25px;
                height: 25px;
            }

            .title-content h2 {
                font-size: 21px;
            }

            .title-content p {
                font-size: 11px;
            }

            .counter {
                display: none;
            }

            .table-card {
                border-radius: 15px;
            }

            .footer {
                gap: 8px;
            }
        }


        @media (max-width: 430px) {

            body {
                padding: 15px 10px;
            }

            .container {
                padding: 18px 16px;
            }

            .title-area {
                gap: 11px;
            }

            .title-content h2 {
                font-size: 19px;
            }

            .title-content p {
                font-size: 10px;
            }

            .footer {
                flex-direction: column;

                align-items: flex-start;
            }
        }

    </style>
</head>


<body>


    <div class="container">


        <!-- =========================
             HEADER
        ========================== -->

        <div class="top-section">


            <div class="title-area">


                <!-- Modern User Directory Icon -->

                <div class="main-icon">

                    <svg
                        viewBox="0 0 32 32"
                        aria-hidden="true"
                    >

                        <!-- Main person -->

                        <circle
                            cx="16"
                            cy="10"
                            r="4"
                        />

                        <path
                            d="M8.5 25c.8-4.4 3.4-6.8 7.5-6.8s6.7 2.4 7.5 6.8"
                        />


                        <!-- Small network/person details -->

                        <path
                            d="M6.5 20.5c-2.1.5-3.5 2-4 4.5"
                        />

                        <circle
                            cx="5"
                            cy="15"
                            r="2.3"
                        />

                        <path
                            d="M25.5 20.5c2.1.5 3.5 2 4 4.5"
                        />

                        <circle
                            cx="27"
                            cy="15"
                            r="2.3"
                        />

                    </svg>

                </div>


                <div class="title-content">

                    <h2>Registered Users</h2>

                    <p>
                        Manage and view all registered accounts
                    </p>

                </div>


            </div>


            <div class="header-meta">


                <div class="directory-label">

                    <span class="directory-icon"></span>

                    User Directory

                </div>


                <?php if (!empty($users)): ?>

                    <div class="counter">

                        <span class="counter-dot"></span>

                        <?= count($users); ?> Users

                    </div>

                <?php endif; ?>


            </div>


        </div>



        <!-- =========================
             USER TABLE
        ========================== -->

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



        <!-- =========================
             FOOTER
        ========================== -->

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