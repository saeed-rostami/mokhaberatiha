@extends('dashboard.layout')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('ckeditor5/ckeditor5.css') }}" />
@endsection

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 text-center">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">ثبت اطلاعیه جدید</h1>
                            </div>
                            <form method="POST" action="{{ route('notice.store') }}" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input name="title" type="text" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="تیتر">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <textarea name="content" id="editor">
                                        {{-- <p>Hello from CKEditor 5!</p> --}}
                                    </textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    ایجاد اطلاعیه جدید
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('custom_js')
    <script type="importmap">
    {
      "imports": {
        "ckeditor5": "{{ asset('ckeditor5/ckeditor5.js')}}",
        "ckeditor5/": "{{ asset('ckeditor5')}}"
      }
    }
  </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
        } from "ckeditor5";

        ClassicEditor.create(document.querySelector("#editor"), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    "undo",
                    "redo",
                    "|",
                    "bold",
                    "italic",
                    "|",
                    "fontSize",
                    "fontFamily",
                    "|",
                ],
            })
            .then((editor) => {
                window.editor = editor;
            })
            .catch((error) => {
                console.error(error);
            });
    </script>
@endsection
