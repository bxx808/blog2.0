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
    TextTransformation,
    SimpleUploadAdapter
} from 'ckeditor5';

ClassicEditor
    .create(document.querySelector('#editor'), {
        licenseKey: 'GPL', // Or 'GPL'.
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
            TextTransformation,
            SimpleUploadAdapter
        ],
        toolbar: [
            'undo', 'redo', '|', 'bold', 'italic', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'sourceEditing', 'insertImageViaUrl', 'insertTable', 'imageUpload',
        ],
        simpleUpload: {
            uploadUrl: '/admin/ckeditor/upload',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    })
    .then(editor => {
        editor.plugins.get('FileRepository').on('change:uploaded', (evt, data) => {
            console.log('File uploaded:', data);
        });
        editor.plugins.get('FileRepository').on('change:uploadError', (evt, data) => {
            console.error('Upload error:', data);
        });
    })
    .catch(error => {
        console.error(error);
    });
