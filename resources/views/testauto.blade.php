
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Gợi ý từ khóa tìm kiếm với Autocomplete jQuery kết hợp PHP</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function() 
{   
    //sử dụng autocomplete với input có id = key
    $( "input#key" ).autocomplete({
        source:'auto', //link xử lý dữ liệu tìm kiếm
    })
});
</script>
<h1>Gợi ý từ khóa tìm kiếm với Autocomplete jQuery kết hợp PHP</h1>
                <input type="text" name="key" id="key" style="width:400px" placeholder="Tìm kiếm tỉnh thành Việt Nam..." />

</body>
</html>