<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #f5f7fb;
            --card: rgba(255, 255, 255, 0.88);
            --text: #172033;
            --muted: #7b8497;
            --line: #e8ebf2;
            --accent: #635bff;
            --accent-light: #eeedff;
            --accent-2: #8b5cf6;
        }

        body {
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            padding: 50px 24px;
            background:
                radial-gradient(circle at 10% 10%, rgba(99, 91, 255, 0.10), transparent 28%),
                radial-gradient(circle at 90% 85%, rgba(139, 92, 246, 0.09), transparent 30%),
                var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        /* Floating background shapes */
        body::before,
        body::after {
            content: "";
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
            filter: blur(2px);
        }

        body::before {
            width: 220px;
            height: 220px;
            top: -90px;
            right: 8%;
            background: rgba(99, 91, 255, 0.07);
        }

        body::after {
            width: 280px;
            height: 280px;
            bottom: -130px;
            left: 5%;
            background: rgba(139, 92, 246, 0.06);
        }

        .container {
            width: 100%;
            max-width: 1120px;
            margin: auto;
            background: var(--card);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 24px;
            padding: 34px;
            box-shadow:
                0 25px 70px rgba(31, 38, 70, 0.08),
                0 4px 16px rgba(31, 38, 70, 0.04);
            backdrop-filter: blur(18px);
            animation: containerIn 0.6s ease forwards;
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

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .heading {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            color: white;
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            box-shadow: 0 10px 25px rgba(99, 91, 255, 0.25);
        }

        h2 {
            font-size: 25px;
            font-weight: 750;
            letter-spacing: -0.7px;
            color: var(--text);
        }

        .subtitle {
            margin-top: 4px;
            color: var(--muted);
            font-size: 13px;
        }

        .user-count {
            padding: 10px 15px;
            border-radius: 12px;
            background: var(--accent-light);
            color: var(--accent);
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* Table wrapper */
        .table-wrapper {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: #ffffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            padding: 16px 20px;
            text-align: left;
            background: #fafaff;
            color: #8a91a3;
            font-size: 11px;
            font-weight: 750;
            text-transform: uppercase;
            letter-spacing: 0.9px;
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 17px 20px;
            border-bottom: 1px solid var(--line);
            font-size: 14px;
            color: #394257;
            transition: all 0.25s ease;
        }

        tbody tr {
            transition:
                transform 0.25s ease,
                background-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fafaff;
            transform: scale(1.005);
        }

        tbody tr:hover td {
            color: var(--text);
        }

        /* ID badge */
        .id-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 28px;
            padding: 0 9px;
            border-radius: 9px;
            background: #f0efff;
            color: var(--accent);
            font-size: 12px;
            font-weight: 750;
        }

        /* User name */
        .name-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 650;
            color: #20283b;
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            color: white;
            font-size: 12px;
            font-weight: 750;
            background: linear-gradient(135deg, #7169ff, #9b6cff);
            box-shadow: 0 5px 14px rgba(99, 91, 255, 0.18);
        }

        /* Email */
        .email {
            color: #687187;
        }

        /* Username */
        .username {
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border-radius: 9px;
            background: #f6f7fa;
            color: #505a70;
            font-size: 12px;
            font-weight: 600;
        }

        /* Empty state */
        .empty {
            text-align: center;
            color: var(--muted);
            padding: 45px 20px !important;
            font-size: 14px;
        }

        .empty::before {
            content: "○";
            display: block;
            margin-bottom: 8px;
            font-size: 26px;
            color: #b5b9c6;
        }

        /* Footer */
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 18px;
            color: #9aa1b1;
            font-size: 12px;
        }

        .online {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #46c98b;
            box-shadow: 0 0 0 4px rgba(70, 201, 139, 0.12);
        }

        /* Responsive */
        @media (max-width: 700px) {
            body {
                padding: 20px 12px;
            }

            .container {
                padding: 20px;
                border-radius: 20px;
            }

            .header {
                align-items: flex-start;
            }

            .user-count {
                display: none;
            }

            .icon {
                width: 46px;
                height: 46px;
                border-radius: 14px;
            }

            h2 {
                font-size: 21px;
            }

            .subtitle {
                font-size: 12px;
            }

            .table-wrapper {
                border-radius: 14px;
            }

            th,
            td {
                padding: 14px 16px;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <div class="heading">
                <div class="icon">
                    👥
                </div>

                <div>
                    <h2>Registered Users</h2>
                    <p class="subtitle">
                        Manage and view all registered accounts
                    </p>
                </div>
            </div>

            <?php if (!empty($users)): ?>
                <div class="user-count">
                    <?= count($users); ?> Users
                </div>
            <?php endif; ?>

        </div>


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

                                <td>
                                    <span class="id-badge">
                                        #<?= html_escape($user['id'] ?? ''); ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="name-cell">

                                        <div class="avatar">
                                            <?= strtoupper(substr($user['firstname'] ?? 'U', 0, 1)); ?>
                                        </div>

                                        <?= html_escape($user['firstname'] ?? ''); ?>

                                    </div>
                                </td>

                                <td>
                                    <?= html_escape($user['lastname'] ?? ''); ?>
                                </td>

                                <td>
                                    <span class="email">
                                        <?= html_escape($user['email'] ?? ''); ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="username">
                                        @<?= html_escape($user['username'] ?? ''); ?>
                                    </span>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="empty">
                                No users found in the database.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        <div class="footer">

            <div class="online">
                <span class="dot"></span>
                User database connected
            </div>

            <div>
                Registered Accounts
            </div>

        </div>

    </div>

</body>

</html>