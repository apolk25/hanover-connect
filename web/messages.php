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
    
        echo '<button style="margin-left: 70%; margin-right: 5px;" type="button" id="btn-reply-' . $row['message_id'] . '" class="btn btn-success btn-reply" style="margin-left: 85%;" onclick="reply(' . $row['message_id'] . ')">Reply</button>';
        echo '<button type="button" id="markread" class="btn btn-primary btn-markread" onclick="markAsRead(' . $row['message_id'] . ')">Mark as read</button>';
        echo '<pre id="reply-field-' . $row['message_id'] . '">';
        echo '</pre>';
        echo '<button style="display:none; margin-top:10px;" class="btn btn-success" id="replysave-btn' . $row['message_id'] . '"onclick="sendReply(' . $row['message_sender'] . ')">Save</button>';
        echo '<button style="display:none; margin-top:10px;" class="btn btn-danger" id="replycancel-btn' . $row['message_id'] . '"onclick="cancelReply(' . $row['message_id'] . ')">Cancel</button>';
        echo '<pre id="reply-field">';
        echo '</pre>';
        // class="btn btn-danger" id="replycancel-btn" onclick="cancelReply()">Cancel</button>';

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
    
        echo '<button style="margin-left: 80%; margin-right: 5px;" type="button" id="btn-reply-' . $row['message_id'] . '" class="btn btn-success btn-reply" onclick="reply(' . $row['message_id'] . ')">Reply</button>';
        echo '<pre id="reply-field-' . $row['message_id'] . '">';
        echo '</pre>';
        echo '<button style="display:none; margin-top:10px;" class="btn btn-success" id="replysave-btn' . $row['message_id'] . '"onclick="sendReply(' . $row['message_sender'] . ')">Save</button>';
        echo '<button style="display:none; margin-top:10px;" class="btn btn-danger" id="replycancel-btn' . $row['message_id'] . '"onclick="cancelReply(' . $row['message_id'] . ')">Cancel</button>';

        
        echo '</div>';
    }
}

if($content == 'sent'){

    echo '<h2 class="msg-type">Sent Messages</h2>';

    $sql = <<<SQL
        select * from messages
        join users on message_recipient = user_id
        where message_sender = $userId
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
        echo '<a class="user" href="profile.php?id=' . $row['user_id'] . '"><h5 class="user-posted">To: ' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
        echo '<h6 class="posted-date">' . date_format(date_create($row['message_created']), 'n/d/Y H:i A') . '<h6>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '<h6 class="post-caption">' . $row['message_message'] .  '</h6> ';
    
        echo '<button style="margin-left: 80%; margin-right: 5px;" type="button" id="btn-reply-' . $row['message_id'] . '" class="btn btn-success btn-reply" onclick="reply(' . $row['message_id'] . ')">Message again</button>';
        echo '<pre id="reply-field-' . $row['message_id'] . '">';
        echo '</pre>';
        echo '<button style="display:none; margin-top:10px;" class="btn btn-success" id="replysave-btn' . $row['message_id'] . '"onclick="sendReply(' . $row['message_sender'] . ')">Save</button>';
        echo '<button style="display:none; margin-top:10px;" class="btn btn-danger" id="replycancel-btn' . $row['message_id'] . '"onclick="cancelReply(' . $row['message_id'] . ')">Cancel</button>';
        // echo '<pre id="reply-field">';
        // echo '</pre>';
        echo '</div>';
    }
}
?>