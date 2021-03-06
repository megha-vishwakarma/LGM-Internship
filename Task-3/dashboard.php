<?php
    session_start();
    include "Components/connection.php"
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
        include "Components/head.php"
?>
    <body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <?php
                include "Components/navbar.php"
            ?>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <div class="profile">
                        <img src="https://ssl.gstatic.com/images/branding/product/2x/avatar_circle_grey_512dp.png" alt="">
                        <p><?php echo $_SESSION['name']; ?></p>
                        <span><?php echo $_SESSION['role']; ?></span>
                    </div>
                    <li class="item active" id="dashboard">
                        <a href="dashboard.php" class="menu-btn">
                            <i class="fas fa-desktop"></i><span>Dashboard</span>
                        </a>
                    </li>
<?php
                        if($_SESSION['role'] === "admin" or $_SESSION['role'] === "subject_staff"){
?>
                    <li class="item" id="student">
                        <a href="Student.php" class="menu-btn" >
                            <i class="fas fa-user-graduate"></i><span> Student</span>
                        </a>
                    </li>
                    <?php
                        }
                        if($_SESSION['role'] === "admin"){
?>
                    <li class="item" id="faculty">
                        <a href="faculty.php" class="menu-btn">
                            <i class="fas fa-user"></i><span> Faculty</span>
                        </a>
                    </li>
<?php
                        }
                        if($_SESSION['role'] === "admin" or $_SESSION['role'] === "subject_staff"){
?>
                    <li class="item" id="classes">
                        <a href="Classes.php" class="menu-btn">
                            <i class="fas fa-university"></i><span>Classes</span>
                        </a>
                    </li>
<?php
                        }
?>
                    <li class="item" id="exam">
                        <a href="Exam.php" class="menu-btn">
                            <i class="fas fa-paste"></i><span> Exams</span>
                        </a>
                    </li>
                    <li class="item" id="result">
                        <a href="Result.php" class="menu-btn">
                            <i class="fas fa-graduation-cap"></i>Result</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">
                <div class="card">
                <?php
    include 'Components/connection.php';
    
    $user_Login_query = "select * from faculty_details";            
    $user_Login_submit = mysqli_query($con, $user_Login_query);
    $faculty = mysqli_num_rows($user_Login_submit);
    
    $user_Login_query = "select * from students_details";            
    $user_Login_submit = mysqli_query($con, $user_Login_query);
    $student = mysqli_num_rows($user_Login_submit);
    
    $user_Login_query = "select * from class_details";            
    $user_Login_submit = mysqli_query($con, $user_Login_query);
    $class = mysqli_num_rows($user_Login_submit);
    
    $user_Login_query = "select * from exam_details";            
    $user_Login_submit = mysqli_query($con, $user_Login_query);
    $exam = mysqli_num_rows($user_Login_submit);
    
    $user_Login_query = "select * from exam_details where result_published='Yes'";            
    $user_Login_submit = mysqli_query($con, $user_Login_query);
    $result = mysqli_num_rows($user_Login_submit);
?>
                    <div class="card-content">
                        <div class="card-text">
                            <div class="card-title">
                                <h3>Total Result Published</h3>
                                <p><?php echo $result; ?></p>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-text">
                            <div class="card-title">
                                <h3>Total Student</h3>
                                <p><?php echo $student; ?></p>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-text">
                            <div class="card-title">
                                <h3>Total Class</h3>
                                <p><?php echo $class; ?></p>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-university"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-text">
                            <div class="card-title">
                                <h3>Total Faculty</h3>
                                <p><?php echo $faculty; ?></p>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-text">
                            <div class="card-title">
                                <h3>Total Exam</h3>
                                <p><?php echo $exam; ?></p>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-paste"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--main container end-->
        </div>
        <!--wrapper end-->
        <!-- pm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --> -->
        <script type="text/javascript">
            $(document).ready(function(){
                $(".sidebar-btn").click(function(){
                    $(".wrapper").toggleClass("collapse");
                });
            });
        </script>

    </body>
</html>
      