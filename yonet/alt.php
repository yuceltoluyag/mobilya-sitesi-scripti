</div>
<!-- Javascripts-->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/pace.min.js"></script>
<script src="js/main.js"></script>
<script src="js/dropzone.js"></script>
<script type="text/javascript" src="../js/sweetalert.min.js"></script>
<!-- Include Editor style. -->
<script type="text/javascript" src="froala/js/froala_editor.min.js"></script>
<script type="text/javascript" src="froala/js/languages/tr.js"></script>
<script src="froala/js/plugins/align.min.js"></script>
<script src="froala/js/plugins/colors.min.js"></script>
<script src="froala/js/plugins/fullscreen.min.js"></script>
<script src="froala/js/plugins/image.min.js"></script>
<script src="froala/js/plugins/link.min.js"></script>
<script src="froala/js/plugins/lists.min.js"></script>
<script src="froala/js/plugins/table.min.js"></script>
<script src="froala/js/plugins/url.min.js"></script>
<script src="froala/js/plugins/video.min.js"></script>

<script>

    $(function () {
        $('textarea#yucel').froalaEditor({
            // Set the image upload URL.
            dragInline: true,
            imageUploadURL: 'upload.php',
            imageUploadParams: {
                id: 'yucel'
            },
            language: 'tr',
            toolbarBottom: false,
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'color', '|', 'align', 'formatOL', 'formatUL', 'insertLink', 'insertImage', 'insertVideo', 'insertTable']
        })
    });

</script>
</body>
</html>