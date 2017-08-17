<html>
    <head>
        <title>working with file uploads</title>
    </head>
    <body>
    
    <?php
    function display_form()
    { ?>
        <div>
            <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <label for="user">Enter your name</label>
                <input type="text" name="user_name" id="user_name"/><br/>
                <label for="my_pic">Select file to upload</label>
                <input type="file" id="my_pic" value="" name="upload_pic"/><br/>
                <label for="send"></label>
                <input type="submit" value="Send photo" id="send" name="photo_submit"/>
            </form>
        </div>
    <?php
    } ?>
        
        
    </body>
</html>



