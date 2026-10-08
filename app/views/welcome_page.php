<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web2 Lab Activities</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --pink: #ff3f9f;
            --pink-dark: #e52b8b;
            --background: #0d0d0d;
            --card: #181818;
            --card-hover: #1d1d1d;
            --border: #292929;
            --white: #ffffff;
            --text: #eeeeee;
        }

        body {
            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(255, 63, 159, 0.08),
                    transparent 35%
                ),
                var(--background);

            color: var(--text);

            display: flex;
            justify-content: center;

            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 760px;
        }

        .header {
            text-align: center;
            padding: 55px 30px 40px;
        }

        .course {
            color: var(--pink);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .header h1 {
            color: var(--white);
            font-size: clamp(2.2rem, 6vw, 4rem);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -0.04em;
            margin-bottom: 18px;
        }

        .header h1 span {
            color: var(--pink);
        }

        .student-name {
            color: #bcbcbc;
            font-size: 1rem;
            font-weight: 500;
        }

        .activities {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .activity-card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 16px;

            padding: 35px;

            text-align: center;

            transition:
                transform 0.2s ease,
                border-color 0.2s ease,
                background 0.2s ease;
        }

        .activity-card:hover {
            transform: translateY(-3px);

            background: var(--card-hover);

            border-color: rgba(255, 63, 159, 0.45);
        }

        .activity-title {
            color: var(--white);

            font-size: 1.25rem;

            font-weight: 700;

            margin-bottom: 25px;
        }

        .activity-number {
            color: var(--pink);
        }

        .activity-button {
            display: inline-block;

            padding: 13px 28px;

            background: var(--pink);

            color: white;

            text-decoration: none;

            border-radius: 8px;

            font-size: 0.95rem;

            font-weight: 700;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .activity-button:hover {
            background: var(--pink-dark);

            transform: translateY(-1px);

            box-shadow:
                0 8px 25px
                rgba(255, 63, 159, 0.25);
        }

        .footer {
            text-align: center;

            padding: 35px 20px 10px;

            color: #555555;

            font-size: 0.85rem;
        }

        @media (max-width: 600px) {

            body {
                padding: 20px 15px;
            }

            .header {
                padding: 40px 15px 30px;
            }

            .header h1 {
                font-size: 2.3rem;
            }

            .activity-card {
                padding: 25px 20px;
            }

        }

    </style>
</head>

<body>

    <main class="container">

        <header class="header">

            <div class="course">
                Web Systems and Technologies 2
            </div>

            <h1>
                Welcome to
                <span>Web2 Lab</span>
                Activities
            </h1>

            <p class="student-name">
                Adora, Rheinne Aubrey
            </p>

        </header>


        <section class="activities">

            <div class="activity-card">

                <h2 class="activity-title">
                    Lab Activities
                    <span class="activity-number">5 & 6</span>
                </h2>

                <a
                    href="https://adora-rheinneaubrey-frontend.onrender.com"
                    class="activity-button"
                >
                    Login
                </a>

            </div>

        </section>


        <footer class="footer">
            LavaLust PHP Framework
        </footer>

    </main>

</body>
</html>