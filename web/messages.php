<?php
include('scripts/library.php');
session_start();
include('head.php');
include('navigation.php');
$userId = $_SESSION['userId'];
$content = $_GET['view'];
$conn = get_database_connection();
echo '<div class="view-btns">';
echo '<button type="button" class="btn btn-primary btn-unread" onclick="changeView(1)">Unread</button>';
echo '<button type="button" class="btn btn-secondary btn-read" onclick="changeView(2)">Read</button>';
echo '<button type="button" class="btn btn-success btn-sent" onclick="changeView(3)">Sent</button>';
echo '</div>';
if($content == 'unread'){

    echo '<h2 class="msg-type">Incoming Messages</h2>';

    $sql = <<<SQL
        select * from messages
        join users on message_sender = user_id
        where message_recipient = $userId
        and message_read = 0
        order by message_created desc
    SQL;
    
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        if($row['user_pfp'] != null){
            $pfp = $row['user_pfp'];
        }elseif ($row['user_pfp'] == null){
            $pfp = '../img/default-profile.jpg';
        }

        echo '<div class="post" id="user-post-' . $row['message_id'] . '">';
        echo '<img class="post-pfp" src="uploads/' . $pfp. ' ">';
        echo '<a class="user" href="profile.php?id=' . $row['user_id'] . '"><h5 class="user-posted">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
        echo '<h6 class="posted-date">' . date_format(date_create($row['message_created']), 'n/d/Y H:i A') . '<h6>';
        // if (isset($_SESSION['userId']) && $_SESSION['userId'] == $row['user_id']){
        //     echo '&nbsp&nbsp';
        //     echo '<button onclick="deletePost(' . $row['post_id'] . ', 1, 0)" class="delete-post">Delete post <i class="fas fa-trash"></i></button>';
        // }
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '<h6 class="post-caption">' . $row['message_message'] .  '</h6> ';
    
        echo '<button type="button" class="btn btn-success btn-reply" onclick="reply(' . $row['message_sender'] . ')">Reply</button>';
        echo '<button type="button" class="btn btn-primary btn-markread" onclick="markAsRead(' . $row['message_id'] . ')">Mark as read</button>';
        
        echo '</div>';
    }

}

if($content == 'read'){

    echo '<h2 class="msg-type">Read Messages</h2>';

    $sql = <<<SQL
        select * from messages
        join users on message_sender = user_id
        where message_recipient = $userId
        and message_read = 1
        order by message_created desc
    SQL;
    
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        if($row['user_pfp'] != null){
            $pfp = $row['user_pfp'];
        }elseif ($row['user_pfp'] == null){
            $pfp = '../img/default-profile.jpg';
        }

        echo '<div class="post" id="user-post-' . $row['message_id'] . '">';
        echo '<img class="post-pfp" src="uploads/' . $pfp. ' ">';
        echo '<a class="user" href="profile.php?id=' . $row['user_id'] . '"><h5 class="user-posted">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
        echo '<h6 class="posted-date">' . date_format(date_create($row['message_created']), 'n/d/Y H:i A') . '<h6>';
        // if (isset($_SESSION['userId']) && $_SESSION['userId'] == $row['user_id']){
        //     echo '&nbsp&nbsp';
        //     echo '<button onclick="deletePost(' . $row['post_id'] . ', 1, 0)" class="delete-post">Delete post <i class="fas fa-trash"></i></button>';
        // }
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '<h6 class="post-caption">' . $row['message_message'] .  '</h6> ';
    


        
        echo '</div>';
    }
}

?>