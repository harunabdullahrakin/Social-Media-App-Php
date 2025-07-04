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
<body style="grid-template-columns:auto 0fr !important;">
<nav id="sidebar" class="siclose">
    <ul class="sidebar">
      <li>
        
      </li>
      <li>
        <a href="/home">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-200q0-17 11.5-28.5T400-440h160q17 0 28.5 11.5T600-400v200h120v-360L480-740 240-560v360Zm-80 0v-360q0-19 8.5-36t23.5-28l240-180q21-16 48-16t48 16l240 180q15 11 23.5 28t8.5 36v360q0 33-23.5 56.5T720-120H560q-17 0-28.5-11.5T520-160v-200h-80v200q0 17-11.5 28.5T400-120H240q-33 0-56.5-23.5T160-200Zm320-270Z"/></svg>
          <span>Home</span>
        </a>
      </li>
      <li>
        <a href="#search" id="openPopup">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#657789" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <span>Search</span>
        </a>
      </li>
      <li>
        <a href="/shorts">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560q-17 0-28.5-11.5T520-640ZM120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160q-17 0-28.5-11.5T120-480Zm400 320v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560q-17 0-28.5-11.5T520-160Zm-400 0v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160q-17 0-28.5-11.5T120-160Zm80-360h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
          <span>Shorts</span>
        </a>
      </li>
      <li class="active">
        <a href="/chat">
        🗨
          <span>Messages</span>
        </a>
      </li>
      <li>
        <button onclick=toggleSubMenu(this) class="dropdown-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h207q16 0 30.5 6t25.5 17l57 57h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Zm400-160v40q0 17 11.5 28.5T600-320q17 0 28.5-11.5T640-360v-40h40q17 0 28.5-11.5T720-440q0-17-11.5-28.5T680-480h-40v-40q0-17-11.5-28.5T600-560q-17 0-28.5 11.5T560-520v40h-40q-17 0-28.5 11.5T480-440q0 17 11.5 28.5T520-400h40Z"/></svg>
          <span>Upload</span>
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-361q-8 0-15-2.5t-13-8.5L268-556q-11-11-11-28t11-28q11-11 28-11t28 11l156 156 156-156q11-11 28-11t28 11q11 11 11 28t-11 28L508-372q-6 6-13 8.5t-15 2.5Z"/></svg>
        </button>
        <ul class="sub-menu">
          <div>
            <li"><a href="../post-uploader.php">Post</a></li>
            <li><a href="../video_upload.php">Video</a></li>
            <li><a href="../Event-Upload.php">Event</a></li>
          </div>
        </ul>
      </li>

      <li>
        <a href="/profile">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
          <span>Profile</span>
        </a>
      </li>
    </ul>
  </nav>


    <div class="users useoftrash">

      <div class="search" >
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search..." class="show">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>

    </div>

    <script src="/assets/chat/chat.js"></script>
    <script src="/assets/chat/users.js"></script>


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



.users-list {
  max-height: 90% !important;
}
</style>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
:root{
  --base-clr: #27272a;
  --line-clr: #42434a;
  --hover-clr: #ffffff38;
  --blacktext: #1c1b1b;
  --whitetext: #ffffff;
  --background:#18181b;
  --accent-clr: #5e63ff;
  --secondary-text-clr: #b0b3c1;
}
*{
  margin: 0;
  padding: 0;
}
body, html {
  overflow: auto !important; /* or overflow-y: scroll; */
}
html{
  font-family: Poppins, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.5rem;
}


body{
  min-height: 100vh;
  min-height: 100dvh;
  background-color: var(--background) !important;
  color: var(--blacktext) ;
  display: grid;
  grid-template-columns: auto 1fr;
  padding:20px;
}
#sidebar{
  box-sizing: border-box;
  height: 100vh;
  
  width: 250px;
  padding: 95px 1.5em;
  border-right: 1px solid var(--line-clr);
  background-color: #27272a !important;
  position: fixed !important;
  top: 0;
  align-self: start;
  transition: 300ms ease-in-out;
  overflow: hidden;
  text-wrap: nowrap;
}
#sidebar.close{
  padding: 5px;
  width: 60px;
}
#sidebar ul{
  list-style: none;
}
#sidebar > ul > li:first-child{
  display: flex;
  justify-content: center;
  margin-bottom: 16px;
  .logo{
    font-weight: 600;
  }
}
#sidebar ul li.active a{
  
  background-color: #ffffff;
  color: #000000;

  svg{
    fill: black;
  }
}

#sidebar a, #sidebar .dropdown-btn, #sidebar .logo{
  border-radius: .5em;
  padding: .85em;
  margin: 3px;
  text-decoration: none;
  color: var(--whitetext);
  display: flex;
  align-items: center;
  gap: 1.25em;
}
.dropdown-btn{
  width: 100%;
  text-align: left;
  background: none;
  border: none;
  font: inherit;
  cursor: pointer;
}
#sidebar svg{
  flex-shrink: 0;
  fill: var(--whitetext);
}
#sidebar a span, #sidebar .dropdown-btn span{
  flex-grow: 1;
}
#sidebar a:hover, #sidebar .dropdown-btn:hover{
  background-color: var(--hover-clr);
  color:color: #ffffff;
  svg {
    fill: #ffffff;
  }
  
}
#sidebar .sub-menu{
  display: grid;
  grid-template-rows: 0fr;
  transition: 300ms ease-in-out;

  > div{
    overflow: hidden;
  }
}
#sidebar .sub-menu.show{
  grid-template-rows: 1fr;
}
.dropdown-btn svg{
  transition: 200ms ease;
}
.rotate svg:last-child{
  rotate: 180deg;
}
#sidebar .sub-menu a{
  padding-left: 2em;
}
#toggle-btn{
  margin-left: auto;
  padding: 1em;
  border: none;
  border-radius: .5em;
  background: none;
  cursor: pointer;

  svg{
    transition: rotate 150ms ease;
  }
}
#toggle-btn:hover{
  background-color: var(--hover-clr);
}

main{
  padding: min(30px, 7%);
}
main p{
  color: var(--secondary-text-clr);
  margin-top: 5px;
  margin-bottom: 15px;
}
.container{

  margin-bottom: 20px;
  padding: min(0em, 15%);

  h2, p { margin-top: 1em }
}

@media(max-width: 800px){
  body{
    grid-template-columns: 1fr;
  }
  main{
    padding: 2em 1em 60px 1em;
  }
  .container{
    border: none;
    padding: 0;
  }
  #sidebar{
    height: 60px;
    width: 100%;
    border: 1px solid var(--line-clr);
    border-radius: 12px;
    padding: 0px;
    position: fixed;
    top: unset;
    bottom: 0;
    display: flex;
    align-items: baseline;
    justify-content: space-evenly;

    > ul{
      padding: 0;
      display: grid;
      grid-auto-columns: 60px;
      grid-auto-flow: column;
      align-items: center;
      overflow-x: scroll;
    }
    ul li{
      height: 100%;
    }
    ul a, ul .dropdown-btn{
      width: 60px;
      
      height: 60px;
      padding: 0;
      border-radius: 20px;
      justify-content: center;
    }

    ul li span, ul li:first-child, .dropdown-btn svg:last-child{
      display: none;
    }

    ul li .sub-menu.show{
      position: fixed;
      bottom: 60px;
      left: 0;
      box-sizing: border-box;
      height: 60px;
      width: 100%;
      background-color: var(--hover-clr);
      border-top: 1px solid var(--line-clr);
      display: flex;
      justify-content: center;

      > div{
        overflow-x: auto;
      }
      li{
        display: inline-flex;
      }
      a{
        box-sizing: border-box;
        padding: 1em;
        width: auto;
        justify-content: center;
      }
    }
  }
}

.card {
  position:unset !important;
}
  </style>

</body>
</html>