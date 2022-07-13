<input type="hidden" id="editor-input" name="content">
<script>
    var editor = document.getElementById('editor');
    var editorInput = document.getElementById('editor-input');
    var toolbarOptions = [
        // 見出し
        [{
            'header': [1, 2, 3, 4, false]
        }],
        // フォント種類
        [{
            'font': []
        }],
        // 文字寄せ
        [{
            'align': []
        }],
        // 太字、斜め、アンダーバー
        ['bold', 'italic', 'underline'],
        // 文字色
        [{
                'color': []
            },
            // 文字背景色
            {
                'background': []
            }
        ],
        // リスト
        [{
                'list': 'ordered'
            },
            {
                'list': 'bullet'
            }
        ],
        // インデント
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }],
        // 画像挿入
        ['image'],
        // 動画
        ['video'],
        // 数式
        ['formula'],
        // URLリンク
        ['link']
    ];
    
    var quill = new Quill('#editor', {
        placeholder: '',
        theme: 'snow',
        modules: {
        toolbar: toolbarOptions
      }
    });
        quill.on('text-change', function(delta, oldDelta, source) {
        var editorHtml = editor.querySelector('.ql-editor').innerHTML;
        editorInput.value = editorHtml;
        });
</script>