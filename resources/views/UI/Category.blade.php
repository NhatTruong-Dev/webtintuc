@extends('UI.index', ['categories' => $categories])
@section('content')
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="#">Nhật Trường</a>
                </div>
                <div class="col-4 text-center">
                    <span class="blog-header-logo text-dark" href="#">Tin tức</span>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mx-3">
                            <circle cx="10.5" cy="10.5" r="7.5"></circle>
                            <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="#">Đăng kí</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2" >
            <nav class="nav d-flex  danhmuc">
                @foreach($categories as $category)
                    <a class="p-2 text-muted" href="#" style="margin-right:30px">{!! $category->name !!}</a>
                @endforeach
            </nav>
        </div>

    <main role="main" class="container" style="margin-top:50px;">
        <div class="row" >
            <div class="col-md-8 blog-main" >
                <h1 style="border-bottom: 2px solid black;margin-bottom:40px;" >
                    Thể thao
                </h1>


                <div id="tintuc">
                    <img src="https://znews-photo.zadn.vn/w360/Uploaded/neg_etpyole/2022_01_07/vnd.JPG"
                        style="float: left;margin-right:20px;" height="190px" width="270px">
                    <div class="blog-post">
                        <h3 class="blog-post-title"><a href="#" style="color:black;">Tuyển nữ Việt Nam thua Nhật Bản 0-3 tại Asian Cup 2022</a></h3>
                        <p class="blog-post-meta">20:29 24/1/2022  </p>

                        <p>Các nữ tuyển thủ Việt Nam chơi nỗ lực nhưng không tránh khỏi thất bại trước nhà đương kim vô địch Nhật Bản tối 24/1.</p>
                        <hr>
                    </div><!-- /.blog-post -->
                </div>

                <div id="tintuc">
                <div class="blog-post">
                    <img src="https://znews-photo.zadn.vn/w360/Uploaded/yrfjpyvslyr/2022_01_25/lingard.jpg"
                        style="float: left;margin-right:20px;" height="190px" width="270px">
                        <h3 class="blog-post-title"><a href="#" style="color:black;">Newcastle sẵn sàng nâng mức giá mượn Lingard</a></h3>
                    <p class="blog-post-meta">25/1/2022 by <a href="#">Nhật Trường</a></p>

                    <p>Đội chủ sân St James' Park muốn tăng cường sức mạnh cho hàng công bằng cách mượn Jesse Lingard,
                        người đang thất sủng ở MU.</p>
                    <hr>
                </div>
                </div>

                <div id="tintuc">
                    <div class="blog-post">
                        <img src="https://znews-photo.zadn.vn/w360/Uploaded/natmzz/2022_01_23/zd.JPG"
                            style="float: left;margin-right:20px;" height="190px" width="270px">
                            <h3 class="blog-post-title"><a href="#" style="color:black;">Real Madrid thoát thua ở phút 90+2 </a></h3>
                    <p class="blog-post-meta">05:03 24/1/2022</p>

                    <p>Pha lập công của Eder Militao giúp Real hòa Elche 2-2 ở trận đấu thuộc vòng 22 La Liga đêm 23/1 (giờ Hà Nội).</p>
                    <hr>
                </div>
                </div>

                <div id="tintuc">
                    <div class="blog-post">
                        <img src="https://znews-photo.zadn.vn/w360/Uploaded/natmzz/2022_01_23/2022_01_23T160533Z_1226576065_UP1EI1N18P84L_RTRMADP_3_SOCCER_ENGLAND_CRY_LIV_REPORT.JPG"
                            style="float: left;margin-right:20px;" height="190px" width="270px">
                    <h3 class="blog-post-title"><a href="#" style="color:black;">Liverpool thắng Crystal Palace 3-1</a></h3>
                    <p class="blog-post-meta">20:47 23/1/2022</p>

                    <p>Thầy trò huấn luyện viên Klopp đánh bại chủ nhà Crystal Palace ở vòng 23 Premier League tối 23/1 (giờ Hà Nội).</p>
                    <hr>
                </div>
                </div>
                <div id="tintuc">
                    <div class="blog-post">
                        <img src="https://znews-photo.zadn.vn/w360/Uploaded/natmzz/2022_01_23/gettyimages_1237901088_594x594.jpg"
                            style="float: left;margin-right:20px;" height="190px" width="270px">
                    <h3 class="blog-post-title"><a href="#" style="color:black;">Haaland nối dài chuỗi phong độ thăng hoa</a></h3>
                    <p class="blog-post-meta">05:35 23/1/2022  </p>

                    <p>Tiền đạo người Na Uy ghi bàn mở tỷ số trong trận thắng 3-2 của Dortmund trước Hoffenheim ở vòng 20 Bundesliga đêm 22/1 (giờ Hà Nội).</p>
                    <hr>
                </div>
                </div>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Tin cũ</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Tin mới</a>
                </nav>

            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar" style="margin-top: 50px;">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Quảng cáo</h4>
                    <img src="https://img.lovepik.com/free-template/bg/20200819/bg/c7a25ed5a2ad3_405692.png_detail.jpg!wh650" width="90%" height="70%" style="margin-left:5%;margin-top: 20px;">
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Liên hệ</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">Zalo</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
            <a href="#">Lên đầu trang</a>
        </p>
    </footer>

