<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistify</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('public/css/wsregisterstyle.css') }}" rel="stylesheet">

</head>

<body>
    <div class="home-container">
        <div class="background-image"></div>
        <div class="half-circle"></div>
        <div class="top-logo-container">
            <img src="{{ asset('assistify.png') }}" alt="Assistify Logo" class="top-logo">
            <h2 class="system-title">Working Scholars Management System</h2>
        </div>
        <div class="content-container">
            <div class="kcp-logo-container">
                <img src="assets/kcp-logo.png" alt="University Logo" class="middle-logo">
            </div>
            <h3 class="tagline">“Empowering <span class="orange-text">Scholars</span>, Simplifying <span
                    class="orange-text">Work</span>.”</h3>
            <div class="button-container">
                <button class="role-button">Working Scholar</button>
                <button class="role-button">Supervisor</button>
                <button class="role-button">OSAS</button>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="info-section">
        <div class="info-half-circle"></div>
        <div class="info-header">
            <h1>What is Assistify?</h1>
        </div>
        <div class="info-content">
            <div class="info-left">
                <p>Assistify is a comprehensive management system designed to streamline the coordination of student assistants, 
                also known as working scholars, in the King’s College of the Philippines. By focusing on efficiency and simplicity, 
                Assistify provides a user-friendly interface that enables students, supervisors, and the Office of Student Affairs 
                and Services (OSAS) to manage work hours, task assignments, payroll, and overall performance with ease.</p>
            </div>
            <div class="info-right">
                <p>Student assistants are vital to supporting various academic, administrative, and service functions across campuses. 
                However, managing their schedules, tracking work hours, assigning tasks, and processing payroll can become a complex and time-consuming task. 
                Assistify addresses these challenges by offering a centralized, digital solution that automates and simplifies these processes, ensuring transparency, 
                accuracy, and a seamless experience for all users.</p>
            </div>
        </div>
    </div>

    <!-- Blue and Orange Design Section -->
    <div class="blue-orange-section">
        <div class="orange-background">
            <div class="content">
                <p class="small-text">Assistify is designed with three key user groups in mind:</p>
                <h1 class="user-groups">
                    <span>Working Scholars</span>
                    <span>Supervisors</span>
                    <span>OSAS Personnel</span>
                </h1>
            </div>
        </div>
        <div class="blue-background">
            <div class="content">
                <p class="small-text">Assistify is designed with three key user groups in mind:</p>
                <h1 class="user-groups">
                    <span>Working Scholars</span>
                    <span>Supervisors</span>
                    <span>OSAS Personnel</span>
                </h1>
            </div>
        </div>
    </div>

    <!-- Developer Section -->
    <div class="container">
        <section class="intro">
            <p>
                By simplifying the management of student work hours, tasks, and payroll, 
                Assistify empowers supervisors to manage their teams more effectively, 
                while also providing students with an organized and transparent work experience.
            </p>
            <p>
                Ultimately, Assistify aims to foster a more organized, efficient, and transparent working environment 
                for student assistants, improving the overall campus experience for students, supervisors, and administrative staff alike.
            </p>
        </section>
        
        <section class="project">
            <h2><span class="about-this">About this</span> <span class="project-text">Project</span></h2>
            <p>
                Assistify is a project initiated in partial fulfillment of the requirements for the subject 
                WMAD-303 Advanced Web System Technologies at King's College of the Philippines.
            </p>
        </section>
        
        <section class="developers">
            <h2>Developers</h2>
            <div class="developer-cards">
                <div class="card">
                    <div class="icon"></div>
                    <h3>Melbert P. Maraño</h3>
                    <p>Project Lead<br>Frontend Designer</p>
                    <a href="mailto:melbertmarano2022@gmail.com">melbertmarano2022@gmail.com</a>
                </div>
                <div class="card">
                    <div class="icon"></div>
                    <h3>Sarah Mae Badol</h3>
                    <p>Frontend Developer</p>
                    <a href="mailto:email@gmail.com">email@gmail.com</a>
                </div>
                <div class="card">
                    <div class="icon"></div>
                    <h3>Romel Ligligon</h3>
                    <p>Frontend Developer</p>
                    <a href="mailto:email@gmail.com">email@gmail.com</a>
                </div>
                <div class="card">
                    <div class="icon"></div>
                    <h3>Leandro Balaing</h3>
                    <p>Frontend Developer</p>
                    <a href="mailto:email@gmail.com">email@gmail.com</a>
                </div>
            </div>
        </section>
        
        <footer class="footer">
            <div class="footer-content">
              <h1 class="footer-logo">assist<span class="highlight">ify</span></h1>
              <p>© 2024 Assistify by Marafe, Badol, Ligligon, Balang. All rights reserved.</p>
            </div>
          </footer>
    </div>
</body>

</html>
