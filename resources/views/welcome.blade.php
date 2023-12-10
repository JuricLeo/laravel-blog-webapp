<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog site</title>
	@vite('resources/css/app.css')
</head>

<body>
	<div class="flex flex-col justify-center items-center w-full h-[100vh] bg-slate-800 text-white">
		<div class="">
			<h1 class="text-3xl">
				Welcome to the Blog website!
			</h1>
			<p class="text-center text-slate-400 mt-2">To continue sign in or register</p>
		</div>
		<div class="mt-10">
			<a href="/login">
				<button class="border-2 border-sky-600 py-4 px-8 rounded-xl mr-4 hover:opacity-80">Sign in</button>
			</a>
			<a href="/register">
				<button class="bg-sky-600 py-4 px-8 rounded-xl hover:opacity-80">Register</button>
			</a>
		</div>
	</div>
</body>

</html>