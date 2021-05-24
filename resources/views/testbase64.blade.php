<!DOCTYPE html>
<html>
<head>
	<title>Tets</title>
</head>
<body>
<form method="post" action="{{URL::to('/load-img')}}" enctype="multipart/form-data">
	            {{ csrf_field() }}
<input type="file" name="base64">

<button name="upload">Upload</button>
</form>
</body>
</html>