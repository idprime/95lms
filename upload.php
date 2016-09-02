<html>
  
   <body>
      <?php 
	     
		 $target_dir="uploads/";
		 $target_file=$target_dir.basename($_FILES["upload"]["name"]);
		 
		 
		 // Check if file already exists
               if (file_exists($target_file)) {
                    echo "Sorry, file already exists."; }
					
					
		 //	checking if a file is selected		
					if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
         // if everything is ok, try to upload file
             } else  
			 {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
             } else 
			 {
                    echo "Sorry, there was an error uploading your file.";
             }
             }
      ?>
	</body>
</html>	