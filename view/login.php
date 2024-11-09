<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
</head>
<body>
    <div clss="container">
        <div class="row" style="height:100px"></div>
        <form action="" method="post">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 panel panel-default" style="height:400px">
                <div class="col-md-6" style="height:400px">
                    <img src="../images/logo.png" height="400px">
                </div>
                <div class="col-md-6" style="height:400px"">
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <label style="font-size:18px;">Sign Into Your Account</label>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <span class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="email" name="loginusername" id="loginusername" class="form-control" required="required">
                            </span>
                        </div>  
                    </div>   
                    <div class="row">&nbsp;</div>   
                    <div class="row">
                        <div class="col-md-12">
                            <span class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" name="loginpassword" id="loginpassword" class="form-control" required="required">
                            </span>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-12">
                            <input 
                                type="submit" 
                                class="btn btn-primary btn-block" 
                                name="submit" 
                                style="background-color: #170680;"
                            >  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> 
    </div>
</body>
</html>