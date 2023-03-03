// Call the dataTables jQuery plugin
$(document).ready(function() {
  let type;
  let crudUrl;
  let crudType;
  window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,
      function(str, key, value) {
        if(key === "type") type = value;
        if(key === "crud") crudUrl = value;
        if(key === "crud") crudType = value;
      }
  );

  crudUrl = (crudUrl === 'c') ? "add.php" : "edit.php";

  if(type == 'golf'){
    document.getElementById("golf").style.display = 'block';
    $('#hotel').remove();
    $('#tour').remove();
    $('#vehicle').remove();
    $("#golf").wrap("<form action="+crudUrl+" method='post' name='golf'></form>");

    if(crudType === "c"){
      $('#insertInput').attr('name','golfSubmit');
      $('#insertInput').val('골프예약정보등록');
    }else{
      $('#updateInput').attr('name','golfUpdate');
      $('#updateInput').val('골프예약정보수정');
    }

  }else if(type == 'hotel'){
    document.getElementById("hotel").style.display = 'block';
    $('#golf').remove();
    $('#tour').remove();
    $('#vehicle').remove();
    $("#hotel").wrap("<form action="+crudUrl+" method='post' name='hotel'></form>");

    if(crudType === "c"){
      $('#insertInput').attr('name','hotelSubmit');
      $('#insertInput').val('호텔예약정보등록');
    }else{
      $('#updateInput').attr('name','hotelUpdate');
      $('#updateInput').val('호텔예약정보수정');
    }
  }else if(type == 'tour'){
    document.getElementById("tour").style.display = 'block';
    $('#hotel').remove();
    $('#golf').remove();
    $('#vehicle').remove();
    $("#tour").wrap("<form action="+crudUrl+" method='post' name='tour'></form>");

    if(crudType === "c"){
      $('#insertInput').attr('name','tourSubmit');
      $('#insertInput').val('투어예약정보등록');
    }else{
      $('#updateInput').attr('name','tourUpdate');
      $('#updateInput').val('투어예약정보수정');
    }
  }else if(type == 'total'){

  }

//PDF 파일 다운로드
$("#savePdfBtn").click(function () {
  html2canvas(document.querySelector("#"+type+"")).then(canvas => {
    // base64 url 로 변환
    var imgData = canvas.toDataURL('image/jpeg');

    var imgWidth = 210; // 이미지 가로 길이(mm) A4 기준
    var pageHeight = 297; // 출력 페이지 세로 길이(mm) A4 기준
    var pageWidth = imgWidth;
    var imgHeight = canvas.height * imgWidth / canvas.width;
    var heightLeft = imgHeight;
    var margin = 0;

    var doc = new jsPDF('p', 'mm', 'a4');
    var position = 0;

    // 첫 페이지 출력
    doc.addImage(imgData, 'jpeg', margin, position, imgWidth, imgHeight);


    // 파일 저장
    if(type == 'golf'){
      doc.save('golf.pdf');
    }else if(type == 'hotel'){
      doc.save('hotel.pdf');
    }else{
      doc.save('tour.pdf');
    }
  });
});



});
