<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
  </head>
  <body>
    <form action="path/to/server/script" method="post" id="my_form">
      <label>Name</label>
      <input type="text" name="name" />
      <label>Email</label>
      <input type="email" name="email" />
      <label>Website</label>
      <input type="url" name="website" />
      <input type="submit" name="submit" value="Submit Form" />
      <div id="server-results">
        <!-- For server results -->
      </div>
    </form>
    <script>
      ("#my_form").submit(function(event) {
          event.preventDefault(); //prevent default action 
          let post_url = $(this).attr("action"); //get form action url
          let request_method = $(this).attr("method"); //get form GET/POST method
          let form_data = $(this).serialize(); //Encode form elements for submission	
          ajax({
              url: post_url,
              type: request_method,
              data: form_data
            }).done(function(response) { //
           console.log();
            });
        });
    </script>
  </body>
</html>