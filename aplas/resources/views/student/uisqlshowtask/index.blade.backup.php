@extends('student/home')

<!-- untuk mengisi yield pada home.blade.php -->
{{-- @section('script')
    <script src="{{ URL::to('/js/tabScript.js') }}"></script>
    <!-- Code Mirror Script & CSS -->
    <script src="{{ URL::to('/js/lib/codemirror.js') }}"></script>
    <script src="{{ URL::to('/js/mode/xml/xml.js') }}"></script>
    <script src="{{ URL::to('/js/mode/active-line.js') }}"></script>
    <script src="{{ URL::to('/js/addon/edit/matchtags.js') }}"></script>
    <script src="{{ URL::to('/js/addon/edit/closetag.js') }}"></script>
    <script src="{{ URL::to('/js/addon/fold/xml-fold.js') }}"></script>
    <script src="{{ URL::to('/js/addon/hint/show-hint.js') }}"></script>
    <script src="{{ URL::to('/js/addon/hint/xml-hint.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('/css/codemirror.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/css/dracula.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/js/addon/hint/show-hint.css') }}">

    <!-- Code Mirror Script & CSS -->
@endsection --}}
@section('script')
    <!-- Code Ace Library For Python -->
    <script src="{{ URL::to('/js/ace/ace/ace.js') }}"></script>

    <!-- Code Ace Library For Python -->
@endsection

@section('content')
    <div class="row">

        <div class="col-12">



            {{ Form::open(['route' => 'uitasks.store', 'files' => true]) }}

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">sql</h3>

                </div>

                <div class="card-body">



                    <!-- pesan jika berhasil (session) -->

                    @if (Session::has('message'))
                        <div id="alert-msg" class="alert alert-success alert-dismissible">

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>

                            {{ Session::get('message') }}

                        </div>
                    @endif



                    <!-- pesan jika error (withErrors) -->

                    @if (!empty($errors->all()))
                        <div class="alert alert-danger alert-dismissible">

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>

                            {{ Html::ul($errors->all()) }}

                        </div>
                    @endif


                    <!-- kolom untuk overview materi pembelajaran -->

                    <div class="form-group">

                        <!--<label for="description">Note</label>-->

                        <textarea id="desc" class="form-control" disabled rows="2"></textarea>

                    </div>


                    <div class="button-group">


                        <!-- jika sudah sampai topic terakhir, next button dinonaktifkan -->

                        <input type="button" value="Next" class="float-right mr-1 btn btn-outline-primary"
                            style="min-width: 120px; min-height: 45px;" disabled>

                        <!-- back button -->
                        <input type="button" id="compile" value="Compile Program" class="float-right mr-1 btn btn-success"
                            style="min-width: 120px; min-height: 45px;">
                        <input type="button" value="Previous" class="mx-1 btn btn-outline-primary"
                            style="min-width: 120px; min-height: 45px;">



                        <!-- feedback button -->
                        <a class="float-right mr-1 btn btn-primary" type="button"
                            style="padding: 8px; min-width: 120px; min-height: 45px; color:white;"><i class="fa fa-heart"
                                aria-hidden="true"></i> Feedback</a>

                    </div>



                    <div class="row" style="padding-top:20px">

                        <div id="left-panel" class="col-md-6">

                            <div class="code-box-container"
                                style="box-shadow: 0 2px 5px 0 rgba(62, 64, 68, 0.5);height: 684px; width:100%;border-radius:5px; border-style:solid; border-width:4px; border-color: #E1E1E8;">

                                <div>

                                    <embed class="guide-reader" style="height: 636px; width:100%;margin-bottom: -4px;"
                                        type="application/pdf" src="{{ asset('lte/dist/file/modul.pdf') }}">
                                    </embed>

                                </div>

                                <div class="mb-0 nav nav-justified btn-group">

                                    <tr>

                                        <!--  button download pdf -->

                                        <td>
                                            <a class="btn btn-success" style="border-radius:0px" href="" target="_blank">
                                                <i class="fa fa-download"></i>&nbsp;Download Guide</a>

                                        </td>

                                    </tr>

                                </div>

                            </div>

                        </div>



                        <div id="right-panel" class="col-md-6">

                            <div class="code-box-container"
                                style="box-shadow: 0 2px 5px 0 rgba(62, 64, 68, 0.5); border-radius:5px; border-style:solid; border-width:4px; border-color: #E1E1E8;">

                                <div class="mb-0 nav nav-justified btn-group">

                                    <tr>

                                        <!-- switch button menggunakan js -->

                                        <td>

                                            <input id="MainActivityTab" type="button" value="mysql.php"
                                                class="btn btn-secondary tab-box rounded-0 font-italic"
                                                onclick="openTab('MainActivityTab','0')"></input>

                                        </td>



                                    </tr>

                                </div>



                                <!-- Textarea pengerjaan -->

                                <textarea name="MainActivity" id="MainActivity" class="code-box" style="padding: 20px; height: 100px;"></textarea>



                                {{-- <textarea name="Color" id="Color" class="w-100 code-box"
                                    style="display:none; padding: 20px; height: 93%;">color box</textarea>



                                <textarea name="String" id="String" class="w-100 code-box"
                                    style="display:none; padding: 20px; height: 93%;">string box</textarea> --}}
                                <!-- Text pengerjaan -->
                                <div style="height: 400px; border-right: 1px solid #e0e0e0" id="editor"></div>
                                <!-- End Text Pengerjaan -->

                                <div class="mb-0 nav nav-justified btn-group">
                                    <tr>

                                        <!-- switch button menggunakan js -->

                                        <td>
                                            <a class="btn btn-secondary tab-box rounded-0 font-italic"
                                                style="border-radius:0px; color:white;" onclick="orientationbutton()">

                                                <i class="fa fa-retweet"></i>&nbsp;Change orientation</a>
                                        </td>

                                    </tr>

                                </div>
                                {{-- <div class="mb-0 nav nav-justified btn-group">
                                    <tr>

                                        <!-- switch button menggunakan js -->

                                        <td>
                                            <a class="btn btn-secondary tab-box rounded-0 font-italic"
                                                style="border-radius:0px; color:white;" onclick="orientationbutton()">

                                                <i class="fa fa-retweet"></i>&nbsp;Change orientation</a>
                                        </td>

                                    </tr>

                                </div> --}}

                                <!-- data 'id' untuk UiTopicStdController -->

<!--                                <input name="id" type="hidden" value={{ ['id'] }}></input>-->



                            </div>

                        </div>



                    </div>

                </div>







                <div class="col-12" style="padding-top:20px;padding-right:20px;padding-left:20px;">

                    <h1>Result</h1>

                    <p style="color: #ea5a73; font-size:larger">(After Trying {{ $numberOfTries }} Times)</p>

                    <table class="table table-bordered table-hover">

                        <thead>

                            <tr class="text-center">

                                <th>Submit No.</th>

                                <th>Topic Name</th>

                                <th>Validation Detail</th>

                                <th>Status</th>

                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody id="table-body">


                        </tbody>

                    </table>

                </div>

                <!-- </form> -->


            </div>

        </div>
        <script>
            let editor;

            window.onload = function() {
                editor = ace.edit("editor");
                // tampilan tema warna editor
                editor.setTheme("ace/theme/clouds_midnight");
                // editor.setTheme("ace/theme/clouds");
                editor.session.setMode("ace/mode/python");
                editor.setFontSize("12px");

                editor.setValue(`
    '''
    Dika saat ini mengalami masalah dompet keuangan, bantu dika untuk mempersiapkan 
    pembayaran apabila caffe yang didatangi ternyata menggunakan nontunai maka, dika harus
    menggunakan debit. Namun apabila hanya melayani nontunai, maka harus menggunakan 
    tunai.
    
    
    1. Apabila cashless : output yang diharapkan "debit"
    2. Apabila tunai     : output yang diharapkan "tunai"
    
    
    Requirement syntax : 
    if  |   print   |   variable
    
    '''
    
    # status pembayaran terkini
    metode_pembayaran = "tunai"`);

            }
        </script>
    @endsection
