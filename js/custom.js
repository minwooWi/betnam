// Call the dataTables jQuery plugin
$(document).ready(function() {
  let type;
  let crud;
  window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,
      function(str, key, value) {
        if(key === "type") type = value;
        if(key === "crud") crud = value;
      }
  );

  crud = (crud === 'c') ? "add.php" : "edit.php";

  if(type == 'golf'){
    document.getElementById("golf").style.display = 'block';
    $('#hotel').remove();
    $('#tour').remove();
    $('#vehicle').remove();
    $("#golf").wrap("<form action="+crud+" method='post' name='golf'></form>");

  }else if(type == 'hotel'){
    document.getElementById("hotel").style.display = 'block';
    $('#golf').remove();
    $('#tour').remove();
    $('#vehicle').remove();
    $("#hotel").wrap("<form action="+crud+" method='post' name='hotel'></form>");

  }else if(type == 'tour'){
    document.getElementById("tour").style.display = 'block';
    $('#hotel').remove();
    $('#golf').remove();
    $('#vehicle').remove();
    $("#tour").wrap("<form action="+crud+" method='post' name='tour'></form>");

  }else if(type == 'vehicle'){
    document.getElementById("vehicle").style.display = 'block';
    $('#hotel').remove();
    $('#tour').remove();
    $('#golf').remove();
    $("#vehicle").wrap("<form action="+crud+" method='post' name='vehicle'></form>");

  }else if(type == 'total'){

  }

  $("#savePdfBtn").click(function () {
    html2canvas(document.querySelector("#"+type+"")).then(canvas => {
      // base64 url 로 변환
      var imgData = canvas.toDataURL('image/jpeg');

      var imgWidth = 180; // 이미지 가로 길이(mm) A4 기준
      var pageHeight = imgWidth * 1.414; // 출력 페이지 세로 길이 계산 A4 기준
      var pageWidth = imgWidth;
      var imgHeight = canvas.height * imgWidth / canvas.width;
      var heightLeft = imgHeight;
      var margin = 20;

      var doc = new jsPDF('p', 'mm', 'a4');
      var position = 0;

      // 첫 페이지 출력
      doc.addImage(imgData, 'jpeg', margin, position, imgWidth, imgHeight);
      heightLeft -= pageHeight;

      // 다음 페이지 출력
      while (heightLeft >= 0) {
        position = heightLeft - imgHeight;
        doc.addPage();
        pageHeight = Math.min(canvas.height - heightLeft, imgHeight);
        doc.addImage(imgData, 'jpeg', margin, margin, pageWidth, pageHeight);
        heightLeft -= pageHeight;
      }

      // 파일 저장
      doc.save('sample.pdf');
    });
  });

});
