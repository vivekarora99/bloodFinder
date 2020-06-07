<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Donor Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {


            $("#login").click(function() {

                $uid = $("#uid").val();
                $pwd = $("#pwd").val();
                $.get("login-process.php?uid=" + $uid+"&pwd="+$pwd, function(response)
                {
                    if(response=="Invalid id")
                        alert("invalid id");
                    else
                        if(response=="donor")
                        location.href="donor-dash.php";
                    else
                        if(response=="needy")
                        location.href="needyprofile.php";
    
                
                });
                    
            /*    //if valid
            $uid = $("#uid").val();
                $.get("login-process.php?uid="+$uid,function(data){
                    alert(data);
                    if(data=="valid")
                        location.href="DonorProfile.php";

                });*/
                
                    
            });
        });

    </script>
</head>

<body>

    <nav class="navbar navbar-danger bg-danger">
        <a class="navbar-brand" href="#">
            <h1>Donar Profile</h1>
        </a>
    </nav>
    <div class="container">
        <form >
            <div class="form-group">
                <label>User id:</label>
                <input type="text" class="form-control" id="uid" name="uid" required>
                <small id="did" class="form-text text-muted">Please enter Donar ID</small>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="text" class="form-control" id="pwd" name="pwd" required>
            </div>
            
            
            <input class="btn btn-primary" type="button" name="button" id="login" value="login">
            
        </form>
    </div>
</body>

</html>
