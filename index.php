<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>μGram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styles/stop-browser-stuff.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="shortcut icon" href="images/fav/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/fav/favicon.ico" type="image/x-icon">

    <template id="user-post">
        <article class="user-post">
            <div class="container">
                <div class="post-user-info">
                    <a href="/"><img src="" alt="Profil" class="profile-pic"/></a>
                    <div class="info">
                        <a href="/"><h2></h2></a>
                        <a href="/"><p></p></a>
                    </div> 
                </div>
            </div>

            <div class="post-user-image">
                <img src="" alt="Post"/>
            </div>

            <div class="container">
                <div class="post-image-buttons">
                    <div class="first">
                        <img src="images/icons/icon_srce.png" alt="Like" title="Like" class="image-button button-like"/>
                        <img src="images/icons/icon_comment.png" alt="Comment" title="Comment" class="image-button button-comment"/>
                        <img src="images/icons/icon_send.png" alt="Send" title="Send" class="image-button"/>
                    </div>
                    <img src="images/icons/icon_save.png" alt="Save" title="Save" class="image-button button-save"/>
                </div>

                <div class="post-image-info">
                    <h2 class="like-counter">Sviđa mi se: <a href="/">0</a></h2>
                    <a class="image-message-user" href="/"></a>
                    <p class="image-message"></p>
                    <a class="image-tags" href="/"></a>
                </div>

                <div class="post-comment-section">
                    <div class="comment">
                        <a href="/"></a>
                        <p></p>
                    </div>
                </div>

                <div class="post-add-comment">
                    <input type="text" placeholder="Komentiraj..." class="comment-text">
                    <button type="submit" class="submit-comment">Pošalji</button>
                </div>
            </div>
        </article>
      </template>

      <script language="JavaScript"> document.addEventListener("contextmenu", function(e){ e.preventDefault(); }, false); </script>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="title">
                <a href="/"><img src="images/logo/logo.png" alt="μGram" class="image-logo"/></a>
                <a href="/"><h2 class="title-logo">μGram</h2></a>
            </div>
                
            <div class="search">
                <input type="text" id="search-box" placeholder="Pretraži"/>
                <button type="submit" id="search-submit"><i class="fas fa-search"></i></button>
            </div>

            <div class="menu">
                <a href="/"><img src="images/icons/icon_kompas.png" alt="Istraži" title="Istraži" class="menu-icon"/></a>
                <a><img src="images/icons/icon_srce.png" alt="Obavijesti" title="Obavijesti" id="menu-heart-icon" class="menu-icon heart"/></a>
                <a><img src="images/icons/icon_profil.png" alt="Profil" title="Profil" id="menu-profile-icon" class="menu-icon"/></a>
            </div>
        </div>
    </header>


    <section id="greeting">
            <div class="greeting-container">
                <div class="message">
                    <h2>Pozdrav, Šime!</h2>
                    <h3>Vani je ugodnih 16°C</h3>
            </div>
                
            <img src="images/greeting/image_1.png" alt="Vrijeme"/>
        </div>
    </section>


    <main>
        <div id="main-container">
            <div id="posts">
                <div class="posts-container">

                    <article class="add-post-button">
                        <a href="#"><div class="container">
                            <i class="fas fa-plus"></i>
                           <h2>Objavi nešto</h2>
                        </div></a>
                    </article>
                    <!-- Posts -->
                    <?php 
                        require_once("php/cards.php");
                        echo(generatePosts());
                    ?>
                </div>
            </div>
                
            <div id="sidebar">
                <div class="container">
                        <article id="profile">
                            <a href="/"><img src="images/profile/profile_sime.jpg" alt="Profil" class="profile-pic"/></a>
                            <div class="info">
                                <a href="/"><h2>simecuk</h2></a>
                                <p>Šime Ćuk</p>
                            </div>   
                        </article>
                        <article class="about">
                            <div class="about-container">
                                <h3>O meni</h3>
                                <p>There’s miles of land in front of us and we’re dying with every step we take. We’re dying with every breath we make and I’ll fall in line.</p>
                                <div class="about-info">
                                    <?php 
                                        require_once("php/cards.php");
                                        echo(generateUser());
                                    ?>
                                </div>

                                
                            </div>
                        </article>
                        <article id="recomended">
                            <div class="recomended-container">
                                <h2 class="recommendation-text">Preporučujemo:</h2>
                                <div class="recomended-element">
                                    <div class="profile">
                                        <a href="/"><img src="images/profile/profile_jure.jpg" alt="Profil" class="profile-pic"/></a>
                                        <div class="name">
                                            <a href="/"><h2>jurezec</h2></a>
                                            <p>Prate <a href="/">ivanvidra</a> i još 10</p>
                                        </div>
                                    </div>
                                    <div class="follow">
                                        <a>Prati</a>
                                    </div> 
                                </div>
                                <div class="recomended-element">
                                    <div class="profile">
                                        <a href="/"><img src="images/profile/profile_marta.jpg" alt="Profil" class="profile-pic"/></a>
                                        <div class="name">
                                            <a href="/"><h2>martaroda</h2></a>
                                            <p>Prate <a href="/">mirkoslavuj</a> i još 17</p>
                                        </div>
                                    </div>
                                    <div class="follow">
                                        <a>Prati</a>
                                    </div>         
                                </div>
                                <div class="recomended-element">
                                    <div class="profile">
                                        <a href="/"><img src="images/profile/profile_marija.jpg" alt="Profil" class="profile-pic"/></a>
                                        <div class="name">
                                            <a href="/"><h2>marijacuk</h2></a>
                                            <p>Prate <a href="/">anamedo</a> i još 2</p>
                                        </div>
                                    </div>
                                    <div class="follow">
                                        <a>Prati</a>
                                    </div> 
                                </div>
                            </div>
                        </article>
                </div>
            </div>          
        </div>
    </main>

    <footer>
        <div class="container">
            <p class="links"><a href="/">O nama</a><a href="/">Podrška</a><a href="/">Privatnost</a><a href="/">Uvjeti</a><a href="/">Znakovi #</a></p>
            <p class="copyright">© 2018 μGRAM</p>
        </div>
    </footer>
    <script src="scripts/post-buttons.js"></script>
</body>
</html>
