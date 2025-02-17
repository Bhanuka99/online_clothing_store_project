$(document).ready(function(){
    
    $("#user_role").change(function(){

        var role_id = $("#user_role").val();
        var url = "../controller/user_controller.php?status=load_functions";
        
        $.post(url,{role:role_id},function(data){
            $("#display_functions").html(data).show();
        });

    });

    $("form").submit(function(){

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var dob = $("#dob").val();
        var nic = $("#nic").val();
        var cno1 = $("#cno1").val();
        var cno2 = $("#cno2").val();
        var user_role = $("#user_role").val();

        if (fname=="") {
            $("#msg").html("First Name Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (lname=="") {
            $("#msg").html("Last Name Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (email=="") {
            $("#msg").html("Email Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (dob=="") {
            $("#msg").html("Date of Birth Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (nic=="") {
            $("#msg").html("NIC Number Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (cno1=="") {
            $("#msg").html("Contact Number 1 Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (cno2=="") {
            $("#msg").html("Contact Number 2 Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (user_role=="") {
            $("#msg").html("User Role Cannot Be Empty!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }

        var patNIC = /^[0-9]{9}[VvXx]$/;
        var patMobile = /^\+947[0-9]{8}$/;

        if (!nic.match(patNIC)) {
            $("#msg").html("Invalid NIC Number!!!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }
        if (!cno2.match(patMobile)) {
            $("#msg").html("Invalid Mobile Number!!!");
            $("#msg").addClass("alert alert-danger");
            return false;
        }

    });

});