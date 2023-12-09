<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .button {
          border: none;
          color: white;
          padding: 10px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 15px;
          margin-left: 80% ;   
          cursor: pointer;
        }
        
        .button1 {
            background-color: #008CBA;
        }
        .button2 {background-color: #04AA6D;} 
        </style>
        <style>
            table {
              font-family: 'Times New Roman', Times, serif;
              border-collapse: collapse;
              width: 100%;
            }
            
            tr, td, th {
              border: 2px solid rgb(176, 176, 176);
              vertical-align: top;
              text-align:left;
              padding: 8px;
            }
            
            /* tr:nth-child(even) {
              background-color: #dddddd;
            } */
            </style>
    <title>HỆ THỐNG QUẢN LÝ</title>
</head>
<body>
    <table style="width:100%">
    <tr>
        <th colspan="2">
            <i class="fa fa-book"> BÀI VIẾT - Thêm </i> 
            <button class="button button1" type="btn btn-sml" > DANH SÁCH BÀI VIẾT </button>
        </th>
    </tr>
    <tr>
        <td colspan="2">
            <i class="fa fa-home"> Bảng điều khiển / Bài viết / Thêm </i>
        </td>
    </tr>
    <tr rowspan="2">
        <td style="width:65%">
            <form action="" method="">
                <div>
                <label for="title"> <b>Tiêu đề</b> </label>
                {{-- &nbsp; --}}
                <input type="text" id="title" style="width:90%" placeholder="Nhập tiêu đề" required/>
                <br/><br/>
 
                <label for="url"> <b>Liên kết tĩnh</b> </label>
                <input type="text" id="url" style="width: 90%" placeholder="Nhập liên kết tĩnh" required/>

                <br/><br/>

                <label for="image"> <b>Hình ảnh</b> </label>
                <input type="file" id="image" accept="image/png, image/jpeg" required/>

                <br/><br/>

                <label for="descriptions"> <b>Mô tả ngắn</b> </label>
                <textarea type="text" id="descriptions" rows="5" cols="150" placeholder="Nhập mô tả ngắn"></textarea>
                </div>
                <br/><br/>
            
            
            
            
                <div>
                    <label for="content" > <b>Nội dung chi tiết</b> </label>
                    <textarea type="text" id="content" rows="35" cols="170" required></textarea>
                </div>       
        </td>
            <td>
                <div>
                    <label for="categories"><b>Danh mục</b></label><br>
                    <select id="categories" style="width: 100%" required>
                        <option value="ABC"> ABC </option>
                        <option value="DEF"> DEF </option>
                        <option value="GHJ"> GHJ </option>
                    </select>
                </div>
                <br/>
                <div>
                    <label for="tags"> <b>Tags</b> </label><br>
                    <input type="text" id="tags" style="width: 100%" placeholder="Nhập tags"/>
                    <br/><br/>
                    <label for="author"> <b>Tác giả</b> </label><br>
                    <input type="text" id="author" style="width: 100%" placeholder="Nhập tác giả"/>
                    <br/><br/>
                    <label for="source"> <b>Nguồn tin</b> </label><br>
                    <input type="text" id="source" style="width: 100%" placeholder="Nhập nguồn tin"/>
                    <br/><br/>
                    <label for="hot"> <b>Nổi bật</b> </label>
                    <input type="checkbox" id="hot"/>
                    <br/><br/>
                    <label for="status"> <b>Trạng thái</b> </label>
                    <label style="color: green"><input type="radio" name="status" size="30"/> Hoạt động</label>
                    <label style="color: red"><input type="radio" name="status" size="30"/> Tạm ngưng</label>
                </div>
                <br/><br/>
                <div>
                    <button type="reset" style="padding: 5px 10px;color: white; background-color: black"> HỦY BỎ </button>
                    <button type="submit" style="padding: 5px 10px;color: white; background-color: #008CBA"> THÊM BÀI VIẾT</button>
                </div>
            </td>
        </form>
    </tr>
    </table>
</body>
</html>