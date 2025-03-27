<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'includes/db.php';
require_once 'classes/Tutorial.php';

$db = (new Database())->getConnection();
$tutorialObj = new Tutorial($db);
$tutorials = $tutorialObj->getAllTutorials();
?>

<style>
    body {
        background: linear-gradient(to bottom right, #9b4d96, #f3c8d3); /* Gradient background */
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        box-sizing: border-box;
        position: relative;
        padding-top: 60px; /* Added padding for top */
    }

    main {
        text-align: center;
        padding: 2rem 1rem;
        max-width: 1400px;
        width: 100%;
    }

    h1 {
        font-size: 3.5rem;
        color: #fff;
        margin-bottom: 3rem;
        text-shadow: 3px 6px 8px rgba(0, 8, 2, 0.4);
    }

    .button-container {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    .btn {
        background-color: #4e54c8;
        color: white;
        padding: 14px 28px;
        font-size: 1.2rem;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        margin: 10px;
    }

    .btn:hover {
        background-color: #8f94fb;
        transform: scale(1.1);
    }

    .btn:active {
        transform: scale(1);
    }

    .btn:focus {
        outline: none;
    }

    .tutorial-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        justify-items: center;
        padding: 20px;
    }

    .tutorial {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        transition: transform 0.4s, box-shadow 0.4s;
        max-width: 400px;
        position: relative;
        padding-bottom: 20px;
    }

    .tutorial:hover {
        transform: translateY(-15px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
    }

    .tutorial img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .tutorial-content {
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .tutorial h2 {
        font-size: 2rem;
        color: #fff;
        margin-bottom: 1rem;
    }

    .tutorial p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #e0e0e0;
    }

    .author-date {
        margin-top: 15px;
        font-style: italic;
        color: #bbb;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2.5rem;
        }

        .tutorial-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<main>
    <h1>Welcome to Skill-Swap Tutorials</h1>

    <div class="button-container">
        <a href="login.php" class="btn">Login</a>
        <a href="users.php" class="btn">My Account</a>
        <a href="register.php" class="btn">Register</a>
    </div>

    <div class="tutorial-container">
        <?php foreach($tutorials as $index => $tutorial): ?>
            <div class="tutorial">
                <?php
                    $images = ['images/desktop.jpg', 'images/white.jpg', 'images/watercolor.jpg'];
                    $imageSrc = $images[$index % 3];
                ?>
                <img src="<?php echo $imageSrc; ?>" alt="Tutorial Image">
                <div class="tutorial-content">
                    <h2><?php echo htmlspecialchars($tutorial['title']); ?></h2>
                    <p><?php echo htmlspecialchars($tutorial['description']); ?></p>
                    <div class="author-date">
                        <p><strong>Author:</strong> <?php echo htmlspecialchars($tutorial['author']); ?></p>
                        <p><strong>Created:</strong> <?php echo htmlspecialchars($tutorial['created_at']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>


