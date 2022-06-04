<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-400 p-5 shadow rounded">
        <form method="post" action="app/http/signup.php" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <img src="img/logo.png" class="w-25">
                <h3 class="display-4 fs-1 text-center">Sign Up</h3>
                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert"> <?php echo htmlspecialchars($_GET['error']);?> </div>
                <?php } 

                if (isset($_GET['name'])) {
                    $name = $_GET['name'];
                }else $name = '';
  
                if (isset($_GET['username'])) {
                    $username = $_GET['username'];
                }else $username = '';
                
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="<?=$name?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="username"  value="<?=$username?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="pp" class="form-control">
            </div>
          <button type="submit" class="btn btn-primary"> Sign Up </button>
          <a href="index.php">Login</a>
        </form>
    </div>
    
    
</body>
</html>

