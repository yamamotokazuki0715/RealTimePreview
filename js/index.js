var editor;

const mimeList = {
  PHP: "application/x-httpd-php",
  Ruby: "text/x-ruby",
  Python: "text/x-python",
  C: "text/x-csrc",
}

$(document).ready(function () {
  editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "application/x-httpd-php",
    indentUnit: 2,
    indentWithTabs: true,
    theme: "darcula",
  });

  editor.focus();
});


$("#run").on("click", function () {
  editor.save();
  var allCode = $("#code").val();

  var fd = new FormData();

  for(var code of allCode){
    fd.append("code[]", code);
  }

  $.ajax({
    url: "run.php",
    type: "POST",
    data: fd,
    processData : false,
    contentType : false,
    timespan: 1500,
    // xhr: function () {},
    // beforeSend: function () {},
    success: function () {
      $("#display").attr("src", "view/view.php");
    },
    error: function (err) {
      console.error(err);
    }
  });
});


$("#themeList").on("change", function () {
  const theme = $("#themeList").val();

  editor.setOption("theme", theme);
});


$("#langList").on("change", function () {
  const lang = $("#langList").val();

  editor.setOption("mode", mimeList[lang]);

  // 見出しに書いてある言語の表示も変更する
  $("#currentLang").html(lang);
});
