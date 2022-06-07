<?php 
  session_start();

  if (isset($_SESSION['username'])) {
  	
    # database connection file
  	include 'app/db.conn.php';
    include 'app/helpers/user.php';
    include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';


    # Getting User data data
  	$user = getUser($_SESSION['username'], $conn);
    // echo "<pre>";
    // print_r($user);

    # Getting User conversations
  	$conversations = getConversation($user['user_id'], $conn);
    // print_r($conversations);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="/css/style.css"> -->
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="p-2 w-400 rounded shadow">
      <div>
        <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <img src="uploads/<?=$user['p_p']?>" class="w-25 rounded-circle">
              <h3 style="font-size: 1rem;" class="fs-xs m-2"><?=$user['name']?></h3>
                  
            </div>
          <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>
        <div class="input-group mb-3">
    			<input type="text" placeholder="Search..." id="searchText" class="form-control">
    			<button class="btn btn-primary" id="serachBtn">
    			        <i class="fa fa-search"></i>       
    			</button>        
    		</div> 
        <ul id="chatList" class="list-group mvh-50 over">
          <?php if (!empty($conversations)) { ?>
          <?php foreach ($conversations as $conversation){ ?>

          <li class="list-group-item">
            <a href="chat.php?user=<?=$conversation['username']?>" class="justify-content-between align-items-center p-2">
            <div class="d-flex align-items-center">
                <img style="width: 10%;" src="uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle">
                <h3 style="font-size: 1rem;" class="fs-xs m-2"><?=$conversation['name']?></h3>
            </div>
            <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
		    					<div title="online">
		    						<div class="online"></div>
		    					</div>
	    					<?php } ?>
            </a>
          </li>
          <?php } ?>
          <?php }else{ ?>
    				<div class="alert alert-info
    				            text-center">
					   <i style="font-size: 5rem;" class="fa fa-comments d-block fs-big"></i>
                       No messages yet, Start the conversation
					  </div>     
          <?php } ?>
        </ul>
      </div>

    </div>





    
</body>
</html>



<?php

  }else{
    header("Location: index.php");
    exit;

  }
?>