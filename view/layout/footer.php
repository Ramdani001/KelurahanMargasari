
 <!-- Bootstrap -->
 <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.js"></script>
 <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.bundle.js"></script>

 <!-- Fontawesome -->
 <script src="<?php echo $main_url?>assets/style/js/fontawesome.all.min.js"></script>
 <script src="<?php echo $main_url?>assets/style/js/jquery-3.3.1.min.js"></script>
 <!-- Show Password -->

 <!-- Data Table -->
 <script src="<?php echo $main_url?>assets/style/dataTables/jquery.dataTables.min.js"></script>
 <script src="<?php echo $main_url?>assets/style/dataTables/dataTables.bootstrap4.min.js"></script>

 
 <script>
    document.getElementById("show1").addEventListener("click", showPass1);
    document.getElementById("show2").addEventListener("click", showPass2);
    document.getElementById("show3").addEventListener("click", showPass3);
    document.getElementById("show4").addEventListener("click", showPass4);

    function showPass1(){
        var pass = document.getElementById('pass');
        if(pass.type == 'password'){
            document.getElementById('pass').setAttribute('type','text');
            document.getElementById('show1').classList.add('d-none');
            document.getElementById('show4').classList.remove('d-none');
        }
    }

    function showPass4(){
        var pass = document.getElementById('pass');
        if(pass.type == 'text'){
            document.getElementById('show1').classList.remove('d-none');
            document.getElementById('show4').classList.add('d-none');
            document.getElementById('pass').setAttribute('type','password');
        }
    }

    function showPass2(){
        var pass = document.getElementById('passBaru');
        var pass1 = document.getElementById('passBaru1');


        if(pass.type == 'password'  && pass1.type == 'password'){
            document.getElementById('show3').classList.remove('d-none');
            document.getElementById('show2').classList.add('d-none');

            document.getElementById('passBaru').setAttribute('type','text');
            document.getElementById('passBaru1').setAttribute('type','text');
        }
    }

    function showPass3(){
        var pass = document.getElementById('passBaru');
        var pass1 = document.getElementById('passBaru1');


        if(pass.type == 'text'  && pass1.type == 'text'){
            document.getElementById('show3').classList.add('d-none');
            document.getElementById('show2').classList.remove('d-none');

            document.getElementById('passBaru').setAttribute('type','password');
            document.getElementById('passBaru1').setAttribute('type','password');
        }
    }

 </script>