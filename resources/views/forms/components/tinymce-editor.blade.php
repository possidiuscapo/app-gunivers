    <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
    <div>
        <textarea name="" id="editor" class="tinymce-editor" cols="30" rows="10"></textarea>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
