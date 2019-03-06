<?php
require_once("DatabaseAccess.php");

//Reading posts from DB
function getPostsFromDb(){
    return getDbAccess()->executeQuery("SELECT * FROM Posts ORDER BY ID DESC;");
}

//Reading comments from DB
function getCommentsFromDb(){
    return getDbAccess()->executeQuery("SELECT * FROM Comments;");
}

//Reading users from DB
function getUserFromDb(){
    return getDbAccess()->executeQuery("SELECT * FROM Users;");
}

//Generating posts and comments
function generatePosts(){
    $html = "";
    

    $posts = getPostsFromDb();
    $comments = getCommentsFromDb();

    $i=0;

    foreach($posts as $post){
        $p_id = $post[0];
        $p_user = $post[1];
        $user_image = $post[2];
        $location = $post[3];
        $image = $post[4];
        $description = $post[5];
        $likes = $post[6];
        $bookmarks = $post[7];
        $tags = $post[8];
        $liked = $post[9];
        $bookmarked = $post[10];

        $doc = "";
        $recomended = "";

        $heartClass = $liked == '1' ? "images/icons/icon_srce_full.png" : "images/icons/icon_srce.png";
        $bookmarkClass = $bookmarked == '1' ? "images/icons/icon_save_full.png" : "images/icons/icon_save.png";
        
        foreach($comments as $comment){
            $c_id = $comment[0];
            $c_user = $comment[1];
            $text = $comment[2];
            $id_p = $comment[3];

            if($id_p == $p_id){
                $doc .= "<div class='comment'>
                            <a href='/'>$c_user</a>
                            <p>$text</p>
                        </div>";
            }
        }
        
        if($i==0){
            $recomended .="   <!-- Recomended -->
                        <article id='posts-recomended'>
                            <div class='container'>
                                <h2 class='recommendation-text'>Preporučujemo:</h2>
                                <div class='elements'>
                                    <div class='element'>
                                        <i class='fas fa-times delete-button'></i>
                                        <div class='profile'>
                                            <a href='/'><img src='images/profile/profile_jure.jpg' alt='Profil' class='profile-pic'/></a>
                                            <div class='name'>
                                                <a href='/'><h2>jurezec</h2></a>
                                                <p>Prate <a href='/'>ivanvidra</a> i još 10</p>
                                            </div>
                                        </div>
                                        <div class='follow'>
                                            <a>Prati</a>
                                        </div> 
                                    </div>
                                    <div class='element'>
                                        <i class='fas fa-times delete-button'></i>
                                        <div class='profile'>
                                            <a href='/'><img src='images/profile/profile_marta.jpg' alt='Profil' class='profile-pic'/></a>
                                            <div class='name'>
                                                <a href='/'><h2>martaroda</h2></a>
                                                <p>Prate <a href='/'>mirkoslavuj</a> i još 17</p>
                                            </div>
                                        </div>
                                        <div class='follow'>
                                            <a>Prati</a>
                                        </div> 
                                    </div>
                                    <div class='element'>
                                        <i class='fas fa-times delete-button'></i>
                                        <div class='profile'>
                                            <a href='/'><img src='images/profile/profile_marija.jpg' alt='Profil' class='profile-pic'/></a>
                                            <div class='name'>
                                                <a href='/'><h2>marijacuk</h2></a>
                                                <p>Prate <a href='/'>anamedo</a> i još 2</p>
                                            </div>
                                        </div>
                                        <div class='follow'>
                                            <a>Prati</a>
                                        </div> 
                                    </div>
                                </div>                          
                            </div>
                        </article>";
        }

        $html .= "<article class='user-post $p_id'>
                        <div class='container'>
                            <div class='post-user-info'>
                                <a href='/'><img src='$user_image' alt='Profil' class='profile-pic'/></a>
                                <div class='info'>
                                    <a href='/'><h2>$p_user</h2></a>
                                    <a href='/'><p>$location</p></a>
                                </div> 
                            </div>
                        </div>

                        <div class='post-user-image'>
                            <img src='$image' alt='Post'/>
                        </div>

                        <div class='container'>
                            <div class='post-image-buttons $p_id'>
                                <div class='first'>
                                    <img src='$heartClass' alt='Like' title='Like' class='image-button button-like'/>
                                    <img src='images/icons/icon_comment.png' alt='Comment' title='Comment' class='image-button button-comment'/>
                                    <img src='images/icons/icon_send.png' alt='Send' title='Send' class='image-button'/>
                                </div>
                                <img src='$bookmarkClass' alt='Save' title='Save' class='image-button button-save'/>
                            </div>

                            <div class='post-image-info'>
                                <h2 class='like-counter'>Sviđa mi se: <a href='/'>$likes</a></h2>
                                <a class='image-message-user' href='/'>$p_user</a>
                                <p class='image-message'>$description</p>
                                <a class='image-tags' href='/'>$tags</a>
                            </div>
                            <div class='post-comment-section'>
                                $doc
                            </div>

                            <div class='post-add-comment $p_id'>
                                <input type='text' placeholder='Komentiraj...' class='comment-text'>
                                <button type='submit' class='submit-comment'>Pošalji</button>
                            </div>
                        </div>
                    </article>
                    $recomended";

        $i++;
        $recomended = " ";
    }
    return $html;
}

//Generating user
function generateUser(){
    $html = "";
    
    $users = getUserFromDb();

    foreach($users as $user){
        $id = $user[0];
        $usernmae = $user[1];
        $likes = $user[2];
        $bookmarks = $user[3];

        $html .= "<div><p><strong>Pratim:</strong></p><p id='info-user-count'>113</p></div>
        <div><p><strong>Srca:</strong></p><p id='info-like-count'>$likes</p></div>
        <div><p><strong>Bilješke:</strong></p><p id='info-bookmark-count'>$bookmarks</p></div>";
    }

    return $html;
}

//Toggle new comment
function toggleNewComment($id, $user, $text){
    getDbAccess()->executeQuery("INSERT INTO
    Comments(User, Comment, ID_posts) VALUES 
    ('$user', '$text', (SELECT ID FROM Posts WHERE ID=$id));");
}

//Toggle new post
function toggleNewPost($user, $userimg, $location, $image, $description, $tags){
    $newTags = str_replace(".","#", $tags);

    getDbAccess()->executeQuery("INSERT INTO
    Posts(User, UserImg ,Location, Image, Description, Tags) VALUES 
    ('$user', '$userimg' ,'$location', '$image', '$description', '$newTags');"
    );

    return getDbAccess()->executeQuery("SELECT MAX(id) FROM Posts");
}

//Toggle like
function toggleLike($id, $liked){
    getDbAccess()->executeQuery("UPDATE Posts
    SET Liked=$liked, Likes=Likes+1
    WHERE ID=$id;"
    );
}

//Toggle dislike
function toggleDislike($id, $liked){
    getDbAccess()->executeQuery("UPDATE Posts
    SET Liked=$liked, Likes=Likes-1
    WHERE ID=$id;"
    );
}

//Toggle total like
function toggleTotalLike($user){
    getDbAccess()->executeQuery("UPDATE Users
    SET Likes=Likes+1
    WHERE User='$user';"
    );
}

//Toggle total dislike
function toggleTotalDislike($user){
    getDbAccess()->executeQuery("UPDATE Users
    SET Likes=Likes-1
    WHERE User='$user';"
    );
}

//Toggle bookmark up
function toggleBookmarkUp($id, $bookmarked){
    getDbAccess()->executeQuery("UPDATE Posts
    SET Bookmarked=$bookmarked, Bookmarks=Bookmarks+1
    WHERE ID=$id;"
    );
}

//Toggle bookmark down
function toggleBookmarkDown($id, $bookmarked){
    getDbAccess()->executeQuery("UPDATE Posts
    SET Bookmarked=$bookmarked, Bookmarks=Bookmarks-1
    WHERE ID=$id;"
    );
}

//Toggle total bookmark up
function toggleTotalBookmarkUp($user){
    getDbAccess()->executeQuery("UPDATE Users
    SET Bookmarks=Bookmarks+1
    WHERE User='$user';"
    );
}

//Toggle total bookmark down
function toggleTotalBookmarkDown($user){
    getDbAccess()->executeQuery("UPDATE Users
    SET Bookmarks=Bookmarks-1
    WHERE User='$user';"
    );
}




