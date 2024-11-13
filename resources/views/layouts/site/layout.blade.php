<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
	<div class="min-h-full">
		<x-site-layout-menu />

		<header class="bg-white shadow">
			<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
				<h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$title ?? 'Dashboard'}}</h1>
			</div>
		</header>
		<main>
			<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
				{{ $slot }}
			</div>
		</main>

		<x-site-layout-footer />
	</div>
	<script src="https://cdn.tailwindcss.com"></script>
</body>

</html>