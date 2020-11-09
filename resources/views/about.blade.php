@extends('master')
@section('content')
<style>
  .team-member {
    margin-bottom: 3rem;
    text-align: center;
}
.team-member img {
    width: 14rem;
    height: 14rem;
    border: 0.5rem solid rgba(0, 0, 0, 0.1);
}
.team-member h4 {
    margin-top: 1.5rem;
    margin-bottom: 0;
}
</style>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>About Me</h1>
            <span class="subheading">NHIỆM VỤ TRỌNG TÂM:</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>1. Tăng cường công tác giáo dục chính trị tư tưởng, pháp luật, truyền thống, đạo đức lối sống cho ĐVTN gắn với việc học tập và làm theo tư tưởng, đạo đức, phong cách Hồ Chí Minh, gắn với việc đẩy mạnh xây dựng các giá trị mẫu hình thanh niên thành phố, xây dựng phong cách cán bộ Đoàn.</p>
        <p>2. Đổi mới phương thức tuyên truyền, giáo dục của Đoàn. Đầu tư chất lượng, số lượng các sản phẩm tuyên truyền, các hình thức khảo sát, đánh giá chất lượng hoạt động Đoàn. Chú trọng giáo dục truyền thống, lịch sử; các hoạt động thi dua.</p>
        <p>3. Đầu tư các hoạt động hỗ trợ học tập, hướng nghiệp, giáo dục kỹ năng cho ĐVTN học sinh, các hoạt động phát huy chuyên môn cho ĐVTN giáo viên; tham gia hiệu quả cuộc vận động “Nhà giáo trẻ tiêu biểu”; tiếp tục thực hiện tốt chủ đề năm 2020 “Tuổi trẻ Thành phố Hồ Chí Minh tự hào tiến bước dưới cờ Đảng”. Vận động ĐVTN tích cực tham gia phong trào ý tưởng sáng tạo, chương trình “Tri thức trẻ vì giáo dục”.</p>
        <p>4. Nâng cao chất lượng đoàn viên, cán bộ Đoàn, chi đoàn. Đẩy mạnh bồi dưỡng, giới thiệu đoàn viên ưu tú xem xét kết nạp Đảng. Nâng chất công trình thanh niên năm học.</p>
        <p>5. Tiếp tục triển khai hiệu quả phong trào “Học sinh 3 rèn luyện”, phong trào “3 trách nhiệm”, làm nòng cốt cùng với Hội Sinh viên thực hiện tốt phong trào “Sinh viên 5 tốt”; chú trọng tổ chức các hoạt động thúc đẩy tinh thần sáng tạo của đoàn viên, thanh niên trường học trong học tập, nghiên cứu khoa học, các hoạt động tình nguyện, các hoạt động tư vấn, hướng nghiệp cho học sinh, hỗ trợ sinh viên khởi nghiệp, lập nghiệp.</p>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p> -->
      </div>
    </div>
  </div>
  <section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center m-5 pt-1">
            <h2 class="section-heading text-uppercase">BAN CHẤP HÀNH ĐOÀN TRƯỜNG</h2>
            <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('/img/1604773158.jpg')}}" alt="">
                    <h4>Lưu Anh Kiệt</h4>
                    <p class="text-muted">Phó Bí thư Đoàn trường</p>
                    <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.facebook.com/anhkiet123/">
                        <i class="fab fa-facebook-f"></i> 
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('/img/1604773172.jpg')}}" alt="">
                    <h4> Nguyễn Trần Thiện Đức</h4>
                    <p class="text-muted">Bí thư Đoàn trường</p>
                    
                    <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.facebook.com/thienduc.kutine">
                        <i class="fab fa-facebook-f"></i> 
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('/img/ncs.jpg')}}" alt="">
                    <h4>Ngô Cuốn Sáng</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.facebook.com/numberzero.mitc">
                        <i class="fab fa-facebook-f"></i> 
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</section>


@endsection
