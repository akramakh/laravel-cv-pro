@extends('layouts.app')
<style>
    .modal{
        z-index: 9999!important;
    }
</style>
@section('content')

<link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.min.css') }}" rel="stylesheet">

      <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>


<input type="tel" >

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="modal-body">
              <h5>Popover in a modal</h5>
              <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
              <hr>
              <h5>Tooltips in a modal</h5>
              <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger load jquery -->
<button type="button" class="btn btn-success" onclick="loadFile('/get-test-file')">
    Load Page
</button>
    <div id="test-container"></div>


@section('footer')
    <p>Find me on social media.</p>
    <a href="#"><i class="fa fa-facebook-official hover-opacity"></i></a>
    <a href="#"><i class="fa fa-instagram hover-opacity"></i></a>
    <a href="#"><i class="fa fa-snapchat hover-opacity"></i></a>
    <a href="#"><i class="fa fa-pinterest-p hover-opacity"></i></a>
    <a href="#"><i class="fa fa-twitter hover-opacity"></i></a>
    <a href="#"><i class="fa fa-linkedin hover-opacity"></i></a>
    <p>Powered by <a href="#" target="_blank">akram akh</a></p>

@endsection
<script>

    function loadFile(url) {
        jQuery.get(url, function (data) {
            $("#test-container").html(data);
        });
    }

</script>
@endsection