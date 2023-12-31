<html>
<head>
<title>Load Data Dynamically on Page Scroll using jQuery AJAX and PHP</title>
<style>
body {
font-family: Arial;
}
.question {
    font-weight: bold;
    background-color: #FFF;
    padding: 7px 0px 0px 15px;
}

.answer {
    font-style: italic;
    background-color: #FFF;
    padding: 0px 0px 7px 15px;
}

#faq-result {
    margin: -10px auto 0px;
    width: 50%;
    line-height: 30px;
    border-radius: 5px;
    min-height: 300px;
}

#loader-icon {
    text-align: center;
    display: none;
}
</style>
<script type="text/javascript"
    src="https://code.jquery.com/jquery-1.2.6.pack.js"></script>
<script>
$(document).ready(function() {
    function getresult(url) {
        $.ajax({
            url: url,
            type: "GET",
            beforeSend: function() {
                $('#loader-icon').show();
            },
            complete: function() {
                $('#loader-icon').hide();
            },
            success: function(data) {
                $("#faq-result").append(data);
            },
            error: function() { }
        });
    }
    $(window).scroll(function() {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
          if ($(".pagenum:last").val() <= $(".total-page").val()) {
                var pagenum = parseInt($(".pagenum:last").val()) + 1;
                getresult('getresult.php?page=' + pagenum);

            }
        }
    });
});
</script>
</head>
<body>
    <div id="faq-result">
<?php include('getresult.php'); ?>
</div>
    <div id="loader-icon">
        <img src="LoaderIcon.gif" />
    </div>

</body>
</html>
