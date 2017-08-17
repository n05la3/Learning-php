<html>
    <head>
        <title>working with file uploads</title>
    </head>
    <body>
    
    <?php
    if(isset($_POST['photo_submit']))
        process_image();
    else
        display_form();
    
    //image processing script
    function process_image()
    {
        if(isset($_FILES['upload_pic']))
        {
            if($_FILES['upload_pic']['error']===UPLOAD_ERR_OK)//testing for successful upload
            {
                if($_FILES['upload_pic']['type']!="image/jpeg")
                {
                    echo "Photos only, Thanks!";
                }
                elseif(!move_uploaded_file($_FILES['upload_pic']['tmp_name'], "./".basename($_FILES['upload_pic']['name'])))
                {
                    echo "Unable to upload the file, load and try again!";
                    
                }
                else
                    echo display_thanks();
            }else//checking for errors.
            {
                switch ($_FILES['upload_pic']['error'])
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
                echo $message;
            }
        
    }
    
    function display_form()
    { ?>
        <div>
            <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <label for="user">Enter your name</label>
                <input type="text" name="user_name" id="user_name"/><br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000000">
                <label for="my_pic">Select file to upload</label>
                <input type="file" id="my_pic" value="" name="upload_pic"/><br/>
                <label for="send"></label>
                <input type="submit" value="Send photo" id="send" name="photo_submit"/>
            </form>
        </div>
    <?php
    } 
   
    function display_thanks()
    { 
        echo "<h2>Your image was successfully received</h2><br/><h3>Here is the image you submited</h3>"; ?>
        <img src="./ <?php echo $_FILES['upload_pic'][name] ?> " alt="photo">
    <?php
    
    
    }
    
    ?>
        
        
        
    </body>
</html>



