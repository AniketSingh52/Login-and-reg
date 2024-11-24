<?php
include("connect.php");
error_reporting(0);
$id = $_GET['u_id'];
$sql = "select*from users where id=$id";
$result = $conn->query($sql);
if ($row = $result->fetch_assoc()) {
	$name = $row['name'];
	$email = $row['email'];
	$password = $row['password'];
	if ($_POST['submit'] == true) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "update users set name='$name',email='$email',password='$password' where id=$id";
		$result = $conn->query($sql);
		if ($result) {
			#die("Data updated succesfully");
			header("location:main.php");
		} else {
			die("ERROR" . $con->error);
		}
	}
}

?>



<!DOCTYPE html>
<html>

<head>
	<title>Update Page</title>

</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">

<body>
	<!--<div class="container">

		<div class="header">
			<h1>Details</h1>
		</div>
		<div class="main">
			<form method="post" action="<?php //$_PHP_SELF ?>">
				<div class="field">
					<input type="text" placeholder="Name" name="name" autocomplete="off" title="Name" value=<?php
																											//echo $name;
																											?>>
				</div>
				<div class="field">
					<input type="email" placeholder="Email" name="email" title="Email" autocomplete="off" value=<?php
																												//echo $email;
																												?>>
				</div>

				<div class="field">
					<input type="text" placeholder="Password" name="password" autocomplete="off" value=<?php
																										//echo $password;
																										?>>
				</div>


				<div class="button">
					<input type="submit" value="Update" name="submit">
				</div>
			</form>
		</div>
	</div>-->



	<div
		class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
		<div
			class="
          flex flex-col
          bg-white
          shadow-md
          px-4
          sm:px-6
          md:px-8
          lg:px-10
          py-8
          rounded-3xl
          w-50
          max-w-md
        ">
			<div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
				Your Details
			</div>
			<div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
				Enter your Details to be Updated !
			</div>

			<div class="mt-10">
				<form method="post" action="<?php $_PHP_SELF ?>">
					<div class="flex flex-col mb-5">
						<label
							for="email"
							class="mb-1 text-xs tracking-wide text-gray-600">Name:</label>
						<div class="relative">
							<div
								class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
								<i class="fas fa-user text-blue-500"></i>
							</div>

							<input
								type="text" placeholder="Name" name="name" autocomplete="off" title="Name" value=<?php
																													echo $name;
																													?>
								class="
						text-sm
						placeholder-gray-500
						pl-10
						pr-4
						rounded-2xl
						border border-gray-400
						w-full
						py-2
						focus:outline-none focus:border-blue-400
						"
								placeholder="Enter your name" />
						</div>
					</div>
					<div class="flex flex-col mb-5">
						<label
							for="email"
							class="mb-1 text-xs tracking-wide text-gray-600">E-Mail Address:</label>
						<div class="relative">
							<div
								class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
								<i class="fas fa-at text-blue-500"></i>
							</div>

							<input
								type="email" placeholder="Email" name="email" title="Email" autocomplete="off" value=<?php
																														echo $email;
																														?>
								class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
								placeholder="Enter your email" />
						</div>
					</div>
					<div class="flex flex-col mb-6">
						<label
							for="password"
							class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
						<div class="relative">
							<div
								class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
								<span>
									<i class="fas fa-lock text-blue-500"></i>
								</span>
							</div>

							<input
								type="text" placeholder="Password" name="password" autocomplete="off" value=<?php
																											echo $password;
																											?>
								class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
								placeholder="Enter your password" />
						</div>
					</div>

					<div class="flex w-full">
						<input name="submit" value="Update"
							type="submit"
							class="
                flex justify-center item-center w-full px-6 py-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500
                "/>
						
					</div>
				</form>
			</div>
		</div>
		
	</div>
</body>

</html>