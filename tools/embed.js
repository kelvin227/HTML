(function () {
    var snippetId = document.currentScript.getAttribute('data-snippet-id');
    var script = document.createElement('script');
    script.src = 'http://127.0.0.1/HTML/getSnippet.php/' + snippetId;
    document.head.appendChild(script);
})();
