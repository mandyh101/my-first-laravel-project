<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Laracast blog</title>
  <link rel="stylesheet" href="/app.css">
</head>

<body>
<!-- todo - work out how to make header component reusable so pge doesnt error if  view doesn't hve the header -->
  <header>
    {{$header}}
  </header>
  
  {{$slot}}

</body>

</html>