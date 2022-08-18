<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload Page</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="/upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@csrf
		<div style="margin-bottom: 10px">
			<input type="file" name="file">
		</div>
		<div>
			<button type="submit">Submit</button>
		</div>
	</form>
	<ul>
		@foreach($files as $file)
			<li>
				<a href="{{$file['url']}}" title="">{{$file['name']}}</a>
			</li>
		@endforeach
	</ul>
</body>
</html>