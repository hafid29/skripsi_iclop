@extends('student/home')
@section('script')
    <!-- Code Ace Library For Python -->
    <script src="{{ URL::to('/js/ace/ace/ace.js') }}"></script>

    <!-- Code Ace Library For Python -->
@endsection
@section('content')
    <div class="container">
        <div class="row mt-3" style="position: relative;">
            <div class="col-md-12">
                <button class="btn btn-primary">
                    <i class="fas fa-angle-left"></i> Previous</button>
                <button class="btn btn-primary" style="position: absolute; right: 10px;">
                    Next <i class="fas fa-angle-right"></i></button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Pembelajaran</h1>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Task</th>
                            <th scope="col">Description</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row justity-content-center mt-3">

            {{-- <div class="col-md-5" style="margin-top: 3.5%" id="editor"> --}}
            <div style="height: 400px; border-right: 1px solid #e0e0e0" id="editor"></div>
            <!-- End Text Pengerjaan -->

            <div class="mb-0 nav nav-justified btn-group">
                <tr>

                    <!-- switch button menggunakan js -->

                    <td>
                        <a class="btn btn-secondary tab-box rounded-0 font-italic" style="border-radius:0px; color:white;"
                            onclick="orientationbutton()">

                            <i class="fa fa-retweet"></i>&nbsp;Change orientation</a>
                    </td>

                </tr>

            </div>
            {{-- <div class="field ">
                    <fieldset class="form-group">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <textarea id="address" rows="4" class="text-capitalize round form-control @error('address') is-invalid @enderror"
                            name="address" placeholder="code sql" required autocomplete="address"
                            autofocus>{{ old('address') }}</textarea>
                        <textarea id="demotext" rows="4" class="text-capitalize round form-control" placeholder="code sql" required
                            autocomplete="address" autofocus>{{ old('address') }}</textarea>
                        <textarea id="editor" rows="4" class="text-capitalize round form-control"></textarea>
                    </fieldset>
                    <div>
                        <button id="runButton" class="btn btn-success"><i class='fas fa-play'></i> Run</button>
                        <button id="submitButton" class="btn btn-outline-primary"><i class="fas fa-check"></i> Submit</button>
                        </div>
                    </div>
                    <textarea id="editor" rows="4" class="text-capitalize round form-control"></textarea>
                    <div style="height: 400px; border-right: 1px solid #e0e0e0" id="editor"></div>
                    <div style="margin-top: 1%">
                        <h2>Result</h2>
                        <div>
                            <button id="clearResult" class="btn btn-danger" style="position: relative;left:68%">
                                <i class='fas fa-trash'></i> Clear
                            </button>
                        </div>
                        <textarea name="body" id="text-editor" cols="50" rows="10"></textarea>
                    </div>
                    <div class="button-box mt-2" style="position: absolute; right: 10px;">
                </div>
                <button id="submitButton" class="btn btn-outline-primary"><i class="fas fa-check"></i> Submit</button> --}}
        </div>
        <div class="col-md-7" style="position: relative;">
            <embed src="{{ asset('lte/dist/file/modul.pdf') }}" type="application/pdf" style="width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row mt-3" style="position: relative;">
        <div class="col-md-12">
            <button class="btn btn-primary">
                <i class="fas fa-angle-left"></i> Previous</button>
            <button class="btn btn-primary">
                Next <i class="fas fa-angle-right"></i></button>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            theme: 'dracula',
            matchBrackets: true,
            mode: "application/x-httpd-php",
            indentUnit: 4,
            indentWithTabs: true,
            tabSize: 4,
            lineWrapping: true,
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        let editor;

        window.onload = function() {
            editor = ace.edit("editor");
            // tampilan tema warna editor
            editor.setTheme("ace/theme/clouds_midnight");
            // editor.setTheme("ace/theme/clouds");
            editor.session.setMode("ace/mode/php");
            editor.setFontSize("12px");
        }


        // $(function() {


        //     $('#compile').click(function() {

        //         executing();
        //     });

        //     function executing() {


        //         $.ajax({
        //             url: "http://127.0.0.1:8000/student/python-compile",
        //             method: "GET", // GET | POST
        //             data: {
        //                 code: editor.getSession().getValue()
        //             },
        //             dataType: "json",
        //             success: function(response) {

        //                 // ditampilkan ke javascript
        //                 $isi = `<tr>
    //                     <td>1</td>
    //                     <td>Syntax Python</td>
    //                     <td>${response}</td>
    //                     <td>-</td>
    //                     <td>-</td>
    //                 </tr>`;


        //                 $("#table-body").html($isi);



        //             },

        //             error: function(q) {

        //                 console.log(q);
        //             }
        //         })
        //     }
        // });
    </script>
    <!-- End JS Python -->
@endsection

{{-- @section('ddl-script')
<script>
    $(document).ready(function(){
        $('#runButton').click(function () {
            if(editor.getSession().getValue() == ""){
                alert("Silakan tulis jawaban anda terlebih dahulu!");
            }else{
                $("#runButton").attr("disabled", true);
                $("#runButton").html("<i class='fas fa-spinner'></i> Processing . . .");
                $.ajax({
                    // url: "{{asset('php/TEST1.php')}}",
                    //url: "{{asset('php/test/test1.php')}}",
                    url: "{{route('runtest')}}",
                    method: "POST",
                    data: {
                        code: editor.getSession().getValue(),
                    },
                    success: function(response){
                        //$(".output").html(response);
                        $(".output").html(response.result);
                        $("#runButton").attr("disabled", false)
                        $("#runButton").html("<i class='fas fa-play'></i> Run");
                            
                    },
                    error: function(){
                        $(".output").html("Something went wrong!");
                        $("#runButton").attr("disabled", false)
                        $("#runButton").html("<i class='fas fa-play'></i> Run");
                    }
                });    
            }
        });
        $('#submitButton').click(function(){
            alert('Clicked! 👍');
        });
        $('#clearResult').click(function(){
            const output = document.getElementById("output-text");
            output.remove();
        });
    });
</script>
@endsection --}}
