<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
</head>

<body class="bg-white rounded-lg py-5">
  <div class="container flex flex-col mx-auto bg-white rounded-lg pt-12 my-5">
    <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
      <div class="flex items-center justify-center w-full lg:p-12">
        <div class="flex items-center xl:p-10">
          <form class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl" action="<?php $_PHP_SELF ?>" method="post">
            <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Sign In</h3>
            <p class="mb-4 text-grey-700">Enter your email and password</p>

            <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
            <input id="email" required type="email" name="email" placeholder="mail@loopple.com" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
            <label for="password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
            <input id="password" name="password" required type="password" placeholder="Enter a password" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
            <div class="flex flex-row justify-between mb-8">
              <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
                <input type="checkbox" checked value="" class="sr-only peer">
                <div
                  class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-purple-blue-500">
                  <img class="" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png" alt="tick">
                </div>
                <span class="ml-3 text-sm font-normal text-grey-900">Keep me logged in</span>
              </label>
              <!--<a href="javascript:void(0)" class="mr-4 text-sm font-medium text-purple-blue-500">Forget password?</a>-->
            </div>
            <button type="submit" name="submit" class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">Sign In</button>
            <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="register.php" class="font-bold text-grey-700">Create an Account</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  include("connect.php");
  if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select  * from users";
    $result = $conn->query($sql);
    $flag = 0;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($row['email'] == $email) {
          $flag = 1;
          if ($row['password'] == $password) {
            //header("refresh:0.5; url=../pages/changepass.php");
            // echo '<META HTTP-EQUIV="Refresh" Content="0.5; URL=index.php">';
            $flag = 2;
            break;
          }
        }
      }
      if ($flag == 2) {
        echo "<script> alert('Login Successfully !!')</script>";
        header("refresh:0.5; url=main.php");
      } elseif ($flag == 1) {
        echo "<script> alert('Invalid Password!!')</script>";
      } else {
        echo "<script> alert('No user Available')</script>";
      }
    } else {
      echo "<script> alert('No Login !!')</script>";
    }
  }
}
?>

<?php
/*
// Include the database connection file
include('../../../config/connect.php');

if (isset($_POST['type']) && !empty($_POST['type'])) {
  $type = $_POST['type'];

  $query = "SELECT D_id,Name FROM department where College='$type'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    echo '<option  value="" selected disabled > Select a Department</option>';

    while ($row = $result->fetch_assoc()) {
      echo '<option  value="' . $row['D_id'] . '">' . $row['Name'] . '</option>';
    }
  } else {
    echo '<option  value="" selected disabled >No Department Available</option>';
  }
}
  */
?>
