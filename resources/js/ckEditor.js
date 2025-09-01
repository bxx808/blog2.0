import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Font,
    SourceEditing,
    ImageBlock,
    ImageCaption,
    ImageInline,
    ImageInsert,
    ImageInsertViaUrl,
    ImageResize,
    ImageStyle,
    ImageTextAlternative,
    ImageToolbar,
    ImageUpload,
    Table,
    TableCellProperties,
    TableProperties,
    TableToolbar,
    TextTransformation
} from 'ckeditor5';

ClassicEditor
    .create(document.querySelector('#editor'), {
        licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NTc5ODA3OTksImp0aSI6IjRkMjhmNWVkLTUxNTAtNDBhNC1iZTBkLTIwYmE4MGVhNDA1NSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6IjNkZWE1NzQ3In0.jEXDAqV6McVcmLvPnYWLPTE9TytjPAV1nwgQF_DFHbIYgpf0WA5-YjVz7TDkW7TwSr_qXCvWNd7LiMryzWTs-A', // Or 'GPL'.
        plugins: [
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            SourceEditing,
            ImageBlock,
            ImageCaption,
            ImageInline,
            ImageInsert,
            ImageInsertViaUrl,
            ImageResize,
            ImageStyle,
            ImageTextAlternative,
            ImageToolbar,
            ImageUpload,
            Table,
            TableCellProperties,
            TableProperties,
            TableToolbar,
            TextTransformation
        ],
        toolbar: [
            'undo', 'redo', '|', 'bold', 'italic', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'sourceEditing', 'insertImageViaUrl', 'insertTable'
        ]
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(error => {
        console.error(error);
    });
