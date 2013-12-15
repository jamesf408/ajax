<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Ajax</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script><br><script type="text/javascript">

    $(document).ready(function(){
        $("#register").on('submit', function(){
            var form = $(this);
            $.post(form.attr('action'), form.serialize(), function(data){
                if(data.status)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.error);
                }
            }, "json");
            return false;
        });
    });

</script>
</head>
<body>
<div id="wrapper">
    <form id="register" action="ajax_lecture_process.php" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"/>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password"/>
        <input type="submit" />
    </form>
</div>
</body>
</html>