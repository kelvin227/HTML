<?php
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integration test</title>
    <link rel="stylesheet" href="../codemirror-5.65.17/lib/codemirror.css">
    <script src="../codemirror-5.65.17/lib/codemirror.js"></script>
    <script src="../codemirror-5.65.17/mode/javascript/javascript.js"></script>
    <script src="../js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <h1>Code Editor</h1>
<textarea id="myCodeEditor">
</textarea>
<iframe src="" frameborder="0" id="runner"></iframe>
<button id="run-btn" onclick="runCode()">Run</button>
</body>

<script src="script.js"></script>
<script>
    const editor = CodeMirror.fromTextArea(document.getElementById('myCodeEditor'), {
        mode: 'javascript',
        theme: 'default',
        lineNumbers: true,
        linewrapping: true,
        tabSize: 2,
    });
        editor.setValue('');
    
const iframe = document.getElementById('runner');
function runCode() {
  // Get the edited code from CodeMirror
const code = editor.getValue();

  // Create a new HTML document within the iframe
  const doc = iframe.contentDocument || iframe.contentWindow.document;
  doc.open();
  doc.write('<html><body>' + code + '</body></html>');
  doc.close();

  // Run the code within the iframe
  iframe.contentWindow.eval(code);
}

</script>
</html>