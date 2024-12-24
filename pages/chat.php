<?php 

  // Adds Variables
  require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

  session_start();
  include_once DB;

  if(!isset($_SESSION['unique_id'])){
    header("location: /login");
  }


?>
<?php include_once ROOT ."components/chat/header.php"; ?>
<body style="color:black;">

<div class="userslayout">

<nav id="sidebar" style="left:0;  position:fixed; " class="siclose">
    <ul class="sidebar">
      <li style="padding:10px;background-color:whitesmoke;border:1px transparent; border-radius:20px;">
        <a href="/home">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M240-200h120v-200q0-17 11.5-28.5T400-440h160q17 0 28.5 11.5T600-400v200h120v-360L480-740 240-560v360Zm-80 0v-360q0-19 8.5-36t23.5-28l240-180q21-16 48-16t48 16l240 180q15 11 23.5 28t8.5 36v360q0 33-23.5 56.5T720-120H560q-17 0-28.5-11.5T520-160v-200h-80v200q0 17-11.5 28.5T400-120H240q-33 0-56.5-23.5T160-200Zm320-270Z"/></svg>
        </a>
      </li>

  </nav>
</div>



<div class=" userslayout">
    <section class="users">

      <div class="search">
        <span class="text">Search Messenger</span>
        <input type="text" placeholder="Enter name to search..." class="show">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
  <div class="">
    <section class="chat-area" style="">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM Users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: /home");
          }
        ?>
        <a href="/messager" class="back-icon"><i class="fas fa-arrow-left" style="color:white;"></i></a>
        <img src="/storage/pfp/<?php echo $row['IMAGE']; ?>" alt="" class="imguserpfp">
        <div class="details">
          <span style="color:white;"><?php echo $row['FULL_NAME'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box" style="background:#35373d;">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="/assets/chat/chat.js"></script>
  <script src="/assets/chat/users.js"></script>
<style>
  @media (max-width: 888px) {
    .userslayout {
        display: none;
        box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
        0 32px 64px -48px rgba(0,0,0,0.5)

    }

    

    .back-icon {
      display: unset;
    }
}
.userslayout {
  height:100vh;
  border: 1px transparent;
  border-radius: 20px 0 0 20px;

}
@media (min-width: 888px) {
  .back-icon {
    display:none;
  }

}

.imguserpfp {

  border:1px transparent;
  border-radius: 27px;
}


.chat-area {
  top: 0;
    position: relative;
    height: 90%;
    background: #2a2a2f;
    border: 1px transparent;
    border-radius: 5px;
}
</style>








<style>
@media(min-width:800px) {
  .useoftrash {
  height:100vh;    
  width: 90%;
  top: 0;
  margin-left:9%;
  position: fixed;
}

  .siclose {
    padding: 5px !important;
    width: 60px !important;
  }

}
@media(max-width:800px) {
  .useoftrash {
  height:90vh;    
  width:95%;
  top: 0;
  position: fixed;
}
}


.useraccount {
  background-color: #252427;
  padding: 5px;
  border: 1px #1a1b23;
  border-radius: 10px;
}

.useraccount:hover {
  background-color:#323133;
  padding: 5px;
  border: 1px #1a1b23;
  border-radius: 10px;
}


.pfpimg {
  border: 1px transparent;
  border-radius: 19px;
}
.nameuser {
  color:white;
  font-size: 10px
}
.textuser {
  font-size:10px;
}

</style>









<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #1a1b23;
  padding: 0 10px;
}
.wrapper{
  background: #fff;
  max-width: 450px;
  width: 100%;

}

/* Login & Signup Form CSS Start */
.form{
  padding: 25px 30px;
}
.form header{
  font-size: 25px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #e6e6e6;
}
.form form{
  margin: 20px 0;
}
.form form .error-text{
  color: #721c24;
  padding: 8px 10px;
  text-align: center;
  border-radius: 5px;
  background: #f8d7da;
  border: 1px solid #f5c6cb;
  margin-bottom: 10px;
  display: none;
}
.form form .name-details{
  display: flex;
}
.form .name-details .field:first-child{
  margin-right: 10px;
}
.form .name-details .field:last-child{
  margin-left: 10px;
}
.form form .field{
  display: flex;
  margin-bottom: 10px;
  flex-direction: column;
  position: relative;
}
.form form .field label{
  margin-bottom: 2px;
}
.form form .input input{
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.form form .field input{
  outline: none;
}
.form form .image input{
  font-size: 17px;
}
.form form .button input{
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: #333;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
}
.form form .field i{
  position: absolute;
  right: 15px;
  top: 70%;
  color: #ccc;
  cursor: pointer;
  transform: translateY(-50%);
}
.form form .field i.active::before{
  color: #333;
  content: "\f070";
}
.form .link{
  text-align: center;
  margin: 10px 0;
  font-size: 17px;
}
.form .link a{
  color: #333;
}
.form .link a:hover{
  text-decoration: underline;
}


/* Users List CSS Start */
.users{
  padding: 25px 30px;
}
.users header,
.users-list a{
  display: flex;
  align-items: center;
  padding-bottom: 20px;
  border-bottom: 1px solid #e6e6e6;
  justify-content: space-between;
}
.wrapper img{
  object-fit: cover;
  border-radius: 50%;
}
.users header img{
  height: 50px;
  width: 50px;
}
:is(.users, .users-list) .content{
  display: flex;
  align-items: center;
}
:is(.users, .users-list) .content .details{
  color: #000;
  margin-left: 20px;
}
:is(.users, .users-list) .details span{
  font-size: 18px;
  font-weight: 500;
}
.users header .logout{
  display: block;
  background: #333;
  color: #fff;
  outline: none;
  border: none;
  padding: 7px 15px;
  text-decoration: none;
  border-radius: 5px;
  font-size: 17px;
}
.users .search{
  margin: 20px 0;
  display: flex;
  position: relative;
  align-items: center;
  justify-content: space-between;
}
.users .search .text{
  font-size: 18px;
}
.users .search input{
  position: absolute;
  height: 42px;
  width: calc(100% - 50px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s ease;
}
.users .search input.show{
  opacity: 1;
  pointer-events: auto;
}
.users .search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: #333;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}
.users .search button.active{
  background: #333;
  color: #fff;
}
.search button.active i::before{
  content: '\f00d';
}
.users-list{
  max-height: 350px;
  overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
  width: 0px;
}
.users-list a{
  padding-bottom: 10px;
  margin-bottom: 15px;
  padding-right: 15px;
  border-bottom-color: #f1f1f1;
}
.users-list a:last-child{
  margin-bottom: 0px;
  border-bottom: none;
}
.users-list a img{
  height: 40px;
  width: 40px;
}
.users-list a .details p{
  color: #67676a;
}
.users-list a .status-dot{
  font-size: 12px;
  color: #468669;
  padding-left: 10px;
}
.users-list a .status-dot.offline{
  color: #ccc;
}

/* Chat Area CSS Start */
.chat-area header{
  display: flex;
  align-items: center;
  padding: 18px 30px;
}
.chat-area header .back-icon{
  color: #333;
  font-size: 18px;
}
.chat-area header img{
  height: 45px;
  width: 45px;
  margin: 0 15px;
}
.chat-area header .details span{
  font-size: 17px;
  font-weight: 500;
}
.chat-box{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-box .chat{
  margin: 15px 0;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
}
.chat-box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-box .incoming img{
  height: 35px;
  width: 35px;
}
.chat-box .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: #fff;
  color: #333;
  border-radius: 18px 18px 18px 0;
}
.typing-area{
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
}
.typing-area input{
  height: 45px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  border: none;
  outline: none;
  background: #333;
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
}
.typing-area button.active{
  opacity: 1;
  pointer-events: auto;
}

/* Responive media query */
@media screen and (max-width: 450px) {
  .form, .users{
    padding: 20px;
  }
  .form header{
    text-align: center;
  }
  .form form .name-details{
    flex-direction: column;
  }
  .form .name-details .field:first-child{
    margin-right: 0px;
  }
  .form .name-details .field:last-child{
    margin-left: 0px;
  }

  .users header img{
    height: 45px;
    width: 45px;
  }
  .users header .logout{
    padding: 6px 10px;
    font-size: 16px;
  }
  :is(.users, .users-list) .content .details{
    margin-left: 15px;
  }

  .users-list a{
    padding-right: 10px;
  }

  .chat-area header{
    padding: 15px 20px;
  }
  .chat-box{
    min-height: 400px;
    padding: 10px 15px 15px 20px;
  }
  .chat-box .chat p{
    font-size: 15px;
  }
  .chat-box .outogoing .details{
    max-width: 230px;
  }
  .chat-box .incoming .details{
    max-width: 265px;
  }
  .incoming .details img{
    height: 30px;
    width: 30px;
  }
  .chat-area form{
    padding: 20px;
  }
  .chat-area form input{
    height: 40px;
    width: calc(100% - 48px);
  }
  .chat-area form button{
    width: 45px;
  }
}

</style>

</body>
</html>
