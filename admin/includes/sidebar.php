
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/sidebar.css">


</head>

<body  class='snippet-body'>

    <body id="body-pd">
        <header class="header" id="header">
            
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a href="index" class="nav_logo"> 
                        <i class='bx bx-layer nav_logo-icon'></i> 
                        <span class="nav_logo-name">Enjed</span> 
                    </a>
                    <div class="nav_list"> 
                        <a href="productos" class="nav_link"> 
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Producos</span> 
                        </a> 
                        <a href="administradores" class="nav_link"> 
                            <i class=' bx bx-user-plus nav_icon'></i>
                            <span class="nav_name">Administradores</span> 
                        </a> 
                        <a href="#" class="nav_link"> 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Usuarios</span> 
                        </a> 
                        <a href="categoria" class="nav_link"> 
                            <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Categorias</span>
                        </a> 
                        <a href="#" class="nav_link"> 
                            <i class='bx bx-bookmark nav_icon'></i>
                            <span class="nav_name">Bookmark</span> 
                        </a> 
                        <a href="#" class="nav_link"> 
                            <i class='bx bx-folder nav_icon'></i> 
                            <span class="nav_name">Files</span> 
                        </a> <a href="#" class="nav_link"> 
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                            <span class="nav_name">Stats</span> 
                        </a>
                    </div>
                </div> <a href="../php/logout" class="nav_link"> 
                    <i class='bx bx-log-out nav_icon'></i> 
                    <span class="nav_name">Salir</span> </a>
            </nav>

        </div>
        <!-- Container Main start
        <div class="height-100 bg-light">
            <h4>pagina principal</h4>
        </div> -->
        <!--Container Main end-->
        <script type='text/javascript'
            src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>

        <script type='text/Javascript'>document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});</script>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
