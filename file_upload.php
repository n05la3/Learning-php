<html>
    <head>
        <title>working with file uploads</title>
    </head>
    <body>
    
    <?php
    function process_image()
    {
        if(isset($_POST['photo_submit']) && isset($_FILES['upload_pic']))
        {
            if($_FILES['photo_submit'][error]===UPLOAD_ERR_OK)
            {
                if($_FILES['photo_submit'][size]!="image/jpeg")
                {
                    echo "There was an error uploading file";
                }
                else
                {
                    switch ($_FILES['photo_submit'][error])
                    {
                        case UPLOAD_ERR_FORM_SIZE:
                            $message="File size too large";
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $message="You must load a photo before you submit the form";  
                            break;
                        case UPLOAD_ERR_INI_SIZE:
                            $message="The photo has a size larger than the server allows";
                            break;
                        default:
                            $message="Contact your web administrator for help";
                            break;
                    }
                }
            }else
                echo "There was an error uploading file, load it and try again";
            
            
            
        }
    }
    function display_form()
    { ?>
        <div>
            <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <label for="user">Enter your name</label>
                <input type="text" name="user_name" id="user_name"/><br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000">
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



