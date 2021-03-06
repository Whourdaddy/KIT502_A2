<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css file and font style -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/dashboard.css" />
    <title>UTas host dashboard</title>
</head>

<body>
    <!-- sider nav bar -->
    <div class="db_sider">
        <div class="db_brand">
            <img src="../img/logo/logo.png" alt="">
        </div>
        <div class="sider_bar_menu">
            <ul>
                <li>
                    <a class="active_fun" onclick="order_tab()"><span class="las la-users"></span>
                        <span>Accommodations</span></a>
                </li>

                <li>
                    <a class="active_fun" onclick="rate_tab()"><span class="las la-list-alt"></span>
                        <span>Rates</span></a>
                </li>
                <li>
                    <a href="../login.php?logout='1'" class="active_fun"><span class="las la-hotel"></span>
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main_container">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label> Dashboard
            </h2>
            <!-- user nav bar -->
            <div class="user_bar">
                <img src="../img/dashboard/user_icon.webp" alt="">
                <div>
                    <!-- notification message -->
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="error success">
                            <h3>
                                <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    <!-- logged in user information -->
                    <?php if (isset($_SESSION['username'])) : ?>
                        <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
                    <?php endif ?>
                    <h6>Host</h6>
                </div>
            </div>
        </header>
        <main>
            <div class="dash_card_container">
                <ul>
                    <li class="active_card">
                        <a onclick="order_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>10</h1>
                                    <span>Accommodations</span>
                                </div>
                                <div>
                                    <span class="las la-users"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active_card">
                        <a onclick="rate_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>10</h1>
                                    <span>Rates</span>
                                </div>
                                <div>
                                    <span class="las la-list-alt"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!------------------------Accommodation card----------------->
            <div class="tab" id="order_content">
                <div class="tab tab_create">
                    <td>
                        Location :<input type="email" name="edit_location" id="edit_location">
                    </td>
                    <td>
                        Price :<input type="location" name="edit_price" id="edit_price">
                    </td>
                    <td>
                        Num_of_room :<input type="text" name="edit_room" id="edit_room">
                    </td>
                    <td>
                        Num_of_bathroom :<input type="text" name="edit_bathroom" id="edit_bathroom">
                    </td>
                    <td>
                        Smoke :<input type="text" name="edit_smoke" id="edit_smoke">
                    </td>
                    <td>
                        Garage :<input type="text" name="edit_garage" id="edit_garage">
                    </td>
                    <td>
                        Internet :<input type="text" name="edit_internet" id="edit_internet">
                    </td>
                    <div class="create_btn">
                        <button onclick="create_order()">Create</button>
                        <button id="edit_btn" onclick="edit_order()">Edit</button>
                    </div>
                </div>
                <table id="order_table">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Num_of_room</th>
                            <th>Num_of_bathroom</th>
                            <th>Smoke</th>
                            <th>Garage</th>
                            <th>Internet</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>MEL</td>
                        <td>30</td>
                        <td>2</td>
                        <td>3</td>
                        <td>NO</td>
                        <td>YES</td>
                        <td>YES</td>
                    </tr>
                    <tr>
                        <td>SYN</td>
                        <td>100</td>
                        <td>34</td>
                        <td>5</td>
                        <td>YES</td>
                        <td>NO</td>
                        <td>YES</td>
                    </tr>
                    <tr>
                        <td>Hobart</td>
                        <td>90</td>
                        <td>8</td>
                        <td>2</td>
                        <td>NO</td>
                        <td>YES</td>
                        <td>NO</td>
                    </tr>
                    <tr>
                        <td>ADELAILE</td>
                        <td>60</td>
                        <td>5</td>
                        <td>2</td>
                        <td>YES</td>
                        <td>YES</td>
                        <td>YES</td>
                    </tr>
                </table>
            </div>
            <!------------------------rate card----------------->
            <div class="tab" id="rate_content">
                <table id="rate_table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Location</th>
                            <th>Rate score (sum_rate/num_review)</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>01</td>
                        <td>Mel</td>
                        <td>3.8</td>>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>SYN</td>
                        <td>3.8</td>>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Hobart</td>
                        <td>3.8</td>>
                    </tr>
                </table>
            </div>
        </main>
    </div>
    <!-- insert the javascript files -->
    <script src="../js/host_dashboard.js"></script>
    <script src="../js/host_CRUD.js"></script>
</body>

</html>